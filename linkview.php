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
                        echo '<p> View your links after edit <p>';
                        }else{

                        echo '<p> Your Links are still in queue, please wait for any editor to accept <p>';
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
                        <h1>Your links</h1>
                    </div>
                    <div class="inner_images" id="selectedImage_container">
                        <?php
                        $sql = "SELECT * FROM `uploaded_files` WHERE `account_id`=? AND `product_id` = ? AND `status`=1 AND file_type='link'";
                        $data = $dbF->getRows($sql, array($userId,$productId));
                        if($data){
                            foreach($data as $val){
                                $img=$val['file_path'];
                                $file_extension = pathinfo($img, PATHINFO_EXTENSION);
                                
              
                $allowed_video_ext = array('mp4', 'mp5', 'webm');
                if(in_array($file_extension,$allowed_video_ext)){
                    $imgPath=WEB_URL."/uploads/".$img;
                  $typOfData='<video src="'.$imgPath.'"></video>';  
                }else{
                    $imgPath=$img;
                  $typOfData='<a class="thumb thumb_link" href="' . $imgPath . '" data-userid="' . $userId . '" title="'.$imgPath.'" target="_blank"></a>';  
                    
                }
                                echo '
                                <div class="thumb_wrapper thumb_wrapper_link">
                                <div class="thumb_container thumb_container_link">'.$typOfData.'
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
                        <h1>Edit Link</h1>
                    </div>
                    
                        <?php
                        $sql = "SELECT * FROM `editor_upload` WHERE `user_id`=? AND `product_id` = ? AND `status`=1 AND file_type='link'";
                        $data = $dbF->getRows($sql, array($userId,$productId));
                        if($data){
                            echo'<div class="inner_images" id="selectedImage_container">';
                            foreach($data as $val){
                                $img=$val['image_path'];
                                $file_extension = pathinfo($img, PATHINFO_EXTENSION);
                                
                                $allowed_video_ext = array('mp4', 'mp5', 'webm');
                                if(in_array($file_extension,$allowed_video_ext)){
                                    $imgPath=WEB_URL."/".$img;
                                  $typOfData='<video src="'.$imgPath.'"></video>';  
                                }else{
                                    $imgPath=$img;
                                  $typOfData='<a class="thumb thumb_link" href="' . $imgPath . '" data-userid="' . $userId . '" title="'.$imgPath.'" target="_blank"></a>';
                                    
                                }
                                echo '
                                <div class="thumb_wrapper thumb_wrapper_link">
                                <div class="thumb_container thumb_container_link">'.$typOfData.'
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
                        <h1>Client Links</h1>
                    </div>
                    <div class="inner_images" id="selectedImage_container">
                        <?php
                        $sql = "SELECT * FROM `uploaded_files` WHERE `product_id` = ? AND `status`=1 AND file_type='link'";
                        $data = $dbF->getRows($sql, array($productId));
                        if($data){
                            foreach($data as $val){
                                $img=$val['file_path'];
                                $file_extension = pathinfo($img, PATHINFO_EXTENSION);
                                
                                $allowed_video_ext = array('mp4', 'mp5', 'webm');
                                if(in_array($file_extension,$allowed_video_ext)){
                                    $imgPath=WEB_URL."/uploads/".$img;
                                  $typOfData='<video src="'.$imgPath.'"></video>';  
                                }else{
                                    $imgPath=$img;
                                  $typOfData='<a class="thumb thumb_link" href="' . $imgPath . '" data-userid="' . $userId . '" title="'.$imgPath.'" target="_blank"></a>'; 
                                    
                                }
                                   echo '
                                <div class="thumb_wrapper thumb_wrapper_link">
                                <div class="thumb_container thumb_container_link">'.$typOfData.'
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
                        <h1>Edit Links</h1>
                    </div>
                    
                        <?php
                        $sql = "SELECT * FROM `editor_upload` WHERE `editor_id`=? AND `product_id` = ? AND `status`=1 AND file_type='link'";
                        $data = $dbF->getRows($sql, array($userId,$productId));
                        if($data){
                            echo'<div class="inner_images" id="selectedImage_container">';
                            foreach($data as $val){
                                $img=$val['image_path'];
                                $file_extension = pathinfo($img, PATHINFO_EXTENSION);
                                
                                         $allowed_video_ext = array('mp4', 'mp5', 'webm');
                if(in_array($file_extension,$allowed_video_ext)){
                    $imgPath=WEB_URL."/".$img;
                  $typOfData='<video src="'.$imgPath.'"></video>';  
                }else{
                   $imgPath=$img;
                $typOfData='<a class="thumb thumb_link" href="' . $imgPath . '" data-userid="' . $userId . '" title="'.$imgPath.'" target="_blank"></a>';
                                     
                    
                }
                                 echo '
                                <div class="thumb_wrapper thumb_wrapper_link">
                                <div class="thumb_container thumb_container_link">'.$typOfData.'
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