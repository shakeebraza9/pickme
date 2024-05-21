<?php

require_once("../global.php");

@$page = $_GET['page'];

global $menu;
global $subMenu;
$menu="statisticM"; // ul menu active

switch($page):
    case ("statistics_qty"):
        $subMenu='produt_qty_statistics';
        $content = include "pro_statics.php";
        break;
    default:
        $content = "Page Not Found.";
        break;
    endswitch;


include("../header.php");
echo '<h3 class="main_heading">'. _uc($_e['Product Qty Statistics']) .'</h3>';
echo $content;

include("../footer.php");

?>