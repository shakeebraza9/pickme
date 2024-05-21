<?php
include_once(__DIR__.'/../global.php');

@$taskTime = $_GET['time'];
if(empty($taskTime)){
    exit;
}
if($taskTime=='test'){
    $email = "syeddak123@gmail.com";
    $functions->send_mail($email,"sharspeed testing cron","from cron task");
    exit;
}


if($taskTime=='ibms'){
// $email = "syeddak123@gmail.com";
// $functions->send_mail($email,"sharspeed testinddddg cron","from cron task");

dailySalesTriggerProduct();
orderThankYouMail();
in_stock_trigger();
notReturningCustomer();
header("Location:" . WEB_URL . "/myAdmin/-setting?page=IBMSSetting#auto");
exit;
}




switch($taskTime){
    case "daily":
            dailySalesTriggerProduct();
            orderThankYouMail();
            in_stock_trigger();
            notReturningCustomer();
            // freeGiftEmail();
            // userReviewMail();
            // checkoutMail1day();
            // checkoutMail2hr();
            //$productClass->updateRecommendView();
        break;
}




function freeGiftEmail(){
global $functions,$productClass,$dbF;
$cur_Date = date('Y-m-d');
$sql    = "SELECT txt_inv_id FROM free_gift_inv WHERE `validity_date` = $cur_Date";
$data   = $dbF->getRows($sql);
if ($dbF->rowCount > 0) {
foreach($data as $val){

$freeGiftEmailContent = $productClass->freeGiftProducts($val['txt_inv_id']);

$sqli    = "SELECT sender_email,sender_name FROM order_invoice_info WHERE `order_invoice_id` = ?";
$datai   = $dbF->getRow($sqli,array($val['txt_inv_id']));


$freeGiftextraMailArray['freeGiftProductsDiv'] = $freeGiftEmailContent;
$freeGiftextraMailArray['cusName'] = $datai['sender_name'];


$sqlj    = "SELECT invoice_date FROM order_invoice WHERE `order_invoice_pk` = ?";
$invoice_date   = $dbF->getRow($sqlj,array($val['txt_inv_id']));


$freeGiftextraMailArray['orDate'] = $invoice_date['invoice_date'];
$freeGiftextraMailArray['invoiceNumber'] = $val['txt_inv_id'];
$functions->send_mail($datai['sender_email'],'','','freeGiftProductsDiv','',$freeGiftextraMailArray);

echo "Free Gift Mail Execute Successfully <br>";
}
}
}





function dailySalesTriggerProduct(){
    global $functions,$productClass,$dbF;
    if($functions->developer_setting('salesTriggerMail') != '1'){
        return false;
    }

    $sql    = "SELECT DISTINCT (p_id) FROM  product_subscribe WHERE `type` = 'sale' ";
    $data   = $dbF->getRows($sql);

    foreach($data as $val){
        $pId    = $val['p_id'];
        $data2  = $productClass->productData($pId);
        if(empty($data2)){
            continue;
        }
        $currencyId = $productClass->currentCurrencyId();
        $discount   = $productClass->productF->productDiscount($pId, $currencyId);

        if(empty($discount)){
            continue;
        }

        $productClass->productF->productOnSaleTrigger($pId);
    }
    echo "Sales Trigger Mail Execute Successfully <br>";
}

function in_stock_trigger(){
    global $functions,$productClass,$dbF;
    if($functions->developer_setting('in_stock_email_subscription') != '1'){
        return false;
    }

    $sql    = "SELECT * FROM product_subscribe WHERE `type` = 'stock' GROUP BY p_id,color_id, scale_id, store_id";
    // SELECT `qty_product_id`, AVG(`qty_item`) FROM `product_inventory` GROUP BY `qty_product_id` // sample query to check stock status W/O any color,size check, TODO: use $getInfo = $productClass->inventoryReport($pId); for a proper report of size and color.
    $data   = $dbF->getRows($sql);

    foreach($data as $val){
        $pId         = $val['p_id'];
        $color_id    = $val['color_id'];
        $scale_id    = $val['scale_id'];
        $store_id    = $val['store_id'];


        $stockStatus    = $productClass->productF->productQTY($pId,$store_id,$scale_id,$color_id);
        # if not in stock then don't send email
        if( ! $stockStatus){
            continue;
        }
        //var_dump($store_id,$scale_id,$color_id);

        $productClass->productF->product_in_stock_trigger($pId,$store_id,$scale_id,$color_id);
    }
    echo "Product in stock E-mail executed successfully <br>";
}

function orderThankYouMail(){
    //send mail to customer who purchase 15 days ago order..
    global $functions,$productClass,$dbF;
    $date   = date('Y-m-d H:i:s',strtotime("-15 days"));

    $saleTriggerLetter = 'orderThankYouMail';
    //get letter id
    $sql    = "SELECT id FROM  email_letters WHERE `email_type` = '$saleTriggerLetter'";
    $dataLetter   = $dbF->getRow($sql);
    if(empty($dataLetter)){
        return false;
    }
    $letterId = $dataLetter['id'];

    //check is data has or not
    $sql    = "SELECT sender_name,sender_email,order_invoice_id
                FROM `order_invoice_info` WHERE order_invoice_id
                  IN (SELECT order_invoice_pk FROM `order_invoice`
                   WHERE invoice_date = '$date' ) GROUP BY order_invoice_id";
    $data   = $dbF->getRow($sql);
    if(empty($data)){
        return false;
    }

    $sql    =   "INSERT INTO email_letter_queue(`letter_id`,`grp`,`email_name`,`email_to`,`p_id`,`status` )
                    SELECT '$letterId','orderThankYouMail',sender_name,sender_email,order_invoice_id,'1'
                    FROM `order_invoice_info` WHERE order_invoice_id
                      IN (SELECT order_invoice_pk FROM `order_invoice`
                       WHERE invoice_date = '$date' ) GROUP BY order_invoice_id";
    $dbF->setRow($sql);
    if(!$dbF->rowCount){
        return false;
    }
    //run cron job
    $functions->cronJob();
    echo "order ThankYouMail Execute Successfully <br>";
}


function notReturningCustomer(){
    //send mail to customer who purchase 15 days ago order..
    global $functions,$productClass,$dbF;
    $date   = date('Y-m-d',strtotime("-60 days"));
    $date2   = date('Y-m-d',strtotime("-59 days"));

    $date = "2015-04-10";
    $date2 = "2015-04-11";
    $saleTriggerLetter = 'notReturningCustomer';
    //get letter id
    $sql    = "SELECT id FROM  email_letters WHERE `email_type` = '$saleTriggerLetter'";
    $dataLetter   = $dbF->getRow($sql);
    if(empty($dataLetter)){
        return false;
    }
    $letterId = $dataLetter['id'];

    //check is data has or not
    $sql    = "SELECT * FROM `order_invoice` where invoice_date >= '$date' AND invoice_date <= '$date2'
                      AND orderUser NOT IN
                    (SELECT orderUser FROM order_invoice WHERE  invoice_date > '$date2')";
    $data   = $dbF->getRow($sql);
    if(empty($data)){
        return false;
    }

   $sql    =   "INSERT INTO email_letter_queue(`letter_id`,`grp`,`email_name`,`email_to`,`p_id`,`status` )
                      SELECT '$letterId','notReturningCustomer',sender_name,sender_email,order_invoice_id,'1'
                      FROM `order_invoice_info` WHERE order_invoice_id
                        IN (
                          SELECT order_invoice_pk FROM `order_invoice` where invoice_date >= '$date' AND invoice_date <= '$date2'
                          AND orderUser NOT IN
                          (SELECT orderUser FROM order_invoice WHERE  invoice_date > '$date2')
                          ) GROUP BY order_invoice_id";
    $dbF->setRow($sql);
    if(!$dbF->rowCount){
        return false;
    }

    //run cron job
    $functions->cronJob();
    echo "not Returning Customer Execute Successfully <br>";
}



function userReviewMail(){
    //send mail to customer who purchase 7 days ago order..
    global $functions,$productClass,$dbF;
    $date   = date('Y-m-d H:i:s',strtotime("-7 days"));

    $userReviewMail = 'userReviewMail';
    //get letter id
    $sql    = "SELECT id FROM  email_letters WHERE `email_type` = '$userReviewMail'";
    $dataLetter   = $dbF->getRow($sql);
    if(empty($dataLetter)){
        return false;
    }
    $letterId = $dataLetter['id'];

    //check is data has or not
    // $sql    = "SELECT sender_name,sender_email,order_invoice_id
    //             FROM `order_invoice_info` WHERE order_invoice_id
    //               IN (SELECT order_invoice_pk FROM `order_invoice`
    //                WHERE invoice_date = '$date' ) GROUP BY order_invoice_id";
    // $data   = $dbF->getRow($sql);
    // if(empty($data)){
    //     return false;
    // }


   // WHERE paymentType != '0' and paymentType is not null


         $sql    = "SELECT order_invoice_pk FROM `order_invoice`
                 WHERE invoice_date = '$date' and paymentType != '0' and paymentType is not null";
    $data   = $dbF->getRow($sql);
    if(empty($data)){
        return false;
    }else{


$dataz = $data['order_invoice_pk'];

$sqls    = "SELECT order_pIds FROM `order_invoice_product`
WHERE order_invoice_id = '$dataz'";
$datass   = $dbF->getRow($sqls);
// if(empty($datass)){
// return false;
// }

// $order_pIds = $datass['order_pIds'];

$Ids = explode('-', $datass['order_pIds']);

$pId = $Ids[0];




  $sqlq    =   "INSERT INTO `email_letter_queue`
                        (
                            `letter_id`,`grp`,`p_id`,`status`
                        )
                        VALUES (
                            ?, ?,
                            ?,?
                        )";


                    $array  =   array(
                        $letterId,"userReviewMail",
                        $pId,"1"
                    );






// $sqlq    =   "INSERT INTO email_letter_queue(`letter_id`,`grp`,`p_id`,`status`)
// SELECT '$letterId','userReviewMail','$pId','1'
// FROM `order_invoice` WHERE invoice_date = '$date' and paymentType != '0' and paymentType is not null";


   $dbF->setRow($sqlq,$array,false);

    if(!$dbF->rowCount){
        return false;
    }







    }





// $sql    =   "INSERT INTO email_letter_queue(`letter_id`,`grp`,`email_name`,`email_to`,`p_id`,`status` )
// SELECT '$letterId','userReviewMail','sender_name','sender_email',order_invoice_id,'1'
// FROM `order_invoice_info` WHERE order_invoice_id
// IN (SELECT order_invoice_pk FROM `order_invoice`
// WHERE invoice_date = '$date' ) GROUP BY order_invoice_id";



   
    //run cron job
    $functions->cronJob();
    echo "order userReviewMail Execute Successfully <br>";
}

function checkoutMail(){
    //send mail to customer who purchase 7 days ago order..
    global $functions,$productClass,$dbF;
    $date   = date('Y-m-d H:i',strtotime("-1 days"));

    $checkoutMail = 'checkoutMail';
    //get letter id
    $sql    = "SELECT id FROM  email_letters WHERE `email_type` = '$checkoutMail'";
    $dataLetter   = $dbF->getRow($sql);
    if(empty($dataLetter)){
        return false;
    }
    $letterId = $dataLetter['id'];

    //check is data has or not
    $sql    = "SELECT sender_name,sender_email,order_invoice_id
                FROM `order_invoice_info` WHERE order_invoice_id
                  IN (SELECT order_invoice_pk FROM `order_invoice`
                   WHERE invoice_date = '$date' ) GROUP BY order_invoice_id";
    $data   = $dbF->getRow($sql);
    if(empty($data)){
        return false;
    }

$sql    =   "INSERT INTO email_letter_queue(`letter_id`,`grp`,`email_name`,`email_to`,`p_id`,`status` )
SELECT '$letterId','checkoutMail',sender_name,sender_email,order_invoice_id,'1'
FROM `order_invoice_info` WHERE order_invoice_id
IN (SELECT order_invoice_pk FROM `order_invoice`
WHERE invoice_date = '$date' ) GROUP BY order_invoice_id";



    $dbF->setRow($sql);
    if(!$dbF->rowCount){
        return false;
    }
    //run cron job
    $functions->cronJob();
    echo "order checkoutMail Execute Successfully <br>";
}
function checkoutMail1day(){
    //send mail to customer who purchase 7 days ago order..
    global $functions,$productClass,$dbF;
    $date   = date('Y-m-d H:i:s',strtotime("-1 days"));

    $checkoutMail = 'checkoutMail2';
    //get letter id
    $sql    = "SELECT id FROM  email_letters WHERE `email_type` = '$checkoutMail'";
    $dataLetter   = $dbF->getRow($sql);
    if(empty($dataLetter)){
        return false;
    }
    $letterId = $dataLetter['id'];

    //check is data has or not
      $sql    = "SELECT order_invoice_pk FROM `order_invoice`
                 WHERE invoice_date = '$date' and invoice_status = '1' ";
    $data   = $dbF->getRow($sql);
    if(empty($data)){
        return false;
    }



$sql    =   "INSERT INTO email_letter_queue(`letter_id`,`grp`,`p_id`,`status`)
SELECT '$letterId','checkoutMail2',order_invoice_pk,'1'
FROM `order_invoice` WHERE invoice_date = '$date' and invoice_status = '1'  ";






    $dbF->setRow($sql);
    if(!$dbF->rowCount){
        return false;
    }
    //run cron job
    $functions->cronJob();
    echo "order checkoutMail Execute Successfully <br>";
}


function checkoutMail2hr(){
    //send mail to customer who purchase 7 days ago order..
    global $functions,$productClass,$dbF;
    $date   = date('Y-m-d H:i:s',strtotime("-120 minutes"));

    $checkoutMail = 'checkoutMail1';
    //get letter id
    $sql    = "SELECT id FROM  email_letters WHERE `email_type` = '$checkoutMail'";
    $dataLetter   = $dbF->getRow($sql);
    if(empty($dataLetter)){
        return false;
    }
    $letterId = $dataLetter['id'];

    //check is data has or not
    $sql    = "SELECT order_invoice_pk FROM `order_invoice`
                 WHERE invoice_date = '$date' and invoice_status = '1' ";
    $data   = $dbF->getRow($sql);
    if(empty($data)){
        return false;
    }

$sql    =   "INSERT INTO email_letter_queue(`letter_id`,`grp`,`p_id`,`status`)
SELECT '$letterId','checkoutMail1',order_invoice_pk,'1'
FROM `order_invoice` WHERE invoice_date = '$date' and invoice_status = '1'  ";



    $dbF->setRow($sql);
    if(!$dbF->rowCount){
        return false;
    }
    //run cron job
    $functions->cronJob();
    echo "order checkoutMail Execute Successfully <br>";
}


?>