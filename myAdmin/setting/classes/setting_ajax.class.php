<?php
require_once (__DIR__."/../../global_ajax.php"); //connection setting db
class setting_ajax extends object_class{
    public function __construct(){
        parent::__construct('3');
        if (isset($GLOBALS['productF'])) $this->productF = $GLOBALS['productF'];
        else {
            if($this->functions->developer_setting('product') == '1') {
                $this->functions->require_once_custom('product_functions');
                $this->productF = new product_function();
            }
        }
    }

public function deleteHardWord(){
    try{
        $this->db->beginTransaction();

        $id=$_POST['id'];

       $sql2="DELETE FROM hardwords WHERE id='$id'";
       $this->dbF->setRow($sql2,false);
        if($this->dbF->rowCount) echo '1';
        else echo '0';

        $this->db->commit();
        $this->functions->setlog('DELETE','Special Words',$id,'Special Words Delete Successfully');
    }catch (PDOException $e) {
        echo '0';
        $this->db->rollBack();
        $this->dbF->error_submit($e);
    }
}


    public function massImgSort(){

    try{

  
    global $_e,$con;

        $sql = "DELETE from product_image WHERE product_id LIKE 'ss%'";
        $res2 = $con->setRow($sql,false);   
        
        
        
        $sql = "SELECT * from product_image";
        $res = $this->dbF->getRows($sql,false);
        //$this->dbF->prnt($res);


foreach ($res as  $product) {
# code...
//$product_id = 'ss';    
$product_id = 'ss'.$product['product_id'];
//  $sort  = $product['sort'];


$sql = "INSERT INTO product_image(product_id,image,alt,sort) VALUES(?,?,?,?)";
$res2 = $con->setRow($sql,array($product_id,$product['image'],$product['alt'],$product['sort']));


}

        

        echo '1';
    }
    catch(Exception $e){
        echo '0';
    }
}


    
public function addStapleQuantity(){
    //Price
        ############# MULTI CURRENCY ################
        $this->functions->includeAdminFile("product_management/classes/currency.class.php");
        $c_currency         = new currency_management();
        $countryCodeList    = $this->functions->countrylist(); // country list
        $currency_data      = $c_currency->getList(); // get currency list
        ############# MULTI CURRENCY ################

        $tds                = "";
        //$valForm            = unserialize($this->getIBMSSettingArrayValue('stapleProductSetting',$settingData));
        $tds .= "<tr><td colspan='2' class='borderIfNotabs'><input type='text' class='form-control' name='setting[stapleProductSetting][quantity][]' value='' placeholder='Quantity'></td></tr>";
        foreach ($currency_data as $val) {
            $country_id     = $val['cur_id'];
            $symbol         = $val['cur_symbol'];
            $country_name   = $countryCodeList[$val['cur_country']];
            $currency       = $val["cur_name"];
            //@$oldQty        = $valForm[$country_id]['quantity'];
            //@$oldPrice      = $valForm[$country_id]['price'];
            $tds .= "";
            $tds .= "<tr><td>&nbsp;</td>";
            $tds .= '<td>
                        <div class="input-group input-group-sm">
                          <span class="input-group-addon">'.$symbol.'</span>
                          <input type="text" class="form-control" value="" pattern="\d+(\.\d+)?"  name="setting[stapleProductSetting][price]['.$country_id.'][]" >
                        </div>
                      </td>
                       </tr>';
        }

        $form_fields[] = array(
            'type' => 'none',
            'thisFormat' => " <br>
                        <table class='table table-striped table-hover'>$tds</table><hr>"
        );

        $format = '<div class="form-group">
                        <label class="col-sm-4 col-md-3  control-label">{{label}}</label>
                        <div class="col-sm-8  col-md-9">
                            {{form}}
                        </div>
                    </div>';

        $a = $this->functions->print_form($form_fields,$format);
        return $a;
}

public function addSalesFeature(){
    //Price
        ############# MULTI CURRENCY ################
        $this->functions->includeAdminFile("product_management/classes/currency.class.php");
        $c_currency         = new currency_management();
        $countryCodeList    = $this->functions->countrylist(); // country list
        $currency_data      = $c_currency->getList(); // get currency list
        ############# MULTI CURRENCY ################
        

        $settingData = $this->getIBMSSettingData();

        $productData    = $this->productF->productActiveSql('prodet_id,prodet_name');

        $prod_count = $_POST['prod_count'];

        // $this->dbF->prnt($productData);

        foreach ($productData as $val) {

            $name = $this->functions->unserializeTranslate($val['prodet_name']);
            $pro_img = $this->productF->getProductSingleImage($val['prodet_id']);
            $img_pa = WEB_URL.'/images/'.$pro_img['image'];
            $img = '<img src="'.$img_pa.'">';

            $product_array[$val['prodet_id']]['name'] = $name;
            $product_array[$val['prodet_id']]['image'] = $img_pa;
            $product_array[$val['prodet_id']]['imgSrc'] = $pro_img['image'];

        }
            
        $tds  = "";
        $tds .= "<tr>
                    <td class='borderIfNotabs'>";

        $tds .= "<select class='form-control' name='setting[salesFeature][country][]'>";

        foreach ($currency_data as $val) {
            $country_id     = $val['cur_id'];
            $symbol         = $val['cur_symbol'];
            $country_name   = $countryCodeList[$val['cur_country']];
            $currency       = $val["cur_name"];
            @$oldQty        = $valForm[$country_id]['quantity'];
            @$oldPrice      = $valForm[$country_id]['price'];
            $tds .= "<option value=".$country_id.">".$country_name." (".$symbol.")"."</option>";
        }

        $tds .="</select>";

        $tds .= "</td>
                    <td class='borderIfNotabs'>
                        <input type='text' class='form-control' name='setting[salesFeature][cartAmount][]' value='' placeholder='Quantity'>
                    </td>
                </tr>";

        $tds .= "<tr>
                    <td>Select Products</td>
                    <td class='borderIfNortabs'>
                        <select name='setting[salesFeature][products][".$prod_count."][]' class='form-control test salesFeatureSetting' id='salesFeatureSetting' style='height:300px' multiple=''>";

        foreach ($product_array as $key => $value) {
                // $smlImg1 = $this->functions->resizeImage($value['imgSrc'], '60', '70', false);
                // $tds .='<option data-img="'.$smlImg1.'" value="'.$key.'">'.$value['name'].'</option>';
                $tds .='<option value="'.$key.'">'.$value['name'].'</option>';
            }                

        $tds .="</select></td><td colspan='2'></td><tr>";
        // foreach ($currency_data as $val) {
        //     $country_id     = $val['cur_id'];
        //     $symbol         = $val['cur_symbol'];
        //     $country_name   = $countryCodeList[$val['cur_country']];
        //     $currency       = $val["cur_name"];
        //     // @$oldQty        = $valForm[$country_id]['quantity'];
        //     // @$oldPrice      = $valForm[$country_id]['price'];
        //     $tds .= "";
        //     $tds .= "<td>$country_name ($currency)</td>";
        //     $tds .= '<td>
        //                 <div class="input-group input-group-sm">
        //                   <span class="input-group-addon">'.$symbol.'</span>
        //                   <input type="text" class="form-control" value="" pattern="\d+(\.\d+)?"  name="setting[salesFeature][price]['.$country_id.'][]" >
        //                 </div>
        //               </td>
        //                ';
        // }

        $tds .= "<td>Price</td>";
        $tds .= '<td>
                    <input type="text" class="form-control" value="" pattern="\d+(\.\d+)?"  name="setting[salesFeature][price][]" >
                  </td>
                   ';

        $tds .= "</tr>";

        $form_fields[] = array(
            'type' => 'none',
            'thisFormat' => " <br>
                        <table class='table table-striped table-hover'>$tds</table><hr>"
        );

        $format = '<div class="form-group">
                        <label class="col-sm-4 col-md-3  control-label">{{label}}</label>
                        <div class="col-sm-8  col-md-9">
                            {{form}}
                        </div>
                    </div>';

        $a = $this->functions->print_form($form_fields,$format);
        return $a;
}

public function getIBMSSettingData(){
        $sql    =   "SELECT * FROM ibms_setting ORDER BY id ASC";
        $data   =   $this->dbF->getRows($sql);
        return $data;
    }

public function getIBMSSettingArrayValue($Key,$data){
        foreach ($data as $keya => $val) {
            if ($val['setting_name'] == $Key) {
                return $val['setting_val'];
            }
        }
        return "";
    }

public function massPriceUpdateCH(){
    global $_e,$con,$conIntra;

    try{

        $curId      = $_POST['curId'];
        $divide     = $_POST['divide'];
        $multiply   = $_POST['multiply'];

        if($curId == 20){
            $index = 9;
            $code = '';
        }elseif($curId == 30){
            $index = 0;
            $code = 'fr';
        }elseif($curId == 31){
            $index = 1;
            $code = 'de';
        }elseif($curId == 32){
            $index = 2;
            $code = 'nl';
        }elseif($curId == 33){
            $index = 3;
            $code = 'us';
        }elseif($curId == 34){
            $index = 4;
            $code = 'be';
        }elseif($curId == 35){
            $index = 5;
            $code = 'uk';
        }elseif($curId == 36){
            $index = 6;
            $code = 'es';
        }elseif($curId == 37){
            $index = 7;
            $code = 'at';
        }elseif($curId == 38){
            $index = 8;
            $code = 'it';
        }elseif($curId == 39){
            $index = 10;
            $code = 'ot';
        }

        $priceCalc = $this->functions->ibms_setting('priceCalc');
        $priceCalc = unserialize($priceCalc);

        $country_id     = $priceCalc['country'][$index];
        $cur_divide      = $priceCalc['divide'][$index];
        $cur_multiply    = $priceCalc['multiply'][$index];

        $sql = "SELECT DISTINCT(`prodet_id`) FROM `proudct_detail` WHERE `slug` IS NOT NULL";
        $comProducts = $this->dbF->getRows($sql);
        // $this->dbF->prnt($comProducts);
        // exit;

        // $i = 0;
        $find_in = '';
        $updArray = array();
        $sizeArray = array();
        $colorArray = array();

 $migrate_products = $this->functions->ibms_setting('migrate_product_to_ch');
        $migrate_product_to_intranet = $this->functions->ibms_setting('migrate_product_to_intranet');

            if(!empty($migrate_products) && $migrate_products == 1){

        foreach ($comProducts as $key => $value) {
            
            $comPid = $value['prodet_id'];
            $chProId = 'ss'.$comPid;

            $sql_chk = "SELECT `pro_lock` FROM `proudct_detail` WHERE `prodet_id` = '$chProId'";
            $res_chk = $con->getRow($sql_chk);

            // echo $sql_chk.'<br>';
            // $this->dbF->prnt($res_chk);
            // $this->dbF->prnt($res_chk);
            if(!empty($res_chk) && $res_chk['pro_lock'] == 0){

            ################## Product Base Price ####################
            
            $pPriceData = $this->productF->productPrice($comPid, 20);
            $pPriceActual = $pPriceData['propri_price'];

            // $this->dbF->prnt(array($pPriceActual,$cur_divide,$cur_multiply));

            $cur_price       = doubleval(($pPriceActual/$cur_divide)*$cur_multiply);
            $cur_price       = ceil($cur_price);            

            $updArray[$chProId]['baseprice'] = $cur_price;

            // $this->dbF->prnt($updArray);

            ################## Product Base Price END ####################
            
            
            ################## Product Size ###############################

            $sql_size = "SELECT DISTINCT(`prosiz_name`), `prosiz_id`, `sizeGroup` FROM `product_size` WHERE `prosiz_prodet_id` = $comPid AND `prosiz_cur_id` = 24";
            $res_size = $this->dbF->getRows($sql_size);

            foreach ($res_size as $key => $value) {
                $sql_size_price = "SELECT `prosiz_price` FROM `product_size` WHERE `prosiz_prodet_id` = $comPid AND `prosiz_cur_id` = 20 AND `prosiz_name` = ?";
                $res_size_price = $this->dbF->getRow($sql_size_price, array( $value['prosiz_name']));

                $sizeConvPrice = doubleval(($res_size_price['prosiz_price']/$cur_divide)*$cur_multiply);
                $sizeConvPrice       = ceil($sizeConvPrice);

                if($curId == 20){
                    $size_id = 'ss'.$value['prosiz_id'];
                }else{
                    $size_id = 'ss'.$code.$value['prosiz_id'];
                }
                


                $updArray[$chProId]['size'][$size_id]['prosiz_name'] = $value['prosiz_name'];
                $updArray[$chProId]['size'][$size_id]['price'] = $sizeConvPrice;
                $updArray[$chProId]['size'][$size_id]['sizegroup'] = $value['sizeGroup'];
            }

            ################## Product Size END ###############################
            
            
            ################### Product Color #################################

            $sql_color = "SELECT DISTINCT(`proclr_name`), `propri_id`, `sizeGroup`, `color_name` FROM `product_color` WHERE `proclr_prodet_id` = $comPid AND `proclr_cur_id` = 24";
            $res_color = $this->dbF->getRows($sql_color);

            foreach ($res_color as $key => $value) {
                $sql_color_price = "SELECT `proclr_price` FROM `product_color` WHERE `proclr_prodet_id` = $comPid AND `proclr_cur_id` = 20 AND `proclr_name` = ?";
                $res_color_price = $this->dbF->getRow($sql_color_price, array( $value['proclr_name']));

                $colorConvPrice = doubleval(($res_color_price['proclr_price']/$cur_divide)*$cur_multiply);
                $colorConvPrice       = ceil($colorConvPrice);

                if($curId == 20){
                    $color_id = 'ss'.$value['propri_id'];
                }else{
                    $color_id = 'ss'.$code.$value['propri_id'];
                }

                $updArray[$chProId]['color'][$color_id]['proclr_name'] = $value['proclr_name'];
                $updArray[$chProId]['color'][$color_id]['color_name'] = $value['color_name'];
                $updArray[$chProId]['color'][$color_id]['price'] = $colorConvPrice;
                $updArray[$chProId]['color'][$color_id]['sizegroup'] = $value['sizeGroup'];
            }

            ################## Product Color END ####################################


            ################## Product Additional Cost ###############################
            
            $sql_adc = "SELECT `proadc_name`, `proadc_price` FROM `product_addcost` WHERE `proadc_prodet_id` = $comPid AND `proadc_cur_id` = 20";
            $res_adc = $this->dbF->getRows($sql_adc);

            foreach ($res_adc as $key => $value) {

                $adcConvPrice = doubleval(($value['proadc_price']/$cur_divide)*$cur_multiply);
                $adcConvPrice       = ceil($adcConvPrice);

                $updArray[$chProId]['adc']['name'][] = $value['proadc_name'];
                $updArray[$chProId]['adc']['price'][] = $adcConvPrice;
            }
            
            
            ################## Product Additional Cost END ###############################
            

            ################## Product size custom #######################################


            $sql_size_custom = "SELECT * FROM `product_size_custom` WHERE `pId` = $comPid AND `currencyId` = 20";
            $res_size_custom = $this->dbF->getRow($sql_size_custom);

            $sizeCustConvPrice = doubleval(($res_size_custom['price']/$cur_divide)*$cur_multiply);
            $sizeCustConvPrice = ceil($sizeCustConvPrice);

            $updArray[$chProId]['size_cust']['type_id'] = $res_size_custom['type_id'];
            $updArray[$chProId]['size_cust']['price']   = $sizeCustConvPrice;

            ################## Product size custom END ####################################
            


            ################### Product Discount #######################################
            

            $sql_discount = "SELECT `product_dis_id`, `product_dis_price`, `product_dis_status`, `product_dis_intShipping` FROM `product_discount` d JOIN `product_discount_prices` dp ON d.`product_discount_pk` = dp.`product_dis_id` WHERE d.`discount_PId` = $comPid AND `product_dis_curr_Id` = 20";
            $res_discount = $this->dbF->getRow($sql_discount);

            $sql_discountSetting = "SELECT `product_dis_name`, `product_dis_value` FROM `product_discount_setting` WHERE `product_dis_id` = ?";
            $res_discountSetting = $this->dbF->getRows($sql_discountSetting, array($res_discount['product_dis_id']));
            $disSettingValues = array();
            foreach ($res_discountSetting as $keyDisSet => $valueDisSet) {
                $disSettingValues[$valueDisSet['product_dis_name']] = $valueDisSet['product_dis_value'];
            }

            if($disSettingValues['discountFormat'] == 'price'){
                $discountConvPrice = doubleval(($res_discount['product_dis_price']/$cur_divide)*$cur_multiply);
                $discountConvPrice = ceil($discountConvPrice);
            }elseif($disSettingValues['discountFormat'] == 'percent'){
                $discountConvPrice = $res_discount['product_dis_price'];
            }

            

            $updArray[$chProId]['discount']['id']       = $res_discount['product_dis_id'];
            $updArray[$chProId]['discount']['status']   = $res_discount['product_dis_status'];
            $updArray[$chProId]['discount']['price']    = $discountConvPrice;
            $updArray[$chProId]['discount']['intShipping']       = $res_discount['product_dis_intShipping'];
            $updArray[$chProId]['discount']['setting']  = $res_discountSetting;


            ################### Product Discount End #######################################

        }

        }

        // $this->dbF->prnt($updArray);
        // exit();

        foreach ($updArray as $key => $value) {

            ################## Product Price Update ##################

            $sqlCH = "SELECT * FROM `product_price` WHERE `propri_prodet_id` = '$key' AND `propri_cur_id` = $curId";
            $resCh = $con->getRow($sqlCH);

            // $this->dbF->prnt($resCh);

            if($con->rowCount > 0){
                $sqlUpd = "UPDATE `product_price` SET `propri_price` = ? WHERE `propri_prodet_id` = '$key' AND `propri_cur_id` = $curId";
                $con->setRow($sqlUpd, array($value['baseprice']));
            }else{
                $sqlUpd = "INSERT INTO `product_price`(`propri_prodet_id`, `propri_cur_id`, `propri_price`) VALUES (?,?,?)";
                $con->setRow($sqlUpd, array($key, $curId, $value['baseprice']));
            }

            ################## Product Price Update END ##################


            ################## Product Size Update ##################
            

            if(isset($value['size'])){
                foreach ($value['size'] as $size_id => $size_value) {
                    $sql_sizeChk = "SELECT `prosiz_id` FROM `product_size` WHERE `prosiz_id` = '$size_id' AND `prosiz_cur_id` = $curId AND `prosiz_prodet_id` = '$key'";
                    $res_sizeChk = $con->getRow($sql_sizeChk);

                    if($con->rowCount > 0){
                        $sql_sizeUpd = "UPDATE `product_size` SET `prosiz_price` = ? WHERE `prosiz_id` = '$size_id' AND `prosiz_cur_id` = $curId AND `prosiz_prodet_id` = '$key'";
                        $res_sizeUpd = $con->setRow($sql_sizeUpd, array($size_value['price']));
                    }else{
                        if($curId != 20){
                            $sql_sizIns = "INSERT INTO `product_size`(`prosiz_id`, `prosiz_name`, `prosiz_prodet_id`, `prosiz_cur_id`, `prosiz_price`, `sizeGroup`) VALUES (?,?,?,?,?,?)";
                            $res_sizIns = $con->setRow($sql_sizIns, array($size_id, $size_value['prosiz_name'], $key, $curId, $size_value['price'], $size_value['sizegroup']));
                        }
                    }

                }
            }


            ################## Product Size Update END ##################
            

            ################## Product Color Update ##################
            

            if(isset($value['color'])){
                foreach ($value['color'] as $color_id => $color_value) {
                    $sql_colorChk = "SELECT `propri_id` FROM `product_color` WHERE `propri_id` = '$color_id' AND `proclr_cur_id` = $curId AND `proclr_prodet_id` = '$key'";
                    $res_colorChk = $con->getRow($sql_colorChk);

                    if($con->rowCount > 0){
                        $sql_colorUpd = "UPDATE `product_color` SET `proclr_price` = ? WHERE `propri_id` = '$color_id' AND `proclr_cur_id` = $curId AND `proclr_prodet_id` = '$key'";
                        $res_colorUpd = $con->setRow($sql_colorUpd, array($color_value['price']));
                    }else{
                        if($curId != 20){
                            $sql_sizIns = "INSERT INTO `product_color`(`propri_id`, `proclr_name`, `color_name`, `proclr_prodet_id`, `proclr_cur_id`, `proclr_price`, `sizeGroup`) VALUES (?,?,?,?,?,?,?)";
                            $res_sizIns = $con->setRow($sql_sizIns, array($color_id, $color_value['proclr_name'], $color_value['color_name'], $key, $curId, $color_value['price'], $color_value['sizegroup']));
                        }
                    }

                }
            }


            ################## Product Color Update END ##################
            

            ################## Product Size Custom Update ##################
            
            if(isset($value['size_cust'])){

                $sql_sizeCusChk = "SELECT * FROM `product_size_custom` WHERE `pId` = '$key' AND `currencyId` = '$curId'";
                $res_sizeCusChk = $con->getRow($sql_sizeCusChk);

                if($con->rowCount > 0){
                    $sql_sizeCusUpd = "UPDATE `product_size_custom` SET `type_id` = ?, `price` = ? WHERE `pId` = '$key' AND `currencyId` = '$curId'";
                    $res_sizeCusUpd = $con->setRow($sql_sizeCusUpd, array($value['size_cust']['type_id'], $value['size_cust']['price']));
                }else{
                    $sql_sizeCusIns = "INSERT INTO `product_size_custom`(`type_id`, `pId`, `currencyId`, `price`) VALUES (?,?,?,?)";
                    $res_sizeCusIns = $con->setRow($sql_sizeCusIns, array($value['size_cust']['type_id'], $key, $curId, $value['size_cust']['price']));
                }
            }


            ################## Product Size Custom Update END ##################
            

            ################## Product Additional Cost Update ##################
            
            if(isset($value['adc'])){

                foreach ($value['adc']['name'] as $adc_id => $adc_value) {
                    $sql_adcChk = "SELECT * FROM `product_addcost` WHERE `proadc_name` = '$adc_value' AND `proadc_prodet_id` = '$key' AND `proadc_cur_id` = $curId";
                    $res_adcChk = $con->getRow($sql_adcChk);

                    if($con->rowCount > 0){
                        $sql_adcUpd = "UPDATE `product_addcost` SET `proadc_price` = ? WHERE `proadc_name` = '$adc_value' AND `proadc_prodet_id` = '$key' AND `proadc_cur_id` = $curId";
                        $res_adcUpd = $con->setRow($sql_adcUpd, array($value['adc']['price'][$adc_id]));
                    }else{
                        $sql_adcIns = "INSERT INTO `product_addcost`(`proadc_name`, `proadc_prodet_id`, `proadc_cur_id`, `proadc_price`) VALUES (?,?,?,?)";
                        $res_adcIns = $con->setRow($sql_adcIns, array($adc_value, $key, $curId, $value['adc']['price'][$adc_id]));
                    }
                    
                }
            }


            ################## Product Additional Cost Update END ##################
            
            
            #################### Product Discount Update #######################################
            

            if(isset($value['discount'])){
                $discIdUpd = 'ss'.$value['discount']['id'];

                $sqlDiscountCheck = "SELECT `product_discount_pk` FROM `product_discount` WHERE `discount_PId` = '$key'";
                $resDiscountCheck = $con->getRow($sqlDiscountCheck);

                if($resDiscountCheck > 0){

                    $disChId = $resDiscountCheck['product_discount_pk'];

                    $sqlDisCurCheck = "SELECT `product_dis_id` FROM `product_discount_prices` WHERE `product_dis_id` = '$disChId' AND `product_dis_curr_Id` = $curId";
                    $resDisCurCheck = $con->getRow($sqlDisCurCheck);

                    if($resDisCurCheck > 0){
                        $sql_discUpd = "UPDATE `product_discount_prices` SET `product_dis_price` = ? WHERE `product_dis_id` = '$disChId' AND `product_dis_curr_Id` = $curId";
                        $res_discUpd = $con->setRow($sql_discUpd, array($value['discount']['price']));
                    }else{

                        /////////////  Discount Table Insert ///////////////

                        $sqlDisIns = "INSERT INTO `product_discount`(`product_discount_pk`, `discount_PId`, `product_dis_status`) VALUES (?,?,?)";
                        $resDisIns = $con->setRow($sqlDisIns, array($disChId, $key, $value['discount']['status']));

                        ///////////// Discount Price Table Insert  /////////////////
                        
                        $sqlDisPriceIns = "INSERT INTO `product_discount_prices`(`product_dis_id`, `product_dis_curr_Id`, `product_dis_price`, `product_dis_intShipping`) VALUES (?,?,?,?)";
                        $resDisPriceIns = $con->setRow($sqlDisPriceIns, array($disChId,$curId,$value['discount']['price'], $value['discount']['intShipping']));

                        ///////////// Discount Setting Table Insert  /////////////////
                        
                        foreach ($value['discount']['setting'] as $keySetting => $valueSetting) {
                            $sqlDisSettingIns = "INSERT INTO `product_discount_setting`(`product_dis_id`, `product_dis_name`, `product_dis_value`) VALUES (?,?,?)";
                            $resDisSettingIns = $con->setRow($sqlDisSettingIns, array($disChId, $valueSetting['product_dis_name'], $valueSetting['product_dis_value']));
                        }   
                    }
                }else{

                    /////////////  Discount Table Insert ///////////////

                    $sqlDisIns = "INSERT INTO `product_discount`(`product_discount_pk`, `discount_PId`, `product_dis_status`) VALUES (?,?,?)";
                    $resDisIns = $con->setRow($sqlDisIns, array($discIdUpd, $key, $value['discount']['status']));

                    ///////////// Discount Price Table Insert  /////////////////
                    
                    $sqlDisPriceIns = "INSERT INTO `product_discount_prices`(`product_dis_id`, `product_dis_curr_Id`, `product_dis_price`, `product_dis_intShipping`) VALUES (?,?,?,?)";
                    $resDisPriceIns = $con->setRow($sqlDisPriceIns, array($discIdUpd,$curId,$value['discount']['price'], $value['discount']['intShipping']));

                    if($key == 'ss4587'){
                        $this->dbF->prnt(array($discIdUpd,$curId,$value['discount']['price'], $value['discount']['intShipping']));
                    }

                    ///////////// Discount Setting Table Insert  /////////////////
                    
                    foreach ($value['discount']['setting'] as $keySetting => $valueSetting) {
                        $sqlDisSettingIns = "INSERT INTO `product_discount_setting`(`product_dis_id`, `product_dis_name`, `product_dis_value`) VALUES (?,?,?)";
                        $resDisSettingIns = $con->setRow($sqlDisSettingIns, array($discIdUpd, $valueSetting['product_dis_name'], $valueSetting['product_dis_value']));
                    }   
                }

            }


            ################### Product Discount Update END #######################################
        }

}







    if(!empty($migrate_product_to_intranet) && $migrate_product_to_intranet == 1){


        foreach ($comProducts as $key => $value) {
            
            $comPid = $value['prodet_id'];
            $chProId = $comPid;

            $sql_chk = "SELECT `pro_lock` FROM `proudct_detail` WHERE `prodet_id` = '$chProId'";
            $res_chk = $conIntra->getRow($sql_chk);

            // echo $sql_chk.'<br>';
            // $this->dbF->prnt($res_chk);
            // $this->dbF->prnt($res_chk);
            if(!empty($res_chk) && $res_chk['pro_lock'] == 0){

            ################## Product Base Price ####################
            
            $pPriceData = $this->productF->productPrice($comPid, 20);
            $pPriceActual = $pPriceData['propri_price'];

            // $this->dbF->prnt(array($pPriceActual,$cur_divide,$cur_multiply));

            $cur_price       = doubleval(($pPriceActual/$cur_divide)*$cur_multiply);
            $cur_price       = ceil($cur_price);            

            $updArray[$chProId]['baseprice'] = $cur_price;

            // $this->dbF->prnt($updArray);

            ################## Product Base Price END ####################
            
            
            ################## Product Size ###############################

            $sql_size = "SELECT DISTINCT(`prosiz_name`), `prosiz_id`, `sizeGroup` FROM `product_size` WHERE `prosiz_prodet_id` = $comPid AND `prosiz_cur_id` = 24";
            $res_size = $this->dbF->getRows($sql_size);

            foreach ($res_size as $key => $value) {
                $sql_size_price = "SELECT `prosiz_price` FROM `product_size` WHERE `prosiz_prodet_id` = $comPid AND `prosiz_cur_id` = 20 AND `prosiz_name` = ?";
                $res_size_price = $this->dbF->getRow($sql_size_price, array( $value['prosiz_name']));

                $sizeConvPrice = doubleval(($res_size_price['prosiz_price']/$cur_divide)*$cur_multiply);
                $sizeConvPrice       = ceil($sizeConvPrice);

                if($curId == 20){
                    $size_id = $value['prosiz_id'];
                }else{
                    $size_id = $code.$value['prosiz_id'];
                }
                


                $updArray[$chProId]['size'][$size_id]['prosiz_name'] = $value['prosiz_name'];
                $updArray[$chProId]['size'][$size_id]['price'] = $sizeConvPrice;
                $updArray[$chProId]['size'][$size_id]['sizegroup'] = $value['sizeGroup'];
            }

            ################## Product Size END ###############################
            
            
            ################### Product Color #################################

            $sql_color = "SELECT DISTINCT(`proclr_name`), `propri_id`, `sizeGroup`, `color_name` FROM `product_color` WHERE `proclr_prodet_id` = $comPid AND `proclr_cur_id` = 24";
            $res_color = $this->dbF->getRows($sql_color);

            foreach ($res_color as $key => $value) {
                $sql_color_price = "SELECT `proclr_price` FROM `product_color` WHERE `proclr_prodet_id` = $comPid AND `proclr_cur_id` = 20 AND `proclr_name` = ?";
                $res_color_price = $this->dbF->getRow($sql_color_price, array( $value['proclr_name']));

                $colorConvPrice = doubleval(($res_color_price['proclr_price']/$cur_divide)*$cur_multiply);
                $colorConvPrice       = ceil($colorConvPrice);

                if($curId == 20){
                    $color_id = $value['propri_id'];
                }else{
                    $color_id = $code.$value['propri_id'];
                }

                $updArray[$chProId]['color'][$color_id]['proclr_name'] = $value['proclr_name'];
                $updArray[$chProId]['color'][$color_id]['color_name'] = $value['color_name'];
                $updArray[$chProId]['color'][$color_id]['price'] = $colorConvPrice;
                $updArray[$chProId]['color'][$color_id]['sizegroup'] = $value['sizeGroup'];
            }

            ################## Product Color END ####################################


            ################## Product Additional Cost ###############################
            
            $sql_adc = "SELECT `proadc_name`, `proadc_price` FROM `product_addcost` WHERE `proadc_prodet_id` = $comPid AND `proadc_cur_id` = 20";
            $res_adc = $this->dbF->getRows($sql_adc);

            foreach ($res_adc as $key => $value) {

                $adcConvPrice = doubleval(($value['proadc_price']/$cur_divide)*$cur_multiply);
                $adcConvPrice       = ceil($adcConvPrice);

                $updArray[$chProId]['adc']['name'][] = $value['proadc_name'];
                $updArray[$chProId]['adc']['price'][] = $adcConvPrice;
            }
            
            
            ################## Product Additional Cost END ###############################
            

            ################## Product size custom #######################################


            $sql_size_custom = "SELECT * FROM `product_size_custom` WHERE `pId` = $comPid AND `currencyId` = 20";
            $res_size_custom = $this->dbF->getRow($sql_size_custom);

            $sizeCustConvPrice = doubleval(($res_size_custom['price']/$cur_divide)*$cur_multiply);
            $sizeCustConvPrice = ceil($sizeCustConvPrice);

            $updArray[$chProId]['size_cust']['type_id'] = $res_size_custom['type_id'];
            $updArray[$chProId]['size_cust']['price']   = $sizeCustConvPrice;

            ################## Product size custom END ####################################
            


            ################### Product Discount #######################################
            

            $sql_discount = "SELECT `product_dis_id`, `product_dis_price`, `product_dis_status`, `product_dis_intShipping` FROM `product_discount` d JOIN `product_discount_prices` dp ON d.`product_discount_pk` = dp.`product_dis_id` WHERE d.`discount_PId` = $comPid AND `product_dis_curr_Id` = 20";
            $res_discount = $this->dbF->getRow($sql_discount);

            $sql_discountSetting = "SELECT `product_dis_name`, `product_dis_value` FROM `product_discount_setting` WHERE `product_dis_id` = ?";
            $res_discountSetting = $this->dbF->getRows($sql_discountSetting, array($res_discount['product_dis_id']));
            $disSettingValues = array();
            foreach ($res_discountSetting as $keyDisSet => $valueDisSet) {
                $disSettingValues[$valueDisSet['product_dis_name']] = $valueDisSet['product_dis_value'];
            }

            if($disSettingValues['discountFormat'] == 'price'){
                $discountConvPrice = doubleval(($res_discount['product_dis_price']/$cur_divide)*$cur_multiply);
                $discountConvPrice = ceil($discountConvPrice);
            }elseif($disSettingValues['discountFormat'] == 'percent'){
                $discountConvPrice = $res_discount['product_dis_price'];
            }

            

            $updArray[$chProId]['discount']['id']       = $res_discount['product_dis_id'];
            $updArray[$chProId]['discount']['status']   = $res_discount['product_dis_status'];
            $updArray[$chProId]['discount']['price']    = $discountConvPrice;
            $updArray[$chProId]['discount']['intShipping']       = $res_discount['product_dis_intShipping'];
            $updArray[$chProId]['discount']['setting']  = $res_discountSetting;


            ################### Product Discount End #######################################

        }

        }

        // $this->dbF->prnt($updArray);
        // exit();

        foreach ($updArray as $key => $value) {

            ################## Product Price Update ##################

            $sqlCH = "SELECT * FROM `product_price` WHERE `propri_prodet_id` = '$key' AND `propri_cur_id` = $curId";
            $resCh = $conIntra->getRow($sqlCH);

            // $this->dbF->prnt($resCh);

            if($conIntra->rowCount > 0){
                $sqlUpd = "UPDATE `product_price` SET `propri_price` = ? WHERE `propri_prodet_id` = '$key' AND `propri_cur_id` = $curId";
                $conIntra->setRow($sqlUpd, array($value['baseprice']));
            }else{
                $sqlUpd = "INSERT INTO `product_price`(`propri_prodet_id`, `propri_cur_id`, `propri_price`) VALUES (?,?,?)";
                $conIntra->setRow($sqlUpd, array($key, $curId, $value['baseprice']));
            }

            ################## Product Price Update END ##################


            ################## Product Size Update ##################
            

            if(isset($value['size'])){
                foreach ($value['size'] as $size_id => $size_value) {
                    $sql_sizeChk = "SELECT `prosiz_id` FROM `product_size` WHERE `prosiz_id` = '$size_id' AND `prosiz_cur_id` = $curId AND `prosiz_prodet_id` = '$key'";
                    $res_sizeChk = $conIntra->getRow($sql_sizeChk);

                    if($conIntra->rowCount > 0){
                        $sql_sizeUpd = "UPDATE `product_size` SET `prosiz_price` = ? WHERE `prosiz_id` = '$size_id' AND `prosiz_cur_id` = $curId AND `prosiz_prodet_id` = '$key'";
                        $res_sizeUpd = $conIntra->setRow($sql_sizeUpd, array($size_value['price']));
                    }else{
                        if($curId != 20){
                            $sql_sizIns = "INSERT INTO `product_size`(`prosiz_id`, `prosiz_name`, `prosiz_prodet_id`, `prosiz_cur_id`, `prosiz_price`, `sizeGroup`) VALUES (?,?,?,?,?,?)";
                            $res_sizIns = $conIntra->setRow($sql_sizIns, array($size_id, $size_value['prosiz_name'], $key, $curId, $size_value['price'], $size_value['sizegroup']));
                        }
                    }

                }
            }


            ################## Product Size Update END ##################
            

            ################## Product Color Update ##################
            

            if(isset($value['color'])){
                foreach ($value['color'] as $color_id => $color_value) {
                    $sql_colorChk = "SELECT `propri_id` FROM `product_color` WHERE `propri_id` = '$color_id' AND `proclr_cur_id` = $curId AND `proclr_prodet_id` = '$key'";
                    $res_colorChk = $conIntra->getRow($sql_colorChk);

                    if($conIntra->rowCount > 0){
                        $sql_colorUpd = "UPDATE `product_color` SET `proclr_price` = ? WHERE `propri_id` = '$color_id' AND `proclr_cur_id` = $curId AND `proclr_prodet_id` = '$key'";
                        $res_colorUpd = $conIntra->setRow($sql_colorUpd, array($color_value['price']));
                    }else{
                        if($curId != 20){
                            $sql_sizIns = "INSERT INTO `product_color`(`propri_id`, `proclr_name`, `color_name`, `proclr_prodet_id`, `proclr_cur_id`, `proclr_price`, `sizeGroup`) VALUES (?,?,?,?,?,?,?)";
                            $res_sizIns = $conIntra->setRow($sql_sizIns, array($color_id, $color_value['proclr_name'], $color_value['color_name'], $key, $curId, $color_value['price'], $color_value['sizegroup']));
                        }
                    }

                }
            }


            ################## Product Color Update END ##################
            

            ################## Product Size Custom Update ##################
            
            if(isset($value['size_cust'])){

                $sql_sizeCusChk = "SELECT * FROM `product_size_custom` WHERE `pId` = '$key' AND `currencyId` = '$curId'";
                $res_sizeCusChk = $conIntra->getRow($sql_sizeCusChk);

                if($conIntra->rowCount > 0){
                    $sql_sizeCusUpd = "UPDATE `product_size_custom` SET `type_id` = ?, `price` = ? WHERE `pId` = '$key' AND `currencyId` = '$curId'";
                    $res_sizeCusUpd = $conIntra->setRow($sql_sizeCusUpd, array($value['size_cust']['type_id'], $value['size_cust']['price']));
                }else{
                    $sql_sizeCusIns = "INSERT INTO `product_size_custom`(`type_id`, `pId`, `currencyId`, `price`) VALUES (?,?,?,?)";
                    $res_sizeCusIns = $conIntra->setRow($sql_sizeCusIns, array($value['size_cust']['type_id'], $key, $curId, $value['size_cust']['price']));
                }
            }


            ################## Product Size Custom Update END ##################
            

            ################## Product Additional Cost Update ##################
            
            if(isset($value['adc'])){

                foreach ($value['adc']['name'] as $adc_id => $adc_value) {
                    $sql_adcChk = "SELECT * FROM `product_addcost` WHERE `proadc_name` = '$adc_value' AND `proadc_prodet_id` = '$key' AND `proadc_cur_id` = $curId";
                    $res_adcChk = $conIntra->getRow($sql_adcChk);

                    if($conIntra->rowCount > 0){
                        $sql_adcUpd = "UPDATE `product_addcost` SET `proadc_price` = ? WHERE `proadc_name` = '$adc_value' AND `proadc_prodet_id` = '$key' AND `proadc_cur_id` = $curId";
                        $res_adcUpd = $conIntra->setRow($sql_adcUpd, array($value['adc']['price'][$adc_id]));
                    }else{
                        $sql_adcIns = "INSERT INTO `product_addcost`(`proadc_name`, `proadc_prodet_id`, `proadc_cur_id`, `proadc_price`) VALUES (?,?,?,?)";
                        $res_adcIns = $conIntra->setRow($sql_adcIns, array($adc_value, $key, $curId, $value['adc']['price'][$adc_id]));
                    }
                    
                }
            }


            ################## Product Additional Cost Update END ##################
            
            
            #################### Product Discount Update #######################################
            

            if(isset($value['discount'])){
                $discIdUpd = 'ss'.$value['discount']['id'];

                $sqlDiscountCheck = "SELECT `product_discount_pk` FROM `product_discount` WHERE `discount_PId` = '$key'";
                $resDiscountCheck = $conIntra->getRow($sqlDiscountCheck);

                if($resDiscountCheck > 0){

                    $disChId = $resDiscountCheck['product_discount_pk'];

                    $sqlDisCurCheck = "SELECT `product_dis_id` FROM `product_discount_prices` WHERE `product_dis_id` = '$disChId' AND `product_dis_curr_Id` = $curId";
                    $resDisCurCheck = $conIntra->getRow($sqlDisCurCheck);

                    if($resDisCurCheck > 0){
                        $sql_discUpd = "UPDATE `product_discount_prices` SET `product_dis_price` = ? WHERE `product_dis_id` = '$disChId' AND `product_dis_curr_Id` = $curId";
                        $res_discUpd = $conIntra->setRow($sql_discUpd, array($value['discount']['price']));
                    }else{

                        /////////////  Discount Table Insert ///////////////

                        $sqlDisIns = "INSERT INTO `product_discount`(`product_discount_pk`, `discount_PId`, `product_dis_status`) VALUES (?,?,?)";
                        $resDisIns = $conIntra->setRow($sqlDisIns, array($disChId, $key, $value['discount']['status']));

                        ///////////// Discount Price Table Insert  /////////////////
                        
                        $sqlDisPriceIns = "INSERT INTO `product_discount_prices`(`product_dis_id`, `product_dis_curr_Id`, `product_dis_price`, `product_dis_intShipping`) VALUES (?,?,?,?)";
                        $resDisPriceIns = $conIntra->setRow($sqlDisPriceIns, array($disChId,$curId,$value['discount']['price'], $value['discount']['intShipping']));

                        ///////////// Discount Setting Table Insert  /////////////////
                        
                        foreach ($value['discount']['setting'] as $keySetting => $valueSetting) {
                            $sqlDisSettingIns = "INSERT INTO `product_discount_setting`(`product_dis_id`, `product_dis_name`, `product_dis_value`) VALUES (?,?,?)";
                            $resDisSettingIns = $conIntra->setRow($sqlDisSettingIns, array($disChId, $valueSetting['product_dis_name'], $valueSetting['product_dis_value']));
                        }   
                    }
                }else{

                    /////////////  Discount Table Insert ///////////////

                    $sqlDisIns = "INSERT INTO `product_discount`(`product_discount_pk`, `discount_PId`, `product_dis_status`) VALUES (?,?,?)";
                    $resDisIns = $conIntra->setRow($sqlDisIns, array($discIdUpd, $key, $value['discount']['status']));

                    ///////////// Discount Price Table Insert  /////////////////
                    
                    $sqlDisPriceIns = "INSERT INTO `product_discount_prices`(`product_dis_id`, `product_dis_curr_Id`, `product_dis_price`, `product_dis_intShipping`) VALUES (?,?,?,?)";
                    $resDisPriceIns = $conIntra->setRow($sqlDisPriceIns, array($discIdUpd,$curId,$value['discount']['price'], $value['discount']['intShipping']));

                    if($key == '4587'){
                        $this->dbF->prnt(array($discIdUpd,$curId,$value['discount']['price'], $value['discount']['intShipping']));
                    }

                    ///////////// Discount Setting Table Insert  /////////////////
                    
                    foreach ($value['discount']['setting'] as $keySetting => $valueSetting) {
                        $sqlDisSettingIns = "INSERT INTO `product_discount_setting`(`product_dis_id`, `product_dis_name`, `product_dis_value`) VALUES (?,?,?)";
                        $resDisSettingIns = $conIntra->setRow($sqlDisSettingIns, array($discIdUpd, $valueSetting['product_dis_name'], $valueSetting['product_dis_value']));
                    }   
                }

            }


            ################### Product Discount Update END #######################################
        }

}





        echo '1';
    }
    catch(Exception $e){
        echo '0';
    }
}

}
?>