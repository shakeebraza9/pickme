<?php

require_once("../global.php");

@$page = $_GET['page'];

global $menu;
global $subMenu;

$menu="FormDataM"; // ul menu active

switch($page):

    case ("all_forms"):
        $subMenu='formM';
        $content = include "AllFormView.php";
    break;


    default:
        $content = "Page Not Found.";
        break;
    endswitch;


include("../header.php");
echo '<h3 class="main_heading">'. _uc($_e['All Form Data']) .'</h3>';
echo $content;

include("../footer.php");

?>