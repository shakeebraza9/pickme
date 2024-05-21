<?php
global $dbF;
global $db;
global $_e;
global $functions;
global $productClass;
global $webClass;
global $menuClass;
global $seo;
/*
$functions->developer_setting_update("emailImedia",base64_encode("asad_raza99@yahoo.com,abid@imedia.com.pk,info@imedia.com.pk"));
echo  $functions->getFooterMd5();
        exit;
Want to change SEO ? just after include global, change seo array value
var_dump($_COOKIE);
var_dump(session_get_cookie_params());
var_dump($_SERVER);
var_dump($_GET);
var_dump($_SESSION);
var_dump($_POST);

*/
 //$dbF->prnt($_SESSION);
// 
// $dbF->prnt($seo);
//phpinfo();


$currentHost = $_SERVER['HTTP_HOST'];
// var_dump($_SERVER["HTTP_REFERER"]);
if($currentHost == 'sharkspeed.com'){
if(preg_match('@http://sharkspeed.@i',$_SERVER["HTTP_REFERER"]) || preg_match('@https://sharkspeed.@i',$_SERVER["HTTP_REFERER"])){
include_once('regions.html');
exit;
}
else
{

echo $data = $webClass->country_IP(); 

}


}



?>
<!DOCTYPE html>
    <html>
      <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
          <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-NC38FP2');</script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P3RWZ5L');</script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TVSHPTK');</script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-M9WG4GK');</script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-PH94Q4L');</script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-MSWB2QX');</script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-T9NQ7HD');</script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P5RNQF6');</script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TGP2M5N');</script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-K7LMDW9');</script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TB7WTLK');</script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-MTBHVG5');</script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-NF3JGDN');</script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P7SQCXM');</script>
            
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?php

                $webClass->AllSeoPrint();
                //language => domain.dd
                $languages_sh = array("sv-SE" => "se", "nb_NO" => "no", "fi_FI" => "fi", "da_DK" => "dk");
                $current_url = $webClass->currentUrl();
                foreach ($languages_sh as $key => $val) {
                    $link = $db->defaultHttp . "sharkspeed.$val" . $current_url;
                    echo "<link rel='alternate' href='$link' hreflang='$key' />\n";
                }
                $link = $db->defaultHttp . "sharkspeed.com" . $current_url;
                echo "<link rel='alternate' href='$link' hreflang='x-default' />\n";

            ?>
            <link rel="icon" href="<?php echo WEB_URL ?>/favicon.ico" type="image/x-icon" />
            <link rel="shortcut icon" href="<?php echo WEB_URL ?>/favicon.ico" type="image/x-icon" />

            <!-- Global site tag (gtag.js) - Google Analytics -->

            <?php //if($comAnalytic == false){ ?>

            <!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118657673-1"></script>-->

            <!--<script>-->

            <!--  window.dataLayer = window.dataLayer || [];-->

            <!--  function gtag(){dataLayer.push(arguments);}-->

            <!--  gtag('js', new Date());-->

            <!--  gtag('config', 'UA-118657673-1');-->

            <!--</script>-->

            <?php //}else if($comAnalytic == true){ ?>
                <!--<script>-->
                <!--  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){-->
                <!--  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),-->
                <!--  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)-->
                <!--  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');-->

                <!--  ga('create', 'UA-118657673-1', 'auto');-->
                <!--  ga('send', 'pageview');-->
                <!--  ga('require', 'ecommerce');-->

                <!--</script>-->
            <?php //} ?>

            <?php //$functions->ourLogoSecurity(); ?>

            <script type="text/javascript" src="<?php echo WEB_URL ?>/js/jquery.js"></script>
            <script type="text/javascript" src="<?php echo WEB_URL ?>/js/jquery_ui.js"></script>

            <!--############################## CSS FILES ################################# -->
       

            <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/assets/alertify/themes/alertify.core.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/hover.css" /> 

            <!-- <link rel="stylesheet" type="text/css" href="<?php //echo WEB_URL ?>/assets/font-awesome/css/font-awesome.min.css" /> --> 
            <!-- <link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'> --> 

            <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/animate.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/jquery-ui.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/vmenuModule.css" />            
            <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/jquery.fancybox.css" />           
            <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/mmenu.css" />             
            <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/fontawesome.css" /> 
            <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/owl.theme.css" /> 

            <!-- <link type="text/css" rel="stylesheet" href="<?php echo WEB_URL ?>/css/categoryStyle2.css"> -->
            <!--Flags css-->
            <!--<link rel="stylesheet" type="text/css" href="<?php /*echo WEB_URL */ ?>/css/flags/flags.css"/>-->
            <!-- Latest compiled and minified CSS-->
            
            <link rel="stylesheet" href="<?php echo WEB_URL ?>/assets/bootstrap/css/bootstrap.min.css"> 
            
            
            
            <link rel="stylesheet" href="<?php echo WEB_URL ?>/assets/bootstrap/css/bootstrap-theme.min.css">        
            <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/owl.carousel.min.css">            
            <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/style.css?ver=<?php echo filemtime(__DIR__ . '/css/style.css'); ?>" />

            <!-- DESKTOP -->
            <link href="<?php echo WEB_URL ?>/css/style-desktop.css" rel="stylesheet" type="text/css" media="only screen and (min-width:979px) and (max-width:1600px)">
            <!-- TABLET -->
            <link href="<?php echo WEB_URL ?>/css/style-tablet.css" rel="stylesheet" type="text/css" media="only screen and (min-width:768px) and (max-width:978px)">
            <!-- MOBILE -->
            <link href="<?php echo WEB_URL ?>/css/style-mobile.css" rel="stylesheet" type="text/css" media="only screen and (min-width:461px) and (max-width:767px)">
            <!-- MOBILE SMALL-->
            <link href="<?php echo WEB_URL ?>/css/style-mobile-small.css" rel="stylesheet" type="text/css" media="only screen and (max-width:460px)">
            
            <!-- <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/webMenu.css" /> -->          
            <!-- <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/commonuse.css?ver=<?php echo filemtime(__DIR__ . '/css/commonuse.css'); ?>" /> -->

            <!--####################### CSS FILES END ################################# -->

            <script type="text/javascript" src="<?php echo WEB_URL ?>/js/js.cookie.min.js"></script>

            <?php echo $functions->ibms_setting('headScript'); ?>
            <?php $webClass->subscribeFormSubmit(); ?>
        </head>
            <style>
            /*.col3_box {*/
            /*    width: 18.2%;*/
            /*    margin-right: 1.2%;*/
            /*}*/

            /*.col3_box:nth-child(5n) {*/
            /*    margin-right: 1.2%;*/
            /*}*/
            </style>



<?php 


$cmplt_url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if(isset($_SESSION['url'])&&$_SESSION['url'] != $cmplt_url){ 
$cmplt_url_=explode("?", $cmplt_url);
if($cmplt_url_[0]!=$_SERVER['HTTP_HOST']."/products.php"){

// echo $cmplt_url_[0];

$_SESSION['url'] = $cmplt_url;
if(isset($_SESSION['viewType'])){
// unset($_SESSION['viewType']);



}

if(isset($_SESSION['sortBy'])){
    
//         var_dump("sortByaaaa");
// unset($_SESSION['sortBy']);
}

if(isset($_SESSION['priceRange'])){
    
//     var_dump("priceRange");
// unset($_SESSION['priceRange']);
}

if(isset($_SESSION['SizeFilter'])){
    
    
//     var_dump("SizeFilter");
// unset($_SESSION['SizeFilter']);
}

if(isset($_SESSION['webUser']['sortBy'])){
    
    
//     var_dump("sortBy");
    
    
// unset($_SESSION['webUser']['sortBy']);
}  
}

}
else{ 
$_SESSION['url'] = $cmplt_url;
}

/*try{
 $sql = "SELECT
   `order_info`.`order_invoice_id`,
   `order_info`.`sender_email`,
   `ac`.`acc_id`,
   `ac`.`acc_name`,
   `ac`.`acc_email`,
   `order_invoice`.* 
FROM
   `order_invoice` 
   LEFT OUTER JOIN
      `temp_accounts_user` tau 
      ON tau.acc_id_str = `order_invoice`.`orderuser` 
   LEFT OUTER JOIN
      `accounts_user` ac 
      ON ac.acc_id = tau.acc_id 
   JOIN
      `order_invoice_info` order_info 
      ON order_info.order_invoice_id = `order_invoice`.`order_invoice_pk` 
WHERE
   invoice_status = 3 
ORDER BY
   `flagged` DESC,
   `order_invoice_pk` DESC";
$res = $dbF->getRows($sql,false);
print_r( $dbF->rowCount);
$dbF->prnt($res);
} 
catch(Throwable $e) {
    $trace = $e->getTrace();
    echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
}*/

if(isset($_GET['changeView']) && $_GET['changeView'] == 'true'){
$viewType = $_POST['viewType'];
$_SESSION['viewType'] = $viewType;
//echo "<h1>".$viewType."</h1>"; 
}

if(isset($_GET['pro_limit']) && $_GET['pro_limit'] == 'true'){
$pLimit = $_POST['showPLimit'];
//$_SESSION['viewType'] = $pLimit;
echo $pLimit; 
}

if(isset($_GET['pro_sort']) && $_GET['pro_sort'] == 'true'){
$pSort = $_POST['sortBy'];
$_SESSION['sortBy'] = $pSort;
// echo $pLimit; 
}

if(isset($_GET['pri_range']) && $_GET['pri_range'] == 'true'){
$minVal = $_POST['minVal'];
$maxVal = $_POST['maxVal'];
$priceRangeArray = array('minPrice' => $minVal, 'maxPrice' => $maxVal);
$_SESSION['priceRange'] = $priceRangeArray; 
}

if(isset($_GET['size_filter']) && $_GET['size_filter'] == 'true'){
$pSort = $_POST['sizeArray'];
$_SESSION['SizeFilter'] = $pSort;
}

if(isset($_GET['unsetSession']) && $_GET['unsetSession'] == 'true'){

if(isset($_SESSION['viewType'])){
unset($_SESSION['viewType']);
}

if(isset($_SESSION['sortBy'])){
unset($_SESSION['sortBy']);
}

if(isset($_SESSION['priceRange'])){
unset($_SESSION['priceRange']);
}

if(isset($_SESSION['SizeFilter'])){
unset($_SESSION['SizeFilter']);
}

if(isset($_SESSION['webUser']['sortBy'])){
unset($_SESSION['webUser']['sortBy']);
}
}



$priceRangeArray = $productClass->getPrinceRange();

$forGrid = ( ( !isset($_SESSION['viewType']) || isset($_SESSION['viewType']) && $_SESSION['viewType'] == 'Grid' ) ? ' view_type_active_border_grid ' : '' ); 
$forList = ( ( isset($_SESSION['viewType']) && $_SESSION['viewType'] == 'List' ) ? ' active_btn ' : '' );
$forSixGrid = ( ( isset($_SESSION['viewType']) && $_SESSION['viewType'] == 'SixGrid' ) ? ' active_btn ' : '' );

$forMinPriceRangeSlider = (isset($_SESSION['priceRange']['minPrice'])) ? $_SESSION['priceRange']['minPrice'] : $priceRangeArray['cMin'];
$forMaxPriceRangeSlider = (isset($_SESSION['priceRange']['maxPrice'])) ? $_SESSION['priceRange']['maxPrice'] : $priceRangeArray['cMax'];




 ?>
<?php 
// var_dump($_SERVER['REQUEST_URI']);
// $explod = explode('/',$_SERVER['REQUEST_URI']);

// var_dump($explod[1]);
echo $webClass->seoBannerRes(); ?>


            <div class="main_container">
                <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NC38FP2"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P3RWZ5L"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TVSHPTK"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9WG4GK"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PH94Q4L"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MSWB2QX"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T9NQ7HD"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P5RNQF6"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TGP2M5N"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K7LMDW9"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TB7WTLK"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MTBHVG5"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NF3JGDN"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7SQCXM"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
                <header>
                    <?php $cartInfo = $productClass->cartInfo(true); ?>
                    <div class="header_side">
                        <div class="header_top">
                            <div class="standard">
                                <div class="logo_side"> <a href="<?php echo WEB_URL; ?>">
                                <img src="<?php echo WEB_URL; ?>/webImages/logo.png" alt="">
                            </a> </div>
                                <!-- logo_side close -->
                                <div class="search_side">
                                    <form class="search" method="get" action="<?php echo WEB_URL; ?>/search.php" id="searchForm">
                                        <input type="text" name="s" value="" class="search_box txt_search_cat search ui-autocomplete-input" placeholder="<?php echo $_e['Search']; ?>" autocomplete="off">
                                        <input type="submit" value="" class="search-submit">
                                    </form>
                                    <!-- <form class="search" method="get" action="https://www.google.com.pk/search" target="_blank">
                                        <input type="hidden" name="type" value="product">
                                        <input type="text" name="q" class="search_box" placeholder="SÖK" value="">
                                        <button class="search-submit" type="submit"><i class="fas fa-search"></i></button>
                                    </form> -->
                                </div>
                                <!-- search_side close -->
                                <div class="header_top_right_side">
                                    <div class="select_country text_yellow hidden-xs">
                                        <span><i class="glyphicon glyphicon-globe"></i><a href="https://sharkspeed.com"><?php $dbF->hardWords('Change Region'); ?></a></span>
	                                    <?php 
	                                    	// $active_country_css = ' style="border:1px solid #fff;" ';
                                      //       $current_lang = currentWebLanguage();
	                        				
                                      //           $conSE = '?country=SE';
                                      //           $conNO = '?country=NO';
                                      //           $conDK = '?country=DK';
                                      //           $conFI = '?country=FI';
                                      //       if(!isset($_SESSION['country']) && $_SESSION['country'] == ''){
                                      //           $uriF = $_SERVER['REQUEST_URI'];
                                      //       }else{
                                      //           $uri = explode('?', $_SERVER['REQUEST_URI']);
                                      //           $uriF = $uri[0];
                                      //       }
	                                    	 
	                                    ?>
                                        <!-- <a href="https://sharkspeed.se<?php //echo $uriF.''.$conSE; ?>">
                                            <div <?php //if ($current_lang == "Swedish") echo $active_country_css; ?> class="country flag1 transition_3 float-shadow"></div>
                                        </a>
                                        <a href="https://sharkspeed.no<?php //echo $uriF.''.$conNO; ?>">
                                            <div <?php //if ($current_lang == "Norwegian") echo $active_country_css; ?> class="country flag2 transition_3 float-shadow"></div>
                                        </a>
                                        <a href="https://sharkspeed.dk<?php //echo $uriF.''.$conDK; ?>">
                                            <div <?php //if ($current_lang == "Danish") echo $active_country_css; ?> class="country flag3 transition_3 float-shadow"></div>
                                        </a>
                                        <a href="https://sharkspeed.fi<?php //echo $uriF.''.$conFI; ?>">
                                            <div <?php //if ($current_lang == "Finnish") echo $active_country_css; ?> class="country flag4 transition_3 float-shadow"></div>
                                        </a> -->
                                    </div>
                                    <!-- select_country close -->

                                    <div class="header_top_right_btn1" id="responsive_popup_menu"> 
                                        <a href="#">
                                            <span>
                                                <img src="<?php echo WEB_URL; ?>/webImages/1.png" alt="">
                                            </span>
                                            <div class="menu_">
                                                <?php echo $_e['KUNDTJANST']; ?>
                                            </div>
                                        </a> 
                                    </div>
                                    <!-- header_top_right_btn1 close -->
                                    <div class="header_top_right_btn2 cart_area" id="cart_area">
                                        <a id="cart">
                                            <div class="span"> <img src="<?php echo WEB_URL; ?>/webImages/2.png" alt="">
                                                <div class="cart_btn cartItemNo"><?php echo $cartInfo['qty']; ?></div>
                                                <!-- cart_btn close -->
                                            </div>
                                            <div class="header_top_right_btn2_txt">
                                                <div class="cart_item cartItemNo"> <span>(<?php echo $cartInfo['qty']; ?>)</span> <?php $dbF->hardWords('Items'); ?> </div>
                                                <!-- cart_item close -->
                                                <div class="cart_item_2"><?php echo _n($_e['Total']); ?> <span class="cartPriceAjax"><?php echo $cartInfo['price']; ?> <?php echo $cartInfo['symbol']; ?></span></div>
                                                <!-- cart_item_2 close -->
                                            </div>
                                            <!-- header_top_right_btn2_txt close -->
                                        </a>
                                    </div>
                                    <!-- header_top_right_btn2 close -->
                                </div>
                                <!-- header_top_right_side close -->
                            </div>
                            <!-- standard close -->
                        </div>
                        <!-- header_top close -->
                        <div class="info_hovering_area" id="info_open_responsive">
                            <div class="removeCartproduct" id="info_open_responsive_close">X</div>
                            <div class="three_colums">
                                <?php
                                    $infoMenu = $menuClass->menuTypeSingle('info');
                                    foreach ($infoMenu as $val) {
                                        $text = _u($val['name']);
                                        $menuId = $val['id'];
                                        $link = $val['link'];
                                        $menuIcon = $val['icon'];
                                        echo '<div class="colum_left">
                                        <div class="col_img"><img src="' . $menuIcon . '" alt=""></div>
                                            <h4>' . $text . '</h4>
                                            <ul>';

                                        $infoMenu2 = $menuClass->menuTypeSingle('info', $menuId);
                                        foreach ($infoMenu2 as $val2) {
                                            $text = _u($val2['name']);
                                            $menuId = $val2['id'];
                                            $link = $val2['link'];
                                            $menuIcon = $val2['icon'];
                                            echo '<li><a href="' . $link . '" class="">' . $text . '</a></li>';
                                        }

                                        echo '</ul>
                                            </div><!--colum_left end-->
                                        ';
                                    }

                                ?>
                            </div>
                            <!--three_colums end-->
                        </div>
                        <!--info_hovering_area end-->
                        <div class="header_mid">
                            <?php 
                                $css = false;
                                $mainMenu = $menuClass->menuTypeSingle('main');
                                // $dbF->prnt($mainMenu);
                                foreach ($mainMenu as $val) {
                                    $insideActive = false;
                                    $innerUl = '';
                                    $menuId = $val['id'];
                                    $text = _u($val['name']);
                                    $link = $val['link'];
                                    $innerClass = '';
                                    $inner_has_plus = null;

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

                                    echo '
                                        <div class="col1_box ' . $active . '">
                                            <a href="' . $link . '">
                                                <div class="col1_box_img"> '.$image_div.' </div>
                                                <!-- col1_box_img close -->
                                                <div class="col1_box_txt">' . $text . '</div>
                                                <!-- col1_box_txt close -->
                                            </a>
                                        </div>
                                    ';
                                }

                             ?>
                        </div>
                        <!-- header_mid close -->
                        <div class="fixed_menu down">
                            <div class="menu_area scroll" id="scroll_responsive_section">
                                <div class="header-1 header-2" id="button1">
                                    <div style="position: absolute;width: 100%;top: 0px;height: 100%;z-index: 1;"></div>
                                    <!--    <a href="#menu">-->
                                    <a class="spinner-master2" id="m_menu_click" href="#menu">
                                        <input type="checkbox" id="spinner-form2" />
                                        <label for="spinner-form2" class="spinner-spin2">
                                            <div class="spinner2 diagonal part-1"></div>
                                            <div class="spinner2 horizontal"></div>
                                            <div class="spinner2 diagonal part-2"></div>
                                        </label>
                                        <div id="responsive_menu_item" class="menu_" style="padding-top: 5px;"> <?php echo $_e['Menu']; ?></div>
                                    </a>
                                    <!--</a>-->
                                </div>
                                <div class="header-1">
                                    <a id="search_btn_responsive" class="scroll">
                                        <div class="header_img"> <img src="<?php echo WEB_URL; ?>/webImages/search-icon-hi.png" alt=""> </div>
                                        <div class="menu_"> <?php echo $_e['Search']; ?> </div>
                                    </a>
                                </div>
                                <div class="header-1 header_top_right_btn1" id="responsive_popup_menu">
                                    <a href="#">
                                        <div class="header_img"><img src="<?php echo WEB_URL; ?>/webImages/icon_img_.png" alt=""></div>
                                        <div class="menu_"> <?php echo $_e['KUNDTJANST']; ?> </div>
                                    </a>
                                </div>
                                <div class="header-1 img_1" id="responsive_cart_menu">
                                    <!--    <a href="#menu">-->
                                    <a href="#" style="padding: 19px 0px;">
                                        <div class="header_img img_2"><img src="<?php echo WEB_URL; ?>/webImages/cart-.png" alt=""></div>
                                        <div class="menu_ img_2"> <span class="cartItemNo"><?php echo $cartInfo['qty']; ?></span> </div>
                                    </a>
                                    <!--</a>-->
                                </div>
                                <div class="search_mobile">
                                    <div class="search_bar wow fadeInDown">
                                        <form method="get" action="<?php echo WEB_URL; ?>/search.php" id="searchForm" class="top_left_search_main_div">
                                            <input type="text" name="s" value="<?php echo $webClass->get_searchVal(); ?>" class="txt_search_cat search" placeholder="<?php echo $_e['Search']; ?>">
                                            <input type="submit" value="GO" class="search_btn"> 
                                        </form>
                                    </div>
                                    <!--search_bar end-->
                                </div>
                                <!--search_mobile end-->
                            </div>
                            <!--menu_area end-->
                        </div>
                        <!-- fixed_menu close -->
                    </div>
                    <!-- header_side close -->
                    <div class="col_menu" id="col_menu" style="display:none">
                        <div class="close_side"><i class="far fa-times-circle"></i></div>
                        <!-- close_side close -->
                        <div class="select_country text_yellow hidden-xs">
                            <span><i class="glyphicon glyphicon-globe"></i><a><?php $dbF->hardWords('Change Region'); ?></a></span>
                            <?php
                                // $active_country_css = ' style="border:1px solid #fff;" ';
                                // $current_lang = currentWebLanguage();
                				
                                //     $conSE = '?country=SE';
                                //     $conNO = '?country=NO';
                                //     $conDK = '?country=DK';
                                //     $conFI = '?country=FI';
                                // if(!isset($_SESSION['country']) && $_SESSION['country'] == ''){
                                //     $uriF = $_SERVER['REQUEST_URI'];
                                // }else{
                                //     $uri = explode('?', $_SERVER['REQUEST_URI']);
                                //     $uriF = $uri[0];
                                // }
                            
                            ?>
                            
                            <!-- <a href="https://sharkspeed.se<?php //echo $uriF.''.$conSE; ?>">
                                <div <?php //if ($current_lang == "Swedish") echo $active_country_css; ?> class="country flag1 transition_3 float-shadow"></div>
                            </a>
                            <a href="https://sharkspeed.no<?php //echo $uriF.''.$conNO; ?>">
                                <div <?php //if ($current_lang == "Norwegian") echo $active_country_css; ?> class="country flag2 transition_3 float-shadow"></div>
                            </a>
                            <a href="https://sharkspeed.dk<?php //echo $uriF.''.$conDK; ?>">
                                <div <?php //if ($current_lang == "Danish") echo $active_country_css; ?> class="country flag3 transition_3 float-shadow"></div>
                            </a>
                            <a href="https://sharkspeed.fi<?php //echo $uriF.''.$conFI; ?>">
                                <div <?php //if ($current_lang == "Finnish") echo $active_country_css; ?> class="country flag4 transition_3 float-shadow"></div>
                            </a> -->
                            
                            <!-- <a href="https://sharkspeed.se">
                                <div style="border:1px solid #fff;" class="country flag1 transition_3 float-shadow"></div>
                            </a>
                            <a href="https://sharkspeed.no">
                                <div class="country flag2 transition_3 float-shadow"></div>
                            </a>
                            <a href="https://sharkspeed.dk">
                                <div class="country flag3 transition_3 float-shadow"></div>
                            </a>
                            <a href="https://sharkspeed.fi">
                                <div class="country flag4 transition_3 float-shadow"></div>
                            </a> -->
                        </div>
                        <!-- select_country close -->
                        <div class="shop_side">
                            <?php $dbF->hardWords('SHOP'); ?>
                        </div>
                        <!-- shop_side close -->
                        <div class="panel-group" id="accordion">
                            <?php 
                                $menunames = array('side_menu');

                                $text_two = '
                                            <div class="shop_side2">
                                                ' . $dbF->hardWords('SIDE MOBILE MENU', false) . '
                                            </div>
                                            <!-- shop_side2 close -->
                                            ';
                                $i = 1;
                                foreach ($menunames as $menuname) {

                                    ##### MOBILE MENU
                                    $css = false;
                                    $mainMenu = $menuClass->menuTypeSingle($menuname);
                                    foreach ($mainMenu as $val) {
                                        $insideActive = false;
                                        $innerUl = '';
                                        $menuId = $val['id'];
                                        $text = _u($val['name']);
                                        $link = $val['link'];
                                        $has_inner_menu_class = $innerClass = '';
                                        $has_inner_menu = $inner_has_plus = null;
                                        $mainMenu2 = $menuClass->menuTypeSingle($menuname, $menuId);
                                        if (!empty($mainMenu2)) {
                                            $innerClass = 'inner_ul';
                                            $has_inner_menu = $inner_has_plus = true;

                                            $innerUl .= '

                                                        <div id="collapse_' . $val['id'] . '" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <ul>

                                                ';
                                            foreach ($mainMenu2 as $val2) {

                                                $text     = _u($val2['name']);
                                                $menuId   = $val2['id'];
                                                $link     = $val2['link'];
                                                $menuIcon = $val2['icon'];
                                                $active   = $val2['active'];
                                                if ($active == '1') {
                                                    $active = ' active ';
                                                    $insideActive = $css = true;
                                                }

                                                if ($menuIcon != '') {
                                                    $image_div = '<img src="' . $menuIcon . '" alt="">';
                                                } else {
                                                    $image_div = '';
                                                }

                                                $innerUl .= '
                                                                <li class="' . $active . '"><a href="' . $link . '">' . $text . '</a></li>
                                                ';

                                            }

                                            $innerUl .= "       </ul>
                                                            </div>
                                                        </div><!--inner_class_level_one end-->";
                                        }

                                        $text = _u($val['name']);

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

                                        if ($has_inner_menu) {
                                            $has_inner_menu_class = ' 
                                                <a class=" accordion-toggle " data-toggle="collapse" data-parent="#accordion" href="#collapse_' . $val['id'] . '">
                                                </a>
                                            ';
                                        }
                                        
                                        if ($i == 2) {
                                            echo $text_two;
                                            $i++;
                                        }

                                        echo '
                                                <div class="panel panel-default">

                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">

                                                            <a href="' . $link . '" >'.$image_div.'
                                                                ' . $text . '   
                                                            </a>

                                                            ' . $has_inner_menu_class . '

                                                        </h4>
                                                    </div>

                                                    ' . $innerUl . '


                                                </div>';
                                    }

                                    $i++;
                                }
                            ?>
                        </div> <!-- #accordion -->


                    </div>
                    <!-- col_menu close -->
                </header>

                <?php $functions->includeOnceCustom('checkout_offer_popup.php'); ?>                
                <?php $functions->includeOnceCustom('donot_forget_popup.php'); ?>

                <?php 
                
                if($functions->ibms_setting('popupAllow') == '1'){
                    $functions->includeOnceCustom('long_time_subscribe.php');
                }

                ?>                
                
                <div class="overlay" style="display: none;"></div>
                <div id="overlay_container" style="display: none;">
                    <?php $functions->includeOnceCustom('cart_popup.php'); ?>
                </div>
                <div id="overlay_order_container" style=""></div>
                
<div class="search_mobile">
<div class="search_bar">
<form method="get" action="<?php echo WEB_URL; ?>/search.php" id="searchForm" class="top_left_search_main_div">
<input type="text" name="s" value="<?php echo $webClass->get_searchVal(); ?>" class="txt_search_cat search" autocomplete="off" placeholder="<?php echo $_e['Search']; ?>">
<input type="submit" value="" class="search_btn"> 
</form>
</div>
<!--search_bar end-->
</div>
<!--search_mobile end-->
