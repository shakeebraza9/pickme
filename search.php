<?php include("global.php");

global $webClass;

require_once(__DIR__ . '/_models/functions/webProduct_functions.php');

$productClass = new webProduct_functions();



$_GET['cat'] = $_GET['s'];

$products = $productClass->productAdvanceSearch();

$currencySymbol = $productClass->currentCurrencySymbol();

if($products == "" || $products == false){

//print error emssage

$t = $_e["No Product Found"];

$products = "<div class='alert alert-danger'>$t</div>";

}else {

$products = "<div class='col9_main iHaveProducts'>$products</div>"; // using product ajax load on scroll

}






if(isset($_GET['catId'])){



// var_dump("ssssssssssssssssssssss");

$catId = $_GET['catId'];

$_SESSION['catId']['abcd'] = $catId;

//echo "<h1>".$viewType."</h1>"; 



// $con->prnt($_SESSION);

}



if(isset($_GET['mycatBy']) && $_GET['mycatBy'] == 'true'){



// var_dump("ssssssssssssssssssssss");

$catId = $_GET['mycatBy'];

$_SESSION['catId']['abcd'] = $catId;

//echo "<h1>".$viewType."</h1>"; 



// $con->prnt($_SESSION);

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


if(isset($_SESSION['catId']['abcd'])){

unset($_SESSION['catId']['abcd']);

}
if(isset($_SESSION['mycatBy'])){

unset($_SESSION['mycatBy']);

}





}

// if(isset($_GET['cat']) && $_GET['cat']!='' || (isset($_GET['catId']) && $_GET['catId'] != '' )){

//Product By category



//  $dbF->prnt($_SESSION);





if(isset($_SESSION['catId']['abcd'])){

// unset($_SESSION['catId']['abcd']);



// var_dump("1");

}







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









$cat = '0';

if(isset($_GET['cat']) && $_GET['cat']!='') {

$cat = $_GET['cat'];

}



if(isset($_SESSION['catId']['abcd'])){

unset($_SESSION['catId']['abcd']);



// var_dump("1");

}



if(isset($_SESSION['mycatBy'])){

unset($_SESSION['mycatBy']);

}




$heading = "";

$catName =  $productClass->getCategoryName($cat);



$catnav = "";

$catnav  .= "<td><a href='".WEB_URL."/products' class='grow'>"._u($_e['Products'])." </a></td>";

if(isset($_GET['cat']) && $catName ==false) {

$heading = $dbF->hardWords($cat,false);

$catnav  .= "<td> / </td><td><a href='".WEB_URL."/products?cat=$_GET[cat]' class='grow'> "._u($heading)."</a></td>";

}elseif($catName===false){

$heading = $_e['Products'];

}

else{



$heading  = $catName;

$catnav  .= "<td> / </td><td><a href='".WEB_URL."/products?cat=$_GET[cat]' class='grow'> "._u($heading)."</a></td>";

}



if(isset($_GET['s'])){

$heading = $_GET['s'];

}



$heading = _u($heading);





//filter search labels

$searchLabelsT = $productClass->productAdvanceSearchLabels();

if($catName !== false && $cat!= '0'){

$searchLabelsT = $productClass->makeSearchLabel("cat",$catName).$searchLabelsT;

}

$searchLabels = '<div class="searchLabels">'.$searchLabelsT.'</div>';





include("header.php");

$limit = $functions->ibms_setting('productLimit');

?>


<input type="hidden" style="display: none" id="queryLimit" data-id="<?php echo $limit; ?>" value="<?php echo $limit; ?>"/>

<input type="hidden" style="display: none" id="viewType" value="<?php echo isset($_SESSION["viewType"]) ? (string) $_SESSION["viewType"] : $productClass->get_product_view();

?>"/>




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
                           
                        
                            <div class="col9_main">
                                <?php echo $products ?>
                            </div><!-- col9_main close -->
                        </div><!-- col9_right close -->
                    </div><!-- standard close -->
                </div><!-- col9 close -->
            </div><!-- inner_content close -->


<?php include("footer.php"); ?>
