<?php include_once("global.php");

// Klarna Setting in ibms_setting table

//http://developers.klarna.com/en/at+php/kco-v2/checkout-api#cart-object-properties



global $webClass,$db,$dbF,$functions;

global $productClass;

// require_once 'src/Klarna/Rest/Checkout/order.php';

// require_once 'src/Klarna/Rest/Resource.php';

require_once 'src/Klarna/vendor/autoload.php';



//Make Testing server false in klarna class because it is using some other place

$functions->require_once_custom('Class.myKlarna.php');

$klarnaClass    =   new myKlarna();

$klarnaSecrets  =   $klarnaClass->klarnaSharedSecret();

$eid            =   $klarnaSecrets['eId'];

$sharedSecret   =   $klarnaSecrets['sharedSecret'];

$orderUrl       =   $klarnaSecrets['url'];
$testEnv        =   $klarnaSecrets['test'];



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

$orderUser  = $productClass->webUserId();

if($orderUser=='0'){

    $orderUser = $productClass->webTempUserId();

}

$webURL  = WEB_URL;

if(isset($_GET['action'])){



}else{

    $_GET['action'] = 'process';

}





if(isset($_SESSION['invoiceId']) && $_SESSION['invoiceId']==$invoiceId){



}else{

    unset($_SESSION['klarna_checkout']);

}



$_SESSION['invoiceId']      =   $invoiceId;





if(!isset($_GET['ajax'])){include("header.php");?>

<!--Inner Container Starts Place Your Css Classes-->

<div class="inner_details_container container-fluid padding-0" id="inner_details_container">

<div class="inner_details_content">

<div class="home_links_heading border"><?php $dbF->hardWords('CHECK OUT');?></div>

<div class="inner_content_page_div futura_bk_bt">



<?php



}



$sql  = "SELECT * FROM `order_invoice` WHERE order_invoice_pk = '$invoiceId' AND orderUser = '$orderUser' AND orderStatus = 'inComplete'";

$orderInvoice   =   $dbF->getRow($sql);



//gift Card work...

$recordData     =   $productClass->productF->get_order_invoice_record($invoiceId,'giftCard');

$giftCard_payPrice = 0;

if($recordData  !=  false){

    $giftCardId     = $recordData['setting_val'];

    $giftCardNewPriceData = $productClass->giftCardNewPrice($giftCardId,$orderInvoice['total_price']);

    $giftCard_payPrice = $giftCardNewPriceData['payPrice'];

    $giftCard_payPrice = $giftCard_payPrice*100;

}



$sql = "SELECT * FROM `order_invoice_product` WHERE order_invoice_id = '$invoiceId'";

$orderProducts   =   $dbF->getRows($sql);



if(isset($_GET['action'])){



    switch ($_GET['action']) {

        case 'process':      // Process and order...

?>





    <div class="text-center"><h3><?php $dbF->hardWords('Please wait for the checkout form below, your order is Processing.');?></h3></div>

            <?php



            if(empty($orderInvoice)){

                $dbF->hardWords('Order Invoice Not Found. Please Refresh page And Try Again.');

                exit;

            }



            $sql = "SELECT * FROM `order_invoice_product` WHERE order_invoice_id = '$invoiceId'";

            $orderProducts   =   $dbF->getRows($sql);



            //$qry_order=mysql_query("SELECT invoice_number AS reference, order_pName AS name, order_qyt AS quantity, CAST(((order_pPrice+order_size_charge+order_add_price)*100) AS unsigned) AS unit_price,'0' AS tax_rate FROM `order` WHERE `invoice_number`='$invn' ");

            //	$cart = array();

            $x = array();

            $temp  = '';

            if($dbF->rowCount>0){

                $i = 0;

                $order_total_amnt = 0;

                $order_tax_amnt = 0;



                foreach($orderProducts as $val){

               //	array_push($cart,$data_order);

                    $ref = $val['order_pIds'];



                    //get color id, for get color name,

                    $pArray     =   explode("-",$ref); // 491-246-435-5 => p_ pid - scaleId - colorId - storeId;

                    $pId        =   $pArray[0]; // 491

                    $scaleId    =   $pArray[1]; // 426

                    $colorId    =   $pArray[2]; // 435

                    $storeId    =   $pArray[3]; // 5



                    $color      = "#".$productClass->productF->getColorName($colorId);

                    $name       = strip_tags(trim($val['order_pName']));

                    $name       = $name.$color;



                    $itemQty    = intval($val['order_pQty']);

                    $discount   = floatval($val['order_discount'])*100;



                    /*

                     * not using discount

                     * $price = intval(floatval($val['order_salePrice'])*100);



                    if($discount!='0' && $price > 0){

                        $tempDis = intval(($discount/$price)*10000);

                    }else{

                        $tempDis    = 0;

                    }*/



                    $price      = floatval($val['order_salePrice'])*100 - $discount;



                    /*$x[] = array(

                        'reference' => "invoice-12", // product id

                        'name' =>  "product",

                        'quantity' => 1,

                        'unit_price' => 10000, // price 100

                        'discount_price' => 1000, // discount 10% , now unit price is 90

                        'tax_rate' => 2500 // tax rate, include in unit price

                    );*/



                    $total_amount = $price*$itemQty;

                    $total_tax_amount = (int) $total_amount-(($total_amount*10000)/(2500+10000));



                    $x[] = array(

                        'reference' => $ref,

                        'name'      =>  $name,

                        'quantity' => $itemQty,

                        'unit_price' => $price,

                       /* 'discount_rate' => $tempDis,*/

                        'tax_rate' => 2500,

                        'total_amount' => $total_amount,

                        'total_tax_amount' => $total_tax_amount

                    );



                    $order_total_amnt += $total_amount;

                    $order_tax_amnt += $total_tax_amount;

                }





                if($giftCard_payPrice>0) {

                    $x[] = array(

                        'type' => 'gift_card',

                        'reference' => 'Gift Card : ' . $giftCardId,

                        'name' => 'Gift Card',

                        'quantity' => 1,

                        'unit_price' => -$giftCard_payPrice,

                        'tax_rate' => 0,

                        'total_amount' => -$giftCard_payPrice,

                        'total_tax_amount' => -0

                    );

                }



                $order_total_amnt -= $giftCard_payPrice;



                $three_for_two_cat     =   $orderInvoice['three_for_two_cat'];

                $three_for_two_cat = $three_for_two_cat*100;

                if($three_for_two_cat>0) {

                    $x[] = array(

                        'type' => 'discount',

                        'reference' => 'Three For Two Category',

                        'name' => 'Three For Two Category',

                        'quantity' => 1,

                        'unit_price' => -$three_for_two_cat,

                        'tax_rate' => 0,

                        'total_amount' => -$three_for_two_cat,

                        'total_tax_amount' => 0

                    );

                }



                $order_total_amnt -= $three_for_two_cat;

                

                $staple_pro_cat     =   $orderInvoice['staple_pro_cat'];

                $staple_pro_cat = $staple_pro_cat*100;

                if($staple_pro_cat>0) {

                    $x[] = array(

                        'type' => 'discount',

                        'reference' => 'Bundle Category',

                        'name' => 'Bundle Category Category',

                        'quantity' => 1,

                        'unit_price' => -$staple_pro_cat,

                        'tax_rate' => 0,

                        'total_amount' => -$staple_pro_cat,

                        'total_tax_amount' => 0

                    );

                }



                $order_total_amnt -= $staple_pro_cat;



                $shiping_price = intval(floatval($orderInvoice['ship_price'])*100);

                $payment_additional_price =  $productClass->payment_additional_price("2",true);

                if($payment_additional_price>0){

                    $payment_additional_price = $payment_additional_price*100;

                    $shiping_price += $payment_additional_price;

                }



                $x[] = array(

                    'type' => 'shipping_fee',

                    'reference' => 'SHIPPING',

                    'name' => 'Shipping Fee',

                    'quantity' => 1,

                    'unit_price' => $shiping_price,

                    'tax_rate' => 0,

                    'total_amount' => $shiping_price,

                    'total_tax_amount' => 0

                );



                $order_total_amnt += $shiping_price;

            }



            $cart = $x;



            /*session_start();*/



            $connector = Klarna\Rest\Transport\Connector::create(

                $eid,

                $sharedSecret,

                $orderUrl

            );



            $checkout = new Klarna\Rest\Checkout\Order($connector);



            $order = null;

            if (array_key_exists('klarna_checkout', $_SESSION)) {

                // Resume session

                $order = new Klarna\Rest\Checkout\Order(

                    $connector,

                    $_SESSION['klarna_checkout']

                );

                try {

                    $order->fetch();



                    // Reset cart

                    // $update['cart']['items'] = array();

                    // foreach ($cart as $item) {

                    //     $update['cart']['items'][] = $item;

                    // }

                    $order->update($cart);



                } catch (Exception $e) {

                    echo $e;

                    // Reset session

                    $order = null;

                    unset($_SESSION['klarna_checkout']);



                }

            }





            if ($order == null) {

                

                // Start new session

                $create['purchase_country']     = $klarnaClass->purchase_country;

                $create['purchase_currency']    = $klarnaClass->purchase_currency;

                $create['locale']               = $klarnaClass->locale;

                $create['order_amount'] = $order_total_amnt;

                $create['order_tax_amount'] = $order_tax_amnt;



                foreach ($cart as $item) {

                    $create['order_lines'][] = $item;

                }



                $create['merchant_urls']['id']       = $eid;

                $create['merchant_urls']['terms'] = $webURL.'/'.$db->dataPage.'kopvillkor';

                $create['merchant_urls']['checkout'] = $webURL.'/klarna.php';

                $create['merchant_urls']['confirmation']

                    = $webURL.'/klarna.php?action=success&inv='.$invoiceId.'&klarna_order='.$invoiceId;

                $create['merchant_urls']['push'] = $webURL.'/klarna.php?action=cancel&i='.$invoiceId.'&klarna_order='.$invoiceId;

                $create['html_snippet'] = "<div class='klarna_container'></div>";

                $create['merchant_reference1'] = $orderInvoice['invoice_id'];



                // $dbF->prnt($create);



                try{

                    //var_dump($cart);

                    $order = new Klarna\Rest\Checkout\Order($connector);

                    $order->create($create);

                    $order->fetch();

                }

                catch(Exception $e){

                    echo $e;

                }

            }



            // Store location of checkout session

            $_SESSION['klarna_checkout'] = $sessionId = $order['order_id'];



            // Display checkout

            $snippet = $order['html_snippet'];

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

            $status='success';

            $var = $dbF->hardWords('Thank you for your order.',false);

            echo "<h3 class='alert alert-success'>$var</h3>";

            if(!isset($_SESSION['klarna_checkout'])){

                break;

            }



            try{



            require_once 'src/Klarna/vendor/autoload.php';



            $connector = Klarna\Rest\Transport\Connector::create(

                $eid,

                $sharedSecret,

                $orderUrl

            );



            $checkoutId = $_SESSION['klarna_checkout'];



            $order = new Klarna\Rest\Checkout\Order($connector, $checkoutId);

            $order->fetch();



            $order_amount = $order['order_amount'];

            $order_tax_amount = $order['order_tax_amount'];

            $order_lines = $order['order_lines'];

            $order_id = $order['order_id'];



            // $dbF->prnt($order);



            }

            catch (Exception $e) {

                echo $e;

            }



            if ($order['status'] == 'checkout_incomplete') {

                $status='canceled';

                $api    =   base64_encode(json_encode($order));

                $info = "

                    Order Cancel From Client Side \n

                    Klarna Transaction Id : ".$order['order_id']."\n".

                    "Total Price Paid : ".(intval($order['order_amount'])/100)."\n".

                    "Total Tax Paid   : ".(intval($order['order_tax_amount'])/100);

                $inTransactionId    =$order['order_id'];

                // @$rsv                =   $order['reservation'];

                @$rsv                =   '';

                $invoiceStatus  =    '0'; //cancel



                $payment_type_price =  $productClass->payment_additional_price("2",true); //2 for klarna

                $payment_type_price_sql = '';

                if($payment_type_price > 0){

                    $payment_type_price_sql = " , `total_price` = total_price+$payment_type_price

                                            , `ship_price` = ship_price+$payment_type_price ";

                }



                $inv_det = $productClass->getInvoiceId($invoiceId);

                $inv_id_log = $inv_det['invoice_id'];



                $sql = "UPDATE  `order_invoice` SET

                             invoice_status = '$invoiceStatus',

                             orderStatus = '$status',

                             apiReturn = '$api',

                             inTransaction  = '$inTransactionId',

                             paymentType = '2',

                             rsvNo     = '$rsv',

                             payment_info = '$info'

                             $payment_type_price_sql

                             WHERE order_invoice_pk = '$invoiceId' && orderUser = '$orderUser'";

                $dbF->setRow($sql);

                $productClass->emptyCart();

                break;

            }



            if ($order['status'] == "checkout_complete") {

                // At this point make sure the order is created in your system and send a

                // confirmation email to the customer

                

                // $update['order_amount'] = $order_amount;

                // $update['order_tax_amount'] = $order_tax_amount;

                // $update['order_lines'] = $order_lines;

                 

                // $update['status'] = 'created';

                // $status='created';

                // $update['merchant_reference'] = array(

                //     'orderid1' => $invoiceId

                // );

                

                $order_ack = new Klarna\Rest\OrderManagement\Order($connector, $order_id);

                $order_ack->acknowledge();



                // $order->update($update);

                // 

                // $dbF->prnt($order);

            }







            $snippet = $order['html_snippet'];

            // DESKTOP: Width of containing block shall be at least 750px

            // MOBILE: Width of containing block shall be 100% of browser window (No

            // padding or margin)

            echo "<div>{$snippet}</div>";





          //PENDING

            //echo '<div style="text-align:center;"><a href="https://online.klarna.com/packslips/'.$order['id'].'.pdf" target="_blank"><h2>'.$order['status'].' DOWNLOAD PACKING SLIP</h2></a></div>';





            unset($_SESSION['klarna_checkout']);



            echo '<hr />';



            $status='process';

            $api    =   base64_encode(json_encode($order));

            $klarnaPayPrice = (intval($order_amount)/100);

            $info = "Klarna Transaction Id : ".$order['order_id']."\n".

                "Total Price Paid : ".$klarnaPayPrice."\n".

                "Total Tax Paid   : ".(intval($order_tax_amount)/100);

            $inTransactionId    =$order['order_id'];

            @$rsv                =   '';

            // @$rsv                =   $order['reservation'];

            $invoiceStatus  =    '2'; //pending



            //giftcard /....

            if($giftCard_payPrice>0){

                //now every thing is ok in giftcard,,

                $giftCard_payPrice = $giftCard_payPrice/100;

                $info = $productClass->updateGiftCard($giftCardId,$giftCard_payPrice,$invoiceId,$giftCardNewPriceData['data']['info']).$info;

            }



            $payment_type_price =  $productClass->payment_additional_price("2",true); //2 for klarna

            $payment_type_price_sql = '';

            if($payment_type_price > 0){

                $payment_type_price_sql = " , `total_price` = total_price+$payment_type_price

                                            , `ship_price` = ship_price+$payment_type_price ";

            }

            

            $inv_det = $productClass->getInvoiceId($invoiceId);

            $inv_id_log = $inv_det['invoice_id'];

            $invTotalAmount = $inv_det['total_price'];



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



            $sql = "UPDATE  `order_invoice` SET

                             invoice_status = '$invoiceStatus',

                             orderStatus = '$status',

                             apiReturn = '$api',

                             inTransaction  = '$inTransactionId',

                             paymentType = '2',

                             rsvNo     = '$rsv',

                             payment_info = '$info'

                             $payment_type_price_sql

                             WHERE order_invoice_pk = '$invoiceId' && orderUser = '$orderUser'";

            // echo $sql;

            $dbF->setRow($sql);

            $productClass->emptyCart();

            

            $log_desc = "Order created with following details:<br>$info";



            $productClass->orderlog("Order Created",'Invoice',$inv_id_log,$log_desc);



            //Deduct Stock qty

            $functions->require_once_custom('orderInvoice');

            $orderInvoiceClass  =   new invoice();

            $returnStatus = $orderInvoiceClass->stockDeductFromOrder($invoiceId,false);

            if($returnStatus===false){

                // throw new Exception("");

                // return false;

            }





            # google analytics ecommerce

            $google_analytics_ecommerce = '<script>';

            $google_analytics_ecommerce .= $webClass->generate_google_analytics_ecommerce($invoiceId);

            $google_analytics_ecommerce .= 'ga(\'ecommerce:send\');';

            $google_analytics_ecommerce .= '</script>';

            echo $google_analytics_ecommerce;            



            //var_dump($order);

            // User Info Add

                    //first add order invoice,, addNewOrder();

                    $sql    =   "INSERT INTO `order_invoice_info`

                        (

                            `order_invoice_id`,



                            `sender_Id`,



                            `sender_name`,

                            `sender_phone`,

                            `sender_email`,

                            `sender_address`,

                            `sender_city`,

                            `sender_country`,

                            `sender_post`,



                            `receiver_name`,

                            `receiver_phone`,

                            `receiver_email`,

                            `receiver_address`,

                            `receiver_city`,

                            `receiver_country`,

                            `receiver_post`

                        )

                        VALUES (

                            ?, ?,

                            ?,?,?,?,?,?,?,

                            ?,?,?,?,?,?,?

                        )";

                    $array  =   array(

                        $invoiceId,$orderUser,

                        $order['billing_address']['given_name']." ".$order['billing_address']['family_name'],$order['billing_address']['phone'] ,

                        $order['billing_address']['email']  , $order['billing_address']['street_address']  ,

                        $order['billing_address']['city']  , $order['billing_address']['country'] ,

                        $order['billing_address']['postal_code'],



                        $order['shipping_address']['given_name']." ".$order['shipping_address']['family_name'] ,$order['shipping_address']['phone'] ,

                        $order['shipping_address']['email'] ,$order['shipping_address']['street_address'] ,

                        $order['shipping_address']['city'] ,$order['shipping_address']['country'],

                        $order['shipping_address']['postal_code']

                    );

                    $dbF->setRow($sql,$array,false);



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



            $cart_amnt = $invTotalAmount;



            $productArray = array();



            foreach ($saleUnS['cartAmount'] as $key => $value) {

                if($cart_amnt >= $value && $saleUnS['country'][$key] == $country){

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



            if(!empty($productArray)){

                $extra_products = json_encode($productArray);



                $validity = $functions->ibms_setting('saleOfferValidity');

                $validity_date = date('Y-m-d', strtotime("+".$validity." days"));



                $sqlExtra = "INSERT INTO `extra_sales_products` (

                                `invoice_no`,

                                `products`,

                                `validity_date`

                                ) VALUES (?,?,?)";    

                $sqlRes = $dbF->setRow($sqlExtra, array($invoiceId,$extra_products,$validity_date));

            }        



            // 'gender'=>$order['customer']['gender'],

            if($productClass->webUserId()=='0'){

                createWebUserAccount

                ($orderUser,$invoiceId,'1',$order['billing_address']['given_name']." ".$order['billing_address']['family_name'] ,$order['billing_address']['email'],

                    array

                    (

                      'date_of_birth'=>$order['customer']['date_of_birth'],

                    )

                );

            }



            $_GET['mailId'] = $invoiceId;

            $msg2 = include(__DIR__.'/orderMail.php');



            $orderIdInvoice =   $functions->ibms_setting('invoice_key_start_with').$invoiceId;

            $orderIdInvoice =   $dbF->hardWords('ORDERING',false)." ($orderIdInvoice)";

            $fromName       =   $functions->webName;



            $mailArray['fromName']    =   $fromName;

            $functions->send_mail($order['billing_address']['email'],$orderIdInvoice,$msg2,'',$order['shipping_address']['given_name'],$mailArray);



            // Special offer send on invoice generate

            $functions->send_mail($order['billing_address']['email'], "", "", 'todayOffer',$order['shipping_address']['given_name'], $mailArray);



            if($order['billing_address']['email'] != $order['shipping_address']['email']){

                // if order billing and shipping email not same then send email on both.

                $mailArray['fromName']    =   $fromName;

                $functions->send_mail($order['shipping_address']['email'],$orderIdInvoice,$msg2,'',$order['billing_address']['given_name'],$mailArray);

            }



            $adminMail = $functions->ibms_setting('Email');

            $functions->send_mail($adminMail,$orderIdInvoice,$msg2,'','',$mailArray);



            if(!empty($productArray)){

                $saleEmailContent = $productClass->extraSalesProducts($invoiceId);

                $functions->send_mail($order['billing_address']['email'],$orderIdInvoice,$saleEmailContent,'','',$mailArray);

            }



            break;



        case 'cancel':       // Order was canceled...



            // The order was canceled before being completed.

            $invoiceId=(trim($_GET['inv']));

            ?>

            <h3><?php $dbF->hardWords('The order was canceled.');?></h3>

            <?php

            $status='canceled';



            $order_amount = $order['order_amount'];

            $order_tax_amount = $order['order_tax_amount'];



            $api    =   json_encode($order);

            $info   = "Klarna Transaction Id : ".$order['order_id']."\n".

                        "Total Price Paid : ".(intval($order['order_amount'])/100)."\n".

                        "Total Tax Paid   : ".(intval($order['order_tax_amount'])/100);

            $inTransactionId    =$order['order_id'];

            // @$rsv                =   $order['reservation'];

            @$rsv                =   '';

            $invoiceStatus  =    '0'; //pending



            $payment_type_price =  $productClass->payment_additional_price("2",true); //2 for klarna

            $payment_type_price_sql = '';

            if($payment_type_price > 0){

                $payment_type_price_sql = " , `total_price` = total_price+$payment_type_price

                                            , `ship_price` = ship_price+$payment_type_price ";

            }



            $sql = "UPDATE  `order_invoice` SET

                             invoice_status = '$invoiceStatus',

                            orderStatus = '$status',

                             apiReturn = '$api',

                             inTransaction  = '$inTransactionId',

                             paymentType = '2',

                             rsvNo     = '$rsv',

                             payment_info = '$info'

                             $payment_type_price_sql

                             WHERE order_invoice_pk = '$invoiceId' && orderUser = '$orderUser'";

            echo $sql;

            $dbF->setRow($sql);



            $productClass->emptyCart();



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