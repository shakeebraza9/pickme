<?php

require_once("../global.php");

@$page = $_GET['page'];

global $menu;
global $subMenu;
$menu="product"; // ul menu active

switch($page):
    case ("bestsellers"):
        $subMenu='bestsellers';
        $content = include "bestsellers.php";
        break;
    case ("edit"):
        $subMenu='bestsellers';
        $content = include "bestsellerEdit.php";
        break;

    default:
        $content = "Page Not Found.";
        break;
    endswitch;


include("../header.php");
echo '<h3 class="main_heading">'. _uc($_e['Best Seller Management']) .'</h3>';
echo $content;

include("../footer.php");

?>