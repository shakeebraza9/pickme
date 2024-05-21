<?php
ob_start();

require_once("classes/imgaesproduct.class.php");
global $dbF;

$imgaesProduct  =   new imgaesProduct();

//$dbF->prnt($_POST);
//$dbF->prnt($_FILES);
//exit;
$imgaesProduct->AssignEditSubmit();
$imgaesProduct->newAssignAdd();
?>
<h2 class="sub_heading"><?php echo _uc($_e['Manage Product']); ?></h2>

<!-- Nav tabs -->
<ul class="nav nav-tabs tabs_arrow" role="tablist">
    <li class="active"><a href="#home" role="tab" data-toggle="tab"><?php echo _uc($_e['Active Imgaes Product']); ?></a>
    </li>
    <li><a href="#pending" role="tab" data-toggle="tab"><?php echo _uc($_e['Completed']); ?></a></li>
    <li><a href="#draft" role="tab" data-toggle="tab"><?php echo _uc($_e['WithOut Edit']); ?></a></li>
    <!-- <li><a href="#newPage" role="tab" data-toggle="tab"><?php //echo _uc($_e['Add New Assign']); 
                                                                ?></a></li> -->
</ul>


<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane fade in active container-fluid" id="home">
        <h2 class="tab_heading"><?php echo _uc($_e['Active Imgaes Product']); ?></h2>
        <?php $imgaesProduct->AssignView();  ?>
    </div>

    <div class="tab-pane fade in container-fluid" id="pending">
        <h2 class="tab_heading"><?php echo _uc($_e['Completed']); ?></h2>
        <?php $imgaesProduct->AssignPending();  ?>
    </div>

    <div class="tab-pane fade in container-fluid" id="draft">
        <h2 class="tab_heading"><?php echo _uc($_e['WithOut Edit']); ?></h2>
        <?php $imgaesProduct->AssignDraft();  ?>
    </div>

    <!-- <div class="tab-pane fade in container-fluid" id="newPage">
        <h2 class="tab_heading"><?php //echo _uc($_e['Add New Imgaes Product']); 
                                ?></h2>
        <?php //$Assign->AssignNew();  
        ?>
    </div>
</div> -->

    <script>
        $(function(){
        tableHoverClasses();
        dateJqueryUi();
    });
    

    function deleteAssign(ths) {
        btn = $(ths);
        if (secure_delete()) {
            btn.addClass('disabled');
            btn.children('.trash').hide();
            btn.children('.waiting').show();

            id = btn.attr('data-id');
            $.ajax({
                type: 'POST',
                url: 'imgaesproduct/imagesproduct_ajax.php?page=deleteassign',
                data: {
                    id: id
                }
            }).done(function(data) {
                ift = true;
                if (data == '1') {
                    ift = false;
                    btn.closest('tr').hide(1000, function() {
                        $(this).remove()
                    });
                } else if (data == '0') {
                    jAlertifyAlert('<?php echo ($_e['Delete Fail Please Try Again.']); ?>');
                } else {
                    btn.append(data);
                }
                if (ift) {
                    btn.removeClass('disabled');
                    btn.children('.trash').show();
                    btn.children('.waiting').hide();
                }

            });
        }
    }
    </script>
    <?php return ob_get_clean(); ?>