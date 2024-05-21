<?php

require_once("../global.php");

@$page = $_GET['page'];


global $menu;
global $subMenu;
$menu="captivategallery"; // ul menu active

switch($page):
    case ("captivategallery"):
        $subMenu='captivategallery';
        $content = include "captivategallery.php";
        break;
    case ("edit"):
        $subMenu='captivategallery';
        $content = include "captivategalleryEdit.php";
        break;

    default:
        $content = "Page Not Found.";
        break;
    endswitch;


include("../header.php");
echo '<h3 class="main_heading">'. _uc($_e['captivategallery Management']) .'</h3>';
echo $content;

include("../footer.php");

?>