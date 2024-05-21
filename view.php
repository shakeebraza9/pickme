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

$userId=base64_decode($_GET['user_id']);
$productId=base64_decode($_GET['product_id']);

?>
<style>

    #dropbox .preview {
    width: 235px;
    height: 220px;
    float: left;
    margin: 30px 0 0 20px;
    position: relative;
    text-align: center;
    padding: 4px;
    background: #eee;
    
}

    #dropbox .preview {
    height: 255px !important;
    padding: 4px;
    background: #eee;
    border:2px solid black;
}

img {
    width: 100%;
    transition: all 200ms linear;
    transition-delay: 0.1s;
}

.glyphicon {
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.description{
        position: initial !important;
    margin: 3px 0;
}

.inner_main_product .upload_images, .inner_main_product .selected_images, .inner_main_product .edited_images, .inner_main_product .select_send_images {
    width: 100%;
    height: 542px;
    position: relative;
    border: 1px solid var(--color-basic-txt-black);
} 

</style>

<?php
if ($_SESSION['webUser']['usertypenew'] == 'Editor') {
include("dashboard_header.php");

    $id=$userId;
    $editorName = $_SESSION['webUser']['name'];
  
    $editorid = $_SESSION['webUser']['id'];
    $sql_file = "SELECT * FROM final_img WHERE assigned_from = '$editorid' AND package_id=$productId";
    $result_New = $dbF->getRow($sql_file);



    if ($result_New) {
$editor_id=$result_New['assigned_from'];
$user_id=$result_New['user_id'];

?>

<?php  

            $sqlEvent = "SELECT event_name,event_message FROM event WHERE order_id = ?";
            $eventData = $dbF->getRow($sqlEvent,array($productId));
            $heading=$eventData['event_name'];
            $eventDesc=$eventData['event_message'];
            
            echo'
                        <div class="goback_btn">
  <button class="go_back_btn" onclick="history.back()">
    <img src="'.WEB_URL.'/webImages/goBack_icn.png" alt="Go Back">
  </button>
</div>
            <div class="event_heading">
                    <h1>Event Information</h1>
                    

                    <h2>'.$heading.'</h2>
                    <p>'.$eventDesc.'</p>';
                 if($result_New['status'] == 1){
                echo '<p>Status is Completed...</p>';
            }else{
                echo '<p>Status is Pending...</p>';
                
            }   
            echo'        
            </div>
            ';
            

?>
            <div class="inner_main_product">
                <button class="send_image_icon" id="sendImagesBtn">
                    <img src="webImages/send_images.png" alt="send_image">
                </button>
                <button class="submit_image_icon" id="removeImagesBtn">
                    <img src="webImages/undo_selected.png" alt="remove_image">
                </button>
                <!-- Upload Image -->
                <!-- Send Image -->
             
                <div class="select_send_images">
                    <div class="inner_heading">
                        <?php
                        if($result_New['project_status'] == 0 && $result_New['project_status'] == NULL){
                            
                           echo"<h1>Accept Your Images</h1>"; 
                        }else{
                           echo"<h1>Assign Your Images and Video Links</h1>"; 
                        }
                        ?>
                        
                    </div>
                    <?php
                    if($result_New['project_status'] == 0 && $result_New['project_status'] == NULL){
                    echo'
                    <form action="uploadPiture.php" method="POST">
                        ';
                    }
                    ?>
                    <div class="inner_images" id="imageContainer_submit">
                        <?php
                        $qry5 = "SELECT * FROM uploaded_files WHERE product_id = '$productId' AND status=1";
                        $data5 = $dbF->getRows($qry5);
                        if($data5){
                            foreach($data5 as $val5){
                                $img=$val5['file_path'];
                                 $imgType  = $val5['file_type'];
                                 $description=$val5['description'];

                                $imgPath=WEB_URL."/uploads/".$img;
              
                                if($imgType=='link'){
                                $LinkOrImg='
                                <div class="thumb_wrapper thumb_wrapper_link">
                                <div class="thumb_container thumb_container_link">
                                <a class="thumb thumb_link" href="'.$img.'" title="'.$img.'" target="_blank">
                                </a>
                                </div>
                                </div>';
                                  
                                }else{
                                //   $typOfData='<img src="'.$imgPath.'">'; 
                                  $LinkOrImg='
                                <div class=" thumb_wrapper preview albumPreview">
                            <span class="imageHolder thumb_container">
                             <a class="thumb thumb_link" href="'.$img.'" title="'.$img.'" target="_blank">
                                
                                </a>
                               
                                $delBtn
                                 
                            </span>

                            <div class="progressHolder album">
                                <input type="text" id="alt-$imgId" value="description" placeholder="description" class="form-control description" style="margin:3px 0">
                            </div>
                        </div>';
                                    
                                }
                                echo $LinkOrImg;            
                                
                            }
                        }
                        
                        ?>
                        
                        
                        <?php
                    echo'<input type="hidden" name="productId" value="' . $productId . '">';
                    echo'<input type="hidden" name="newid" value="' . $id . '">';
?>
                    </div>

                    <!--<form action="display_selected_images.html">-->
                    
                        <div class="inner_btn">
<?php
                            if($result_New['project_status'] == 0 && $result_New['project_status'] == NULL){
echo'
                        <button class="btn_gradient_small g2" name="Accept" value="Accept">
                                <span class="start">Accept</span>
                                <span class="hover">Accept</span>
                            </button>
                            <button class="btn_gradient_small g2" id="submitImagesBtn" name="Decline" value="Decline">
                                <span class="start">Decline</span>
                                <span class="hover">Decline</span>
                            </button>

';
}
else{
if($result_New['status'] == 0 && $result_New['status'] == NULL){
    echo'
        <a href="downloadimg?product_id='.base64_encode($productId).'&user_id='.base64_encode($id).'"class="btn_gradient_small g2" id="submitImagesBtn" >
                                <span class="start">Download</span>
                                <span class="hover">Download</span>
                            </a>';
    echo'
        <a href="linkview?product_id='.base64_encode($productId).'&user_id='.base64_encode($id).'"class="btn_gradient_small g2" id="submitImagesBtn" >
                                <span class="start">Video link view</span>
                                <span class="hover">Video link view</span>
                            </a>';
                            echo '<a href="display_image?product_id='.base64_encode($productId).'&user_id='.base64_encode($id).'"class="btn_gradient_small g2" id="submitImagesBtn" name="Decline" value="Decline">
                                <span class="start">Editor Portal</span>
                                <span class="hover">Editor Portal</span>
                            </a>';
}   
}
?>
                            
                        </div>
<?php                        if($result_New['project_status'] == 0 && $result_New['project_status'] == NULL){
                    echo'
                    </form>
                        ';
                    }
                    ?>
                </div>
        
            </div>
<?php
}
}
?>

<?php

if ($_SESSION['webUser']['usertypenew'] == 'Client') {
include("dashboard_header.php");
    
     


      $currentDateTime = date('Y-m-d H:i:s');
      $sql_Order = "SELECT * FROM `orders` WHERE `order_user`=? AND `expire_date` >= ? AND `order_id`=?";
      $order_chk = $dbF->getRow($sql_Order, array($userId, $currentDateTime,$productId));
      
      if($order_chk){
            $packID=trim($order_chk['product_id'], " ");
            
            $sql10 = "SELECT packagetype FROM `proudct_detail_spb` WHERE `prodet_id`= ?";
            $data10 = $dbF->getRow($sql10,array($packID));
            $packageType = trim($data10['packagetype'] , " ");
            
            $sql_file = "SELECT * FROM final_img WHERE user_id = '$userId' AND package_id=$productId";
            $result_New = $dbF->getRow($sql_file);

            $sqlEvent = "SELECT event_name,event_message FROM event WHERE order_id = ? AND user_id= ?";
            $eventData = $dbF->getRow($sqlEvent,array($productId,$userId));
            @$heading=$eventData['event_name'];
            @$eventDesc=$eventData['event_message'];
            
            
            
            
            echo'
                <div class="goback_btn">
                      <button class="go_back_btn" onclick="history.back()">
                        <img src="'.WEB_URL.'/webImages/goBack_icn.png" alt="Go Back">
                      </button>
                </div>
            <div class="event_heading">
                    <h1>Event Information</h1>
                    

                    <h2>'.$heading.'</h2>
                    <p>'.$eventDesc.'</p>';
                    if($result_New['images_path'] != NULL){
                        if($result_New['project_status'] != NULL){
                        if($result_New['status'] ==1){
                        echo '<p> Your event completion, click the download button to obtain your images swiftly. <p>';
                            
                        }else{
                        echo '<p> Click on Go button and see your images <p>';
                        }
                        }else{

                        echo '<p> Assigning your images into editor please wait <p>';
                        }
                    }else{
                        $username = $functions->productImageSize($productId);
                        echo $username ;
                        
                    }
            echo '</div>';

?>
            <!--<div class="btnnn"><button>Upgrade</button></div>-->
            
                        
            <div class="inner_main_product">
                <button class="send_image_icon" id="sendImagesBtn">
                    <img src="webImages/send_images.png" alt="send_image">
                </button>
                <button class="submit_image_icon" id="removeImagesBtn">
                    <img src="webImages/undo_selected.png" alt="remove_image">
                </button>
                <!-- Upload Image -->
                <div class="upload_images">
                    <div class="inner_heading">
                        <?php 
                        if($packageType == 1){
                            echo'<h1>Your Images / Video links</h1>';
                        }
                        else if($result_New['publish'] == 0 && $result_New['publish'] == NULL){
                            echo'<h1>Uploads your images / Videos</h1>';
                        } else{
                            echo'<h1>Your Images / Video links</h1>';
                        }
                        ?>
                    </div>
                    <div class="inner_images" id="imageContainer">
                        
                        
                        
                                <?php
                                if($result_New['publish'] == 0 && $result_New['publish'] == NULL){
                                        $functions->albumEditImage($userId,$productId, $packageType); 
                                }
                                else{
                                        $functions->albumImageDisplay($userId,$productId); 
                                }
                                
                                ?>
                    </div>
                
                    <div class="inner_btn">
                        
                        <div id="videoLinkPopup" class="popup">
    <div class="popup-content">
        <span class="close">&times;</span>
        <input class="linkinput" type="text" id="videoLinkInput"data-ref="<?php echo $packageType ?>"  placeholder="Enter video link...">
        <button id="videoLinkSubmit">Submit</button>
    </div>
</div>
                        


<?php
if($result_New['publish'] == 0 && $result_New['publish'] == NULL){
    if($packageType == 0){
            echo'
            <button class="btn_gradient_small g2" id="selectAllButton"><span class="start">Select All</span> 
                            <span class="hover">Select All</span></button>';
    }

echo '
                                <input type="hidden" id="AjaxFileNewId" name="ProductNewId" value=" ' . $productId . ' ">
                                <input type="hidden" id="AjaxFileNewPage" value="album_new">
                                <input type="hidden" id="packid" value="'.$packageType.'">
                            <input type="file" name="pic[]" accept="image/*" id="fileInput" multiple style="display: none;">
                                <input type="hidden" id="userId" value="'.$userId . '">
                                
                             <button class="btn_gradient_small g2" id="uploadBtn">
                            <span class="start">Upload your images</span>
                            <span class="hover">Upload your images</span>
                             </button>
                            <button class="btn_gradient_small g2" id="videolink">
                            <span class="start">Upload your video link</span>
                            <span class="hover">Upload your video link</span>
                        </button>
                        
                        


';
}else if($result_New['project_status'] == 1 ){
    echo'
    <a href="downloadimg?product_id='.base64_encode($productId).'&user_id='.base64_encode($id).'"class="btn_gradient_small g2" id="submitImagesBtn" >
                                <span class="start">Download</span>
                                <span class="hover">Download</span>
                            </a>';
    echo'
    <a href="linkview?product_id='.base64_encode($productId).'&user_id='.base64_encode($id).'"class="btn_gradient_small g2" id="submitImagesBtn" >
                                <span class="start">Video link view</span>
                                <span class="hover">Video link view</span>
                            </a>';
if($result_New['status'] == 0 && $result_New['status'] == NULL){
                           echo' <a href="display_image?product_id='.base64_encode($productId).'&user_id='.base64_encode($id).'"class="btn_gradient_small g2" id="submitImagesBtn">
                                <span class="start">Editor Portal</span>
                                <span class="hover">Editor Portal</span>
                            </a>';
}   
}else if($result_New['publish'] == 1){
    $view=base64_encode("view");
    echo'
      <a href="downloadimg?product_id='.base64_encode($productId).'&user_id='.base64_encode($id).'&req='.$view.'"class="btn_gradient_small g2" id="submitImagesBtn" >
                                <span class="start">view images</span>
                                <span class="hover">view images</span>
                            </a>
    ';
}
?>
                            

                        
                    </div>
                </div>
                <!-- Send Image -->
                   <?php
                   
                    if($result_New['publish'] == 0 && $result_New['publish'] == NULL && $packageType==0){
                    ?>
                <div class="select_send_images">
                    <div class="inner_heading">
                        <h1>Submit your images / Videos</h1>
                    </div>
                    <form action="uploadPiture.php" method="POST">
                    <div class="inner_images" id="imageContainer_submit">
                        <?php
                    echo'<input type="hidden" name="productId" value="' . $productId . '">';
                    $qry5 = "SELECT * FROM uploaded_files WHERE account_id = '$userId' AND product_id =$productId AND status=0 AND file_type='link'";
                        $data5 = $dbF->getRows($qry5);
                        // $html=array();
                        foreach($data5 as $val){
                        $img=$val['file_path'];
                        $imgId = $val['id'];
                        $data_Id=$val['id'];
                          echo  '
                          
                        <div class="thumb_wrapper thumb_wrapper_link">
                        <div class="thumb_container thumb_container_link">
                        <a class="thumb thumb_link" href="' . $img . '" data-userid="' . $userId . '"title="'.$img.'" target="_blank">
                        </a>
                        <button class="productEditImageDel delete_image_btn" data-id="'.$imgId.'">
                        <i class="fa fa-xmark-circle"></i></button>
                        <input type="checkbox" class="selected_image_checkbox2"  name="selected_images[]" value="'.$data_Id.'"></div>
                        <input type="hidden" name="userid" value="' . $userId . '">
                        <input type="hidden" name="selectedImg" value="' . $img . '">
                        </div>
                        
                        
                        ';
                        
                        }

?>
                    </div>

                    <!--<form action="display_selected_images.html">-->
                    
                        <div class="inner_btn">
<?php
    if($result_New['publish'] == 0 && $result_New['publish'] == NULL){
echo'
<a class="btn_gradient_small g2" id="selectAllButton2"><span class="start">Select All Images</span>
                            <span class="hover">Select All Images</span></a>

                            <button class="btn_gradient_small g2" id="submitImagesBtn">
                                <span class="start">Submit</span>
                                <span class="hover">Submit</span>
                            </button>

';
}
?>
                            
                        </div>
                    </form>
                </div>
                <?php
                    }
                ?>
            </div>



        </div>
    </div>


<?php 
    


}
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
        const packageType = $('#videoLinkInput').attr('data-ref')

    videoLinkSubmit.on('click', function () {
                console.log(packageType);

        const videoLink = videoLinkInput.val();
        const productId = "<?php echo $productId;?>";
        const userId = "<?php echo $userId;?>";

        if (videoLink && productId && userId) {
            // console.log('shakeeb');
            // Make an AJAX request to save the data to the database
            $.ajax({
                url: 'gallery_ajax.php?page=userLinksave', // Replace with your server-side script URL
                method: 'POST',
                data: { videoLink: videoLink, productId: productId, userId: userId },
                success: function (response) {
                    if(packageType == 1){
                        $('#imageContainer').append(response);
                    }else{
                        $('#imageContainer_submit').append(response);
                    }
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
    
 $(".productEditImageDel").click(function(e) {
            e.preventDefault();
            if (secure_delete()) {
                id = $(this).attr("data-id");
                parnt = $(this).closest(".thumb_wrapper");
                $.ajax({
                    type: "POST",
                    url: 'gallery_ajax.php?page=albumEditImageDel',
                    data: {
                        imageId: id
                    }
                }).done(function(data) {
                    if (data == '1') {
                        parnt.remove();
                        // parnt.hide(500);
                    } else if (data == '0') {
                        jAlertifyAlert("<?php echo 'Image Not Delete Please Try Again'; ?>");
                        return false;
                    }
                });
            }
        });   

 $(document).ready(function() {
    $("#uploadBtn").click(function() {
        // Trigger file selection dialog
        $("#fileInput").click();
    });

    $("#fileInput").change(function() {
        // Get the additional data you want to send
        var files = this.files;
        var itemId = $("#AjaxFileNewId").val(); // Example ID
        var page = $("#AjaxFileNewPage").val(); // Example page
        var id = $("#userId").val(); // Example page
        var packid = $("#packid").val(); // Example page
  console.log(packid);
//         return 0;
        // Combine additional data with the selected files
        var formData = new FormData();
        formData.append("ProductNewId", itemId);
        formData.append("page", page);
        formData.append("id", id);
        formData.append("packId", packid);
        formData.append("user", id);
        // var temp = []

        for (let i = 0; i < this.files.length; i++) {
            // formData.append("pic", this.files[i]);
            formData.append("pic[]", this.files[i]);

        } 

        // Send the combined data to the server
        uploadImages(formData);
    });

    function uploadImages(formData) {
        const progressBar = document.getElementById("progressBar");
        const statusDiv = document.getElementById("status");
        
     

        $.ajax({
            url: 'post_file_New.php',
            type: "post",
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {
                // statusDiv.innerHTML += `<p>${response}</p>`;
                $('#imageContainer').html(response);
            },
            error: function() {
                statusDiv.innerHTML += `<p>Error uploading files.</p>`;
            }
        });
    }
});

    
    
    const slideGallery = document.querySelector('.slides');
    
if(slideGallery !== null ){
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
}
//document.getElementById('uploadButton').addEventListener('click', uploadFile);
    
    $(document).ready(function() {
        // console.log('jkhdkahdskad');
        // Function to load images dynamically via Ajax
        function loadImages() {
           
            $.ajax({
                url: 'get_images.php', // The URL of your PHP endpoint
                type: 'POST',
                dataType: 'json',
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
                        // console.log(value);
                        dataArray.push(value);
                    }
            
            for (var i = 0; i < data.length; i++) {
              
                buttonHTML = '<form action="uploadPiture.php" method="POST" enctype="multipart/form-data">';
                buttonHTML += '<div class="btn_combine">';
                buttonHTML += '<input type="hidden" name="editorId" value="' + editor_id + '">';
                buttonHTML += '<input type="hidden" name="userId" value="' + user_id + '">';
                buttonHTML += '<input type="hidden" name="imgId" value="' + dataArray[i] + '">';
                buttonHTML += '<input type="file" name="fileToUpload" id="fileToUpload">';
                buttonHTML += '<button type="submit" class="upload-button">Upload</button>';
                buttonHTML += '</div>';
                buttonHTML += '</form>';

                
                
                
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
                    console.log(data);
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
    



    $(".albumAltUpdate").click(function() {
    btn = $(this);
    btn.addClass('disabled');
    btn.children('.trash').hide();
    btn.children('.waiting').show();

    id = btn.attr('data-id');
    alt = $('#alt-' + id).val();
    
    console.log(id,alt)
    btn.children('span').text('Wait...');
    $.ajax({
        type: 'POST',
        url: 'gallery_ajax.php?page=update',
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
</script>
    
    
    <?php include("dashboard_footer.php"); ?>