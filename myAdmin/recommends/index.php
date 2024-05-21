<?php

require_once("../global.php");

@$page = $_GET['page'];

global $menu;
global $subMenu;
$menu="product"; // ul menu active

switch($page):
    case ("recommendss"):
        $subMenu='recommendss';
        $content = include "recommendss.php";
        break;
    case ("edit"):
        $subMenu='recommendss';
        $content = include "recommendsEdit.php";
        break;

    default:
        $content = "Page Not Found.";
        break;
    endswitch;


include("../header.php");
echo '<h3 class="main_heading">'. _uc($_e['Recommends Management']) .'</h3>';
echo $content;

include("../footer.php");

?>