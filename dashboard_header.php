<?php
include("global.php");
global $dbF;
global $db;
global $_e;
global $functions;
global $productClass;
global $webClass;
global $menuClass;
global $seo;

$id = $_SESSION['webUser']['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Picmee | Dashboard</title>
    <link rel="stylesheet" href="<?php echo WEB_URL ?>/Css/jquery.fancybox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo WEB_URL ?>/Css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo WEB_URL ?>/Css/mmenu.css">
    <link rel="stylesheet" href="<?php echo WEB_URL ?>/Css/wow.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
    <link rel="stylesheet" href="<?php echo WEB_URL ?>/Css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">-->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">-->
    
    <script type="text/javascript" src="<?php echo WEB_URL ?>/js/jquery.js"></script>

    
    <!--<script type="text/javascript" src="<?php echo WEB_URL ?>/js/jquery_ui.js"></script>-->
     <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>-->
</head>

<body>
    <!--Mmenu-->
    <nav id="menu">
        <ul>
            <li><a href="dashboard.php">Dashboard</a>
            </li>
            <?php if($_SESSION['webUser']['usertypenew']=="Client"){ ?>
            <li>
                                <a href="#">My Event</a>
                                <ul>
                                    <!--<li><a href="#">Buy Product</a></li>-->
                                    <!--<li><a href="#">Buy Product</a></li>-->
                                    <!--<li><a href="#">Buy Product</a></li>-->
                                    <?php
                                     $sql = "SELECT * FROM `event` WHERE `user_id`=?";
                                    $data = $dbF->getRows($sql, array($id));
                                    if($data){
                                        foreach($data as $val){
                                            $productID = $val['order_id'];
                                            $eventName = ucwords($val['event_name']);
                                            echo '<li><a href="' . WEB_URL . '/view?product_id=' . base64_encode($productID) . '&user_id=' . base64_encode($id) . '">'.$eventName.'</a></li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
            <?php
            }
            ?>
            <li>
                <a href="profile">Profile</a>
                <ul>
                    <?php
                    if($_SESSION['webUser']['usertypenew'] != 'Editor'){
                        echo'
                        <li><a href="page-packages">Buy Product</a></li>
                        ';
                    }
                    ?>

                    <li><a href="profile">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>        
    </nav>
    <!--Mmenu-->
    
    <div id="loader">
        <svg id="Layer_1" width="250" height="250" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 228.75 228.75">
            <defs>
                <style>
                    .cls-1 {
                        fill: #6ed6d1;
                    }

                    .cls-2 {
                        fill: #d1d3d4;
                    }

                    .cls-3 {
                        fill: #231f20;
                    }
                </style>
            </defs>
            <g id="rotateGroup1" class="rotate-group" transform="translate(114.375, 114.375)">
                <path class="cls-1"
                    d="M325.19,186.85h-4.73A109.77,109.77,0,0,0,210.82,77.21V72.48A114.51,114.51,0,0,1,325.19,186.85"
                    transform="translate(-96.44 -72.48)" />
                <path class="cls-1"
                    d="M210.82,301.23A114.51,114.51,0,0,1,96.44,186.85h4.73A109.77,109.77,0,0,0,210.82,296.5v4.73Z"
                    transform="translate(-96.44 -72.48)" />
            </g>

            <g id="rotateGroup2" class="rotate-group" transform="translate(114.375, 114.375)">
                <path class="cls-1"
                    d="M121.23,186.85H116.5a94.42,94.42,0,0,1,94.31-94.31v4.73a89.69,89.69,0,0,0-89.58,89.58"
                    transform="translate(-96.44 -72.48)" />

                <path class="cls-1"
                    d="M210.82,281.17v-4.73a89.69,89.69,0,0,0,89.58-89.59h4.73a94.42,94.42,0,0,1-94.31,94.32"
                    transform="translate(-96.44 -72.48)" />
            </g>

            <path class="cls-1"
                d="M257.58,182.72h0l-15.49,8.94a32.59,32.59,0,0,0,.38-4.83,31.6,31.6,0,0,0-7.11-19.94V146.83a46.8,46.8,0,0,1,22.22,35.89"
                transform="translate(-96.44 -72.48)" />
            <path class="cls-2"
                d="M276.45,171.83l-14.39,8.31c-0.15-1.19-.35-2.38-0.59-3.55a51.65,51.65,0,0,0-26.11-35.21V124.15a67.39,67.39,0,0,1,41.09,47.68"
                transform="translate(-96.44 -72.48)" />
            <path class="cls-2"
                d="M230.63,122.49v16.63c-1.1-.46-2.22-0.89-3.37-1.27a51.75,51.75,0,0,0-43.55,5l-14.92-8.61a67.3,67.3,0,0,1,61.84-11.77"
                transform="translate(-96.44 -72.48)" />
            <path class="cls-1"
                d="M225.76,142.34a43.68,43.68,0,0,1,4.87,2v17.9a31.63,31.63,0,0,0-19.81-7,32.29,32.29,0,0,0-5,.41l-17.36-10a47.05,47.05,0,0,1,37.33-3.26"
                transform="translate(-96.44 -72.48)" />
            <path class="cls-2"
                d="M159.15,186.85c0,0.5,0,1,0,1.5L144.25,197A67.37,67.37,0,0,1,165,137.53l14.38,8.3c-0.95.73-1.88,1.49-2.78,2.29a51.64,51.64,0,0,0-17.47,38.72"
                transform="translate(-96.44 -72.48)" />
            <path class="cls-1" d="M199.35,157.37a31.61,31.61,0,0,0-18.09,18.22l-17.37,10a46.76,46.76,0,0,1,20-37.2Z"
                transform="translate(-96.44 -72.48)" />
            <path class="cls-1"
                d="M186.28,206.81v20.07a47,47,0,0,1-21.47-30.7,42.34,42.34,0,0,1-.74-5.19L179.54,182a30.85,30.85,0,0,0-.38,4.8,31.56,31.56,0,0,0,7.12,20"
                transform="translate(-96.44 -72.48)" />
            <path class="cls-2"
                d="M186.28,232.34v17.22a67.44,67.44,0,0,1-41.1-47.67l14.4-8.31c0.15,1.19.36,2.37,0.59,3.54a51.73,51.73,0,0,0,26.11,35.23"
                transform="translate(-96.44 -72.48)" />
            <path class="cls-1"
                d="M195.89,231.37a43.68,43.68,0,0,1-4.87-2V211.52a31.57,31.57,0,0,0,19.81,7,32.25,32.25,0,0,0,5-.4l17.35,10a47,47,0,0,1-37.31,3.25"
                transform="translate(-96.44 -72.48)" />
            <path class="cls-2"
                d="M252.84,239.45A67.39,67.39,0,0,1,191,251.21V234.59c1.1,0.45,2.22.88,3.36,1.25a51.79,51.79,0,0,0,43.55-5Z"
                transform="translate(-96.44 -72.48)" />
            <path class="cls-1"
                d="M241.88,222a44.86,44.86,0,0,1-4.13,3.24l-15.48-8.93a31.75,31.75,0,0,0,18.1-18.23l17.37-10a47,47,0,0,1-15.87,34"
                transform="translate(-96.44 -72.48)" />
            <path class="cls-2"
                d="M278.15,186.85a67.33,67.33,0,0,1-21.53,49.32l-14.38-8.3c0.95-.72,1.88-1.48,2.78-2.28a51.7,51.7,0,0,0,17.48-38.74c0-.5,0-1,0-1.48h0l14.92-8.61a68.48,68.48,0,0,1,.76,10.1"
                transform="translate(-96.44 -72.48)" />
            <path class="cls-3"
                d="M226.63,180.48a6.91,6.91,0,0,1-10.6-5.85,6.79,6.79,0,0,1,1-3.63,17,17,0,1,0,9.56,9.48M204.2,196a2.09,2.09,0,1,1,2.09-2.09A2.09,2.09,0,0,1,204.2,196"
                transform="translate(-96.44 -72.48)" />
        </svg>
    </div>
    <div class="wrapper">
        <div class="main_container">
            <header class="main_dashboard_header">
                <div class="top_header">
                    <div class="logo">
                        <a href="<?php echo WEB_URL?>">
                            <img src="webImages/Logo.png" alt="Picmee_logo">
                        </a>
                    </div>

                  <div class="mmenu_toggler mmenu" id="mmenu_dblock">
                    <a href="#menu">
                        <img src="webImages/menu_bars.png" alt="picmee_menu">
                    </a>
                </div>
                </div>

                <div class="sidebar">
                    <button id="menu-toggle" class="menu-toggle"><i class="fa fa-chevron-circle-right"></i></button>
                    <div class="inner_sidebar">
                        <ul class="menu">
                            <li><a href="dashboard.php"><i class="fa fa-home"></i> <span class="nav_link_txt">Dashboard</span></a>
                                <small class="tooltip_">Dashboard</small>
                            </li>
                            <?php if($_SESSION['webUser']['usertypenew']=="Client"){ ?>
                            <li class="dropdown">
                                <a href="#"><i class="fa fa-info-circle"></i> <span
                                        class="nav_link_txt">My Event</span></a>
                                <div class="dropdown_toggler"></div>
                                <small class="tooltip_">My Event</small>
                                <ul class="dropdown_list">
                                    <!--<li><a href="#">Buy Product</a></li>-->
                                    <!--<li><a href="#">Buy Product</a></li>-->
                                    <!--<li><a href="#">Buy Product</a></li>-->
                                    <?php
                                     $sql = "SELECT * FROM `event` WHERE `user_id`=?";
                                    $data = $dbF->getRows($sql, array($id));
                                    if($data){
                                        foreach($data as $val){
                                            $productID = $val['order_id'];
                                            $eventName = ucwords($val['event_name']);
                                            echo '<li><a href="' . WEB_URL . '/view?product_id=' . base64_encode($productID) . '&user_id=' . base64_encode($id) . '">'.$eventName.'</a></li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php
                            }
                            ?>
                            <li class="dropdown">
                                <a href="profile"><i class="fa fa-user"></i> <span class="nav_link_txt">Profile</span></a>
                                <div class="dropdown_toggler"></div>
                                <small class="tooltip_">Profile</small>
                                <ul class="dropdown_list">
                                    <?php
                                    if($_SESSION['webUser']['usertypenew'] != 'Editor'){
                                        echo'
                                        <li><a href="page-packages">Buy Product</a></li>
                                        ';
                                    }
                                    ?>

                                    <li><a href="profile">Profile</a></li>
                                </ul>
                            </li>
                        </ul>


                        <div class="sidebar_bottom">
                            <div class="profile_dropdown">
                                <?php
                                if(@$_SESSION['webUser']['profile'] != NULL){
                                    $profile=WEB_URL."/".$_SESSION['webUser']['profile'];
                                        
                                    }else{
                                        $profile="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg";
                                    }
                                ?>
                                <a href="profile" class="profileImg">
                                    <img src="<?php echo $profile?>" alt="user_img">
                                </a>
                                <a href="profile" class="profileTxt">
                                    <?php
                                    $name=$_SESSION['webUser']['name'];
                                    $accountType=$_SESSION['webUser']['usertypenew'];
                                    echo'
                                    <p>'.$name.'</p>
                                     <span>'.$accountType.'</span>
                                    ';
                                    ?>
                                </a>
                            </div>
                            <a href="logout.php" class="logout_btn">
                                <i class="fa fa-solid fa-right-from-bracket"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </header>

