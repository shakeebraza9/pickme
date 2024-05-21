<?php include_once("global.php");

global $webClass;

global $_e;

global $productClass;



$productClass->setProductSlug();



// $dbF->prnt($_GET);



//work for deal slug

if(isset($_GET['dealSlug'])){

$pSlug = ($_GET['dealSlug']);

$sql = "SELECT id FROM product_deal WHERE slug = '$pSlug'";

$dealSlug = $dbF->getRow($sql);

$pId = $dealSlug['id'];

$_GET['deal']    = $pId;

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

$_w['Model'] = '';

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

$_w['DISCOUNT'] = '';

$_w['Description'] = '';

$_e = $dbF->hardWordsMulti($_w, currentWebLanguage(), 'Web Product Detail');



$cat            = '0';

$dealId         = '0';

$currencyId     = $productClass->currentCurrencyId();

$currencySymbol = $productClass->currentCurrencySymbol();



$dealId        = isset($_GET['deal']) ? floatval($_GET['deal']) : 0;



$webLang = currentWebLanguage();

$defaultLang = defaultWebLanguage();



// $recomend = $productClass->ProductsUserBought($pId);



// $dbF->prnt($recomend);



if (!$dbF->rowCount) {

//header("HTTP/1.0 404 Not Found");

$webClass->P404();

exit;

}



$sql        = "SELECT * FROM product_deal WHERE publish = '1' AND id = '$dealId' ";

$dealData   = $dbF->getRow($sql);

$price      = unserialize($dealData['price']);

$priceDeal      = $price[$currencyId];

$image      = WEB_URL.'/images/'.$dealData['image'];

$name       = translateFromSerialize($dealData['name']);



// echo $price;



$package = unserialize($dealData['package']);

// $dbF->prnt($package);

$im = array();

//$im[] = $image;

$pro_base_price = 0;

foreach ($package as $key => $value) {

$allIm= $productClass->productAllImage($value);

foreach ($allIm as $key1 => $value1) {

$im[] = $value1['image'];

}

// $im[] = $allIm['image'];

$base_price = $productClass->productF->productPrice($value);

$pro_base_price += $base_price['propri_price'];

}

//$dbF->prnt($im);



$discountValue = $pro_base_price - $priceDeal;



$prodcts = '';

if (empty($package)) {

$package = array();

echo "<input type='hidden' id='productPage' value='deal' />";

}





// $dbF->prnt($dealData);



if(!empty($dealData)){

$sql         = "SELECT * FROM product_deal_setting where deal_id = '$dealId' ";

$dataSetting = $dbF->getRows($sql);

$shortDesc   = $functions->findArrayFromSettingTable($dataSetting,'sDesc');

$shortDesc   = translateFromSerialize($shortDesc);



//Count deal no of view

$productClass->productDealViewCount($dealId);

}



include("header.php");

$limit   =   $functions->ibms_setting('productLimit');

?>

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

<?php ### CHECKOUT WORK END ?>

<input type='hidden' id='packDealId' value='<?php echo $dealId; ?>' /> <input type='hidden' id='packInfo' />
<div class="index_content">
<input type="hidden" style="display: none" id="queryLimit" data-id="<?php echo $limit; ?>" value="<?php echo $limit; ?>"/>
<div class="col1_left">
<?php $functions->includeOnceCustom('left_side_panel.php'); ?>
</div>
<!-- col1_left close -->
<?php if($dealId != '0'){ ?>
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
<li> <a href="<?php echo WEB_URL ?>/productDeals"><?php $dbF->hardWords('All Deals'); ?></a> </li>
<li> <a href="#"><?php echo $name; ?></a> </li>
</ul>
</div>
<?php
//echo $reviewMsg;
//echo $jsInfo;
?>
<!-- inner_menu_side close -->
<div class="inside_slide123">
<div class="image_slider"> 
<img class="cloudzoom onClickCloudZoomShowBig" style="max-height:100%;" alt="" src="<?php echo $image; ?>" data-cloudzoom="zoomImage: '<?php echo $image; ?>'">
</div>
<!-- image_slider close -->
<div class="product_owl1">
<div class="all1">
<?php
foreach ($im as $val) {

$img = $val;
$imgSize1 = $functions->resizeImage($img, 130, '200', false);
$imgSize2 = $functions->resizeImage($img, 619, 613, false);
$real = WEB_URL . "/images/" . $img;
@$alt = $val['alt'];

echo "<div class='slide1'> 
<img  class='cloudzoom-gallery' alt='$alt' src='$imgSize1' data-cloudzoom=\"useZoom: '.cloudzoom', image: '$real', zoomImage: '$real'  \"> 
</div>";

}
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
foreach ($im as $val) {

$img = $val;
$imgSize1 = $functions->resizeImage($img, '271', '363', false);
$imgSize2 = $functions->resizeImage($img, 619, 613, false);
$real = WEB_URL . "/images/" . $img;
@$alt = $val['alt'];

echo "<div class='slide4'>
<img  class='cloudzoom-gallery fancybox-media' alt='$alt' src='$imgSize1' data-cloudzoom=\"useZoom: '.cloudzoom', image: '$imgSize2', zoomImage: '$real'  \">
</div>";
}    

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
<h3><?php echo $name; ?></h3>



<div class="pop_info_cart_main">
<div class="pop_info_cart_main_left"> <?php echo $dbF->hardWords('Price right now!');?>
 </div>
<!-- pop_info_cart_main_left close -->
<div class="pop_info_cart_main_right">
<div class="pop_info_cart_main_right_price">
<h6><?php echo $dbF->hardWords('Price');?>
</h6>
<h4><?php echo $priceDeal; ?> <?php echo $currencySymbol; ?> </h4>
<div class="pop_info_cart_main_right_price_cut_price"> <?php echo $pro_base_price ?> <?php echo $currencySymbol; ?>  </div>
<!-- pop_info_cart_main_right_price_cut_price close -->
</div>
<!-- pop_info_cart_main_right_price close -->
<div class="pop_info_cart_main_right_2"> <?php echo $_e['DISCOUNT']; ?> <span><?php echo $discountValue.' '.$currencySymbol; ?></span> (5%) </div>
<!-- pop_info_cart_main_right_2 close -->
</div>
<!-- pop_info_cart_main_right close -->
</div>
<!-- pop_info_cart_main close -->





<?php

$AllPIds = ''; 

foreach ($package as $p) {

$AllPIds .=$p.',';
$pId = $p;
$data = $productClass->productData($pId);
$checkOutOffer = false;
$inventoryLimit = $productClass->functions->developer_setting('product_check_stock'); // mean is unlimit inventory
$inventoryLimit = ($inventoryLimit == '1' ? true : false);
$productImage = $productClass->productSpecialImage($pId, 'main');

if ($productImage == "") {
$productImage = "default.jpg";
}

$productThumb = $productClass->webClass->resizeImage($productImage, 250, 300, false);

$pName = translateFromSerialize($data['prodet_name']);
$currencyId = $productClass->currentCurrencyId();
$currencySymbol = $productClass->currentCurrencySymbol();
$storeId = $productClass->getStoreId();

$oldPriceDiv = $newPriceDiv = $oldPriceNormal = $newPriceNormal = '';
if ($checkOutOffer == false) {

$price = unserialize($dealData['price']);
$priceDefault = $price[$currencyId];
$addToCartButton = '';
$js_data_attrs   = '';

} else {

$addToCartButton = "<div class='fashion_btn_side AddToCart_{$pId}'  onclick='dealProductAddToCart(this,$dealId);'> 
<a>
<span> <img src='".WEB_URL."/webImages/cart_btn.png' alt=''> </span>
{$_e['Add To Cart']}
</a> 
</div>";

$pPriceData = $productClass->productF->productPrice($pId, $currencyId);

//$pPriceData Return , currency id,international shipping, price, id,
$pPrice = $priceDefault = $pPriceData['propri_price'];
$newPrice = $checkOutPrice = $checkOutOffer['proadc_price'];
$discountP = $priceDefault - $checkOutPrice;
$discountFormat = 'price';

if ($priceDefault != $checkOutPrice) {
$oldPriceNormal = $priceDefault . " " . $currencySymbol;
$newPriceNormal = $checkOutPrice . " " . $currencySymbol;
$oldPriceDiv = ' <span class="oldPrice tabprice"><span class="productOldPrice_' . $pId . '">' . $pPrice . '</span> ' . $currencySymbol . ' </span>';
$newPriceDiv = '<span class="NewDiscountPrice productPrice_' . $pId . '">' . $checkOutPrice . '</span> ' . $currencySymbol . '';

} else {

$oldPriceNormal = "";
$newPriceNormal = $priceDefault . " " . $currencySymbol;
$oldPriceDiv = "";
$newPriceDiv = '<span class="NewDiscountPrice price ">' . $priceDefault . '</span>';

}

$js_data_attrs   = " data-discountP             = '$discountP'
data-discountFormat        = '$discountFormat'
data-discountDefaultPrice  = '$newPrice'
data-defaultPrice          = '$priceDefault' ";
}

$hasScaleVal = $functions->developer_setting('product_Scale');
$hasColorVal = $functions->developer_setting('product_color');

$hasWebOrder_with_Scale = $functions->developer_setting('webOrder_with_Scale');
$hasWebOrder_with_color = $functions->developer_setting('webOrder_with_color');

$hasScale = ($hasScaleVal == '1' ? true : false);
$hasColor = ($hasColorVal == '1' ? true : false);

/**
Info Of is size & color insert in product either it is out of stock
Or either it is out of store,
*/

if ($inventoryLimit) {
$getInfo = $productClass->inventoryReport($pId);
} else {
$getInfo = $productClass->productSclaeColorReport($pId);
}

$getInfoReport = $getInfo['report'];

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
// we will assume color not allow from setting for javascript

$colorDiv = "";
$hasColorVal = 0;
$hasColor = false;

}

//Make Color Divs,, print where you want

$colorDiv = "";

if ($hasColor) {

$colorDiv = $productClass->getColorsDiv($pId, $storeId, '0', $currencyId, $currencySymbol, '0', $hasScale);



$colorDiv = <<<COLORDIV

<div id='size_color' class='container_detail_RightR_color choice_color'>

<dl id='sample' class='dropdown_select detail_top_r_size'>

<dt><a><span>{$_e['Select Color']}</span></a></dt>

<dd>

<ul> {$colorDiv} </ul>

</dd>

</dl> 

</div>
COLORDIV;

}

//Make Scale Divs,, print where you want

$isCustomSize = false;
$customSizeForm = '';
$scaleDiv = "";

if ($hasScale) {
$scaleDiv = $productClass->getScalesDiv($pId, $storeId, $currencyId, $currencySymbol, $hasColor);
}

//Custom Size
$isCustomSize = false;

if ($functions->developer_setting('product_customSize') == '1' && true == false) { //stop cutome size in checkout offer

$sql = "SELECT * FROM product_size_custom WHERE `pId` = '$pId'";
$customData = $dbF->getRows($sql);

if (!empty($customData)) {
@$customSize = $customData[0]['type_id'];
if ($customSize != "0" && !empty($customSize)) {
$isCustomSize = true;
$customSizeForm = $productClass->customSizeForm($pId, $customSize);

if ($customSizeForm == false) {
$isCustomSize = true;
$customSize = 0;
} else {

$customSize_price = $productClass->customSizeArrayFilter($customData, $currencyId);
$customSize_price = empty($customSize_price) ? 0 : floatval($customSize_price);
$onclick = 'onclick="productPriceUpdate(' . $pId . ');" data-toggle="modal" data-target="#customF_' . $pId . '"';
$scaleDiv = $scaleDiv . $productClass->getScaleDivFormat($pId, 'Custom', -1, $customSize_price, -1, '', $onclick);
}
}//if customSize==0 end
} //if customData end
} // if developer setting end

//Custom Size End
if (!empty($scaleDiv)) {
if ($isCustomSize) {
$echo .= $this->functions->blankModal("Custom Size", "customF_$pId", $customSizeForm, "Close");
}
$scaleDiv = <<<SIZEDIV

<div id='size_color' class='container_detail_RightR_color choice_color'>
<dl id='sample' class='dropdown_select detail_top_r_size'>
<dt><a><span> {$_e['Select Scale']} </span></a></dt>
<dd>
<ul> {$scaleDiv}    </ul>
</dd>
</dl> 
</div>         
SIZEDIV;

}

$isSingleProduct = false;

if (!$hasScale && !$hasColor) {
$isSingleProduct = true;
}

$link = WEB_URL . "/detail?pId=$pId";
$inventoryLimit = ($inventoryLimit == true ? "1" : "0");

//print jsInfo after body start, or in product div

$jsInfo = "

<!-- javascript Info use in js-->
<input type='hidden' class='dealsProducts' value='$pId'/>
<input type='hidden' id='currency_$pId' value= '$currencySymbol'
                {$js_data_attrs} />
<input type='hidden' id='store_$pId' value='$storeId'/>
<input type='hidden' id='checkout_$pId' value='$pId'/>
<input type='hidden' id='hasColor_$pId' value='$hasColorVal'/>
<input type='hidden' id='hasScale_$pId' value='$hasScaleVal'/>
<input type='hidden' id='order_with_Color_$pId' value='$hasWebOrder_with_color'/>
<input type='hidden' id='order_with_Scale_$pId' value='$hasWebOrder_with_Scale'/>
<input type='hidden' id='deatilStockCheck_$pId' value='$inventoryLimit' >

$getInfoReport
<!-- javascript Info use in js End-->";

$stockStatus = $productClass->productF->hasStock($pId);

if ($stockStatus) {
$stockStatus = _uc($_e['In Stock']);
} else {
$stockStatus = _uc($_e['Out Stock']);
}
?>

<div class="select">
<?php echo $jsInfo; ?>
<h4 class='tmH4 pName_<?php echo $pId; ?>'>
<a href='<?php echo $link; ?>' target='_blank' class='h4 dealPName'><?php echo $pName; ?></a>
</h4>
<div id="size_color" class="container_detail_RightR_color choice_color">
<!-- Heading -->
<?php echo $colorDiv; ?>
</div>
<div class="select_box4" id="size_radio">
<?php echo $scaleDiv; ?>
</div>
<div class="padding-0" style=" margin-top: 10px;">
<small id="stock_<?php echo $pId; ?>"></small>
<input type='hidden' id="hidden_stock_<?php echo $pId; ?>" />
</div>
</div>

<?php } 

$functions->require_once_custom('Class.myKlarna.php');
$klarnaClass    =   new myKlarna();
$klarnaSecrets  =   $klarnaClass->klarnaSharedSecret();
$eid            =   $klarnaSecrets['eId'];
$sharedSecret   =   $klarnaSecrets['sharedSecret'];

?>

<div style="height:54px;" class="klarna-widget klarna-part-payment" data-eid="<?php echo $eid; ?>" data-locale="<?php echo str_replace(" - ","_ ",$klarnaClass->locale); ?>" data-price="<?php echo $priceDeal; ?>" data-layout="pale-v2">

</div>


<div class="col_payment">
<?php    
$box17 = $webClass->getBox('box17');

echo $box17['text'];
    ?>
    
    
<!--<div class="col_payment_box"> <span><img src="webImages/33.png" alt=""></span>-->
<!--<div class="col_payment_box_txt"> Fraktfrith over 1000 kr </div>-->

<!--</div>-->

<!--<div class="col_payment_box"> <span><img src="webImages/23.jpg" alt=""></span>-->
<!--<div class="col_payment_box_txt"> Gratis Storleksbyten </div>-->

<!--</div>-->

<!--<div class="col_payment_box"> <span><img src="webImages/24.jpg" alt=""></span>-->
<!--<div class="col_payment_box_txt"> Fraktfrith over 1000 kr </div>-->

<!--</div>-->

<!--<div class="col_payment_box"> <span><img src="webImages/25.jpg" alt=""></span>-->
<!--<div class="col_payment_box_txt"> Fraktfrith over 1000 kr </div>-->

<!--</div>-->




</div>
<!-- col_payment close -->
<script async src="https://cdn.klarna.com/1.0/code/client/all.js"></script>

<div class="fashion_quentity_side">
<div class="inside_quentity">
<form id='myform' method='POST' action='#'>
<input type="number" placeholder="1" name="quantity" min="1" value="1" class='qty addByQty_<?php echo $dealId;?>'>
<input type='hidden' value='1' class='addByQty_hidden_<?php echo $dealId; ?>' />
</form>
</div>
<!-- inside_quentity close -->


<?php

$cart_div = $custom_quantity_div = '';
if($functions->developer_setting('addQty_custome')=='1') {

$custom_quantity_div = "";

$cart_div = "<div class='fashion_btn_side AddToCart_{$dealId}'  onclick='dealProductAddToCart(this,$dealId);'> 
<a>
<span> <img src='".WEB_URL."/webImages/cart_btn.png' alt=''> </span>
{$_e['Add To Cart']}
</a> 
</div>";

} else {

$cart_div = "<div class='fashion_btn_side AddToCart_{$dealId}'  onclick='dealProductAddToCart(this,$dealId);'> 
<a>
<span> <img src='".WEB_URL."/webImages/cart_btn.png' alt=''> </span>
{$_e['Add To Cart']}
</a> 
</div>";
}

?>
<?php 
if($functions->developer_setting('addQty_custome')=='1') {
echo " {$custom_quantity_div} 
{$cart_div}";
} else {
echo "{$cart_div}";
}
?>

</div>
</div>
<!-- fashion_quentity_side close -->
</div>
<!-- pop_info_cart close -->
</div>
<!-- inside_cart_inner close -->
<!-- add_product_to_cart close -->
<div class="tabs_main_side">
<div id="tabs">
<ul>
<?php if(!empty($shortDesc) && $shortDesc != ''): ?>
<li><a href="#tabs-1"><?php echo $_e['DESCRIPTION']; ?></a></li>
<?php endif; ?>
</ul>
<?php if(!empty($shortDesc) && $shortDesc != ''): ?>
<div id="tabs-1" class="tabs_tab">
<div class="tabs_tab">
<h2><?php echo $_e['DESCRIPTION']; ?></h2>
<div class="tabs_text_side">
<?php echo $shortDesc; ?>
</div>
<!-- tabs_text_side close -->
</div>
<!-- tabs_tab close -->
</div>
<!-- tabs-1 close -->
<?php endif; ?>
</div>
<!-- tabs close -->
</div>
<!-- tabs_main_side close -->
</div>
<!-- col1_right close -->
<?php } ?>
</div>
<!-- index_content close -->


<script>
$(document).ready(function() {
$('.all4').owlCarousel({
loop: true,
navigation: true,
autoplay: true,
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

.add_product_to_cart {
    max-height: initial;
    min-height: initial;
}
.select_box4 {
    z-index: auto; 
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

<?php



echo $productClass->productSubscribeOnSale($pId);

echo $productClass->subscribed_on_stock_availability($pId);

echo $productClass->referToFriend($pId);



include_once(__DIR__ . "/footer.php"); 



?>