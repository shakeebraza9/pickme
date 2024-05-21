<?php

require_once("../global.php");

@$page = $_GET['page'];

global $menu;
global $subMenu;
$menu="emailin_waitingM"; // ul menu active

switch($page):
    case ("emailin_waiting"):
        $subMenu='emailin_waiting';
        $content = include "emailin_waiting.php";
        break;
    case ("edit"):
        $subMenu='emailin_waiting';
        $content = include "emailin_waitingEdit.php";
        break;

    default:
        $content = "Page Not Found.";
        break;
    endswitch;


include("../header.php");
echo '<h3 class="main_heading">'. _uc($_e['Emails in Waiting']) .'</h3>';
echo $content;

include("../footer.php");

?>