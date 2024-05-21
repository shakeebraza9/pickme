<?php

include("global.php");

global $webClass;

global $_e;

global $productClass;

$productClass->setProductSlug();



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

$_w['Add To Cart'] = '';

$_w['Add To Wishlist'] = '';

$_w['share'] = '';

$_w['Product Description'] = '';

$_e = $dbF->hardWordsMulti($_w, currentWebLanguage(), 'Web DealProduct');





$cat            = '0';

$dealId         = '0';

$currencyId     = $productClass->currentCurrencyId();

$currencySymbol = $productClass->currentCurrencySymbol();



if(isset($_GET['deal']) && $_GET['deal']!=''){

    $dealId     = $_GET['deal'];

    $sql        = "SELECT * FROM product_deal WHERE publish = '1' AND id = '$dealId' ";

    $dealData   = $dbF->getRow($sql);

    $price      = unserialize($dealData['price']);

    $price      = $price[$currencyId];



    $products   = $productClass->AllDealsPackage($dealId);



    if(!empty($products)){

        $products   = "<input type='hidden' id='packDealId' value='$dealId' /> <input type='hidden' id='packInfo' /> $products";



        $sql        = "SELECT * FROM product_deal_setting where deal_id = '$dealId' ";

        $dataSetting = $dbF->getRows($sql);

        $shortDesc  = $functions->findArrayFromSettingTable($dataSetting,'sDesc');

        $shortDesc  = translateFromSerialize($shortDesc);



        //Count deal no of view

        $productClass->productDealViewCount($dealId);

    }else{

        $shortDesc = '';

        $dealId= 0;

    }

    //specific deal select end

}else{

    //All Deals Products

    if(isset($_GET['cat']) && $_GET['cat']!='' || (isset($_GET['catId']) && $_GET['catId'] != '' )){

        //Product By category

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

            $products = $productClass->productDealsByCategory($cat, @$_GET['product']);

        }else{

            $products = $productClass->productDealsByCategory($cat, @$_GET['product'],false);

        }

    }else {

        $products = $productClass->AllProductDeals();

    }

}



if($products == "" || $products == false){

    //print error emssage

    $t          =   $_e["No Product Found"];

    $products   =   "<div class='alert alert-danger'>$t</div>";

}else{

    $products   =   "<div class='col3_main iHaveProducts'>$products</div>"; // using product ajax load on scroll

}

$products       =   "<input type='hidden' id='productPage' value='deal' />$products";



$heading = ""; // Page Heading

$heading = $_e['Products'];



@$arraySeo['title'] = $heading;

@$arraySeo['description'] = $shortDesc;

$productClass->productMetaSeo($arraySeo);



include("header.php");

$limit   =   $functions->ibms_setting('productLimit');

?>

<div class="index_content">
  <input type="hidden" style="display: none" id="queryLimit" data-id="<?php echo $limit; ?>" value="<?php echo $limit; ?>"/>
  <div class="col1_left">
      <?php $functions->includeOnceCustom('left_side_panel.php'); ?>
  </div>
  <!-- col1_left close -->
  <div class="col1_right">
      <?php $webClass->seoSpecial();  ?>
      <!-- col1_right_des close -->
      <div class="col3 col3_">
          
              <div class="col3_main_all">
            </div>
            
            
          <?php echo $products; ?>
      </div>
      <!-- col3 close -->
  </div>
  <!-- col1_right close -->
</div>
<!-- index_content close -->



<?php include("footer.php"); ?>