<?php
global $dbF;
global $db;
global $_e;
global $functions;
global $productClass;
global $webClass;
global $menuClass;
global $seo;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" href="<?php echo WEB_URL ?>/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo WEB_URL ?>/favicon.ico" type="image/x-icon" />

    <?php //$functions->ourLogoSecurity(); 
    ?>

    <?php //$cartInfo = $productClass->cartInfo(true);



    // $dbF->prnt($seo);

    // die;




    ?>

    <script type="text/javascript" src="<?php echo WEB_URL ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo WEB_URL ?>/js/jquery_ui.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LcQIscZAAAAAGLytR5dCMklULVOUfxXZ6mRmDnc"></script>


    <script type="text/javascript" defer="defer" src="<?php echo WEB_URL ?>/js/product.php"></script>
    <!--############################## CSS FILES ################################# -->


    <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/assets/alertify/themes/alertify.core.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/hover.css" />
    <!-- <title>Lush Leather</title> -->

    <?php $webClass->AllSeoPrint(); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap css file-->
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/hover.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/mmenu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/owl.theme.css">

    <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/vmenuModule.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL ?>/css/style_old.css">
    <!-- DESKTOP -->
    <link href="<?php echo WEB_URL ?>/css/style-desktop.css" rel="stylesheet" type="text/css"
        media="only screen and (min-width:979px) and (max-width:1280px)">
    <!-- TABLET -->
    <link href="<?php echo WEB_URL ?>/css/style-tablet.css" rel="stylesheet" type="text/css"
        media="only screen and (min-width:768px) and (max-width:978px)">
    <!-- MOBILE -->
    <link href="<?php echo WEB_URL ?>/css/style-mobile.css" rel="stylesheet" type="text/css"
        media="only screen and (min-width:461px) and (max-width:767px)">
    <!-- MOBILE SMALL-->
    <link href="<?php echo WEB_URL ?>/css/style-mobile-small.css" rel="stylesheet" type="text/css"
        media="only screen and (max-width:460px)">
    <script type="text/javascript" src="<?php echo WEB_URL ?>/js/js.cookie.min.js"></script>
    <script type="text/javascript" src="<?php echo WEB_URL ?>/js/flexmenu.min.js"></script>

    <!-- <script type="text/javascript" src="<?php //echo WEB_URL 
                                                ?>/js/jquery.filedrop.js"></script> -->
    <!-- <script src="<?php //echo WEB_URL 
                        ?>/js/script.js"></script> -->
    <?php echo $functions->ibms_setting('headScript'); ?>
    <?php $webClass->subscribeFormSubmit(); ?>
</head>

<body>

    <!--when add to cart , animation show...-->
    <div id="cartLoading"></div>
    <!--when add to cart , animation show End...-->




    <div class="main_container">
        <header>
            <div class="header_side">
                <div class="header_top fadeInLeft">
                    <div class="standard">

                        <div class="mail">
                            <?php //$box2 = $webClass->getBox('box2'); 
                            ?>
                            <a href="mailto:<?php //echo $box2['linkText'] 
                                            ?>">
                                <!-- <i class="far fa-envelope"></i> -->
                                <h5><?php //echo $box2['linkText'] 
                                    ?></h5>
                            </a>
                        </div>
                        <!-- mail close -->
                        <div class="top_links">
                            <?php echo $menuClass->main_menu('top_menu');
                            ?>
                        </div>
                        <!-- top-links close -->
                    </div>
                    <!-- standard close -->
                </div>
                <!-- header_top close -->
                <div class="header_bottom Wow fadeInDown">
                    <div class="standard">
                        <div class="logo">
                            <a href="<?php echo WEB_URL ?>">
                                <img src="<?php echo WEB_URL ?>/webImages/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo close -->

                    </div>
                    <!-- standard close -->
                </div>
                <!-- header_bottom close -->
                <div class="header_bottom_ wow fadeInUp">

                </div>

            </div>
            <!-- header_side close -->

        </header>
        <!-- header close -->