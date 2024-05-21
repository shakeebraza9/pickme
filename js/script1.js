// wow
new WOW().init();
// wow
// banner
$(function() {
    $('#banner').ulslide({
        effect: {
            type: 'crossfade', // slide or fade
            axis: 'x', // x, y
            showCount: 0,
            distance: 20
        },
        pager: '#slide-pager a',
        nextButton: '.all1_left',
        prevButton: '.all1_right',
        duration: 900,
        mousewheel: true,
        autoslide: 5000,
        animateOut: 'zoomout',
        animateIn: 'zoomIn',
    });
});

// menu
jQuery(document).ready(function($) {
    $("#menu").mmenu({
        "extensions": ["effect-menu-zoom", "effect-panels-zoom", "pagedim-black", "theme-dark"],
        "offCanvas": {
            "position": "left"
        },
        "counters": true,
        "iconPanels": true,
        "navbars": [{
            "position": "top"
        }]
    });
});
// menu close

//product_detail

$(document).ready(function() {
    $('.all7').owlCarousel({
        loop: true,
        navigation: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        items: 4,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                nav: true
            },
            300: {
                items: 2,
                nav: false
            },
            400: {
                items: 2,
                nav: false
            },
            500: {
                items: 2,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            750: {
                items: 3,
                nav: true,
            },
            800: {
                items: 3,
                nav: true,
            },
            900: {
                items: 3,
                nav: true,
            },
            1000: {
                items: 4,
                nav: true,
            },
            1200: {
                items: 4,
                nav: true,
            },
            1280: {
                items: 4,
                nav: true,
            }
        }
    })
});
$(".left_btn1").click(function() {
    var owl = $(".all7");
    owl.trigger('next.owl.carousel');// Go to next slide
});
$(".right_btn1").click(function() {
    var owl = $(".all7");
    owl.trigger('prev.owl.carousel'); // Go to previous slide
});

//tab
$('.select').click(function() {
    $(".select_main_box").toggleClass("select_main_box_");
});

$(".tabs").tabs();


//all6
$(document).ready(function() {
    $('.all6').owlCarousel({
        loop: true,
        navigation: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        items: 3,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                nav: true
            },
            460: {
                items: 2,
                nav: true,
            },
            600: {
                items: 2,
                nav: true,
            },
            768: {
                items: 3,
                nav: true,
            },
            900: {
                items: 3,
                nav: true,
            },
            1000: {
                items: 4,
                nav: true,
            },
            1200: {
                items: 4,
                nav: true,
            },
            1280: {
                items: 4,
                nav: true,
            }
        }
    })
});


$(".all6_right").click(function() {
    var owl = $(".all6");
     owl.trigger('prev.owl.carousel'); // Go to next slide
});
$(".all6_left").click(function() {
    var owl = $(".all6");
    owl.trigger('next.owl.carousel');// Go to previous slide
});
// all6

//all5
$(document).ready(function() {
    $('.all5').owlCarousel({
        loop: true,
        navigation: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        items: 3,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            300: {
                items: 1,
                nav: false
            },
            400: {
                items: 1,
                nav: false
            },
            500: {
                items: 1,
                nav: false
            },
            600: {
                items: 1,
                nav: false
            },
            750: {
                items: 1,
                nav: true,
            },
            800: {
                items: 1,
                nav: true,
            },
            900: {
                items: 1,
                nav: true,
            },
            1000: {
                items: 1,
                nav: true,
            },
            1200: {
                items: 1,
                nav: true,
            },
            1280: {
                items: 1,
                nav: true,
            }
        }
    })
});


$(".left_btn122").click(function() {
    var owl = $(".all5").data('owlCarousel');
    owl.next() // Go to next slide
});
$(".right_btn122").click(function() {
    var owl = $(".all5").data('owlCarousel');
    owl.prev() // Go to previous slide
});


// document.addEventListener("DOMContentLoaded", function() {
//   const buyButton = document.querySelector(".buy-button");
//   const modal = document.getElementById("cod-modal");
//   const closeButton = modal.querySelector(".close-button");

//   buyButton.addEventListener("click", function() {
//     modal.style.display = "block";
//   });

//   closeButton.addEventListener("click", function() {
//     modal.style.display = "none";
//   });

//   // Close the modal if the user clicks outside of it
//   window.addEventListener("click", function(event) {
//     if (event.target === modal) {
//       modal.style.display = "none";
//     }
//   });
// });

    function openModal() {
        const modal = document.getElementById("cod-modal");
        modal.style.display = "block";
    }

    function closeModal() {
        const modal = document.getElementById("cod-modal");
        modal.style.display = "none";
    }

    // Close the modal if the user clicks outside of it
    window.addEventListener("click", function(event) {
        const modal = document.getElementById("cod-modal");
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

// ------range slider------//


// ------range slider------//