<?php
ob_start();

require_once("classes/captivategallery.class.php");
global $dbF;

$captivategallery  =   new captivategallery();

//$dbF->prnt($_POST);
//$dbF->prnt($_FILES);
//exit;
$captivategallery->captivategalleryEditSubmit();
?>
<h2 class="sub_heading"><?php echo _uc($_e['Manage captivategallery']); ?></h2>
<?php $captivategallery->captivategalleryEdit(); ?>

<script>
    $(function(){
        dateJqueryUi();
    });

</script>
<?php return ob_get_clean(); ?>