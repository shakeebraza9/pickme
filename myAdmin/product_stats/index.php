<?php

require_once("../global.php");

@$page = $_GET['page'];

global $menu;
global $subMenu;
$menu="statisticM"; // ul menu active

switch($page):
    case ("statistics"):
        $subMenu='produt_statistics';
        $content = include "pro_statics.php";
        break;
    default:
        $content = "Page Not Found.";
        break;
    endswitch;


include("../header.php");
echo '<h3 class="main_heading">'. _uc($_e['Product Statistics']) .'</h3>';
echo $content;

include("../footer.php");

?>