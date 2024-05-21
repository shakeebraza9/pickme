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
            <div class="event_heading">
                    <h1>Event Information</h1>

                    <h2>'.$heading.'</h2>
                    <p>'.$eventDesc.'</p>
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
                        <h1>Submit your images</h1>
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
                                echo'
                                <div class="thumb_wrapper">
                                <div class="thumb_container">
                                <a class="thumb" data-fancybox="selected_image_for_editor" href="'.WEB_URL.'/uploads/'.$img.'">
                                <img src="'.WEB_URL.'/uploads/'.$img.'">
                                </a>
                                </div>
                                </div>
                                ';
                                
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
    echo'
        <a href="downloadimg?product_id='.base64_encode($productId).'&user_id='.base64_encode($id).'"class="btn_gradient_small g2" id="submitImagesBtn" >
                                <span class="start">Download</span>
                                <span class="hover">Download</span>
                            </a>

                            <a href="display_image?product_id='.base64_encode($productId).'&user_id='.base64_encode($id).'"class="btn_gradient_small g2" id="submitImagesBtn" name="Decline" value="Decline">
                                <span class="start">Go here</span>
                                <span class="hover">Go here</span>
                            </a>';
    
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
$order_chk = $dbF->getRows($sql_Order, array($userId, $currentDateTime,$productId));
if($order_chk){
 
            $sql_file = "SELECT * FROM final_img WHERE user_id = '$userId' AND package_id=$productId";
            $result_New = $dbF->getRow($sql_file);

?>

        
<?php  

            $sqlEvent = "SELECT event_name,event_message FROM event WHERE order_id = ? AND user_id= ?";
            $eventData = $dbF->getRow($sqlEvent,array($productId,$userId));
            $heading=$eventData['event_name'];
            $eventDesc=$eventData['event_message'];
            
            echo'
            <div class="event_heading">
                    <h1>Event Information</h1>

                    <h2>'.$heading.'</h2>
                    <p>'.$eventDesc.'</p>';
                    if($result_New['images_path'] != NULL){
                        if($result_New['project_status'] != NULL){
                        echo '<p> Click on Go button and see your images <p>';
                            
                        }else{
                        echo '<p> Your Images send into editor please wait...... <p>';
                        }
                    }else{
                        echo '<p> Select and uplode images <p>';
                        
                    }
            echo '</div>';

?>


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
                        <h1>Upload your image</h1>
                    </div>
                    <div class="inner_images" id="imageContainer">
                        
                                <?php if($result_New['publish'] == 0 && $result_New['publish'] == NULL){
                                        $functions->albumEditImage($userId,$productId); 
                                }else{
                                    
                                        $functions->albumImageDisplay($userId,$productId); 
                                }
                                
                                ?>
                    </div>
                
                    <div class="inner_btn">
                        
                                                    <?php
                   
                  if($result_New['publish'] == 0 && $result_New['publish'] == NULL){
                      echo'
                      
                        <button class="btn_gradient_small g2" id="clear_data">
                            <span class="start">Hide</span>
                            <span class="hover">Hide</span>
                        </button>
                      
                      
                      ';
                      
                  }  
                    
                    
                ?>

<?php
if($result_New['publish'] == 0 && $result_New['publish'] == NULL){
echo'
                                <input type="hidden" id="AjaxFileNewId" name="ProductNewId" value=" ' . $productId . ' ">
                                <input type="hidden" id="AjaxFileNewPage" value="album">
                                <input type="hidden" id="userId" value="'.$userId . '">
                            <input type="file" name="pic" id="fileInput" multiple style="display: none;">
                             <button class="btn_gradient_small g2" id="uploadBtn">
                            <span class="start">Upload</span>
                            <span class="hover">Upload</span>
                        </button>

';
}else if($result_New['project_status'] == 1 ){
    echo'
    <a href="downloadimg?product_id='.base64_encode($productId).'&user_id='.base64_encode($id).'"class="btn_gradient_small g2" id="submitImagesBtn" >
                                <span class="start">Download</span>
                                <span class="hover">Download</span>
                            </a>

                            <a href="display_image?product_id='.base64_encode($productId).'&user_id='.base64_encode($id).'"class="btn_gradient_small g2" id="submitImagesBtn">
                                <span class="start">Go here</span>
                                <span class="hover">Go here</span>
                            </a>';
    
}
?>
                            

                        
                    </div>
                </div>
                <!-- Send Image -->
                <div class="select_send_images">
                    <div class="inner_heading">
                        <h1>Submit your images</h1>
                    </div>
                    <form action="uploadPiture.php" method="POST">
                    <div class="inner_images" id="imageContainer_submit">
                        <?php
                    echo'<input type="hidden" name="productId" value="' . $productId . '">';
?>
                    </div>

                    <!--<form action="display_selected_images.html">-->
                    
                        <div class="inner_btn">
<?php
                            if($result_New['publish'] == 0 && $result_New['publish'] == NULL){
echo'
                        <button class="btn_gradient_small g2" id="clear_data2">
                                <span class="start">Hide</span>
                                <span class="hover">Hide</span>
                            </button>
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
            </div>



        </div>
    </div>


<?php 
    


}
}
?>


    <script>
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
    
 $(".productEditImageDel").click(function() {
     console.log("hello");

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
                        parnt.hide(500);
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

        // Combine additional data with the selected files
        var formData = new FormData();
        formData.append("ProductNewId", itemId);
        formData.append("page", page);
        formData.append("id", id);
        formData.append("user", id);

        for (let i = 0; i < this.files.length; i++) {
            formData.append("pic", this.files[i]);
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
            contentType: false,
            processData: false,
            success: function(response) {
                statusDiv.innerHTML += `<p>${response}</p>`;
            },
            error: function() {
                statusDiv.innerHTML += `<p>Error uploading files.</p>`;
            }
        });
    }
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
    </script>
    
    
    <?php include("dashboard_footer.php"); ?>