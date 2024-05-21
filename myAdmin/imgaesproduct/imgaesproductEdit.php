<?php
ob_start();

require_once("classes/imgaesproduct.class.php");
global $dbF;

$imgaesProduct  =   new imgaesProduct();

//$dbF->prnt($_POST);
//$dbF->prnt($_FILES);
//exit;
$imgaesProduct->AssignEditSubmit();
?>
<h2 class="sub_heading"><?php echo _uc($_e['Manage Imgaes Product']); ?></h2>

<?php $imgaesProduct->AssignEdit(); ?>


<script>
    $(function() {
        dateJqueryUi();
    });

// $(document).ready(function() {

//     $("#dropbox").sortable({
//         handle: '.imageHolder',
//         containment: "parent",
//         update: function() {
//             serial = $(this).sortable('serialize');
//             $.ajax({
//                 url: 'gallery_ajax.php?page=sortAlbumImage',
//                 type: "post",
//                 data: serial,
//                 error: function() {
//                     jAlertifyAlert(
//                         "<?php //echo _uc($_e['There is an error, Please Refresh Page and Try Again']); ?>"
//                         );
//                 }
//             });
//         }
//     });
// });

///////////////////////////////////////
$(".imageHolder").click(function() {
    img = $(this).find("img").attr('src');
    $('#productImgDialog').modal('show');
    $("#productImgDialog .modal-body").find("img").attr("src", img).hide().show(600);
});

////////////////////////////////////////////

$(".productEditImageDel").click(function() {
    console.log('hellow');
    if (secure_delete()) {
        id = $(this).attr("data-id");
        parnt = $(this).closest(".preview");
        $.ajax({
            type: "POST",
            url: 'imagesproduct/imagesproduct_ajax.php?page=albumEditImageDel',
            data: {
                imageId: id
            }
        }).done(function(data) {
            if (data == '1') {
                parnt.hide(500);
            } else if (data == '0') {
                jAlertifyAlert("<?php echo _uc($_e['Image Not Delete Please Try Again']); ?>");
                return false;
            }
        });
    }
});
/////////////////////////////////////////////////


////////////////////////////////////////////
$(".albumAltUpdate").click(function() {
    btn = $(this);
    btn.addClass('disabled');
    btn.children('.trash').hide();
    btn.children('.waiting').show();

    id = btn.attr('data-id');
    alt = $('#alt-' + id).val();
    btn.children('span').text('Wait...');
    $.ajax({
        type: 'POST',
        url: 'imagesproduct/imagesproduct_ajax.php?page=albumAltUpdate',
        data: {
            imageId: id,
            altT: alt
        }
    }).done(function(data) {
        ift = true;
        if (data == '1') {
            btn.children('span').text('Done');
        } else {
            btn.children('span').text('Fail');
        }
        btn.removeClass('disabled');
        btn.children('.trash').show();
        btn.children('.waiting').hide();

    });
});
/////////////////////////////////////////////////
</script>
<?php return ob_get_clean(); ?>