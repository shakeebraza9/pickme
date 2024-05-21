<?php include_once("global.php");

global $webClass;

global $_e;

global $productClass;



//work for htaccess file..

if(isset($_GET['pId'])){

$pId = $_GET['pId'];

if(stristr($pId,"-")){

$pId = explode("-",$pId,2);

$_GET['pId']    = $pId[0];

@$_GET['pName'] = $pId[1];

}

}





//work for product slug

if(isset($_GET['pSlug'])){

$pSlug = ($_GET['pSlug']);

$sql = "SELECT prodet_id FROM proudct_detail WHERE slug = '$pSlug'";

$productSlug = $dbF->getRow($sql);

$pId = $productSlug['prodet_id'];

$_GET['pId']    = $pId;

}

/**

* MultiLanguage keys Use where echo;

* define this class words and where this class will call

* and define words of file where this class will called

**/

$_w = array();

$_w['Return to Previous Page'] = '';

$_w['Related Products'] = '';

$_w['Reviews'] = '';

$_w['Product'] = '';

$_w['Product Code'] = '';


$_w['Add Rating'] = '';
$_w['Model'] = '';
$_w['You save'] = '';

$_w['Add To Compare'] = '';

$_w['Additional Information'] = '';

$_w['Product Description'] = '';

$_w['SHIPPING & RETURNS'] = '';

$_w['DESCRIPTION'] = '';

$_w['SIZE CHART'] = '';

$_w['REVIEWS'] = '';

$_w['Home'] = '';

$_w['Info'] = '';

$_w['Shipping'] = '';

$_w['Color'] = '';

$_w['Size'] = '';

$_w['In Stock'] = '';

$_w['Out Stock'] = '';

$_w['Return & Defected'] = '';

$_w['BACK TO SUITS AND SPORTSCOASTS'] = '';

$_w['Add To Cart'] = '';

$_w['Add To Wishlist'] = '';

$_w['share'] = '';

$_w['Original Price'] = '';

$_w['Product Description'] = '';

$_w['Availability'] = '';

$_w['PRODUCT FEATURE ICONS'] = '';

$_w['YOU MIGHT ALSO LIKE'] = '';

$_w['WHAT DO OUR CUSTOMER SAY?'] = '';

$_w['Send email on sale offer'] = '';

$_w['Refer to a friend'] = '';

$_w['Ask Question'] = '';

$_w['Asked Questions'] = '';

$_w['Specification'] = '';

$_w['DO NOT FORGET TO BUY'] = '';

$_w['Shipping Class'] = '';

$_w['Size Chart'] = '';

$_w['Qty'] = '';

$_w['Custom'] = '';

$_w['Custom Size'] = '';

$_w['Value'] = '';

$_w['Quality'] = '';

$_w['Price'] = '';

$_w['Notify me when product available'] = '';

$_w['Select a color'] = '';

$_w['Select Scale'] = '';

$_w['SPECIFICATION'] = '';

$_e = $dbF->hardWordsMulti($_w, currentWebLanguage(), 'Web Product Detail');





$pId        = isset($_GET['pId']) ? floatval($_GET['pId']) : 0;

$WEB_URL    = WEB_URL;

require_once(__DIR__ . "/" . ADMIN_FOLDER . "/product_management/functions/product_function.php");

require_once(__DIR__ . "/" . ADMIN_FOLDER . "/product/classes/product.class.php");

$product = new product();

$productF = new product_function();

$webLang = currentWebLanguage();

$defaultLang = defaultWebLanguage();



$subsMsg = $productClass->productSubscribeOnSaleSubmit();

$subsMsg1 = $productClass->subscribed_on_stock_availability_submit();

$referMsg = $productClass->referToFriendSubmit();

//$sql = "SELECT * FROM proudct_detail WHERE prodet_id = '$pId'";

$data = $productClass->productData($pId);



$alsoBought = $productClass->ProductsUserBought($pId);



if(!empty($alsoBought)){

// $dbF->prnt($alsoBought);

}





// if (!$dbF->rowCount) {

//     //header("HTTP/1.0 404 Not Found");

//     // $webClass->P404();

//     // exit;

// }

$pLink = WEB_URL . "/products.php?pId=$pId";



$pViews = $data['view'];

$pSetting = $productClass->productF->getProductSetting($pId);

$model = $productClass->productF->productSettingArray('Model', $pSetting, $pId);

$label = $productClass->productF->productSettingArray('label', $pSetting, $pId);

$video = $productClass->productF->productSettingArray('video', $pSetting, $pId);

$relatedIds = unserialize($productClass->productF->productSettingArray('related', $pSetting, $pId));

$combineWith = unserialize($productClass->productF->productSettingArray('combineWith', $pSetting, $pId));



// $dbF->prnt($combineWith);



$videoDiv = '';

if (!empty($video)) {

$videoDiv = '<a href="' . $video . '" class="shrink fancybox-video">

<img src="' . WEB_URL . '/images/video_icon.png" />

</a>';



$videoDiv .= "<script>

$(document).ready(function(){

$('.fancybox-video').fancybox({

'width'             : '75%',

'height'            : '100%',

'autoScale'         : false,

'type'              : 'iframe'

});

});

</script>

";

}





$loaderGif = WEB_URL . '/images/loader.gif';

$productImage = $productClass->productSpecialImage($pId, 'main');



if ($productImage == "") {

$productImage = "default.jpg";

}

$productThumb = $webClass->resizeImage($productImage, 619, 680, false);

$productImage = WEB_URL . '/images/' . $productImage;





$pName      = translateFromSerialize($data['prodet_name']);

$pDesc      = translateFromSerialize($productClass->productF->productSettingArray('ldesc', $pSetting, $pId));

$size_chart      = translateFromSerialize($productClass->productF->productSettingArray('size_chart', $pSetting, $pId));

$pFeaturePoints = translateFromSerialize($productClass->productF->productSettingArray('featurePoints', $pSetting, $pId));

$pAdditionalInfo = translateFromSerialize($productClass->productF->productSettingArray('tags', $pSetting, $pId));

$specificationDesc = translateFromSerialize($productClass->productF->productSettingArray('specification', $pSetting, $pId));

$pReturnDesc = $pAdditionalInfo;

$featureIcon = translateFromSerialize($productClass->productF->productSettingArray('featureIcon', $pSetting, $pId));

$pShrtDesc  = translateFromSerialize($data['prodet_shortDesc']);



$currencyId = $productClass->currentCurrencyId();

$currencySymbol = $productClass->currentCurrencySymbol();



$pPriceData     = $productF->productPrice($pId, $currencyId);

//$pPriceData Return , currency id,international shipping, price, id,

$priceDefault   = $pPriceData['propri_price'];

$pPrice = $priceDefault;



$storeId = $productClass->getStoreId();



$discount = $productClass->productF->productDiscount($pId, $currencyId);



@$discountFormat = $discount['discountFormat'];

@$discountP = $discount['discount'];



$isSale         =   false;

if(isset( $discount['discount'] ) && $discount['discount']>'0' ){

$isSale     =   true;

}



$discountPrice = $productClass->productF->discountPriceCalculation($pPrice, $discount);

$newPrice = $pPrice - $discountPrice;



$hasDiscount = false;

//print where you want

/*if ($newPrice   != $pPrice) {

$hasDiscount = true;

$oldPriceDiv = '<span class="oldPrice tabprice"><span class="productOldPrice_' . $pId . '">' . $pPrice . '</span> ' . $currencySymbol . '</span>';

$newPriceDiv = '

<span class="NewDiscountPrice1"><span class="productPrice_' . $pId . '">' . $newPrice . '</span> ' . $currencySymbol .

' </span>';

} else {

$oldPriceDiv = "";

$newPriceDiv = '<span class="NewDiscountPrice1">

<span class="productPrice_' . $pId . '">' . $pPrice . '</span> ' . $currencySymbol . '

</span>



';

}*/






if ($newPrice   != $pPrice) {
    
    
    $dis =$pPrice -  $newPrice;

$hasDiscount = true;

$discount_per = ($newPrice/$pPrice)*100;
$discount_per = ceil($discount_per);
$discount_per = 100-$discount_per;



$oldPriceDiv = '<span class="oldPrice tabprice"><span class="productOldPrice_' . $pId . '">' . $pPrice . '</span> ' . $currencySymbol . '</span>';

// $newPriceDiv = '<div class="pop_price_inside"> <span class="productPrice_' . $pId . '">
// ' . $newPrice . '</span> ' . $currencySymbol . ' </div>
// <div class="pop_price_inside2"> <span>' . $pPrice . '</span>'. $currencySymbol . '</div>
// <div class="off_price">
// <h4>-'.$discount_per.'%</h4>
// </div>';



$newPriceDiv = '
<div class="pop_info_cart_main_right_price">
<h6>' . $_e["Price"] . '</h6>
<h4><span class="productPrice_' . $pId . '">' . $newPrice . '</span> ' . $currencySymbol . '</h4>
<div class="pop_info_cart_main_right_price_cut_price"> ' . $pPrice . ' ' . $currencySymbol . ' </div>
</div>
<div class="pop_info_cart_main_right_2"> ' . $_e["You save"] . ' <span>'.$dis.' '. $currencySymbol . '</span>  ('.$discount_per.' %) </div>

';




} else {

$oldPriceDiv = "";

// $newPriceDiv = '<div class="pop_price_inside"> <span class="productPrice_' . $pId . '">' . $newPrice . '</span> ' . $currencySymbol . ' </div>';



$newPriceDiv = '<div class="pop_info_cart_main_right_price">
<h6>' . $_e["Price"] . '</h6>
<h4 class="productPrice_' . $pId . '">' . $newPrice . ' ' . $currencySymbol . '</h4>
</div>';











}




// if ($newPrice   != $pPrice) {

// $hasDiscount = true;

// $discount_per = ($newPrice/$pPrice)*100;
// $discount_per = ceil($discount_per);
// $discount_per = 100-$discount_per;



// $oldPriceDiv = '<span class="oldPrice tabprice"><span class="productOldPrice_' . $pId . '">' . $pPrice . '</span> ' . $currencySymbol . '</span>';

// $newPriceDiv = '<div class="pop_price_inside"> <span class="productPrice_' . $pId . '">' . $newPrice . '</span> ' . $currencySymbol . ' </div>
// <div class="pop_price_inside2"> <span>' . $pPrice . '</span>'. $currencySymbol . '</div>
// <div class="off_price">
// <h4>-'.$discount_per.'%</h4>
// </div>';

// } else {

// $oldPriceDiv = "";

// $newPriceDiv = '<div class="pop_price_inside"> <span class="productPrice_' . $pId . '">' . $newPrice . '</span> ' . $currencySymbol . ' </div>';

// }





//Work For discounted value Box



$discountValue = $discountP;

if ($discountFormat == "percent") {

$discountValue .= " %";

} else {

$discountValue = $discountValue . " $currencySymbol";

}



$isSale = false;

if (isset($discount['isSale']) && $discount['isSale'] == '1') {

$isSale = true;

}



$isDiscount = false;

if ($newPrice != $pPrice) {

$isDiscount = true;

}



$saleDiv = "";

if ($isSale) {

//Sale

$saleDiv = "

<div class='off_price'>

<h4>$discountValue

" . $_e['SALE'] . "</h4>

</div>";

} else if ($isDiscount) {

//Discount

$saleDiv = "

<div class='off_price'>

<h4>$discountValue

" . $_e['DISCOUNT'] . "</h4>

</div>";

}



















//Shipping Class price

$shippingClassId = $productClass->productF->productSettingArray('shippingClass', $pSetting, $pId);

if($shippingClassId >0){

$shipClassData  = $productClass->shippingClassInfo($shippingClassId);

$shipClassPrice = $shipClassData['price'];

$shipClass      = $shipClassData['name'];

}else{

$shipClassData  = false;

$shipClassPrice = $shipClass = '';

}

//Shipping Class price End



$inventoryLimit = $functions->developer_setting('product_check_stock'); // mean is unlimit inventory

$inventoryLimit = ($inventoryLimit == '1' ? true : false);



$hasScaleVal = $functions->developer_setting('product_Scale');

$hasColorVal = $functions->developer_setting('product_color');



$hasWebOrder_with_Scale = $functions->developer_setting('webOrder_with_Scale');

$hasWebOrder_with_color = $functions->developer_setting('webOrder_with_color');



$hasScale = ($hasScaleVal == '1' ? true : false);

$hasColor = ($hasColorVal == '1' ? true : false);



/*

*

Info Of is size & color insert in product either it is out of stock

Or either it is out of store,

*/



if($inventoryLimit){

$getInfo = $productClass->inventoryReport($pId);

}else {

$getInfo = $productClass->productSclaeColorReport($pId);

}

$getInfoReport  = $getInfo['report'];



if ($getInfo['scale'] == false && $hasWebOrder_with_Scale == '0') {

//if scale not found then make scale data empty,

//if product scale allow from setting and dont have inventory, it will make scale val to 0

// we will assume scale not allow from setting for javascript

$scaleDiv = "";

$hasScaleVal = 0;

$hasScale = false;

}



if ($getInfo['color'] == false && $hasWebOrder_with_color == '0') {

//if color not found then make color data empty,

//if product color allow from setting and dont have inventory, it will make color val to 0

// we will assume color not all ow from setting for javascript



$colorDiv = "";

$hasColorVal = 0;

$hasColor = false;

}





/*Make Color Divs,, print where you want*/

/*$colorDiv = "";

if ($hasColor) {

$colorDiv = $productClass->getColorsDiv($pId, $storeId, $pPrice, $currencyId, $currencySymbol, $discountP, $hasScale);

$colorDiv = "<div class='container_detail_RightR_color_heading'>

<p>" . _uc($_e['Color']) . "</p>" . $colorDiv . "</div>";

}*/









/* My Work

$colorDiv = "";

if ($hasColor) {

$colorDiv = $productClass->getColorsDiv($pId, $storeId, $pPrice, $currencyId, $currencySymbol, $discountP, $hasScale);

$colorDiv = "<div class='container_detail_RightR_color_heading'>

<p>" . _uc($_e['Color']) . "</p>" . "<select>" . $colorDiv .  "</select>" . "</div>";

}*/



?>

<?php



$colorDiv = "";

if ($hasColor) {

$colorDiv = $productClass->getColorsDiv($pId, $storeId, $pPrice, $currencyId, $currencySymbol, $discountP, $hasScale);

$colorDiv = "<div class='container_detail_RightR_color_heading'>

<dl id='sample' class='dropdown'> <dt><a> <span>" . $_e['Select a color'] . "</span></a></dt><dd>

<ul> " . $colorDiv .  "    </ul>

</dd></dl>" . "</div>";



}







//Make Scale Divs,, print where you want

$isCustomSize = false;

$customSizeForm = '';



$scaleDiv = "";



if ($hasScale) {

//var_dump($pId, $storeId, $currencyId, $currencySymbol, $hasColor);



$scaleDiv = $productClass->getScalesDiv($pId, $storeId, $currencyId, $currencySymbol, $hasColor);



}

//Custom Size

if ($functions->developer_setting('product_customSize') == '1') {

//old $sql = "SELECT * FROM product_size_custom WHERE `pId` = '$pId'";

$sql = "SELECT type_id,currencyId,price FROM product_size_custom WHERE `pId` = '$pId'";

$customData = $dbF->getRows($sql);



if (!empty($customData)) {

@$customSize    = $customData[0]['type_id'];

if ($customSize != "0" && !empty($customSize)) {

$isCustomSize = true;



$customSizeForm = $productClass->customSizeForm($pId, $customSize);

if ($customSizeForm == false) {

$isCustomSize = true;

$customSize = 0;

}else{

$customSize_price = $productClass->customSizeArrayFilter($customData, $currencyId);

$customSize_price = empty($customSize_price) ? 0 : floatval($customSize_price);

$onclick    = 'onclick="productPriceUpdate(' . $pId . ');" data-toggle="modal" data-target="#customF_' . $pId . '" id="custom_size_button" ';

$scaleDiv   = $scaleDiv . $productClass->getScaleDivFormat($pId, $_e['Custom'], -1, $customSize_price, -1, '', $onclick);

}

}//if customSize==0 end

} //if customData end

} // if developer setting end

//Custom Size End



##############################################################################################

$box = $webClass->getBox('box11');

$made_to_measure_box = $box['text'];

$customSizeForm = $made_to_measure_box . $customSizeForm;



/*if(!empty($scaleDiv)){

$scaleDiv = "<div class='container_detail_RightR_color_heading'><p>" . _uc($_e['Size']) . "</p>" . $scaleDiv . "</div>";

}*/















if(!empty($scaleDiv)){

$scaleDiv = "<div class='container_detail_RightR_color_heading'>

<dl id='sample_select' class='dropdown_select'> <dt><a> <span>" . $_e['Select Scale'] . "</span></a></dt><dd>

<ul> " . $scaleDiv .  "    </ul>

</dd></dl>" . "</div>";

}











$isSingleProduct = false;

if (!$hasScale && !$hasColor) {

$isSingleProduct = true;

}



$inventoryLimit = ($inventoryLimit == true ? "1" : "0");



//print jsInfo after body start, or in product div

$jsInfo = " <!-- javascript Info use in js-->

<input type='hidden' id='currency_$pId' value= '$currencySymbol'

data-discountP      = '$discountP'

data-discountFormat = '$discountFormat'

data-discountDefaultPrice  ='$newPrice'

data-defaultPrice   = '$priceDefault'/>

<input type='hidden' id='store_$pId' value='$storeId'/>

<input type='hidden' id='hasColor_$pId' value='$hasColorVal'/>

<input type='hidden' id='hasScale_$pId' value='$hasScaleVal'/>



<input type='hidden' id='order_with_Color_$pId' value='$hasWebOrder_with_color'/>

<input type='hidden' id='order_with_Scale_$pId' value='$hasWebOrder_with_Scale'/>

<input type='hidden' id='deatilStockCheck_$pId' value='$inventoryLimit' >

$getInfoReport

<!-- javascript Info use in js End-->";





$stockStatus    = $productClass->productF->hasStock($pId);



if ($stockStatus) {

$stockStatus_T = _uc($_e['In Stock']);

} else {

$stockStatus_T = _uc($_e['Out Stock']);

}





//Blog Class For Reviews Or Facebook Comment

$functions->require_once_custom('webBlog_functions');

$blogC = new webBlog_functions();

$reviewMsg = "";

$reviews = "";

$reviewOff  = $productClass->productF->productSettingArray('reviewOffMsg', $pSetting, $pId);

$myReview   = $productClass->productF->productSettingArray('review', $pSetting, $pId); // 1 or 0 from single product



// if ($myReview == '1' || empty($myReview)) {

//check product setting

$reviewMsg = $blogC->reviewSubmit();

$reviews   = $blogC->reviews($pId, 'product', false, true, 1, $reviewOff);

// } else 


if ($reviewOff != '') {

$reviews = "<hr><div class='reviewoffMsg alert alert-warning  margin-0'>$reviewOff</div>";

}



$questionOff    =   $productClass->productF->productSettingArray('questionOffMsg', $pSetting, $pId);

$questionAllow  =   $productClass->productF->productSettingArray('askQuestion', $pSetting, $pId); // 1 or 0 from single product

$askQuestion    =   '';

$askQuestionForm    =   $askQuestion;

if ($questionAllow == '1' || empty($questionOff)) {

if(empty($reviewMsg)) {

//if $reviewMsg is not empty ,, so ask question definatly not submit.... so no need to call this function, or save previous msg to print

$reviewMsg = $blogC->askQuestionSubmit();

}

$askQuestion = $blogC->askQuestion($pId, 'question',false,$questionAllow, $questionOff);

$askQuestionForm = $blogC->askQuestionForm($pId,'question');

}else if ($questionOff != '') {

$askQuestion = "<hr><div class='reviewoffMsg alert alert-warning  margin-0'>$questionOff</div>";

$askQuestionForm = $askQuestion;

}



// Use $reviews variable to show reviews

$facebookOff = $productClass->productF->productSettingArray('fbCommentOffMsg', $pSetting, $pId);

$facebookComments = "";

if ($productClass->productF->productSettingArray('facebookComment', $pSetting, $pId) == '1') {// check product setting

$fbComments = $blogC->facebookComment();

$facebookComments = "<div class='container-fluid padding-0 facebookCommentsDiv'>$fbComments</div>";

} else if ($facebookOff != '') {

$facebookComments = "<div class='fbOffMsg alert alert-warning'>$facebookOff</div>";

}



//Review Or Comment End

$fbLikeShare = $functions->socialFbLikeShare();

// Use $facebookComments variable to show Facebook Comments



//Seo

$arryySeo = array();

$arraySeo['title'] = $pName;

$arraySeo['description'] = $pShrtDesc;

$arraySeo['image'] = $productImage;

$arraySeo['price'] = $priceDefault;

$arraySeo['currency'] = $currencySymbol;

$arraySeo['shipping'] = $shipClassPrice;

$productClass->productMetaSeo($arraySeo);

//Seo End





//Return policy page

$usingReturnPolicy = false; // make if true, if you want to use return policy data

if ($usingReturnPolicy) {

$returnPageId = "return";

$pgData = $webClass->getPage($returnPageId);

$returnPolicyDesc = $pgData['desc'];

$returnPolicyShortDesc = $pgData['short_desc'];

}



//defect policy page

$usingDefectPolicy = false; // make if true, if you want to use return policy data

if ($usingDefectPolicy) {

$returnPageId = "defect";

$pgData = $webClass->getPage($returnPageId);

$defectPolicyDesc = $pgData['desc'];

$defectPolicyShortDesc = $pgData['short_desc'];

}



$productClass->productViewCount($pId);



$addToCartButton = "";



######### 3 For 2 Category ########

$three_for_2_category = $productF->check_product_in_3_for_2($pId);

if($three_for_2_category){

$three_for_2_category = " <img src='".WEB_URL."/images/3for2.jpg' height='40' />";

}else{

$three_for_2_category = "";

}

######### Staple Product Category ########
$staple_product_category1 = $productF->check_product_in_staple_cat($pId);
if($staple_product_category1){
$staple_product_category = "<img src='".WEB_URL."/webImages/bundle_icon.png' />";
$staple_product_category = true;
}else{
$staple_product_category = false;
}



















include("header.php");

echo $subsMsg;

echo $subsMsg1;

echo $referMsg;

if ($isCustomSize) {

echo $functions->blankModal($_e["Custom Size"], "customF_$pId", $customSizeForm, "Close");

}



?>

<script>

$(document).ready(function() {

<?php if($isSingleProduct){ ?>

productStockCheck(<?php echo $pId; ?>, 0, 0);

<?php } ?>

});

</script>

<!--<div id="fb-root"></div>

<script>

facebookSocial = function() {

(function (d, s, id) {

var js, fjs = d.getElementsByTagName(s)[0];

if (d.getElementById(id)) return;

js = d.createElement(s);

js.id = id;

js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=551931871510090&version=v2.0";

fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));

}

setTimeout(facebookSocial,<?php echo $db->setTimeOutSocial; ?>);

</script>-->

<!--Fb Twitter and google share buttons save here to use in future easly-->

<!--<div class="detail_top_r_icons">

<?php /*$pageLink = WEB_URL."/detail.php?pId=".$pId; */ ?>

<table valign="middel">

<td style="padding:0 5px"><div class="fb-share-button" data-href="<?php /*echo $pageLink; */ ?>" data-layout="button_count"></div></td>

<td>

<div class="twitter-share">

<a class="twitter-share-button" href="<?php /*echo $pageLink; */ ?>"

data-related="twitterdev"

data-count="yes">

Tweet

</a>

<script>

function TwitterSocial(){

window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));

}

setTimeout(TwitterSocial(),<?php /*echo $db->setTimeOutSocial; */ ?>);

</script>

</div>

</td>



<td>

<script src="https://apis.google.com/js/platform.js" async defer></script>

<div class="g-plus" data-action="share" data-annotation="bubble"></div>

</td>





</table>

</div>-->

<!--Product Images-->

<?php

/*

* $allImages  =   $productClass->productAllImage($pId);

foreach($allImages as $val){

$img = $val['image'];

$imgSize1 = $functions->resizeImage($img,100,'auto',false);

$imgSize2 = $functions->resizeImage($img,430,530,false);

$real       =   WEB_URL."/images/".$img;

$alt = $val['alt'];



echo "<div class='col-xs-3 padding-0'>

<img  class='cloudzoom-gallery img-responsive' alt='$alt'

src='$imgSize1'

data-cloudzoom=\"useZoom: '.cloudzoom',

image: '$imgSize2',

zoomImage: '$real'  \">

</div>";



}

*/

?>

<!--Small Status , total view, in stock, label Name-->

<!--

<div class="container-fluid padding-0">

<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>

<span><?php /*echo $pViews;*/ ?></span>

<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>

<span><?php /*echo $stockStatus_T; */ ?></span>

<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>

<span><?php /*echo $label; */ ?></span>

</div>

-->

<!--Stock quantity or AddtoCart OR wishList-->

<!--

<small id="stock_<?php /*echo $pId; */ ?>"></small>

<a onclick="addToWishList(this,1091);" class="btn-default futura_bk_bt">

Add TO

</a>



<a onclick="addToCart(this,<?php /*echo $pId; */ ?>);"

class="add_cart cursor AddToCart_<?php /*echo $pId; */ ?>" style="white-space: nowrap;">

<?php /*echo $_e['Add To Cart']; */ ?>

</a>

-->

<!--<a href="#" data-toggle="modal" data-target="#ProductSubscribe" >Subscribe On Sale</a>

<br>

<a href="#" data-toggle="modal" data-target="#referToFriend" >Refer To Friend</a>-->

<div id="fb-root"></div>

<script>

facebookSocial = function() {

(function(d, s, id) {

var js, fjs = d.getElementsByTagName(s)[0];

if (d.getElementById(id)) return;

js = d.createElement(s);

js.id = id;

js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=551931871510090&version=v2.0";

fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));

}

setTimeout(facebookSocial, <?php echo $db->setTimeOutSocial; ?>);

</script>


<link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/cloudzoom.css" />

<script type="text/javascript" src="<?php echo WEB_URL ?>/js/cloudzoom.js"></script>
<link rel="stylesheet" href="<?php echo WEB_URL ?>/css/lazy-load-images.min.css">

<script type="text/javascript">

CloudZoom.quickStart();

$(document).ready(function() {

// Bind a click event to a Cloud Zoom instance.

$('.onClickCloudZoomShowBig').bind('click', function() {

// On click, get the Cloud Zoom object,

var cloudZoom = $(this).data('CloudZoom');

// Close the zoom window (from 2.1 rev 1211291557)

// cloudZoom.closeZoom();

// and pass Cloud Zoom's image list to Fancy Box.

$.fancybox.open(cloudZoom.getGalleryList());

return false;

});

});

</script>

<?php ############ Once there cart_popup was called ######################  ?>

<?php $webClass->seoSpecial(); ?>


<div class="index_content">
<div class="col1_left">
<?php $functions->includeOnceCustom('left_side_panel.php'); ?>
</div>
<!-- col1_left close -->
<div class="col1_right">
    
    
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



    <div class="col3_main_all">
</div>
<div class="add_to_cart_main_pic_slide">
<div class="inner_menu_side">
<ul>
<li> <a href="<?php echo WEB_URL ?>"><?php $dbF->hardWords('Home'); ?></a> </li>
<li> <a href="<?php echo WEB_URL ?>/products"><?php $dbF->hardWords('Products'); ?></a> </li>
<li> <a href="#"><?php echo $pName; ?></a> </li>
</ul>
</div>
<?php
echo $reviewMsg;
echo $jsInfo;
?>
<!-- inner_menu_side close -->
<div class="inside_slide123">
<div class="image_slider"> 
<img class="cloudzoom onClickCloudZoomShowBig" style="max-height:100%;" alt="" src="<?php echo $productThumb; ?>" data-cloudzoom="zoomImage: '<?php echo $productImage; ?>'">
</div>
<!-- image_slider close -->
<div class="product_owl1">
<div class="all1">
<?php

$allImages = $productClass->productAllImage($pId);
foreach ($allImages as $val) {
$img = $val['image'];
$imgSize1 = $functions->resizeImage($img, 130, '200', false);
$imgSize2 = $functions->resizeImage($img, 619, 613, false);
$real = WEB_URL . "/images/" . $img;
$alt = $val['alt'];

echo "<div class='slide1'> 

<img  class='cloudzoom-gallery ' data-alt='$alt' src='$imgSize1' data-cloudzoom=\"useZoom: '.cloudzoom', image: '$imgSize2', zoomImage: '$real'  \"> 
</div>";

}
echo $videoDiv;

?>
</div>
<!-- all1 close -->
</div>
<!-- product_owl1 close -->
</div>
<!-- inside_slide123 close -->
</div>
<!-- add_to_cart_main_pic_slide close -->
<div class="add_to_cart_main_pic_responsive">
<div class="owl_4">
<div class="all4">
<?php

$allImages = $productClass->productAllImage($pId);
foreach ($allImages as $val) {
$img = $val['image'];
$imgSize1 = $functions->resizeImage($img, 130, '200', false);
$imgSize2 = $functions->resizeImage($img, 619, 613, false);
$real = WEB_URL . "/images/" . $img;
$alt = $val['alt'];

echo "<div class='slide4'>
<a href='$real' class='fancybox-media' rel='media-gallery'><img  class='' alt='$alt'
src='$imgSize2'></a>
</div>";

}
echo $videoDiv;

?>
</div>
<!-- all4 close -->
</div>
<!-- owl_4 close -->
</div>
<!-- add_to_cart_main_pic_responsive close -->
<div class="add_product_to_cart">
<div class="inside_cart_inner">
<div class="pop_info_cart">
<h3><?php echo $pName; ?></h3>
<span><?php echo $label.$three_for_2_category; ?></span>
<?php 
if($staple_product_category){
?>
<div class="staple_product_tab">
<?php echo $dbF->hardWords('Bundle Offer');?>
<div class="staple_product_tab_hover"><?php echo $dbF->hardWords('Buy 3 for 399 SEK');?></div>
</div>
<?php } ?>
<!--                             <div class="pop_menu">
<ul>
<li> <a href="#">TRÖJOR,</a> </li>
<li> <a href="#">NYHETER,</a> </li>
<li> <a href="#">BÄSTSÄLJARE,</a> </li>
<li> <a href="#">SALE - REA - OUTLET</a> </li>
<li> <a href="#">CRAZY DEALS,</a> </li>
</ul>
</div> -->






<div class="pop_info_cart_main">
 <?php  echo $pShrtDesc; ?>
<div class="pop_info_cart_main_left"> 
<?php echo $dbF->hardWords('Price right now!');?>
 </div>
<!-- pop_info_cart_main_left close -->
<div class="pop_info_cart_main_right">
<?php echo $newPriceDiv; ?>
<!-- <div class="pop_info_cart_main_right_price"> -->
<!-- <h6>Fran</h6> -->
<!-- <h4>44 64 kr</h4> -->
<!-- <div class="pop_info_cart_main_right_price_cut_price"> 4 699 kr </div> -->
<!-- pop_info_cart_main_right_price_cut_price close -->
<!-- </div> -->
<!-- pop_info_cart_main_right_price close -->
<!-- <div class="pop_info_cart_main_right_2"> Du sparar <span>235 kr</span> (5%) </div> -->
<!-- pop_info_cart_main_right_2 close -->

</div>
<!-- pop_info_cart_main_right close -->
</div>
<!-- pop_info_cart_main close -->


</div>
<!-- pop_info_cart close -->
</div>
<!-- inside_cart_inner close -->
</div>
<!-- add_product_to_cart close -->
<div class="tabs_main_side">
<div id="tabs">
<ul>
<li><a href="#tabs-5"><?php echo $_e['Reviews']; ?></a></li>

<?php
// var_dump($pDesc);
// var_dump($reviews);


if(!empty($pDesc) && $pDesc != ''): ?>
<li><a href="#tabs-1"><?php echo $_e['DESCRIPTION']; ?></a></li>
<?php endif; ?>
<?php if(!empty($specificationDesc) && $specificationDesc != '' && false): ?>
<li><a href="#tabs-2"><?php echo $_e['SPECIFICATION']; ?></a></li>
<?php endif; ?>








<?php if(!empty($size_chart) && $size_chart != '' && false): ?>
<li><a href="#tabs-3"><?php echo $_e['SIZE CHART']; ?></a></li>
<?php endif; ?>
<?php if(!empty($pReturnDesc) && $pReturnDesc != '' && false): ?>
<li><a href="#tabs-4"><?php echo $_e['SHIPPING & RETURNS']; ?></a></li>
<?php endif; ?>
</ul>
<?php if(!empty($pDesc) && $pDesc != ''): ?>
<div id="tabs-1" class="tabs_tab">
<div class="tabs_tab">
<!-- <h2><?php echo $_e['DESCRIPTION']; ?></h2> -->
<div class="tabs_text_side">
<?php echo $pDesc; ?>
</div>
<!-- tabs_text_side close -->
</div>
<!-- tabs_tab close -->
</div>
<!-- tabs-1 close -->
<?php endif; ?>
<?php if(!empty($specificationDesc) && $specificationDesc != '' && false): ?>
<div id="tabs-2" class="tabs_tab">
<div class="tabs_tab">
<!--  <h2><?php echo $_e['SPECIFICATION']; ?></h2> -->
<div class="tabs_text_side"> 
<?php echo $specificationDesc; ?> 
</div>
<!-- tabs_text_side close -->
</div>
<!-- tabs_tab close -->
</div>
<!-- tabs-2 close -->
<?php endif; ?>


<div id="tabs-5" class="tabs_tab">
<div class="tabs_tab">
<!--  <h2><?php echo $_e['SPECIFICATION']; ?></h2> -->
<div class="tabs_text_side"> 
<?php echo $reviews; ?> 

<?php
$functions->_modelFile("classes/rating.php");
$rating     = new rating();
// echo $rating->ratingView($pId,'value',$_e["Add Rating"]);
// echo "<div class='clearix'></div>";
// echo $rating->ratingView($pId,'quality',$_e["Quality"]);
// echo "<div class='clearix'></div>";
// echo $rating->ratingView($pId,'price',$_e["Price"]);
?>

</div>
<!-- tabs_text_side close -->
</div>
<!-- tabs_tab close -->
</div>
<!-- tabs-2 close -->




<?php if(!empty($size_chart) && $size_chart != '' && false): ?>
<div id="tabs-3" class="tabs_tab">
<div class="tabs_tab">
<!--   <h2><?php echo $_e['SIZE CHART']; ?></h2> -->
<div class="tabs_text_side"> 
<?php echo $size_chart; ?> 
</div>
<!-- tabs_text_side close -->
</div>
<!-- tabs_tab close -->
</div>
<!-- tabs-3 close -->
<?php endif; ?>
<?php if(!empty($pReturnDesc) && $pReturnDesc != '' && false): ?>
<div id="tabs-4" class="tabs_tab">
<div class="tabs_tab">
<!--  <h2><?php echo $_e['SHIPPING & RETURNS']; ?></h2> -->
<div class="tabs_text_side">
<?php echo $pReturnDesc; ?>
</div>
<!-- tabs_text_side close -->
</div>
<!-- tabs_tab close -->
</div>
<!-- tabs-4 close -->
<?php endif; ?>
</div>
<!-- tabs close -->
<div class="full_look">
<?php 
$matching_pro = $productClass->matchingProduct($pId,4,'1');

if($matching_pro != false): ?>
<h3><?php $dbF->hardWords('BUY MATCHING PRODUCTS - GET THE FULL LOOK'); ?></h3>
<div class="full_look_main">
<?php echo $matching_pro; ?>
</div>
<!-- full_look_main close -->
<?php endif; ?>
</div>
<!-- full_look close -->
</div>
<!-- tabs_main_side close -->
<?php 
foreach ($combineWith as $key => $value) { 
$categ_namee = translateFromSerialize($productClass->getCategoryNameNew($value));
$catLinkk = $productClass->getSeoLink($value);
?>
<div class="col3_main">
<h2><?php echo _uc($_e['Related Products']); echo ' <u><a href="'.$catLinkk.'">'.$categ_namee.'</a></u>';?></h2>
<div class="col3_all">
<?php echo $productClass->productsCombineWithPrint($value,false,'1'); ?>
</div>
<!-- col3_all close -->
</div>
<!-- col3_main close -->
<?php } ?>
</div>
<!-- col1_right close -->
</div>
<!-- index_content close -->

<script>
$(document).ready(function() {
resp_img = $('.slide4').length;
if(resp_img > 1){
res_i = true;
}else{
res_i = false;
}
$('.all4').owlCarousel({
loop: res_i,
navigation: true,
autoplay: res_i,
autoplayTimeout: 3000,
autoplayHoverPause: true,
items: 3,
responsiveClass: true,
responsive: {
0: {
items: 1,
nav: true
},
300: {
items: 1,
nav: false
},
400: {
items: 1,
nav: false
},
500: {
items: 1,
nav: false
},
600: {
items: 1,
nav: false
},
750: {
items: 1,
nav: true,
},
800: {
items: 1,
nav: true,
},
900: {
items: 1,
nav: true,
},
1000: {
items: 1,
nav: true,
},
1200: {
items: 1,
nav: true,
},
1280: {
items: 1,
nav: true,
}
}
})
});
$(".left_btn122").click(function() {
var owl = $(".all4").data('owlCarousel');
owl.next() // Go to next slide
});
$(".right_btn122").click(function() {
var owl = $(".all4").data('owlCarousel');
owl.prev() // Go to previous slide
});
</script>
<script>
$(function() {
$('.all1').ulslide({
height: 90,
effect: {
type: 'carousel', // slide or fade
axis: 'y', // x, y
showCount: 6,
distance: 20
},
pager: '#slide-pager2 a',
nextButton: '.left_btn1',
prevButton: '.right_btn1',
duration: 1000,
mousewheel: false,
autoslide: 3000,
easing: 'easeInOutBack'
});
});
</script>

<script>
$(document).ready(function() {
$('.col3_all').owlCarousel({
loop: true,
navigation: true,
autoplay: true,
autoplayTimeout: 3000,
autoplayHoverPause: true,
items: 7,
responsiveClass: true,
responsive: {
0: {
items: 2,
nav: true
},
300: {
items: 2,
nav: false
},
400: {
items: 3,
nav: false
},
500: {
items: 3,
nav: false
},
600: {
items: 4,
nav: false
},
750: {
items: 4,
nav: true,
},
800: {
items: 5,
nav: true,
},
900: {
items: 5,
nav: true,
},
1000: {
items: 6,
nav: true,
},
1200: {
items: 7,
nav: true,
},
1280: {
items: 7,
nav: true,
}
}
})
});
</script>

<script>
$(function() {
$("#tabs").tabs();
});

$('#m_menu_click').click(function(event) {
/* Act on the event */
if ($('#col_menu').is(':visible') === false) {
$("html, body").animate({
scrollTop: 0
}, 1000);
};
$('#col_menu').fadeIn();
});
</script>









































<script>

$(document).ready(function() {



if ($('.all2').children().length > 1) {



$('.all2').owlCarousel({

loop: true,

margin: 0,

responsiveClass: true,



responsive: {

0: {

items: 1,

nav: false

},

360: {

items: 1,

nav: false

},

455: {

items: 1,

nav: false

},

580: {

items: 1,

nav: false

},

700: {

items: 1,

nav: false



},

900: {

items: 1,

nav: false,

loop: true

}

}

})



}



});



//        var owl = $('.all2');

//        if (owl.children().length > 1) {

//            owl.owlCarousel({

//                autoplay:true,

//                autoplayTimeout:2000,

//                items :1,

//                loop:true,

//                nav:false,

//                responsiveClass:true,

//                responsive:{

//                    0:{

//                        items:1,

//                        nav:false

//                    }

//                }

//

//            });

//

//        } else {

//

//        }

</script>

<script>

$(document).ready(function() {



if ($('.owl-carousel2').children().length > 1) {

$('.owl-carousel2').owlCarousel({

loop: true,

margin: 0,

responsiveClass: true,



responsive: {

0: {

items: 1,

nav: false

},

360: {

items: 2,

nav: false

},

455: {

items: 2,

nav: false

},

580: {

items: 3,

nav: false

},

700: {

items: 3,

nav: false



},

900: {

items: 4,

nav: false



},

1000: {

items: 5,

nav: false,

loop: true

},

1200: {

items: 6,

nav: false,

loop: true

}

}

})

}



});



$(".r_left").click(function() {

var owl2 = $(".owl-carousel2").data('owlCarousel');

owl2.next(); // Go to next slide

});



$(".r_right").click(function() {

var owl2 = $(".owl-carousel2").data('owlCarousel');

owl2.prev(); // Go to previous slide

});



$(document).ready(function() {

if ($('.owl-carousel3').children().length > 1) {

$('.owl-carousel3').owlCarousel({

loop: true,

item: 6,

margin: 0,

responsiveClass: true,



responsive: {

0: {

items: 1,

nav: false

},

360: {

items: 2,

nav: false

},

455: {

items: 2,

nav: false

},

580: {

items: 3,

nav: false

},

700: {

items: 3,

nav: false



},

900: {

items: 4,

nav: false



},

1000: {

items: 5,

nav: false,

loop: true

},

1200: {

items: 6,

nav: false,

loop: true

}

}

})

}

});



$(".like_left").click(function() {

var owl3 = $(".owl-carousel3").data('owlCarousel');

owl3.next(); // Go to next slide

});



$(".like_right").click(function() {

var owl3 = $(".owl-carousel3").data('owlCarousel');

owl3.prev(); // Go to previous slide

});



$('.bgColorActive').click(function(e) {

if ($('.bgColorActive').find('.colors_in_divs').hasClass('selected_detail')) {

$('.colors_in_divs').removeClass('selected_detail');

}

$(this).find('.colors_in_divs').toggleClass('selected_detail');

});







$(document).ready(function() {



$('.fancybox-media')

.attr('rel', 'media-gallery')

.fancybox({

openEffect: 'none',

closeEffect: 'none',

prevEffect: 'none',

nextEffect: 'none',



arrows: true,

helpers: {

media: {},

buttons: {}

}

});



});

</script>

<script src="<?php echo WEB_URL; ?>/js/mainTabs.js"></script>



<style>
 .rate_widget .rate_heading {
     background: none !important;
     color: #222222 !important; 
 }
 .rate_widget {
     border: none !important;
     width: 100%;
     /*background-color: #030303;*/
 }

.checkout_img {
/*width: 85px;*/
    margin-top: 70px;
display: inline-block;
vertical-align: top;
overflow: hidden;
}




.rate_widget .ratings_stars {
    display: inline-block;
    float: left;
    padding: 2px;
    background: url(images/rating.png) no-repeat;
    background-size: 300%;
    background-position: -63px;
    width: 31px;
    height: 28px;
    cursor: pointer;
}

.rate_widget .ratings_stars.ratings_full {
    background-position: 0px;
}
.rate_widget .ratings_stars.ratings_full {
    background-position: 0px;
}

.rate_widget .ratings_stars.ratings_full {
    background-position: 0px;
}
.rate_widget .ratings_stars.ratings_over, .ratings_stars.ratings_user {
    background-position: 0px;
} .rate_widget .ratings_stars {
     background-image: url("/webImages/rating.png") !important;
 }
 
 .rate_widget .rating_cover_stars {
     margin-top: 9px;
 }
 
 .rate_widget .total_votes {
     background: none !important;
     color: #fff !important;
 }
.matching_css {

border: none !important;

background: none !important;

}



.info_1.colorspan > span {

height: 18px;

}



.cart_side {

right: -500px;

}







/*





.overlay {

position: fixed;

}



.border_side {

width: 100%;

}



.border_side, .main_box_side, #cart_items_container {

background: #FFF;

}*/


.cloudzoom-zoom,
.cloudzoom-blank {
  display: none !important;
}.mousetrap {
  display: none !important;
}

</style>

<?php 

//if ( isset($_GET['action']) && $_GET['action'] == 'success'

//  &&   isset($_GET['inv']) && isset($_GET['klarna_order']) ): ?>



<script>



// jQuery(document).ready(function($) {



//     var action       = "<?php //echo $_GET['action'] ?>";

//     var inv          = <?php //echo $_GET['inv'] ?>;

//     var klarna_order = <?php //echo $_GET['klarna_order'] ?>;





//     $('#overlay_container').load('klarna.php?action=' + action + '&inv=' + inv + '&klarna_order=' + klarna_order + ' #inner_details_container',  function(data) {

//             /*optional stuff to do after success */

//             console.log('Loaded klarna order successfully!');

//     });



// });




</script>



<?php // endif; ?>

<!-- 

<?php



echo $productClass->productSubscribeOnSale($pId);

echo $productClass->subscribed_on_stock_availability($pId);

echo $productClass->referToFriend($pId);



include_once(__DIR__ . "/footer.php"); 



?>