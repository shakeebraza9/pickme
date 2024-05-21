<?php
ob_start();

require_once("classes/inventory.php");
$inventory = new inventory();

$inventory->quickAddQtySubmit();

if (isset($_GET['cleanInventory'])) {
    $inventory->cleanInventory();
}


?>
    <h4 class="sub_heading"><?php echo _uc($_e['Store Location']); ?></h4>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs tabs_arrow" role="tablist">
        <li class="active"><a href="#home" role="tab" data-toggle="tab"><?php echo _uc($_e['Product Inventory']); ?></a>
        </li>
        <li><a href="#AddMinimumStocktoNotify" role="tab" data-toggle="tab"><?php echo _uc($_e['Minimum Stock to Notify']); ?></a></li>
        <li><a href="#addQTY" role="tab" data-toggle="tab"><?php echo _uc($_e['Add Qty']); ?></a></li> 
        
        <li><a href="#removeQTY" role="tab" data-toggle="tab"><?php echo _uc($_e['Remove Qty']); ?></a></li>
        <li><a href="#quickQTY" role="tab" data-toggle="tab"><?php echo _uc($_e['Quick Add Qty']); ?></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <div class="tab-pane fade in active container-fluid" id="home" ng-app="inventory0"
             ng-controller="inventoryControll">
            <h2 class="tab_heading"><?php echo _uc($_e['View Product Stock Inventory']); ?></h2>
            <small><a href="-stock?page=inventory&cleanInventory"
                      class="btn btn-info btn-sm"><?php echo _n($_e['Stock Update if needed']); ?></a></small>
            <small>{{inventoryProducts}}</small>
            <?php $inventory->showProductInventory(); ?>
        </div>   

        <div class="tab-pane fade in active container-fluid" id="AddMinimumStocktoNotify" ng-app="inventory0"
             ng-controller="inventoryControll">
            <h2 class="tab_heading"><?php echo _uc($_e['Minimum Stock to Notify']); ?></h2>
           
          
            <?php $inventory->showProductInventory_min(); ?>
        </div>


        <div class="tab-pane fade container-fluid" id="addQTY">
            <h2 class="tab_heading"><?php echo _uc($_e['Add Quantity']); ?>
                <small>
                    <small> <?php echo _n($_e['This is not recommended, Please go to purchase Receipt and generate new Receipt']); ?></small>
                </small>
            </h2>
            <?php $inventory->addProductQty(); ?>
        </div> 

      

        <div class="tab-pane fade  container-fluid" id="removeQTY">
            <h2 class="tab_heading"><?php echo _uc($_e['Remove Quantity']); ?>
                <small>
                    <small> <?php echo _n($_e['This is not recommended, Please go to Invoice Receipt and generate new Receipt']); ?></small>
                </small>
            </h2>
            <?php $inventory->removeProductQty(); ?>
        </div>

        <div class="tab-pane fade  container-fluid" id="quickQTY">
            <h2 class="tab_heading"><?php echo _uc($_e['Quick Add Qty']); ?></h2>
            <?php $inventory->quickAddQty(); ?>
        </div>

    </div>

    <script>
        $(document).ready(function () {
            tableHoverClasses();
            dTableT(); //dataTable
        });
        function selectChange(ths) {
            tr = $(ths).closest('tr');
            pid = tr.attr('data-id');
            tr.find('select').attr('disabled', 'disabled');
            if (pid == undefined) return;

            storeid = tr.find('select.store').val();
            if (storeid == undefined) storeid = 0;

            scaleid = tr.find('select.scale').val();
            if (scaleid == undefined) scaleid = 0;

            colorid = tr.find('select.color').val();
            if (colorid == undefined) colorid = 0;

            countQTY(tr, pid, storeid, scaleid, colorid);
        }
        ;

        function countQTY(tr, pid, storeid, scaleid, colorid) {
            tr.find('.waiting').show();
            $.ajax({
                type: "POST",
                url: "stock/stock_ajax.php?page=countCurrentQTY",
                data: {pId: pid, storeID: storeid, scaleId: scaleid, colorId: colorid}
            }).done(function (data) {
                $data = $.parseJSON(data);
                var data = $data.qty;
                tr.find('.waiting').hide();
                from = tr.find('.currentQTY').text();
                obj = tr.find('.currentQTY');
                countAnimation(obj, from, data, 'text');
                setTimeout(function () {
                    tr.find('select').removeAttr('disabled');
                }, 800)
            });
        }


        function productAddQTYSubmit(ths) {
            id = $(ths).attr('data-id');
            tr = $('tr#Add' + id);

            //check value
            qty = tr.find('.productQTYInput').val();
            if (qty == '' || (parseInt(qty) <= 0)) {
                jAlertifyAlert('<?php echo _js($_e['Please Enter Correct Value.']); ?>');
                return false;
            }

            //check select value
            storeid = tr.find('select.store').val();
            if (storeid == '0') {
                jAlertifyAlert('<?php echo _js($_e['Please Select Store From this Row']); ?>');
                return false;
            }
            else if (storeid == undefined) storeid = 0;

            scaleid = tr.find('select.scale').val();
            if (scaleid == '0') {
                jAlertifyAlert('<?php echo _js($_e['Please Select Scale From this Row']); ?>');
                return false;
            }
            else if (scaleid == undefined) scaleid = 0;

            colorid = tr.find('select.color').val();
            if (colorid == '0') {
                jAlertifyAlert('<?php echo _js($_e['Please Select Color From this Row']); ?>');
                return false;
            }
            else if (colorid == undefined) colorid = 0;

            //process start,
            qty = parseInt(qty);
            tr.find('.waiting2').show();
            $(ths).children('span').text('');
            $(ths).attr('disabled', 'disabled');
            $.ajax({
                type: "POST",
                url: "stock/stock_ajax.php?page=directQTYAdd",
                data: {pId: id, storeID: storeid, scaleId: scaleid, colorId: colorid, pqty: qty}
            }).done(function (data) {
                tr.find('.waiting2').hide();
                $(ths).removeAttr('disabled');
                //if qty add show done
                if (data == '1') {
                    $(ths).children('span').text('Done');
                    $(ths).removeClass('btn-danger');
                    $(ths).removeClass('btn-primary').addClass('btn-success');
                    from = tr.find('.currentQTY').text();
                    obj = tr.find('.currentQTY');
                    qty = eval(parseInt(from) + parseInt(qty));
                    countAnimation(obj, from, qty, 'text');
                    tr.find('.productQTYInput').val('');
                } else {
                    //
                    $(ths).children('span').text('Fail');
                    $(ths).removeClass('btn-success');
                    $(ths).removeClass('btn-primary').addClass('btn-danger');
                }
            });
        }



        function productRemoveQTYSubmit(ths) {
            id = $(ths).attr('data-id');
            tr = $('tr#Remove' + id);
            //check value
            qty = tr.find('.productQTYInput').val();

            from = tr.find('.currentQTY').text();
            obj = tr.find('.currentQTY');

            if (from == '0' || from == '') {
                jAlertifyAlert('<?php echo _js($_e['Please Enter Correct Value.']); ?>');
                return false;
            }

            //check value
            if (qty == '' || qty <= 0) {
                jAlertifyAlert('<?php echo _js($_e['Please Enter Correct Value.']); ?>');
                return false;
            }

            //check select value
            storeid = tr.find('select.store').val();
            if (storeid == undefined) storeid = 0;

            scaleid = tr.find('select.scale').val();
            if (scaleid == undefined) scaleid = 0;

            colorid = tr.find('select.color').val();
            if (colorid == undefined) colorid = 0;

            //process start,
            qty = parseInt(qty);
            tr.find('.waiting2').show();
            $(ths).children('span').text('');
            $(ths).attr('disabled', 'disabled');
            $.ajax({
                type: "POST",
                url: "stock/stock_ajax.php?page=directQTYRemove",
                data: {pId: id, storeID: storeid, scaleId: scaleid, colorId: colorid, pqty: qty}
            }).done(function (data) {
                tr.find('.waiting2').hide();
                $(ths).removeAttr('disabled');
                //if qty add show done
                if (data == '1') {
                    $(ths).children('span').text('Done');
                    $(ths).removeClass('btn-danger');
                    $(ths).removeClass('btn-primary').addClass('btn-success');
                    qty = eval(parseInt(from) - parseInt(qty));
                    countAnimation(obj, from, qty, 'text');
                    tr.find('.productQTYInput').val('');
                } else {
                    //
                    $(ths).children('span').text('Fail');
                    $(ths).removeClass('btn-success');
                    $(ths).removeClass('btn-primary').addClass('btn-danger');
                }
            });

        }



        function productStockAddQTYSubmit(ths) {
            id = $(ths).attr('data-id');
            tr = $(ths).closest('tr');
            td = $(ths).closest('td');
            //check value
            qty = td.find('.productQTYInput').val();

            from = tr.find('.currentQTY').text();
            obj = tr.find('.currentQTY');


            //check value
            if (qty == '' || qty <= 0) {
                jAlertifyAlert('<?php echo _js($_e['Please Enter Correct Value.']); ?>');
                return false;
            }

            td.find('.waiting2').show();
            $(ths).children('span').text('');
            $(ths).attr('disabled', 'disabled');
            $.ajax({
                type: "POST",
                url: "stock/stock_ajax.php?page=directStockQTYAdd",
                data: {id: id, pqty: qty}
            }).done(function (data) {
                td.find('.waiting2').hide();
                $(ths).removeAttr('disabled');
                //if qty add show done
                if (data == '1') {
                    $(ths).children('span').text('Done');
                    $(ths).removeClass('btn-danger');
                    $(ths).removeClass('btn-primary').addClass('btn-success');

                    qty = eval(parseInt(from) + parseInt(qty));
                    countAnimation(obj, from, qty, 'text');
                    td.find('.productQTYInput').val('');
                } else {
                    //
                    $(ths).children('span').text('Fail');
                    $(ths).removeClass('btn-success');
                    $(ths).removeClass('btn-primary').addClass('btn-danger');
                }
            });

        }

        function productStockSubQTYSubmit(ths) {
            var id = $(ths).attr('data-id');
            var tr = $(ths).closest('tr');
            var td = $(ths).closest('td');
            //check value
            var qty = td.find('.productQTYInput').val();

            var from = tr.find('.currentQTY').text();
            var obj = tr.find('.currentQTY');

            if (from == '0' || from == '') {
                jAlertifyAlert('<?php echo _js($_e['No product Found to be Delete.']); ?>');
                return false;
            }

            //check value
            if (qty == '' || qty <= 0) {
                jAlertifyAlert('<?php echo _js($_e['Please Enter Correct Value.']); ?>');
                return false;
            }

            td.find('.waiting2').show();
            $(ths).children('span').text('');
            $(ths).attr('disabled', 'disabled');
            $.ajax({
                type: "POST",
                url: "stock/stock_ajax.php?page=directStockQTYRemove",
                data: {id: id, pqty: qty}
            }).done(function (data) {
                td.find('.waiting2').hide();
                $(ths).removeAttr('disabled');
                //if qty add show done
                if (data == '1') {
                    $(ths).children('span').text('Done');
                    $(ths).removeClass('btn-danger');
                    $(ths).removeClass('btn-primary').addClass('btn-success');

                    qty = eval(parseInt(from) - parseInt(qty));
                    countAnimation(obj, from, qty, 'text');
                    td.find('.productQTYInput').val('');
                } else {
                    //
                    $(ths).children('span').text('Fail');
                    $(ths).removeClass('btn-success');
                    $(ths).removeClass('btn-primary').addClass('btn-danger');
                }
            });

        }

        function productStockLocationSubmit( ths ){
            id = $(ths).attr('data-id');
            tr = $(ths).closest('tr');
            td = $(ths).closest('td');
            //check value
            var location = td.find('.product_location_input').val();

            td.find('.waiting2').show();
            $(ths).children('span').text('');
            $(ths).attr('disabled', 'disabled');
            $.ajax({
                type: "POST",
                url: "stock/stock_ajax.php?page=directStockLocationAdd",
                data: {id: id, location: location}
            }).done(function (data) {
                td.find('.waiting2').hide();
                $(ths).removeAttr('disabled');
                //if qty add show done
                if (data == '1') {
                    $(ths).children('span').text('Done');
                    $(ths).removeClass('btn-danger');
                    $(ths).removeClass('btn-primary').addClass('btn-success');
                } else {
                    //
                    $(ths).children('span').text('Fail');
                    $(ths).removeClass('btn-success');
                    $(ths).removeClass('btn-primary').addClass('btn-danger');
                }
            });

        }

    </script>
<?php return ob_get_clean(); ?>