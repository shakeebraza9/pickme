<?php



if(isset($_GET['page'])){

    require_once(__DIR__ . "/classes/seo_ajax.class.php");

    $page=$_GET['page'];



    $ajax=new seo_ajax();

    switch($page){

        case 'deleteSeo':

            $ajax->deleteSeo();

        break;



    }

}

if(isset($_POST['is_slug_check']) && $_POST['is_slug_check'] == 'check'){
	require_once("../global.php");

    $inp_slugEnglish = $_POST['inp_slugEnglish'];
    $inp_slugSwedish = $_POST['inp_slugSwedish'];
    $inp_slugNorwegian = $_POST['inp_slugNorwegian'];
    $inp_slugFinnish = $_POST['inp_slugFinnish'];
    $inp_slugDanish = $_POST['inp_slugDanish'];
	$id = $_POST['id'];

// $sql = "SELECT `slug` FROM `seo_slug` WHERE `slug` = ? or `slug` = ? or `slug` = ? or `slug` = ? or `slug` = ? and seo_id != ? and slug !=''";
// $dbF->getRow($sql, array($inp_slugEnglish,$inp_slugSwedish,$inp_slugNorwegian,$inp_slugFinnish,$inp_slugDanish,$id));
// if($dbF->rowCount > 0){


$sql = "SELECT `slug` FROM `seo_slug` WHERE `slug` = ? and seo_id != ? and slug !=''";
$dbF->getRow($sql, array($inp_slugEnglish,$id));
if($dbF->rowCount > 0){
echo "00";
return false;
}


$sql = "SELECT `slug` FROM `seo_slug` WHERE `slug` = ? and seo_id != ? and slug !=''";
$dbF->getRow($sql, array($inp_slugSwedish,$id));
if($dbF->rowCount > 0){
echo "000";
return false;

}

$sql = "SELECT `slug` FROM `seo_slug` WHERE `slug` = ? and seo_id != ? and slug !=''";
$dbF->getRow($sql, array($inp_slugNorwegian,$id));
if($dbF->rowCount > 0){
echo "0000";
return false;

}

$sql = "SELECT `slug` FROM `seo_slug` WHERE `slug` = ? and seo_id != ? and slug !=''";
$dbF->getRow($sql, array($inp_slugFinnish,$id));
if($dbF->rowCount > 0){
echo "00000";
return false;

}

$sql = "SELECT `slug` FROM `seo_slug` WHERE `slug` = ? and seo_id != ? and slug !=''";
$dbF->getRow($sql, array($inp_slugDanish,$id));
if($dbF->rowCount > 0){
echo "000000";
return false;

}


// }
// else{
// echo 1;
// }
}



?>