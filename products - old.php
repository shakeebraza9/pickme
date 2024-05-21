<?php include_once("global.php");
global $webClass;
global $_e;
global $productClass;
global $seo;
global $menuClass;
global $con;

// $con->prnt($_SESSION);

//$productClass->updateProductDiscountTable();

$productClass->setProductSlug();
$cat = '0';


if(isset($_GET['catId'])){
    
// var_dump($_GET['catId']);
$catId = $_GET['catId'];
$_SESSION['catId']['abcd'] = $catId;
//echo "<h1>".$viewType."</h1>"; 

// $con->prnt($_SESSION);
}

if(isset($_SESSION['freeGift_ai_id'])){
unset($_SESSION['freeGift_ai_id']);
}

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

if(isset($_GET['cat']) && $_GET['cat']!='' || (isset($_GET['catId']) && $_GET['catId'] != '' )){
//Product By category

//  $dbF->prnt($_SESSION);


// if(isset($_SESSION['catId']['abcd'])){
// unset($_SESSION['catId']['abcd']);

// var_dump("1");
// }



if(isset($_SESSION['viewType'])){
unset($_SESSION['viewType']);

// var_dump("1");
}





if(isset($_SESSION['sortBy'])){
unset($_SESSION['sortBy']);

// var_dump("2");
}

if(isset($_SESSION['priceRange'])){
unset($_SESSION['priceRange']);

// var_dump("3");
}

if(isset($_SESSION['SizeFilter'])){
unset($_SESSION['SizeFilter']);

// var_dump("5");
}

if(isset($_SESSION['webUser']['sortBy'])){
unset($_SESSION['webUser']['sortBy']);

// var_dump("4");
}





if(isset($_GET['catId'])){
$cat = str_replace("-","",$_GET['catId']);
$_GET['catId'] = $cat;
if(!isset($_GET['cat'])) {
$_GET['cat'] = $cat;
}
}else{
$cat = $_GET['cat'];
}
if(intval($cat)>0) {
$products = $productClass->productByCategoryNew($cat, @$_GET['product']);
}else{
$products = $productClass->productByCategoryNew($cat, @$_GET['product'],false);
}
if($products==false){
//Do If no product found on category
}
}else{
    
    
// if(isset($_SESSION['catId']['abcd'])){
// unset($_SESSION['catId']['abcd']);

// var_dump("1");
// }




//All Products
$products = $productClass->AllProducts(@$_GET['product']);
}

if($products == "" || $products == false){
//print error emssage
$t        = $_e["No Product Found"];
$products = "<div class='alert alert-danger'>$t</div>";

}else {
$products = "<div class='col3_main iHaveProducts'>$products</div>";

// using product ajax load on scroll
}

$priceRangeArray = $productClass->getPrinceRange();

$forGrid = ( ( !isset($_SESSION['viewType']) || isset($_SESSION['viewType']) && $_SESSION['viewType'] == 'Grid' ) ? ' view_type_active_border_grid ' : '' ); 
$forList = ( ( isset($_SESSION['viewType']) && $_SESSION['viewType'] == 'List' ) ? ' active_btn ' : '' );
$forSixGrid = ( ( isset($_SESSION['viewType']) && $_SESSION['viewType'] == 'SixGrid' ) ? ' active_btn ' : '' );

$forMinPriceRangeSlider = (isset($_SESSION['priceRange']['minPrice'])) ? $_SESSION['priceRange']['minPrice'] : $priceRangeArray['cMin'];
$forMaxPriceRangeSlider = (isset($_SESSION['priceRange']['maxPrice'])) ? $_SESSION['priceRange']['maxPrice'] : $priceRangeArray['cMax'];


$heading = ""; // Page Heading
$catName =  $productClass->getCategoryName($cat);

$currencySymbol = $productClass->currentCurrencySymbol();

$catnav = "";//category navigation e.g: product / Men's / Shirts
$catnav  .= "<a href='".WEB_URL."/products' class='grow'>"._u($_e['Products'])." </a>";
if(isset($_GET['cat']) && $catName ==false) {
$heading = $dbF->hardWords($cat,false);
$catnav  .= " / <a href='".WEB_URL."/products?cat=$_GET[cat]' class='grow'> "._u($heading)."</a>";
}elseif($catName===false){
$heading = $_e['Products'];
}
else{
$heading  = $catName;
$catnav  .= " / <a href='".WEB_URL."/products?cat=$_GET[cat]' class='grow'> "._u($heading)."</a>";
}
$heading = _u($heading);

include("header.php");
/*<input type="hidden" style="display: none" id="queryLimit" data-id="<?php echo $limit; ?>" value="<?php echo $limit; ?>"/>*/
$limit  =   $productClass->productLimitShowOnWeb();

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



<div class="cat_side_main" style="display: none;">
<div class="cat_side1">
<div class="click1">
<?php $dbF->hardWords('Sub Categories',true); ?> <img src="<?php echo WEB_URL; ?>/webImages/arrow.png" alt=""> 
</div>
<div class="click2 panel-body" style="display: none;"> 
<?php 
$data1 = $menuClass->FindSubcategory($cat); 
echo $data1['inner_lis'];
?> 
</div>
</div>
<!--cat_side1 close-->
<div class="cat_side1">
<div class="click3">
<?php $dbF->hardWords('Filter/Sort',true); ?> <img src="<?php echo WEB_URL; ?>/webImages/arrow.png" alt=""> 
</div>
<div class="panel-group click4" id="accordion" style="display: none;">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
<?php $dbF->hardWords('Sort',true); ?>        
</a>
</h4> 
</div>
<div id="collapseOne" class="panel-collapse collapse">
<div class="panel-body productSortByMob"> 
<a data-id="default" selected=""><?php $dbF->hardWords('Default',true); ?></a>
<a data-id="lowPrice"><?php $dbF->hardWords('By Low Price',true); ?></a>
<a data-id="highPrice"><?php $dbF->hardWords('By High Price',true); ?></a>
<a data-id="topSale"><?php $dbF->hardWords('By Top Sale',true); ?></a>
<a data-id="latest"><?php $dbF->hardWords('By Latest Added',true); ?></a>
<a data-id="bestseller"><?php $dbF->hardWords('By Best Seller',true); ?></a> 
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
<?php $dbF->hardWords('Size',true); ?>        
</a>
</h4> 
</div>
<div id="collapseTwo" class="panel-collapse collapse">
<div class="panel-body">
<div class="price_box_select">
<div class="price_box_select_in">
<h6><?php $dbF->hardWords('Size',true); ?></h6> <img src="<?php echo WEB_URL; ?>/webImages/arrow.png" alt="">
<div class="check_box_main">
<?php echo $productClass->getDistinctSizeForFilterMobile(); ?>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
<?php $dbF->hardWords('Price',true); ?>        
</a>
</h4> 
</div>
<div id="collapseThree" class="panel-collapse collapse">
<div class='price_box'>
<div class='price_box_select open4'>
<div class='price_box_select_in'>
<h6><?php $dbF->hardWords('Price',true); ?></h6> <img src="<?php echo WEB_URL; ?>/webImages/arrow.png" alt="">
<div class='left_panel2'>
<script>
$('document').ready(function(e) {
$('#rangeSliders').slider({
range: true,
min: <?php echo $priceRangeArray['min']; ?>,
max: <?php echo $priceRangeArray['max']; ?>,
values: [<?php echo $forMinPriceRangeSlider; ?>, <?php echo $forMaxPriceRangeSlider; ?>],
change: function(){
priceFilterMob();
// console.log('I Run Again');
},
slide: function(event, ui) {
$('#priceMins').val(ui.values[0]);
$('#priceMaxs').val(ui.values[1]);
}
});
$('#priceMins').val($('#rangeSliders').slider('values', 0));
$('#priceMaxs').val($('#rangeSliders').slider('values', 1));
});
</script>
<div id='rangeSliders' class='rangeSliders'>
</div>
<div class='container-fluid padding-0'>
<div class='form-group col-xs-6 padding-0'>
<input type='number' data-max='69' class=' padding-0 col-xs-8' id='priceMins' style='width: 60%'>
<label class=' padding-0 col-xs-4'><?php echo $currencySymbol; ?></label>
</div>
<div class='form-group col-xs-6 padding-0'>
<input type='number' data-max='800' class=' padding-0 col-xs-8' id='priceMaxs' style='width: 60%'>
<label class=' padding-0 col-xs-4'><?php echo $currencySymbol; ?></label>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
<?php $dbF->hardWords('Show',true); ?>        
</a>
</h4> 
</div>
<div id="collapseFour" class="panel-collapse collapse">
<div class="panel-body">
<div class="text-center p_style" style="">
<?php echo $productClass->productLimitByUserFormMob(); ?>
</div>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
<?php $dbF->hardWords('Display',true); ?>        
</a>
</h4> 
</div>
<div id="collapseFive" class="panel-collapse collapse">
<div class="panel-body">
<div class="views_icons">
<p data-id="Grid" class="btn_view view_btn my_btn sort_icons sort_icons1 <?php echo $forGrid; ?> "></p>
<p data-id="List" class="btn_view view_btn my_btn sort_icons sort_icons3 <?php echo $forList; ?> ">
</p>
<p data-id="SixGrid" class="btn_view view_btn my_btn sort_icons sort_icons2 <?php echo $forSixGrid; ?> ">
</p>
</div>
</div>
</div>
</div>
</div>
</div>
<!--cat_side1 close-->
</div>
<!--cat_side_main close-->













<div class="col1_right">
<?php 
// var_dump($_SERVER['REQUEST_URI']);
// $explod = explode('/',$_SERVER['REQUEST_URI']);

// var_dump($explod[1]);
echo $webClass->seoBanner(); ?>
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

<?php $webClass->seoSpecial(); ?>





<!-- inner_banner close -->	



<div class="col5">
<div class="col5_top"> 
<span>
<?php $dataCheck = $menuClass->FindSubcategoryTest($cat);
$icon = str_replace('{{WEB_URL}}', WEB_URL, $dataCheck['icon']);
$def_icon = WEB_URL.'/uploads/images/default_CatIcon.png';
?>
<img src="<?php echo ($icon == '') ? $def_icon : $icon; ?>" alt="">
</span>
<?php 
if($cat == 0){
echo $_e['Products'];
}else{
echo $dataCheck['heading'];
?>
<h5>(<?php echo $productClass->getNoProductsCategory($cat); ?> Products)</h5> </div>
<!-- col5_top close -->
<?php
}

?>

<ul>
<?php echo $dataCheck['inner_lis']; ?>
</ul>
</div>
<!-- col5 close -->
<div class="col6" style="display:none">
<div class="col6_select">
<?php echo $productClass->sortByProduct(); ?>
</div>
<!-- col6_select close -->
<div class="col6_select2" id="open1">
<div class="col6_select2_btn_side">
Storlek <span><img src="<?php echo WEB_URL; ?>/webImages/arrow_button_new.png" alt=""></span>
</div>
<!--col6_select2_btn_side close-->
<div class="price_box_select" id="open3">
<div class="price_box_select_in">
<div class="col6_select2_top">
<h6><?php $dbF->hardWords('Size',true); ?></h6> <img src="<?php echo WEB_URL; ?>/webImages/close_button_new.png" alt=""> </div>
<!-- col6_select2_top close -->
<div class="check_box_main">
<?php echo $productClass->getDistinctSizeForFilter(); ?>
</div>
</div>
</div>
</div>
<!-- col6_select2 close -->
<div class="col6_select2" style="width: 200px;" id="open2"> <div class="col6_select2_btn_side"> <?php $dbF->hardWords('Price',true); ?> <span><img src="webImages/arrow_button_new.png" alt=""></span></div>
<div class="price_box_select" id="open4">
<div class="price_box_select_in">
<div class="col6_select2_top">
<h6><?php $dbF->hardWords('Price',true); ?></h6> <img src="<?php echo WEB_URL; ?>/webImages/close_button_new.png" alt=""> </div>
<!-- col6_select2_top close -->

<script>
$('document').ready(function(e) {
$('#slider').slider({
range: true,
min: <?php echo $priceRangeArray['min']; ?>,
max: <?php echo $priceRangeArray['max']; ?>,
values: [<?php echo $forMinPriceRangeSlider; ?>, <?php echo $forMaxPriceRangeSlider; ?>],
change: function(){
priceFilter();
},
slide: function(event, ui) {
//$( '#price' ).val( '$' + ui.values[ 0 ] + ' - $' + ui.values[ 1 ] );
$('#priceMin').val(ui.values[0]);
$('#priceMax').val(ui.values[1]);
}
});
//$( '#price' ).val( '$' + $( '#rangeSlider' ).slider( 'values', 0 ) +
// ' - $' + $( '#rangeSlider' ).slider( 'values', 1 ) );
$('#priceMin').val($('#slider').slider('values', 0));
$('#priceMax').val($('#slider').slider('values', 1));
});
</script>
<div id='slider' class='slider'> </div>
<div class='container-fluid padding-0'>
<div class='form-group col-xs-6 padding-0'>
<input type='number' data-max='69' class=' padding-0 col-xs-8' id='priceMin' style='width: 60%'>
<label class=' padding-0 col-xs-4'><?php echo $currencySymbol; ?></label>
</div>
<div class='form-group col-xs-6 padding-0'>
<input type='number' data-max='800' class=' padding-0 col-xs-8' id='priceMax' style='width: 60%'>
<label class=' padding-0 col-xs-4'><?php echo $currencySymbol; ?></label>
</div>
</div>
<!-- slider close -->
</div>
</div>
</div>
<!-- col6_select2 close -->
<div class="reset_btn"> <img src="<?php echo WEB_URL; ?>/webImages/23.png" alt=""> </div>
<!-- reset_btn close -->
<div class="col6_right">
<div class="col6_right1"> <?php $dbF->hardWords('Show',true); ?> 
<div class="col6_right1_main">
<?php echo $productClass->productLimitByUserForm(); ?>
<!-- col6_right1_main_btn close -->
</div>
<!-- col6_right1_main close --><?php $dbF->hardWords('Display',true); ?>
<div data-id='Grid' class="display_btn active_btn sort_icons sort_icons1 <?php echo $forGrid; ?>'"> <img src="<?php echo WEB_URL; ?>/webImages/24.png" alt=""> </div>
<!-- display_btn close -->
<div data-id='List' class="display_btn sort_icons sort_icons3 <?php echo $forList; ?>"> <img src="<?php echo WEB_URL; ?>/webImages/25.png" alt=""> </div>
<!-- display_btn close -->
</div>
<!-- col6_right1 close -->
</div>
<!-- col6_right close -->
</div>
<!-- col6 close -->

<?php 
// if(isset($_GET['cat']) && $_GET['cat']!='' || (isset($_GET['catId']) && $_GET['catId'] != '' )){}else{
?>
<div class="col7">


	<div class="col7_size" style="">
	<div class="col7_side_open_txt">  
<form class="search" method="get" action="<?php echo WEB_URL; ?>/search.php" id="searchForm">
<input type="text" name="s" value="" class="search_box txt_search search ui-autocomplete-input newsearch" placeholder="<?php echo $_e['Search']; ?>" autocomplete="off">
<!-- <input type="submit" value="" class="search-submit"> -->
</form> </div>

</div>
<!-- col7_size close -->





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
<div class="col7_side_open_txt"> <?php $dbF->hardWords('Sort ghfghghgfg',true); ?> </div>
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

 <?php 


//   $dbF->prnt($_SESSION);



$oj = (@$_SESSION['priceRange']['minPrice'] == "99") ? 'checked' : '';


$oj1 = (@$_SESSION['priceRange']['minPrice'] == "1") ? 'checked' : '';



$oj150 = (@$_SESSION['priceRange']['minPrice'] == "150") ? 'checked' : '';


$oj250 = (@$_SESSION['priceRange']['minPrice'] == "250") ? 'checked' : '';


$oj999 = (@$_SESSION['priceRange']['minPrice'] == "999") ? 'checked' : '';



// $oj1 = ($_SESSION['priceRange']['minPrice'] == "99" && $_SESSION['priceRange']['minPrice'] == "150") ? 'checked' : '';


  ?>





<label>
<input class="indeterminate-checkbox" type="radio" name="radio" <?php echo $oj1 ?> data-id="99"> <span> 1 to 99 <?php echo $currencySymbol; ?></span> </label>


<label>
<input class="indeterminate-checkbox" type="radio" name="radio"  <?php echo $oj ?> data-id="150"> <span>99 to 150 <?php echo $currencySymbol; ?></span> </label>

<label>
<input class="indeterminate-checkbox" type="radio" name="radio" <?php echo $oj150 ?> data-id="250"> <span>150 to 250 <?php echo $currencySymbol; ?></span> </label>

<label>
<input class="indeterminate-checkbox" type="radio" name="radio"  <?php echo $oj250 ?> data-id="500"> <span>250 to 500 <?php echo $currencySymbol; ?></span> </label>



<label>
<input class="indeterminate-checkbox" type="radio" name="radio" <?php echo $oj999 ?> data-id="9999"> <span>999 to 9999 <?php echo $currencySymbol; ?></span> </label>


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





<div class="reset_btn"> <img src="<?php echo WEB_URL; ?>/webImages/23.png" alt="<?php $dbF->hardWords('Press To Rest Search',true); ?>"> </div>
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

<?php
// }
?>


<div class="col4_heading_side"> 




<span>
<?php $dataCheck = $menuClass->FindSubcategoryTest($cat);
$icon = str_replace('{{WEB_URL}}', WEB_URL, $dataCheck['icon']);
$def_icon = WEB_URL.'/uploads/images/default_CatIcon.png';
?>
<img src="<?php echo ($icon == '') ? $def_icon : $icon; ?>" alt="">
</span>




<div class="col4_heading_side_txt">
<!-- <h3>MC-Klader</h3>
<h4>(2034 produkter)</h4> -->





<?php 
if($cat == 0){
	?>

	<h3>

		<?php
echo $_e['Products'];
}else{
echo $dataCheck['heading'];
?>
</h3>
<h4>(<?php echo $productClass->getNoProductsCategory($cat); ?> Products)</h4> 
<!-- col5_top close -->
<?php
}

?>

</div>


<!-- col4_heading_side_txt close -->
<div class="col4_heading_select">
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
<div class="pagination_"> Sida <span class="active">1</span> av <span>102</span>
<div class="pagination_img"> <img src="webImages/31.png" alt=""> </div>
<!-- pagination_img close -->
</div>
<!-- pagination close -->


<div class="col3 col3_">




<div class="col3_filter">
<div class="col3_filter_top">
<div class="close_filter"><i class="far fa-times-circle"></i></div>
<!--close_filter close-->
<div class="col3_filter_top_left">




<?php if($cat == 0){

echo $_e['Products'];
}else{
echo $dataCheck['heading'];
?>

<?php
}

?>




</div>
<!-- col3_filter_top_left close -->
<div class="col3_filter_top_right">
<h5><?php echo $productClass->getNoProductsCategory($cat); ?></h5>
<h4>/<span><img src="webImages/30.png" alt=""></span></h4> </div>
<!-- col3_filter_top_right close -->
</div>
<!-- col3_filter_top close -->
<div class="col3_filter_main">
<h3><?php $dbF->hardWords('Filter',true); ?></h3>

<div class="reset_btn"><div class="reset_btn_text"> <?php $dbF->hardWords('Reset Filter',true); ?></div><img src="<?php echo WEB_URL; ?>/webImages/23.png" alt=""> </div>
<!-- reset_btn close -->

<div id="accordion1">
<h3><?php $dbF->hardWords('Search By Name',true); ?></h3>
<div>
<div class="accordion1_txt">

	<form class="search" method="get" action="<?php echo WEB_URL; ?>/search.php" id="searchForm">
<input type="text" name="s" value="" class="search_box txt_search1 search ui-autocomplete-input" placeholder="<?php echo $_e['Search']; ?>" autocomplete="off">
<!-- <input type="submit" value="" class="search-submit"> -->
</form> 




</div>
<!-- accordion1_txt close -->
</div>




<h3><?php $dbF->hardWords('Sort',true); ?> </h3>
<div>
<ul class="accordion_ul new">
<li><a data-id="default"><?php $dbF->hardWords('Default',true); ?></a></li>
<li><a data-id="latest"><?php $dbF->hardWords('By Latest Added',true); ?></a></li>
<li><a data-id="highPrice"><?php $dbF->hardWords('By High Price',true); ?></a></li>
<li><a data-id="lowPrice"><?php $dbF->hardWords('By Low Price',true); ?></a></li>
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
</div>
</div>
<!-- col3_filter_main close -->
</div>
<!-- col3_filter close -->


<div id="col3_main_all1">

</div>


<div class="col3_main_all">
<?php echo $products; ?>
</div>
</div>
<!-- col3 close -->
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