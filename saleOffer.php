<?php include_once("global.php");

global $webClass;

global $_e;

global $productClass;

global $seo;

global $menuClass;

global $con;



if(isset($_GET['invoice']) && $_GET['invoice']!=''){


    $inv = base64_decode($_GET['invoice']);


$sql = "SELECT invoice_id FROM order_invoice WHERE `invoice_status` <> ? and `order_invoice_pk` = ?";

$customData = $dbF->getRow($sql,array(3,$inv));



if ($dbF->rowCount > 0) {


   $_SESSION['saleOffer_ai_id']=$inv;
// var_dump($inv);

}

    $products = $productClass->AllSaleProducts(@$inv);

}

// echo $products;

// exit;





if($products == "" || $products == false){

    //print error emssage

    $t        = $_e["Link Expired"];

    $products = "<div class='alert alert-danger'>$t</div>";



}else {

    $products = "<div class='iHaveProducts'>$products</div>";



     // using product ajax load on scroll

}



$heading = $dbF->hardWords('Sale Offer', false); // Page Heading



$currencySymbol = $productClass->currentCurrencySymbol();



// $heading = _u($heading);



include("header.php");

/*<input type="hidden" style="display: none" id="queryLimit" data-id="<?php echo $limit; ?>" value="<?php echo $limit; ?>"/>*/

// $limit  =   $productClass->productLimitShowOnWeb();



//$productClass->updateProductDiscountTable();



?>


<div class="index_content">
    <input type="hidden" style="display: none" id="queryLimit" data-id="<?php echo $limit; ?>" value="<?php echo $limit; ?>"/>
    <input type="hidden" style="display: none" id="viewType" value="<?php echo isset($_SESSION["viewType"]) ? (string) $_SESSION["viewType"] : $productClass->get_product_view();
    ?>"/>
    <div class="col1_left">
        <?php $functions->includeOnceCustom('left_side_panel.php'); ?>
    </div>
    <!-- col1_left close -->
    <div class="col1_right">
        <!-- col1_right_des close -->


        <div class="menu_section">
<div class="menu_option"><img class="header-2" src="webImages/28.png" alt=""></div>
<!-- menu_option close -->
<div class="menu_section_search" id="sw"> <img src="webImages/29.png" alt=""> </div>
<!-- menu_section_search close -->
<div class="menu_section_logo"> <a href="<?php echo WEB_URL ?>"><img src="webImages/logo.png" alt=""></a> </div>
<!-- menu_section_logo close -->
<div class="menu_section_cart_main">
<div class="menu_section_cart" id="RootNode"> <img src="webImages/cart_btn0.png" alt=""> <span class="cartPriceAjax"><?php echo $cartInfo['price']; ?> </span> </div>
<!-- menu_section_cart close -->
<div class="menu_section_cart" id="RootNode1"> <img src="webImages/cart_btn.png" alt=""> <span class="cartItemNo"><?php echo $cartInfo['qty']; ?></span> </div>
<!-- menu_section_cart close -->
</div>
<!-- menu_section_cart_main close -->
</div>
<!-- menu_section close -->
        <!-- col1_right_des close -->
        
        <div class="col4_heading_side" style="display: none;">
<div class="col4_heading_side_txt">
<!-- <h3>MC-Klader</h3>
<h4>(2034 produkter)</h4> -->






<h3>
<?php
#echo $_e['Products'];
?>
</h3>
<!-- col5_top close -->
</div>
<!-- col4_heading_side_txt close -->
<div class="col4_heading_select" style="display: none;">
<div class="col7_size">
<div class="col7_side_open">
<div class="col7_side_open_txt"> <?php $dbF->hardWords('Choose',true); ?> </div>
<!-- col7_side_open_txt close -->
<div class="col7_side_open_btn">
<!-- img -->
</div>
<!-- col7_side_open_btn close -->
</div>
<!-- col7_side_open close -->
<div class="col7_side_popup">
<div class="col7_side_popup_btn_main">
<div class="col7_side_open_txt"> <?php $dbF->hardWords('Sub Categories',true); ?> </div>
<!-- col7_side_open_txt close -->
<div class="col7_side_popup_btn">
<!-- img -->
</div>
<!-- col7_side_popup_btn close -->
</div>
<!-- col7_side_popup_btn close -->
<div class="col7_side_popup_main2">
<!-- <label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Popularity</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Names A-Z</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Names Z-A</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Lowest Price</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Highest Price</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>What's New</span> </label> -->


 <?php 
                    $data1 = $menuClass->FindSubcategoryNEW($cat); 
                    echo $data1['inner_lis'];
                ?> 




</div>
<!-- col7_side_popup_main2 close -->
</div>
<!-- col7_side_popup close -->
</div>
<!-- col7_size close -->
</div>
<!-- col4_heading_select close -->
<div class="col4_filter"> <span><img src="webImages/30.png" alt=""></span>
<div class="col4_filter_txt"><?php $dbF->hardWords('Sort and filter',true); ?></div>
<!-- col4_filter_txt close -->
</div>
<!-- col4_filter close -->
</div>
<!-- col4_heading_side close -->

        <div class="col3_filter">
<div class="col3_filter_top">
    <div class="close_filter"><i class="far fa-times-circle"></i></div>

<div class="col3_filter_top_left"><?php $dbF->hardWords('Product',true); ?></div>
<!-- col3_filter_top_left close -->
<div class="col3_filter_top_right">
<h5><?php $dbF->hardWords('Filter',true); ?></h5>
<h4>/<span><img src="webImages/30.png" alt=""></span></h4> </div>
<!-- col3_filter_top_right close -->
</div>
<!-- col3_filter_top close -->
<div class="col3_filter_main">
<h3><?php $dbF->hardWords('Filter',true); ?></h3>

<div class="reset_btn"><div class="reset_btn_text"> <?php $dbF->hardWords('Reset Filter',true); ?></div><img src="<?php echo WEB_URL; ?>/webImages/23.png" alt=""> </div>
<!-- reset_btn close -->


<div id="accordion1">
<!-- <h3>Varumarken</h3> -->
<!-- <div> -->
<!-- <div class="accordion1_txt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </div> -->
<!-- accordion1_txt close -->
<!-- </div> -->
<h3><?php $dbF->hardWords('Sort',true); ?> </h3>
<div>
<ul class="accordion_ul new">
<li><a data-id="default"><?php $dbF->hardWords('Default',true); ?></a></li>
<li><a data-id="latest"><?php $dbF->hardWords('By Latest Added',true); ?></a></li>
<li><a data-id="lowPrice"><?php $dbF->hardWords('By Low Price',true); ?></a></li>
<li><a data-id="highPrice"><?php $dbF->hardWords('By High Price',true); ?></a></li>
<li><a data-id="bestseller"><?php $dbF->hardWords('By Best Seller',true); ?></a></li>


</ul>
</div>
<h3> <?php $dbF->hardWords('Price',true); ?></h3>
<div>
<ul class="accordion_ul new2">
<li><a data-id="99">1 to 99 <?php echo $currencySymbol; ?></a></li>
<li><a data-id="150">99 to 150 <?php echo $currencySymbol; ?></a></li>
<li><a data-id="250">150 to 250 <?php echo $currencySymbol; ?></a></li>
<li><a data-id="500">250 to 500 <?php echo $currencySymbol; ?></a></li>
<li><a data-id="9999">999 to 9999 <?php echo $currencySymbol; ?></a></li>
<!-- <li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li> -->
</ul>
</div>
<!-- <h3>Storlek Barn</h3> -->
<!-- <div> -->
<!-- <ul class="accordion_ul">
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
</ul> -->
<!-- </div> -->
<!-- <h3>Storlek Dam</h3> -->
<!-- <div> -->
<!-- <ul class="accordion_ul">
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
</ul> -->
<!-- </div> -->
<!-- <h3>Storlek Heer</h3> -->
<!-- <div> -->
<!-- <ul class="accordion_ul">
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
</ul> -->
<!-- </div> -->
<!-- <h3>Storlekar Unisex</h3> -->
<!-- <div> -->
<!-- <ul class="accordion_ul">
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
</ul> -->
<!-- </div> -->

<h3><?php $dbF->hardWords('Size',true); ?></h3>
<div>
<ul class="accordion_ul mobil_size">
<!-- <li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li>
<li><a href="#">Demo</a></li> -->

<?php echo $productClass->getDistinctSizeForFilterMobileNewAll(); ?>


</ul>




</div>

<h3><?php $dbF->hardWords('Display',true); ?></h3>
<div>
<ul class="accordion_ul">

<li><div data-id='Grid' class="display_btn active_btn sort_icons sort_icons1 <?php echo $forGrid; ?>'"> <img src="<?php echo WEB_URL; ?>/webImages/24.png" alt=""> </div><div data-id='List' class="display_btn sort_icons sort_icons3 <?php echo $forList; ?>"> <img src="<?php echo WEB_URL; ?>/webImages/25.png" alt=""> </div>




</li>
 



</ul>




</div>





</div>
</div>
<!-- col3_filter_main close -->
</div>
<!-- col3_filter close -->


        
<div class="col7" style="
    padding: 10px 15px;
">
<div class="col7_size">
<div class="col7_side_open">
<div class="col7_side_open_txt"> <?php $dbF->hardWords('Size',true); ?> </div>
<!-- col7_side_open_txt close -->
<div class="col7_side_open_btn">
<!-- img -->
</div>
<!-- col7_side_open_btn close -->
</div>
<!-- col7_side_open close -->
<div class="col7_side_popup">
<div class="col7_side_popup_btn_main">
<div class="col7_side_open_txt"> <?php $dbF->hardWords('Size',true); ?> </div>
<!-- col7_side_open_txt close -->
<div class="col7_side_popup_btn">
<!-- img -->
</div>
<!-- col7_side_popup_btn close -->
</div>
<!-- col7_side_popup_btn close -->
<div class="col7_side_popup_main2">
<!-- <label>


<input class="indeterminate-checkbox" type="radio" name="radio">



<span>Popularity</span>



</label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Names A-Z</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Names Z-A</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Lowest Price</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Highest Price</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>What's New</span> </label> -->


<?php echo $productClass->getDistinctSizeForFilterNew(); ?>




</div>
<!-- col7_side_popup_main2 close -->
</div>
<!-- col7_side_popup close -->
</div>
<!-- col7_size close -->



<div class="col7_size" style="display: none;">
<div class="col7_side_open">
<div class="col7_side_open_txt"> Colour </div>
<!-- col7_side_open_txt close -->
<div class="col7_side_open_btn">
<!-- img -->
</div>
<!-- col7_side_open_btn close -->
</div>
<!-- col7_side_open close -->
<div class="col7_side_popup">
<div class="col7_side_popup_btn_main">
<div class="col7_side_open_txt"> Colour </div>
<!-- col7_side_open_txt close -->
<div class="col7_side_popup_btn">
<!-- img -->
</div>
<!-- col7_side_popup_btn close -->
</div>
<!-- col7_side_popup_btn close -->
<div class="col7_side_popup_main2">
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Red <div class="col7_side_color_box"><!-- box --></div><!-- col7_side_color_box close --></span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Green <div class="col7_side_color_box" style="background: #7ebc41"><!-- box --></div><!-- col7_side_color_box close --></span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Blue <div class="col7_side_color_box" style="background: #00aae1;"><!-- box --></div><!-- col7_side_color_box close --></span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Yellow <div class="col7_side_color_box" style="background: #ffd700;"><!-- box --></div><!-- col7_side_color_box close --></span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Pink <div class="col7_side_color_box" style="background: #ff00e8;"><!-- box --></div><!-- col7_side_color_box close --></span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Orange <div class="col7_side_color_box" style="background: #ff8500;"><!-- box --></div><!-- col7_side_color_box close --></span> </label>
</div>
<!-- col7_side_popup_main2 close -->
</div>
<!-- col7_side_popup close -->
</div>
<!-- col7_size close -->




<div class="col7_size" style="">
<div class="col7_side_open">
<div class="col7_side_open_txt"> <?php $dbF->hardWords('Sort By',true); ?> </div>
<!-- col7_side_open_txt close -->
<div class="col7_side_open_btn">
<!-- img -->
</div>
<!-- col7_side_open_btn close -->
</div>
<!-- col7_side_open close -->
<div class="col7_side_popup">
<div class="col7_side_popup_btn_main">
<div class="col7_side_open_txt"> <?php $dbF->hardWords('Sort By',true); ?> </div>
<!-- col7_side_open_txt close -->
<div class="col7_side_popup_btn">
<!-- img -->
</div>
<!-- col7_side_popup_btn close -->
</div>
<!-- col7_side_popup_btn close -->
<div class="col7_side_popup_main2">

    


    <?php echo $productClass->sortByProductNew(); ?>


<!-- 
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Popularity</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Names A-Z</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Names Z-A</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Lowest Price</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Highest Price</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>What's New</span> </label> -->





</div>
<!-- col7_side_popup_main2 close -->
</div>
<!-- col7_side_popup close -->
</div>
<!-- col7_size close -->
<div class="col7_size">
<div class="col7_side_open">
<div class="col7_side_open_txt">   <?php $dbF->hardWords('Price',true); ?></div>
<!-- col7_side_open_txt close -->
<div class="col7_side_open_btn">
<!-- img -->
</div>
<!-- col7_side_open_btn close -->
</div>
<!-- col7_side_open close -->
<div class="col7_side_popup">
<div class="col7_side_popup_btn_main">
<div class="col7_side_open_txt">   <?php $dbF->hardWords('Price',true); ?></div>
<!-- col7_side_open_txt close -->
<div class="col7_side_popup_btn">
<!-- img -->
</div>
<!-- col7_side_popup_btn close -->
</div>
<!-- col7_side_popup_btn close -->
<div class="col7_side_popup_main2 productPrices">



<label>
<input class="indeterminate-checkbox" type="radio" name="radio" data-id="99"> <span> 1 to 99 <?php echo $currencySymbol; ?></span> </label>


<label>
<input class="indeterminate-checkbox" type="radio" name="radio" data-id="150"> <span>99 to 150 <?php echo $currencySymbol; ?></span> </label>

<label>
<input class="indeterminate-checkbox" type="radio" name="radio" data-id="250"> <span>150 to 250 <?php echo $currencySymbol; ?></span> </label>

<label>
<input class="indeterminate-checkbox" type="radio" name="radio" data-id="500"> <span>250 to 500 <?php echo $currencySymbol; ?></span> </label>



<label>
<input class="indeterminate-checkbox" type="radio" name="radio" data-id="9999"> <span>999 to 9999 <?php echo $currencySymbol; ?></span> </label>


</div>
<!-- col7_side_popup_main2 close -->
</div>
<!-- col7_side_popup close -->
</div>
<!-- col7_size close -->


<div class="col7_size" style="display: none;">
<!--<div class="col7_side_open">-->
<!--<div class="col7_side_open_txt"> Sort by </div>-->
<!-- col7_side_open_txt close -->
<!--<div class="col7_side_open_btn">-->
<!--img -->
<!--</div>-->
<!-- col7_side_open_btn close -->
<!--</div>-->
<!-- col7_side_open close -->
<!--<div class="col7_side_popup">-->
<!--<div class="col7_side_popup_btn_main">-->
<!--<div class="col7_side_open_txt">Sort by</div>-->
<!-- col7_side_open_txt close -->
<!--<div class="col7_side_popup_btn">-->
<!-- img -->
<!--</div>-->
<!-- col7_side_popup_btn close -->
<!--</div>-->
<!-- col7_side_popup_btn close -->
<!--<div class="col7_side_popup_main2">-->
<!-- <label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Popularity</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Names A-Z</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Names Z-A</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Lowest Price</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>Highest Price</span> </label>
<label>
<input class="indeterminate-checkbox" type="radio" name="radio"> <span>What's New</span> </label> -->

<?php echo $productClass->sortByProduct(); ?>

<!--</div>-->
<!-- col7_side_popup_main2 close -->
<!--</div>-->
<!-- col7_side_popup close -->
</div>
<!-- col7_size close -->





<div class="reset_btn"> <img src="<?php echo WEB_URL; ?>/webImages/23.png" alt=""> </div>
<!-- reset_btn close -->




<div class="col6_right">
<div class="col6_right1">

<?php $dbF->hardWords('Display',true); ?>
<div data-id='Grid' class="display_btn active_btn sort_icons sort_icons1 <?php echo $forGrid; ?>'"> <img src="<?php echo WEB_URL; ?>/webImages/24.png" alt=""> </div>
<!-- display_btn close -->
<div data-id='List' class="display_btn sort_icons sort_icons3 <?php echo $forList; ?>"> <img src="<?php echo WEB_URL; ?>/webImages/25.png" alt=""> </div>
<!-- display_btn close -->
</div>
<!-- col6_right1 close -->
</div>
<!-- col6_right close -->




</div>



        
         <div class="col3 col3_ hideall">
            <?php echo $products; ?>
        </div>
        <!-- col3 close -->

          <div class="col3_main_all">
          </div>  

    </div>
    <!-- col1_right close -->
</div>
<!-- index_content close -->

<style>

    .content_3{

        min-height: 500px;

    }

</style>



<?php include("footer.php"); ?>





