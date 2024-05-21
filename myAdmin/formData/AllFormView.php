<?php
ob_start();
require_once("classes/AllForm.class.php");
global $dbF;


$menuC  =   new AllFormData();

?>
<h2 class="sub_heading <?php if(!isset($_GET['type'])){ echo "borderIfNotabs"; }?> "></h2>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs tabs_arrow" role="tablist" id="MenuTab">
        <?php  $menuC->allFormdata(); ?>
    </ul>

    <div class="tab-content">
      <?php  $menuC->allFormdataContent(); ?>
    </div>
<?php

return ob_get_clean();