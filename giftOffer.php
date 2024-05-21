<?php include_once("global.php");

global $webClass;

global $_e;

global $productClass;

global $seo;

global $menuClass;

global $con;



if(isset($_GET['invoice']) && $_GET['invoice']!=''){

// session_start();

    // $inv = base64_decode($_GET['invoice']);

    $inv = $functions->decode($_GET['invoice']);
    $_SESSION['freeGift_ai_id']=$_GET['invoice'];
    $products = $productClass->AllGiftProducts(@$inv);
    $getQtyss = $productClass->getQtyss(@$inv);

}

// echo $products;

// exit;





if($products == "" || $products == false || $getQtyss == false){

    //print error emssage

    // $t        = $_e["Link Expired"];
$t = $dbF->hardWords('Link Expired', false);
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

        <div class="col3_top"> 



<?php if($products == "" || $products == false || $getQtyss == false){

    //print error emssage

    // $t        = $_e["Link Expired"];
$t = $dbF->hardWords('Link Expired', false);
$products = "<div class='alert alert-danger'>$t</div>";



}else {
?>

            Maximum Add To Cart Products Limit is : <?php echo $getQtyss ?>

<?php
     // using product ajax load on scroll

}
 ?>


          </div>


        <div class="col3 col3_">
            <?php echo $products; ?>
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





