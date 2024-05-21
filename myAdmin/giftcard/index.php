<?php

require_once("../global.php");

@$page = $_GET['page'];

global $menu;
global $subMenu;
$menu="giftCardM"; // ul menu active

switch($page):
     case ("giftCard"):
        $subMenu='giftCard';
        $content = include "giftCard.php";
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
echo '<h3 class="main_heading">'. _uc($_e['Gift Card Management']) .'</h3>';
echo $content;

include("../footer.php");

?>