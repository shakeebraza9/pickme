<?php
global $webClass;
global $functions;
global $_e;
global $webClass;
global $db;
//No Need to define global it is just for PHPstrom suggestion list...
?>
<footer class="wow fadeInUp">
    <div class="col5">
        <div class="standard">
            <div class="footer_links">

            </div>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="standard">
            <div class="footer_bottom_left">




            </div><!-- footer_bottom_left close -->
            <?php //echo $webClass->ourLogo(); 
            ?>
            <!-- imedia close -->
            <div class="chat_box">

            </div>
        </div>
    </div>
    <!-- footer_bottom close -->
</footer>
</div>
  <script src="<?php echo WEB_URL ?>/Js/jquery-3.6.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
  <script src="<?php echo WEB_URL ?>/Js/mmenu.min.all.js"></script>
  <script src="<?php echo WEB_URL ?>/Js/jquery.easing.1.3.js"></script>
  <script src="<?php echo WEB_URL ?>/Js/jquery.fancybox.js"></script>
  <script src="<?php echo WEB_URL ?>/Js/WOW.js"></script>
  <script src="https://use.fontawesome.com/eecfb424a6.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo WEB_URL ?>/Js/script.js"></script>




<!--############################## JS FILES #################################-->
<script defer="defer" src="<?php echo WEB_URL ?>/assets/alertify/lib/alertify.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo WEB_URL ?>/js/flexmenu.min.js"></script>
<!-- <script type="text/javascript" defer="defer" src="<?php echo WEB_URL ?>/js/jquery.easing.js"></script> -->

<script type="text/javascript" defer="defer" src="<?php echo WEB_URL ?>/js/jquery.fancybox.js"></script>

<script type="text/javascript" defer="defer" src="<?php echo WEB_URL ?>/js/webJs.js"></script>

<script type="text/javascript" defer="defer" src="<?php echo WEB_URL ?>/js/category2.js"></script>
<script defer="defer" src="<?php echo WEB_URL ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<!--############################## JS FILES END #################################-->

<script>
    $(document).ready(function() {
        var bannerLeft = $('.leftImg').length;
        var bannerRight = $('.rightImg').length;

        if (bannerLeft > 1) {
            banner_left_true = true;
        } else {
            banner_left_true = false;
        }

        if (bannerRight > 1) {
            banner_right_true = true;
        } else {
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
        if (col_all2.length > 0) {
            col_all2_true = true;
        } else {
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
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
        $("#col_menu").fadeToggle();
        $(".info_hovering_area").fadeOut();
    });
    $('.close_side').bind('click', function(e) {
        $("#col_menu").fadeOut();
    });
    $('#scroll_responsive_section').on('click', '#search_btn_responsive', function(event) {
        /* Act on the event */
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
    });
</script>

<script>
    $('#cart_side').on('click', '#back_to_store', function(event) {
        event.preventDefault();

        /* hide the overlay */
        $("#cart_side").animate({
            "right": "-500px"
        }, "slow", function() {
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
    $(document).ready(function() {
        $("#info").click(function() {
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
            if (this.id == 'cart_menu_close') {
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
<script src="<?php echo WEB_URL ?>/js/jquery.ulslide.js"></script>
<script src="<?php echo WEB_URL ?>/js/jquery.easing.js"></script>
<script src="<?php echo WEB_URL ?>/js/wow.min.js"></script>
<script src="<?php echo WEB_URL ?>/js/mmenu.min.all.js"></script>
<script src="<?php echo WEB_URL ?>/js/owl.carousel.js"></script>
<script src="<?php echo WEB_URL ?>/js/vmenuModule.js"></script>
<script src="<?php echo WEB_URL ?>/js/jquery.filedrop.js"></script>
<script src="<?php echo WEB_URL ?>/js/script.js"></script>
<script src="<?php echo WEB_URL ?>/js/script1.js"></script>



<?php

// ERROR PROOFING / Initializing FOR pId
$pId = isset($pId) ? $pId : null;

?>
<script>
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
        $('#continue_shopping').click(function() {

            // $('#customF_<?php echo $pId; ?>').hide();
            // $('#customF_<?php echo $pId; ?>').attr('aria-hidden', 'true');
            // $('#customF_<?php echo $pId; ?>').attr('data-dismiss', 'modal');
            // $('.modal-backdrop').css('opacity', '0');



            // $('.modal-backdrop').remove();
            $('#custom_size_button').trigger("click");


            console.log('Clicked Continue Shopping Btn');
        });
    });

    $("#custom_check").click(function() {
        // this function will get executed every time the #home element is clicked (or tab-spacebar changed)
        if ($(this).is(":checked")) // "this" refers to the element that fired the event
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
            if ($('#order_invoice_4').val().length == 0) {
                $('#order_invoice_4').css('border', '1px solid red');
            } else {
                $('#submit_vieworder').attr({
                    'data-toggle': 'modal',
                    'data-target': '#customF_vieworder'
                });
                $('#order_invoice_4').css('border', 'none');
            }
            if (!check_status) {
                event.preventDefault();
            }

        });


        $('#custom_submit').click(function(event) {
            /* Act on the event */
            if ($('#custom_check').is(":checked")) {
                check_status = true;
                $("#submit_vieworder").trigger("click");
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

        if (a == 'Grid') {
            $('.col1_right').removeClass('col1_right_main');
            $('.col1_right').removeClass('col1_right_main1');
            $('.sort_icons1').addClass('active_btn');
            $('.sort_icons3').removeClass('active_btn');
        } else if (a == 'List') {
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





    $('.productSortBy').change(function() {
        var val = $(this).val();
        $.ajax({
                url: 'products.php?pro_sort=true',
                type: 'post',
                data: {
                    sortBy: val
                },
            })
            .done(function(res) {
                location.reload();
            });
    });

    function priceFilter() {
        var minVal = $('#priceMin').val();
        var maxVal = $('#priceMax').val();

        var priceRange = [minVal, maxVal];
        var arraytoString = priceRange.toString();

        $.ajax({
                url: 'products.php?pri_range=true',
                type: 'post',
                data: {
                    'minVal': minVal,
                    'maxVal': maxVal
                },
            })
            .done(function(res) {
                location.reload();
            });
    }

    function priceFilterNew(abc) {
        // var minVal = $('#priceMin').val();
        // var maxVal = $('#priceMax').val();



        if (abc == "99") {

            var minVal = '1';
            var priceRange = [1, abc];

        } else if (abc == "150") {
            var minVal = '99';
            var priceRange = [99, abc];

        } else if (abc == "250") {
            var minVal = '150';
            var priceRange = [150, abc];

        } else if (abc == "500") {
            var minVal = '250';
            var priceRange = [250, abc];

        } else if (abc == "9999") {
            var minVal = '999';
            var priceRange = [999, abc];

        }



        // var priceRange = [minVal,maxVal];
        // var arraytoString = priceRange.toString();

        $.ajax({
                url: 'products.php?pri_range=true',
                type: 'post',
                data: {
                    'minVal': minVal,
                    'maxVal': abc
                },
            })
            .done(function(res) {
                // location.reload();









                var values = $(".txt_search1").val();
                // var idis = $(this).attr('id');


                // console.log(values+'klarna');
                $.ajax({
                    type: "POST",
                    url: "<?php echo WEB_URL; ?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
                    data: {
                        val: values
                    },
                    beforeSend: function() {},
                    success: function(data) {
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



    function priceFilterMob() {
        var minVal = $('#priceMins').val();
        var maxVal = $('#priceMaxs').val();

        var priceRange = [minVal, maxVal];
        var arraytoString = priceRange.toString();
        //console.log("Min Val: "+minVal+" MAx Val: "+maxVal);

        $.ajax({
                url: 'products.php?pri_range=true',
                type: 'post',
                data: {
                    'minVal': minVal,
                    'maxVal': maxVal
                },
            })
            .done(function(res) {
                location.reload();
            });

        //console.log("Array: "+arraytoString);
    }

    $('input[name=cb1]').change(function(event) {
        var form = $(this).val();
        var test = $(".checkboxDesk1:checked").map(function() {
            return this.value;
        }).get().join(',');

        // console.log(form);

        // console.log(test);


        // console.log("abcd");


        $.ajax({
                url: 'products.php?size_filter=true',
                type: 'post',
                data: {
                    'sizeArray': test
                },
            })
            .done(function(res) {
                // location.reload();
                // console.log("Doneeeeeeeeeeeeee");
                var values = $(".txt_search").val();
                // var idis = $(this).attr('id');


                // console.log(values+'klarna');
                $.ajax({
                    type: "POST",
                    url: "<?php echo WEB_URL; ?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
                    data: {
                        val: values
                    },
                    beforeSend: function() {},
                    success: function(data) {
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
        var test = $(".checkboxMob:checked").map(function() {
            return this.value;
        }).get().join(',');

        $.ajax({
                url: 'products.php?size_filter=true',
                type: 'post',
                data: {
                    'sizeArray': test
                },
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
                data: {
                    sortBy: test
                },
            })
            .done(function(res) {
                // location.reload();



                var values = $(".txt_search").val();
                // var idis = $(this).attr('id');


                // console.log(values+'klarna');
                $.ajax({
                    type: "POST",
                    url: "<?php echo WEB_URL; ?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
                    data: {
                        val: values
                    },
                    beforeSend: function() {},
                    success: function(data) {
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
                        $(".col9_main").html(data);
                        // console.log(data);
                        // linknew(values);
                    }
                });





            });



    });




    $('input[name=l1]').change(function(event) {
        var test = $(".licheck:checked").val();


        window.location.replace('<?php echo  WEB_URL ?>/' + test);


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


    $('#btn_cart').on('click', function(e) {
        e.preventDefault();
        form = $('#denied_cart').serialize();

        var empt = $("#invEmail").val();

        if (empt == "" || empt == " ") {

            console.log(empt + 'sssssssssssssssssssss');
            jAlertifyAlert('<?php echo $dbF->hardWords('Please input a Value.'); ?>');


            return false;
        }




        $.ajax({
            url: 'ajax_call.php?page=cart_denied',
            type: 'post',
            data: form
        }).done(function(res) {
            // onPopupClose();
            if (res == '1') {
                $('#CheckoutSubscription').modal('toggle');
            } else {}
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
                data: {
                    sortBy: val
                },
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
                data: {
                    sortBy: val
                },
            })
            .done(function(res) {
                // location.reload();



                var values = $(".txt_search1").val();
                // var idis = $(this).attr('id');


                // console.log(values+'klarna');
                $.ajax({
                    type: "POST",
                    url: "<?php echo WEB_URL; ?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
                    data: {
                        val: values
                    },
                    beforeSend: function() {},
                    success: function(data) {
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

        } else if (val == "150") {

            priceFilterNew('150');

        } else if (val == "250") {

            priceFilterNew('250');

        } else if (val == "500") {

            priceFilterNew('500');

        } else if (val == "9999") {

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

        } else if (val == "150") {

            priceFilterNew('150');

        } else if (val == "250") {

            priceFilterNew('250');

        } else if (val == "500") {

            priceFilterNew('500');

        } else if (val == "9999") {

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




    $('.cart_txt').click(function(event) {

        location.replace('cart');


    });
    $('.mobil_size li a').click(function(event) {
        var form = $(this).data('id');


        var test = $(this).data('id');

        $.ajax({
                url: 'products.php?size_filter=true',
                type: 'post',
                data: {
                    'sizeArray': test
                },
            })
            .done(function(res) {



                var values = $(".txt_search1").val();
                // var idis = $(this).attr('id');


                // console.log(values+'klarna');
                $.ajax({
                    type: "POST",
                    url: "<?php echo WEB_URL; ?>/_models/functions/products_ajax_functions.php?page=getSearchJsonDiv123",
                    data: {
                        val: values
                    },
                    beforeSend: function() {},
                    success: function(data) {
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