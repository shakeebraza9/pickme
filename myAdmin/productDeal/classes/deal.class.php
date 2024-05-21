<?php
require_once (__DIR__."/../../global.php"); //connection setting db
require_once(__DIR__ . "/../../product_management/classes/currency.class.php");
class deal extends object_class{
    public $productF;
    public $c_currency;
    public function __construct(){
        parent::__construct('3');

        $this->c_currency = new currency_management();

        /**
         * MultiLanguage keys Use where echo;
         * define this class words and where this class will call
         * and define words of file where this class will called
         **/
        global $_e;
        global $adminPanelLanguage;
        $_w=array();
        //Index
        $_w['Deal Management'] = '' ;
        //dealEdit.php
        $_w['Manage Deal'] = '' ;

        //deal.php
        $_w['Active Deal'] = '' ;
        $_w['Draft'] = '' ;
        $_w['Category'] = '' ;
        $_w['Basic Information'] = '' ;
        $_w['Sort Deal'] = '' ;
        $_w['Add New Deal'] = '' ;
        $_w['Delete Fail Please Try Again.'] = '' ;
        $_w['There is an error, Please Refresh Page and Try Again'] = '' ;
        $_w['SNO'] = '' ;
        $_w['TITLE'] = '' ;
        $_w['IMAGE'] = '' ;
        $_w['Sort'] = '' ;
        $_w['ACTION'] = '' ;
        $_w['Add New'] = '' ;

        $_w['Image File Error'] = '' ;
        $_w['Image Not Found'] = '' ;
        $_w['Deal'] = '' ;
        $_w['Added'] = '' ;
        $_w['Deal Add Successfully'] = '' ;
        $_w['Deal Add Failed'] = '' ;
        $_w['Deal Update Failed'] = '' ;
        $_w['Deal Update Successfully'] = '' ;
        $_w['Update'] = '' ;
        $_w['Deal Title'] = '' ;
        $_w['Deal Link'] = '' ;
        $_w['Short Desc'] = '' ;
        $_w['Image Recommended Size : {{size}}'] = '' ;
        $_w['Publish'] = '' ;
        $_w['Layer'] = '' ;

        $_w['SAVE'] = '' ;
        $_w['Designation'] = '' ;
        $_w['Email'] = '' ;
        $_w['Date'] = '' ;
        $_w['Old File Image'] = '' ;
        $_w['Fileds'] = '' ;
        $_w['Edit Form Fields'] = '' ;
        $_w['Deal Name'] = '' ;
        $_w['Fields Name: separate with comma'] = '' ;
        $_w['This is only For admin to manage or sort fields'] = '' ;
        $_w['Field Name'] = '' ;
        $_w['Field Desc'] = '' ;
        $_w['Required'] = '' ;
        $_w['Fileds'] = '' ;
        $_w['Price'] = '' ;
        $_w['Image'] = '' ;
        $_w['NAME'] = '' ;
        $_w['Slug'] = '' ;
        $_w['Deal Products'] = '' ;
        $_w['Short Description'] = '' ;
        $_w['Deal Box Size'] = '' ;
        $_w['Small'] = '' ;
        $_w['Big'] = '' ;
        $_w[''] = '' ;
        $_w[''] = '' ;
        $_w[''] = '' ;
        $_w[''] = '' ;
        $_w[''] = '' ;
        $_w[''] = '' ;
        $_w[''] = '' ;
        $_w[''] = '' ;
        $_w[''] = '' ;
        $_w[''] = '' ;
        $_w[''] = '' ;
        $_w[''] = '' ;
        $_e    =   $this->dbF->hardWordsMulti($_w,$adminPanelLanguage,'Admin Deal');

    }


    public function dealSort(){
        echo '<div class="table-responsive sortDiv">
                <div class="container-fluid activeSort">';
        $sql ="SELECT `name`,image,id FROM `product_deal` WHERE publish = '1' ORDER BY sort ASC";
        $data = $this->dbF->getRows($sql);

        foreach($data as $val){
            $id = $val['id'];
            @$deal_image    =   ($val['image']);
            $image    =  WEB_URL."/images/".$deal_image;
            $title     = $this->functions->unserializeTranslate($val['name']);
            echo '<div class="singleAlbum " id="album_'.$id.'">
                         <div class="col-sm-12 albumSortTop"> ::: </div>
                         <div class="albumImage"><img src="'.$image.'"  class="img-responsive"/></div>
                        <div class="clearfix"></div>
                        <div class="albumMange col-sm-12">
                            <div class="col-sm-12 btn-default" style="">'.$title.'</div>
                        </div>
                    </div>';
        }

        echo '</div>';
        echo '</div>';
    }


    public function dealView(){
        $this->functions->dTableT();
        $sql  = "SELECT * FROM product_deal WHERE publish='1' ORDER BY id DESC";
        $data =  $this->dbF->getRows($sql);
        $this->dealPrint($data);
    }

    public function dealDraft(){
        $sql  = "SELECT * FROM product_deal WHERE publish='0' ORDER BY id DESC";
        $data =  $this->dbF->getRows($sql);
        $this->dealPrint($data);
    }

    public function dealPrint($data){
        global $_e;
        $class="dTableT tableIBMS";
            echo '<div class="table-responsive">
                <table class="table table-hover '.$class.'">
                    <thead>
                        <th>'. _u($_e['SNO']) .'</th>
                        <th>'. _u($_e['NAME']) .'</th>
                        <th>'. _u($_e['ACTION']) .'</th>
                    </thead>
                <tbody>';

        $i = 0;
        $defaultLang = $this->functions->AdminDefaultLanguage();
        foreach($data as $val){
            $i++;
            $id = $val['id'];
            echo "<tr>
                    <td>$i</td>";
                $custom_type = $this->functions->unserializeTranslate($val['name']);
                echo "<td>$custom_type</td>";


            $seoLink = '';
            if($this->functions->developer_setting('seo') == '1'){
                $this->functions->getAdminFile("seo/classes/seo.class.php");
                $seoC = new seo();
                $seoLink = $seoC->seoQuickLink($id,urlencode("/".$this->db->dealProduct."$val[slug]"));
            }


            echo "
                    <td>
                        <div class='btn-group btn-group-sm'>

                        $seoLink

                            <a data-id='$id' href='-".$this->functions->getLinkFolder()."?page=edit&pId=$id&view=edit' class='btn'>
                                <i class='glyphicon glyphicon-edit'></i>
                            </a>
                            <a data-id='$id' onclick='deleteDeal(this);' class='btn'>
                                <i class='glyphicon glyphicon-trash trash'></i>
                                <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
                            </a>
                        </div>
                    </td>
                  </tr>";
        }


        echo '</tbody>
             </table>
            </div> <!-- .table-responsive End -->';
    }

    public function newDealAdd(){
        global $_e,$con,$conIntra;
        if(isset($_POST['submit']) && !isset($_POST['editId'])){
            // $this->dbF->prnt($_POST);
            if(!$this->functions->getFormToken('newDeal')){return false;}
            // $this->dbF->prnt($_POST);
            try{
                $this->db->beginTransaction();
                $image = $this->functions->uploadSingleImage($_FILES['image'],'deal');

                if(!empty($image)){
                    $_POST['insert']['image'] = $image;
                }

                //category
                $categ = $_POST['categoryy'];
                $category_ch = '';
                foreach ($categ as $key => $value) {
                    @$_POST['insert']['category'] .= $value.',';
                    @$category_ch .= 'ss'.$value.',';
                    # code...
                }

                // $this->dbF->prnt($_POST['insert']['category']);
                $_POST['insert']['category'] = rtrim($_POST['insert']['category'],",");
                $category_ch = rtrim($category_ch,",");



                //slug
                $slug = $_POST['slug'];

                $sql_slug = "SELECT * FROM `product_deal` where `slug` = ? ";
                $data_slug = $this->dbF->getRow($sql_slug, array($slug));

                if($this->dbF->rowCount!=0){
                    $slug = $slug."-".rand(1, 15);
                }

                if(!empty($slug)){
                    $_POST['insert']['slug'] = $slug;
                }
                $lastId = $this->functions->formInsert('product_deal',$_POST['insert']);

                if(empty($lastId)){
                    $this->functions->notificationError(_uc($_e['Deal']),'$check: '.$check.' slug after check: '.$slug.' slug in post: '.$_POST['insert']['slug'],'btn-success');
                    throw new Exception("Dublicate slug");
                }



                //if slug not set, then update to its default id
                if(empty($slug)){
                    $sql = "UPDATE product_deal SET slug = '$lastId' WHERE id = '$lastId'";
                    $this->dbF->setRow($sql);
                }

                $migrate_products = $this->functions->ibms_setting('migrate_product_to_ch');

                if(!empty($migrate_products) && $migrate_products == 1){
                    $name_ch = serialize($_POST['insert']['name']);
                    $slug_ch = 'ss'.$slug;
                    $image_path = $image;
                    $image_link = WEB_URL.'/images/'.$image;

                    $pkg = serialize($_POST['insert']['package']);
                    // $pkg_ch = '';
                    // foreach ($pkg as $key => $value) {
                    //     @$pkg_ch .= 'ss'.$value.',';
                    // }
                    // $pkg_ch = rtrim($pkg_ch,",");
                    $publish_ch = $_POST['insert']['publish'];
                    $viewType_ch = $_POST['insert']['view_type'];

                    $sek_price = intval($_POST['insert']['price'][20]);

                    $priceCalc = $this->functions->ibms_setting('priceCalc');
                    $priceCalc = unserialize($priceCalc);

                    $country_fr     = $priceCalc['country'][0];
                    $fr_divide      = $priceCalc['divide'][0];
                    $fr_multiply    = $priceCalc['multiply'][0];
                    $fr_price       = doubleval(($sek_price/$fr_divide)*$fr_multiply);
                    $fr_price       = ceil($fr_price);

                    $country_de     = $priceCalc['country'][1];
                    $de_divide      = $priceCalc['divide'][1];
                    $de_multiply    = $priceCalc['multiply'][1];
                    $de_price       = doubleval(($sek_price/$de_divide)*$de_multiply);
                    $de_price       = ceil($de_price);

                    $country_nl     = $priceCalc['country'][2];
                    $nl_divide      = $priceCalc['divide'][2];
                    $nl_multiply    = $priceCalc['multiply'][2];
                    $nl_price       = doubleval(($sek_price/$nl_divide)*$nl_multiply);
                    $nl_price       = ceil($nl_price);

                    $country_us     = $priceCalc['country'][3];
                    $us_divide      = $priceCalc['divide'][3];
                    $us_multiply    = $priceCalc['multiply'][3];
                    $us_price       = doubleval(($sek_price/$us_divide)*$us_multiply);
                    $us_price       = ceil($us_price);

                    $country_be     = $priceCalc['country'][4];
                    $be_divide      = $priceCalc['divide'][4];
                    $be_multiply    = $priceCalc['multiply'][4];
                    $be_price       = doubleval(($sek_price/$be_divide)*$be_multiply);
                    $be_price       = ceil($be_price);

                    $country_uk     = $priceCalc['country'][5];
                    $uk_divide      = $priceCalc['divide'][5];
                    $uk_multiply    = $priceCalc['multiply'][5];
                    $uk_price       = doubleval(($sek_price/$uk_divide)*$uk_multiply);
                    $uk_price       = ceil($uk_price);

                    $country_es     = $priceCalc['country'][6];
                    $es_divide      = $priceCalc['divide'][6];
                    $es_multiply    = $priceCalc['multiply'][6];
                    $es_price       = doubleval(($sek_price/$es_divide)*$es_multiply);
                    $es_price       = ceil($es_price);

                    $country_at     = $priceCalc['country'][7];
                    $at_divide      = $priceCalc['divide'][7];
                    $at_multiply    = $priceCalc['multiply'][7];
                    $at_price       = doubleval(($sek_price/$at_divide)*$at_multiply);
                    $at_price       = ceil($at_price);

                    $country_it     = $priceCalc['country'][8];
                    $it_divide      = $priceCalc['divide'][8];
                    $it_multiply    = $priceCalc['multiply'][8];
                    $it_price       = doubleval(($sek_price/$it_divide)*$it_multiply);
                    $it_price       = ceil($it_price);

                    $country_chf    = $priceCalc['country'][9];
                    $chf_divide     = $priceCalc['divide'][9];
                    $chf_multiply   = $priceCalc['multiply'][9];
                    $chf_price      = doubleval(($sek_price/$chf_divide)*$chf_multiply);
                    $chf_price      = ceil($chf_price);
                    
                    $price_ch[20] = $chf_price;
                    $price_ch[30] = $fr_price;
                    $price_ch[31] = $de_price;
                    $price_ch[32] = $nl_price;
                    $price_ch[33] = $us_price;
                    $price_ch[34] = $be_price;
                    $price_ch[35] = $uk_price;
                    $price_ch[36] = $es_price;
                    $price_ch[37] = $at_price;
                    $price_ch[38] = $it_price;

                    $price_ch_db = serialize($price_ch);

                    $lastIdCh = 'ss'.$lastId;


                    $sql = "INSERT INTO `product_deal`(`id`,`name`, `slug`, `price`, `category`, `image`, `package`, `view_type`, `publish`) VALUES (?,?,?,?,?,?,?,?,?)";

                    $ch_lastId = $con->setRow($sql, array($lastIdCh,$name_ch,$slug_ch,$price_ch_db,$category_ch, $image_path, $pkg, $viewType_ch, $publish_ch));

                    if($ch_lastId > 0){
                        $sql_img = "INSERT INTO `product_image_refer`(`img_link`, `upload_path`) VALUES (?,?)";
                        $con->setRow($sql_img, array($image_link, $image_path));

                        $ref_id_ch = $this->db->dealProduct.$lastIdCh;
                        $pageLink_ch = "/".$this->db->dealProduct.$slug_ch;

                        $sql = " INSERT INTO `seo` (
                                `ref_id`,
                                `slug`,
                                `pageLink`,
                                `revisit-after`,
                                `type`,
                                `publish`
                                )

                        VALUES ('$ref_id_ch', '$slug_ch', '$pageLink_ch', '1 week','dealProduct' , 1 ) ";
                        $con->setRow($sql);

                        $sql = "INSERT " . "INTO `product_deal_price`
                                    (`deal_id`,`currencyId`,`price`) VALUES 
                                        ('$lastIdCh', 20, $chf_price),
                                        ('$lastIdCh', 30, $fr_price),
                                        ('$lastIdCh', 31, $de_price),
                                        ('$lastIdCh', 32, $nl_price),
                                        ('$lastIdCh', 33, $us_price),
                                        ('$lastIdCh', 34, $be_price),
                                        ('$lastIdCh', 35, $uk_price),
                                        ('$lastIdCh', 36, $es_price),
                                        ('$lastIdCh', 37, $at_price),
                                        ('$lastIdCh', 38, $it_price)";

                        $con->setRow($sql);

                        //Insert Setting
                        $sql_setting = "INSERT " . "INTO `product_deal_setting`
                                (`deal_id`,`setting_name`,`setting_val`) VALUES ";
                        $val_array = array();
                        $foreach_loop_ch = false;
                        foreach ($_POST['setting'] as $key => $val) {
                            if(is_array($val)){
                                $val = serialize($val);
                            }
                                $sql_setting .= " (?,?,?) ,";
                                $val_array[] = $lastIdCh;
                                $val_array[] = $key;
                                $val_array[] = $val;
                                $foreach_loop_ch = true;
                        }
                        $sql_setting = trim($sql_setting, ",");

                        if ($foreach_loop_ch) {
                            $con->setRow($sql_setting, $val_array);
                        }

                    }

                }







     $migrate_product_to_intranet = $this->functions->ibms_setting('migrate_product_to_intranet');

                if(!empty($migrate_product_to_intranet) && $migrate_product_to_intranet == 1){
                    $name_ch = serialize($_POST['insert']['name']);
                    $slug_ch = $slug;
                    $image_path = $image;
                    $image_link = WEB_URL.'/images/'.$image;

                    $pkg = serialize($_POST['insert']['package']);
                    // $pkg_ch = '';
                    // foreach ($pkg as $key => $value) {
                    //     @$pkg_ch .= 'ss'.$value.',';
                    // }
                    // $pkg_ch = rtrim($pkg_ch,",");
                    $publish_ch = $_POST['insert']['publish'];
                    $viewType_ch = $_POST['insert']['view_type'];

                    $sek_price = intval($_POST['insert']['price'][20]);

                    $priceCalc = $this->functions->ibms_setting('priceCalc');
                    $priceCalc = unserialize($priceCalc);

                    $country_fr     = $priceCalc['country'][0];
                    $fr_divide      = $priceCalc['divide'][0];
                    $fr_multiply    = $priceCalc['multiply'][0];
                    $fr_price       = doubleval(($sek_price/$fr_divide)*$fr_multiply);
                    $fr_price       = ceil($fr_price);

                    $country_de     = $priceCalc['country'][1];
                    $de_divide      = $priceCalc['divide'][1];
                    $de_multiply    = $priceCalc['multiply'][1];
                    $de_price       = doubleval(($sek_price/$de_divide)*$de_multiply);
                    $de_price       = ceil($de_price);

                    $country_nl     = $priceCalc['country'][2];
                    $nl_divide      = $priceCalc['divide'][2];
                    $nl_multiply    = $priceCalc['multiply'][2];
                    $nl_price       = doubleval(($sek_price/$nl_divide)*$nl_multiply);
                    $nl_price       = ceil($nl_price);

                    $country_us     = $priceCalc['country'][3];
                    $us_divide      = $priceCalc['divide'][3];
                    $us_multiply    = $priceCalc['multiply'][3];
                    $us_price       = doubleval(($sek_price/$us_divide)*$us_multiply);
                    $us_price       = ceil($us_price);

                    $country_be     = $priceCalc['country'][4];
                    $be_divide      = $priceCalc['divide'][4];
                    $be_multiply    = $priceCalc['multiply'][4];
                    $be_price       = doubleval(($sek_price/$be_divide)*$be_multiply);
                    $be_price       = ceil($be_price);

                    $country_uk     = $priceCalc['country'][5];
                    $uk_divide      = $priceCalc['divide'][5];
                    $uk_multiply    = $priceCalc['multiply'][5];
                    $uk_price       = doubleval(($sek_price/$uk_divide)*$uk_multiply);
                    $uk_price       = ceil($uk_price);

                    $country_es     = $priceCalc['country'][6];
                    $es_divide      = $priceCalc['divide'][6];
                    $es_multiply    = $priceCalc['multiply'][6];
                    $es_price       = doubleval(($sek_price/$es_divide)*$es_multiply);
                    $es_price       = ceil($es_price);

                    $country_at     = $priceCalc['country'][7];
                    $at_divide      = $priceCalc['divide'][7];
                    $at_multiply    = $priceCalc['multiply'][7];
                    $at_price       = doubleval(($sek_price/$at_divide)*$at_multiply);
                    $at_price       = ceil($at_price);

                    $country_it     = $priceCalc['country'][8];
                    $it_divide      = $priceCalc['divide'][8];
                    $it_multiply    = $priceCalc['multiply'][8];
                    $it_price       = doubleval(($sek_price/$it_divide)*$it_multiply);
                    $it_price       = ceil($it_price);

                    $country_chf    = $priceCalc['country'][9];
                    $chf_divide     = $priceCalc['divide'][9];
                    $chf_multiply   = $priceCalc['multiply'][9];
                    $chf_price      = doubleval(($sek_price/$chf_divide)*$chf_multiply);
                    $chf_price      = ceil($chf_price);
                    
                    $price_ch[20] = $chf_price;
                    $price_ch[30] = $fr_price;
                    $price_ch[31] = $de_price;
                    $price_ch[32] = $nl_price;
                    $price_ch[33] = $us_price;
                    $price_ch[34] = $be_price;
                    $price_ch[35] = $uk_price;
                    $price_ch[36] = $es_price;
                    $price_ch[37] = $at_price;
                    $price_ch[38] = $it_price;

                    $price_ch_db = serialize($price_ch);

                    $lastIdCh = $lastId;


                    $sql = "INSERT INTO `product_deal`(`id`,`name`, `slug`, `price`, `category`, `image`, `package`, `view_type`, `publish`) VALUES (?,?,?,?,?,?,?,?,?)";

                    $ch_lastId = $conIntra->setRow($sql, array($lastIdCh,$name_ch,$slug_ch,$price_ch_db,$category_ch, $image_path, $pkg, $viewType_ch, $publish_ch));

                    if($ch_lastId > 0){
                        $sql_img = "INSERT INTO `product_image_refer`(`img_link`, `upload_path`) VALUES (?,?)";
                        $conIntra->setRow($sql_img, array($image_link, $image_path));

                        $ref_id_ch = $this->db->dealProduct.$lastIdCh;
                        $pageLink_ch = "/".$this->db->dealProduct.$slug_ch;

                        $sql = " INSERT INTO `seo` (
                                `ref_id`,
                                `slug`,
                                `pageLink`,
                                `revisit-after`,
                                `type`,
                                `publish`
                                )

                        VALUES ('$ref_id_ch', '$slug_ch', '$pageLink_ch', '1 week','dealProduct' , 1 ) ";
                        $conIntra->setRow($sql);

                        $sql = "INSERT " . "INTO `product_deal_price`
                                    (`deal_id`,`currencyId`,`price`) VALUES 
                                        ('$lastIdCh', 20, $chf_price),
                                        ('$lastIdCh', 30, $fr_price),
                                        ('$lastIdCh', 31, $de_price),
                                        ('$lastIdCh', 32, $nl_price),
                                        ('$lastIdCh', 33, $us_price),
                                        ('$lastIdCh', 34, $be_price),
                                        ('$lastIdCh', 35, $uk_price),
                                        ('$lastIdCh', 36, $es_price),
                                        ('$lastIdCh', 37, $at_price),
                                        ('$lastIdCh', 38, $it_price)";

                        $conIntra->setRow($sql);

                        //Insert Setting
                        $sql_setting = "INSERT " . "INTO `product_deal_setting`
                                (`deal_id`,`setting_name`,`setting_val`) VALUES ";
                        $val_array = array();
                        $foreach_loop_ch = false;
                        foreach ($_POST['setting'] as $key => $val) {
                            if(is_array($val)){
                                $val = serialize($val);
                            }
                                $sql_setting .= " (?,?,?) ,";
                                $val_array[] = $lastIdCh;
                                $val_array[] = $key;
                                $val_array[] = $val;
                                $foreach_loop_ch = true;
                        }
                        $sql_setting = trim($sql_setting, ",");

                        if ($foreach_loop_ch) {
                            $conIntra->setRow($sql_setting, $val_array);
                        }

                    }

                }







                $ref_id = $this->db->dealProduct.$lastId;
                $pageLink = "/".$this->db->dealProduct.$slug;

                $sql = " INSERT INTO `seo` (
                        `ref_id`,
                        `slug`,
                        `pageLink`,
                        `revisit-after`,
                        `type`,
                        `publish`
                        )

            VALUES ('$ref_id', '$slug', '$pageLink', '1 week','dealProduct' , 1 ) ";
            $this->dbF->setRow($sql);


                $sql = "INSERT " . "INTO `product_deal_price`
                        (`deal_id`,`currencyId`,`price`) VALUES ";
                $val_array = array();
                foreach ($_POST['insert']['price'] as $key => $val) {
                        $sql .= " (?,?,?) ,";
                        $val_array[] = $lastId;
                        $val_array[] = $key;
                        $val_array[] = doubleval($val);
                }
                $sql = trim($sql, ",");
                $this->dbF->setRow($sql, $val_array);

                //Insert Setting
                $sql = "INSERT " . "INTO `product_deal_setting`
                        (`deal_id`,`setting_name`,`setting_val`) VALUES ";
                $val_array = array();
                $foreach_loop = false;
                foreach ($_POST['setting'] as $key => $val) {
                    if(is_array($val)){
                        $val = serialize($val);
                    }
                        $sql .= " (?,?,?) ,";
                        $val_array[] = $lastId;
                        $val_array[] = $key;
                        $val_array[] = $val;
                        $foreach_loop = true;
                }
                $sql = trim($sql, ",");

                if ($foreach_loop) {
                    $this->dbF->setRow($sql, $val_array);
                }

                if($lastId != false){
                    $this->db->commit();
                    $this->functions->notificationError(_uc($_e['Deal']),($_e['Deal Add Successfully']),'btn-success');
                    $this->functions->setlog(_uc($_e['Added']),_uc($_e['Deal']),$lastId,($_e['Deal Add Successfully']));
                }else{
                    $this->db->rollBack();
                    $this->functions->notificationError(_uc($_e['Deal']),($_e['Deal Add Failed']),'btn-danger');
                }
            }catch (Exception $e){
                $this->db->rollBack();
                $this->functions->notificationError(_uc($_e['Deal']),_js($_e['Deal Add Failed']."<br>".$this->dbF->rowException),'btn-danger');
            }
        } // If end
    }

    public function dealEditSubmit(){
     global $_e,$con,$conIntra;
        if(isset($_POST['submit']) && isset($_POST['editId'])){

            if(!$this->functions->getFormToken('editDeal')){return false;}

            try{
                $this->db->beginTransaction();
                $lastId = !empty($_POST['editId']) ? $_POST['editId'] : "";

                $image = $this->functions->uploadSingleImage(@$_FILES['image'],'deal');

                if(!empty($image)){
                    $_POST['insert']['image'] = $image;
                    if(isset($_POST['image_old']) && !empty($_POST['image_old'])) {
                        $this->functions->deleteOldSingleImage($_POST['image_old']);
                    }
                }

                $migrate_products = $this->functions->ibms_setting('migrate_product_to_ch');

                //category
                $categ = $_POST['categoryy'];
                $category_ch = '';
                foreach ($categ as $key => $value) {
                    @$_POST['insert']['category'] .= $value.',';
                    @$category_ch .= 'ss'.$value.',';
                }

                $_POST['insert']['category'] = rtrim($_POST['insert']['category'],",");
                $category_ch = rtrim($category_ch,",");


  // $sql = "SELECT * FROM product_deal where id = '$id' ";
  //           $data = $this->dbF->getRow($sql);



                //slug
                $slug = $_POST['slug'];
                
                $check = $this->functions->check_slug_duplicate($slug);

                if($check== 1){
            // echo "sssssssss";
            // die;        
                    $slug = $slug."-".rand(1, 15);
                }

                if(!empty($slug)){
                    $_POST['insert']['slug'] = $slug;
                }

                $returnForm = $this->functions->formUpdate('product_deal',$_POST['insert'],$lastId);
                if($this->dbF->rowException){
                    throw new Exception("Dublicate slug");
                }


                if(!empty($migrate_products) && $migrate_products == 1){
                    $name_ch = serialize($_POST['insert']['name']);
                    $slug_ch = 'ss'.$slug;
                    if(!empty($image)){
                        $image_path = $image;
                    }else{
                        $image_path = $_POST['image_old'];
                    }
                    
                    $image_link = WEB_URL.'/images/'.$image;

                    $pkg = $_POST['insert']['package'];
                    $pkg_ch = '';
                    foreach ($pkg as $key => $value) {
                        @$pkg_ch .= 'ss'.$value.',';
                    }
                    $pkg_ch = rtrim($pkg_ch,",");
                    $publish_ch = $_POST['insert']['publish'];
                    $viewType_ch = $_POST['insert']['view_type'];

                    $sek_price = intval($_POST['insert']['price'][20]);

                    $priceCalc = $this->functions->ibms_setting('priceCalc');
                    $priceCalc = unserialize($priceCalc);

                    $country_fr     = $priceCalc['country'][0];
                    $fr_divide      = $priceCalc['divide'][0];
                    $fr_multiply    = $priceCalc['multiply'][0];
                    $fr_price       = doubleval(($sek_price/$fr_divide)*$fr_multiply);
                    $fr_price       = ceil($fr_price);

                    $country_de     = $priceCalc['country'][1];
                    $de_divide      = $priceCalc['divide'][1];
                    $de_multiply    = $priceCalc['multiply'][1];
                    $de_price       = doubleval(($sek_price/$de_divide)*$de_multiply);
                    $de_price       = ceil($de_price);

                    $country_nl     = $priceCalc['country'][2];
                    $nl_divide      = $priceCalc['divide'][2];
                    $nl_multiply    = $priceCalc['multiply'][2];
                    $nl_price       = doubleval(($sek_price/$nl_divide)*$nl_multiply);
                    $nl_price       = ceil($nl_price);

                    $country_us     = $priceCalc['country'][3];
                    $us_divide      = $priceCalc['divide'][3];
                    $us_multiply    = $priceCalc['multiply'][3];
                    $us_price       = doubleval(($sek_price/$us_divide)*$us_multiply);
                    $us_price       = ceil($us_price);

                    $country_be     = $priceCalc['country'][4];
                    $be_divide      = $priceCalc['divide'][4];
                    $be_multiply    = $priceCalc['multiply'][4];
                    $be_price       = doubleval(($sek_price/$be_divide)*$be_multiply);
                    $be_price       = ceil($be_price);

                    $country_uk     = $priceCalc['country'][5];
                    $uk_divide      = $priceCalc['divide'][5];
                    $uk_multiply    = $priceCalc['multiply'][5];
                    $uk_price       = doubleval(($sek_price/$uk_divide)*$uk_multiply);
                    $uk_price       = ceil($uk_price);

                    $country_es     = $priceCalc['country'][6];
                    $es_divide      = $priceCalc['divide'][6];
                    $es_multiply    = $priceCalc['multiply'][6];
                    $es_price       = doubleval(($sek_price/$es_divide)*$es_multiply);
                    $es_price       = ceil($es_price);

                    $country_at     = $priceCalc['country'][7];
                    $at_divide      = $priceCalc['divide'][7];
                    $at_multiply    = $priceCalc['multiply'][7];
                    $at_price       = doubleval(($sek_price/$at_divide)*$at_multiply);
                    $at_price       = ceil($at_price);

                    $country_it     = $priceCalc['country'][8];
                    $it_divide      = $priceCalc['divide'][8];
                    $it_multiply    = $priceCalc['multiply'][8];
                    $it_price       = doubleval(($sek_price/$it_divide)*$it_multiply);
                    $it_price       = ceil($it_price);

                    $country_chf    = $priceCalc['country'][9];
                    $chf_divide     = $priceCalc['divide'][9];
                    $chf_multiply   = $priceCalc['multiply'][9];
                    $chf_price      = doubleval(($sek_price/$chf_divide)*$chf_multiply);
                    $chf_price      = ceil($chf_price);
                    
                    $price_ch[20] = $chf_price;
                    $price_ch[30] = $fr_price;
                    $price_ch[31] = $de_price;
                    $price_ch[32] = $nl_price;
                    $price_ch[33] = $us_price;
                    $price_ch[34] = $be_price;
                    $price_ch[35] = $uk_price;
                    $price_ch[36] = $es_price;
                    $price_ch[37] = $at_price;
                    $price_ch[38] = $it_price;

                    $price_ch_db = serialize($price_ch);

                    $lastIdCh = 'ss'.$lastId;

                    $sql = "UPDATE `product_deal` SET
                                `name` = '$name_ch',
                                `slug` = '$slug_ch',
                                `price` = '$price_ch_db',
                                `category` = '$category_ch',
                                `image` = '$image_path',
                                `package` = '$pkg_ch',
                                `view_type` = '$viewType_ch',
                                `publish` = '$publish_ch'    

                                WHERE `id` = '$lastIdCh'

                                ";

                    $ch_lastId = $con->setRow($sql);

                    if($con->rowCount > 0){

                        $sql_del_refer = "DELETE FROM `product_image_refer` WHERE `upload_path` = ?";
                        $con->setRow($sql_del_refer, array($_POST['image_old']));

                        $sql_img = "INSERT INTO `product_image_refer`(`img_link`, `upload_path`) VALUES (?,?)";
                        $con->setRow($sql_img, array($image_link, $image_path));

                        $ref_id_ch = $this->db->dealProduct.$lastIdCh;
                        $pageLink_ch = "/".$this->db->dealProduct.$slug_ch;

                        $sql = " UPDATE `seo` SET 
                                    `slug` = ?,
                                    `pageLink` = ?

                                    WHERE `ref_id` = '$ref_id_ch'";
                        $con->setRow($sql, array($slug_ch, $pageLink_ch));

                        $sql = "DELETE FROM product_deal_price WHERE deal_id = '$lastIdCh'";
                        $con->setRow($sql);

                        $sql = "INSERT INTO `product_deal_price`
                                    (`deal_id`,`currencyId`,`price`) VALUES 
                                        ('$lastIdCh', 20, $chf_price),
                                        ('$lastIdCh', 30, $fr_price),
                                        ('$lastIdCh', 31, $de_price),
                                        ('$lastIdCh', 32, $nl_price),
                                        ('$lastIdCh', 33, $us_price),
                                        ('$lastIdCh', 34, $be_price),
                                        ('$lastIdCh', 35, $uk_price),
                                        ('$lastIdCh', 36, $es_price),
                                        ('$lastIdCh', 37, $at_price),
                                        ('$lastIdCh', 38, $it_price)";


                        $con->setRow($sql);

                        //Insert Setting
                        $sql_setting = "INSERT " . "INTO `product_deal_setting`
                                (`deal_id`,`setting_name`,`setting_val`) VALUES ";
                        $val_array = array();
                        $foreach_loop_ch = false;
                        foreach ($_POST['setting'] as $key => $val) {
                            if(is_array($val)){
                                $val = serialize($val);
                            }
                                $sql_setting .= " (?,?,?) ,";
                                $val_array[] = $lastIdCh;
                                $val_array[] = $key;
                                $val_array[] = $val;
                                $foreach_loop_ch = true;
                        }
                        $sql_setting = trim($sql_setting, ",");

                        if ($foreach_loop_ch) {
                            $con->setRow($sql_setting, $val_array);
                        }

                    }

                }

                $migrate_product_to_intranet = $this->functions->ibms_setting('migrate_product_to_intranet');







    if(!empty($migrate_product_to_intranet) && $migrate_product_to_intranet == 1){
                    $name_ch = serialize($_POST['insert']['name']);
                    $slug_ch = $slug;
                    if(!empty($image)){
                        $image_path = $image;
                    }else{
                        $image_path = $_POST['image_old'];
                    }
                    
                    $image_link = WEB_URL.'/images/'.$image;

                    $pkg = $_POST['insert']['package'];
                    $pkg_ch = '';
                    foreach ($pkg as $key => $value) {
                        @$pkg_ch .= $value.',';
                    }
                    $pkg_ch = rtrim($pkg_ch,",");
                    $publish_ch = $_POST['insert']['publish'];
                    $viewType_ch = $_POST['insert']['view_type'];

                    $sek_price = intval($_POST['insert']['price'][20]);

                    $priceCalc = $this->functions->ibms_setting('priceCalc');
                    $priceCalc = unserialize($priceCalc);

                    $country_fr     = $priceCalc['country'][0];
                    $fr_divide      = $priceCalc['divide'][0];
                    $fr_multiply    = $priceCalc['multiply'][0];
                    $fr_price       = doubleval(($sek_price/$fr_divide)*$fr_multiply);
                    $fr_price       = ceil($fr_price);

                    $country_de     = $priceCalc['country'][1];
                    $de_divide      = $priceCalc['divide'][1];
                    $de_multiply    = $priceCalc['multiply'][1];
                    $de_price       = doubleval(($sek_price/$de_divide)*$de_multiply);
                    $de_price       = ceil($de_price);

                    $country_nl     = $priceCalc['country'][2];
                    $nl_divide      = $priceCalc['divide'][2];
                    $nl_multiply    = $priceCalc['multiply'][2];
                    $nl_price       = doubleval(($sek_price/$nl_divide)*$nl_multiply);
                    $nl_price       = ceil($nl_price);

                    $country_us     = $priceCalc['country'][3];
                    $us_divide      = $priceCalc['divide'][3];
                    $us_multiply    = $priceCalc['multiply'][3];
                    $us_price       = doubleval(($sek_price/$us_divide)*$us_multiply);
                    $us_price       = ceil($us_price);

                    $country_be     = $priceCalc['country'][4];
                    $be_divide      = $priceCalc['divide'][4];
                    $be_multiply    = $priceCalc['multiply'][4];
                    $be_price       = doubleval(($sek_price/$be_divide)*$be_multiply);
                    $be_price       = ceil($be_price);

                    $country_uk     = $priceCalc['country'][5];
                    $uk_divide      = $priceCalc['divide'][5];
                    $uk_multiply    = $priceCalc['multiply'][5];
                    $uk_price       = doubleval(($sek_price/$uk_divide)*$uk_multiply);
                    $uk_price       = ceil($uk_price);

                    $country_es     = $priceCalc['country'][6];
                    $es_divide      = $priceCalc['divide'][6];
                    $es_multiply    = $priceCalc['multiply'][6];
                    $es_price       = doubleval(($sek_price/$es_divide)*$es_multiply);
                    $es_price       = ceil($es_price);

                    $country_at     = $priceCalc['country'][7];
                    $at_divide      = $priceCalc['divide'][7];
                    $at_multiply    = $priceCalc['multiply'][7];
                    $at_price       = doubleval(($sek_price/$at_divide)*$at_multiply);
                    $at_price       = ceil($at_price);

                    $country_it     = $priceCalc['country'][8];
                    $it_divide      = $priceCalc['divide'][8];
                    $it_multiply    = $priceCalc['multiply'][8];
                    $it_price       = doubleval(($sek_price/$it_divide)*$it_multiply);
                    $it_price       = ceil($it_price);

                    $country_chf    = $priceCalc['country'][9];
                    $chf_divide     = $priceCalc['divide'][9];
                    $chf_multiply   = $priceCalc['multiply'][9];
                    $chf_price      = doubleval(($sek_price/$chf_divide)*$chf_multiply);
                    $chf_price      = ceil($chf_price);
                    
                    $price_ch[20] = $chf_price;
                    $price_ch[30] = $fr_price;
                    $price_ch[31] = $de_price;
                    $price_ch[32] = $nl_price;
                    $price_ch[33] = $us_price;
                    $price_ch[34] = $be_price;
                    $price_ch[35] = $uk_price;
                    $price_ch[36] = $es_price;
                    $price_ch[37] = $at_price;
                    $price_ch[38] = $it_price;

                    $price_ch_db = serialize($price_ch);

                    $lastIdCh = $lastId;

                    $sql = "UPDATE `product_deal` SET
                                `name` = '$name_ch',
                                `slug` = '$slug_ch',
                                `price` = '$price_ch_db',
                                `category` = '$category_ch',
                                `image` = '$image_path',
                                `package` = '$pkg_ch',
                                `view_type` = '$viewType_ch',
                                `publish` = '$publish_ch'    

                                WHERE `id` = '$lastIdCh'

                                ";

                    $ch_lastId = $conIntra->setRow($sql);

                    if($conIntra->rowCount > 0){

                        $sql_del_refer = "DELETE FROM `product_image_refer` WHERE `upload_path` = ?";
                        $conIntra->setRow($sql_del_refer, array($_POST['image_old']));

                        $sql_img = "INSERT INTO `product_image_refer`(`img_link`, `upload_path`) VALUES (?,?)";
                        $conIntra->setRow($sql_img, array($image_link, $image_path));

                        $ref_id_ch = $this->db->dealProduct.$lastIdCh;
                        $pageLink_ch = "/".$this->db->dealProduct.$slug_ch;

                        $sql = " UPDATE `seo` SET 
                                    `slug` = ?,
                                    `pageLink` = ?

                                    WHERE `ref_id` = '$ref_id_ch'";
                        $conIntra->setRow($sql, array($slug_ch, $pageLink_ch));

                        $sql = "DELETE FROM product_deal_price WHERE deal_id = '$lastIdCh'";
                        $conIntra->setRow($sql);

                        $sql = "INSERT INTO `product_deal_price`
                                    (`deal_id`,`currencyId`,`price`) VALUES 
                                        ('$lastIdCh', 20, $chf_price),
                                        ('$lastIdCh', 30, $fr_price),
                                        ('$lastIdCh', 31, $de_price),
                                        ('$lastIdCh', 32, $nl_price),
                                        ('$lastIdCh', 33, $us_price),
                                        ('$lastIdCh', 34, $be_price),
                                        ('$lastIdCh', 35, $uk_price),
                                        ('$lastIdCh', 36, $es_price),
                                        ('$lastIdCh', 37, $at_price),
                                        ('$lastIdCh', 38, $it_price)";


                        $conIntra->setRow($sql);

                        //Insert Setting
                        $sql_setting = "INSERT " . "INTO `product_deal_setting`
                                (`deal_id`,`setting_name`,`setting_val`) VALUES ";
                        $val_array = array();
                        $foreach_loop_ch = false;
                        foreach ($_POST['setting'] as $key => $val) {
                            if(is_array($val)){
                                $val = serialize($val);
                            }
                                $sql_setting .= " (?,?,?) ,";
                                $val_array[] = $lastIdCh;
                                $val_array[] = $key;
                                $val_array[] = $val;
                                $foreach_loop_ch = true;
                        }
                        $sql_setting = trim($sql_setting, ",");

                        if ($foreach_loop_ch) {
                            $conIntra->setRow($sql_setting, $val_array);
                        }

                    }

                }




                $sql = "DELETE FROM product_deal_price WHERE deal_id = '$lastId'";
                $this->dbF->setRow($sql);

                //if slug not set, then update to its default id
                if(empty($slug)){
                    $sql = "UPDATE product_deal SET slug = '$lastId' WHERE id = '$lastId'";
                    $this->dbF->setRow($sql);
                }

                $check = $this->functions->check_slug_duplicate($slug);
               if($check== 1){
                    $slug = $slug.uniqid();
                }

                $ref_id = $this->db->dealProduct.$lastId;
                $pageLink = "/".$this->db->dealProduct.$slug;

                $sql1 = " UPDATE `seo` SET `pageLink`= ?, `slug` = ? WHERE `ref_id` = '".$ref_id."'";
                $arrayy = array($pageLink,$slug);
                $this->dbF->setRow($sql1,$arrayy);


                $sql = "INSERT " . "INTO `product_deal_price`
                        (`deal_id`,`currencyId`,`price`) VALUES ";
                $val_array      = array();
                foreach($_POST['insert']['price'] as $key => $val) {
                        $sql .= " (?,?,?) ,";
                        $val_array[] = $lastId;
                        $val_array[] = $key;
                        $val_array[] = doubleval($val);
                }
                $sql = trim($sql, ",");
                    $this->dbF->setRow($sql, $val_array);

                //Insert Setting
                $sql = "DELETE FROM product_deal_setting WHERE deal_id = '$lastId'";
                $this->dbF->setRow($sql);

                $sql = "INSERT " . "INTO `product_deal_setting`
                        (`deal_id`,`setting_name`,`setting_val`) VALUES ";
                $val_array = array();
                $foreach_loop = false;
                foreach ($_POST['setting'] as $key => $val) {
                    if(is_array($val)){
                        $val = serialize($val);
                    }
                    $sql .= " (?,?,?) ,";
                    $val_array[] = $lastId;
                    $val_array[] = $key;
                    $val_array[] = $val;
                    $foreach_loop = true;
                }
                $sql = trim($sql, ",");
                if ($foreach_loop) {
                    $this->dbF->setRow($sql, $val_array);
                }


                if($this->dbF->rowCount>0){
                    $this->db->commit();
                    $this->functions->notificationError(_uc($_e['Deal']),($_e['Deal Update Successfully']),'btn-success');
                    $this->functions->setlog(_uc($_e['Update']),_uc($_e['Deal']),$lastId,($_e['Deal Update Successfully']));
                }else{
                    $this->db->rollBack();
                    $this->functions->notificationError(_uc($_e['Deal']),($_e['Deal Update Failed']),'btn-danger');
                }
            }catch (Exception $e){
                $this->db->rollBack();
                $this->functions->notificationError(_uc($_e['Deal']),_js($_e['Deal Update Failed']."<br>".$this->dbF->rowException),'btn-danger');
            }

        }
    }
    public function findArrayFromDealProductSetting($data,$settingName){
        foreach($data as $val){
            if($val['setting_name'] == $settingName){
                return $val['setting_val'];
            }
        }
        return "";
    }

    public function dealNew(){
        global $_e;
        $this->dealEdit(true);
    }

    public function dealEdit($new=false){
        global $_e;
        if($new){
            $token = $this->functions->setFormToken('newDeal',false);
        }else{
            $id = $_GET['pId'];
            $sql = "SELECT * FROM product_deal where id = '$id' ";
            $data = $this->dbF->getRow($sql);

            $sql = "SELECT * FROM product_deal_setting where deal_id = '$id' ";
            $dataSetting = $this->dbF->getRows($sql);

            $token = $this->functions->setFormToken('editDeal', false);
            $token .= '<input type="hidden" name="editId" value="'.$id.'"/>';
        }

        $form_fields    = array();
        $form_fields[] = array(
            'type' => 'none',
            'thisFormat' => $token
        );

        $lang   =   $this->functions->IbmsLanguages();

        for ($i = 0; $i < sizeof($lang); $i++) {
            if($i == 0) {
                $collapseIn = ' in ';
            }else {
                $collapseIn = '';
            }

            $form_fields[] = array(
                'type' => 'none',
                'group' => 'name',
                'thisFormat' => '<div class="panel panel-default">
                                  <div class="panel-heading">
                                         <a data-toggle="collapse" data-parent="#accordion" href="#'.$lang[$i].'">
                                            <h4 class="panel-title">
                                                '.$lang[$i].'
                                            </h4>
                                         </a>
                                  </div>
                              <div id="'.$lang[$i].'" class="panel-collapse collapse '.$collapseIn.'">
                                <div class="panel-body">'
            );

            @$val       = unserialize($data['name']);
            if(isset($val[$lang[$i]])){
                $valu = $val[$lang[$i]];
            }
            else{
                $valu = '';
            }
            $form_fields[] = array(
                "label" => $_e['Deal Name'],
                'group' => 'name',
                "name"  => "insert[name][".$lang[$i]."]",
                'class' => 'form-control',
                'type'  => 'text',
                'value' => $valu
            );

            @$val       = unserialize($this->findArrayFromDealProductSetting($dataSetting,'sDesc'));
            $form_fields[] = array(
                "label" => $_e['Short Description'],
                'group' => 'name',
                "name"  => "setting[sDesc][".$lang[$i]."]",
                'class' => 'form-control ckeditor',
                'type'  => 'textarea',
                'value' => $valu
            );

            $form_fields[] = array(
                'type' => 'none',
                'group' => 'name',
                'thisFormat' => '       </div> <!-- panel-body end -->
                          </div> <!-- collapse end-->
                     </div>'
            );
        }

        $form_fields[] = array(
            'type' => 'group',
            'name' => 'name',
            'group' => 'basic',
            'thisFormat' => '<div class="panel-group" id="accordion">{{form}}</div><!--#accordion-->'
        );


        //Price
        $countryCodeList    = $this->functions->countrylist(); // country list
        $currency_data      = $this->c_currency->getList(); // get currency list
        $tds    = "<td></td>";
        $tds2   = "<td></td>";
        @$val2       =  unserialize($data['price']);
        foreach ($currency_data as $val) {
            $country_id     = $val['cur_id'];
            $symbol         = $val['cur_symbol'];
            $country_name   = $countryCodeList[$val['cur_country']];
            $currency       = $val["cur_name"];
            @$oldPrice      = $val2[$country_id];
            $tds .= "<td>$country_name ($currency)</td>";
            $tds2 .= '<td>
                        <div class="input-group input-group-sm">
                          <span class="input-group-addon">'.$symbol.'</span>
                          <input type="text" class="form-control" value="'.$oldPrice.'" name="insert[price]['.$country_id.']" >
                        </div>
                      </td> ';
        }

        $form_fields[] = array(
            'type' => 'none',
            'group' => 'price',
            'thisFormat' => "<table class='table table-striped table-hover'><tr>$tds</tr><tr>$tds2</tr></table> <hr>"
        );


        @$val       =   $data['image'];
        if(!empty($val)){
            $val = WEB_URL."/images/".$val;
        }
        $form_fields[]  = array(
            "label" => $_e['Image'],
            "name"  => "image",
            'class' => 'form-control',
            'type'  => 'image',
            'image' => "$val",
            'format' => "{{image}} {{form}}",
            'group' => 'basic',
        );


        $sql            = "SELECT `prodet_id`,`prodet_name` FROM proudct_detail WHERE `product_update` = '1'";
        $dataProducts   = $this->dbF->getRows($sql);
        $options = array();
        $values = array();
        foreach($dataProducts as $val){
            $values[] = $val['prodet_id'];
            $options[] = $this->functions->unserializeTranslate($val['prodet_name']);
        }

        @$val       =   unserialize($data['package']);
        $form_fields[]  = array(
            "label" => $_e['Deal Products'],
            "name"  => 'insert[package][]',
            'class' => 'form-control',
            'id'    => 'newDealProduct',
            'type'  => 'select',
            'select' => $val,
            'option' => $options,
            'value' => $values,
            'multi'  => 'true',
            'data' => 'style="height: 330px;"',
            'group' => 'basic',
        );


        @$val       = ($data['slug']);
        $form_fields[] = array(
            "label" => $_e['Slug'],
            "name"  => "slug",
            'class' => 'form-control',
            'type'  => 'text',
            'pattern' => '[A-Za-z0-9-_+]{1,150}',
            'value' => $val,
            'group' => 'basic',
        );


        @$val       =   ($data['view_type']);
        $form_fields[]  = array(
            "label" => $_e['Deal Box Size'],
            'type'  => 'checkbox',
            'value' => "$val",
            'select' => "1",
            'format' => '<div class="make-switch" data-off="danger" data-on="success" data-on-label="'. _uc($_e['Big']) .'" data-off-label="'. _uc($_e['Small']) .'">
                            {{form}}
                            <input type="hidden" name="insert[view_type]" class="checkboxHidden" value="'.$val.'" />
                         </div>',
            'group' => 'basic',
        );


        @$val       =   $data['publish'];
        $form_fields[]  = array(
            "label" => $_e['Publish'],
            'type'  => 'checkbox',
            'value' => "$val",
            'select' => "1",
            'format' => '<div class="make-switch" data-off="danger" data-on="success" data-on-label="'. _uc($_e['Publish']) .'" data-off-label="'. _uc($_e['Draft']) .'">
                            {{form}}
                            <input type="hidden" name="insert[publish]" class="checkboxHidden" value="'.$val.'" />
                         </div>',
            'group' => 'basic',
        );


        $form_fields[] = array(
            'type'  => 'group',
            'name'  => 'basic',
            'group' => 'tabsContent',
            'thisFormat' => '<div class="tab-pane fade in active container-fluid" id="basicInfo">
                                <h2  class="tab_heading">'._uc($_e['Basic Information']).'</h2>
                                {{form}}
                             </div>',
        );

        $form_fields[] = array(
            'type'  => 'group',
            'name'  => 'price',
            'group' => 'tabsContent',
            'thisFormat' => '<div class="tab-pane fade in container-fluid" id="price">
                                <h2  class="tab_heading">'._uc($_e['Price']).'</h2>
                                {{form}}
                             </div>',
        );

        $selectedNode="";
        @$selectedNode       =   ($data['category']);
        $count_cat = explode(',', $selectedNode);
        $cnt = count($count_cat);
        $linkCategory = WEB_URL.'/'.ADMIN_FOLDER.'/product_management/?operation=get_node';
        $category = <<<HTML
            <script type="text/javascript">
                $(function () {
                    $("#tree").jstree({
                        'core': {
                            'data': {
                                'url': '$linkCategory',
                                'data': function (node) {
                                    return { 'id': node.id };
                                }
                            }
                        },
                        "plugins": [ "wholerow", "checkbox","ui" ]
                    })
                        .on('loaded.jstree', function () {
                            $("#tree").jstree('open_all');
                        }).on('open_all.jstree', function () {

                            $('#tree').jstree(true).select_node([$selectedNode]);
                        })
                        .on('changed.jstree', function (e, data) {
                            if (data && data.selected && data.selected.length) {
                                $('.category_make_root').val(data.selected);
                            } else {
                                $('.category_make_root').val('0');
                            }
                        });
                });
            </script>
            <div id="tree"></div>
            <div>
                <!-- <input type="hidden" class="category_make_root" name="insert[category]"> -->
            </div>
            <br><br>
HTML;



    $category1 = '<ul id="nestedlist">';

        ##### Main MENU
        $css = false;
        $view_css= '';
        $mainMenu = $this->menuTypeSingle('main');
        foreach ($mainMenu as $val) {
        $insideActive = false;
        $innerUl = '';
        $menuId = $val['id'];
        $text = _n($val['name']);
        $link = $val['link'];

        // $underid = $val['under'];
        $has_inner_level_two_class = '';
        $inner_level_two = null;
        $mainMenu2 = $this->menuTypeSingle('main', $menuId);
        if (!empty($mainMenu2)) {
        $has_inner_level_two_class = 'has-sub';
        $inner_level_two = true;

        $innerUl .= '

        <ul>
        ';
        foreach ($mainMenu2 as $val2) {
        $innerUl3 = '';
        $text = _n($val2['name']);
        $menuId2 = $val2['id'];
        $link = $val2['link'];
        $menuIcon = '';
        $active = $val2['active'];


        // $underid = $val2['under'];

        if ($active == '1') {
        $active = 'active';
        $insideActive = $css = true;
        }

        $has_inner_level_three_class = '';

        $mainMenu3 = $this->menuTypeSingle('main', $menuId2);
        # count the inner level 3 lis
        $innerUl3count = ( $mainMenu3 == false ? 0 : count($mainMenu3) ) ;
        $innerUl3 .= ( $innerUl3count > 0 ) ? '<ul>' : '';

        if ( $innerUl3count > 0) {

        foreach ($mainMenu3 as $val3) {
        $view_css3 = '';
        $text3       = _n($val3['name']);
        $menuId3     = $val3['id'];
        $link3       = $val3['link'];
        $menuIcon3   = $val3['icon'];
        $active3     = $val3['active'];
        if ($active3 == '1') {
        $active3 = 'active';
        $insideActiveThree = true;
        }


        $has_inner_level_three_class = 'has-sub';

        $innerUl3 .= '

        <li><input type="checkbox" name="categoryy[]" value='.$menuId3.'>
        '. $text3 . '

        </li>


        ';

        }

        }

        $innerUl3 .= ( $innerUl3count > 0 ) ? '</ul><!--3rd array End-->' : '';

        // $innerUl3 .= "</ul><!--3rd array End-->";
        if ($innerUl3) {

        // var_dump($menuId);

        $image_div = '';

        } else {
        $image_div = '';
        }

        $innerUl .= '

        <li><input type="checkbox" name="categoryy[]" value='.$menuId2.'>

        ' . $text . '

        <span>

        '.$image_div.'

        </span>' . $innerUl3 . '

        </li>
        ';
        }

        $innerUl .= "</ul><!--2nd array End-->";
        }

        $text = _n($val['name']);

        $link = $val['link'];
        $menuIcon = $val['icon'];
        if (!empty($menuIcon)) {
        $image_div = '<img src="' . $menuIcon . '" alt="">';
        } else {
        $image_div = '';
        }
        $active = $val['active'];

        if ($active == '1' || $insideActive) {

        if (!empty($mainMenu2)) {
        $css = true;
        }
        $active = 'active';
        }

        $category1 .= '
        <li><input type="checkbox" name="categoryy[]" value='.$menuId.'>

        ' . $text . '



        ' . $innerUl . '

        </li>
        ';
        }

    $category1 .= '</ul>';





        $form_fields[] = array(
            'type'  => 'none',
            'group' => 'tabsContent',
            'thisFormat' => '<div class="tab-pane fade in container-fluid" id="category">
                                <h2  class="tab_heading">'._uc($_e['Category']).'</h2>
                                '.$category1.'
                             </div>',
        );

        $form_fields[] = array(
            'type' => 'group',
            'name' => 'tabsContent',
            'thisFormat' => '<ul class="nav nav-tabs tabs_arrow" role="tablist">
                                <li class="active"><a href="#basicInfo" role="tab" data-toggle="tab">'._uc($_e['Basic Information']).'</a></li>
                                <li><a href="#price" role="tab" data-toggle="tab">'._uc($_e['Price']).'</a></li>
                                <li><a href="#category" role="tab" data-toggle="tab">'._uc($_e['Category']).'</a></li>
                             </ul>

                             <!-- Tab panes -->
                             <div class="tab-content">
                             {{form}}
                             </div>
                            ',
        );


        $form_fields[]  = array(
            "label" => "submit",
            "name"  => 'submit',
            'class' => 'btn btn-primary',
            'type'  => 'submit',
            'thisFormat' => '<div class="form-group container-fluid">
                                {{form}}
                              </div>'
        );

        $form_fields['form']  = array(
            'name'      => "form",
            'type'      => 'form',
            'class'     => "",
            'id'        => "formId",
            'action'   => '-'.$this->functions->getLinkFolder().'?page=deal',
            'method'   => 'post',
            'format'   => '<div class="form-horizontal">{{form}}</div>'
        );

        $format = '<div class="form-group">
                        <label class="col-sm-2 col-md-3  control-label">{{label}}</label>
                        <div class="col-sm-10  col-md-9">
                            {{form}}
                        </div>
                    </div>';
        //$format = false;
        $this->functions->print_form($form_fields,$format);


        for ($i=0; $i < $cnt; $i++) { 
            $cat_idd = $count_cat[$i];
            ?>

            <script>
            var p_idd = '<?php echo $cat_idd; ?>';
            console.log(p_idd);
            $(':checkbox[value=<?php echo $cat_idd; ?>]').attr({
                checked: 'true'
            });
            //console.log(a);
            </script>

        <?php
        }
    }

    public function dealArray($data,$filedName,$settingName){
        foreach($data as $key=>$val){
            if($val['fieldName'] == $filedName && $val['setting_name'] == $settingName)
                return $val['setting_value'];
        }

        return "";
    }

    public function dealFields(){
        global $_e;
        $pId        =   $_GET['pId'];

        $sql    = "SELECT * FROM p_custom WHERE id = '$pId'";
        $data   = $this->dbF->getRow($sql);
        $fields = $data['custom_fields'];
        $fields = str_replace(",,","",$fields);
        $fields = trim($fields,",");
        $fields = explode(",",$fields);

        $sql          = "SELECT * FROM p_custom_setting WHERE c_id = '$pId'";
        $dataFields   = $this->dbF->getRows($sql);

        $token       = $this->functions->setFormToken('dealFields',false);
        $token .= '<input type="hidden" name="editId" value="'.$pId.'"/>';

        $format     = '<div class="form-group">
                            <label class="col-sm-2 col-md-3  control-label">{{label}}</label>
                            <div class="col-sm-10  col-md-9">
                                {{form}}
                            </div>
                        </div>';

        echo "<form class='form-horizontal' action='-deal?page=deal' method='post'> $token.";

        echo '<div class="form-horizontal">';
            $lang = $this->functions->IbmsLanguages();
            if($lang != false){
                $lang_nonArray = implode(',', $lang);
            }
            echo '<input type="hidden" name="lang" value="'.$lang_nonArray.'" />';

        echo '<div class="accordion1">';

        foreach($fields as $key=>$val) {
            echo '<h3>'.$val.'</h3>';
            echo '<div class="accordion">';

            for ($i = 0; $i < sizeof($lang); $i++) {
                echo '
                        <h3>'.$lang[$i].'</h3>
                          <div class="insideAccordion">';
                                $form_fields = array();

                                $valTemp = $this->functions->unserializeTranslate($this->dealArray($dataFields,$val,'name'),$lang[$i]);
                                $form_fields[] = array(
                                    'label'     => $_e["Field Name"],
                                    'name'      => "$val"."[name]["."$lang[$i]]",
                                    'type'      => 'text',
                                    'class'     => 'form-control',
                                    'value'     => "$valTemp"
                                );


                                $valTemp = $this->functions->unserializeTranslate($this->dealArray($dataFields,$val,'desc'),$lang[$i]);
                                $form_fields[] = array(
                                    'label'     => $_e["Field Desc"],
                                    'name'      => "$val"."[desc]["."$lang[$i]]",
                                    'type'      => 'textarea',
                                    'class'     => 'form-control ckeditor',
                                    'value'     => "$valTemp"
                                );

                                $valFormTemp   =   $this->functions->unserializeTranslate($this->dealArray($dataFields,$val,'required'),$lang[$i]);
                                if(empty($valFormTemp)){
                                    $valFormTemp = '0';
                                }
                                $name = $val.'[required]['.$lang[$i].']';
                                $form_fields[]  = array(
                                    "label" => $_e['Required'],
                                    'type'  => 'checkbox',
                                    'value' => "$valFormTemp",
                                    'select' => "$valFormTemp",
                                    'format' => '<div class="make-switch" data-off="danger" data-on="success">
                                                    {{form}}
                                                  <input type="hidden" name="'.$name.'" class="checkboxHidden" value="'.$valFormTemp.'" />
                                                 </div>'
                                );

                                $this->functions->print_form($form_fields,$format);

                echo "    </div><!--.insideAccordion End-->
                        ";
            }

            echo " </div><!--.accordion-->";
        }

        echo " </div><!--.accordion1-->";
        echo '<script>
                      $(function() {
                        $( ".accordion,.accordion1 " ).accordion({
                              heightStyle: "content",
                               collapsible: true
                            });
                      });
                            </script>';

        $form_fields = array();
        $form_fields[] = array(
            'label'     => "",
            'name'      => "submit",
            'type'      => 'submit',
            'class'     => 'btn btn-primary',
            'format'   => '<br><br>{{form}}'
        );


        $this->functions->print_form($form_fields,$format);




        echo "</div></form>";


    }

        //////////////// Main menu function ///////////////////////////////////////////

    public function menuTypeSingle($type='main',$under='0',$url_function=false){
        global $_e;
        $sql = "SELECT * FROM categories WHERE under = '$under' AND type='$type' ORDER BY sort ASC";
        $data  = $this->dbF->getRows($sql);

        if(!$this->dbF->rowCount){return false;}
        foreach($data as $val){
            $id = $val['id'];
            $heading = htmlspecialchars(translateFromSerialize($val['name']));

            $link = $val['link'];
            if ($url_function) {
                $link = $this->functions->addCatRegexWebUrlInLink($link);
            } else {
                $link = $this->functions->addWebUrlInLink($link);
            }

            $icon = $val['icon'];
            $icon = $this->functions->addWebUrlInLink($icon);

            $array["$id"]['name']   = $heading;
            $array["$id"]['link']   = $link;
            $array["$id"]['icon']   = $icon;
            $array["$id"]['id']     = $id;
            $array["$id"]['active']= '';
            $activeLink = pageLink(false);
            if( ($activeLink) == ($link)){
                $array["$id"]['active']= '1';
            }
        }

        return $array;
    }


}


?>



<style>

#nestedlist, #nestedlist ul {
  list-style-type: none;
  margin-left:0;
  padding-left:30px;
  text-indent: -4px;
}

/* UL Layer 1 Rules */
#nestedlist {
  /*font-size: 20px;*/
  font-weight:bold;
}

/* UL Layer 2 Rules */
#nestedlist ul {
  /*font-size: 18px;*/
  font-weight: normal;
  margin-top: 3px;
}

/* UL Layer 3 Rules */
#nestedlist ul ul {
  font-size: 16px;
}

/* UL 4 Rules */
#nestedlist ul ul ul {
  font-size: 14px;
}


/*ul li a {
  text-decoration: none;
  border: 1px solid #000;
  border-width: 0 0 1px 1px;
  border-radius: 0 0 0 10px;
}*/  
    </style>