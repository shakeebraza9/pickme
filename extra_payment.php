<?php
include_once("global.php");;
global $webClass, $productClass;

if(isset($_GET['inv']) && isset($_GET['id'])){
    $inv = $_GET['inv'];
    $id  = $_GET['id'];
    $productClass->openPaysonExtra('5',$inv,$id);
}


?>