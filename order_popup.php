<?php
ob_start();
global $webClass, $productClass, $_e, $functions; 

$login = false;
if ($webClass->userLoginCheck()) {
$login = true;
}


$backT         = $this->dbF->hardWords('BACK TO SHOP', false); 
$shippT         = $this->dbF->hardWords('SHOPPING BAG', false); 



?>






<div class="index_content">
<div class="checkout_offer_main">
<div class="standard">
<div class="checkout_offer_left">
<div class="checkout_offer_left_top">
<div class="checkout_offer_left_top_btn backto"> <span><img src="webImages/news_left1.png" alt=""></span>
<h3><?php echo  $backT; ?></h3> </div>
<!-- checkout_offer_left_top_btn close -->
<div class="checkout_offer_left_top_btn_right">
<div class="search_side1"> <i class="fas fa-search"></i> </div>
<!-- search_side close -->
<?php $cartInfo = $productClass->cartInfo(true); ?>
<div class="checkout_btn1"> <?php echo $cartInfo['qty']; ?> </div>
<!-- checkout_btn close -->
</div>
<!-- checkout_offer_left_top_btn_right close -->
</div>
<!-- checkout_offer_left_top close -->
<h2><?php echo $shippT; ?></h2>



<div class="check_out_box" id="ordered_products_area">



<div class="check_out_box1">
<div class="check_out_box1_img"> <img src="webImages/ow_1.jpg" alt=""> </div>
<div class="check_out_box2">
<h3>STUDIO TOTAL</h3>
<h4>David Rollneck Black</h4>
<h3>SIZE</h3>
<div class="check_out_box2_txt"> X-Large <span>
<img src="webImages/20.jpg" alt="">
</span> </div>
<div class="check_out_box2_txt2"> QUANTITY <span>1</span> </div>
<div class="check_out_box2_price"> 299 SEK <span>(word 299 SEK)</span> </div>
</div>
</div>









</div>
<!-- check_out_box close -->


<div class="cart3a" id="ordered_prices">


</div>



        <?php # ADDITIONAL BOX
                $box = $webClass->getBox('box14');
            ?>
            
            <div class="content_1">
                <?php echo $box['heading']; ?>
            </div>
            <!-- content_1 close -->

            <div class="main_side_text">
                <?php echo $box['text']; ?>
            </div>
            <!-- main_side_text close -->


            

</div>
<!-- checkout_offer_left close -->
<div class="checkout_offer_right">



<div class="cart3 cart_set">

<div id="first_option" class="option1 option3 fadeInLeft">1. <?php echo _u($_e['Payment Option']) ?></div>

<div class="area_form3 fadeInUp">
<div  class="bill_text"><?php echo $_e['Billing Country']; ?></div>
<input type="hidden" class="drop_drop" disabled="" readonly="" value="SWEDEN">
<div  class="method_type fadeInLeft">
<?php echo $_e['Payment Type']; ?>
</div>
<!--method_type end-->


<?php 
// if ($productClass->cartInvoice) {
echo "<input type='hidden' id='invoiceId' value='" . $_GET['inv'] . "'/>";
// }
?>


<div class="paymentOptions">
<!--Credit Cart Option not develop now-->
<div class="border radio">
<label><input type="radio" name="paymentType" value="3" class="paymentOptionRadio"><?php echo $productClass->productF->paymentArrayFindWeb('3'); 
?> </label>
<img src="images/creditcard.png" class="pull-right"/>
<div class="clearfix"></div>
</div>

<?php

$country = $productClass->currentCountry();

$AllowKlarna = false;
//check country , kalrna not allow in some country as a payment method
//allow in sweden, norway and Finland
if ($functions->developer_setting('klarna') == '1' && preg_match('@SE|NO|FI@', $country)) {
$AllowKlarna = true;
?>
<!--Klarna Option-->
<div class="border radio">
<label><input type="radio" name="paymentType" value="2"
class="paymentOptionRadio" checked="checked" 
><?php echo $_e['Klarna = Faktura, Delbetalning, Kort & Internetbank'];
// echo $productClass->productF->paymentArrayFindWeb('2');
echo $productClass->payment_additional_price("2");
?>
</label>
<img src="images/klarna.png" class="pull-right"/>

<div class="clearfix"></div>
</div>

<style>
.cart_set {
/*display: none !important;*/
}
</style>

<?php } ?>

<?php
$AllowPaypal = false;
//check country , payson not allow in some country as a payment method
if (/* $login && */ $functions->developer_setting('paypal') == '1') {
$AllowPaypal = false;
?>
<!--PayPal Option-->
<div class="border radio">
<label><input type="radio" name="paymentType" value="1"
class="paymentOptionRadio">
<?php
echo $productClass->productF->paymentArrayFindWeb('1');
echo $productClass->payment_additional_price("1");
?>
</label>
<img src="images/paypal.png" class="pull-right"/>

<div class="clearfix"></div>
</div>
<?php } ?>

<?php
$AllowPayson = false;
//check country , payson not allow in some country as a payment method
//allow in denmark
 if ( $functions->developer_setting('payson') == '1' /* && preg_match('@DK@', $country)*/)   {
$AllowPayson = true;
?>
<!--PayPal Option-->
<div class="border radio">
<label><input type="radio" name="paymentType" value="5" id="payson_radio"
class="paymentOptionRadio" checked="checked">
<?php
echo $productClass->productF->paymentArrayFindWeb('5');
echo $productClass->payment_additional_price("5");
?>

</label>
<div class="clearfix"></div>
</div>
<?php } ?>

<?php
$cashOnDelivery = false;
//check country , cashOnDelivery not allow in some country as a payment method
// allow in sweden and norway
if (
($login || $functions->ibms_setting('loginForOrder') == '0')
&& $functions->developer_setting('cashOnDelivery') == '1'
&& preg_match('@SE|NO@', $country)
) { 
$cashOnDelivery = true;
?>
<!--Cash on delivery Option-->
<div class="border radio">
<label><input type="radio" name="paymentType" value="0"
class="paymentOptionRadio">
<?php
echo $productClass->productF->paymentArrayFindWeb('0');
echo $productClass->payment_additional_price("0");
?>
</label>

<div class="clearfix"></div>
</div>
<?php } ?>


</div><!--paymentOptions end-->


<div class="button_area fadeInLeft">

<?php if ( /*!preg_match('@SE@', $country) && */ $functions->developer_setting('paypal_nvp') == '1' ): ?>
<form method="post" action="process.php?paypal=checkout" id="paypal_form" >
<?php $_SESSION['paypal']['nvp']['invoiceId'] = $invoiceId; ?>
<input type="hidden" name="order" value="<?php echo $invoiceId; ?>" >
<span class="paypal-button-widget">
<button class="paypal-button paypal-style-checkout paypal-color-gold paypal-size-small paypal-shape-pill en_US" type="submit" >
<span class="paypal-button-logo"><img src="images/button_logo.svg"></span>
<span class="paypal-button-content"><img src="images/paypal.svg" alt="PayPal">
<span> Check out</span>
</span>
<br>
<span class="paypal-button-tag-content">The safer, easier way to pay</span>
</button>
</span>                      
</form>
<?php endif; ?>

<div class="req2"></div>
<input type="submit" id="paymentOptionNext" value="<?php echo $_e['NEXT STEP']; ?>" class="check_btn2">
</div>
<!--btn_area end-->
</div>
</div>


<style type="text/css">
<?php $functions->includeOnceCustom('css/paypal.css'); ?>
#paypal_form {
display: inline-block;
}
</style>


<!-- <h3>Din order Laddas upp i snabbkassan.Var god droj.</h3> -->

<div id='cartContinue' class='cart3old'>
<?php
// $_GET['inv'] = 6223;
$_GET['ajax'] = "a";
echo "<div class='klarna_container'> ";
try {

if ($AllowKlarna) {

if (isset($product_ajax_function)) {
$this->functions->includeOnceCustom('klarna.php');
} else {
$functions->includeOnceCustom('klarna.php');

}

}

// $this->includeOnceCustom('cartContinue.php');
// include_once('klarna.php');
// include_once('cartContinue.php');
} catch (Exception $e) {

}
echo "</div";
?>
</div>









</div>
<!-- checkout_offer_right close -->
</div>
<!-- standard close -->
</div>
<!-- checkout_offer_main close -->
</div>
<!-- index_content close -->


<?php 

if( isset($AllowKlarna) && $AllowKlarna == false && $AllowPaypal == false && $AllowPayson == false && $cashOnDelivery == false && $functions->developer_setting('paypal_nvp') == '1' ):

?>

<script>
$('#paymentOptionNext').on('click', function(event) {
event.preventDefault();
/* Act on the event */
$('button.paypal-button').click();
});
</script>

<?php endif; ?>

<?php 

if( isset($AllowPayson) && $AllowKlarna == false && $AllowPaypal == false && $AllowPayson == true && $cashOnDelivery == false && $functions->developer_setting('paypal_nvp') == '0' ):

?>

<script>
$(document).ready(function() {
if($('#payson_radio').is(':checked')) { 
$('#paymentOptionNext').click();
console.log('button clicked'); 
}



});





</script>
<style>

.main_side_content {
padding-top: 40px;
padding-bottom: 25px;
width: 100%;
background: #ffffff;
z-index: 9999;
position: absolute;
left: 0px;
top: 0px;
}
#page {
margin: 0px 0px !important;
padding: 0 0px 0px !important;
}
.content_2 .klarna_container .text-center {
text-align: left;
}
.main_side_content_inner {
display: inline-block;
vertical-align: top;
width: 30%;
margin-right: 4%;
padding: 10px;
}

.content_1 {
height: 40px;
width: 100%;
line-height: 40px;
color: #fff;
font-size: 13px;
background: #363636;
padding-left: 15px;
}

.main_side_text {
width: 100%;
margin-top: 20px;
padding-left: 15px;
}

.main_side_text_1 {
color: #000000;
text-shadow: 0px 0px #000;
font-size: 14px;
}

.main_side_text a {
display: block;
font-size: 14px;
color: #428bcb;
margin-top: 15px;
}

.main_side_text a:hover {
color: #e74c5e;
}

.box_1 {
width: 100%;
border: 1px solid #9eccf4;
background: #d5ebf6;
border-radius: 4px;
padding-left: 10px;
padding-top: 25px;
padding-bottom: 25px;
color: #000;
text-shadow: 0px 0px #000;
margin-top: 25px;
font-size: 15px;
}

.cart_2 {
position: relative;
width: 100%;
padding-top: 20px;
padding-left: 15px;
overflow: auto;
height: 470px;
}

.right_side_content1 {
width: 64%;
display: inline-block;
vertical-align: top;
}

.content_2 {
display: inline-block !important;
vertical-align: top !important;
width: 59%;
}
.cart_1_inner:last-child {
border-bottom: none !important;
}
.cart_1_inner_1 {
width: 25% !important;
display: inline-block !important;
vertical-align: top !important;
margin-right: 3% !important;
position: relative !important;
}

.cart_1_inner_1 a {
display: block;
}
.cart_1_inner_1 img {
width: 100%;
}
.cart_1_inner_2 {
display: inline-block;
vertical-align: top;
}

.cart_1_inner_2 h3 {
font-size: 13px;
color: #363636;
text-transform: uppercase;
text-align: left;
/* font-family: 'playfair_displayregular'; */
}

.cart3 {
padding: 10px !important;
display: block;
background: #fff !important;
max-width: 1200px !important;
margin: 0 auto !important;
position: relative;
}
.align {
width: 1349px;
margin: 0 auto !important;
position: relative !important;
}
.cart3 .sub_box34 {
width: 100%;
padding-top: 14px;
position: relative;
padding-bottom: 14px;
}
.cart3 .sub_3 {
font-family: 'Titillium Web', sans-serif;
color: #333333;
font-size: 12px;
display: inline-block;
font-weight: bold;
margin-top: 7px;
width: 100%;
}
.cart3 .sub_4 {
font-family: 'Titillium Web', sans-serif;
font-weight: 600;
font-size: 12px;
color: #333333;
text-align: right;
display: inline-block;
margin-top: 7px;
float: right;
clear: both;
min-width: 55px;
}
.cart3 .sub_font3 {
font-size: 20px !important;
width: auto !important;
}
.cart3 .sub_3 {
font-family: 'Titillium Web', sans-serif;
color: #333333;
font-size: 12px;
display: inline-block;
font-weight: bold;
margin-top: 7px;
width: 100%;
}
.cart3 .sub_font4 {
font-size: 20px;
width: auto;
color: #7ebc41;
}
.info_main {
margin-top: 0px;
}
</style>

<style>
.content_2 {
display: inline-block;
vertical-align: top;
width: 50%;
}
.cart_set {
padding: 0px;
}
.cart3 .option1 {
width: 100%;
min-height: 58px;
line-height: 58px;
padding-left: 20px;
background: #363636;
color: #fff;
font-family: 'Titillium Web', sans-serif;
font-size: 23px;
font-weight: 600;
position: relative;
}
.cart3 .bill_text {
color: #333333;
font-family: 'Titillium Web', sans-serif;
font-size: 13px;
font-weight: 600;
height: 37px;
overflow: hidden;
}
.cart3 .drop_drop {
border: 1px solid #c8c8c8;
box-shadow: 0px 2px 3px #c8c8c8;
background: rgba(244, 244, 244, 1);
background: -moz-linear-gradient(top, rgba(244, 244, 244, 1) 0%, rgba(242, 242, 242, 1) 19%, rgba(240, 240, 240, 1) 39%, rgba(239, 239, 239, 1) 65%, rgba(236, 236, 236, 1) 89%, rgba(236, 236, 236, 1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(244, 244, 244, 1)), color-stop(19%, rgba(242, 242, 242, 1)), color-stop(39%, rgba(240, 240, 240, 1)), color-stop(65%, rgba(239, 239, 239, 1)), color-stop(89%, rgba(236, 236, 236, 1)), color-stop(100%, rgba(236, 236, 236, 1)));
background: -webkit-linear-gradient(top, rgba(244, 244, 244, 1) 0%, rgba(242, 242, 242, 1) 19%, rgba(240, 240, 240, 1) 39%, rgba(239, 239, 239, 1) 65%, rgba(236, 236, 236, 1) 89%, rgba(236, 236, 236, 1) 100%);
background: -o-linear-gradient(top, rgba(244, 244, 244, 1) 0%, rgba(242, 242, 242, 1) 19%, rgba(240, 240, 240, 1) 39%, rgba(239, 239, 239, 1) 65%, rgba(236, 236, 236, 1) 89%, rgba(236, 236, 236, 1) 100%);
background: -ms-linear-gradient(top, rgba(244, 244, 244, 1) 0%, rgba(242, 242, 242, 1) 19%, rgba(240, 240, 240, 1) 39%, rgba(239, 239, 239, 1) 65%, rgba(236, 236, 236, 1) 89%, rgba(236, 236, 236, 1) 100%);
background: linear-gradient(to bottom, rgba(244, 244, 244, 1) 0%, rgba(242, 242, 242, 1) 19%, rgba(240, 240, 240, 1) 39%, rgba(239, 239, 239, 1) 65%, rgba(236, 236, 236, 1) 89%, rgba(236, 236, 236, 1) 100%);
filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#f4f4f4', endColorstr='#ececec', GradientType=0);
width: 169px;
color: #333333;
font-size: 13px;
font-family: 'Titillium Web', sans-serif;
padding-left: 9px;
height: 34px;
border-radius: 5px;
margin-top: 3%;
outline: 0;
transition: .7s;
-webkit-transition: .7s;
-moz-transition: .7s;
-o-transition: .7s;
}
.cart3 .method_type {
color: #333333;
font-family: 'Titillium Web', sans-serif;
font-weight: 600;
font-size: 18px;
/*margin-top: 7%;*/
margin-bottom: 1%;
}
.cart3 .button_area {
margin-top: 20px;
position: relative;
height: 76px;
}
.cart3 .req2 {
color: #333333;
font-size: 14px;
font-family: 'Titillium Web', sans-serif;
display: inline-block;
vertical-align: top;
text-shadow: 0 0 0 #333333;
width: 200px;
}
.cart3 .check_btn2 {
float: right;
clear: both;
display: inline-block;
vertical-align: top;
width: 165px;
border-radius: 5px;
height: 51px;
border: 1px solid transparent;
line-height: 51px;
text-align: center;
color: #fff;
font-size: 16px;
font-family: 'Titillium Web', sans-serif;
background: #7cbe35;
transition: .7s;
-webkit-transition: .7s;
-moz-transition: .7s;
-o-transition: .7s;
}

.modal{
z-index: 9999 !important;
}


</style>

<?php endif; ?>

<style>
.content_1 {
height: 40px;
width: 100%;
line-height: 40px;
color: #fff;
font-size: 13px;
background: #363636;
padding-left: 15px;
}

.main_side_text {
width: 100%;
margin-top: 20px;
padding-left: 15px;
}

</style>

<script>
    
    $('.backto').click(function(event) {
// console.log("ssssssssssssssssssssssssss99999999");
location.reload();

});


</script>

<?php

return ob_get_clean(); ?>