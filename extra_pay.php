<?php include_once("global.php");
// Klarna Setting in ibms_setting table
//http://developers.klarna.com/en/at+php/kco-v2/checkout-api#cart-object-properties


// https://sharkspeed.com/extra_pay?inv=SE70669&id=43

global $webClass,$db,$dbF,$functions;
global $productClass;
require_once 'src/Klarna/Checkout_Method/Checkout.php';

//Make Testing server false in klarna class because it is using some other place
$functions->require_once_custom('Class.myKlarna.php');
$klarnaClass    =   new myKlarna();
$klarnaSecrets  =   $klarnaClass->klarnaSharedSecret();
$eid            =   $klarnaSecrets['eId'];
$sharedSecret   =   $klarnaSecrets['sharedSecret'];
$orderUrl       =   $klarnaSecrets['url'];

/***********************************
    if($testingServer==true){
        //Testing Imedia Merchant eId
        $eid = '1173';
        //Shared secret
        $sharedSecret = '5zWdni3xNVcbAUN';
        //testing URL
        $orderUrl = "https://checkout.testdrive.klarna.com/checkout/orders";
        /**
         * test drive
         * Swedish consumer
            E-mail address: checkout-se@testdrive.klarna.com // 56b8a2dbd091c
            Postal code: 12345
            Personal identity number: 410321-9202
    }else{
        //Real Merchant Id
        //Also Change Klarna Id From order/classes/invoice.php
        $eid = '34266';
        //Shared secret
        $sharedSecret = 'ulPhDhler4beKLa';
        $orderUrl = "https://checkout.klarna.com/checkout/orders";
    }
***************************/


if(isset($_GET['inv'])){
    $invoiceId  =   $_GET['inv'];
}else{
    exit;
}

if(isset($_GET['id'])){
    $extraInvoiceId  =   $_GET['id'];
}else{
    exit;
}

$orderUser  = $productClass->webUserId();
if($orderUser=='0'){
    $orderUser = $productClass->webTempUserId();
}
$webURL  = WEB_URL;
if(isset($_GET['action'])){

}else{
    $_GET['action'] = 'process';
}


if(isset($_SESSION['extraInvoiceId']) && $_SESSION['extraInvoiceId']==$extraInvoiceId){

}else{
    unset($_SESSION['klarna_extra_checkout']);
}

$_SESSION['extraInvoiceId']      =   $extraInvoiceId;


if(!isset($_GET['ajax'])){include("header.php");?>
<!--Inner Container Starts Place Your Css Classes-->
<div class="inner_details_container container-fluid padding-0" id="inner_details_container">
<div class="inner_details_content">
<div class="home_links_heading border"><?php $dbF->hardWords('CHECK OUT');?></div>
<div class="inner_content_page_div futura_bk_bt">

<?php

}

$sql  = "SELECT * FROM `order_extra_amount` WHERE id = '$extraInvoiceId' AND orderStatus = 'inComplete' AND `paymentType` = 2";
$extraOrderInvoice   =   $dbF->getRow($sql);

$raw_invoice = $extraOrderInvoice['invoice_no'];
$sql1 = "SELECT `sender_email`,`sender_name`,`order_invoice_id` FROM `order_invoice_info` oii JOIN `order_invoice` oi WHERE oi.order_invoice_pk = oii.order_invoice_id AND oi.`invoice_id` = '$raw_invoice'";
$res1 = $dbF->getRow($sql1);

$sender_email = $res1['sender_email'];
$sender_name = $res1['sender_name'];
$invvv_id = $res1['order_invoice_id'];


if(isset($_GET['action'])){

    switch ($_GET['action']) {
        case 'process':      // Process and order...

?>
    <div class="text-center"><h3><?php $dbF->hardWords('Please wait for the checkout form below, your order is Processing.');?></h3></div>
            <?php

            if(empty($extraOrderInvoice)){
                $dbF->hardWords('You have already paid the extra amount.');
                exit;
            }

            $x = array();
            $temp  = '';

            $extraAmount = floatval($extraOrderInvoice['extra_amount'])*100;

            $x[] = array(
                'reference' => $extraInvoiceId,
                'name'      =>  'Extra Amount',
                'quantity' => 1,
                'unit_price' => $extraAmount,
               /* 'discount_rate' => $tempDis,*/
                'tax_rate' => 0
            );

            $cart = $x;

            Klarna_Checkout_Order::$baseUri = $orderUrl;
            Klarna_Checkout_Order::$contentType
                = "application/vnd.klarna.checkout.aggregated-order-v2+json";

            /*session_start();*/

            $connector = Klarna_Checkout_Connector::create($sharedSecret);

            $order = null;
            if (array_key_exists('klarna_extra_checkout', $_SESSION)) {
                // Resume session
                $order = new Klarna_Checkout_Order(
                    $connector,
                    $_SESSION['klarna_extra_checkout']
                );
                try {
                    $order->fetch();

                    // Reset cart
                    $update['cart']['items'] = array();
                    foreach ($cart as $item) {
                        $update['cart']['items'][] = $item;
                    }
                    $order->update($update);

                } catch (Exception $e) {
                    // Reset session
                    $order = null;
                    unset($_SESSION['klarna_extra_checkout']);

                }
            }

            if ($order == null) {
                // Start new session
                $create['purchase_country']     = $klarnaClass->purchase_country;
                $create['purchase_currency']    = $klarnaClass->purchase_currency;
                $create['locale']               = $klarnaClass->locale;
                $create['merchant']['id']       = $eid;
                $create['merchant']['terms_uri'] = $webURL.'/'.$db->dataPage.'kopvillkor';
                $create['merchant']['checkout_uri'] = $webURL.'/klarna.php';
                $create['merchant']['confirmation_uri']
                    = $webURL.'/extra_pay.php?action=success&inv='.$invoiceId.'&id='.$extraInvoiceId.'&klarna_order='.$invoiceId;
                $create['merchant']['push_uri'] = $webURL.'/extra_pay.php?action=cancel&i='.$invoiceId.'&id='.$extraInvoiceId.'&klarna_order='.$invoiceId;

                foreach ($cart as $item) {
                    $create['cart']['items'][] = $item;
                }


                //var_dump($cart);
                $order = new Klarna_Checkout_Order($connector);
                $order->create($create);
                $order->fetch();

            }

            // Store location of checkout session
            $_SESSION['klarna_extra_checkout'] = $sessionId = $order->getLocation();

            // Display checkout
            $snippet = $order['gui']['snippet'];
            // DESKTOP: Width of containing block shall be at least 750px
            // MOBILE: Width of containing block shall be 100% of browser window (No
            // padding or margin)
            echo "<div>{$snippet}</div>";
            ?>

            <?php

            break;

        case 'success':      // Order was successful...
            // The order Is Successfully completed.
            $invoiceId=(trim($_GET['inv']));
            $extraInvoiceId=(trim($_GET['id']));
            $status='success';
            $var = $dbF->hardWords('Thank you for your payment.',false);
            echo "<h3 class='alert alert-success'>$var</h3>";
            if(!isset($_SESSION['klarna_extra_checkout'])){
                break;
            }
            require_once 'src/Klarna/Checkout_Method/Checkout.php';

            Klarna_Checkout_Order::$contentType
                = "application/vnd.klarna.checkout.aggregated-order-v2+json";

            $connector = Klarna_Checkout_Connector::create($sharedSecret);

            $checkoutId = $_SESSION['klarna_extra_checkout'];
            $order = new Klarna_Checkout_Order($connector, $checkoutId);
            $order->fetch();

            if ($order['status'] == 'checkout_incomplete') {
                $status='canceled';
                $api    =   base64_encode(serialize($order));
                $info = "
                    Order Cancel From Client Side \n
                    Klarna Transaction Id : ".$order['id']."\n".
                    "Total Price Paid : ".(intval($order['cart']['total_price_including_tax'])/100)."\n".
                    "Total Tax Paid   : ".(intval($order['cart']['total_tax_amount'])/100);
                $inTransactionId    =$order['id'];
                @$rsv                =   $order['reservation'];
                $invoiceStatus  =    '0'; //cancel

                $payment_type_price =  $productClass->payment_additional_price("2",true); //2 for klarna
                $payment_type_price_sql = '';
                if($payment_type_price > 0){
                    $payment_type_price_sql = " , `extra_amount` = extra_amount+$payment_type_price ";
                }

                $inv_det = $productClass->getExtraInvoiceId($extraInvoiceId);
                $inv_id_log = $inv_det['invoice_no'];

                $sql = "UPDATE  `order_extra_amount` SET
                             invoice_status = '$invoiceStatus',
                             orderStatus = '$status',
                             apiReturn = '$api',
                             inTransaction  = '$inTransactionId',
                             paymentType = '2',
                             rsvNo     = '$rsv',
                             payment_info = '$info'
                             $payment_type_price_sql
                             WHERE id = 'extraInvoiceId' && invoice_no = '$invoiceId'";            
                $dbF->setRow($sql);
                // $productClass->emptyCart();
                break;
            }

            if ($order['status'] == "checkout_complete") {
                // At this point make sure the order is created in your system and send a
                // confirmation email to the customer
                $update['status'] = 'created';
                $status='created';
                $update['merchant_reference'] = array(
                    'orderid1' => $extraInvoiceId
                );
                $order->update($update);
            }

            $snippet = $order['gui']['snippet'];
            // DESKTOP: Width of containing block shall be at least 750px
            // MOBILE: Width of containing block shall be 100% of browser window (No
            // padding or margin)
            echo "<div>{$snippet}</div>";


          //PENDING
            //echo '<div style="text-align:center;"><a href="https://online.klarna.com/packslips/'.$order['id'].'.pdf" target="_blank"><h2>'.$order['status'].' DOWNLOAD PACKING SLIP</h2></a></div>';


            unset($_SESSION['klarna_extra_checkout']);

            echo '<hr />';

            $status='process';
            $api    =   base64_encode(serialize($order));
            $klarnaPayPrice = (intval($order['cart']['total_price_including_tax'])/100);
            $info = "Klarna Transaction Id : ".$order['id']."\n".
                "Total Price Paid : ".$klarnaPayPrice."\n".
                "Total Tax Paid   : ".(intval($order['cart']['total_tax_amount'])/100);
            $inTransactionId    =$order['id'];
            @$rsv                =   $order['reservation'];
            $invoiceStatus  =    '2'; //pending

            $payment_type_price =  $productClass->payment_additional_price("2",true); //2 for klarna
            $payment_type_price_sql = '';
            if($payment_type_price > 0){
                $payment_type_price_sql = " , `extra_amount` = extra_amount+$payment_type_price ";
            }
            
            $inv_det = $productClass->getExtraInvoiceId($extraInvoiceId);
            $inv_id_log = $inv_det['invoice_no'];
            $invTotalAmount = $inv_det['extra_amount'];

            $shipCountry = $inv_det['shippingCountry'];

                if($shipCountry == 'SE'){
                    $country = 20;
                }else if($shipCountry == 'NO'){
                    $country = 23;
                }
                else if($shipCountry == 'FI'){
                    $country = 25;
                }
                else if($shipCountry == 'DK'){
                    $country = 24;
                }

            $sql = "UPDATE  `order_extra_amount` SET
                             invoice_status = '$invoiceStatus',
                             orderStatus = '$status',
                             apiReturn = '$api',
                             inTransaction  = '$inTransactionId',
                             paymentType = '2',
                             rsvNo     = '$rsv',
                             payment_info = '$info'
                             $payment_type_price_sql
                             WHERE id = '$extraInvoiceId' && invoice_no = '$invoiceId'";

            $dbF->setRow($sql);
            $productClass->emptyCart();
            
            $log_desc = "Order created with following details:<br>$info";

            $productClass->orderlog("Order Created",'Invoice',$inv_id_log,$log_desc);

            $_GET['mailId'] = $invvv_id;
            $msg2 = include('orderMail.php');

            $orderIdInvoice =   $functions->ibms_setting('invoice_key_start_with').$invoiceId;
            $orderIdInvoice =   $dbF->hardWords('ORDERING',false)." ($orderIdInvoice)";
            $fromName       =   $functions->webName;

            $mailArray['fromName']    =   $fromName;
            $res = $functions->send_mail($sender_email,$orderIdInvoice,$msg2,'',$sender_name,$mailArray);

            // // Special offer send on invoice generate
            // $functions->send_mail($order['billing_address']['email'], "", "", 'todayOffer',$order['shipping_address']['given_name'], $mailArray);

            // if($order['billing_address']['email'] != $order['shipping_address']['email']){
            //     // if order billing and shipping email not same then send email on both.
            //     $mailArray['fromName']    =   $fromName;
            //     $functions->send_mail($order['shipping_address']['email'],$orderIdInvoice,$msg2,'',$order['billing_address']['given_name'],$mailArray);
            // }

            $adminMail = $functions->ibms_setting('Email');
            $functions->send_mail($adminMail,$orderIdInvoice,$msg2,'','',$mailArray);

            // if(!empty($productArray)){
            //     $saleEmailContent = $productClass->extraSalesProducts($invoiceId);
            //     $functions->send_mail($order['billing_address']['email'],$orderIdInvoice,$saleEmailContent,'','',$mailArray);
            // }

            break;

        case 'cancel':       // Order was canceled...

            // The order was canceled before being completed.
            $invoiceId=(trim($_GET['inv']));
            ?>
            <h3><?php $dbF->hardWords('The order was canceled.');?></h3>
            <?php
            $status='canceled';

            $api    =   base64_encode(serialize($order));
            $info   = "Klarna Transaction Id : ".$order['id']."\n".
                        "Total Price Paid : ".(intval($order['cart']['total_price_including_tax'])/100)."\n".
                        "Total Tax Paid   : ".(intval($order['cart']['total_tax_amount'])/100);
            $inTransactionId    =$order['id'];
            @$rsv                =   $order['reservation'];
            $invoiceStatus  =    '0'; //pending

            $payment_type_price =  $productClass->payment_additional_price("2",true); //2 for klarna
            $payment_type_price_sql = '';
            if($payment_type_price > 0){
                $payment_type_price_sql = " , `extra_amount` = extra_amount+$payment_type_price ";
            }

            $sql = "UPDATE  `order_extra_amount` SET
                             invoice_status = '$invoiceStatus',
                            orderStatus = '$status',
                             apiReturn = '$api',
                             inTransaction  = '$inTransactionId',
                             paymentType = '2',
                             rsvNo     = '$rsv',
                             payment_info = '$info'
                             $payment_type_price_sql
                             WHERE id = 'extraInvoiceId' && invoice_no = '$invoiceId'";
            $dbF->setRow($sql);
            // $productClass->emptyCart();

            break;
    } // Isser acction Ends Here

}

function createWebUserAccount($orderUser,$invoiceId,$status='1',$name,$email,$settingArray=array()){
    //$status = "1"; //pending 0 .. 1 active

    global $functions;
    global $webClass;
    global $dbF;

    $aLink = WEB_URL . "/login.php?";

    $sql = "SELECT * FROM accounts_user WHERE acc_email = '$email'";
    $accData    = $dbF->getRow($sql);
    $already = false;
    if($dbF->rowCount>0){
        $already = true;
        $lastId  =   $accData['acc_id'];
    }else{

    $today  = date("Y-m-d H:i:s");
    $unique =   uniqid();
    $password  =  $functions->encode($unique);

    $sql = "INSERT INTO accounts_user SET
                                acc_name = ?,
                                acc_email = ?,
                                acc_pass = ?,
                                acc_type = '$status',
                                acc_created = '$today'";
    $array = array($name,$email,$password);

    $dbF->setRow($sql,$array,false);
    $lastId = $dbF->rowLastId;

    $sql        =   "INSERT INTO `accounts_user_detail` (`id_user`,`setting_name`,`setting_val`) VALUES ";
    $arry       =   array();
    foreach($settingArray as $key=>$val){
        $sql .= "('$lastId',?,?) ,";
        $arry[]= $key ;
        $arry[]= $val ;
    }
    $sql = trim($sql,",");
    $dbF->setRow($sql,$arry,false);
    }

    $sql = "UPDATE  `order_invoice` SET
                            orderUser = '$lastId'
                             WHERE order_invoice_pk = '$invoiceId'";
    $dbF->setRow($sql,false);
    $sql = "UPDATE  `order_invoice_info` SET
                            sender_Id = '$lastId'
                             WHERE order_invoice_id = '$invoiceId'";
    $dbF->setRow($sql,false);

    $ThankWeSend = $dbF->hardWords('Thank you! We have sent verification email. Please check your email.',false);
    if($already){
        $password = $functions->decode($accData['acc_pass']);
        $mailArray['link']        =   $aLink;
        $mailArray['password']     =   $password;
        $functions->send_mail($email,'', '','accountCreateOnOrder','',$mailArray);
        return $msg = $ThankWeSend;
    }else{
        $mailArray['link']        =   $aLink;
        $mailArray['password']    =   $unique;
        $functions->send_mail($email,'', '','accountCreateOnOrder','',$mailArray);
        return $msg = $ThankWeSend;
    }


}
if(!isset($_GET['ajax'])){            ?>
</div>
    </div>
    </div>

<?php
include("footer.php");}
?>