<?php
include("global.php");
global $dbF;
global $db, $functions;
$dbp = $db;

$login = $webClass->userLoginCheck();
 if (isset($_COOKIE['user_email']) || $login) {
$id = base64_decode($_GET['user_id']);
$productId = base64_decode($_GET['product_id']);
$username = $functions->webUserName($id);
$userName = base64_encode($username['acc_name']);

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
 <style>
     .guestbook, .comments {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}
.comments{
    max-height:300px;
    overflow:auto;
}
.guestbook h2, .comments h2 {
    margin-bottom: 10px;
}

form label {
    display: block;
    margin-bottom: 5px;
    font-size: 1.6rem;
    font-weight: 600;
}
.guestbook_pra {
    margin-bottom:35px;
}

form input[type="text"],
form input[type="email"],
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1.6rem;
}

/*form button {*/
/*    background-color: #333;*/
/*    color: #fff;*/
/*    padding: 10px 15px;*/
/*    border: none;*/
/*    border-radius: 5px;*/
/*    cursor: pointer;*/
/*    font-size: small;*/
/*}*/

.comment {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #fff;
}

.comment p {
    margin: 0;
    font-size:1.4rem;
}

.comment p strong{
    font-weight:600;
    font-size:1.5rem;
    display:block;
    width:100%;
    margin-bottom:10px;
}
.btnFlex{
    text-align:end;
}
 </style>
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
                        <a href="<?php echo 'generator.php?user_id=' . base64_encode($id) .'&name=' . $userName . ' &proid=' . base64_encode($productId); ?>" class="btn_gradient_small g2">
                            <span class="start">Upload Image</span>
                            <span class="hover">Upload Image</span>
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
    <div class="main_container guestbook_container">
            <div class="upload_container">
                 <?php
                     echo $functions->eventInfo($id,$productId);
                     ?>
       <section class="guestbook">
        <h2>Add Message To Guestbook</h2>
        <P class="guestbook_pra">Thank you for your message, it will only be visible to the event host.</P>
        <form id="commentForm">
            <label class="" for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo @$userName = $_COOKIE['user_name']; ?>"required>
            
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo @$userName = $_COOKIE['user_email']; ?>" required>
            
            <input type="hidden" id="user_id" name="user_id" value="<?php echo $id ?>"required>
            <input type="hidden" id="productId" name="productId" value="<?php echo $productId?>" required>
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="4" required></textarea>
            
            <div class="btnFlex">
                <button type="submit" class="btn_gradient_small">
                    <span class="start">Submit</span>
                    <span class="hover">Submit</span>
                </button>
            </div>
        </form>
    </section>
    
    <section class="comments">
        <h2>Comments</h2>
        <div id="comment_guestbook">
            <?php
    $sql = "SELECT * FROM guest_book_chat WHERE product_id = '$productId' AND user_id = $id ORDER BY `date` DESC";
    $comment = $dbF->getRows($sql);
    $html = "";
    foreach ($comment as $key => $comment_data) {

        $message = $comment_data['message'];
        $name = $comment_data['name'];
        // $time2 = $comment_data['date'];
        // $time = substr($time2, 11);
        
        // $username = $functions->webUserName($sender_id);

        echo
            '<div class="comment" >
               <p><strong>'.$name.':</strong> '.$message.'</p>
                 </div>   
                    ';
    }
            ?>
        
        </div>
        <!-- Add more comment divs as needed -->
    </section>

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
                            m_text end
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
<script>
    
    $(document).ready(function() {
    // Handle form submission
    $("#commentForm").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Get form data
        var name = $("#name").val();
        var comment = $("#comment").val();
        var user_id = $("#user_id").val();
        var productId = $("#productId").val();
        var email = $("#email").val();

        // Send data to the server using AJAX
        $.ajax({
            type: "POST",
            url: "gallery_ajax.php?page=guestbookchat", // Replace with the actual server URL
            data: {
                name: name,
                comment: comment,
                user_id: user_id,
                productId: productId,
                email: email
            },
            success: function(response) {
                 $('#comment_guestbook').html(response);
                console.log(response);
            },
            error: function(error) {
                // Handle errors (e.g., show an error message)
                console.error("Error submitting comment:", error);
            }
        });
    });
});
</script>
<?php
}else{
        echo '<script>
                  // Show the alert box with the message
                  alert("Error: File upload failed. Please check the target directory permissions.");
                  
                  // Redirect to profile.php after the user clicks "OK" in the alert box
                  window.location.href = "index";
                </script>';
}
?>