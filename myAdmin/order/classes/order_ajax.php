<?php

require_once(__DIR__ . "/../../global_ajax.php"); //connection setting db


class order_ajax extends object_class
{
    public $productF; // admin/product_management/functions/
    public $product; // admin/product/classes/
    public $order_c;

    public function  __construct()
    {
        parent::__construct('3');
        //product_management functions
        if (isset($GLOBALS['productF'])) $this->productF = $GLOBALS['productF'];
        else {
            require_once(__DIR__ . "/../../product_management/functions/product_function.php");
            $this->productF = new product_function();
        }

        //product add/edit class
        if (isset($GLOBALS['product'])) $this->product = $GLOBALS['product'];
        else {
            require_once(__DIR__ . "/../../product/classes/product.class.php");
            $this->product = new product();
        }

        require_once(__DIR__ . "/order.php");
        $this->order_c = new order();

    }




    public function getOrderProductJson()
    {
        $country = $_POST['country'];
        $countryData = $this->productF->productCountryId($country);
        $countryId = $countryData['cur_id'];
        $priceCode = $countryData['cur_symbol'];

        $sql = "SELECT `proudct_detail`.`prodet_id`, `proudct_detail`.`prodet_name`,`product_price`.`propri_intShipping`
            FROM `proudct_detail` join `product_price` on
                `proudct_detail`.`prodet_id`=`product_price`.`propri_prodet_id`
                where `product_price`.`propri_cur_id`='$countryId'
                ORDER BY `proudct_detail`.`prodet_id` ASC";

        $product = $this->dbF->getRows($sql);
        $defaultLang = $this->functions->AdminDefaultLanguage();
        $JSON = '[';


        if ($this->dbF->rowCount > 0) {
            $JSON2 = '';
            foreach ($product as $val) {
                $id = $val['prodet_id'];
                $name = unserialize($val['prodet_name']);

                //verify story country Product
                $sql = "SELECT * from product_inventory
                        WHERE qty_product_id = '$id' AND qty_store_id in
                        (SELECT store_pk FROM `store_name` WHERE store_country = '$country')";

                $this->dbF->getRows($sql);
                if ($this->dbF->rowCount > 0) {
                } else {
                    continue;
                }


                //scale JSON
                $scle = $this->productF->scaleSQL($id, '`prosiz_id`,`prosiz_name`');
                if ($this->dbF->rowCount > 0) {
                    $SCALE = '[';
                    $temp = '';
                    foreach ($scle as $sval) {
                        $sWeight = $this->productF->getProductWeight($id, $sval['prosiz_id']);
                        $temp .= '{"id": "' . $sval['prosiz_id'] . '","label" : "' . $sval['prosiz_name'] . '", "sWeight": "' . $sWeight . '" },';
                    }
                    $temp = trim($temp, ',');
                    $SCALE .= $temp;
                    $SCALE .= ']';
                } else {
                    $SCALE = 'null';
                }

                //color json
                $colr = $this->productF->colorSQL($id, '`propri_id`,`proclr_name`');
                if ($this->dbF->rowCount > 0) {
                    $COLOR = '[';
                    $temp = '';
                    foreach ($colr as $cval) {
                        $temp .= '{"id": "' . $cval['propri_id'] . '","label" : "' . $cval['proclr_name'] . '"},';
                    }
                    $temp = trim($temp, ',');
                    $COLOR .= $temp;
                    $COLOR .= ']';
                } else {
                    $COLOR = 'null';
                }

                //JSON create
                $pSetting = $this->productF->getProductSetting($id); // Full Setting Report of data
                $weight = $this->productF->productSettingArray('defaultWeight', $pSetting, $id);
                $weight = floatval($weight);
                $JSON2 .= '{
                        "id" : "' . $id . '",
                        "label" : "' . $name[$defaultLang] . '",
                        "scale" : ' . $SCALE . ',
                        "color" : ' . $COLOR . ',
                        "priceCode" : "' . $priceCode . '",
                        "weight" : "' . $weight . '",
                        "interShipping" : "' . $val['propri_intShipping'] . '"
                        },';
            }
            $JSON2 = trim($JSON2, ',');
            $JSON .= $JSON2;

        }
        $JSON .= ']';
        $JSON = trim($JSON);
        echo $JSON;
        /**
         * Out Put :
         * {
         * id:1,
         * label:asad,
         * scale: {id:2,label:raza},
         * color: {id:2,label:sheerazi},
         * weight:64
         * }
         */
    }

    public function getOrderProductStoreJson()
    {
        $country = $_POST['country'];
        $countryData = $this->productF->productCountryId($country);
        
        $countryId = $countryData['cur_id'];
        $pId = $_POST['pId'];
        $scleId = $_POST['scaleId'];
        $colorId = $_POST['colorId'];
        @$customId = $_POST['customId'];
        $sql = "SELECT * FROM `product_inventory` WHERE `qty_product_id` = '$pId' AND `qty_product_scale` = '$scleId' AND `qty_product_color` = '$colorId'";
        $product = $this->dbF->getRows($sql);
        $JSON = '[';

        if ($this->dbF->rowCount > 0) {
            $JSON2 = '';
            foreach ($product as $val) {
                $storeName = $this->productF->getStoreName($val['qty_store_id']);
              

                $price = $this->productF->productTotalPrice($pId, $scleId, $colorId, $customId, $country);
                $discountArray = $this->productF->productDiscount($pId, $countryId);
                if (!empty($discountArray)) {
                    $discount = $discountArray['discount'];
                    $discountFormat = $discountArray['discountFormat'];
                    if ($discountFormat == 'price') {
                        // $discount   =   $price-$discount;
                    } else if ($discountFormat == 'percent') {
                        $discount = ($price * $discount) / 100;
                    }
                } else {
                    $discount = 0;
                }
                $JSON2 .= '{
                        "label" : "' . $storeName . '",
                        "id"    : "' . $val['qty_pk'] . '",
                        "storeId": "' . $val['qty_store_id'] . '",
                        "qty"   : ' . $val['qty_item'] . ',
                        "price" : "' . $price . '",
                        "discount" : "' . $discount . '"
                        },';
            }
            $JSON .= trim($JSON2, ',');
        }

        $JSON .= ']';
        $JSON = trim($JSON);
        echo $JSON;
    }

    public function finalPriceShipping()
    {
        require_once(__DIR__ . '/../../shipping/classes/shipping.php');
        $shippingC = new shipping();


        $storeCountry = $_POST['storeCountry'];
        $deliverCountry = $_POST['deliverCountry'];
        //$storeCountry = 'PK';
        //$deliverCountry = 'PK';
        $hash = "$storeCountry:$deliverCountry";

        $sql = "SELECT * FROM `shipping` WHERE hash = '$hash'";
        $data = $this->dbF->getRow($sql);
       
        $array = array();
        if ($this->dbF->rowCount > 0) {
            $array['find'] = "1"; // Found
            $array['shp_int'] = $data['shp_int'];
            $weight = $shippingC->shpWeightArrayFind($data['shp_weight']);
            $array['shp_weight'] = floatval($weight);
            $array['shp_price'] = $data['shp_price'];
        } else {
            $array['find'] = "0"; // Not Found
            $array['message'] = "N0 Shipping Date Found";
        }
        echo json_encode($array);

    }

    public function delOrder()
    {
        try {
            $this->db->beginTransaction();

            $id = $_POST['itemId'];

            $sql = "SELECT * FROM `order_invoice_product` WHERE  order_invoice_id='$id'";
            $oldData = $this->dbF->getRows($sql);
            foreach ($oldData as $val) {
                $pIds = $val['order_pIds'];
                $pArray = explode("-", $pIds); // 491-246-435-5 => p_ pid - scaleId - colorId - storeId;
                $pId = $pArray[0]; // 491
                $scaleId = $pArray[1]; // 426
                $colorId = $pArray[2]; // 435
                $storeId = $pArray[3]; // 5
                @$customId = $pArray[4]; // 5

                //delete custom if has
                if ($customId != '0' && !empty($customId)) {
                    $sql = "DELETE FROM p_custom_submit WHERE id = '$customId'";
                    $this->dbF->setRow($sql);
                }
            }

            $sql2 = "DELETE FROM order_invoice WHERE order_invoice_pk='$id'";
            $this->dbF->setRow($sql2, false);
            if ($this->dbF->rowCount) echo '1';
            else echo '0';

            $this->db->commit();
            $this->functions->setlog('DELETE', 'Order Invoice', $id, 'Order Invoice Delete Successfully');
        } catch (PDOException $e) {
            echo '0';
            $this->db->rollBack();
            $this->dbF->error_submit($e);
        }
    }





 public function order_fetch2($page)
    {
        global $_e;
       // print_r($page);
        $start  = (isset($_POST['start']))  ? $_POST['start']               : 0;
        $length = (isset($_POST['length'])) ? $_POST['length']              : 10;
        $draw   = (isset($_POST['draw']))   ? (int)$_POST['draw']           : null;
        $search = (isset($_POST['search']) && $_POST['search'] != '') ? ($_POST['search']['value'])   : null;
        $order  = (isset($_POST['order']))  ? $_POST['order'][0]            : 0;

        $order_by_sql = ' ORDER BY `flagged` DESC, order_invoice_pk DESC ';
        if ( $order ) {
            # order by sql generation
            // $columns_array      = array('SNO','INVOICE','Country','INVOICE DATE','CUSTOMER NAME','SOLD PRICE','PAYMENT METHOD','ORDER PROCESS','Invoice Status');
            $order_by           = ($order['column']);
            $order_by_direction = strtoupper($order['dir']);

            switch ($order_by) {
                case '0':
                    # SNO...
                    $order_by_sql = ' ORDER BY order_invoice_pk ' . $order_by_direction;
                    break;
                case '1':
                    # INVOICE...
                    $order_by_sql = ' ORDER BY invoice_id ' . $order_by_direction;
                    break;
                case '2':
                    # Country...
                    $order_by_sql = ' ORDER BY shippingCountry ' . $order_by_direction;
                    break;
                case '3':
                    # INVOICE DATE...
                    $order_by_sql = ' ORDER BY invoice_date ' . $order_by_direction;
                    break;
                case '4':
                    # CUSTOMER NAME...
                    $order_by_sql = ' ORDER BY ac.acc_name ' . $order_by_direction;
                    break;
                case '5':
                    # SOLD PRICE...
                    $order_by_sql = ' ORDER BY total_price ' . $order_by_direction;
                    break;
                case '6':
                    # PAYMENT METHOD...
                    $order_by_sql = ' ORDER BY paymentType ' . $order_by_direction;
                    break;
                case '7':
                    # ORDER PROCESS... CANNOT DO THIS CURRENTLY, BECAUSE THIS COMES FROM ORDER_INVOICE_PRODUCT AND CAN BE MULTIPLE
                    $order_by_sql = ' ORDER BY order_invoice_pk ' . $order_by_direction;
                    break;
                case '8':
                    # Invoice Status...
                    $order_by_sql = ' ORDER BY invoice_status ' . $order_by_direction;
                    break;
                
                default:
                    # SNO...
                    $order_by_sql = ' ORDER BY order_invoice_pk ' . $order_by_direction;
                    break;
            }

        }



        ##### ADDITIONAL CUSTOM FILTER FILEDS #####
        $dateCodeFrom = (isset($_POST['dateCodeFrom']) && $_POST['dateCodeFrom'] != '' )  ? $_POST['dateCodeFrom'] . ' 00:00:00 '  : NULL;
        $dateCodeTo   = (isset($_POST['dateCodeTo']) && $_POST['dateCodeTo'] != '' )    ? $_POST['dateCodeTo'] . ' 23:59:59 '    : NULL;

        ## make between sql for date
        $between_sql = ( isset($dateCodeFrom) && isset($dateCodeTo) ) ? " `dateTime` BETWEEN '${dateCodeFrom}' AND '${dateCodeTo}' AND " : '' ;

        ## if date range filter is applied then apply its date order by sql
        ## if order is null, and date range is not empty then use between sql order by , else use order by of the datatable column selected
        $order_by_sql = ( !$order && $between_sql != '' ) ? ' ORDER BY `flagged` DESC, `dateTime` ASC ' : $order_by_sql;


        #### Search SQL #####
        $country = $this->functions->countryKeyByName($search);
        $country = !empty($country) ? " `shippingCountry` = '{$country}' OR " : "";
         $statusSearch = '';
        $statusSQL = '';
        if ($search) {

            $input = preg_quote("$search", '~');
            $invst = $this->getInvoiceStatusHardwords('Received');
            $arr=array(
                11=>$this->getInvoiceStatusHardwords('Received'),
                2=>$this->getInvoiceStatusHardwords('pending'),
                5=>$this->getInvoiceStatusHardwords('Ready For Packaging'),
                0=>$this->getInvoiceStatusHardwords('Cancel'),
                9=>$this->getInvoiceStatusHardwords('Partial Delivery Done'),
                6=>$this->getInvoiceStatusHardwords('Full Refunded'),
                10=>$this->getInvoiceStatusHardwords('Awaiting Measures From Customer'),
                7=>$this->getInvoiceStatusHardwords('Order send for factory'),
                3=>$this->getInvoiceStatusHardwords('Complete'),
                1=>$this->getInvoiceStatusHardwords('Denied'),
                4=>$this->getInvoiceStatusHardwords('Order will be sent from factory by DHL EXPRESS'),
                8=>$this->getInvoiceStatusHardwords('PRIORITY 1 URGENT DELIVERY'),
                12=>$this->getInvoiceStatusHardwords('ORDERED TO MAIN STOCK'),
                13=>$this->getInvoiceStatusHardwords('MADE TO MEASURE ORDER'),
                /*8=>_uc($_e['Measure send to factory']),*/
            );
            $result = preg_grep('~' . $input . '~', $arr);
           
            if(!empty($result)){
                $keys = array_keys($result);
                foreach ($keys as $key => $value) {
                    $statusSearch .= '\''.$value.'\',';
                    
                }

                $statusSearch = rtrim($statusSearch, ',');
                $statusSQL = "`invoice_status` IN({$statusSearch}) OR";
            }

            $search_sql = " ( `invoice_id` LIKE '%{$search}%'               OR
                                        $country
                                        `orderUser` = '{$search}'         OR
                                        `invoice_date` LIKE '%{$search}%' OR
                                        `orderStatus`  LIKE '%{$search}%' OR 
                                        `total_price`  LIKE '%{$search}%' OR
                                        `sender_email`  LIKE '%{$search}%' OR
                                        $statusSQL
                                         ac.acc_name   LIKE '%{$search}%' ) AND";
        } else {
            $search_sql = '';
        }

        //############# GET TOTAL ROWS #############
        $search_w = !empty($search_sql) ? " WHERE " . trim($search_sql, "AND") : '';


        ## DATE RANGE SQL
        // $between_sql = $search_sql == '' ? $between_sql : $between_sql;
        ## make between sql for date
        $between_sql = ( isset($dateCodeFrom) && isset($dateCodeTo) ) ? " `dateTime` BETWEEN '${dateCodeFrom}' AND '${dateCodeTo}' AND " : '' ;

        switch ($page) {
            case 'data_ajax_complete':
                $order_name = "complete";

                $sql = " SELECT order_info.sender_email,ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id
                JOIN `order_invoice_info` order_info ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                WHERE {$search_sql} {$between_sql} invoice_status = '3' {$order_by_sql} ";
                
                $sql_count = "SELECT COUNT(order_info.sender_email) FROM `order_invoice`
                LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id
                JOIN `order_invoice_info` order_info ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                WHERE {$search_sql} {$between_sql} invoice_status = '3' {$order_by_sql}";
                

                // $sql = " SELECT ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                //         LEFT OUTER JOIN `accounts_user` ac ON CAST(ac.acc_id as CHAR(12)) = `order_invoice`.`orderUser` 
                //         WHERE {$search_sql} {$between_sql} invoice_status = '3' {$order_by_sql} ";

                ############# GET TOTAL ROWS #############
                $recordsTotal =  $this->count_total_number($sql_count);//$this->get_total_rows($sql);
               // print_r($recordsTotal);
                $sql .= " LIMIT $start,$length ";
                // echo $sql;
                break;
            case 'data_ajax_invoices':
                $order_name = "invoices";

                # now added user name searching in all
                // # specific search sql, adding user name searching by joining user account table
                // $search_sql = ($search) ? trim($search_sql, ' AND') : '';
                // $search_sql = ($search) ? $search_sql . " OR ac.acc_name LIKE '%{$search}%' AND" : $search_sql;

                $sql = " SELECT order_info.sender_email,ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                        LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                        LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id 
                        JOIN `order_invoice_info` order_info ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                        WHERE {$search_sql} {$between_sql} orderStatus != 'inComplete' AND invoice_status != '3' AND invoice_status != '0' {$order_by_sql} ";
                        
                        

                // $sql = " SELECT ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                //          LEFT OUTER JOIN `accounts_user` ac ON CAST(ac.acc_id as CHAR(12)) = `order_invoice`.`orderUser` 
                //          WHERE {$search_sql} {$between_sql} orderStatus != 'inComplete' AND invoice_status != '3' AND invoice_status != '0' {$order_by_sql} ";

                ############# GET TOTAL ROWS #############
                $recordsTotal = $this->get_total_rows($sql);
               // print_r($recordsTotal);
                $sql .= " LIMIT $start,$length ";
                // echo $sql;
                break;
            case 'data_ajax_cancel':
                $order_name = "cancel";
                
                # doing this, because we are changing the search sql, for cancelled orders.
                $search_sql  = trim($search_sql, 'AND');
                $search_sql  = ( isset($search_sql) && $search_sql != '' ) ? "  AND {$search_sql} " : '';
                // $between_sql = ( $search_sql == '' && $between_sql != ''  ) ? ' AND ' . rtrim($between_sql,' AND ') : rtrim($between_sql,' AND ');
                // if ( $search_sql == '' && $between_sql != '' ) {
                    // $between_sql = rtrim($between_sql,' AND ');
                // } elseif () {
                    $between_sql = rtrim($between_sql,' AND ');
                // }
                    
                    if ( $between_sql != '' ) {
                        $between_sql = ' AND ' . $between_sql;
                    }
                $sql = "SELECT order_info.sender_email,ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                        LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                        LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id 
                        JOIN `order_invoice_info` order_info ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                        WHERE `invoice_status` = '0' {$search_sql} {$between_sql} {$order_by_sql} ";
                        
                         $sql_count = "SELECT COUNT(order_info.sender_email) FROM `order_invoice`
                        LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                        LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id 
                        JOIN `order_invoice_info` order_info ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                        WHERE `invoice_status` = '0' {$search_sql} {$between_sql} {$order_by_sql} ";

                // $sql = "SELECT ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                //         LEFT OUTER JOIN `accounts_user` ac ON CAST(ac.acc_id as CHAR(12)) = `order_invoice`.`orderUser`
                //         WHERE invoice_status = '0' {$search_sql} {$between_sql} {$order_by_sql} ";
                
                ############# GET TOTAL ROWS #############
                $recordsTotal =  $this->count_total_number($sql_count);
               // print_r($recordsTotal);
                $sql .= " LIMIT $start,$length ";
                // echo $sql;
                break;
            case 'data_ajax_incomplete':
                //print_r();
               // $statusSQL = '';
                $search_sql1 = " ( `invoice_id` LIKE '%{$search}%'               OR
                                        $country
                                        `orderUser` = '{$search}'         OR
                                        `invoice_date` LIKE '%{$search}%' OR
                                        `orderStatus`  LIKE '%{$search}%' OR 
                                        `total_price`  LIKE '%{$search}%' OR
                                        $statusSQL
                                         ac.acc_name   LIKE '%{$search}%' ) AND";

                $order_name = "incomplete";
                $sql = "SELECT ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                        LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                        LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id  
                        WHERE {$search_sql1} {$between_sql} orderStatus = 'inComplete' {$order_by_sql} ";

                // $sql = "SELECT ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                //         LEFT OUTER JOIN `accounts_user` ac ON CAST(ac.acc_id as CHAR(12)) = `order_invoice`.`orderUser` 
                //         WHERE {$search_sql} {$between_sql} orderStatus = 'inComplete' {$order_by_sql} ";
                
                $sql_count = "SELECT COUNT(ac.acc_email) FROM `order_invoice`
                        LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                        LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id ";

                ############# GET TOTAL ROWS #############
                  $recordsTotal =  $this->count_total_number($sql_count);
                  //print_r($recordsTotal);
                 //$recordsTotal = 2;

                
                $sql .= " LIMIT $start,$length ";
                break;


                   case 'data_ajax_inc':
           
                $order_name = "all";
                
                # adding between sql with $search_w
                $search_w = ( $search_w == '' && $between_sql != '' ) ? ' WHERE ' . rtrim($between_sql, 'AND ') : $search_w . ' AND ' . rtrim($between_sql, 'AND ');
                # if no between sql then remove the AND which gets appended everytime before between_sql
                $search_w = ( $between_sql == '' ) ? str_replace(' AND ','',$search_w) : $search_w;
                
                $sql = "SELECT order_info.sender_email,ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                        LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                        LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id 
                        JOIN `order_invoice_info` order_info ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                        $search_w  {$order_by_sql} "; 
                        
                        
                 $sql_count = "SELECT COUNT(order_info.sender_email) FROM `order_invoice`
                        LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                        LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id 
                        JOIN `order_invoice_info` order_info ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                        $search_w {$order_by_sql} ";
                 
                // $sql = "SELECT ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                //         LEFT OUTER JOIN `accounts_user` ac ON CAST(ac.acc_id as CHAR(12)) = `order_invoice`.`orderUser` 
                //         $search_w {$order_by_sql} ";        

                ############# GET TOTAL ROWS #############
                // $sql_two = "SELECT `order_invoice_pk` FROM `order_invoice` " . $search_w;
                 
                $recordsTotal =  $this->count_total_number($sql_count);//$this->get_total_rows($sql_count);
              //  print_r($recordsTotal);

                $sql .= " LIMIT $start,$length ";
                break;



            default: //all
           
                $order_name = "all";
                
                # adding between sql with $search_w
                $search_w = ( $search_w == '' && $between_sql != '' ) ? ' WHERE ' . rtrim($between_sql, 'AND ') : $search_w . ' AND ' . rtrim($between_sql, 'AND ');
                # if no between sql then remove the AND which gets appended everytime before between_sql
                $search_w = ( $between_sql == '' ) ? str_replace(' AND ','',$search_w) : $search_w;
                
                $sql = "SELECT order_info.sender_email,ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                        LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                        LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id 
                        JOIN `order_invoice_info` order_info ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                        $search_w AND invoice_status != '3' AND invoice_status != '0' AND invoice_status != '1' {$order_by_sql} "; 
                        
                        
                 $sql_count = "SELECT COUNT(order_info.sender_email) FROM `order_invoice`
                        LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                        LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id 
                        JOIN `order_invoice_info` order_info ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                        $search_w AND invoice_status != '3' AND invoice_status != '0' AND invoice_status != '1' {$order_by_sql} ";
                 
                // $sql = "SELECT ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                //         LEFT OUTER JOIN `accounts_user` ac ON CAST(ac.acc_id as CHAR(12)) = `order_invoice`.`orderUser` 
                //         $search_w {$order_by_sql} ";        

                ############# GET TOTAL ROWS #############
                // $sql_two = "SELECT `order_invoice_pk` FROM `order_invoice` " . $search_w;
                 
                $recordsTotal =  $this->count_total_number($sql_count);//$this->get_total_rows($sql_count);
              //  print_r($recordsTotal);

                $sql .= " LIMIT $start,$length ";
                break;
        }

        // ###### Get Data ####
        // $sql2 = "SELECT ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
        //          LEFT OUTER JOIN `accounts_user` ac ON CAST(ac.acc_id as CHAR(12)) = `order_invoice`.`orderUser` 
        //          WHERE  `order_invoice`.`dateTime` BETWEEN '2016-10-1 00:00:00' AND '2016-10-29 23:59:59'  ORDER BY `order_invoice`.`dateTime` ASC";
         
        $data = $this->dbF->getRows($sql);

        $columns = array();
        if ($draw == 1) {
            $draw - 1;
        }

        $columns["draw"] = $draw + 1;
        $columns["recordsTotal"] = $recordsTotal; //total record,
        $columns["recordsFiltered"] = $recordsTotal; //filter record, same as total record, then next button will appear

        $i = $start;
        foreach ($data as $key => $val) {
            $i++;
            $divInvoice = '';
            $invoiceStatus = $this->productF->invoiceStatusFind($val['invoice_status']);
            $st = $val['invoice_status'];
            $onclick = " onclick= 'show_quick_invoice(this);' ";
            if ($st == 0) $divInvoice = "<div $onclick class='btn invoice_status btn-danger  btn-sm ' style='min-width:80px;'>$invoiceStatus</div>";
            else if ($st == 1) $divInvoice = "<div $onclick class='btn invoice_status btn-warning  btn-sm' style='min-width:80px;'>$invoiceStatus</div>";
            else if ($st == 2) $divInvoice = "<div $onclick class='btn invoice_status btn-info  btn-sm' style='min-width:80px;'>$invoiceStatus</div>";
            else if ($st == 3) $divInvoice = "<div $onclick class='btn invoice_status btn-success  btn-sm' style='min-width:80px;'>$invoiceStatus</div>";
            else $divInvoice = "<div $onclick class='btn invoice_status btn-default  btn-sm' style='min-width:80px;'>$invoiceStatus</div>";


            $invoiceDate = date('Y-m-d H:i:s', strtotime($val['invoice_date']));
            $invoiceId = $val['order_invoice_pk'];

            $country = $val['shippingCountry'];
            $country = $this->functions->countryFullName($country);

            $orderInfo = $this->order_c->orderInvoiceInfo($invoiceId);
            $orderUser_id = $val['orderUser'];
            $customer_email = $orderInfo['sender_email'];
            $customer_Name = $orderInfo['sender_name'];
            if (is_numeric($orderUser_id)) {
                $customer_Name = empty($customer_Name) ? "---" : $customer_Name;
                $customer_Name = "<a href='-webUsers?page=edit&userId=$orderUser_id' class='btn btn-info btn-sm' target='_blank'>$customer_Name</a>";
            }

            //Check order process or not,, if single product process it show 1
            $sql = "SELECT * FROM `order_invoice_product` WHERE `order_invoice_id` = '$invoiceId' AND `order_process` = '1'";
            $this->dbF->getRow($sql);
            $orderProcess = "<div class='btn btn-danger  btn-sm' style='width:50px;'>" . _uc($_e['NO']) . "</div>";
            if ($this->dbF->rowCount > 0) {
                //make sure all order process or custome process
                $sql = "SELECT * FROM `order_invoice_product` WHERE `order_invoice_id` = '$invoiceId' AND `order_process` = '0' ";
                $this->dbF->getRow($sql);
                if ($this->dbF->rowCount > 0) {
                    //Ja = yes
                    $orderProcess = "<div class='btn btn-warning  btn-sm' style='width:50px;'>" . _uc($_e['Yes']) . "</div>";
                } else {
                    $orderProcess = "<div class='btn btn-success  btn-sm' style='width:50px;'>" . _uc($_e['Yes']) . "</div>";
                }
            }

            $days = $this->functions->ibms_setting('order_invoice_deleteOn_request_after_days');
            $link = $this->functions->getLinkFolder();
            $date = date('Y-m-d', strtotime($val['dateTime']));
            $minusDays = date('Y-m-d', strtotime("-$days days"));

            $inoivcePdf = '';
            if ($val['orderStatus'] != 'inComplete') {
                $inoivcePdf = " <a href='../invoicePrint?mailId=$invoiceId' target='_blank' class='btn'>
                                    <i class='fa fa-file-pdf-o'></i>
                               </a>";
            }

            $paymentMethod = $val['paymentType'];
            $paymentMethod = $this->productF->paymentArrayFind($paymentMethod);
            $cur_symbol = md5($val['price_code']);

            $action = "<div class='btn-group btn-group-sm'>
                       $inoivcePdf
                        <a href='?pId=$invoiceId' data-method='post' data-action='?page=edit' class='btn'>
                            <i class='glyphicon glyphicon-edit'></i>
                        </a>";
            if ($date < $minusDays) {
                $action .= "<a class='btn' data-id='$invoiceId' onclick='return delOrderInvoice(this);'>
                         <i class='glyphicon glyphicon-trash trash'></i>
                         <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
                     </a>";
            } else {
                $action .= "<a class='btn'>
                         <i class='glyphicon glyphicon-trash '></i>
                         <i class='glyphicon glyphicon-ban-circle combineicon'></i>
                     </a>";
            }

            if($val['flagged'] == 1){
                $action .= "<a class='btn' data-id='$invoiceId' onclick='return removeFlagOrderToTop(this);'>
                            <i class='glyphicon glyphicon-pushpin'></i>
                        </a>";
            }else{
                $action .= "<a class='btn' data-id='$invoiceId' onclick='return flagOrderToTop(this);'>
                            <i class='glyphicon glyphicon-pushpin'></i>
                        </a>";
            }

            

            $order_id = $val['order_invoice_pk'];
            $form_invoice = array();
            $form_invoice[] = array(
                "type" => "select",
                "array" => $this->productF->invoiceStatusArray(),
                "select" => $val['invoice_status'],
                "id" => $st.'-'.$val['invoice_id'],
                "data" => 'onchange="quick_invoice_update(\'' . $order_id . '\',this);"',
                "class" => "form-control invoice_quick_select",
                "format" => "<div class='invoice_quick_select_div'>{{form}}</div>"
            );
            $invoice_status = $this->functions->print_form($form_invoice, "", false);

            $statusFine = $this->productF->invoiceStatusFind($val['invoice_status']);

            //10 columns
            $count_me = "<span  class='countMe_{$order_name}_{$cur_symbol}'>$val[total_price]</span> $val[price_code]";
            $columns["data"][$key] = array(
                $i,
                "$val[invoice_id]",
                $country,
                $invoiceDate,
                $customer_Name,
                $customer_email,
                $count_me,
                $paymentMethod,
                $orderProcess,
                $divInvoice . $invoice_status,
                "$val[flagged]",
                $action
            );

        }
        if ($recordsTotal == '0') {
            $columns["data"] = array();
        }
       
        //Jason Encode
        echo json_encode($columns);
        // echo $search_sql;
    }
    
    public function order_fetch($page)
    {
        global $_e;
       // print_r($page);
        $start  = (isset($_POST['start']))  ? $_POST['start']               : 0;
        $length = (isset($_POST['length'])) ? $_POST['length']              : 10;
        $draw   = (isset($_POST['draw']))   ? (int)$_POST['draw']           : null;
        $search = (isset($_POST['search']) && $_POST['search'] != '') ? ($_POST['search']['value'])   : null;

$var = explode("-",$search);

if ($var[0]== "p" || $var[0]== "P") {$search=$var[1];}

    $order  = (isset($_POST['order']))  ? $_POST['order'][0]            : 0;

        $order_by_sql = ' ORDER BY `flagged` DESC, order_invoice_pk DESC ';
        if ( $order ) {
            # order by sql generation
            // $columns_array      = array('SNO','INVOICE','Country','INVOICE DATE','CUSTOMER NAME','SOLD PRICE','PAYMENT METHOD','ORDER PROCESS','Invoice Status');
            $order_by           = ($order['column']);
            $order_by_direction = strtoupper($order['dir']);

            switch ($order_by) {
                case '0':
                    # SNO...
                    $order_by_sql = ' ORDER BY order_invoice_pk ' . $order_by_direction;
                    break;
                case '1':
                    # INVOICE...
                    $order_by_sql = ' ORDER BY invoice_id ' . $order_by_direction;
                    break;
                case '2':
                    # Country...
                    $order_by_sql = ' ORDER BY shippingCountry ' . $order_by_direction;
                    break;
                case '3':
                    # INVOICE DATE...
                    $order_by_sql = ' ORDER BY invoice_date ' . $order_by_direction;
                    break;
                case '4':
                    # CUSTOMER NAME...
                    $order_by_sql = ' ORDER BY ac.acc_name ' . $order_by_direction;
                    break;
                case '5':
                    # SOLD PRICE...
                    $order_by_sql = ' ORDER BY total_price ' . $order_by_direction;
                    break;
                case '6':
                    # PAYMENT METHOD...
                    $order_by_sql = ' ORDER BY paymentType ' . $order_by_direction;
                    break;
                case '7':
                    # ORDER PROCESS... CANNOT DO THIS CURRENTLY, BECAUSE THIS COMES FROM ORDER_INVOICE_PRODUCT AND CAN BE MULTIPLE
                    $order_by_sql = ' ORDER BY order_invoice_pk ' . $order_by_direction;
                    break;
                case '8':
                    # Invoice Status...
                    $order_by_sql = ' ORDER BY invoice_status ' . $order_by_direction;
                    break;
                
                default:
                    # SNO...
                    $order_by_sql = ' ORDER BY order_invoice_pk ' . $order_by_direction;
                    break;
            }

        }



        ##### ADDITIONAL CUSTOM FILTER FILEDS #####
$dateCodeFrom = (isset($_POST['dateCodeFrom']) && $_POST['dateCodeFrom'] != '' )  ? $_POST['dateCodeFrom'] . ' 00:00:00 '  : NULL;

$dateCodeTo   = (isset($_POST['dateCodeTo']) && $_POST['dateCodeTo'] != '' )    ? $_POST['dateCodeTo'] . ' 23:59:59 '    : NULL;

        ## make between sql for date
        $between_sql = ( isset($dateCodeFrom) && isset($dateCodeTo) ) ? " `dateTime` BETWEEN '${dateCodeFrom}' AND '${dateCodeTo}' AND " : '' ;

        ## if date range filter is applied then apply its date order by sql
        ## if order is null, and date range is not empty then use between sql order by , else use order by of the datatable column selected
$order_by_sql = ( !$order && $between_sql != '' ) ? ' ORDER BY `flagged` DESC, `dateTime` ASC ' : $order_by_sql;


        #### Search SQL #####
        $country = $this->functions->countryKeyByName($search);
        $country = !empty($country) ? " `shippingCountry` = '{$country}' OR " : "";
         $statusSearch = '';
        $statusSQL = '';
        if ($search && $var[0]!= "p" || $var[0]!= "P") {
            $input = preg_quote("$search", '~');
            $invst = $this->getInvoiceStatusHardwords('Received');
            $arr=array(
                11=>$this->getInvoiceStatusHardwords('Received'),
                2=>$this->getInvoiceStatusHardwords('pending'),
                5=>$this->getInvoiceStatusHardwords('Ready For Packaging'),
                0=>$this->getInvoiceStatusHardwords('Cancel'),
                9=>$this->getInvoiceStatusHardwords('Partia  Delivery Done'),
                6=>$this->getInvoiceStatusHardwords('Full Refunded'),
                10=>$this->getInvoiceStatusHardwords('Awaiting Measures From Customer'),
                7=>$this->getInvoiceStatusHardwords('Order send for factory'),
                3=>$this->getInvoiceStatusHardwords('Complete'),
                1=>$this->getInvoiceStatusHardwords('Denied'),
                4=>$this->getInvoiceStatusHardwords('Order will be sent from factory by DHL EXPRESS'),
                8=>$this->getInvoiceStatusHardwords('PRIORITY 1 URGENT DELIVERY'),
                12=>$this->getInvoiceStatusHardwords('ORDERED TO MAIN STOCK'),
                13=>$this->getInvoiceStatusHardwords('MADE TO MEASURE ORDER'),
                /*8=>_uc($_e['Measure send to factory']),*/
            );
            $result = preg_grep('~' . $input . '~', $arr);
           
            if(!empty($result)){
                $keys = array_keys($result);
                foreach ($keys as $key => $value) {
                    $statusSearch .= '\''.$value.'\',';
                    
                }

                $statusSearch = rtrim($statusSearch, ',');
                $statusSQL = "`invoice_status` IN({$statusSearch}) OR";
            }

            $search_sql = " (  `invoice_id` LIKE '%{$search}%'               OR
                                        $country
                                        `orderUser` = '{$search}'         OR
                                        `invoice_date` LIKE '%{$search}%' OR
                                        `orderStatus`  LIKE '%{$search}%' OR 
                                        `total_price`  LIKE '%{$search}%' OR
                                        `sender_email`  LIKE '%{$search}%' OR
                                        `sender_address`  LIKE '%{$search}%' OR
                                        `sender_phone`  LIKE '%{$search}%' OR
                                        $statusSQL
                                         ac.acc_name   LIKE '%{$search}%') AND";
            $pSearch = '';

        } 
elseif($var['0'] == "p"  || $var['0']== "P"){


       $search_sql = "";
       $pSearch="HAVING `pname`  LIKE '%{$search}%'";



        }else{
            $search_sql = '';
            $pSearch = '';
        }

        //############# GET TOTAL ROWS #############
        $search_sql_all = !empty($search_sql) ? " WHERE " . trim($search_sql, "AND") : '';


        ## DATE RANGE SQL
        // $between_sql = $search_sql == '' ? $between_sql : $between_sql;
        ## make between sql for date
        $between_sql = ( isset($dateCodeFrom) && isset($dateCodeTo) ) ? " `dateTime` BETWEEN '${dateCodeFrom}' AND '${dateCodeTo}' AND " : '' ;

        switch ($page) {

            case 'data_ajax_complete':
                $order_name = "complete";

                 $sql = "SELECT GROUP_CONCAT(order_product_info.order_pName) as pname, order_info.sender_email,order_info.sender_address,order_info.sender_phone,ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id
                JOIN `order_invoice_info` order_info ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                 JOIN `order_invoice_product` order_product_info ON order_product_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                WHERE {$search_sql} {$between_sql} invoice_status = '3' GROUP by order_info.order_invoice_id $pSearch {$order_by_sql}";
                

                $sql .= " LIMIT $start,$length ";
                

                // $sql = " SELECT ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                //         LEFT OUTER JOIN `accounts_user` ac ON CAST(ac.acc_id as CHAR(12)) = `order_invoice`.`orderUser` 
                //         WHERE {$search_sql} {$between_sql} invoice_status = '3' {$order_by_sql} ";

                ############# GET TOTAL ROWS #############
                $recordsTotal = $this->get_total_rows($sql);//$this->get_total_rows($sql);
               // print_r($recordsTotal);
                // echo $sql;
                break;
            case 'data_ajax_invoices':
                $order_name = "invoices";

                # now added user name searching in all
                // # specific search sql, adding user name searching by joining user account table
                // $search_sql = ($search) ? trim($search_sql, ' AND') : '';
                // $search_sql = ($search) ? $search_sql . " OR ac.acc_name LIKE '%{$search}%' AND" : $search_sql;

                $sql = " SELECT GROUP_CONCAT( order_product_info.order_pName) as pname,order_info.sender_email,order_info.sender_address,order_info.sender_phone,ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                        LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                        LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id 
                        JOIN `order_invoice_info` order_info ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk`

                           JOIN `order_invoice_product` order_product_info ON order_product_info.order_invoice_id = `order_invoice`.`order_invoice_pk`

                        WHERE {$search_sql} {$between_sql} orderStatus != 'inComplete' AND invoice_status != '3' AND invoice_status != '0' GROUP by order_info.order_invoice_id $pSearch {$order_by_sql} ";
                        
                        

                // $sql = " SELECT ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                //          LEFT OUTER JOIN `accounts_user` ac ON CAST(ac.acc_id as CHAR(12)) = `order_invoice`.`orderUser` 
                //          WHERE {$search_sql} {$between_sql} orderStatus != 'inComplete' AND invoice_status != '3' AND invoice_status != '0' {$order_by_sql} ";

                ############# GET TOTAL ROWS #############
                $recordsTotal = $this->get_total_rows($sql);
               // print_r($recordsTotal);
                $sql .= " LIMIT $start,$length ";
                // echo $sql;
                break;
            case 'data_ajax_cancel':
                $order_name = "cancel";
                
                # doing this, because we are changing the search sql, for cancelled orders.
                $search_sql  = trim($search_sql, 'AND');
                $search_sql  = ( isset($search_sql) && $search_sql != '' ) ? "  AND {$search_sql} " : '';
                // $between_sql = ( $search_sql == '' && $between_sql != ''  ) ? ' AND ' . rtrim($between_sql,' AND ') : rtrim($between_sql,' AND ');
                // if ( $search_sql == '' && $between_sql != '' ) {
                    // $between_sql = rtrim($between_sql,' AND ');
                // } elseif () {
                    $between_sql = rtrim($between_sql,' AND ');
                // }
                    
                    if ( $between_sql != '' ) {
                        $between_sql = ' AND ' . $between_sql;
                    }
                $sql = " SELECT GROUP_CONCAT( order_product_info.order_pName) as pname,order_info.sender_email,order_info.sender_address,order_info.sender_phone,ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                        LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                        LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id 
                        JOIN `order_invoice_info` order_info ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk`

                            JOIN `order_invoice_product` order_product_info ON order_product_info.order_invoice_id = `order_invoice`.`order_invoice_pk`


                        WHERE `invoice_status` = '0' {$search_sql} {$between_sql} GROUP by order_info.order_invoice_id $pSearch {$order_by_sql} ";
                        
                // $sql = "SELECT ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                //         LEFT OUTER JOIN `accounts_user` ac ON CAST(ac.acc_id as CHAR(12)) = `order_invoice`.`orderUser`
                //         WHERE invoice_status = '0' {$search_sql} {$between_sql} {$order_by_sql} ";
                
                ############# GET TOTAL ROWS #############
                $recordsTotal = $this->get_total_rows($sql);
               // print_r($recordsTotal);
                $sql .= " LIMIT $start,$length ";
                // echo $sql;
                break;
            case 'data_ajax_incomplete':
                //print_r();
               // $statusSQL = '';
                $search_sql1 = " ( `invoice_id` LIKE '%{$search}%'        OR
                                        $country
                                        `orderUser` = '{$search}'         OR
                                        `invoice_date` LIKE '%{$search}%' OR
                                        `orderStatus`  LIKE '%{$search}%' OR 
                                        `total_price`  LIKE '%{$search}%' OR
                                        $statusSQL
                                         ac.acc_name   LIKE '%{$search}%' ) AND";

                $order_name = "incomplete";
                $sql = "SELECT GROUP_CONCAT( order_product_info.order_pName) as pname,ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                        LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                        LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id  
                         JOIN `order_invoice_product` order_product_info ON order_product_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                        WHERE {$search_sql1} {$between_sql} orderStatus = 'inComplete' GROUP BY order_product_info.order_invoice_id $pSearch {$order_by_sql} ";

                // $sql = "SELECT ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                //         LEFT OUTER JOIN `accounts_user` ac ON CAST(ac.acc_id as CHAR(12)) = `order_invoice`.`orderUser` 
                //         WHERE {$search_sql} {$between_sql} orderStatus = 'inComplete' {$order_by_sql} ";
                
                

                ############# GET TOTAL ROWS #############
                  $recordsTotal = $this->get_total_rows($sql);
                  //print_r($recordsTotal);
                 //$recordsTotal = 2;

                
                $sql .= " LIMIT $start,$length ";
            break;
                default: //all
           
                $order_name = "all";
                
                // # adding between sql with $search_sql_all
                 $search_sql_all = ( $search_sql_all == '' && $between_sql != '' ) ? ' WHERE ' . rtrim($between_sql, 'AND ') : $search_sql_all . ' AND ' . rtrim($between_sql, 'AND ');
                // # if no between sql then remove the AND which gets appended everytime before between_sql
                 $search_sql_all = ( $between_sql == '' ) ? str_replace(' AND ','',$search_sql_all) : $search_sql_all;
                




                   $sql = "SELECT GROUP_CONCAT( order_product_info.order_pName) as pname, order_info.sender_email,order_info.sender_address,order_info.sender_phone,ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
                        LEFT OUTER JOIN `temp_accounts_user` tau ON tau.acc_id_str = `order_invoice`.`orderUser`
                        LEFT OUTER JOIN `accounts_user` ac       ON ac.acc_id = tau.acc_id 
                        JOIN `order_invoice_info` order_info ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                          JOIN `order_invoice_product` order_product_info ON order_product_info.order_invoice_id = `order_invoice`.`order_invoice_pk`
                        {$search_sql_all} GROUP BY order_info.order_invoice_id $pSearch {$order_by_sql} "; 
                        
                $sql .= " LIMIT $start,$length ";
                        
 

                ############# GET TOTAL ROWS #############
                // $sql_two = "SELECT `order_invoice_pk` FROM `order_invoice` " . $search_w;
                 
                $recordsTotal = $this->get_total_rows($sql);
                //$this->get_total_rows($sql_count);
              //  print_r($recordsTotal); 


                break;
        }

        // ###### Get Data ####
        // $sql2 = "SELECT ac.acc_id,ac.acc_name,ac.acc_email,order_invoice.* FROM `order_invoice`
        //          LEFT OUTER JOIN `accounts_user` ac ON CAST(ac.acc_id as CHAR(12)) = `order_invoice`.`orderUser` 
        //          WHERE  `order_invoice`.`dateTime` BETWEEN '2016-10-1 00:00:00' AND '2016-10-29 23:59:59'  ORDER BY `order_invoice`.`dateTime` ASC";
         
        $data = $this->dbF->getRows($sql);

        $columns = array();
        if ($draw == 1) {
            $draw - 1;
        }

        $columns["draw"] = $draw + 1;
        $columns["recordsTotal"] = $recordsTotal; //total record,
        $columns["recordsFiltered"] = $recordsTotal; //filter record, same as total record, then next button will appear

        $i = $start;
        foreach ($data as $key => $val) {
            $i++;
            $divInvoice = '';
            $invoiceStatus = $this->productF->invoiceStatusFind($val['invoice_status']);
            $st = $val['invoice_status'];
            $onclick = " onclick= 'show_quick_invoice(this);' ";
            if ($st == 0) $divInvoice = "<div  class='btn invoice_status btn-danger  btn-sm ' style='min-width:80px;'>$invoiceStatus</div>";
            else if ($st == 1) $divInvoice = "<div class='btn invoice_status btn-warning  btn-sm' style='min-width:80px;'>$invoiceStatus</div>";
            else if ($st == 2) $divInvoice = "<div $onclick class='btn invoice_status btn-info  btn-sm' style='min-width:80px;'>$invoiceStatus</div>";
            else if ($st == 3) $divInvoice = "<div $onclick class='btn invoice_status btn-success  btn-sm' style='min-width:80px;'>$invoiceStatus</div>"; 
             else if ($st == 6) $divInvoice = "<div  class='btn invoice_status btn-success  btn-sm' style='min-width:80px;'>$invoiceStatus</div>";
            else $divInvoice = "<div $onclick class='btn invoice_status btn-default  btn-sm' style='min-width:80px;'>$invoiceStatus</div>";


            $invoiceDate = date('Y-m-d H:i:s', strtotime($val['invoice_date']));
            $invoiceId = $val['order_invoice_pk'];

            $country = $val['shippingCountry'];
            $country = $this->functions->countryFullName($country);

            $orderInfo = $this->order_c->orderInvoiceInfo($invoiceId);
            $orderUser_id = $val['orderUser'];
            $customer_email = $orderInfo['sender_email'];
            $customer_Name = $orderInfo['sender_name'];
            $sender_address = $orderInfo['sender_address'];
            $sender_phone = $orderInfo['sender_phone'];
            if (is_numeric($orderUser_id)) {
                $customer_Name = empty($customer_Name) ? "---" : $customer_Name;
                $customer_Name = "<a href='-webUsers?page=edit&userId=$orderUser_id' class='btn btn-info btn-sm' target='_blank'>$customer_Name</a>";
            }

           
            //Check order process or not,, if single product process it show 1
            $sqlbtn = "SELECT * FROM `order_invoice_product` WHERE `order_invoice_id` = '$invoiceId' AND `order_process` = '1'";
            $this->dbF->getRow($sqlbtn);
            $orderProcess = "<div class='btn btn-danger  btn-sm' style='width:50px;'>" . _uc($_e['NO']) . "</div>";
            if ($this->dbF->rowCount > 0) {
                //make sure all order process or custome process
                $sqlbtn = "SELECT * FROM `order_invoice_product` WHERE `order_invoice_id` = '$invoiceId' AND `order_process` = '0' ";
                $this->dbF->getRow($sqlbtn);
                if ($this->dbF->rowCount > 0) {
                    //Ja = yes
                    $orderProcess = "<div class='btn btn-warning  btn-sm' style='width:50px;'>" . _uc($_e['Yes']) . "</div>";
                } else {
                    $orderProcess = "<div class='btn btn-success  btn-sm' style='width:50px;'>" . _uc($_e['Yes']) . "</div>";
                }
            }

            $days = $this->functions->ibms_setting('order_invoice_deleteOn_request_after_days');
            $link = $this->functions->getLinkFolder();
            $date = date('Y-m-d', strtotime($val['dateTime']));
            $minusDays = date('Y-m-d', strtotime("-$days days"));

            $inoivcePdf = '';
            if ($val['orderStatus'] != 'inComplete') {
                $inoivcePdf = " <a href='../invoicePrint?mailId=$invoiceId' target='_blank' class='btn'>
                                    <i class='fa fa-file-pdf-o'></i>
                               </a>";
            }

            $paymentMethod = $val['paymentType'];
            $paymentMethod = $this->productF->paymentArrayFind($paymentMethod);
            $cur_symbol = md5($val['price_code']);

            $action = "<div class='btn-group btn-group-sm'>
                       $inoivcePdf
                        <a href='?pId=$invoiceId' data-method='post' data-action='?page=edit' class='btn'>
                            <i class='glyphicon glyphicon-edit'></i>
                        </a>";
            if ($date < $minusDays) {
                $action .= "<a class='btn' data-id='$invoiceId' onclick='return delOrderInvoice(this);'>
                         <i class='glyphicon glyphicon-trash trash'></i>
                         <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
                     </a>";
            } else {
                $action .= "<a class='btn'>
                         <i class='glyphicon glyphicon-trash '></i>
                         <i class='glyphicon glyphicon-ban-circle combineicon'></i>
                     </a>";
            }

            if($val['flagged'] == 1){
                $action .= "<a class='btn' data-id='$invoiceId' onclick='return removeFlagOrderToTop(this);'>
                            <i class='glyphicon glyphicon-pushpin'></i>
                        </a>";
            }else{
                $action .= "<a class='btn' data-id='$invoiceId' onclick='return flagOrderToTop(this);'>
                            <i class='glyphicon glyphicon-pushpin'></i>
                        </a>";
            }

            

            $order_id = $val['order_invoice_pk'];
            $form_invoice = array();
            $form_invoice[] = array(
                "type" => "select",
                "array" => $this->productF->invoiceStatusArray(),
                "select" => $val['invoice_status'],
                "id" => $st.'-'.$val['invoice_id'],
                "data" => 'onchange="quick_invoice_update(\'' . $order_id . '\',this);"',
                "class" => "form-control invoice_quick_select",
                "format" => "<div class='invoice_quick_select_div'>{{form}}</div>"
            );
            $invoice_status = $this->functions->print_form($form_invoice, "", false);

            $statusFine = $this->productF->invoiceStatusFind($val['invoice_status']);
          
           //10 columns
            $count_me = "<span  class='countMe_{$order_name}_{$cur_symbol}'>$val[total_price]</span> $val[price_code]";
            $columns["data"][$key] = array(
                $i,
                "$val[invoice_id]",
                "$val[pname]",
                $sender_address,
                $country,
                $sender_phone,
                $invoiceDate,
                $customer_Name,
                $customer_email,
                $count_me,
                $paymentMethod,
                $orderProcess,
                $divInvoice . $invoice_status,
                "$val[flagged]",
                $action
            );

        }
        if ($recordsTotal == '0') {
            $columns["data"] = array();
        }
       
        //Jason Encode
      //  echo $sql;    
          echo json_encode($columns);
  
    }
    
    protected function count_total_number($sql_count){
        $count = $this->dbF->getRow($sql_count);
        return $count[0];
    }
    protected function get_total_rows($sql, $search_sql = '')
    {
         $search_w = !empty($search_sql) ? " WHERE " . trim($search_sql, "AND") : '';
        $sql  = $sql . ' ' . $search_w;
        $data = $this->dbF->getRows($sql);
        return $recordsTotal = $this->dbF->rowCount;
    }


public function bestSellerNewsletter(){

$sql = "SELECT pid FROM `order_product_info` where order_date >= DATE(NOW()) - INTERVAL 30 DAY GROUP BY pid ORDER BY `order_product_info`.`order_date` DESC";

$res = $this->dbF->getRows($sql);

// $res = ($res['pid']);

$temp = '<style type="text/css">

/*pop side*/

/*pop side*/

.pop_side {
.pop_content {
position: relative;
width: 45%;
padding-top: 20px;
text-align: center;
display: inline-block;
vertical-align: top;
margin-right: 2%;
}
}

.pop_side_top {
position: relative;
width: 100%;
border-bottom: 1px solid #e1e2e4;
padding-bottom: 15px;
}

.pop_side_top i {
font-size: 25px;
color: #42474b;
display: inline-block;
vertical-align: middle;
margin-right: 10px;
}

.number_side {
position: absolute;
right: 0px;
top: 0px;
font-size: 25px;
color: #42474b;
}

.number_side span {
font-size: 34px;
color: #42474b;
font-family: "ubuntubold";
display: inline-block;
vertical-align: top;
}

.pop_content {
position: relative;
width: 45%;
display: inline-block;
vetical-align: top;
margin-right: 2%;
text-align: center;
}

.pop_content:nth-child(even) {
margin-right: 0%;
}

.pop_img {
position: relative;
display: block;
width: 35%;
margin: 0 auto;
}

.pop_img img {
width: 100%;
}

.pop_slide {
position: relative;
width: 100%;
}

.pop_img1 {
position: relative;
width: 100%;
}

.pop_content_main {
display: inline-block;
vertical-align: middle;
width: 55%;
text-align: center;
margin: 15px 0px;
}

.pop_content_main_btn {
position: relative;
width: 215px;
text-align: center;
background: #42474b;
box-shadow: 5px 5px 0px #a2a6af;
border-radius: 5px 5px;
margin: 0 auto;
transition: .7s;
margin-bottom: 20px;
}

.pop_content_main_btn a {
display: block;
color: #ffffff;
font-size: 16px;
padding: 10px 0px;
}

.pop_content_main_btn:hover {
background: #7ebc41;
}

.selection_side {
position: relative;
width: 100%;
color: #42474b;
font-size: 16px;
}

.pop_content_main .select_box4 {
width: 215px;
}

.pop_content_main .select_box4 .dropdown_select dt a {
height: 42px !important;
line-height: 42px !important;
border: 1px solid #6b6f72 !important;
box-shadow: 3px 3px 0px #363b3f;
border-radius: 2px 2px;
background: #ffffff url(../webImages/arrow.png) no-repeat scroll right center;
}

.pop_price {
position: relative;
width: 100%;
color: #eb333d;
font-size: 30px;
text-align: center;
font-weight: bold;
}

.pop_price span {
color: #a0a9b0;
margin: 0px 5px;
display: block;
font-style: normal;
font-size: 16px;
text-decoration: line-through;
font-weight: normal;
font-family: sans-serif;
}

.button_side {
position: relative;
display: inline-block;
vertical-align: middle;
width: 100%;
margin-top: 5px;
}

.button_side1 {
position: relative;
display: inline-block;
vertical-align: top;
width: 45%;
background: #42474b;
padding: 10px 0px;
border-radius: 2px 2px;
text-align: center;
margin-right: 2%;
}

.button_side1 a {
display: block;
color: #ffffff;
font-size: 16px;
}

.button_side2 {
position: relative;
display: inline-block;
vertical-align: top;
width: 60%;
background: #7ebc41;
padding: 10px 0px;
border-radius: 2px 2px;
text-align: center;
}

.button_side2 a {
display: block;
color: #ffffff;
font-size: 16px;
}

.pop_btn {
position: absolute;
left: 0px;
top: 50%;
width: 100%;
z-index: 1;
}

.pop_btn1 {
position: absolute;
left: 1%;
width: 16px;
height: 28px;
background: url(../webImages/news_left1.png);
cursor: pointer;
}

.pop_btn2 {
position: absolute;
right: 1%;
width: 16px;
height: 28px;
background: url(../webImages/news_right1.png);
cursor: pointer;
}

.pop_close {
position: absolute;
right: 10px;
top: 10px;
cursor: pointer;
font-size: 25px;
}


/*pop side*/
</style>

<br><br>
';


foreach($res as $pId){


$id = $pId['pid'];


$pLink = WEB_URL.'/detail.php?pId='.$id;

$name=$this->productF->getProductName($id);
$img = $this->productF->productSpecialImage($id,'main');
$img    = $this->functions->resizeImage($img,'auto',160,false);
$price = $this->productF->productPrice($id);
$currencyId =   $price['propri_cur_id'];
$symbol     =   $this->productF->currencySymbol($currencyId);
$priceP =   $price['propri_price'];

$discount       =   $this->productF->productDiscount($id,$currencyId);
@$discountFormat=   $discount['discountFormat'];
@$discountP     =   $discount['discount'];

$discountPrice  =   $this->productF->discountPriceCalculation($priceP,$discount);
// $discountPrice  =   $SpecPrice;
// $newPrice       =   $priceP - $discountPrice;
$newPrice       =   $discountPrice;

$priceP         .= ' '.$symbol;
$newPrice       .= ' '.$symbol;

if($newPrice    !=  $priceP){
$hasDiscount = true;
$oldPriceDiv = '<span class="oldPrice">'.$priceP.'</span>';
$newPriceDiv = $newPrice;
}else{
$oldPriceDiv= "";
$newPriceDiv = $priceP;
}

$buyToT = $this->dbF->hardWords('Buy To', false);

$temp .= "<div class='pop_content'>
<div class='pop_img'>
<div class='pop_img1'><img alt='' src='$img' /></div>
<!-- pop_img1 close --></div>
<!-- pop_img close -->

<div class='pop_content_main'>
<div class='selection_side'>$name</div>
<!-- selection_side close -->

<div class='pop_price'>
$newPriceDiv $oldPriceDiv
</div>
<!-- pop_price close -->

<div class='button_side'><!-- <div class='button_side1'><a href='".$pLink."'>No thanks !</a></div> --><!-- button_side1 close -->
<div class='button_side2'><a href='".$pLink."'>".$buyToT."</a></div>
<!-- button_side1 close --></div>
<!-- button_side close --></div>
<!-- pop_content_main close --></div>";

// $temp .= "
//     <div class='allProductInfo'>
//         <div class='pImg'>
//             <a href='".$pLink."'><img src='$img'/></a>
//         </div>
//         <div class='pName'>
//             <a href='".$pLink."'>$name
//                 <br>
//                    $oldPriceDiv $newPriceDiv
//             </a>
//         </div>
//       </div>
// ";

// return $pId;
}

// $this->dbF->prnt($temp);
// exit;
// 
return $temp;
}

    public function quick_invoice_update()
    {
        global $_e;
        if (!empty($_POST["orderid"]) && isset($_POST["invoice"])) {
            $order_id = $_POST["orderid"];
            $pre_st = explode('-',$_POST['prev_status']);
            $actual_invId = $pre_st[1];
            $previous_order = $pre_st[0];
            $previous_status  =   $this->productF->invoiceStatusFind($previous_order);
            
            $id = $order_id;
            $invoice_id = $_POST["invoice"];
            $new_st  =   $this->productF->invoiceStatusFind($invoice_id);
            $inv = $invoice_id;

            if($previous_order != $invoice_id){
                    $log_des = "Invoice status changed from $previous_status to $new_st";
                    $this->functions->orderlog(_js(_uc($_e['Invoice Status Updated'])),_js(_uc($_e['Invoice'])),$actual_invId,$log_des);
                }

            $sql = "SELECT * FROM `order_invoice` WHERE order_invoice_pk = '$id'";
            $dataTrans = $this->dbF->getRow($sql);

            $paymentType = $dataTrans['paymentType'];
            $paymentInfo = $dataTrans['payment_info'];
            $_POST['trackNo'] = $dataTrans['trackNo'];

            if (($inv == '0' || $inv == '3' || $inv == '6')) {
                $sql = "SELECT inTransaction,rsvNo,rsvNo_done,invoice_id FROM `order_invoice` WHERE order_invoice_pk = '$id' AND inTransaction!=''";
                $dataTrans = $this->dbF->getRow($sql);

                if ( $this->dbF->rowCount > 0 && ($paymentType == '2') ) {
                    $rsvNo = $dataTrans['rsvNo'];
                    $rsvNo_done = $dataTrans['rsvNo_done'];
                    $inTransaction = trim($dataTrans['inTransaction']);
                    $invv_id = $dataTrans['invoice_id'];
                    
                    $sql1 = "SELECT * FROM `order_extra_amount` WHERE invoice_no = '$invv_id' AND inTransaction!=''";
                    $extraTrans = $this->dbF->getRows($sql1);
                    
                    if( $this->dbF->rowCount > 0 && ($paymentType == '2') ){
                        foreach ($extraTrans as $key => $value) {
                            $extraPaymentType = $value['paymentType'];
                            $extraPaymentInfo = $value['payment_info'];
                            $extraId          = $value['id'];
                            $extrarsvNo       = $value['rsvNo'];
                            $extrarsvNo_done  = $value['rsvNo_done'];
                            $extrainTransaction = trim($value['inTransaction']);
                            /* ------- ---------- KLARNA ------------- ------------ */
                            $klarnaReturnExtra = $this->handelKlarna($extraId, $extrainTransaction, $inv, $extraPaymentType, $extrarsvNo, $extrarsvNo_done, true);

                            $returnKlarnaExtra = $klarnaReturnExtra;
                            /* ------- ----------KLARNA End------------- ------------ */
                            $paymentInfoExtra = $extraPaymentInfo . "\n $returnKlarnaExtra";

                            $sql0 = "UPDATE `order_extra_amount` SET invoice_status = '$invoice_id',payment_info = '$paymentInfoExtra'  WHERE invoice_no = '$invv_id' ";
                            $this->dbF->setRow($sql0);
                            
                        }
                    }
                    
                    /* ------- ---------- KLARNA ------------- ------------ */
                    $klarnaReturn = $this->handelKlarna($id, $inTransaction, $inv, $paymentType, $rsvNo, $rsvNo_done);
                    $returnKlarna = $klarnaReturn;
                    /* ------- ----------KLARNA End------------- ------------ */
                    $paymentInfo = $paymentInfo . "\n $returnKlarna";
                }
            }

            $sql = "UPDATE `order_invoice` SET invoice_status = ?,payment_info = ?  WHERE order_invoice_pk = ? ";
            $this->dbF->setRow($sql, array($invoice_id, $paymentInfo, $order_id));

            if ($this->dbF->rowCount > 0) {
                echo "1";
                {
                    $sql = "SELECT * FROM `order_invoice_info` WHERE order_invoice_id = '$id'";
                    $data_info = $this->dbF->getRow($sql);

                    $link       = WEB_URL."/viewOrder?view=$id&orderId=".$this->functions->encode($id);
                    $invStatus  =   $this->productF->invoiceStatusFind($inv);

                    $to         =  $data_info['sender_email'];
                    $invoice    =   $this->functions->ibms_setting('invoice_key_start_with');
                    $mailArray['link']        =   $link;
                    $mailArray['invoiceStatus'] =   $invStatus;
                    $mailArray['invoiceNumber'] =   $invoice."".$id;
                    $mailArray["other"]['shippingNumber'] =  $_POST['trackNo'];


                     $returnProArr = $this->bestSellerNewsletter();
// var_dump($returnProArr);
// die;
$mailArray['best_selling_products_last_30_days'] =   $returnProArr;




                    $this->functions->send_mail($to,'','','orderUpdate','',$mailArray);

 $sql_int_qty="SELECT * FROM removeqty WHERE `order` = '$order_id' ";
    $qty_data = $this->dbF->getRow($sql_int_qty);

        if($this->dbF->rowCount > 0){
    
     if ($qty_data['qty'] != '0' ) {
  
  if ($inv == '0' || $inv == '1' || $inv == '6' ) {

//Deduct Stock qty
 $this->functions->require_once_custom('orderOrder');
$orderInvoiceClass  =   new order();
$returnStatus = $orderInvoiceClass->stockAddAfterOrderStatusChange($order_id,false);
if($returnStatus===false){
// throw new Exception("");
// return false;
}

}
}
}



                }
            } else {
                echo "0";
            }
        }
    }

    public function handelKlarna($orderId,$inTransaction,$inv,$paymentType,$rsvNo,$rsvNo_done,$extra = false){
        //All work will Handel Accordingly
        $this->functions->require_once_custom('Class.myKlarna.php');
        $klarnaClass    = new myKlarna();
        return $klarnaClass->klarnaInvoices($orderId,$inTransaction,$inv,$paymentType,$rsvNo,$rsvNo_done,$extra);
    }

    public function sendMadeMeasure(){
        $to = $_POST['email'];
        $inv_id = $_POST['inv_id'];

        

        $this->functions->send_mail($to,'','','madeToMeasurePdf','','');

        $sql        =   "SELECT * FROM email_letters WHERE email_type = 'madeToMeasurePdf' ";
        $letterData =   $this->dbF->getRow($sql);

        $log_desc = "<p>Email Sent To: $to  </p>".$letterData['message'];

        $this->functions->orderlog('Made To Measure Email Sent','Invoice',$inv_id,$log_des);
    }

    public function getTemplateDetail(){
        $temp_id = $_POST['temp_id'];

        $sql = "SELECT * FROM `email_letters` WHERE `id` = ?";
        $res = $this->dbF->getRow($sql, array($temp_id));

        echo '<div class="email_temp">';
        echo '<p id="title">'.$res['event'].'</p>';
        echo '<p id="from_name">'.$res['from_name'].'</p>';
        echo '<p id="from_mail">'.$res['from_mail'].'</p>';
        echo '<p id="subject">'.$res['subject'].'</p>';
        echo '<div id="message">'.$res['message'].'</div>';
        echo '</div>';

    }

    public function sendTemplateEmail(){
        $titleHtml = $_POST['titleHtml'];
        $nameHtml = $_POST['nameHtml'];
        $mailHtml = $_POST['mailHtml'];
        $subjectHtml = $_POST['subjectHtml'];
        $email_msg = $_POST['email_msg'];
        $to = $_POST['senderr_email'];
        $email_temp = $_POST['email_temp'];
        $giftCard = (isset($_POST['giftCard']) && !empty($_POST['giftCard'])) ? $_POST['giftCard'] : '';

        $inv_id = $_POST['invoic_id'];

        $array = array();
        $msgType = '';
        $array['fromBeforeAt'] = $mailHtml;
        $array['fromName'] = $nameHtml;
        if(!empty($giftCard) && $email_temp == 257){
            $array['giftCard'] = $giftCard;
            $msgType = 'GiftCardFromOrder';
        }

        $mail = $this->functions->send_mail($to,$subjectHtml,$email_msg,$msgType,'',$array);

        $log_desc = "<p>Status : $subjectHtml</p><p>Email Sent To: $mailHtml </p>".$email_msg;

        $this->functions->orderlog("Email sent to customer with status",'Invoice',$inv_id,$log_desc);
    }

    public function create_comment(){
        // print_r($_POST);
        $inv_id = $_POST['orderIdint'];
        $invoiceStatus = $_POST['invoiceStatus'];
        $int_comTxt = $_POST['int_comTxt'];
        $user_email = $_SESSION['_email'];

        $sql = "INSERT INTO `internal_comment_orderInvoice`(`invoice_id`, `status`, `comment`, `user_email`) VALUES (?,?,?,?)";
        $res = $this->dbF->setRow($sql, array($inv_id,$invoiceStatus,$int_comTxt,$user_email));

        print_r(array($inv_id,$invoiceStatus,$int_comTxt,$user_email));
    //     if ($this->dbF->rowCount) echo '1';
    //         else echo '0';
    }




public function freeGiftProducts($invoiceId,$orderedProducts=false){

$sql = "SELECT pro_ids,id FROM `free_gift_inv` WHERE `txt_inv_id` = ? and status =? ORDER BY `free_gift_inv`.`id` DESC";
$res = $this->dbF->getRow($sql, array($invoiceId,0));

$offerProducts = ($res['pro_ids']);

$temp = '<style type="text/css">/*pop side*/

/*pop side*/

.pop_side {
.pop_content {
position: relative;
width: 45%;
padding-top: 20px;
text-align: center;
display: inline-block;
vertical-align: top;
margin-right: 2%;
}
}

.pop_side_top {
position: relative;
width: 100%;
border-bottom: 1px solid #e1e2e4;
padding-bottom: 15px;
}

.pop_side_top i {
font-size: 25px;
color: #42474b;
display: inline-block;
vertical-align: middle;
margin-right: 10px;
}

.number_side {
position: absolute;
right: 0px;
top: 0px;
font-size: 25px;
color: #42474b;
}

.number_side span {
font-size: 34px;
color: #42474b;
font-family: "ubuntubold";
display: inline-block;
vertical-align: top;
}

.pop_content {
position: relative;
width: 45%;
display: inline-block;
vetical-align: top;
margin-right: 2%;
text-align: center;
}

.pop_content:nth-child(even) {
margin-right: 0%;
}

.pop_img {
position: relative;
display: block;
width: 35%;
margin: 0 auto;
}

.pop_img img {
width: 100%;
}

.pop_slide {
position: relative;
width: 100%;
}

.pop_img1 {
position: relative;
width: 100%;
}

.pop_content_main {
display: inline-block;
vertical-align: middle;
width: 55%;
text-align: center;
margin: 15px 0px;
}

.pop_content_main_btn {
position: relative;
width: 215px;
text-align: center;
background: #42474b;
box-shadow: 5px 5px 0px #a2a6af;
border-radius: 5px 5px;
margin: 0 auto;
transition: .7s;
margin-bottom: 20px;
}

.pop_content_main_btn a {
display: block;
color: #ffffff;
font-size: 16px;
padding: 10px 0px;
}

.pop_content_main_btn:hover {
background: #7ebc41;
}

.selection_side {
position: relative;
width: 100%;
color: #42474b;
font-size: 16px;
}

.pop_content_main .select_box4 {
width: 215px;
}

.pop_content_main .select_box4 .dropdown_select dt a {
height: 42px !important;
line-height: 42px !important;
border: 1px solid #6b6f72 !important;
box-shadow: 3px 3px 0px #363b3f;
border-radius: 2px 2px;
background: #ffffff url(../webImages/arrow.png) no-repeat scroll right center;
}

.pop_price {
position: relative;
width: 100%;
color: #eb333d;
font-size: 30px;
text-align: center;
font-weight: bold;
}

.pop_price span {
color: #a0a9b0;
margin: 0px 5px;
display: block;
font-style: normal;
font-size: 16px;
text-decoration: line-through;
font-weight: normal;
font-family: sans-serif;
}

.button_side {
position: relative;
display: inline-block;
vertical-align: middle;
width: 100%;
margin-top: 5px;
}

.button_side1 {
position: relative;
display: inline-block;
vertical-align: top;
width: 45%;
background: #42474b;
padding: 10px 0px;
border-radius: 2px 2px;
text-align: center;
margin-right: 2%;
}

.button_side1 a {
display: block;
color: #ffffff;
font-size: 16px;
}

.button_side2 {
position: relative;
display: inline-block;
vertical-align: top;
width: 60%;
background: #7ebc41;
padding: 10px 0px;
border-radius: 2px 2px;
text-align: center;
}

.button_side2 a {
display: block;
color: #ffffff;
font-size: 16px;
}

.pop_btn {
position: absolute;
left: 0px;
top: 50%;
width: 100%;
z-index: 1;
}

.pop_btn1 {
position: absolute;
left: 1%;
width: 16px;
height: 28px;
background: url(../webImages/news_left1.png);
cursor: pointer;
}

.pop_btn2 {
position: absolute;
right: 1%;
width: 16px;
height: 28px;
background: url(../webImages/news_right1.png);
cursor: pointer;
}

.pop_close {
position: absolute;
right: 10px;
top: 10px;
cursor: pointer;
font-size: 25px;
}


/*pop side*/
</style>

<br><br>
';

// =" . $this->functions->encode($customId);

$pLink = WEB_URL.'/giftOffer.php?invoice='.$this->functions->encode($res['id']);

// foreach($offerProducts as $pId => $SpecPrice){

    // for ($i=0; $i < count($offerProducts); $i++) { 

     $applied_for_fields_array = explode(',', $offerProducts);


foreach ($applied_for_fields_array as $field) {





    
$id = $field;
$name=$this->productF->getProductName($id);
$img = $this->productF->productSpecialImage($id,'main');
$img    = $this->functions->resizeImage($img,'auto',160,false);
$price = $this->productF->productPrice($id);
$currencyId =   $price['propri_cur_id'];
$symbol     =   $this->productF->currencySymbol($currencyId);
$priceP =   $price['propri_price'];

$discount       =   $this->productF->productDiscount($id,$currencyId);
@$discountFormat=   $discount['discountFormat'];
@$discountP     =   $discount['discount'];

$discountPrice  =   $this->productF->discountPriceCalculation($priceP,$discount);
// $discountPrice  =   $SpecPrice;
// $newPrice       =   $priceP - $discountPrice;
$newPrice       =   $discountPrice;

$priceP         .= ' '.$symbol;
$newPrice       .= ' '.$symbol;

if($newPrice    !=  $priceP){
$hasDiscount = true;
$oldPriceDiv = '<span class="oldPrice">'.$priceP.'</span>';
$newPriceDiv = $newPrice;
}else{
$oldPriceDiv= "";
$newPriceDiv = $priceP;
}

$buyToT = $this->dbF->hardWords('Buy To', false);
$buyToFree = $this->dbF->hardWords('Free Gift', false);

$temp .= "<div class='pop_content'>
<div class='pop_img'>
<div class='pop_img1'><img alt='' src='$img' /></div>
<!-- pop_img1 close --></div>
<!-- pop_img close -->

<div class='pop_content_main'>
<div class='selection_side'>$name</div>
<!-- selection_side close -->


<div class='button_side'>


 <div class='button_side1'><a href='".$pLink."'>".$buyToFree."</a></div>



<!-- button_side1 close -->
<div class='button_side2'><a href='".$pLink."'>".$buyToT."</a></div>
<!-- button_side1 close --></div>
<!-- button_side close --></div>
<!-- pop_content_main close --></div>";

// $temp .= "
//     <div class='allProductInfo'>
//         <div class='pImg'>
//             <a href='".$pLink."'><img src='$img'/></a>
//         </div>
//         <div class='pName'>
//             <a href='".$pLink."'>$name
//                 <br>
//                    $oldPriceDiv $newPriceDiv
//             </a>
//         </div>
//       </div>
// ";
}

// $this->dbF->prnt($temp);
// exit;
// 
return $temp;
}

  public function create_pro_ajax(){
    // global $productClass;
        // print_r($_POST);
        // die;
        $inv_id = $_POST['txt_inv_id'];
        $txt_inv_pro_qty = $_POST['txt_inv_pro_qty'];
        // $int_comTxt = $_POST['int_comTxt'];
        // $user_email = $_SESSION['_email'];

 // $sql = "DELETE FROM `free_gift_inv` WHERE txt_inv_id= '$inv_id'";
 //                    $this->dbF->setRow($sql);

    $data = $_POST['signUp']['ids'];
    // $this->dbF->prnt($data);
    $val = "";

    for ($i=0; $i <count($data); $i++) { 
         $val= implode(',', $data);
    }
    // foreach ($data as $key => $value) {                      
    // if(is_array($value)){                      
    // $val= implode(',', $value);
    // }
    // }
    $validity = $this->functions->ibms_setting('saleOfferValidity');
                $validity_date = date('Y-m-d', strtotime("+".$validity." days"));


        $sql = "INSERT INTO `free_gift_inv`(`txt_inv_id`, `txt_inv_pro_qty`, `pro_ids`,`validity_date`) VALUES (?,?,?,?)";
        $res = $this->dbF->setRow($sql, array($inv_id,$txt_inv_pro_qty,$val,$validity_date));



$freeGiftEmailContent =  $this->freeGiftProducts($inv_id);

$sqli    = "SELECT sender_email,sender_name FROM order_invoice_info WHERE `order_invoice_id` = ?";
$datai   = $this->dbF->getRow($sqli,array($inv_id));


$freeGiftextraMailArray['freeGiftProductsDiv'] = $freeGiftEmailContent;
$freeGiftextraMailArray['cusName'] = $datai['sender_name'];

$sqlj    = "SELECT invoice_date FROM order_invoice WHERE `order_invoice_pk` = ?";
$invoice_date   = $this->dbF->getRow($sqlj,array($inv_id));


$freeGiftextraMailArray['orDate'] = $invoice_date['invoice_date'];

$freeGiftextraMailArray['invoiceNumber'] = $inv_id;
 $this->functions->send_mail($datai['sender_email'],'','','freeGiftProductsDiv','',$freeGiftextraMailArray);




        // print_r(array($inv_id,$txt_inv_pro_qty,$val));
        // if ($this->dbF->rowCount) echo '1';
        //     else echo '0';
    }



    public function getComments(){
        // print_r($_POST);
        $inv_id = $_POST['invoice_id'];

        $sql = "SELECT * FROM `internal_comment_orderInvoice` WHERE `invoice_id` = ? ORDER BY `date_timestamp` DESC";
        $res = $this->dbF->getRows($sql, array($inv_id));

        foreach ($res as $key => $value) {
            $status         = $value['status'];
            $comment        = $value['comment'];
            $user           = $value['user_email'];
            $date_timestamp = explode(' ',$value['date_timestamp']);

            $date = $date_timestamp[0];
            $time = $date_timestamp[1];

            $inv_name = $this->productF->invoiceStatusFind($status);

            echo '
                <li>
                    <div class="date_portion">'.$date.'</div><div class="time_portion">'.$time.'</div><div class="tag_portion">'.$inv_name.'</div>
                    <div class="col_portion_mid_area">By: '.$user.'</div>
                    <div class="col_portion_mid_area1">'.$comment.'</div>
                </li>

            ';
        }
    }

    public function getLogs(){
        $inv_id = $_POST['invoice_id'];
        // $this->dbF->prnt($_POST);

        $sql = "SELECT * FROM `order_activity_log` WHERE `ref_id` = ? ORDER BY `log_time` DESC";
        $res = $this->dbF->getRows($sql, array($inv_id));

        if($this->dbF->rowCount > 0){

        foreach ($res as $key => $value) {
            $log_title        = $value['log_title'];
            $ref_user         = $value['ref_user'];
            $log_desc         = $value['log_desc'];
            $log_time         = $value['log_time'];
            $log_ip           = $value['log_ip'];
            $date_timestamp = explode(' ',$log_time);

            $date = $date_timestamp[0];
            $time = $date_timestamp[1];

            echo '
                <li>
                    <div class="date_portion">'.$date.'</div><div class="time_portion">'.$time.'</div><div class="tag_portion">'.$log_title.'</div>
                    <div class="col_portion_mid_area1">'.$log_desc.'</div>
                </li>

            ';
        }
        }
    }  

      public function getLogs1(){
        $inv_id = $_POST['invoice_id'];

      $inv_id =  filter_var($inv_id, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND);


        // $this->dbF->prnt($_POST);

        $sql = "SELECT * FROM `free_gift_inv` WHERE `txt_inv_id` = ? ORDER BY `dateTime` DESC";
        $res = $this->dbF->getRows($sql, array($inv_id));

        if($this->dbF->rowCount > 0){

        foreach ($res as $key => $value) {
            $dateTime        = $value['dateTime'];
            $status         = $value['status'];
            $txt_inv_pro_qty         = $value['txt_inv_pro_qty'];
            $pro_ids         = $value['pro_ids'];
            $new_inv         = $value['new_inv'];


            // $log_ip           = $value['log_ip'];
            // $date_timestamp = explode(' ',$log_time);

            // $date = $date_timestamp[0];
            // $time = $date_timestamp[1];
$getProductName = "";

$lang_nonArray = explode(',', $pro_ids);
for ($i=0; $i < count($lang_nonArray); $i++) { 



$getProductName .= $this->productF->getProductName($lang_nonArray[$i]);
$getProductName .= ",";

}



echo '
<li>
<div class="time_portion">Mail Sending Time: '.$dateTime.'</div>';
if ($status== 0) {
echo '

<div class="time_portion">Status: Not Used</div>


';
}else{


echo '

<div class="time_portion">Status: Used</div>


';

}

echo '


<div class="time_portion">Product Quantity Allow: '.$txt_inv_pro_qty.'</div>
<div class="time_portion">Free Gift Invoice ID: '.$new_inv.'

<div class="btn-group btn-group-sm">
                        <a href="../invoicePrint?mailId='.$new_inv.'" target="_blank" class="btn">
                                    <i class="fa fa-file-pdf-o"></i>
                               </a>
                        </div>

</div>

</li>

';

// <div class="tag_portion">P_Name: '.$getProductName.'</div>
// 
}
}else{




$sql = "SELECT * FROM `free_gift_inv` WHERE `new_inv` = ? ORDER BY `dateTime` DESC";
$res = $this->dbF->getRow($sql, array($inv_id));

if($this->dbF->rowCount > 0){

echo '
<li>
<div class="time_portion">Mail Sending Time: '.$res['dateTime'].'</div>';


echo '


<div class="time_portion">Product Quantity Allow: '.$res['txt_inv_pro_qty'].'</div>
<div class="time_portion">Reference Invoice ID: '.$res['txt_inv_id'].'
<div class="btn-group btn-group-sm">
<a href="../invoicePrint?mailId='.$res['txt_inv_id'].'" target="_blank" class="btn">
<i class="fa fa-file-pdf-o"></i>
</a>
</div>

</div>

</li>

';




}

}
    }

    public function getInvoiceStatusHardwords($value){
        return $this->dbF->hardwords($value, false);
    }

    public function submitExtraAmountForm(){

        $invoiceId      = $_POST['invoiceId'];
        $extra_amnt     = $_POST['extra_amnt'];
        $to             = $_POST['senderEmail'];
        $curSybmol      = $_POST['curSybmol'];
        $paymentType    = $_POST['paymentType'];
        $description    = $_POST['description'];

        $now = date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO `order_extra_amount`(`invoice_no`, `invoice_date`, `paymentType`, `extra_amount`, `price_code`, `invoice_status`, `orderStatus`, `shippingCountry`, `description`) VALUES (?,?,?,?,?,?,?,?,?)";
        $res = $this->dbF->setRow($sql, array($invoiceId,$now,$paymentType,$extra_amnt,$curSybmol,'1','inComplete','SE',$description));

        if($this->dbF->rowCount > 0){

            if($paymentType == 2){
                $link = WEB_URL.'/extra_pay?inv='.$invoiceId.'&id='.$this->dbF->rowLastId;
            }else if($paymentType == 5){
                $link = WEB_URL.'/extra_payment?inv='.$invoiceId.'&id='.$this->dbF->rowLastId;
            }

            $mailArray['invoiceNumber'] = $invoiceId;
            $mailArray['ExtraPayment']  = $extra_amnt.' '.$curSybmol;
            $mailArray['ExtraPayLink']  = $link;
            $mailArray['ExtraPayDesc']  = $description;

            $mail = $this->functions->send_mail($to,'','','orderExtraPayment','',$mailArray);

            if($mail){
            // echo '1';
            }else{
                echo '0';
            }
        } else {
            echo '0';
        }   
    }

    public function flagOrder(){
        $invId = $_POST['itemId'];

        $sql = "UPDATE `order_invoice` SET `flagged` = 1 WHERE `order_invoice_pk` = ?";
        $res = $this->dbF->setRow($sql, array($invId));

        if($this->dbF->rowCount > 0){
            echo '1';
        }else{
            echo '0';
        }
    }

    public function removeFlagOrder(){
        $invId = $_POST['itemId'];

        $sql = "UPDATE `order_invoice` SET `flagged` = 0 WHERE `order_invoice_pk` = ?";
        $res = $this->dbF->setRow($sql, array($invId));

        if($this->dbF->rowCount > 0){
            echo '1';
        }else{
            echo '0';
        }
    }
}

?>