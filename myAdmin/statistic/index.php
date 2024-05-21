<?php

require_once("../global.php");

@$page = $_GET['page'];

global $menu;
global $subMenu;
$menu="statisticM"; // ul menu active

switch($page):
    case ("statistics"):
        $subMenu='statistic';
        $content = include "statistic.php";
        break;
    case ("statistics_table_view"):
        $subMenu = 'statistics_table_view';
        $content = include "statistic_table_view.php";
        break;
    case ("statistics_insertions"):
        $subMenu = 'statistics_insertions_view';
        $content = include "statistics_insertions.php";
        break;

    default:
        $content = "Page Not Found.";
        break;
    endswitch;


include("../header.php");
echo '<h3 class="main_heading">'. _uc($_e['Generate Statistic']) .'</h3>';
echo $content;

include("../footer.php");

?>