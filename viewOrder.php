<?php include("global.php");
global $webClass;
$login = $webClass->userLoginCheck();
$loginForOrder = $functions->developer_setting('loginForOrder');
if (!$login && $loginForOrder != '0') {
    header("Location: login.php");
    exit;
}
$userId = $webClass->webUserId();
if ($userId == '0') {
    $userId = webTempUserId(); // for all orders on temp user..
}

include("header.php");
require_once(__DIR__ . '/' . ADMIN_FOLDER . '/order/classes/order.php');
$orderC = new order();

if(isset($_GET['success'])){
    $functions->mail_success_msg();
}

?>

    <div class="container-fluid padding-0 inner_details_container">
        <div class="standard">
            <div class="home_links_heading h3 well well-sm"><?php

                if (!isset($_GET['view']) && !isset($_GET['editCustom'])) {
                    $dbF->hardWords('Order list');
                } else {
                    $dbF->hardWords('Order Invoice Information');
                }

                ?></div>
            <div class="inner_content_page_div container-fluid">
                <?php
                if (!isset($_GET['view']) && !isset($_GET['editCustom'])) {
                    //list of all orders
                    $orderC->invoiceListUser($userId);
                    echo "<br><hr><br>";
                }


                if (isset($_GET['view']) || isset($_GET['editCustom']) || isset($_GET['submit'])) {
                    //creating object of class.
                    $functions->getPage("viewOrder.php");
                    $viewOrder = new viewOrder();
                }

                if (isset($_GET['view'])) {
                    //view submit orders invoice
                    $viewOrder->viewOrder($_GET['view']);
                } else if (isset($_GET['editCustom'])) {
                    //edit custom measurement order.
                    echo $viewOrder->editCustomOrder($_GET['editCustom']);
                } else if (isset($_GET['submit'])) {
                    //custom form submit
                    $msg = $viewOrder->customFormSubmit();
                    if (!empty($msg)) {
                        $functions->jAlertifyAlert($msg);
                    }
                }

                ?>
            </div>
        </div>
    </div>


    <div class="modal fade" id="customF_vieworder" tabindex="1" role="dialog" aria-labelledby="customF_1047ModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="customF_1047ModalLabel">View Order</h4>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <?php $box = $webClass->getBox('box12'); ?>

                    <div class="vieworder_text" style="width:100%; text-align:center;">
                        <?php echo $box['text']; ?>
                    </div>


                    <div class="form-horizontal">

                        <label class="col-sm-2 col-md-3  control-label"></label>

                        <div class="col-sm-10  col-md-9" style="width: 100%;">
                            <label class="checkbox"><input type="checkbox" name="customSubmit_later_1047" value="1"
                                                           id="custom_check" class="btn btn-danger"> I ACCEPT</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-md-3  control-label"></label>

                    </div>
                </div>
                <div class="" style="margin:0 auto; text-align: center; margin-top: 10px;">
                    <input type="submit" name="submit" value="<?php echo $_e['Send To Factory']; ?>" id="custom_submit"
                           class="btn themeButton">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>