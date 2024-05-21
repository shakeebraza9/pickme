<?php

if(isset($_GET['page'])){
    require_once(__DIR__ . "/classes/captivategallery_ajax.class.php");
    $page=$_GET['page'];

    $ajax=new banner_ajax();
    switch($page){
        case 'deletecaptivategallery':
            $ajax->deletecaptivategallery();
        break;
        case 'captivategallerySort':
            $ajax->captivategallerySort();
            break;
    }
}

?>