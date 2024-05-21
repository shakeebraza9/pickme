<?php include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;

$login = $webClass->userLoginCheck();
if (!$login) {
    header('Location: login');
    exit();
}
include("dashboard_header.php");
$userId=base64_decode($_GET['user_id']);
$productId=base64_decode($_GET['product_id']);

?>
<link rel="stylesheet" href="<?php echo WEB_URL ?>/css/style_old.css">

<style>
    .main_container2 {
        width: calc(100% - 50px);
        margin:auto;
        font-size: x-large;
        overflow-x:auto;
    }
.upload-button {
    font-size: xx-small;
}
input, button, select, {
        font-size: xx-small;
}
.chat-message{
    font-size: 15px;
}
textarea {
    font-size: medium;
}

.btn-primary:hover{
    background:#fff;
    border-color:#fff;
}

.thumb_link.img_edi{
    min-width:285px;
}

@media screen and (max-width: 992px) {
    .main_container{
        width:100%;
    }
}

@media screen and (max-width: 768px) {
    .chat-box {
        width: 90%;
    }
}
</style>

<?php
if ($_SESSION['webUser']['usertypenew'] == 'Editor') {
    $id=$userId;
    $editorName = $_SESSION['webUser']['name'];
    $editorid = $_SESSION['webUser']['id'];
    $sql_file = "SELECT * FROM final_img WHERE assigned_from = '$editorid' AND package_id=$productId";
    $result_New = $dbF->getRows($sql_file);

            echo'
                        <div class="goback_btn">
  <button class="go_back_btn" onclick="history.back()">
    <img src="'.WEB_URL.'/webImages/goBack_icn.png" alt="Go Back">
  </button>
</div>';

    if ($result_New) {
        foreach ($result_New as $val) {
$editor_id=$val['assigned_from'];
$user_id=$val['user_id'];
          if ($val['project_status'] == 1){  

echo '<script>';
echo 'var editor_id = ' . $editor_id . ';';
echo 'var user_id = ' . $user_id . ';';
echo '</script>';              
             

}
$sqlQry = "SELECT * FROM final_img WHERE assigned_from = '$editorid' AND package_id=$productId";
$dataueditor = $dbF->getRow($sqlQry);

 if ($dataueditor['status'] !=1 && $dataueditor['status'] ==NULL ){
echo'<div class="main_container2">';

 if ($val['project_status'] == 1){ 
echo'
<div class="main_heading">
    <h3>Original Images</h3>
    <h3 class="edit_images">Edit Images and Video Links</h3>
</div>
';
    echo'

<div class="gallery-container">
    <div class="thumbnails"></div>
    <div class="scrollbar">
        <div class="thumb"></div>
    </div>
   
    <div class="main">';
    
        $qry = "SELECT * FROM uploaded_files WHERE account_id = $user_id AND `status`= '1' AND product_id=$productId ";
    $eData = $dbF->getRows($qry);
    
    
    


    $url = WEB_URL;

    $i = 1;
    if ($dbF->rowCount > 0) {
        $html = '';
        foreach ($eData as $val3) {
          
        $imageId=$val3['id'];
    
    echo'<div class="slides2">';
        $qry2 = "SELECT * FROM editor_upload WHERE editor_id = $id AND `product_id`=$productId AND `status`= '1' AND img_index = $imageId ORDER BY id DESC";
    $eData2 = $dbF->getRows($qry2);
    @$images = $eData2['image_path'];

    foreach ($eData2 as $val2) {
         $name = 'Image ' . $i;
        $image = $val2['image_path'];
        $imgType  = $val2['file_type'];
        
                if($imgType=="link"){
                $typOfData = '<a class="thumb_link img_edi" title="' . $image . '" target="_blank" href="' . $image . '" data-image="' . $name . '"></a>';

 
                }else{
                  $typOfData='<a data-fancybox="selected_image_for_editor" href="' . $url . "/" . $image . '">
                  <img class="img_edi" src="'.$url.'/'.$image.'" data-image="'.$name.'"></a>';  
                    
                }
//   echo '<a data-fancybox="selected_image_for_editor" href="' . $url . "/" . $image . '">'.$typOfData.'</a>';
  echo $typOfData;
    }
          

        echo '</div>';
            $i++;
        

    }
        
    }
    
    
    
    echo'
    </div>
    <div class="slides">
    </div>
    </div>

     <div class="main-container">
     <p id="status">
     ';
      
            $qry_Status = "SELECT * FROM final_img WHERE assigned_from = $id AND package_id=$productId ";
            $Data = $dbF->getRow($qry_Status);
            $userStatus=$Data['status'];
            if($userStatus == 1){
                echo "Finish";
            }else{
                echo"Pending";
            }
            echo'</p>
            <div id="image-container2">

            </div>
        </div>';



}

       
       
       
        echo'
    <input type="hidden" name="newid" value="' . $val['id'] . '">';
            if (@$val['project_status'] != 1) {
                echo ' <input id="acceptButton" class="submit-button" name="Accept" type="submit" value="Accept">
        <input id="declineButton" class="Decline-button" name="Decline" type="submit" value="Decline">
';
            }
            echo '</form>';


            if (@$val['project_status'] == 1) {
echo'</div>';

                echo '

<div class="chatBox_main">
<h2>Chat Box</h2>
  <div class="chat-box" id="chatBox">';
  echo'<div id="chats">
  
  ';



                $user_id = $val['user_id'];

              $sql = "SELECT * FROM chat_comment WHERE (sender_id = '$id' OR user_id = $user_id) AND `project_id` = $productId ORDER BY `time` DESC";
                $comment_data = $dbF->getRows($sql);
                foreach ($comment_data as $commentVal) {
                    $message = $commentVal['message'];
                    $sender_id = $commentVal['sender_id'];
                    // $time2 = $commentVal['time'];
                    // $time = substr($time2, 11);
                         $time2 = $commentVal['time'];
                $time = substr($time2, 11);
                
                $timestamp = strtotime($time);

                $formattedTime = date('h:i A', $timestamp);
                    $username = $functions->webUserName($sender_id);

                    echo '
                    <div class="chat-message">
                    ' . $username["acc_name"] . '-<b>' . $message . '</b>
                    <div class="time-message">' . $formattedTime . '</div>
                    </div>
                    
                    ';
                }
                echo '
                </div>
                <div class="send_msg">
            <textarea type="text" id="messageInput" placeholder="Type your message..."></textarea>
            <input type="hidden" id="user_Id" value="' . $val['user_id'] . '">
            <input type="hidden" id="projectId" value="' . $productId . '">
            <input type="hidden" id="assignedFrom" value="' . $val['assigned_from'] . '">
            <input type="hidden" id="sender_Id" value="' . $id . '">
            <button class="btn btn-primary pull-right" onclick="sendMessage()"><img src="'.WEB_URL.'/webImages/send_btn.png"></button>
            </div>
             </div>
             </div>
            ';
            }
        }else{
                    echo '<script>
        // Show the alert box with the message
        alert("Your Project is Completed");

        // Go back to the previous page
        window.location.href = "dashboard";
      </script>';
        }
    }
    } else {
        echo "No Project Found .";
    }
}

?>


<?php
if ($_SESSION['webUser']['usertypenew'] == 'Client') {
// echo'<div class="main_container">';    
$currentDateTime = date('Y-m-d H:i:s');
$sql_Order = "SELECT * FROM `orders` WHERE `order_user`=? AND `expire_date` >= ? AND `order_id`=?";
$order_chk = $dbF->getRows($sql_Order, array($userId, $currentDateTime,$productId));
if($order_chk){
 
            $sql_file = "SELECT * FROM final_img WHERE user_id = '$userId' AND package_id=$productId";
            $result_New = $dbF->getRows($sql_file);
  
            echo'
                        <div class="goback_btn">
  <button class="go_back_btn" onclick="history.back()">
    <img src="'.WEB_URL.'/webImages/goBack_icn.png" alt="Go Back">
  </button>
</div>';
 
        foreach ($result_New as $val) {

          if ($val['project_status'] == 1){  
$editor_id=$val['assigned_from'];
$user_id=$val['user_id'];
echo '<script>';
echo 'var editor_id = ' . $editor_id . ';';
echo 'var user_id = ' . $user_id . ';';
echo '</script>';
          }
          } 
?>
<div class="main_container2">
<?php

?>
<!--<button class="link-button"><a href="<?php //echo WEB_URL . "/generator?user_id=" . base64_encode($userId). "&username=" . $encoded_username; ?>">Share-->
<!--        link</a></button>-->
<!--<button class="link-button"><a href="<?php //echo WEB_URL . "/dashboard"?>">Dashboard</a></button>-->
        
<?php if (@$val['project_status'] == 0){ ?>
<form method="post" enctype="multipart/form-data">
    <h2 class="tab_heading">Album Images</h2>
    <input type="hidden" id="AjaxFileNewId" name="ProductNewId" value="<?php echo $userId ?>">
    <input type="hidden" id="userId" name="id" value="<?php echo $productId ?>">
    <input type="hidden" id="AjaxFileNewPage" value="album">
    <input type="hidden" name="user" value="<?php echo $userId ?>">

    <div id="dropbox">
        <?php //$functions->albumEditImagess($userId); 
            ?>

    </div><span class="message">Drop images here to upload.<br />
        <i>they will only be visible to you</i></span><br>

</form>
<?php } ?>
<?php if (@$val['project_status'] == 1 ){ ?>
<div class="main_heading">
    <h3>Original Images</h3>
    <h3 class="edit_images">Edit Images and Video Links</h3>
</div>
<div class="gallery-container">
    <div class="thumbnails"></div>
    <div class="scrollbar">
        <div class="thumb"></div>
    </div>
   
    <div class="main">
<?php 

        $qry = "SELECT * FROM uploaded_files WHERE account_id = $userId AND `status`= '1' AND product_id=$productId ";
    $eData = $dbF->getRows($qry);
    
    


    $url = WEB_URL;

    $i = 1;
    if ($dbF->rowCount > 0) {
        $html = '';
        foreach ($eData as $val3) {
        $imageId=$val3['id'];
    
    echo'<div class="slides2">';
        $qry2 = "SELECT * FROM editor_upload WHERE editor_id = $editor_id AND `product_id`=$productId AND `status`= '1' AND img_index = $imageId ORDER BY id DESC";
    $eData2 = $dbF->getRows($qry2);
    @$images = $eData2['image_path'];
    foreach ($eData2 as $val2) {
         $name = 'Image ' . $i;
        $image = $val2['image_path'];
                  $imgType  = $val2['file_type'];
        
                if($imgType=="link"){
                  $typOfData='<a class="thumb_link img_edi" title="'.$image.'" target="_blank href="' . $image . '" data-image="'.$name.'"></a>';  
                }else{
                  $typOfData='<a data-fancybox="selected_image_for_editor" href="' . $url . "/" . $image . '">
                  <img class="img_edi" src="'.$url.'/'.$image.'" data-image="'.$name.'"></a>';  
                    
                }
//   echo '<a data-fancybox="selected_image_for_editor" href="' . $url . "/" . $image . '">'.$typOfData.'</a>';
  echo $typOfData;
    }
          

        echo '</div>';
            $i++;
        

    }
        
    }
    
  ?>  
    
 
    </div>
    <div class="slides">
    </div>
    </div>

     <div class="main-container">
         <form action="status.php" method="POST">
        <input type="hidden" id="proId" name="proId" value="<?php echo $productId ?>">
        <?php
            $qry_Status = "SELECT * FROM final_img WHERE user_id = $userId AND `package_id`=$productId";
            $Data = $dbF->getRow($qry_Status);
            $userStatus=$Data['status'];

            if($userStatus == NULL){
            echo'
         <button id="updateButton" class="btn_gradient_small">
             <span class="start">Update Status</span>
             <span class="hover">Update Status</span>
         </button>
            <p id="status">';
                
            }
            if($userStatus == 1){
                echo "Finish";
           
            }else{
                echo"Pending";
            }
            
            
            ?></p>
            </form>
            <div id="image-container2">

            </div>
        </div>


<?php
}
if(@$val['project_status'] == NULL && @$val['publish'] == 0){
    
    echo' <form action="uploadPiture.php" method="POST">
    <div class="main-container">
        <h2>Original Image</h2>
        <div id="image-container">
        <input type="hidden" name="productId" value="' . $productId . '">


        ';
         $qry = "SELECT * FROM uploaded_files WHERE account_id = '$userId' AND `Status`= '0' AND product_id=$productId ORDER BY id ASC";
        $url = WEB_URL;
        $eData = $dbF->getRows($qry);
$html='';
        $i = 1;
        foreach ($eData as $key => $val) {
            $img    = $val['file_path'];
            $imgId  = $val['id'];
            $name   = $val['file_name'];

            if (empty($name)) {
                $name = 'Image ' . $i;
            }

                  $html .= '
        <div class="image-container">
            <input type="checkbox" name="selected_images[]" value="' . $imgId . '">
            <input type="hidden" name="userid" value="' . $userId . '">
            <input type="hidden" name="selectedImg" value="' . $img . '">
            <img src="' . $url . "/uploads/" . $img . '" alt="' . $name . '">
            <p>' . $name . '</p>
        </div>';

            $i++;
        }
        echo $html;
        
        echo'

        </div>
    </div>';
    
}
        $qry = "SELECT * FROM `final_img` WHERE `user_id`= $userId AND `package_id`=$productId";
        $result = $dbF->getRow($qry);

        if (@$result['user_id'] == $userId && empty($result['project_status'])) {
            if(@$val['publish'] == 0){
            echo '<input class="submit-button" type="submit" value="Upload Selected Images">
            
            </form>';
            }
        }        
?>
<?php
        $qry = "SELECT * FROM `final_img` WHERE `user_id`= $userId AND `package_id`=$productId";
        $result = $dbF->getRow($qry);
 if (@$result['user_id'] == $userId && @$result['project_status']==1) {
            echo '
</div>
<div class="chatBox_main">
<h2>Chat Box</h2>
  <div class="chat-box" id="chatBox">';
  echo'  
  <div id="chats">';
  

            $assigned = $result['assigned_from'];
            

            // $sql = "SELECT * FROM chat_comment WHERE assigned_from = $assigned AND project_id = $productId ORDER BY `time` DESC";
            $sql = "SELECT * FROM chat_comment WHERE (sender_id = '$id' OR user_id = $user_id) AND `project_id` = $productId ORDER BY `time` DESC";
            $comment_data = $dbF->getRows($sql);
            foreach ($comment_data as $commentVal) {
                $message = $commentVal['message'];
                $sender_id = $commentVal['sender_id'];
                // $time2 = $commentVal['time'];
                // $time = substr($time2, 11);
                $time2 = $commentVal['time'];
                $time = substr($time2, 11);
                
                $timestamp = strtotime($time);

                $formattedTime = date('h:i A', $timestamp);
                
                $username = $functions->webUserName($sender_id);

                echo '
                    <div class="chat-message">
                    ' . $username["acc_name"] . '-<b>' . $message . '</b>
                    <div class="time-message">' . $formattedTime . '</div>
                    </div>
                    
                    ';
            }
            echo ' </div>';
                        echo '
    <div class="send_msg">
  <textarea  type="text" id="messageInput" placeholder="Type your message..."></textarea>
<input type="hidden" id="user_Id" value="' . $result['user_id'] . '">
<input type="hidden" id="projectId" value="' . $productId . '">
<input type="hidden" id="assignedFrom" value="' . $result['assigned_from'] . '">
<input  type="hidden" id="sender_Id" value="' . $userId . '">
  <button class="btn btn-primary pull-right" onclick="sendMessage()"><img src="'.WEB_URL.'/webImages/send_btn.png"></button>
<div>
  '; 

            echo'</div></div>';
        }else{
        $qry = "SELECT * FROM uploaded_files WHERE account_id = '$userId' && `Status`= '1'AND product_id=$productId ORDER BY id ASC";
        $eData = $dbF->getRows($qry);
        if($eData){
            echo "<h3>Your Project send an Admin .......</h3>";
            
        }else{
            echo "<h3>Select Images</h3>";
        
        }
        }


        ?>
<?php
}

    
}
?>

    <script>
   $(document).ready(function() {
    function fetchChatMessages(userId, projectId) {
        $.ajax({
            type: "POST",
            url: "gallery_ajax.php?page=realtimechat", // Replace with your endpoint to fetch messages
            data: { id: userId, projectId: projectId }, // Data to send with the request
            dataType: "html", // Response data type is HTML
            success: function(result) {
                $('#chats').html(result); // Update chat area with the fetched messages
            }
        });
    }

    // Fetch chat messages every 5 minutes (300,000 milliseconds)
    setInterval(function() {
    var userId = <?php echo $userId; ?>; // Replace with the actual user ID
    var projectId = <?php echo $productId; ?>; // Replace with the actual project ID

        fetchChatMessages(userId, projectId);
    }, 5000);
}); 


    
    
    const slideGallery = document.querySelector('.slides');
const slides = slideGallery.querySelectorAll('div');
const scrollbarThumb = document.querySelector('.thumb');
const slideCount = slides.length;
const slideHeight = 720;
const marginTop = 16;

const scrollThumb = () => {
const index = Math.floor(slideGallery.scrollTop / slideHeight);
scrollbarThumb.style.height = `${((index + 1) / slideCount) * slideHeight}px`;
};

const scrollToElement = el => {
const index = parseInt(el.dataset.id, 10);
slideGallery.scrollTo(0, index * slideHeight + marginTop);
};

document.querySelector('.thumbnails').innerHTML += [...slides]
.map(
(slide, i) => `<img src="${slide.querySelector('img').src}" data-id="${i}">`
)
.join('');

document.querySelectorAll('.thumbnails img').forEach(el => {
el.addEventListener('click', () => scrollToElement(el));
});

slideGallery.addEventListener('scroll', e => scrollThumb());

scrollThumb();
    
    
//document.getElementById('uploadButton').addEventListener('click', uploadFile);
    
    $(document).ready(function() {
        // console.log('jkhdkahdskad');
        // Function to load images dynamically via Ajax
        function loadImages() {
           var productId = <?php echo $productId; ?>;
            $.ajax({
                url: 'get_images.php', // The URL of your PHP endpoint
                type: 'POST',
                dataType: 'json',
                data: { productId: productId },
                success: function(data) {
                    // console.log(data);
                
                $('.thumbnails').html(data);
               var typeFor = "<?php echo  $_SESSION['webUser']['usertypenew']; ?>"; 
            //   console.log(typeFor);
               
            if(typeFor == 'Editor' ){   
            var buttonsArray = [];
              const items = document.querySelectorAll('[data-img]');
              const dataArray = [];
                    for (let i = 0; i < items.length; i++) {
                        const value = items[i].getAttribute('data-img');
                        const value2 = items[i].getAttribute('data-link');
                        // console.log(value);
                        dataArray.push(value);
                    }
            
            for (var i = 0; i < data.length; i++) {
              const value2 = items[i].getAttribute('data-link');
              if(value2){
            // buttonHTML=' <button class="btn_gradient_small g2 " id="videolink"><span class="start">Video Link</span>  <span class="hover">Video Link</span></button>';
               buttonHTML = '<form action="uploadPiture.php" method="POST" enctype="multipart/form-data">';
                buttonHTML += '<div class="btn_combine">';
                buttonHTML += '<input type="hidden" name="editorId" value="' + editor_id + '">';
                buttonHTML += '<input type="hidden" name="userId" value="' + user_id + '">';
                buttonHTML += '<input type="hidden" name="imgId" value="' + dataArray[i] + '">';
                buttonHTML += '<input type="hidden" name="product_id" value="' + <?php echo $productId; ?> + '">';
                buttonHTML += '<input type="hidden" name="filetype" value="link">';
                buttonHTML += '<input type="url" name="fileToUpload" id="fileToUpload" placeholder="Insert your link">';
                buttonHTML += '<button type="submit" class="upload-button">Upload</button>';
                buttonHTML += '</div>';
                buttonHTML += '</form>';
                  
              }else{
                buttonHTML = '<form action="uploadPiture.php" method="POST" enctype="multipart/form-data">';
                buttonHTML += '<div class="btn_combine">';
                buttonHTML += '<input type="hidden" name="editorId" value="' + editor_id + '">';
                buttonHTML += '<input type="hidden" name="userId" value="' + user_id + '">';
                buttonHTML += '<input type="hidden" name="imgId" value="' + dataArray[i] + '">';
                buttonHTML += '<input type="hidden" name="product_id" value="' + <?php echo $productId; ?> + '">';
                buttonHTML += '<input type="hidden" accept="image/*" name="filetype" value="image">';
                buttonHTML += '<input type="file" name="fileToUpload" id="fileToUpload">';
                buttonHTML += '<button type="submit" class="upload-button">Upload</button>';
                buttonHTML += '</div>';
                buttonHTML += '</form>';
}
                
                
                
                buttonsArray.push(buttonHTML);
            }
            
            $('.slides').html(buttonsArray);
            }
                },
                error: function() {
                    console.log('Failed to fetch images.');
                }
            });
        }
        
        
 
      

        
        
        
        

// Add click event listener using jQuery

        function loadImagess() {
            var productId = <?php echo $productId; ?>;
            $.ajax({
                url: 'get_images2.php', // The URL of your PHP endpoint
                type: 'POST',
                data: { productId: productId },
                dataType: 'json',
                success: function(data) {
                    // $('#image-container2').html(data);
                    // console.log(data);
                    $('#image-container').html(data);
                },
                error: function() {
                    console.log('Failed to fetch images.');
                }
            });
        }

        // Call the loadImages function initially
        loadImages();
        loadImagess();

        // Optionally, you can add a button or other event to trigger the loading of images again
        $('#load-images-button').on('click', function() {
            loadImages();
        });
    });

    function sendMessage() {
        const message = document.getElementById('messageInput').value.trim();
        if (message !== '') {
            const userId = document.getElementById('user_Id').value;
            const projectId = document.getElementById('projectId').value;
            const assignedFrom = document.getElementById('assignedFrom').value;
            const sender_Id = document.getElementById('sender_Id').value;
            // Call AJAX function to send the message and update the database
            sendChatMessageToServer(userId, projectId, assignedFrom, message, sender_Id);
            document.getElementById('messageInput').value = '';
        }
    }

    function sendChatMessageToServer(userId, projectId, assignedFrom, message, sender_Id) {
        // Construct the data object containing all the values to send to the server
        const commentData = {
            user_id: userId,
            id: projectId,
            assigned_from: assignedFrom,
            message: message,
            senderId: sender_Id
        };

        // Use jQuery AJAX to post the data to "comment.php"
        $.ajax({
            type: "POST",
            url: "comment.php",
            data: commentData,
            cache: false,
            success: function(result) {
                $('#chats').html(result);

            }
        });
    }


    </script>
    
    
    <?php include("dashboard_footer.php"); ?>