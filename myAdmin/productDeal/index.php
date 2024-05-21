<?php
/**
 * For add new page, just copy past all files,
 * and replace words with new page name.
 * if new fields required use setting_fields table for additional fields,
 */

require_once("../global.php");

@$page = $_GET['page'];

global $menu;
global $subMenu;
$menu="product"; // ul menu active

switch($page):
    case ("deal"):
        $subMenu='Deal Product';
        $content = include "deal.php";
        break;
    case ("edit"):
        $subMenu='Deal Product';
        $content = include "dealEdit.php";
        break;

    default:
        $content = "Page Not Found.";
        break;
    endswitch;

include("../header.php");
echo '<h3 class="main_heading">'. _uc($_e['Deal Management']) .'</h3>';
echo $content;

include("../footer.php");

?>