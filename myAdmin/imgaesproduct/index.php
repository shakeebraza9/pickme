<?php

require_once("../global.php");

@$page = $_GET['page'];

global $menu;
global $subMenu;
$menu = "imgaesproduct"; // ul menu active

switch ($page):
    case ("imgaesproduct"):
        $subMenu = 'imgaesproduct';
        $content = include "imgaesproduct.php";
        break;
    case ("edit"):
        $subMenu = 'imgaesproduct';
        $content = include "imgaesproductEdit.php";
        break;
    case ("add"):
        $subMenu = 'addNews';
        $content = include "newsNew.php";
        break;
    default:
        $content = "Page Not Found.";
        break;
endswitch;


include("../header.php");
echo '<h3 class="main_heading">' . _uc($_e['Assign Product Management']) . '</h3>';
echo $content;

include("../footer.php");
