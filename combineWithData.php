<?php 
include_once("global.php");

global $webClass;
global $_e;
global $productClass;
global $dbF;

$sql = "SELECT DISTINCT(`p_id`) FROM `product_setting`";
$productIds = $dbF->getRows($sql);

// $dbF->prnt($productIds);

$pid_ser = serialize(array("1210","1224","1205","1203"));

foreach ($productIds as $key => $value) {

	$array = array($pid_ser,$value['p_id']);
	
	$sql = "UPDATE `product_setting` SET `setting_val` = ? WHERE `setting_name` = 'combineWith' AND `p_id` = ?";
	$res = $dbF->setRow($sql,$array);
	
// 	$sql = "INSERT INTO `product_setting`(`p_id`,`setting_name`,`setting_val`) VALUES(?,?,?)";
// 	$res = $dbF->setRow($sql,$array);
}




 ?>