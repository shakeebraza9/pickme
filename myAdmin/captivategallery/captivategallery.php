<?php
ob_start();

require_once("classes/captivategallery.class.php");
global $dbF;

$captivategallery  =   new captivategallery();

//$dbF->prnt($_POST);
//$dbF->prnt($_FILES);
//exit;
$captivategallery->captivategalleryEditSubmit();
$captivategallery->newcaptivategalleryAdd();
?>
<h2 class="sub_heading"><?php echo _uc($_e['Manage captivategallery']); ?></h2>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs tabs_arrow" role="tablist">
        <li class="active"><a href="#home" role="tab" data-toggle="tab"><?php echo _uc($_e['Active captivategallery']); ?></a></li>
        <li><a href="#draft" role="tab" data-toggle="tab"><?php echo _uc($_e['Draft']); ?></a></li>
        <li><a href="#sort" role="tab" data-toggle="tab"><?php echo _uc($_e['Sort captivategallery']); ?></a></li>
        <li><a href="#newPage" role="tab" data-toggle="tab"><?php echo _uc($_e['Add New captivategallery']); ?></a></li>
    </ul>


    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active container-fluid" id="home">
            <h2  class="tab_heading"><?php echo _uc($_e['Active captivategallery']); ?></h2>
            <?php $captivategallery->captivategalleryView();  ?>
        </div>

        <div class="tab-pane fade in container-fluid" id="draft">
            <h2  class="tab_heading"><?php echo _uc($_e['Draft']); ?></h2>
            <?php $captivategallery->captivategalleryDraft();  ?>
        </div>

        <div class="tab-pane fade in container-fluid" id="sort">
            <h2  class="tab_heading"><?php echo _uc($_e['Sort captivategallery']); ?></h2>
            <?php $captivategallery->captivategallerySort();  ?>
        </div>

        <div class="tab-pane fade in container-fluid" id="newPage">
            <h2  class="tab_heading"><?php echo _uc($_e['Add New captivategallery']); ?></h2>
            <?php $captivategallery->captivategalleryNew();  ?>
        </div>
    </div>

<script>
    $(function(){
        tableHoverClasses();
        dateJqueryUi();
    });

    function deletecaptivategallery(ths){
        btn=$(ths);
        if(secure_delete()){
            btn.addClass('disabled');
            btn.children('.trash').hide();
            btn.children('.waiting').show();

            id=btn.attr('data-id');
            $.ajax({
                type: 'POST',
                url: 'captivategallery/captivategallery_ajax.php?page=deletecaptivategallery',
                data: { id:id }
            }).done(function(data)
                {
                    ift =true;
                    if(data=='1'){
                        ift = false;
                        btn.closest('tr').hide(1000,function(){$(this).remove()});
                    }
                    else if(data=='0'){
                        jAlertifyAlert('<?php echo ($_e['Delete Fail Please Try Again.']); ?>');
                    }
                    else{
                        btn.append(data);
                    }
                    if(ift){
                        btn.removeClass('disabled');
                        btn.children('.trash').show();
                        btn.children('.waiting').hide();
                    }

                });
        }
    }

    $(document).ready(function() {

        $( ".sortDiv .activeSort" ).sortable({
            handle: '.albumSortTop',
            containment: "parent",
            update : function () {
                serial = $(this).sortable('serialize');
                $.ajax({
                    url: 'captivategallery/captivategallery_ajax.php?page=captivategallerySort',
                    type: "post",
                    data: serial,
                    error: function(){
                        jAlertifyAlert("<?php echo ($_e['There is an error, Please Refresh Page and Try Again']); ?>");
                    }
                });
            }
        });
    });


</script>
<?php return ob_get_clean(); ?>