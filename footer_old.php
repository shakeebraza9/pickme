<?php
global $webClass;
global $functions;
global $_e;
global $webClass;
global $db;
//No Need to define global it is just for PHPstrom suggestion list...
?>
    <footer>
        <div class="footer">
            <div class="align">
                <div class="center_logo" data-wow-delay="0.4s" data-wow-duration="1.6s">
                    <a href="<?php echo WEB_URL; ?>">
                        <img src="<?php echo WEB_URL; ?>/webImages/biglogo.png" alt="">
                    </a>
                </div>
                <div class="foot_line"></div>
                <div class="footer_mid">
                    <div class="select_country text_yellow hidden-xs">
                        <span><i class="glyphicon glyphicon-globe"></i><a href="https://sharkspeed.com"><?php $dbF->hardWords('Change Region'); ?></a></span>
                        <?php 
                            // echo $_e['SELECT YOUR COUNTRY:'];
                            // $active_country_css = ' style="border:1px solid #fff;" ';
                            // $current_lang = currentWebLanguage();
                            
                            // if(!isset($_SESSION['country']) && $_SESSION['country'] == ''){
                            //     $uriF = $_SERVER['REQUEST_URI'];
                            //     $conSE = '?country=SE';
                            //     $conNO = '?country=NO';
                            //     $conDK = '?country=DK';
                            //     $conFI = '?country=FI';
                            // }else{
                            //     $uri = explode('?', $_SERVER['REQUEST_URI']);
                            //     $uriF = $uri[0];
                            //     $conSE = '';
                            //     $conNO = '';
                            //     $conDK = '';
                            //     $conFI = '';
                            // }
                            
                            
                            
                            // $uri = $_SERVER['REQUEST_URI'];
                        ?>
                        <!-- <a href="https://sharkspeed.se<?php //echo $uriF.''.$conSE; ?>">
                            <div <?php //if ($current_lang == "Swedish") echo $active_country_css; ?>
                            class="country flag1 transition_3 float-shadow"></div>
                        </a>

                        <a href="https://sharkspeed.no<?php //echo $uriF.''.$conNO; ?>">
                            <div <?php //if ($current_lang == "Norwegian") echo $active_country_css; ?>
                             class="country flag2 transition_3 float-shadow"></div>
                        </a>

                        <a href="https://sharkspeed.dk<?php //echo $uriF.''.$conDK; ?>">
                            <div  <?php //if ($current_lang == "Danish") echo $active_country_css; ?>
                             class="country flag3 transition_3 float-shadow"></div>
                        </a>

                        <a href="https://sharkspeed.fi<?php //echo $uriF.''.$conFI; ?>">
                            <div     <?php //if ($current_lang == "Finnish") echo $active_country_css; ?>
                             class="country flag4 transition_3 float-shadow"></div>
                        </a> -->
                    </div>
                    <div class="foot_col_right">
                        <div class="f_head no_margin_left">
                            <?php echo _u($_e['Subscribe to Our Newsletter']); ?>
                                
                        </div>
                        <div class="subscribe_area">
                            <form method="post" class="" style="height: 100%;">
                                <?php $webClass->setFormToken('SubscribeForm'); ?>
                                <input type="email" required="" class="subscribe" name="subscribeEmail"
                                       placeholder="<?php echo _uc($_e['Enter Email']); ?>">
                                <input type="submit" name="subscribeEmailButton"
                                       value="<?php echo _u($_e['SUBSCRIBE']); ?>" class="sub_btn">
                            </form>
                        </div>
                        <a href="<?php echo WEB_URL ?>/cartWishList" class="wish-list-mob visible-xs">
                            Wish List
                        </a>
                    </div>
                    <!--foot_col_right end-->

                    <!-- <div class=" currency-main text_yellow hidden-xs">
                        <div class="currency-inner text_yellow">
                            <a href="<?php //echo WEB_URL . "/cartWishList"; ?>"
                               class="wish_list"><?php //echo _u($_e['Wishlist']); ?></a> |

                            <?php //if (userLoginCheck()) { ?>
                                <a href="<?php //echo WEB_URL . "/profile"; ?>"
                                   class="my_account"><?php //echo _u($_e['My Account']); ?></a> |
                                <a href="<?php //echo WEB_URL . "/logout"; ?>"
                                   class="log_out"><?php //echo _u($_e['LogOut']); ?></a>
                            <?php //} else { ?>
                                <a href="<?php //echo WEB_URL . "/login"; ?>"
                                   class="login_head"><?php //echo _u($_e['LOGIN']); ?></a> |
                                <a href="<?php //echo WEB_URL . "/login"; ?>"
                                   class="register_head"><?php //echo _u($_e['REGISTER']); ?></a>
                            <?php //} ?>

                        </div>
                    </div> -->
                </div><!--footer_mid end-->

                <div class="foot_line"></div>

                <div class="foot_columns">
                    <?php $box = $webClass->getBox('box2'); ?>
                    <div class="foot_left_column">
                        <h2 style="font-size:16px;text-align: left;"><?php echo $box['heading']; ?></h2>    <br>
                        <p class="text-justify"><?php echo $box['text']; ?></p>
                    </div>
                    <!--foot_left_column end-->

                    <div class="foot_middle_column">
                        <?php $box = $webClass->getBox('box3'); ?>
                        <h2 style="font-size:16px;text-align: left;"><?php echo $box['heading']; ?></h2>    <br>
                        <p class="text-justify"><?php echo $box['text']; ?></p>
                    </div>
                    <!--foot_middle_column end-->

                    <div class="foot_right_column">
                        <?php $box = $webClass->getBox('box4'); ?>
                        <h2 style="font-size:16px;text-align: left;"><?php echo $box['heading']; ?></h2>    <br>
                        <p class="text-justify"><?php echo $box['text']; ?></p>
                    </div>
                    <!--foot_right_column end-->
                </div>
                <!--three_columns end-->

                <div class="foot_line foot_line_bottom"></div>

                <div class="foot_main_links_area">
                    <div class="foot_links">
                        <div class="foot_text">
                            <?php $box = $webClass->getBox('box5'); ?>
                            <h3>
                                <span style="color:#7dbe35;"> <?php echo $box['heading']; ?></span> <?php echo $box['heading2']; ?>
                            </h3>
                                <br>
                            <p class="text-justify"><?php echo $box['text']; ?></p>
                        </div>
                        <!--foot_text end-->

                        <div class="all_f_links">
                            <div class="three_f_links">
                                <?php $menuClass->footerAllMenu(); ?>
                            </div>
                            <div class="contact_info">
                                <?php $box = $webClass->getBox('box6'); ?>
                                <h5><?php echo $box['heading']; ?></h5>
                                <h4><?php echo $box['heading2']; ?></h4>

                                <div class="info">
                                    <?php echo textArea($box['text']); ?>
                                </div>

                                <div class="soc_icons">
                                    <a href="<?php echo $functions->ibms_setting('Facebook'); ?>" target="_blank"
                                       class="soc fb1"></a>
                                    <a href="<?php echo $functions->ibms_setting('Twitter'); ?>" target="_blank"
                                       class="soc twitter"></a>
                                    <a href="<?php echo $functions->ibms_setting('pinterest'); ?>" target="_blank"
                                       class="soc pin"></a>
                                    <a href="<?php echo $functions->ibms_setting('youtube'); ?>" target="_blank"
                                       class="soc youtube"></a>
                                </div>
                            </div>
                            <!--contact_info end-->
                        </div>

                        <div class="foot_line inside_line"></div>

                        <div class="all_foot">
                            <div class="foot_col_left">
                                <?php $box = $webClass->getBox('box7'); ?>
                                <div class="icon">
                                    <img src="<?php echo $box['image']; ?>" class="img-responsive"/>
                                </div>
                                <div class="f_head">
                                    <h4 class="home_foot_head">
                                        <?php echo $box['heading']; ?>
                                    </h4>
                                </div>
                                <div class="f_text">
                                    <a href="<?php echo $box['link']; ?>">
                                        <?php echo $box['text']; ?>
                                    </a>
                                </div>
                            </div>
                            <!--foot_col_left end-->

                            <div class="foot_col_middle">
                                <?php $box = $webClass->getBox('box8'); ?>
                                <div class="icon">
                                    <img src="<?php echo $box['image']; ?>" class="img-responsive"/>
                                </div>
                                <div class="f_head">
                                    <h4 class="home_foot_head">
                                        <?php echo $box['heading']; ?>
                                    </h4>
                                </div>
                                <div class="f_text">
                                    <a href="<?php echo $box['link']; ?>">
                                        <?php echo $box['text']; ?>
                                    </a>
                                </div>
                            </div>
                            <!--foot_col_middle end-->
                        </div>
                        <!--all_foot end-->
                    </div>
                    <!--foot_links end-->
                </div>
                <!--foot_main_links_area end-->
            </div>
            <!--align end-->

            <div class="customers">
                <div class="align">
                    <div class="all_customers">
                        <?php echo $webClass->web_brandsDiv(); ?>
                    </div>
                    <!--all_customers end-->

                </div>
                <!--align end-->
            </div>
            <!--customers end-->
            <?php $webClass->ourLogo(); ?>
            <!--imedia_tag end-->
        </div>
        <!--footer end-->
    </footer>
</div>
<!--fullwrap end-->


<!--############################## JS FILES #################################-->



<?php 

include_once 'js/combined.php';

?>


<script type="text/javascript" defer="defer" src="<?php echo WEB_URL ?>/js/product.php"></script>


<!--############################## JS FILES END #################################-->

<script>
    $(document).ready(function() {
        var bannerLeft = $('.leftImg').length;
        var bannerRight = $('.rightImg').length;

        if(bannerLeft > 1){
            banner_left_true = true;
        }else{
            banner_left_true = false;
        }

        if(bannerRight > 1){
            banner_right_true = true;
        }else{
            banner_right_true = false;
        }

        $('.leftBanner').owlCarousel({
            loop: banner_left_true,
            navigation: true,
            autoplay: banner_left_true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            items: 1,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                300: {
                    items: 1,
                    nav: true,
                },
                1600: {
                    items: 1,
                    nav: true,
                }
            }
        });

        $('.rightBanner').owlCarousel({
            loop: banner_right_true,
            navigation: true,
            autoplay: banner_right_true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            items: 1,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                300: {
                    items: 1,
                    nav: true,
                },
                1600: {
                    items: 1,
                    nav: true,
                }
            }
        });
    });
    $(document).ready(function() {
        var col_all2 = $('.col_all2');
        if(col_all2.length > 0){
            col_all2_true = true;
        }else{
            col_all2_true = false;
        }
        $('.col_all2').owlCarousel({
            loop: col_all2_true,
            navigation: true,
            autoplay: col_all2_true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            items: 1,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                300: {
                    items: 1,
                    nav: true,
                },
                1600: {
                    items: 1,
                    nav: true,
                }
            }
        })
    });


    // var pop_slide = $('.pop_slide_main');
    //     if(pop_slide.length < 0){
    //         pop_slide_true = true;
    //     // }else{
    //     //     pop_slide_true = false;
    //     // }
    // $(document).ready(function() {
    //     console.log(pop_slide.length);
        
    //     // else{
    //     //     pop_slide_true = false;
    //     // }
    //     $('.pop_slide').owlCarousel({
    //         loop: pop_slide_true,
    //         navigation: true,
    //         autoplay: pop_slide_true,
    //         autoplayTimeout: 3000,
    //         autoplayHoverPause: true,
    //         items: 1,
    //         responsiveClass: true,
    //         responsive: {
    //             0: {
    //                 items: 1,
    //                 nav: true
    //             },
    //             300: {
    //                 items: 1,
    //                 nav: true,
    //             },
    //             1600: {
    //                 items: 1,
    //                 nav: true,
    //             }
    //         }
    //     })  
        
    // });
    
    //     $(document).ready(function() {
    //     $('.pop_slide').owlCarousel({
    //         loop: true,
    //         navigation: true,
    //         autoplay: true,
    //         autoplayTimeout: 3000,
    //         autoplayHoverPause: true,
    //         items: 1,
    //         responsiveClass: true,
    //         responsive: {
    //             0: {
    //                 items: 1,
    //                 nav: true
    //             },
    //             300: {
    //                 items: 1,
    //                 nav: true,
    //             },
    //             1600: {
    //                 items: 1,
    //                 nav: true,
    //             }
    //         }
    //     })
    // });



    // $(".pop_btn2").click(function() {
    //     var owl = $(".pop_slide").data('owlCarousel');
    //     owl.next() // Go to next slide
    // });
    // $(".pop_btn1").click(function() {
    //     var owl = $(".pop_slide").data('owlCarousel');
    //     owl.prev() // Go to previous slide
    // });

    

//     $(document).ready(function() {
//     $('.fancybox-media')

//         .attr('rel', 'media-gallery')

//         .fancybox({

//             openEffect: 'none',

//             closeEffect: 'none',

//             prevEffect: 'none',

//             nextEffect: 'none',



//             arrows: true,

//             helpers: {

//                 media: {},

//                 buttons: {}

//             }

//         });



// });
</script>
<script>
    $.fn.andSelf = function() {
        return this.addBack.apply(this, arguments);
    }
    $(document).ready(function() {
        $(".pop_close").click(function() {
            $(".pop_side").fadeOut();
        });
    });
    
    
     
    
</script>
<script>


    
    
    $(document).ready(function() {
        $(".u-vmenu").vmenuModule({
            Speed: 200,
            autostart: false,
            autohide: true
        });
    });
</script>
<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.header_side').addClass("scroll_header");
        } else {
            $('.header_side').removeClass("scroll_header");
        }
    });
        $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.fixed_menu').addClass("fixed_menu_");
        } else {
            $('.fixed_menu').removeClass("fixed_menu_");  
        }
    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.main_mmenu').addClass("main_mmenu_");
        } else {
            $('.main_mmenu').removeClass("main_mmenu_");
        }
    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.info_hovering_area').addClass("info_hovering_area_");
        } else {
            $('.info_hovering_area').removeClass("info_hovering_area_");
        }
    });
</script>
<script>
    $(document).ready(function() {
        $(".header_top_right_btn1").click(function() {
            $(".info_hovering_area").fadeIn();
            $(".col_menu").fadeOut();
        });
    });
    $(document).ready(function() {
        $(".removeCartproduct").click(function() {
            $(".info_hovering_area").fadeOut();
        });
    });
</script>
<script>
    // function collision($div1, $div2) {
    //     var x1 = $div1.offset().left;
    //     var w1 = 40;
    //     var r1 = x1 + w1;
    //     var x2 = $div2.offset().left;
    //     var w2 = 40;
    //     var r2 = x2 + w2;
    //     if (r1 < x2 || x1 > r2) return false;
    //     return true;
    // }
    // // // slider call
    // $('#slider').slider({
    //     range: true,
    //     min: 0,
    //     max: 6000,
    //     values: [0, 6000],
    //     slide: function(event, ui) {
    //         $('.ui-slider-handle:eq(0) .price-range-min').html('PKR ' + ui.values[0]);
    //         $('.ui-slider-handle:eq(1) .price-range-max').html('PKR ' + ui.values[1]);
    //         $('.price-range-both').html('<i>PKR ' + ui.values[0] + ' - </i>PKR ' + ui.values[1]);
    //         //
    //         if (ui.values[0] == ui.values[1]) {
    //             $('.price-range-both i').css('display', 'none');
    //         } else {
    //             $('.price-range-both i').css('display', 'inline');
    //         }
    //         //
    //         if (collision($('.price-range-min'), $('.price-range-max')) == true) {
    //             $('.price-range-min, .price-range-max').css('opacity', '0');
    //             $('.price-range-both').css('display', 'block');
    //         } else {
    //             $('.price-range-min, .price-range-max').css('opacity', '1');
    //             $('.price-range-both').css('display', 'none');
    //         }
    //     }
    // });
    // $('.ui-slider-range').append('<span class="price-range-both value"><i>PKR ' + $('#slider').slider('values', 0) + ' - </i>' + $('#slider').slider('values', 1) + '</span>');
    // $('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">PKR ' + $('#slider').slider('values', 0) + '</span>');
    // $('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">PKR ' + $('#slider').slider('values', 1) + '</span>');
    </script>
    <script>
    $('.click1').click(function() {
        $('.click2').slideToggle();
    });
    </script>
    <script>
    $('.click3').click(function() {
        $('.click4').slideToggle();
    });
    </script>
    <script>
    $('#open1').click(function() {
        $('#open3').fadeIn();
    });
    $('.col6_select2_top').click(function() {
        $('#open3').fadeOut();
    });
    $('.squaredThree').click(function() {
    $(".squaredThree label").toggleClass("squaredThree_label");
    });
    $('#open2').click(function() {
        $('#open4').slideDown();
    });
    $(document).mouseup(function(e) {
        var container = $(".price_box_select");
        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.slideUp();
        }
    });
    </script>
<script>
    $('.header-2').unbind('click').bind('click', function(e) {
        $("html, body").animate({ scrollTop: 0 }, 1000);
        $("#col_menu").fadeToggle();
        $(".info_hovering_area").fadeOut();
    });
    $('.close_side').bind('click', function(e) {
        $("#col_menu").fadeOut();
    });
    $('#scroll_responsive_section').on('click', '#search_btn_responsive', function(event) {
        /* Act on the event */
        $("html, body").animate({ scrollTop: 0 }, 1000);
    });
</script>

<script>
    $('#cart_side').on('click', '#back_to_store', function(event) {
        event.preventDefault();

        /* hide the overlay */
        $( "#cart_side" ).animate({ "right": "-500px" }, "slow", function() {
            /* stuff to do after animation is complete */
            $('#overlay_container').hide();
            $('.overlay').hide();
        });

    });
</script>



<style>
.overlay_cart {
    position: absolute;
    top: 5%;
    right: 0;
    z-index: 1000;
    background: #FFF;        
}

.removeCartproduct_2017 {
    width: 22px;
    height: 22px;
    background: #edefec;
    border-radius: 50px;
    text-align: center;
    padding: 2px 0;
    cursor: pointer;
    position: absolute;
    left: 0px;
    top: 55px;
}
</style>

<script>
    $(document).ready(function () {
        $("#info").click(function () {
            $("#cart_open").hide();
            $("#info_open").fadeToggle(800);
        });

        // $("#responsive_popup_menu").click(function () {
        //     $("#info_open_responsive").fadeToggle(800);
        // });

    });

    // $(document).ready(function () {
    //     $("#cart,#responsive_cart_menu").click(function () {
    //         $("#info_open").hide();
    //         $("#cart_open").fadeToggle(800);
    //         $("#cart_open_responsive").fadeToggle(800);
    //     });
    // });


    $(document).ready(function() {
        $('.header').on('click', '#cart_menu_close, #info_open_close', function(event) {
            /* Act on the event */
            if(this.id == 'cart_menu_close'){
                $('#cart_open').fadeOut(800);
                $('#cart_open_responsive').fadeOut(800);
            } else if (this.id == 'info_open_close') {
                $('#info_open').fadeOut(800);
            }

        });


        // $('#page').on('click', '#cart_menu_responsive_close, #info_open_responsive_close', function(event) {

        //     if (this.id == 'cart_menu_responsive_close') {
        //         $('#cart_open_responsive').fadeOut(800);
        //         $('#cart_open').fadeOut(800);
        //     } else if (this.id == 'info_open_responsive_close') {
        //         $('#info_open_responsive').fadeOut(800);
        //     }

        // });


    });

</script>
<script src="<?php echo WEB_URL ?>/js/classie.js"></script>
<script src="<?php echo WEB_URL ?>/js/sidebarEffects.js"></script>
<script defer="defer" src="<?php echo WEB_URL ?>/js/lazy-load-images.min.js"></script>
<script src="<?php echo WEB_URL ?>/js/script.js"></script>

<script>
    <?php

    // ERROR PROOFING / Initializing FOR pId
    $pId = isset( $pId ) ? $pId : null;

    ?>
    $(function() {
        $('#customForm_<?php echo $pId; ?>').attr('disabled', 'disabled');
////////////////////////////////// CSS ////////////////////////////////////
        $('.checkbox').parents('div.form-group').css({
            'text-align': 'center',
            'width': '35%',
            'margin': 'auto'
        });
        $('.checkbox').parent().css('width', '50%');
        $('#custom_submit').parent().css({
            'width': '50%',
            'text-align': 'center',
            'margin-top': '10px'
        });
        $('.modal-body').css('text-align', 'center');
////////////////////////////////// CSS END ////////////////////////////////
        $('#continue_shopping').click( function() {

            // $('#customF_<?php echo $pId; ?>').hide();
            // $('#customF_<?php echo $pId; ?>').attr('aria-hidden', 'true');
            // $('#customF_<?php echo $pId; ?>').attr('data-dismiss', 'modal');
            // $('.modal-backdrop').css('opacity', '0');



            // $('.modal-backdrop').remove();
            $('#custom_size_button').trigger( "click" );


            console.log('Clicked Continue Shopping Btn');
        } );
    });

    $("#custom_check").click(function() {
        // this function will get executed every time the #home element is clicked (or tab-spacebar changed)
        if($(this).is(":checked")) // "this" refers to the element that fired the event
        {

            $('.checkbox').parents('div.form-group').css({
                'background-color': '#FFF',
                'border': 'none'
            });
            $('#custom_check').parent().css('background-color', '#FFF');
            // alert('home is checked');

        }
    });

    var check_status = null;
    $(document).ready(function() {

        $('#submit_vieworder').click(function(event) {
            /* Act on the event */
            if( $('#order_invoice_4').val().length == 0 ) {
                $('#order_invoice_4').css('border', '1px solid red');
            } else {
                $('#submit_vieworder').attr({
                    'data-toggle': 'modal',
                    'data-target': '#customF_vieworder'
                });
                $('#order_invoice_4').css('border', 'none');
            }
            if(!check_status) {
                event.preventDefault();
            }

        });


        $('#custom_submit').click(function(event) {
            /* Act on the event */
            if( $('#custom_check').is(":checked") ) {
                check_status = true;
                $( "#submit_vieworder" ).trigger( "click" );
            } else {
                $('#custom_check').parent().css('background-color', '#D24945');
            }

        });


    });

</script>

<script>
    window.console = window.console || function(t) {};

    // $("#accordion").on('click', 'a', function(event) {
    //   /* Act on the event */
    //   console.log($(this).attr('href'));
    //   // window.location = $(this).attr('href');
    //   // return false;
    // });

    // //capture the click on the a tag
    // $("#accordion h4 a").click(function() {
    //   window.location = $(this).attr('href');
    //   return false;
    // });


</script>
<?php
echo $productClass->productQuickViewModel();
echo $productClass->couponOfferOnVisit();
echo $productClass->afterAddToCart_show_goToCart_option();
// echo $functions->ibms_setting('footerScript');
// echo $productClass->cart_popup_submit();


echo $productClass->checkout_popup_stock();


?>

<script>
    $(function() {
        // $('.lazy').lazy();
        // $('video').lazy();
    });
<?php ############# INITIALIZING TOOLTIP JS ############### 
    // $(function () {
      // $('[data-toggle="tooltip"]').tooltip();
    // })
?>
</script>

<script>
// $(document).ready(function() {
// $(".u-vmenu").vmenuModule({
// Speed: 200,
// autostart: true,
// autohide: true
// });
// });
$(function() {
$("#accordion1").accordion();
});
</script>



<script>

$('.sort_icons').click(function(event) {
var a = $(this).data('id');

if(a == 'Grid'){
$('.col1_right').removeClass('col1_right_main');
$('.col1_right').removeClass('col1_right_main1');
$('.sort_icons1').addClass('active_btn');
$('.sort_icons3').removeClass('active_btn');
}else if(a == 'List'){
$('.col1_right').addClass('col1_right_main');
$('.col1_right').addClass('col1_right_main1');
$('.sort_icons3').addClass('active_btn');
$('.sort_icons1').removeClass('active_btn');
}   
});

$('#limit_sub').click(function(event) {
var form = $('#from_limit').serialize();

$.ajax({
url: 'products.php?pro_limit=true',
type: 'post',
data: form,
})
.done(function(res) {
location.reload();
});


});

$('#limit_subMob').click(function(event) {
var form = $('#from_limitMob').serialize();

$.ajax({
url: 'products.php?pro_limit=true',
type: 'post',
data: form,
})
.done(function(res) {
location.reload();
});


});





$('.productSortBy').change(function(){
var val = $(this).val();
$.ajax({
url: 'products.php?pro_sort=true',
type: 'post',
data: {sortBy: val},
})
.done(function(res) {
location.reload();
});
});

function priceFilter(){
var minVal = $('#priceMin').val();
var maxVal = $('#priceMax').val();

var priceRange = [minVal,maxVal];
var arraytoString = priceRange.toString();

$.ajax({
url: 'products.php?pri_range=true',
type: 'post',
data: {'minVal' : minVal, 'maxVal' : maxVal},
})
.done(function(res) {
location.reload();
});
}

function priceFilterNew(abc){
// var minVal = $('#priceMin').val();
// var maxVal = $('#priceMax').val();



if (abc == "99") {

var minVal = '1';
var priceRange = [1,abc];

}else if(abc == "150"){
var minVal = '99';
var priceRange = [99,abc];

} else if(abc == "250"){
var minVal = '150';
var priceRange = [150,abc];

} else if(abc == "500"){
var minVal = '250';
var priceRange = [250,abc];

} else if(abc == "9999"){
var minVal = '999';
var priceRange = [999,abc];

}



// var priceRange = [minVal,maxVal];
// var arraytoString = priceRange.toString();

$.ajax({
url: 'products.php?pri_range=true',
type: 'post',
data: {'minVal' : minVal, 'maxVal' : abc},
})
.done(function(res) {
// location.reload();









var values = $(".txt_search1").val();
// var idis = $(this).attr('id');


// console.log(values+'klarna');
$.ajax({
type: "POST",
url: "<?php echo WEB_URL;?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
data: {val:values},
beforeSend: function(){
},
success: function(data){
// $(".col3_main").hide();
// $(".col3_top").hide();
// $(".col5").hide();
// $(".col6").hide();
// $(".col1_right section").hide();
// $(".col1_right .container-fluid").hide();
// $(".add_to_cart_main_pic_slide").hide();
// $(".add_to_cart_main_pic_responsive").hide();
// $(".add_product_to_cart").hide();
// $(".tabs_main_side").hide();
// $(".col3_main").hide();
// $(".col2").hide();
$(".col3_main_all").html(data);
// console.log(data);
// linknew(values);
}
});





});
}



function priceFilterMob(){
var minVal = $('#priceMins').val();
var maxVal = $('#priceMaxs').val();

var priceRange = [minVal,maxVal];
var arraytoString = priceRange.toString();
//console.log("Min Val: "+minVal+" MAx Val: "+maxVal);

$.ajax({
url: 'products.php?pri_range=true',
type: 'post',
data: {'minVal' : minVal, 'maxVal' : maxVal},
})
.done(function(res) {
location.reload();
});

//console.log("Array: "+arraytoString);
}

$('input[name=cb1]').change(function(event) {
var form = $(this).val();
var test = $(".checkboxDesk1:checked").map(function() {return this.value;}).get().join(',');

// console.log(form);

// console.log(test);


// console.log("abcd");


$.ajax({
url: 'products.php?size_filter=true',
type: 'post',
data: {'sizeArray' : test},
})
.done(function(res) {
// location.reload();
// console.log("Doneeeeeeeeeeeeee");
var values = $(".txt_search").val();
// var idis = $(this).attr('id');


// console.log(values+'klarna');
$.ajax({
type: "POST",
url: "<?php echo WEB_URL;?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
data: {val:values},
beforeSend: function(){
},
success: function(data){
// $(".col3_main").hide();
// $(".col3_top").hide();
// $(".col5").hide();
// $(".col6").hide();
// $(".col1_right section").hide();
// $(".col1_right .container-fluid").hide();
// $(".add_to_cart_main_pic_slide").hide();
// $(".add_to_cart_main_pic_responsive").hide();
// $(".add_product_to_cart").hide();
// $(".tabs_main_side").hide();
// $(".col3_main").hide();
// $(".col2").hide();
$(".col3_main_all").html(data);
// console.log(data);
// linknew(values);
//  $(".txt_search").val(values);
 $('.col7').parents(".col7_side_popup").removeClass("col7_side_popup_");
}
});




});


});

$('input[name=cb2]').change(function(event) {
var test = $(".checkboxMob:checked").map(function() {return this.value;}).get().join(',');

$.ajax({
url: 'products.php?size_filter=true',
type: 'post',
data: {'sizeArray' : test},
})
.done(function(res) {
location.reload();
});


});







$('input[name=l2]').change(function(event) {
var test = $(".add:checked").val();
// console.log(test);

$.ajax({
url: 'products.php?pro_sort=true',
type: 'post',
data: {sortBy: test},
})
.done(function(res) {
// location.reload();



var values = $(".txt_search").val();
// var idis = $(this).attr('id');


// console.log(values+'klarna');
$.ajax({
type: "POST",
url: "<?php echo WEB_URL;?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
data: {val:values},
beforeSend: function(){
},
success: function(data){
// $(".col3_main").hide();
// $(".col3_top").hide();
// $(".col5").hide();
// $(".col6").hide();
// $(".col1_right section").hide();
// $(".col1_right .container-fluid").hide();
// $(".add_to_cart_main_pic_slide").hide();
// $(".add_to_cart_main_pic_responsive").hide();
// $(".add_product_to_cart").hide();
// $(".tabs_main_side").hide();
// $(".col3_main").hide();
// $(".col2").hide();
$(".col3_main_all").html(data);
// console.log(data);
// linknew(values);
}
});





});



});




$('input[name=l1]').change(function(event) {
var test = $(".licheck:checked").val();


window.location.replace('<?php echo  WEB_URL ?>/'+test);


// console.log(test);
// exit();

// $.ajax({
// url: 'products.php?size_filter=true',
// type: 'post',
// data: {'sizeArray' : test},s
// })
// .done(function(res) {
// location.reload();
// });


});


$('#btn_cart').on('click', function(e){
e.preventDefault();
form = $('#denied_cart').serialize();

var empt = $("#invEmail").val();

if (empt == "" || empt == " ")  
{  

console.log(empt+'sssssssssssssssssssss');
jAlertifyAlert('<?php echo $dbF->hardWords('Please input a Value.'); ?>');


return false;  
} 




            $.ajax({
                url: 'ajax_call.php?page=cart_denied',
                type: 'post',
                data: form
            }).done(function(res){
                // onPopupClose();
                if(res == '1'){
 $('#CheckoutSubscription').modal('toggle');
}else{
}
            });
        });









$('.reset_btn').click(function(event) {

$.ajax({
url: 'products.php?unsetSession=true',
type: 'post'
})
.done(function(res) {
location.reload();
});

});

$('.productSortByMob a').click(function(event) {
var val = $(this).data('id');

$.ajax({
url: 'products.php?pro_sort=true',
type: 'post',
data: {sortBy: val},
})
.done(function(res) {
location.reload();
});
});




$('.new li a').click(function(event) {
var val = $(this).data('id');
// console.log("11111112333333333333333");
$.ajax({
url: 'products.php?pro_sort=true',
type: 'post',
data: {sortBy: val},
})
.done(function(res) {
// location.reload();



var values = $(".txt_search1").val();
// var idis = $(this).attr('id');


// console.log(values+'klarna');
$.ajax({
type: "POST",
url: "<?php echo WEB_URL;?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
data: {val:values},
beforeSend: function(){
},
success: function(data){
// $(".col3_main").hide();
// $(".col3_top").hide();
// $(".col5").hide();
// $(".col6").hide();
// $(".col1_right section").hide();
// $(".col1_right .container-fluid").hide();
// $(".add_to_cart_main_pic_slide").hide();
// $(".add_to_cart_main_pic_responsive").hide();
// $(".add_product_to_cart").hide();
// $(".tabs_main_side").hide();
// $(".col3_main").hide();
// $(".col2").hide();
$(".col3_main_all").html(data);
// console.log(data);
// linknew(values);
}
});





});
});




$('.productPrices input').click(function(event) {
var val = $(this).data('id');
// console.log("ssssssssssssssssss");


if (val == "99") {

priceFilterNew('99');

}else if(val == "150"){

priceFilterNew('150');

} else if(val == "250"){

priceFilterNew('250');

}


else if(val == "500"){

priceFilterNew('500');

}



else if(val == "9999"){

priceFilterNew('9999');

}

// $.ajax({
// url: 'products.php?pro_sort=true',
// type: 'post',
// data: {sortBy: val},
// })
// .done(function(res) {
// location.reload();
// });
});


$('.new2 li a').click(function(event) {
var val = $(this).data('id');
// console.log("yesssssssss333333333333333333ssssssssssssssssss");
if (val == "99") {

priceFilterNew('99');

}else if(val == "150"){

priceFilterNew('150');

} else if(val == "250"){

priceFilterNew('250');

}


else if(val == "500"){

priceFilterNew('500');

}



else if(val == "9999"){

priceFilterNew('9999');

}

// $.ajax({
// url: 'products.php?pro_sort=true',
// type: 'post',
// data: {sortBy: val},
// })
// .done(function(res) {
// location.reload();
// });
});


$('.mobil_size li a').click(function(event) {
var form = $(this).data('id');


var test = $(this).data('id');

$.ajax({
url: 'products.php?size_filter=true',
type: 'post',
data: {'sizeArray' : test},
})
.done(function(res) {



var values = $(".txt_search1").val();
// var idis = $(this).attr('id');


// console.log(values+'klarna');
$.ajax({
type: "POST",
url: "<?php echo WEB_URL;?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
data: {val:values},
beforeSend: function(){
},
success: function(data){
// $(".col3_main").hide();
// $(".col3_top").hide();
// $(".col5").hide();
// $(".col6").hide();
// $(".col1_right section").hide();
// $(".col1_right .container-fluid").hide();
// $(".add_to_cart_main_pic_slide").hide();
// $(".add_to_cart_main_pic_responsive").hide();
// $(".add_product_to_cart").hide();
// $(".tabs_main_side").hide();
// $(".col3_main").hide();
// $(".col2").hide();
$(".col3_main_all").html(data);
// console.log(data);
// linknew(values);


}
});




});
});
</script>
</body>

</html>