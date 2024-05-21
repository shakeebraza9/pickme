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
  <div class="inner_content">
                <div class="col9">
                    <div class="standard">
                        <div class="col9_left">
                            <h3>CATEGORY</h3>
                            <ul>
                             












<?php

 // echo $dataCheck['inner_lis'];



 ?>



 <?php

$sql = "SELECT * FROM categories WHERE under <> 0 and under = 1 ORDER BY sort ASC";



$info = $dbF->getRows($sql);
foreach ($info as $field) {
$innerUl = '';
$id = $field['id'];
$text = translateFromSerialize($field['name']);

$link = WEB_URL."/".$field['id'];

$sqlu = "SELECT * FROM categories WHERE  under = $id ORDER BY sort ASC";



$info2 = $dbF->getRows($sqlu);



if (!empty($info2)) {
$innerUl .= '<ul>';
foreach ($info2 as $val2) {

$id = $val2['id'];
$text2 = translateFromSerialize($val2['name']);

$link2 = WEB_URL."/".$val2['id'];


$innerUl .= '


<li><i class="fa fa-arrow-down" id="' . $id . '" aria-hidden="true"></i><a href="' . $link2 . '">

' . $text2 . '</a></li>




';
}
$innerUl .= "</ul><!--2nd array End-->";
}


echo '


<li><a href="' . $link . '"><i class="fa fa-arrow-right" id="' . $id . '" aria-hidden="true"></i>

' . $text . '</a>' . $innerUl . '</li>



';
}
?>



</ul>
                           <!--  <h3>PRICE</h3>
                            <div class="range_slider">
                                <input type="text" id="range" value="" name="range" /> </div> -->
                            <!-- range_slider close -->
                         

                           

                            <!-- color_side close -->
                            <h3>SORTING</h3>
                            <ul style="border: none;">

<?php echo $productClass->sortByProductNew(); ?>

                            </ul>
                        </div><!-- col9_left close -->
                        <div class="col9_right">
                       <!--      <div class="content_banner">
                                <a href="#">
                                    <img src="webImages/banners/4.jpg" alt="">
                                    <div class="banner_txt">
                                        <h1>Sale UPTO 50% OFF</h1>
                                        <h5>On All Products</h5>
                                    </div>
                                </a>
                            </div>
 -->


<?php 

// var_dump($_SERVER['REQUEST_URI']);

$explod = explode('/',$_SERVER['REQUEST_URI']);



//var_dump($explod[1]);

echo $webClass->seoBanner("/".$explod[1]); ?>


                            <!-- content_banner close -->
                            <div class="col9_main">
                                <?php echo $products ?>
                            </div><!-- col9_main close -->
                        </div><!-- col9_right close -->
                    </div><!-- standard close -->
                </div><!-- col9 close -->
            </div><!-- inner_content close -->


<?php include("footer.php"); ?>