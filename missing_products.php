<?php include_once("global.php");
global $dbF,$con;

// $sql = "SELECT DISTINCT(`prodet_id`) FROM `proudct_detail`";
// $comProducts = $dbF->getRows($sql);

// foreach ($comProducts as $key => $value) {
// $newId = 'ss'.$value['prodet_id'];
// $sql_ch = "SELECT `prodet_id` FROM `proudct_detail` WHERE `prodet_id` = '$newId'";
// $res_ch = $con->getRow($sql_ch);

// if($con->rowCount > 0){

// }else{
// echo $value['prodet_id'].'<br>';
// }
// }
// $dbF->prnt($comProducts);


$sql = "SELECT * FROM `order_invoice_product` WHERE order_invoice_id = '53161'";
            $orderProducts   =   $dbF->getRows($sql);
$invProducts = array();
foreach ($orderProducts as $val) {
$ref = $val['order_pIds'];
$pArray     =   explode("-",$ref);
$pId        =   $pArray[0];

$invProducts[] = $pId;
}

$salesFeature = $functions->ibms_setting('salesFeature');

$saleUnS = unserialize($salesFeature);
// $dbF->prnt($saleUnS['cartAmount']);
// rsort($saleUnS['cartAmount']);

$cart_amnt = "768";

$productArray = array();
// $dbF->prnt($saleUnS['country']);
foreach ($saleUnS['cartAmount'] as $key => $value) {
if($cart_amnt >= $value && $saleUnS['country'][$key] == "20"){
// $dbF->prnt($saleUnS['products'][$key]);
foreach ($saleUnS['products'][$key] as $keyy => $valuee) {
if(!in_array($saleUnS['products'][$key][$keyy], $invProducts)){
$productArray[$saleUnS['products'][$key][$keyy]] = $saleUnS['price'][$key];
}  
} 
}else{
continue;
}
}

$dbF->prnt($productArray);





            if(!empty($productArray)){

                $extra_products = json_encode($productArray);



                // $validity = $functions->ibms_setting('saleOfferValidity');

                $validity_date = date('Y-m-d', strtotime("+7 days"));



                $sqlExtra = "INSERT INTO `extra_sales_products` (

                                `invoice_no`,

                                `products`,

                                `validity_date`

                                ) VALUES (?,?,?)";    

          $sqlRes = $dbF->setRow($sqlExtra, array($invoiceId,$extra_products,$validity_date));

            }        



