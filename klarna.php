<?php include_once("global.php");
// Klarna Setting in ibms_setting table
//http://developers.klarna.com/en/at+php/kco-v2/checkout-api#cart-object-properties

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



 function bestSellerNewsletter(){
global $dbF,$productClass,$functions;
$sql = "SELECT pid FROM `order_product_info` where order_date >= DATE(NOW()) - INTERVAL 30 DAY GROUP BY pid ORDER BY `order_product_info`.`order_date` DESC";

$res = $dbF->getRows($sql);

// $res = ($res['pid']);

$temp = '<style type="text/css">

/*pop side*/

/*pop side*/

.pop_side {
.pop_content {
position: relative;
width: 45%;
padding-top: 20px;
text-align: center;
display: inline-block;
vertical-align: top;
margin-right: 2%;
}
}

.pop_side_top {
position: relative;
width: 100%;
border-bottom: 1px solid #e1e2e4;
padding-bottom: 15px;
}

.pop_side_top i {
font-size: 25px;
color: #42474b;
display: inline-block;
vertical-align: middle;
margin-right: 10px;
}

.number_side {
position: absolute;
right: 0px;
top: 0px;
font-size: 25px;
color: #42474b;
}

.number_side span {
font-size: 34px;
color: #42474b;
font-family: "ubuntubold";
display: inline-block;
vertical-align: top;
}

.pop_content {
position: relative;
width: 45%;
display: inline-block;
vetical-align: top;
margin-right: 2%;
text-align: center;
}

.pop_content:nth-child(even) {
margin-right: 0%;
}

.pop_img {
position: relative;
display: block;
width: 35%;
margin: 0 auto;
}

.pop_img img {
width: 100%;
}

.pop_slide {
position: relative;
width: 100%;
}

.pop_img1 {
position: relative;
width: 100%;
}

.pop_content_main {
display: inline-block;
vertical-align: middle;
width: 55%;
text-align: center;
margin: 15px 0px;
}

.pop_content_main_btn {
position: relative;
width: 215px;
text-align: center;
background: #42474b;
box-shadow: 5px 5px 0px #a2a6af;
border-radius: 5px 5px;
margin: 0 auto;
transition: .7s;
margin-bottom: 20px;
}

.pop_content_main_btn a {
display: block;
color: #ffffff;
font-size: 16px;
padding: 10px 0px;
}

.pop_content_main_btn:hover {
background: #7ebc41;
}

.selection_side {
position: relative;
width: 100%;
color: #42474b;
font-size: 16px;
}

.pop_content_main .select_box4 {
width: 215px;
}

.pop_content_main .select_box4 .dropdown_select dt a {
height: 42px !important;
line-height: 42px !important;
border: 1px solid #6b6f72 !important;
box-shadow: 3px 3px 0px #363b3f;
border-radius: 2px 2px;
background: #ffffff url(../webImages/arrow.png) no-repeat scroll right center;
}

.pop_price {
position: relative;
width: 100%;
color: #eb333d;
font-size: 30px;
text-align: center;
font-weight: bold;
}

.pop_price span {
color: #a0a9b0;
margin: 0px 5px;
display: block;
font-style: normal;
font-size: 16px;
text-decoration: line-through;
font-weight: normal;
font-family: sans-serif;
}

.button_side {
position: relative;
display: inline-block;
vertical-align: middle;
width: 100%;
margin-top: 5px;
}

.button_side1 {
position: relative;
display: inline-block;
vertical-align: top;
width: 45%;
background: #42474b;
padding: 10px 0px;
border-radius: 2px 2px;
text-align: center;
margin-right: 2%;
}

.button_side1 a {
display: block;
color: #ffffff;
font-size: 16px;
}

.button_side2 {
position: relative;
display: inline-block;
vertical-align: top;
width: 60%;
background: #7ebc41;
padding: 10px 0px;
border-radius: 2px 2px;
text-align: center;
}

.button_side2 a {
display: block;
color: #ffffff;
font-size: 16px;
}

.pop_btn {
position: absolute;
left: 0px;
top: 50%;
width: 100%;
z-index: 1;
}

.pop_btn1 {
position: absolute;
left: 1%;
width: 16px;
height: 28px;
background: url(../webImages/news_left1.png);
cursor: pointer;
}

.pop_btn2 {
position: absolute;
right: 1%;
width: 16px;
height: 28px;
background: url(../webImages/news_right1.png);
cursor: pointer;
}

.pop_close {
position: absolute;
right: 10px;
top: 10px;
cursor: pointer;
font-size: 25px;
}


/*pop side*/
</style>

<br><br>
';


foreach($res as $pId){


$id = $pId['pid'];


$pLink = WEB_URL.'/detail.php?pId='.$id;

$name=$productClass->productF->getProductName($id);
$img = $productClass->productF->productSpecialImage($id,'main');
$img    = $functions->resizeImage($img,'auto',160,false);
$price = $productClass->productF->productPrice($id);
$currencyId =   $price['propri_cur_id'];
$symbol     =   $productClass->productF->currencySymbol($currencyId);
$priceP =   $price['propri_price'];

$discount       =   $productClass->productF->productDiscount($id,$currencyId);
@$discountFormat=   $discount['discountFormat'];
@$discountP     =   $discount['discount'];

$discountPrice  =   $productClass->productF->discountPriceCalculation($priceP,$discount);
// $discountPrice  =   $SpecPrice;
// $newPrice       =   $priceP - $discountPrice;
$newPrice       =   $discountPrice;

$priceP         .= ' '.$symbol;
$newPrice       .= ' '.$symbol;

if($newPrice    !=  $priceP){
$hasDiscount = true;
$oldPriceDiv = '<span class="oldPrice">'.$priceP.'</span>';
$newPriceDiv = $newPrice;
}else{
$oldPriceDiv= "";
$newPriceDiv = $priceP;
}

$buyToT = $dbF->hardWords('Buy To', false);

$temp .= "<div class='pop_content'>
<div class='pop_img'>
<div class='pop_img1'><img alt='' src='$img' /></div>
<!-- pop_img1 close --></div>
<!-- pop_img close -->

<div class='pop_content_main'>
<div class='selection_side'>$name</div>
<!-- selection_side close -->

<div class='pop_price'>
$newPriceDiv $oldPriceDiv
</div>
<!-- pop_price close -->

<div class='button_side'><!-- <div class='button_side1'><a href='".$pLink."'>No thanks !</a></div> --><!-- button_side1 close -->
<div class='button_side2'><a href='".$pLink."'>".$buyToT."</a></div>
<!-- button_side1 close --></div>
<!-- button_side close --></div>
<!-- pop_content_main close --></div>";

// $temp .= "
//     <div class='allProductInfo'>
//         <div class='pImg'>
//             <a href='".$pLink."'><img src='$img'/></a>
//         </div>
//         <div class='pName'>
//             <a href='".$pLink."'>$name
//                 <br>
//                    $oldPriceDiv $newPriceDiv
//             </a>
//         </div>
//       </div>
// ";

// return $pId;
}

// $this->dbF->prnt($temp);
// exit;
// 
return $temp;
}




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
            //  $cart = array();
            $x = array();
            $temp  = '';
            if($dbF->rowCount>0){
                $i = 0;

                foreach($orderProducts as $val){
               //   array_push($cart,$data_order);
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

                    $x[] = array(
                        'reference' => $ref,
                        'name'      =>  $name,
                        'quantity' => $itemQty,
                        'unit_price' => $price,
                       /* 'discount_rate' => $tempDis,*/
                        'tax_rate' => 2500
                    );
                }


                if($giftCard_payPrice>0) {
                    $x[] = array(
                        'type' => 'discount',
                        'reference' => 'Gift Card : ' . $giftCardId,
                        'name' => 'Gift Card',
                        'quantity' => 1,
                        'unit_price' => -$giftCard_payPrice,
                        'tax_rate' => 0
                    );
                }

                $three_for_two_cat     =   $orderInvoice['three_for_two_cat'];
                $three_for_two_cat = $three_for_two_cat*100;
                if($three_for_two_cat>0) {
                    $x[] = array(
                        'type' => 'discount',
                        'reference' => 'Three For Two Category',
                        'name' => 'Three For Two Category',
                        'quantity' => 1,
                        'unit_price' => -$three_for_two_cat,
                        'tax_rate' => 0
                    );
                }
                
                $staple_pro_cat     =   $orderInvoice['staple_pro_cat'];
                $staple_pro_cat = $staple_pro_cat*100;
                if($staple_pro_cat>0) {
                    $x[] = array(
                        'type' => 'discount',
                        'reference' => 'Bundle Category',
                        'name' => 'Bundle Category Category',
                        'quantity' => 1,
                        'unit_price' => -$staple_pro_cat,
                        'tax_rate' => 0
                    );
                }

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
                    'tax_rate' => 2500
                );
            }

            $cart = $x;
            //var_dump($x);
            /*$cart = array(
                    array(
                        'reference' => '123456789',
                        'name' => 'Klarna t-shirt',
                        'quantity' => 1,
                        'unit_price' => 2169,
                        'discount_rate' => 0,
                        'tax_rate' => 0
                    )
            );
            echo"<pre>";print_r($cart);
            echo"</pre>";*/

            Klarna_Checkout_Order::$baseUri = $orderUrl;
            Klarna_Checkout_Order::$contentType
                = "application/vnd.klarna.checkout.aggregated-order-v2+json";

            /*session_start();*/

            $connector = Klarna_Checkout_Connector::create($sharedSecret);

            $order = null;
            if (array_key_exists('klarna_checkout', $_SESSION)) {
                // Resume session
                $order = new Klarna_Checkout_Order(
                    $connector,
                    $_SESSION['klarna_checkout']
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
                    unset($_SESSION['klarna_checkout']);

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
                    = $webURL.'/klarna.php?action=success&inv='.$invoiceId.'&klarna_order='.$invoiceId;
                $create['merchant']['push_uri'] = $webURL.'/klarna.php?action=cancel&i='.$invoiceId.'&klarna_order='.$invoiceId;

                foreach ($cart as $item) {
                    $create['cart']['items'][] = $item;
                }


                //var_dump($cart);
                $order = new Klarna_Checkout_Order($connector);
                $order->create($create);
                $order->fetch();

            }

            // Store location of checkout session
            $_SESSION['klarna_checkout'] = $sessionId = $order->getLocation();

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
            
                $sql = "SELECT * FROM `order_invoice_product` WHERE order_invoice_id = '$invoiceId'";
            $orderProducts   =   $dbF->getRows($sql);
            
            
            $invoiceId=(trim($_GET['inv']));
            $status='success';
            $var = $dbF->hardWords('Thank you for your order.',false);
            echo "<h3 class='alert alert-success'>$var</h3>";
            if(!isset($_SESSION['klarna_checkout'])){
                break;
            }
            require_once 'src/Klarna/Checkout_Method/Checkout.php';

            Klarna_Checkout_Order::$contentType
                = "application/vnd.klarna.checkout.aggregated-order-v2+json";

            $connector = Klarna_Checkout_Connector::create($sharedSecret);

            $checkoutId = $_SESSION['klarna_checkout'];
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
                $update['status'] = 'created';
                $status='created';
                $update['merchant_reference'] = array(
                    'orderid1' => $invoiceId
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


            unset($_SESSION['klarna_checkout']);

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

// var_dump($array);
// var_dump("expressionqwe");
// die;

if($orderProducts > 0){
    
    
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


            if($productClass->webUserId()=='0'){
                createWebUserAccount
                ($orderUser,$invoiceId,'1',$order['billing_address']['given_name']." ".$order['billing_address']['family_name'] ,$order['billing_address']['email'],
                    array
                    ('gender'=>$order['customer']['gender'],
                      'type'=>$order['customer']['type'],
                      'date_of_birth'=>$order['customer']['date_of_birth'],
                    )
                );
            }

            $_GET['mailId'] = $invoiceId;
            $msg2 = include(__DIR__.'/orderMail.php');

            $host = $_SESSION['webUser']['currencyC'];

            $orderIdInvoice =   $host.$functions->ibms_setting('invoice_key_start_with').$invoiceId;
            $orderIdInvoice =   $dbF->hardWords('ORDERING',false)." ($orderIdInvoice)";
            $fromName       =   $functions->webName;

            $mailArray['fromName']    =   $fromName;


 $returnProArr = bestSellerNewsletter();
// var_dump($returnProArr);
// die;
$mailArray['best_selling_products_last_30_days'] =   $returnProArr;





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
                $extraMailArray['extraSalesOffer'] = $saleEmailContent;
                $functions->send_mail($order['billing_address']['email'],'','','extraSalesOffer','',$extraMailArray);
            }


if(isset($_SESSION['saleOffer_ai_id'])){
unset($_SESSION['saleOffer_ai_id']);
}




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
            $dbF->setRow($sql);
            $productClass->emptyCart();



//Deduct Stock qty
$functions->require_once_custom('orderOrder');
$orderInvoiceClass  =   new order();
$returnStatus = $orderInvoiceClass->stockAddAfterOrderStatusChange($invoiceId,false);
if($returnStatus===false){
// throw new Exception("");
// return false;
}



            
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





<!-- orderProducts -->






    <?php


     $sql1 = "SELECT * FROM `order_invoice_product` WHERE order_invoice_id = '$invoiceId'";
            $orderProducts1   =   $dbF->getRows($sql1);



             if($orderProducts1 > 0){


$invProductsi = array();
foreach ($orderProducts1 as $vali) {
$refi = $vali['order_pIds'];
$pArrayi     =   explode("-",$refi);
$pIdi        =   $pArrayi[0];

$invProductsi[] = $pIdi;
}

// var_dump($invProductsi);
$invProductsid = array();

for ($i=0; $i < count($invProductsi) ; $i++) { 

$sqli = "SELECT order_invoice_id FROM `order_invoice_product` WHERE order_pIds LIKE '$invProductsi[$i]-%-%-%-%'";
$data = $dbF->getRows($sqli);


foreach ($data as $key => $value) {

$invProductsid[] = $value['order_invoice_id'];

# code...
}




}

 $arr = array_merge($invProductsid,$invProductsid);
 $arr = array_unique($arr);
$arr=  array_slice($arr, 0, 150);
// $dbF->prnt(($arr));
$invProductsij = array();
for ($j=0; $j <count($arr) ; $j++) { 



$sqlii = "SELECT order_pIds FROM `order_invoice_product` WHERE order_invoice_id =?";
$datai = $dbF->getRows($sqlii,array($arr[$j]));

foreach ($datai as $vali) {
$refi = $vali['order_pIds'];
$pArrayi     =   explode("-",$refi);
$pIdi        =   $pArrayi[0];
$invProductsij[] = $pIdi;
 $arrs = array_merge($invProductsij,$invProductsij);



}




}

$idP= array_unique($arrs);
$idP= array_values($idP);



// $idP=  array_slice($idP, 0, 15);




$output = array_merge(array_diff($idP, $invProductsi), array_diff($invProductsi, $idP));

$idP=  array_slice($output, 0, 15);


// $dbF->prnt(($idP));


    } ?>

<div class="col3" style="margin-top: 10px;">
<div class="col3_top">  

<?php $dbF->hardWords('OTHER COSTUMER WHO BOUGHT AS YOU ALSO ORDERED THESE ITEMS');?>
    


</div>

<div class="col3_main">




<?php 

for ($i=0; $i < count($idP) ; $i++) { 
echo $productClass->invRelatedProducts($idP[$i],false,'Grid');
}


 ?>
</div>

</div>
<!-- col3 close -->


































    </div>

<?php
include("footer.php");}
?>