<?php
ob_start();

require_once("classes/bestseller.class.php");
global $dbF;

$bestsellers  =   new bestsellers();

//$dbF->prnt($_POST);
//$dbF->prnt($_FILES);
//exit;
$bestsellers->bestsellersEditSubmit();
?>
<h2 class="sub_heading"><?php echo _uc($_e['Manage Bestsellers']); ?></h2>
<?php $bestsellers->bestsellersEdit(); ?>

<script>
    $(function(){
        dateJqueryUi();
    });

    function showLoadingMask (target, boolean) {
        // body...
        if (boolean === true) {
            $(target).addClass('ui-autocomplete-loading');
        } else{
            $(target).removeClass('ui-autocomplete-loading');
        };

    }

    $("input.typeahead").typeahead({
        onSelect: function(item) {
            $('#product_id').val(item.value);
            console.log(item.value);
        },
        ajax: {
            url: "../ajax_call.php?page=searched_products&bestseller",
            dataType: 'JSON',
            timeout: 500,
            triggerLength: 1,
            method: "post",
            displayField: "title",
            loadingClass: "loading-circle",
            preDispatch: function (query) {
                showLoadingMask('#product_name',true);
                return {
                    search: query
                }
            },
            preProcess: function (data) {
                showLoadingMask('#product_name',false);
                return data;
                // console.log(data);
                // if (data.success === false) {
                    // Hide the list, there was some error
                    // return false;
                // }
                // We good!
                // return data.mylist;
            }
        }
    });    

</script>
<?php return ob_get_clean(); ?>