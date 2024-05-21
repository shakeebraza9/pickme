<?php
include("global.php");
global $dbF;
global $db, $functions;
$dbp = $db;
$login = $webClass->userLoginCheck();
 if (isset($_COOKIE['user_email']) || $login) {
$ids = $_GET['user_id'];
$userName = base64_decode($_GET['name']);
$productId = base64_decode($_GET['proid']);
$currentDateTime = date('Y-m-d H:i:s');
if (isset($ids)) {

$id = base64_decode($ids);

?>


<?php
// var_dump($id);
if(!empty($id) && !empty($userName) && !empty($productId)){
$sql = "SELECT * FROM `orders` WHERE `order_user`=? AND `order_id`=? AND `expire_date` >= ?";
$result = $dbF->getRows($sql, array($id,$productId, $currentDateTime));
if($result){
$sql2 = "SELECT * FROM `final_img` WHERE `user_id`=? AND `package_id`=? ";
$result2 = $dbF->getRow($sql2, array($id,$productId));
if($result2['project_status']!='1' && empty($result2['images_path'])){
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="webImages/just_lans.svg" sizes="50" />
    <title>Picmee - Home</title>

    <link rel="stylesheet" href="<?php echo WEB_URL ?>/Css/jquery.fancybox.css" />
    <link rel="stylesheet" href="<?php echo WEB_URL ?>/Css/mmenu.css" />
    <link rel="stylesheet" href="<?php echo WEB_URL ?>/Css/wow.css" />
    <link rel="stylesheet" href="<?php echo WEB_URL ?>/Css/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!--<link rel="stylesheet"-->
    <!--  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />-->
    <link rel="stylesheet" href="<?php echo WEB_URL ?>/Css/style.css" />
</head>

<body>
    <!-- <nav id="menu">
    <ul>
      <li>
        <a href="index.html">Home</a>
      </li>
      <li>
        <a href="aboutus.html">About us</a>
      </li>
      <li>
        <a href="services.html">Services</a>
      </li>
      <li>
        <a href="packages.html">Packages</a>
      </li>
      <li>
        <a href="faq.html">FAQs</a>
      </li>
      <li>
        <a href="terms-condition.html">Terms & Condition</a>
      </li>
      <li>
        <a href="privacy.html">Privacy Policy</a>
      </li>
      <li>
        <a href="complaints.html">Complaints Policy</a>
      </li>
    </ul>
  </nav> -->
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
    <div class="main_container">
        <header class="main_header">
            <div class="standard1">
                <div class="inner_header">
                    <!-- <div class="mmenu_toggler mmenu" id="mmenu_dblock">
                        <a href="#menu">
                            <img src="webImages/menu_bars.png" alt="picmee_menu">
                        </a>
                    </div> -->
<?php $box1 = $webClass->getBox('box1'); ?>
                    <div class="header_logo">
                        <a href="<?php echo $box1['link']; ?>">
                            <img src="<?php echo $box1['image'] ;?>" alt="pickmee_logo" />
                        </a>
                    </div>

                    <!-- <nav class="nav_links">
                        <ul>
                            <li class="actv_nav">
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="aboutus.html">About us</a>
                            </li>
                            <li>
                                <a href="services.html">Services</a>
                            </li>
                            <li>
                                <a href="packages.html">Packages</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQs</a>
                            </li>
                        </ul>
                    </nav> -->

                     <div class="header_btn">
                         <?php
                         $login = $webClass->userLoginCheck();
                            if ($login) {
                             echo'
                               <a href="dashboard.php" class="btn_gradient_small g2">
                            <span class="start">dashboard</span>
                            <span class="hover">dashboard</span>
                        </a>
                             
                             ';
                                
                            }
                         ?>
                      
                        <a href="<?php echo 'eventgallery.php?product_id=' . base64_encode($productId) . '&user_id=' . base64_encode($id); ?>" class="btn_gradient_small g2">
                            <span class="start">Event Gallery</span>
                            <span class="hover">Event Gallery</span>
                        </a>
                        <a href="<?php echo 'guestbook.php?product_id=' . base64_encode($productId) . '&user_id=' . base64_encode($id); ?>" class="btn_gradient_small g2">
                            <span class="start">Guest Book</span>
                            <span class="hover">Guest Book</span>
                        </a>

                        <a href="dashboard.php" class="responsive_btn">
                            <i class="fa fa-play"></i>
                            </a>
                        <a href="<?php echo 'eventgallery.php?product_id=' . base64_encode($productId) . '&user_id=' . base64_encode($id); ?>" class="responsive_btn">
                            <i class="fa fa-play"></i>
                        </a>
                        <a href="<?php echo 'guestbook.php?product_id=' . base64_encode($productId) . '&user_id=' . base64_encode($id); ?>" class="responsive_btn">
                            <i class="fa fa-right-to-bracket"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>


        <div class="main_container image_upload_container">
            <div class="upload_container">
                     <?php
                     echo $functions->eventInfo($id,$productId);
                     ?>
                    
                    <hr>
  </div>             
         

    <div class="innermain_upload_container">
<form method="POST" action="post_file_New.php" enctype="multipart/form-data">
        <div class="inner_upload_container" id="draggable-container">
            <!-- Input for selecting files -->
            <input type="file" name="pic[]" accept="image/*" id="real-file" hidden="hidden" multiple />
            <!-- Hidden input fields for sending data to the server -->
            <input type="hidden" id="AjaxFileNewId" name="ProductNewId" value="<?php echo $productId ?>">
            <input type="hidden" id="userId" name="id" value="<?php echo $id ?>">
            <input type="hidden" id="AjaxFileNewPage" name="page" value="album">
            <input type="hidden" name="user" value="<?php echo $id ?>">
            <!-- Button to trigger file selection -->
            <button type="button" id="custom-button">Upload your picture</button>
            <!-- Button for submitting the form (hidden by default) -->
            <button type="submit" id="submit-button" style="display: none;">SUBMIT</button>
        </div>
</form>
                        <div id="videoLinkPopup" class="popup">
    <div class="popup-content">
        <span class="close">&times;</span>
        <input class="linkinput" type="text" id="videoLinkInput" placeholder="Enter video link...">
        <button id="videoLinkSubmit">Submit</button>
    </div>
</div>
<form method="POST" action="post_file_New.php" enctype="multipart/form-data">
        <div class="inner_upload_container" id="draggable-container">
            <!-- Input for selecting files -->
            <input type="file" name="pic[]" id="real-file" hidden="hidden" multiple />
            <!-- Hidden input fields for sending data to the server -->
            <input type="hidden" id="AjaxFileNewId" name="ProductNewId" value="<?php echo $productId ?>">
            <input type="hidden" id="userId" name="id" value="<?php echo $id ?>">
            <input type="hidden" id="AjaxFileNewPage" name="page" value="album">
            <input type="hidden" name="user" value="<?php echo $id ?>">
            <!-- Button to trigger file selection -->
            <button type="button" id="videolink">Upload your Link</button>
            <!-- Button for submitting the form (hidden by default) -->
            <button type="submit" id="submit-button" style="display: none;">SUBMIT</button>
        </div>
</form>
        <div class="standard_fullwidth">
            <!-- Container to display selected images (if needed) -->
            <div class="selected_images" id="selected-images">
                <?php
                // echo 1;
                $login = $webClass->userLoginCheck();
                if($login) {
                
                    $functions->albumEditImagess($id,$productId);
                }
                ?>
            </div>
        </div>
    </div>
            
            <div class="image_container">
                <div class="standard">
                    <div class="image_grid" id="image-grid"></div>
                </div>
            </div>
        </div>



        <footer class="main_footer_div">
            <div class="main_footer_bottom">
                <div class="standard">
                    <div class="footer_bottom_inner flex_">
                        <div class="copyright">
                            <p>
                                © Copyright - 2023
                                <a href="#" class="compname">Picmee</a> All Right Reserved
                            </p>
                        </div>

                        <div class="imedia" id="a_463a96ecf1086d">
                            <a href="http://imedia.com.pk/" target="_blank" title="Karachi Web Designing Company"
                                class="design_develop">Design &amp; Developed by:</a>
                            <a href="http://imedia.com.pk/" target="_blank" title="Web Designing Company Pakistan"><img
                                    src="webImages/imedia.png" alt="" />
                            </a>
                            <div class="m_text">
                                <a href="http://imedia.com.pk/" target="_blank"
                                    title="Website Design by Interactive Media">Interactive
                                    Media</a>
                                <a href="http://imediaintl.com/" target="_blank"
                                    title="International Web Development Company" class="digital_media">DIGITAL MEDIA ON
                                    DEMAND Globally</a>
                            </div>
                            <!--m_text end-->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- main container ends -->

    <script src="<?php echo WEB_URL ?>/Js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo WEB_URL ?>/js/script.js"></script>
    <script src="<?php echo WEB_URL ?>/Js/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
    <script src="<?php echo WEB_URL ?>/Js/mmenu.min.all.js"></script>
    <script src="<?php echo WEB_URL ?>/Js/jquery.easing.1.3.js"></script>
    <script src="<?php echo WEB_URL ?>/Js/jquery.fancybox.js"></script>
    <script src="<?php echo WEB_URL ?>/Js/WOW.js"></script>
    <script src="https://use.fontawesome.com/eecfb424a6.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo WEB_URL ?>/Js/script.js"></script>
</body>

</html>




    <!--<form enctype="multipart/form-data">-->
    <!--    <h2 class="tab_heading">Album Images</h2>-->
    <!--    <input type="hidden" id="AjaxFileNewId" name="ProductNewId" value="<?php //echo $id ?>">-->
    <!--    <input type="hidden" id="userId" name="id" value="<?php //echo $productId ?>">-->
    <!--    <input type="hidden" id="AjaxFileNewPage" value="album">-->
    <!--    <input type="hidden" name="user" value="<?php //echo $id ?>">-->

    <!--    <div id="dropbox">-->
    <?php 
    // <!--        $login = $webClass->userLoginCheck();-->
    // <!--        if ($login) {-->
    // <!--        $functions->albumEditImagess($id,$productId); -->
            
// }
     ?>

    <!--    </div><span class="message">Drop images here to upload.<br />-->
    <!--        <i>they will only be visible to you</i></span><br>-->




    <!--</form>-->
<?php
}else{
    
      echo '<script>
                  // Show the alert box with the message
                  alert("Link has been expired .....");
                  
                  // Redirect to profile.php after the user clicks "OK" in the alert box
                  window.location.href = "dashboard";
                </script>';
}
}else{
    
             echo '<script>
                  // Show the alert box with the message
                  alert("Somethink went worng....");
                  
                  // Redirect to profile.php after the user clicks "OK" in the alert box
                  window.location.href = "dashboard";
                </script>';
}
}else{

         echo '<script>
                  // Show the alert box with the message
                  alert("Link is not correct");
                  
                  // Redirect to profile.php after the user clicks "OK" in the alert box
                  window.location.href = "dashboard";
                </script>';
}
?>
    <script>
       $(document).ready(function () {
    const videoLinkButton = $('#videolink');
    const videoLinkPopup = $('#videoLinkPopup');
    const videoLinkInput = $('#videoLinkInput');
    const videoLinkSubmit = $('#videoLinkSubmit');
    const closePopup = $('.close');

    videoLinkButton.on('click', function () {
        console.log('hello');
        videoLinkPopup.show();
    });

    closePopup.on('click', function () {
        videoLinkPopup.hide();
    });

    videoLinkSubmit.on('click', function () {
        const videoLink = videoLinkInput.val();
        if (videoLink) {
            handleVideoLink(videoLink);
        }
        videoLinkPopup.hide();
    });

    // Function to handle the entered video link
    function handleVideoLink(link) {
        // Your logic to handle the video link goes here
    }
});
$(document).ready(function () {
    // ... Other code ...
        const videoLinkSubmit = $('#videoLinkSubmit');
        const videoLinkInput = $('#videoLinkInput');
        const videoLinkPopup = $('#videoLinkPopup');

    videoLinkSubmit.on('click', function () {
        const videoLink = videoLinkInput.val();
        const productId = "<?php echo $productId;?>";
        const userId = "<?php echo $id;?>";

        if (videoLink && productId && userId) {
            // console.log('shakeeb');
            // Make an AJAX request to save the data to the database
            $.ajax({
                url: 'gallery_ajax.php?page=guestuserLinksave', // Replace with your server-side script URL
                method: 'POST',
                data: { videoLink: videoLink, productId: productId, userId: userId },
                success: function (response) {
                    $('#selected-images').html(response);
                    console.log('Video link saved successfully:', response);
                    // Optionally, you can perform additional actions upon successful save
                },
                error: function (xhr, status, error) {
                    console.error('Error saving video link:', error);
                }
            });
        }

        videoLinkPopup.hide();
    });

    // ... Rest of the code ...
});
    
        function secure_delete(text) {

            // text = 'view on alert';

            text = typeof text !== 'undefined' ? text : 'Are you sure you want to Delete?';

            bool = confirm(text);

            if (bool == false) {
                return false;
            } else {
                return true;
            }

        }
        $(document).ready(function() {

            $("#dropbox").sortable({
                handle: '.imageHolder',
                containment: "parent",
                update: function() {
                    serial = $(this).sortable('serialize');
                    $.ajax({
                        url: 'gallery_ajax.php?page=sortAlbumImage',
                        type: "post",
                        data: serial,
                        error: function() {
                            jAlertifyAlert(
                                "<?php echo _uc($_e['There is an error, Please Refresh Page and Try Again']); ?>"
                            );
                        }
                    });
                }
            });
        });

        ///////////////////////////////////////
        $(".imageHolder").click(function() {
            img = $(this).find("img").attr('src');
            $('#productImgDialog').modal('show');
            $("#productImgDialog .modal-body").find("img").attr("src", img).hide().show(600);
        });

        ////////////////////////////////////////////
        $(".productEditImageDel").click(function() {

            if (secure_delete()) {
                id = $(this).attr("data-id");
                parnt = $(this).closest(".selected_image_container");
                $.ajax({
                    type: "POST",
                    url: 'gallery_ajax.php?page=albumEditImageDel',
                    data: {
                        imageId: id
                    }
                }).done(function(data) {
                    if (data == '1') {
                        parnt.hide(500);
                    } else if (data == '0') {
                        jAlertifyAlert("<?php echo 'Image Not Delete Please Try Again'; ?>");
                        return false;
                    }
                });
            }
        });
        /////////////////////////////////////////////////


        ////////////////////////////////////////////
        $(".albumAltUpdate").click(function() {
            btn = $(this);
            btn.addClass('disabled');
            btn.children('.trash').hide();
            btn.children('.waiting').show();

            id = btn.attr('data-id');
            alt = $('#alt-' + id).val();
            btn.children('span').text('Wait...');
            $.ajax({
                type: 'POST',
                url: 'gallery_ajax.php?page=albumAltUpdate',
                data: {
                    imageId: id,
                    altT: alt
                }
            }).done(function(data) {
                ift = true;
                if (data == '1') {
                    btn.children('span').text('Done');
                } else {
                    btn.children('span').text('Fail');
                }
                btn.removeClass('disabled');
                btn.children('.trash').show();
                btn.children('.waiting').hide();

            });
        });
        /////////////////////////////////////////////////
    </script>

<?php
    // include_once('footer.php');
} else {
    echo "No user ID found in the link.";
}
}else{
        echo '<script>
                  // Show the alert box with the message
                  alert("Error: File upload failed. Please check the target directory permissions.");
                  
                  // Redirect to profile.php after the user clicks "OK" in the alert box
                  window.location.href = "index";
                </script>';
}
?>