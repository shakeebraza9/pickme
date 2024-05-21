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
                position: "right",
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


// Loader starts
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
// Loader Ends

// Navbar starts
$(document).ready(function () {
    $("#menu-toggle").click(function () {
        $(".wrapper").toggleClass("active");
        $(".dropdown_list").slideUp();
    });

    $(".dropdown_toggler").click(function (event) {
        var $dropdownList = $(this).closest(".dropdown").find(".dropdown_list");

        // Close other open dropdown lists
        $(".dropdown_list").not($dropdownList).slideUp();

        // Toggle the current dropdown list
        $dropdownList.slideToggle();

        event.stopPropagation(); // Prevent event from bubbling to document
    });

    // Add an event listener to close the sidebar and dropdown ul when clicking outside
    $(document).click(function (event) {
        if (!$(event.target).closest('.sidebar').length && !$(event.target).is('#menu-toggle')) {
            $(".wrapper").removeClass("active");
            $(".dropdown_list").slideUp(); // Close the dropdown ul
        }
    });
});
// Navbar ends


// JS for image upload and mark it select
$(document).ready(function () {
    const imageContainer = $('#imageContainer');
    const imageContainerSubmit = $('#imageContainer_submit');
    const sendImagesBtn = $('#sendImagesBtn');
    const removeImagesBtn = $('#removeImagesBtn');
    const selectedImages = [];
    const uploadedImageNames = []; // Track uploaded image names

    sendImagesBtn.hide();
    removeImagesBtn.hide();

    // $('#uploadBtn').on('click', function () {
    //     const selectImagesInput = $('<input type="file" multiple style="display: none;">');

    //     selectImagesInput.on('change', function (event) {
    //         handleImageUpload(event.target.files);
    //         $(this).remove();
    //     });

    //     $('body').append(selectImagesInput);
    //     selectImagesInput.click();
    // });

    imageContainer.on('dragover', function (e) {
        e.preventDefault();
    });

    imageContainer.on('drop', function (e) {
        e.preventDefault();
        handleImageUpload(e.originalEvent.dataTransfer.files);
    });

    // imageContainer.on('dragstart', function (e) {
    //     e.preventDefault(); // Prevent dragging of images inside #imageContainer
    // });

    function handleImageUpload(files) {
        for (const file of files) {
            if (file.type.startsWith('image/') && !uploadedImageNames.includes(file.name)) {
                const thumbWrapper = $('<div class="thumb_wrapper">');
                const thumbContainer = $('<div class="thumb_container">');
                const anchor = $('<a class="thumb" data-fancybox="select_image">');
                const imageElement = $('<img>');
                const deleteButton = $('<button class="delete_image_btn"><i class="fa fa-xmark-circle"></i></button>'); // Delete button
                const checkbox = $('<input type="checkbox" class="image_checkbox">');

                imageElement.attr('src', URL.createObjectURL(file));
                anchor.attr('href', imageElement.attr('src'));
                anchor.append(imageElement);
                thumbContainer.append(anchor, deleteButton, checkbox);
                thumbWrapper.append(thumbContainer);

                imageContainer.append(thumbWrapper);

                uploadedImageNames.push(file.name);

                deleteButton.on('click', function () {
                    thumbWrapper.remove(); // Remove the thumb_wrapper upon clicking the delete button
                    const imageSrc = imageElement.attr('src');
                    const index = uploadedImageNames.indexOf(imageSrc);
                    if (index !== -1) {
                        uploadedImageNames.splice(index, 1);
                    }
                });
            }
        }
    }

    $('#clear_data').on('click', function () {
        clearImageData($('#imageContainer'));
    });

    $('#clear_data2').on('click', function () {
        event.preventDefault();
        clearImageData($('#imageContainer_submit'));
    });

    function clearImageData(container) {
        container.empty();
        uploadedImageNames.length = 0;
        updateRemoveButtonVisibility();
    }

    imageContainer.on('dragstart', '.thumb', function (e) {
        const imageSrc = $(this).find('img').attr('src');
        e.originalEvent.dataTransfer.setData('text/plain', imageSrc);
    });

    imageContainer.on('dragstart', '.thumb', function (e) {
        const imageSrc = $(this).find('img').attr('src');
        e.originalEvent.dataTransfer.setData('text/plain', imageSrc);
    });

    imageContainerSubmit.on('dragover', function (e) {
        e.preventDefault();
    });

    imageContainerSubmit.on('drop', function (e) {
        e.preventDefault();
        const imageSrc = e.originalEvent.dataTransfer.getData('text/plain');
        if (imageSrc && !selectedImages.includes(imageSrc)) {
            const thumbWrapper = createThumbWrapperFromSrc(imageSrc);
            imageContainerSubmit.append(thumbWrapper);
            selectedImages.push(imageSrc);
            updateRemoveButtonVisibility();
        }
    });
    function createThumbWrapperFromSrc(imageSrc) {
        const thumbWrapper = $('<div class="thumb_wrapper">');
        const thumbContainer = $('<div class="thumb_container">');
        const anchor = $('<a class="thumb" data-fancybox="selected_image_for_editor">');
        const imageElement = $('<img>');
        const checkbox = $('<input type="checkbox" class="selected_image_checkbox">');

        imageElement.attr('src', imageSrc);
        anchor.attr('href', imageElement.attr('src'));
        anchor.append(imageElement);
        thumbContainer.append(anchor, checkbox);
        thumbWrapper.append(thumbContainer);

        return thumbWrapper;
    }


    $('.upload_images').on('change', '.image_checkbox', function () {
        if ($('.image_checkbox:checked').length > 0) {
            sendImagesBtn.fadeIn();
        } else {
            sendImagesBtn.fadeOut();
        } 
    })
        if(document.getElementById("selectAllButton2") !== null){
       document.getElementById("selectAllButton2").addEventListener("click", function() {
            const checkboxes = document.querySelectorAll(".selected_image_checkbox");
            console.log(removeImagesBtn.fadeIn());
                    if ($('.selected_image_checkbox:checked').length === 0) {
            removeImagesBtn.fadeOut();
        }
            checkboxes.forEach(checkbox => {
                checkbox.checked = true;
                sendImagesBtn.fadeOut();
            });
        });
        }
       document.getElementById("selectAllButton").addEventListener("click", function() {
            const checkboxes = document.querySelectorAll(".image_checkbox");
            checkboxes.forEach(checkbox => {
                checkbox.checked = true;
                sendImagesBtn.fadeIn();
            });
        });


    sendImagesBtn.on('click', function () {
        // $('#selectAllButton').hide();
    $('.image_checkbox:checked').each(function () {
        const imageSrc = $(this).siblings('.thumb').find('img').attr('src');
        const imgId = $(this).siblings('.thumb').find('img').data('image'); // Retrieve the imgId from the data-image attribute
        const userId = $(this).siblings('.thumb').data('userid'); // Retrieve the imgId from the data-image attribute

        if (!selectedImages.includes(imageSrc)) {
            selectedImages.push(imageSrc);

            const thumbWrapper = $('<div class="thumb_wrapper">');
            const thumbContainer = $('<div class="thumb_container">');
            const anchor = $('<a class="thumb" data-fancybox="selected_image_for_editor">');
            const imageElement = $('<img>');
            const checkbox = $('<input type="checkbox" class="selected_image_checkbox" name="selected_images[]" value="' + imgId + '">');

            imageElement.attr('src', imageSrc);
            anchor.attr('href', imageElement.attr('src'));
            anchor.append(imageElement);
            thumbContainer.append(anchor, checkbox);
            thumbWrapper.append(thumbContainer);

            // Hidden input field for selected image ID
            // const hiddenInputImgId = $('<input type="hidden" name="selected_images[]" value="' + imgId + '">');
            // thumbWrapper.append(hiddenInputImgId);

            // Hidden input field for user ID
          
            const hiddenInputUserId = $('<input type="hidden" name="userid" value="' + userId + '">');
            thumbWrapper.append(hiddenInputUserId);

            // Hidden input field for selected image source
            const hiddenInputSelectedImg = $('<input type="hidden" name="selectedImg" value="' + imageSrc + '">');
            thumbWrapper.append(hiddenInputSelectedImg);

            imageContainerSubmit.append(thumbWrapper);

            uploadedImageNames.push(imageSrc);
        }
    });

    updateRemoveButtonVisibility();
    clearSelectedImages();
    sendImagesBtn.fadeOut();

    // Uncheck all checkboxes in #imageContainer
    imageContainer.find('.image_checkbox').prop('checked', false);
});


    removeImagesBtn.on('click', function () {
        //  $('#selectAllButton').show();
        $('.selected_image_checkbox:checked').each(function () {
            const imageSrc = $(this).siblings('.thumb').find('img').attr('src');
            selectedImages.splice(selectedImages.indexOf(imageSrc), 1);

            $(this).closest('.thumb_wrapper').remove();
            imageContainer.find(`.image_checkbox[value="${imageSrc}"]`).prop('checked', false);

            const index = uploadedImageNames.indexOf(imageSrc);
            if (index !== -1) {
                uploadedImageNames.splice(index, 1);
            }
        });

        if ($('.selected_image_checkbox:checked').length === 0) {
            removeImagesBtn.fadeOut();
        }
    });
    

    function updateRemoveButtonVisibility() {
        if ($('.selected_image_checkbox:checked').length > 0) {
            removeImagesBtn.fadeIn();
        } else {
            removeImagesBtn.fadeOut();
        }
    }

    imageContainerSubmit.on('change', '.selected_image_checkbox', function () {
        updateRemoveButtonVisibility();
    });

    function clearSelectedImages() {
        selectedImages.length = 0;
    }
});


// JS for downloading/deleteing selected images
$(document).ready(function () {
    // Delete image when delete button is clicked
    $(".delete_image_btn").click(function () {
        // $(this).closest(".thumb_wrapper").remove();
    });

    // Download selected images as a zip
    $("#download_selected").click(function () {
        var selectedImages = $(".image_checkbox:checked").closest(".thumb_container").find("a.thumb");
        if (selectedImages.length === 0) {
            alert("No images selected for download.");
            return;
        }

        var zip = new JSZip();
        var imagesCount = selectedImages.length;
        var imagesProcessed = 0;

        selectedImages.each(function (index, image) {
            var imageURL = $(image).attr("href");
            var imageFilename = imageURL.substring(imageURL.lastIndexOf('/') + 1);

            JSZipUtils.getBinaryContent(imageURL, function (err, data) {
                if (err) {
                    alert("Error downloading image: " + imageFilename);
                    return;
                }

                zip.file(imageFilename, data, { binary: true });
                imagesProcessed++;

                if (imagesProcessed === imagesCount) {
                    zip.generateAsync({ type: "blob" }).then(function (content) {
                        saveAs(content, "selected_images.zip");
                    });
                }
            });
        });
    });
});



