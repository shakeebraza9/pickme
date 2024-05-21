<?php
include_once("global.php");

global $webClass ,$dbF; 
global $productClass, $functions; 


ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
$productClass->orderSubmit();
$productClass->orderUpdate();
// $dbF->prnt($_POST); 
// echo 1;
// exit(); 
# used in header.php
define('ORDER_PAGE', TRUE);

// if ( isset($_GET['preview']) && $_GET['preview']=='1' ) {
// }


if (empty($msg)) {
    if (isset($_GET['ds'])) {
        //ds Direct Submit
        $msg = $productClass->cartSubmitForCheckOut(true); // first submit,
    } else {
        $msg = $productClass->cartSubmitForCheckOut(); // first submit,
    }
}

$invoiceId = false;
if (isset($_GET['inv'])) {
    $invoiceId = $_GET['inv'];
} else if ($productClass->orderLastInvoiceId != '0') {
    $invoiceId = $productClass->orderLastInvoiceId;
} else if (@$_SESSION['webUser']['lastInvoiceId'] !== false) {
    $invoiceId = @$_SESSION['webUser']['lastInvoiceId'];
} else {
    //exit;
}
$_SESSION['webUser']['lastInvoiceId'] = $invoiceId;
$login = false;
if ($webClass->userLoginCheck()) {
    $login = true;
}

# get number of items in invoice
$sql = "SELECT COUNT(*) FROM `order_invoice_product` WHERE `order_invoice_id` = '$invoiceId' ";
$total_order_products = $functions->dbF->getRows($sql);
$total_order_products = array_pop($total_order_products);


$cartReturned = $productClass->viewCheckOutProduct3($invoiceId);
@$cartReturn = $cartReturned['temp'];
@$cartCustomSizeModals = $cartReturned['sizeModal'];

$submit = $preview = $productClass->preview;
 $country = $productClass->currentCountry();
$box19 = $webClass->getBox("box19"); 
$bannerImg = $box19['image'];
$subHeading = 'Checkout';
// include("header.php");
$login = $webClass->userLoginCheck();
if (!$login) {
include("header_new.php");
}else{
include("dashboard_header.php");  
}
?>
    <script>
        $(document).ready(function () {
            id = <?php echo $invoiceId; ?>;
            history.pushState(null, "inv ", "?inv=" + id);
        });
    </script>
    <style>
.inner_details_container {
    background: #f0f2e5;
    padding: 30px 0;
    min-width: 450px;
}

.inner_details_content {
    background: #fff;
    padding: 0 10px;
}

.border {
    border-bottom: 1px solid #ddd;
}

.paymentOptions {
    display: inline-block;
    width: 100%;
}

.paymentOptions img {
    height: 22px;
}

.paymentOptions > div {
    min-height: 30px;
    padding: 5px 0;
    margin: 4px;
    text-align: left;
}

.detail_cart2{


    display: inline-block;
 
    vertical-align: middle;
    position: relative;
    margin-right: 10px;
}
.img_detail2 {


        display: inline-block;
    vertical-align: middle;
}
.info_cart2 {


        display: inline-block;
    vertical-align: middle;
}

.cart3 {
    padding: 10px; 
    display: block !important;
    /*background: #fff;*/
    width:calc(100% - 50px);
    max-width:1200px;
    margin: 20px auto;
    position: relative;
    overflow: hidden;
}
.cart3 {
    font-size: 50px;
}
.sub_3{
    font-size:1.6rem;
}
.paymentOptions > div {
    font-size: initial;
}
/*.fadeInLeft{*/
/*    font-size: 20px;*/
/*}*/
.head_cart {
    width:100%;
    position:relative;
    text-align:center;
}
.head_cart .items_cart {
    font-size:1.6rem;
    font-weight:700;
}
.cartFlex{
    width:100%;
    position:relative;
    display:flex;
    align-items:start;
    justify-content:space-between;
    margin-top:2rem;
}
.one_cart{
    width:60%;
    position:relative;
}
.one_cart .option1, .two_cart .summary2 {
    background:#272727;
    font-size:2.5rem;
    text-transform:uppercase;
    margin-bottom:1rem;
    padding:12px 6px;
    font-weight:700;
    color:#fff;
}
.sub_3, .sub_4{
    padding:12px 6px;
}
.area_form3, .sub_box34 {
    font-size:1.6rem;
    background:#fff;
    margin-bottom:1rem;
}
.area_form3 .radio.border{
    border:0 !important;
    padding:12px 6px;
    margin:2rem 0;
}
.area_form3 .radio label{
    font-size:1.6rem;
}

.button_area {
    display:flex;
    align-items:center;
    justify-content:end;
    padding:12px;
}
    
.two_cart{
    width:38%;
    position:relative;
}

.totalFlex{
    width:100%;
    position:relative;
    background:#272727;
    display:flex;
    align-items:center;
    justify-content:space-between;
}
.sub_font3, .sub_font4 .pGrandTotal{
    font-size:1.8rem;
    color:#fff;
    font-weight:700;
}



@media (max-width: 992px) {
    .cart3{
        width:100%;
    }
    .cartFlex {
        flex-wrap:wrap;
    }
    .one_cart, .two_cart{
        width:100%;
    }
    .two_cart{
        margin-top:2rem;
    }
}
@media (max-width: 768px) {
    .inner_details_content {
        min-width: 100%;
    }
}

    </style>
    <!--Inner Container Starts-->

    <div class="inner_content_page_div container-fluid cart3">


        <div class='content_cart' id='cartViewTable'>
            <div class='head_cart wow fadeInDown'><h1><?php echo $_e['CHECK OUT']; ?></h1>
            
            <div
                <?php //echo $total_order_products['COUNT(*)'] . ' ' . $_e['ITEM(s)'] ?>
                class='items_cart wow fadeInDown'>1<?php echo ' ' . $_e['ITEM(s)'] ?></div>
        </div>
            
        <div class="cartFlex">
                <div class='one_cart inline_block'>


                <div id="first_option" class='option1 option3 wow fadeInLeft'>1. <?php echo 'PAYMENT OPTION' ?>
                    <div class='d_tick' style="display:none"><img src='<?php echo WEB_URL ?>/images/d_tock.png' alt=''>
                    </div>
                </div>

                <?php if ($submit == false): ?>

                    <div class='area_form3 wow fadeInUp'>
                        <div style="display:none" class='bill_text'><?php echo $_e['Billing Country']; ?></div>

                        <input type='hidden' class='drop_drop' disabled='' readonly='' value='SWEDEN'>

                        <div style="display:none" class='method_type wow fadeInLeft'>
                            <?php echo $_e['Payment Type']; ?>
                        </div><!--method_type end-->


                        <?php if ($invoiceId !== false && $productClass->cartInvoice) {
                                echo "<input type='hidden' id='invoiceId' value='$invoiceId'/>";
                        ?>
                        <?php } ?>


                        <div class="paymentOptions">
                            <!--Credit Cart Option not develop now-->
                            <!--<div class="border radio">
                                        <label><input type="radio" name="paymentType" value="3" class="paymentOptionRadio"><?php /*echo $productClass->productF->paymentArrayFindWeb('3'); */
                            ?> </label>
                                        <img src="images/creditcard.png" class="pull-right"/>
                                        <div class="clearfix"></div>
                                    </div>-->

                            <?php
                            $AllowKlarna = false;
                            //check country , kalrna not allow in some country as a payment method
                            //allow in sweden, norway and Finland
                            if ($functions->developer_setting('klarna') == '1' && preg_match('@SE|NO|FI@', $country)) {
                                $AllowKlarna = true;
                                ?>
                                <!--Klarna Option-->
                                <div class="border radio">
                                    <!--<label><input type="radio" name="paymentType" value="2"-->
                                    <!--              class="paymentOptionRadio" checked="checked" -->
                                    <?php //echo $_e['Klarna = Faktura, Delbetalning, Kort & Internetbank'];-->
                                        // echo $productClass->productF->paymentArrayFindWeb('2');
                                   //echo $productClass->payment_additional_price("2");
                                        ?>
                                    <!--</label>-->
                                    <img src="images/klarna.png" class="pull-right"/>

                                    <div class="clearfix"></div>
                                </div>
                            <?php } ?>

                            <?php
                            $AllowPaypal = false;
                            //check country , payson not allow in some country as a payment method
                            if ($login && $functions->developer_setting('paypal') == '1') {
                                $AllowPaypal = false;
                                ?>
                                <!--PayPal Option-->
                                <div class="border radio">
                                    <!--<label><input type="radio" name="paymentType" value="1"-->
                                    <!--              class="paymentOptionRadio">-->
                                        <?php
                                            //echo $productClass->productF->paymentArrayFindWeb('1');
                                            //echo $productClass->payment_additional_price("1");
                                        ?>
                                    <!--</label>-->
                                    <img src="images/paypal.png" class="pull-right"/>

                                    <div class="clearfix"></div>
                                </div>
                            <?php } ?>

                            <?php
                            $AllowPayson = false;
                            //check country , payson not allow in some country as a payment method
                            //allow in denmark
                            if ($functions->developer_setting('payson') == '1' && isset($country)  &&  preg_match('@DK@', $country)) {
                                $AllowPayson = true;
                                ?>
                                <!--PayPal Option-->
                                <div class="border radio">
                                    <!--<label><input type="radio" name="paymentType" value="5"-->
                                    <!--              class="paymentOptionRadio">-->
                                        <?php
                                        // echo $productClass->productF->paymentArrayFindWeb('5');
                                        // echo $productClass->payment_additional_price("5");
                                        ?>

                                    <!--</label>-->
                                    <div class="clearfix"></div>
                                </div>
                            <?php } ?>

                            <?php
                            $AllowGoCardless = false;
                            //check country , payson not allow in some country as a payment method
                            //allow in denmark
                            // if ($functions->developer_setting('GoCardless') == '1' && preg_match('@GB@', $country)) {
                                $AllowGoCardless = true;
                                ?>
                                <!--PayPal Option-->
                                <!--<div class="border radio">-->
                                <!--    <label><input type="radio" name="paymentType" value="9"-->
                                <!--                  class="paymentOptionRadio">-->
                                        <?php
                                        //echo $productClass->productF->paymentArrayFindWeb('9');
                                        //echo $productClass->payment_additional_price("9");
                                        ?>

                                <!--    </label>-->
                                <!--    <div class="clearfix"></div>-->
                                <!--</div>-->
                            <?php //} ?>

                            <?php
                            //check country , cashOnDelivery not allow in some country as a payment method
                            // allow in sweden and norway
                            if (
                                ($login || $functions->ibms_setting('loginForOrder') == '0')
                                && $functions->developer_setting('cashOnDelivery') == '1' ) { ?>
                                <!--Cash on delivery Option-->
                                <div class="border radio">
                                    <label><input type="radio" name="paymentType" value="0"
                                                  class="paymentOptionRadio">
                                        <?php
                                        echo $productClass->productF->paymentArrayFindWeb('0');
                                        echo $productClass->payment_additional_price("0");
                                        ?>
                                    </label>

                                    <div class="clearfix"></div>
                                </div>
                                
                                
                            <?php } ?>








                        </div><!--paymentOssptions end-->


                        <div class='button_area wow fadeInLeft'>
                            <div class='req2'></div>
                            <button id="paymentOptionNext" value='<?php echo $_e['NEXT STEP']; ?>' class='btn_gradient'>
                                    <span class="start">Next Step</span>
                                    <span class="hover">Next Step</span>
                            </button>
                        </div><!--btn_area end-->

                    </div><!--area_form3 end-->

                <?php endif ?>


                <div id="second_option" class='option1 option wow fadeInLeft'>2. <?php echo $_e['DELIVERY']; ?>
                    <div class='d_tick' style="display:none"><img src='<?php echo WEB_URL ?>/images/d_tock.png' alt=''>
                    </div>
                </div>

                <?php if ($submit == false): ?>

                    <div id='cartContinue' class=''>
                        <?php
                        if ($productClass->cartInvoice && $AllowKlarna) {
                            $_GET['inv'] = $invoiceId;
                            $_GET['ajax'] = "a";
                            echo "<div class='klarna_container' ";
                            try {
                                include_once('klarna.php');
                            } catch (Exception $e) {

                            }
                            echo "</div";
                        }
                        ?>
                    </div>

                <?php endif ?>


                <div id="third_option" class='option1 option wow fadeInLeft'>3. <?php echo $_e['ORDER PREVIEW']; ?>
                    <div class='d_tick' style="display:none"><img src='<?php echo WEB_URL ?>/images/d_tock.png' alt=''>
                    </div>
                </div>

                <?php if ($submit):

                    if ($cartReturn === false && $msg == '') {
                        echo "<div id='EmptyCartView' class='alert alert-danger well-sm'>" . $dbF->hardWords('Error, Invoice Not Found Or You are not owner of this Invoice.', false) . "</div>";
                    } else {

                        $functions->mail_success_msg();

                        echo '<div class="alert alert-info" role="alert">';
                        if ($msg != '') {
                            echo $msg . ' ';
                        }

                         echo '<p style="font-size: 12px;"><a href="' . WEB_URL . '/invoicePrint?mailId='.$invoiceId.'&orderId='.hash("md5",$functions->encode($invoiceId)).'">'. $_e['Click to view your invoice OR'] . '</a><br><a href="' . WEB_URL . '/viewOrder">' . $_e['Click to view your previous orders OR'] . '</a><br>';
                        echo '<a href="' . WEB_URL . '/products">' . $_e['Continue Shopping'] . '</a>';
                        echo '</p></div>';

                        echo $cartReturn;
                        echo "<script>$('.one_cart').css('width','100%');</script>";



                        # google analytics ecommerce
                        $google_analytics_ecommerce = '<script>';
                        $google_analytics_ecommerce .= $webClass->generate_google_analytics_ecommerce($invoiceId);
                        $google_analytics_ecommerce .= 'ga(\'ecommerce:send\');';
                        $google_analytics_ecommerce .= '</script>';
                        echo $google_analytics_ecommerce;

                    }

                endif ?>

            </div><!--one_cart end-->

            <?php if ($submit == false): ?>

                <div class='two_cart cart_two inline_block wow fadeInUp'>
                    <div class='summary2'><?php echo $_e['SUMMARY']; ?></div>

                    <div class="sub_box34">
                        <div class="sub_3"><?php echo $_e['SUBTOTAL']; ?>
                            <!-- <img src='<?php echo WEB_URL ?>/images/question_mark.png' alt=''> -->
                            <div class="sub_4"><?php echo $subtotal . ' ' . $currencySymbol; ?></div>
                        </div>

                        <?php
                        ############ 3 For 2 Category START #########
                        global $three_for_2_minus_price;
                        $three_for_2_cat_div = '';
                        if($three_for_2_minus_price > 0){
                        $three_for_2_cat_div = "
                                <div class='sub_3'>".$_e['Three For Two Category']."
                                    <div class='sub_4'>$three_for_2_minus_price $currencySymbol</div>
                                </div>";
                        }
                        echo $three_for_2_cat_div;
                        ############ 3 For 2 Category END #########
                        ?>



<div class="sub_3" style="padding:0;">
<?php //echo $_e['ESTIMATED DELIVERY & HANDLING']; ?>
<div
class="sub_4"><?php //echo "<span class='pShippingPriceTemp' data-real='$shipPrice'>$shipPrice</span>" . ' ' . $currencySymbol; ?></div>



<div class='sub_box34 totalFlex'>
<div class='sub_3 sub_font3'><?php echo $_e['TOTAL']; ?></div>
<div
class='sub_4 sub_font4 '>
    
    <?php
    @$proId=$_POST['productId'];
    @$validity=$_POST['validity'];
    $sqll = "SELECT * FROM product_price_spb WHERE propri_prodet_id = '$proId'";
    $data = $dbF->getRow($sqll);
    @$grandTotal=$data['propri_price'];
    
    
    echo "<span class='pGrandTotal' data-total='$grandTotal'>€ $grandTotal </span>" . ' ' . $currencySymbol; ?></div>
</div><!--sub_box34 end-->
</div>




</div>

              

                   

                    <div class="cart2">
                        <?php
                        if ($msg != '') {
                            echo '<div class="alert alert-info" role="alert">' . $msg . '</div>';
                        }
                        ?>

                        <?php
                        if ($cartReturn === false && $msg == '') {
                            echo "<div id='EmptyCartView' class='alert alert-danger well-sm'>" . $dbF->hardWords('Error, Invoice Not Found Or You are not owner of this Invoice.', false) . "</div>";
                        } else {
                            echo $cartReturn;
                        }
                        ?>


                    </div>
                    <!--Cart2 end-->


                  

                </div><!--two_cart end-->
        </div>


            <?php endif ?>


        </div>   <!--content_cart end-->


        <?php echo $cartCustomSizeModals; ?>


    </div><!--inner_content_page_div end-->

<script>
    $(function() {
        // $('.lazy').lazy();
        // $('video').lazy();
    });
    <?php ############# INITIALIZING TOOLTIP JS ############### 
    // $(function () {
    // $('[data-toggle="tooltip"]').tooltip();
    // })
    ?>
</script>

<script>
    // $(document).ready(function() {
    // $(".u-vmenu").vmenuModule({
    // Speed: 200,
    // autostart: true,
    // autohide: true
    // });
    // });
    $(function() {
        $("#accordion1").accordion();
    });
</script>



<script>
    $('.sort_icons').click(function(event) {
        var a = $(this).data('id');

        if (a == 'Grid') {
            $('.col1_right').removeClass('col1_right_main');
            $('.col1_right').removeClass('col1_right_main1');
            $('.sort_icons1').addClass('active_btn');
            $('.sort_icons3').removeClass('active_btn');
        } else if (a == 'List') {
            $('.col1_right').addClass('col1_right_main');
            $('.col1_right').addClass('col1_right_main1');
            $('.sort_icons3').addClass('active_btn');
            $('.sort_icons1').removeClass('active_btn');
        }
    });

    $('#limit_sub').click(function(event) {
        var form = $('#from_limit').serialize();

        $.ajax({
                url: 'products.php?pro_limit=true',
                type: 'post',
                data: form,
            })
            .done(function(res) {
                location.reload();
            });


    });

    $('#limit_subMob').click(function(event) {
        var form = $('#from_limitMob').serialize();

        $.ajax({
                url: 'products.php?pro_limit=true',
                type: 'post',
                data: form,
            })
            .done(function(res) {
                location.reload();
            });


    });





    $('.productSortBy').change(function() {
        var val = $(this).val();
        $.ajax({
                url: 'products.php?pro_sort=true',
                type: 'post',
                data: {
                    sortBy: val
                },
            })
            .done(function(res) {
                location.reload();
            });
    });

    function priceFilter() {
        var minVal = $('#priceMin').val();
        var maxVal = $('#priceMax').val();

        var priceRange = [minVal, maxVal];
        var arraytoString = priceRange.toString();

        $.ajax({
                url: 'products.php?pri_range=true',
                type: 'post',
                data: {
                    'minVal': minVal,
                    'maxVal': maxVal
                },
            })
            .done(function(res) {
                location.reload();
            });
    }

    function priceFilterNew(abc) {
        // var minVal = $('#priceMin').val();
        // var maxVal = $('#priceMax').val();



        if (abc == "99") {

            var minVal = '1';
            var priceRange = [1, abc];

        } else if (abc == "150") {
            var minVal = '99';
            var priceRange = [99, abc];

        } else if (abc == "250") {
            var minVal = '150';
            var priceRange = [150, abc];

        } else if (abc == "500") {
            var minVal = '250';
            var priceRange = [250, abc];

        } else if (abc == "9999") {
            var minVal = '999';
            var priceRange = [999, abc];

        }



        // var priceRange = [minVal,maxVal];
        // var arraytoString = priceRange.toString();

        $.ajax({
                url: 'products.php?pri_range=true',
                type: 'post',
                data: {
                    'minVal': minVal,
                    'maxVal': abc
                },
            })
            .done(function(res) {
                // location.reload();









                var values = $(".txt_search1").val();
                // var idis = $(this).attr('id');


                // console.log(values+'klarna');
                $.ajax({
                    type: "POST",
                    url: "<?php echo WEB_URL; ?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
                    data: {
                        val: values
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        // $(".col3_main").hide();
                        // $(".col3_top").hide();
                        // $(".col5").hide();
                        // $(".col6").hide();
                        // $(".col1_right section").hide();
                        // $(".col1_right .container-fluid").hide();
                        // $(".add_to_cart_main_pic_slide").hide();
                        // $(".add_to_cart_main_pic_responsive").hide();
                        // $(".add_product_to_cart").hide();
                        // $(".tabs_main_side").hide();
                        // $(".col3_main").hide();
                        // $(".col2").hide();
                        $(".col3_main_all").html(data);
                        // console.log(data);
                        // linknew(values);
                    }
                });





            });
    }



    function priceFilterMob() {
        var minVal = $('#priceMins').val();
        var maxVal = $('#priceMaxs').val();

        var priceRange = [minVal, maxVal];
        var arraytoString = priceRange.toString();
        //console.log("Min Val: "+minVal+" MAx Val: "+maxVal);

        $.ajax({
                url: 'products.php?pri_range=true',
                type: 'post',
                data: {
                    'minVal': minVal,
                    'maxVal': maxVal
                },
            })
            .done(function(res) {
                location.reload();
            });

        //console.log("Array: "+arraytoString);
    }

    $('input[name=cb1]').change(function(event) {
        var form = $(this).val();
        var test = $(".checkboxDesk1:checked").map(function() {
            return this.value;
        }).get().join(',');

        // console.log(form);

        // console.log(test);


        // console.log("abcd");


        $.ajax({
                url: 'products.php?size_filter=true',
                type: 'post',
                data: {
                    'sizeArray': test
                },
            })
            .done(function(res) {
                // location.reload();
                // console.log("Doneeeeeeeeeeeeee");
                var values = $(".txt_search").val();
                // var idis = $(this).attr('id');


                // console.log(values+'klarna');
                $.ajax({
                    type: "POST",
                    url: "<?php echo WEB_URL; ?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
                    data: {
                        val: values
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        // $(".col3_main").hide();
                        // $(".col3_top").hide();
                        // $(".col5").hide();
                        // $(".col6").hide();
                        // $(".col1_right section").hide();
                        // $(".col1_right .container-fluid").hide();
                        // $(".add_to_cart_main_pic_slide").hide();
                        // $(".add_to_cart_main_pic_responsive").hide();
                        // $(".add_product_to_cart").hide();
                        // $(".tabs_main_side").hide();
                        // $(".col3_main").hide();
                        // $(".col2").hide();
                        $(".col3_main_all").html(data);
                        // console.log(data);
                        // linknew(values);
                        //  $(".txt_search").val(values);
                        $('.col7').parents(".col7_side_popup").removeClass("col7_side_popup_");
                    }
                });




            });


    });

    $('input[name=cb2]').change(function(event) {
        var test = $(".checkboxMob:checked").map(function() {
            return this.value;
        }).get().join(',');

        $.ajax({
                url: 'products.php?size_filter=true',
                type: 'post',
                data: {
                    'sizeArray': test
                },
            })
            .done(function(res) {
                location.reload();
            });


    });







    $('input[name=l2]').change(function(event) {
        var test = $(".add:checked").val();
        // console.log(test);

        $.ajax({
                url: 'products.php?pro_sort=true',
                type: 'post',
                data: {
                    sortBy: test
                },
            })
            .done(function(res) {
                // location.reload();



                var values = $(".txt_search").val();
                // var idis = $(this).attr('id');


                // console.log(values+'klarna');
                $.ajax({
                    type: "POST",
                    url: "<?php echo WEB_URL; ?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
                    data: {
                        val: values
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        // $(".col3_main").hide();
                        // $(".col3_top").hide();
                        // $(".col5").hide();
                        // $(".col6").hide();
                        // $(".col1_right section").hide();
                        // $(".col1_right .container-fluid").hide();
                        // $(".add_to_cart_main_pic_slide").hide();
                        // $(".add_to_cart_main_pic_responsive").hide();
                        // $(".add_product_to_cart").hide();
                        // $(".tabs_main_side").hide();
                        // $(".col3_main").hide();
                        // $(".col2").hide();
                        $(".col9_main").html(data);
                        // console.log(data);
                        // linknew(values);
                    }
                });





            });



    });




    $('input[name=l1]').change(function(event) {
        var test = $(".licheck:checked").val();


        window.location.replace('<?php echo  WEB_URL ?>/' + test);


        // console.log(test);
        // exit();

        // $.ajax({
        // url: 'products.php?size_filter=true',
        // type: 'post',
        // data: {'sizeArray' : test},s
        // })
        // .done(function(res) {
        // location.reload();
        // });


    });


    $('#btn_cart').on('click', function(e) {
        e.preventDefault();
        form = $('#denied_cart').serialize();

        var empt = $("#invEmail").val();

        if (empt == "" || empt == " ") {

            console.log(empt + 'sssssssssssssssssssss');
            jAlertifyAlert('<?php echo $dbF->hardWords('Please input a Value.'); ?>');


            return false;
        }




        $.ajax({
            url: 'ajax_call.php?page=cart_denied',
            type: 'post',
            data: form
        }).done(function(res) {
            // onPopupClose();
            if (res == '1') {
                $('#CheckoutSubscription').modal('toggle');
            } else {}
        });
    });









    $('.reset_btn').click(function(event) {

        $.ajax({
                url: 'products.php?unsetSession=true',
                type: 'post'
            })
            .done(function(res) {
                location.reload();
            });

    });

    $('.productSortByMob a').click(function(event) {
        var val = $(this).data('id');

        $.ajax({
                url: 'products.php?pro_sort=true',
                type: 'post',
                data: {
                    sortBy: val
                },
            })
            .done(function(res) {
                location.reload();
            });
    });




    $('.new li a').click(function(event) {
        var val = $(this).data('id');
        // console.log("11111112333333333333333");
        $.ajax({
                url: 'products.php?pro_sort=true',
                type: 'post',
                data: {
                    sortBy: val
                },
            })
            .done(function(res) {
                // location.reload();



                var values = $(".txt_search1").val();
                // var idis = $(this).attr('id');


                // console.log(values+'klarna');
                $.ajax({
                    type: "POST",
                    url: "<?php echo WEB_URL; ?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
                    data: {
                        val: values
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        // $(".col3_main").hide();
                        // $(".col3_top").hide();
                        // $(".col5").hide();
                        // $(".col6").hide();
                        // $(".col1_right section").hide();
                        // $(".col1_right .container-fluid").hide();
                        // $(".add_to_cart_main_pic_slide").hide();
                        // $(".add_to_cart_main_pic_responsive").hide();
                        // $(".add_product_to_cart").hide();
                        // $(".tabs_main_side").hide();
                        // $(".col3_main").hide();
                        // $(".col2").hide();
                        $(".col3_main_all").html(data);
                        // console.log(data);
                        // linknew(values);
                    }
                });





            });
    });




    $('.productPrices input').click(function(event) {
        var val = $(this).data('id');
        // console.log("ssssssssssssssssss");


        if (val == "99") {

            priceFilterNew('99');

        } else if (val == "150") {

            priceFilterNew('150');

        } else if (val == "250") {

            priceFilterNew('250');

        } else if (val == "500") {

            priceFilterNew('500');

        } else if (val == "9999") {

            priceFilterNew('9999');

        }

        // $.ajax({
        // url: 'products.php?pro_sort=true',
        // type: 'post',
        // data: {sortBy: val},
        // })
        // .done(function(res) {
        // location.reload();
        // });
    });


    $('.new2 li a').click(function(event) {
        var val = $(this).data('id');
        // console.log("yesssssssss333333333333333333ssssssssssssssssss");
        if (val == "99") {

            priceFilterNew('99');

        } else if (val == "150") {

            priceFilterNew('150');

        } else if (val == "250") {

            priceFilterNew('250');

        } else if (val == "500") {

            priceFilterNew('500');

        } else if (val == "9999") {

            priceFilterNew('9999');

        }

        // $.ajax({
        // url: 'products.php?pro_sort=true',
        // type: 'post',
        // data: {sortBy: val},
        // })
        // .done(function(res) {
        // location.reload();
        // });
    });




    $('.cart_txt').click(function(event) {

        location.replace('cart');


    });
    $('.mobil_size li a').click(function(event) {
        var form = $(this).data('id');


        var test = $(this).data('id');

        $.ajax({
                url: 'products.php?size_filter=true',
                type: 'post',
                data: {
                    'sizeArray': test
                },
            })
            .done(function(res) {



                var values = $(".txt_search1").val();
                // var idis = $(this).attr('id');


                // console.log(values+'klarna');
                $.ajax({
                    type: "POST",
                    url: "<?php echo WEB_URL; ?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
                    data: {
                        val: values
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        // $(".col3_main").hide();
                        // $(".col3_top").hide();
                        // $(".col5").hide();
                        // $(".col6").hide();
                        // $(".col1_right section").hide();
                        // $(".col1_right .container-fluid").hide();
                        // $(".add_to_cart_main_pic_slide").hide();
                        // $(".add_to_cart_main_pic_responsive").hide();
                        // $(".add_product_to_cart").hide();
                        // $(".tabs_main_side").hide();
                        // $(".col3_main").hide();
                        // $(".col2").hide();
                        $(".col3_main_all").html(data);
                        // console.log(data);
                        // linknew(values);


                    }
                });




            });
    });
</script>
<?php
$login = $webClass->userLoginCheck();
if (!$login) {
include("footer_new.php");
}else{
include("dashboard_footer.php");  
} 
// include("footer.php");  
?>