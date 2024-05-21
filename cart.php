<?php
//for direct cart submit use orderInvoice.php?ds
//first direct submit then all avaiable payment method will show, for checkout
// include("global.php");
global $dbF;
global $webClass;
global $productClass;
global $functions;

$msg             = $productClass->cartSubmit();
$cartReturnData  = $productClass->viewCartTable3();
@$cartReturn     = $cartReturnData['cart'];
@$sizeModal     = $cartReturnData['sizeModal'];
@$checkOutOffer  = $cartReturnData['offer'];


$cartReturnDataside  = $productClass->viewCartTable3Side();
@$cartReturnside     = $cartReturnDataside['cart'];


define('CART_PAGE', true);
include("header.php");

?>


<div class="inner_content">
<div class="standard">

<?php
if($msg!=''){
echo '<div class="inner_content_page_div futura_bk_bt">
<div class="cart2">

<div class="alert alert-info" role="alert">'.$msg.'</div>


</div><!--Cart2 end-->
</div>';
}
?>

<?php

if($cartReturn===false && $msg==''){
$var=$dbF->hardWords('No Items Found In Your Cart',false);
echo "


<div class='inner_content_page_div futura_bk_bt'>
<div class='cart2'>


<div id='EmptyCartView' class='alert alert-info'>$var</div>


</div><!--Cart2 end-->
</div>



";
}else{
?>



<div class="shopping_cart">
<ul>
<li class="active"><a href="#">SHOPPING CART</a></li>
<li><a href="#">CHECKOUT DETAILS</a></li>
<li><a href="#">ORDER COMPLETE</a></li>
</ul>
<div class="shopping_left" id="cart_items_container">
<div class="shopping_left_ul">
<ul>
<li><a href="#">PRODUCT</a></li>
<li><a href="#">PRICE</a></li>
<li><a href="#">QUANTITY</a></li>
<li><a href="#">TOTAL</a></li>
</ul>
</div><!-- shopping_left_ul close -->
<?php
echo $cartReturn;
?>
<div class="cart_button">
<a href="<?php echo WEB_URL ?>/products">← Continue shopping</a>
<a href="<?php echo WEB_URL ?>/cart">Update cart</a>
</div><!-- cart_button close -->
</div><!-- shopping_left close -->
<div class="shopping_right">
<h6>CART TOTALS</h6>
<?php
echo $cartReturnside;
?>
</div><!-- shopping_right close -->
</div><!-- shopping_cart close -->
<?php }    ?>












</div><!-- standard close -->


<div class="col8" style="display: none;">
<div class="standard">
<div class="col8_box">
<a href="#">
<div class="col8_box_img">
<img src="webImages/31.png" alt="">
</div><!-- col8_box_img close -->
<div class="col8_box_txt">
<span>FREE </span>SHIPPING*
</div><!-- col8_box_txt close -->
</a>
</div><!-- col8_box close -->
<div class="col8_box">
<a href="#">
<div class="col8_box_img">
<img src="webImages/32.png" alt="">
</div><!-- col8_box_img close -->
<div class="col8_box_txt">
<span>LOWEST </span> PRICE GUARANTEE
</div><!-- col8_box_txt close -->
</a>
</div><!-- col8_box close -->
<div class="col8_box">
<a href="#">
<div class="col8_box_img">
<img src="webImages/33.png" alt="">
</div><!-- col8_box_img close -->
<div class="col8_box_txt">
<span>EASY </span> RETURNS
</div><!-- col8_box_txt close -->
</a>
</div><!-- col8_box close -->
</div><!-- standard close -->
</div><!-- col8 close -->


<?php include("footer.php"); ?>