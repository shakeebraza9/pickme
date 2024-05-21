    //Banner Slider
    // var tpj = jQuery;
    // var revapi204;
    // tpj(document).ready(function () {
    //     if (tpj("#rev_slider_204_1").revolution == undefined) {
    //         revslider_showDoubleJqueryError("#rev_slider_204_1");
    //     } else {
    //         revapi204 = tpj("#rev_slider_204_1")
    //             .show()
    //             .revolution({
    //                 sliderType: "standard",
    //                 jsFileLocation: "revolution/js/",
    //                 sliderLayout: "fullwidth",
    //                 dottedOverlay: "none",
    //                 delay: 9000,
    //                 navigation: {
    //                     keyboardNavigation: "off",
    //                     keyboard_direction: "horizontal",
    //                     mouseScrollNavigation: "off",
    //                     onHoverStop: "off",
    //                     touch: {
    //                         touchenabled: "on",
    //                         swipe_threshold: 75,
    //                         swipe_min_touches: 1,
    //                         swipe_direction: "horizontal",
    //                         drag_block_vertical: false,
    //                     },
    //                     arrows: {
    //                         style: "persephone",
    //                         enable: false,
    //                         hide_onmobile: true,
    //                         hide_under: 0,
    //                         hide_onleave: false,
    //                         tmp: "",
    //                         left: {
    //                             h_align: "left",
    //                             v_align: "center",
    //                             h_offset: 20,
    //                             v_offset: 0,
    //                         },
    //                         right: {
    //                             h_align: "right",
    //                             v_align: "center",
    //                             h_offset: 20,
    //                             v_offset: 0,
    //                         },
    //                     },
    //                     bullets: {
    //                         enable: false,
    //                         hide_onmobile: true,
    //                         hide_under: 600,
    //                         style: "metis",
    //                         hide_onleave: true,
    //                         hide_delay: 200,
    //                         hide_delay_mobile: 1200,
    //                         direction: "horizontal",
    //                         h_align: "center",
    //                         v_align: "bottom",
    //                         h_offset: 0,
    //                         v_offset: 30,
    //                         space: 5,
    //                         tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>',
    //                     },
    //                 },
    //                 viewPort: {
    //                     enable: true,
    //                     outof: "pause",
    //                     visible_area: "80%",
    //                 },
    //                 responsiveLevels: [1240, 1024, 778, 480],
    //                 visibilityLevels: [1240, 1024, 778, 480],
    //                 gridwidth: [1240, 1024, 778, 480],
    //                 gridheight: [700, 650, 600, 500],
    //                 lazyType: "none",
    //                 parallax: {
    //                     type: "mouse",
    //                     origo: "slidercenter",
    //                     speed: 2000,
    //                     levels: [
    //                         2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 46, 47, 48, 49, 50, 55,
    //                     ],
    //                     type: "mouse",
    //                 },
    //                 shadow: 0,
    //                 spinner: "off",
    //                 stopLoop: "off",
    //                 stopAfterLoops: -1,
    //                 stopAtSlide: -1,
    //                 shuffle: "off",
    //                 autoHeight: "off",
    //                 hideThumbsOnMobile: "on",
    //                 hideSliderAtLimit: 0,
    //                 hideCaptionAtLimit: 0,
    //                 hideAllCaptionAtLilmit: 0,
    //                 debugMode: false,
    //                 fallbacks: {
    //                     simplifyAll: "off",
    //                     nextSlideOnWindowFocus: "off",
    //                     disableFocusListener: false,
    //                 },
    //             });
    //     }
    // });


    // image upload js here
    


    $(document).ready(function () {
        const selectedFilesSets = []; // To store multiple sets of selected files
        let totalImagesDisplayed = 0; // To keep track of the total number of images displayed

        // Handle the dragover event on the "inner_upload_container" div
        $("#draggable-container").on("dragover", function (e) {
            e.preventDefault();
            $(this).addClass("dropping");
        });

        // Handle the dragleave event on the "inner_upload_container" div
        $("#draggable-container").on("dragleave", function () {
            // Add a delay before removing the dropping class
            setTimeout(() => {
                $(this).removeClass("dropping");
            }, 200); // Delay in milliseconds
        });

        // Handle the drop event on the "inner_upload_container" div
        // $("#draggable-container").on("drop", function (e) {
        //     e.preventDefault();
        //     $(this).removeClass("dropping");

        //     const files = e.originalEvent.dataTransfer.files; // Get all dropped files
        //     if (files && files.length > 0) {
        //         const selectedFiles = [...files]; // Store the selected files as a new set
        //         displaySelectedImages(selectedFiles); // Display selected images in the "selected-images" div
        //         selectedFilesSets.push(selectedFiles); // Store the set in the array
        //     }
        // });

        // Click event on the "custom-button" to trigger the file input
        $("#custom-button").on("click", function () {
            $("#real-file").click();
        });

        // Handle the file input change event
        $("#real-file").on("change", function () {
            const files = this.files;
            if (files && files.length > 0) {
                const selectedFiles = [...files]; // Store the selected files as a new set
                displaySelectedImages(selectedFiles); // Display selected images in the "selected-images" div
                selectedFilesSets.push(selectedFiles); // Store the set in the array
            }
        });

        // Event delegation for the delete button in the "selected-images" div
        $("#selected-images").on("click", ".delete-button", function () {
            const imageContainer = $(this).parent();
            const file = imageContainer.data("file");
            const setIndex = imageContainer.data("setIndex");

            // Remove the file from the set
            selectedFilesSets[setIndex].splice(selectedFilesSets[setIndex].indexOf(file), 1);
            imageContainer.remove(); // Remove the image container on delete
        });

        // Click event on the "Submit" button to post images to the grid
        $("#submit-button").on("click", function () {
            if (selectedFilesSets.length > 0) {
                displayImages(selectedFilesSets); // Display selected images in the image_div
                selectedFilesSets.length = 0; // Reset the selected files after uploading
                $("#selected-images").empty(); // Clear the "selected-images" div

                // Hide the submit button after submitting
                $(this).hide();
            }
        });

        // Function to display selected images in the "selected-images" div
        function displaySelectedImages(files) {
            const selectedImagesDiv = $("#selected-images");

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function (e) {
                    const image = $("<img>").attr("src", e.target.result);
                    const imageContainer = $("<div>").addClass("selected_image_container").append(image);
                    const deleteButton = $("<button>").addClass("delete-button fa fa-x").text(""); // New delete button
                    imageContainer.append(deleteButton); // Append delete button to image container
                    imageContainer.data("file", file); // Store the file object in the data attribute

                    // Event delegation for the delete button within the imageContainer
                    imageContainer.on("click", ".delete-button", function () {
                        const imageContainer = $(this).parent();
                        const file = imageContainer.data("file");
                        const setIndex = selectedFilesSets.findIndex((set) => set.includes(file));

                        // Remove the file from the set
                        selectedFilesSets[setIndex].splice(selectedFilesSets[setIndex].indexOf(file), 1);
                        imageContainer.remove(); // Remove the image container on delete
                    });

                    selectedImagesDiv.append(imageContainer); // Append image container to the selected images div
                };

                reader.readAsDataURL(file);
            }

            // Show the submit button when files are uploaded
            $("#submit-button").show();
        }

        // Function to display images in the image_div
        function displayImages(fileSets) {
            const imageGrid = $("#image-grid");
            const imageContainers = []; // Array to store image containers

            for (let i = 0; i < fileSets.length; i++) {
                const files = fileSets[i];

                for (let j = 0; j < files.length; j++) {
                    const file = files[j];
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const image = $("<img>").attr({
                            "src": e.target.result,
                            "alt": "Uploaded Image", // Example: Add an "alt" attribute
                            "data-id": j + 1, // Example: Add a custom "data-id" attribute,
                        });

                        const anchor = $("<a>").attr({
                            "href": e.target.result, // Use the data URL as the href
                            "data-fancybox": "gallery",
                        }).append(image); // Wrap the image in the anchor

                        const imageContainer = $("<div>").addClass("image_container").append(anchor);
                        imageContainers.push(imageContainer); // Add image container to the array

                        // When all images are loaded, append them to the imageGrid after the existing images
                        if (imageContainers.length === files.length) {
                            const numToAppend = imageContainers.length;
                            for (let k = 0; k < numToAppend; k++) {
                                imageGrid.append(imageContainers[k]);
                            }
                            totalImagesDisplayed += numToAppend; // Update the total number of images displayed
                        }
                    };

                    reader.readAsDataURL(file);
                }
            }
        }

    });
    // image upload js here

    // Fancybox
    Fancybox.bind('[data-fancybox="gallery"]', {
        Thumbs: true,
        Toolbar: false,

        Image: {
            zoom: false,
            click: false,
            wheel: "slide",
        },
    });

    // mmenu starts
    jQuery(document).ready(function ($) {
        $("#menu").mmenu({
            extensions: [
                "effect-menu-slide",
                "effect-panels-slide",
                "pagedim-black",
                "theme-dark",
            ],
            offCanvas: {
                position: "left",
            },
            counters: true,
            iconPanels: true,
            navbars: [
                {
                    position: "top",
                },
            ],
        });

        // mmenu onclick display block
        $("#mmenu_dblock").click(function () {
            $("#menu").css("display", "block");
        });
    });
    // mmenu ends


    // Package Alert
    $(".buy-button").click(function () {
        $(".fixed_side").addClass("fixed_side_");
        $(".package_popup").addClass("package_popup_");
        $("body").addClass("scroll_stop")
    });
    $(".col5_close").click(function () {
        $(".fixed_side").removeClass("fixed_side_"),
        $(".package_popup").removeClass("package_popup_");
        $("body").removeClass("scroll_stop")
    });

    // Package Alert


    //Banner Slider Ends\

    // WOW Init
    new WOW().init();

    // Loader Start
    function loadNow(opacity) {
        if (opacity <= 0) {
            displayContent();
        } else {
            loader.style.opacity = opacity;
            window.setTimeout(function () {
                loadNow(opacity - 0.08);
            }, 70);
        }
    }

    function displayContent() {
        loader.style.display = "none";
        // document.getElementById('content').style.display = 'block';
    }

    document.addEventListener("DOMContentLoaded", function () {
        loader = document.getElementById("loader");
        loadNow(2);
    });


    //Section 1 Slider
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 20,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            880: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            1350: {
                slidesPerView: 4,
                spaceBetween: 50,
            },
        }
    });

    //Section 1 Slider Ends



    //   Section 5 Slider
    var swiper3 = new Swiper(".mySwiper3", {
        slidesPerView: 3,
        spaceBetween: 30,
        speed: 1500,
        centeredSlides: true,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: false,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                centeredSlides: false,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
                centeredSlides: false,
            },
            960: {
                slidesPerView: 3,
                spaceBetween: 40,
                centeredSlides: false,
            }
        }
    });
    //   Section 5 Slider Ends

    // Accrodion Starts
    $(document).ready(function () {
        $('.accordion-list > li > .answer').hide();

        $('.accordion-list > li').click(function () {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active").find(".answer").slideUp();
            } else {
                $(".accordion-list > li.active .answer").slideUp();
                $(".accordion-list > li.active").removeClass("active");
                $(this).addClass("active").find(".answer").slideDown();
            }
            return false;
        });

    });
    // Accrodion Ends

    // PORTFOLIO FILTER

    $(document).ready(function () {
        // Function to filter content based on the active class
        function filterContent() {
            const value = $('.list.active').attr('data-filter');
            if (value == 'all') {
                $('.portfolioBox').show('1000');
            } else {
                $('.portfolioBox').not('.' + value).hide('1000');
                $('.portfolioBox').filter('.' + value).show('1000');
            }
        }

        // Call the filterContent function on page load
        filterContent();

        // Click event for the list items
        $('.list').click(function () {
            $(this).addClass('active').siblings().removeClass('active');
            filterContent(); // Call filterContent function on list item click
        });
    });

    // PORTFOLIO FILTER ENDS

    // Gallery Image Before/After effect

    $(".slider").on("input change", function (e) {
        const slider = $(this);
        const sliderContainer = slider.closest('.portfolio_thumb');
        const sliderPos = slider.val();

        // Update the width of the foreground image within the same portfolioBox
        sliderContainer.find('.foreground-img').css('width', `${sliderPos}%`);

        // Update the position of the slider button within the same portfolioBox
        sliderContainer.find('.slider-button').css('left', `calc(${sliderPos}% - 18px)`);
    });

    // Gallery Image Before/After Effect Ends


    // Lazy Load
    $(document).ready(function () {
        $("img.lazy").lazyload({
            effect: "fadeIn",
            threshold: 1000,
        });
    });

