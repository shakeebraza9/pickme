<?php
include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;
$login = $webClass->userLoginCheck();
if (!$login) {
    header('Location: login');
    exit();
}
$userId=base64_decode($_GET['user_id']);
$productId=base64_decode($_GET['product_id']);
@$req=base64_decode($_GET['req']);
include_once("dashboard_header.php");
?>


<?php
if ($_SESSION['webUser']['usertypenew'] == 'Client') {
            $sql_file = "SELECT * FROM final_img WHERE user_id = '$userId' AND package_id=$productId";
            $result_New = $dbF->getRow($sql_file);
            echo'
                        <div class="goback_btn">
  <button class="go_back_btn" onclick="history.back()">
    <img src="'.WEB_URL.'/webImages/goBack_icn.png" alt="Go Back">
  </button>
</div>';
            
            echo'
            <div class="event_alerts">';
                    if($result_New['images_path'] != NULL){
                        if($result_New['project_status'] != NULL){
                        echo '<p> Download images after edit <p>';
                        }else{

                        echo '<p> Your images are still in queue, please wait for any editor to accept <p>';
                        }
                    }else{
                        $username = $functions->productImageSize($productId);
                        echo $username ;
                        
                    }
            echo '</div>';
?>



            



            <!-- Inner Content -->
            <div class="inner_main_product">
                <!-- Upload Image -->
                <div class="selected_images">
                    <div class="inner_heading">
                        <h1>Your Selected Images</h1>
                    </div>
                    <div class="inner_images" id="selectedImage_container">
                        <?php
                        $sql = "SELECT * FROM `uploaded_files` WHERE `account_id`=? AND `product_id` = ? AND `status`=1 AND file_type='image'";
                        $data = $dbF->getRows($sql, array($userId,$productId));
                        if($data){
                            foreach($data as $val){
                                $img=$val['file_path'];
                                $file_extension = pathinfo($img, PATHINFO_EXTENSION);
                                $imgPath=WEB_URL."/uploads/".$img;
              
                $allowed_video_ext = array('mp4', 'mp5', 'webm');
                if(in_array($file_extension,$allowed_video_ext)){
                  $typOfData='<video src="'.$imgPath.'"></video>';  
                }else{
                  $typOfData='<img src="'.$imgPath.'" >';  
                    
                }
                                echo '
                                <div class="thumb_wrapper">
                                <div class="thumb_container"><a class="thumb" data-fancybox="select_image"
                                    href="'.$imgPath.'">'.$typOfData.'</a>';
                                    if($result_New['project_status'] != NULL){
                                        echo'<input type="checkbox" class="image_checkbox">';
                                    }
                                    echo'
                            </div>
                        </div>
                                ';
                            }
                        }
                        
                        ?>
<?php
if($req == false AND empty($req)){
    echo'
                    </div>
                    <div class="inner_btn">
                        <button class="btn_gradient_small g2" id="select-all-btn">
                            <span class="start">Select All</span>
                            <span class="hover">Select All</span>
                        </button>
                        <button class="btn_gradient_small g2" id="download_selected">
                            <span class="start">Download</span>
                            <span class="hover">Download</span>
                        </button>
                    </div>
                </div>
                <!-- editor uploaded Image -->
';

?>
                <div class="selected_images">
                    <div class="inner_heading">
                        <h1>Edit Images</h1>
                    </div>
                    
                        <?php
                        $sql = "SELECT * FROM `editor_upload` WHERE `user_id`=? AND `product_id` = ? AND `status`=1 AND file_type='image'";
                        $data = $dbF->getRows($sql, array($userId,$productId));
                        if($data){
                            echo'<div class="inner_images" id="selectedImage_container">';
                            foreach($data as $val){
                                $img=$val['image_path'];
                                $file_extension = pathinfo($img, PATHINFO_EXTENSION);
                                $imgPath=WEB_URL."/".$img;
                                $allowed_video_ext = array('mp4', 'mp5', 'webm');
                                if(in_array($file_extension,$allowed_video_ext)){
                                  $typOfData='<video src="'.$imgPath.'"></video>';  
                                }else{
                                  $typOfData='<img src="'.$imgPath.'" data-image="'.$name.'">';  
                                    
                                }
                                echo '
                                <div class="thumb_wrapper">
                                <div class="thumb_container"><a class="thumb" data-fancybox="select_image"
                                    href="'.$imgPath.'">'.$typOfData.'</a><button
                                    class="delete_image_btn"><i class="fa fa-xmark-circle"></i></button>';
                                    if($result_New['project_status'] != NULL){
                                        echo'<input type="checkbox" class="image_checkbox1">';
                                    }
                                 echo'   
                            </div>
                        </div>
                                ';
                            }
                        }else{
                            echo'<div id="selectedImage_container">';
                            echo"<p> editor not uploaded a single image..... </p>";
                        }
                        
                        ?>

                    </div>
                    <div class="inner_btn">
                        <button class="btn_gradient_small g2" id="select-all-btn1">
                            <span class="start">Select All</span>
                            <span class="hover">Select All</span>
                        </button>
                        <button class="btn_gradient_small g2" id="download_selected2">
                            <span class="start">Download</span>
                            <span class="hover">Download</span>
                        </button>
                    </div>
                </div>
                
            </div>

        </div>
        
        <?php
}
    
}
else{
 ?>  

                        <div class="goback_btn">
  <button class="go_back_btn" onclick="history.back()">
    <img src="<?php echo WEB_URL ?>/webImages/goBack_icn.png" alt="Go Back">
  </button>
</div>
            <!-- Inner Content -->
            <div class="inner_main_product">
                <!-- Upload Image -->
                <div class="selected_images">
                    <div class="inner_heading">
                        <h1>Client Images</h1>
                    </div>
                    <div class="inner_images" id="selectedImage_container">
                        <?php
                        $sql = "SELECT * FROM `uploaded_files` WHERE `product_id` = ? AND `status`=1 AND file_type='image'";
                        $data = $dbF->getRows($sql, array($productId));
                        if($data){
                            foreach($data as $val){
                                $img=$val['file_path'];
                                $file_extension = pathinfo($img, PATHINFO_EXTENSION);
                                $imgPath=WEB_URL."/uploads/".$img;
                                $allowed_video_ext = array('mp4', 'mp5', 'webm');
                                if(in_array($file_extension,$allowed_video_ext)){
                                  $typOfData='<video src="'.$imgPath.'"></video>';  
                                }else{
                                  $typOfData='<img src="'.$imgPath.'" >';  
                                    
                                }
                                echo '
                                <div class="thumb_wrapper">
                                <div class="thumb_container"><a class="thumb" data-fancybox="select_image"
                                    href="'.$imgPath.'">'.$typOfData.'</a><button
                                    class="delete_image_btn"><i class="fa fa-xmark-circle"></i></button><input
                                    type="checkbox" class="image_checkbox">
                            </div>
                        </div>
                                ';
                            }
                        }
                        
                        ?>

                    </div>
                    <div class="inner_btn">
                        <button class="btn_gradient_small g2" id="download_selected">
                            <span class="start">Download</span>
                            <span class="hover">Download</span>
                        </button>
                    </div>
                </div>
                <!-- editor uploaded Image -->
                <div class="selected_images">
                    <div class="inner_heading">
                        <h1>Edit Images</h1>
                    </div>
                    
                        <?php
                        $sql = "SELECT * FROM `editor_upload` WHERE `editor_id`=? AND `product_id` = ? AND `status`=1 AND file_type='image'";
                        $data = $dbF->getRows($sql, array($userId,$productId));
                        if($data){
                            echo'<div class="inner_images" id="selectedImage_container">';
                            foreach($data as $val){
                                $img=$val['image_path'];
                                $file_extension = pathinfo($img, PATHINFO_EXTENSION);
                                $imgPath=WEB_URL."/".$img;
                                         $allowed_video_ext = array('mp4', 'mp5', 'webm');
                if(in_array($file_extension,$allowed_video_ext)){
                  $typOfData='<video src="'.$imgPath.'"></video>';  
                }else{
                  $typOfData='<img src="'.$imgPath.'" data-image="'.$name.'">';  
                    
                }
                                echo '
                                <div class="thumb_wrapper">
                                <div class="thumb_container"><a class="thumb" data-fancybox="select_image"
                                    href="'.$imgPath.'">'.$typOfData.'</a><button
                                    class="delete_image_btn"><i class="fa fa-xmark-circle"></i></button><input
                                    type="checkbox" class="image_checkbox">
                            </div>
                        </div>
                                ';
                            }
                        }else{
                            echo'<div id="selectedImage_container">';
                            echo"<p> editor not uploaded a single image..... </p>";
                        }
                        
                        ?>

                    </div>
                    <div class="inner_btn">
                        <button class="btn_gradient_small g2" id="download_selected2">
                            <span class="start">Download</span>
                            <span class="hover">Download</span>
                        </button>
                    </div>
                </div>
                
            </div>

        </div>
 
<?php    
}

?>

<script>

    document.addEventListener("DOMContentLoaded", function () {
        // Get a reference to the "Select All" button
        var selectAllBtn = document.getElementById("select-all-btn");

        // Get all the checkboxes with the class "image_checkbox"
        var checkboxes = document.querySelectorAll(".image_checkbox");

        // Add a click event listener to the "Select All" button
        selectAllBtn.addEventListener("click", function () {
            // Loop through all checkboxes and set their checked property to true
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = true;
            });
        });
    });
    document.addEventListener("DOMContentLoaded", function () {
        // Get a reference to the "Select All" button
        var selectAllBtn = document.getElementById("select-all-btn1");

        // Get all the checkboxes with the class "image_checkbox"
        var checkboxes = document.querySelectorAll(".image_checkbox1");

        // Add a click event listener to the "Select All" button
        selectAllBtn.addEventListener("click", function () {
            // Loop through all checkboxes and set their checked property to true
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = true;
            });
        });
    });

document.getElementById('download_selected').addEventListener('click', function() {
    var selectedImages = [];
    var checkboxes = document.getElementsByClassName('image_checkbox');
    
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            selectedImages.push(checkboxes[i].parentNode.querySelector('.thumb img').src);
        }
    }

    if (selectedImages.length > 0) {
        // Trigger download for each selected image
        for (var j = 0; j < selectedImages.length; j++) {
            downloadImage(selectedImages[j]);
        }
    }
});
document.getElementById('download_selected2').addEventListener('click', function() {
    var selectedImages = [];
    var checkboxes = document.getElementsByClassName('image_checkbox');
    
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            selectedImages.push(checkboxes[i].parentNode.querySelector('.thumb img').src);
        }
    }

    if (selectedImages.length > 0) {
        // Trigger download for each selected image
        for (var j = 0; j < selectedImages.length; j++) {
            downloadImage(selectedImages[j]);
        }
    }
});

function downloadImage(imageSrc) {
    // Create a temporary link element for download
    var link = document.createElement('a');
    link.href = imageSrc;
    link.download = imageSrc.split('/').pop(); // Extract the image filename

    // Simulate a click on the link to trigger the download
    link.click();
}
</script>
    <?php include("dashboard_footer.php"); ?>