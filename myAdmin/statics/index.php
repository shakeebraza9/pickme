<?php

require_once("../global.php");

@$page = $_GET['page'];

global $menu;
global $subMenu;
$menu="statics"; // ul menu active

switch($page):
     case ("statics"):
        $subMenu='statics';
        $content = include "statics.php";
        break;
    case ("edit"):
        $subMenu='giftCard';
        $content = include "giftCardEdit.php";
        break;

    default:
        $content = "Page Not Found.";
        break;
    endswitch;


include("../header.php");
//echo '<h3 class="main_heading">'. _uc($_e['Statics Reports']) .'</h3>';
echo $content;

include("../footer.php");

?>