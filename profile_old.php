<?php include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;
// if ($seo['title'] == '') {
//     $seo['title'] = 'User Profile';
// }
$login = $webClass->userLoginCheck();
if (!$login) {
    header('Location: login');
    exit();
}

$msg = $webClass->webUserEditSubmit();
include("header.php");
$id = $_SESSION['webUser']['id'];
?>
<style>
#dropbox {
    background: url(http://localhost/LushLeather/images/background_tile_3.jpg);
    /* background: url(https://localhost/LushLeather/images/backimg.jpg); */
    border-radius: 10px;
    position: relative;
    min-height: 290px;
    overflow: hidden;
    padding-bottom: 40px;
}
.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

/* Styles for the modal content */
.modal-content {
  background-color: #fff;
  width: 530px;
  padding: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 5px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}
#cod-form textarea {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 3px;
  resize: vertical; /* Allow vertical resizing of the textarea */
  min-height: 80px; /* Minimum height of the textarea */
}

/* Styles for the form inside the modal */
#cod-form {
  display: flex;
  flex-direction: column;
}

/* Styles for the form labels */
#cod-form label {
  margin-top: 10px;
  font-weight: bold;
}

/* Styles for the form input fields */
#cod-form input {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

/* Styles for the submit button */
#cod-form button[type="submit"] {
  margin-top: 20px;
  padding: 10px;
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

/* Styles for the close button */
.close-button {
  margin-top: 5px;
  padding: 5px;
  background-color: #d51111;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  margin-inline-start: 441px;
}

.gallery-container {
    display: flex;
    justify-content: left;
}
.upload-button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: blac solid;
    border-radius: 5px;
    cursor: pointer;
    width: 77px;
    height: 36px;
    margin-top: 8px;
}
.thumbnails {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

img {
    aspect-ratio: 1;
    -o-object-fit: cover;
    object-fit: cover;
    border-radius: 0.3rem;
}

.thumbnails img {
    width: 283px;
    /*height: 150px;*/
    height: 164px;
    cursor: pointer;
}

.scrollbar {
       width: 2px;
    height: auto;
    background: #ccc;
    display: block;
    margin: -2px 4px 3px 8px
   
   
    /*width: 1px;*/
    /*height: 520px;*/
    /*background: #ccc;*/
    /*display: block;*/
    /*margin: 0 0 0 8px;*/
}

.thumb {
    width: 1px;
    position: absolute;
    height: 0;
    background: #000;
}

.slides {
    margin: -17px 37px;
    display: grid;
    grid-auto-flow: row;
    gap: 1rem;
    width: calc(540px + 1rem);
    padding: 0 0.25rem;
    /*height: 520px;*/
    overflow-y: auto;
    overscroll-behavior-y: contain;
    scroll-snap-type: y mandatory;
    scrollbar-width: none;
}

.slides>div {
    scroll-snap-align: start;
}

.slides img {
    width: 540px;
    object-fit: contain;
}

.slides::-webkit-scrollbar {
    display: none;
}

.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

* {
    margin: 0;
    padding: 0;
}

input,
button,
select,
textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}

.form-horizontal .form-group {
    margin-right: -15px;
    margin-left: -15px;
}

#dropbox .preview {
    width: 235px;
    height: 220px px;
    float: left;
    margin: 30px 0 0 20px;
    position: relative;
    text-align: center;
    padding: 4px;
    background: #eee;
}

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

#dropbox .preview img {
    max-width: 225px;
    max-height: 165px;
    border: 3px solid #fff;
    display: block;
    box-shadow: 0 0 2px #000;
}

#dropbox .uploaded {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: url(https://localhost/LushLeather/myAdmin/ajaxFileUpload/img/done.png) no-repeat center center rgba(255, 255, 255, 0.5);
    display: none;
}

#dropbox .preview.done .progress {
    width: 100% !important;
    background: #87BA41;
    height: 20px;
}

#dropbox .imageHolder {
    display: inline-block;
    position: relative;
}

#dropbox .progressHolder {
    position: absolute;
    height: 40px;
    width: 100%;
    left: 0;
    bottom: 0;
}


/* Example CSS styles for the images */
.image-container {
    display: inline-block;
    margin: 10px;
    border: 1px solid #ccc;
    padding: 5px;
    width: 235px;
    height: 220px;
    /* float: left; */
    margin: 30px 0 0 20px;
    position: relative;
    text-align: center;
    padding: 4px;
    background: #eee;
}

.main-container {
    border: 1px solid #F2F2F2;
    margin-bottom: 40px;
    padding: 12px;
    
}


.image-container img {
    max-width: 100%;
    height: auto;

}

.submit-button {
    /* margin-top: 261px; */
    margin-inline-start: 40%;
    background-color: #224f56;
    /* Green background color */
    color: white;
    /* Text color */
    border: none;
    /* Remove border */
    padding: 10px 20px;
    /* Add padding */
    cursor: pointer;
    /* Add a pointer cursor on hover */
    font-size: 16px;
    /* Font size */
    border-radius: 5px;
    /* Rounded corners */
}

#load-images-button {
    background: darkgreen;
    padding: 4px;
    color: white;
    border-radius: 2%;
    text-align: right;
    margin-inline-start: 76.5%;
    margin-top: 8px;

}

.Decline-button {
    background-color: #9d0505;
    /* Green background color */
    color: white;
    /* Text color */
    border: none;
    /* Remove border */
    padding: 10px 20px;
    /* Add padding */
    cursor: pointer;
    /* Add a pointer cursor on hover */
    font-size: 16px;
    /* Font size */
    border-radius: 5px;
    /* Rounded corners */
}

/* Apply additional styles on hover */
.submit-button:hover {
    background-color: #45a049;
}

.custom-input {
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    padding: 8px;
    border-radius: 4px;
}

.custom-button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.all-btn {
    display: inline-grid;
    justify-content: right;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
}

.chat-box {
    width: 50%;
    height: 300px;
    border: 1px solid #ccc;
    overflow-y: scroll;
    padding: 10px;
    background-color: #fdfafa94;
    margin-inline-start: 388px;
    margin-bottom: 39px;
     background-image: url(http://localhost/LushLeather/images/backimg.jpg);
    /*opacity: 0.5; */
}

.chat-message {
    margin-bottom: 10px;
}

.chat-message {
      padding: 13px;
    margin-top: 40px;
    border: #c39c9c73 solid 1px;
    background-color: #ffddda00;
    margin-right: 0%;
    border-radius: 1px;
    color: white;

}



textarea {

    resize: none;
    padding: 20px;
    height: 130px;
    width: 100%;
    border: 1px solid #F2F2F2;
}

.time-message {
    margin-inline-start: 90%;
}

h1 {
    text-align: center;
}

.link-button {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #77f0ff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.image-container:hover {
    border: 1px solid #777;
        cursor: pointer;
        opacity: 0.5;
    
}

.btn_combine{
        /*margin-inline-start: 400px;*/
        display: table;
        margin-top: 62px;
}
.img_edi{
    width: 285px;
    height: 100%;
    cursor: pointer;
}
.main{
    display: grid;
    margin-inline-start: 4px;
}
.slides2{
    display: flex;
    /*flex-direction: column;*/
     width: 100%;
    height: 164px;

    overflow-x:auto;
    gap: 8px;
    
}

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        /* Styling for alternate table rows */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Styling for the image container */
        #image-container2 {
            /* Add your styles for the image container here */
        }
.main_heading {
    margin: 10px;
    display: flex;
    border-bottom: 2px solid #ccc;
    margin-bottom: 3px;
}
h3.edit_images {
    margin-inline-start: 147px;
}
button#updateButton {
    background-color: red;
    color: white;
    padding: 5px;
    border: none;
    border-radius: 5px;
}
</style>
<!--Inner Container Starts-->



<?php
if ($_SESSION['webUser']['usertypenew'] == 'Editor') {
    $editorName = $_SESSION['webUser']['name'];
    echo "<h1>Editor Name : " . $editorName . "</h1>";
    echo "<h1><a href=logout.php>logout</a></h1>";
echo'<button class="link-button"><a href="'.WEB_URL.'/dashboard">Dashboard</a></button>';
    $editorid = $_SESSION['webUser']['id'];
    $sql_file = "SELECT * FROM final_img WHERE assigned_from = '$editorid'";
    $result_New = $dbF->getRows($sql_file);



    if ($result_New) {
        foreach ($result_New as $val) {
$editor_id=$val['assigned_from'];
$user_id=$val['user_id'];
          if ($val['project_status'] == 1){  

echo '<script>';
echo 'var editor_id = ' . $editor_id . ';';
echo 'var user_id = ' . $user_id . ';';
echo '</script>';              
             
//             echo '
//         <form method="post" enctype="multipart/form-data">
//         <h2 class="tab_heading">Album Images</h2>
//         <input type="hidden" id="AjaxFileNewId" name="ProductNewId" value=" ' . $id . ' ">
//         <input type="hidden" id="AjaxFileNewPage" value="EditorAlbum">
//         <input type="hidden" id="userId" value="' . base64_encode($val["user_id"]) . '">
//         <input type="hidden" name="user" value="' . $id . '">

// <div id="dropbox">


// </div><span class="message">Drop images here to upload.<br />
//     <i>they will only be visible to you</i></span><br>

// </form>';
}
// echo'
// <form action="uploadPiture.php" method="POST">
// <div class="main-container">';
// echo'
// <h2>Original Image</h2>
//     <div id="image-container">';


 if ($val['project_status'] == 1){ 
echo'
<div class="main_heading">
    <h3>Original Imags</h3>
    <h3 class="edit_images">Edit Images</h3>
</div>
';
    echo'

<div class="gallery-container">
    <div class="thumbnails"></div>
    <div class="scrollbar">
        <div class="thumb"></div>
    </div>
   
    <div class="main">';
    
        $qry = "SELECT * FROM uploaded_files WHERE account_id = $user_id AND `status`= '1' ";
    $eData = $dbF->getRows($qry);
    
    
    


    $url = WEB_URL;

    $i = 1;
    if ($dbF->rowCount > 0) {
        $html = '';
        foreach ($eData as $val3) {
        $imageId=$val3['id'];
    
    echo'<div class="slides2">';
        $qry2 = "SELECT * FROM editor_upload WHERE editor_id = $id AND `status`= '1' AND img_index = $imageId ORDER BY id DESC";
    $eData2 = $dbF->getRows($qry2);
    @$images = $eData2['image_path'];

    foreach ($eData2 as $val2) {
         $name = 'Image ' . $i;
        $image = $val2['image_path'];
  echo '<div ><img class="img_edi" src="' . $url . "/" . $image . '"></div>';
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
      
            $qry_Status = "SELECT * FROM final_img WHERE assigned_from = $id ";
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



}else{
    $getUserName=$functions->webUserName($user_id);
    $userName=$getUserName['acc_name'];
    
        echo' <form action="uploadPiture.php" method="POST">
    <div class="main-container">
        <h2>Original Image From '.$userName.'</h2>
        <div id="image-container">


        ';
         $qry = "SELECT * FROM uploaded_files WHERE account_id = '$user_id' && `Status`= '1' ORDER BY id ASC";
        $eData = $dbF->getRows($qry);
        $url = WEB_URL;
$html='';
        $i = 1;
        foreach ($eData as $key => $val2) {
            $img    = $val2['file_path'];
            $imgId  = $val2['id'];
            $name   = $val2['file_name'];

            if (empty($name)) {
                $name = 'Image ' . $i;
            }

                  $html .= '
        <div class="image-container">
            <input type="hidden" name="userid" value="' . $id . '">
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

       
       
       
        echo'
    <input type="hidden" name="newid" value="' . $val['id'] . '">';
            if (@$val['project_status'] != 1) {
                echo ' <input id="acceptButton" class="submit-button" name="Accept" type="submit" value="Accept">
        <input id="declineButton" class="Decline-button" name="Decline" type="submit" value="Decline">
';
            }
            echo '</form>';


            if (@$val['project_status'] == 1) {


                echo '


  <div class="chat-box" id="chatBox">';
                echo '
            <textarea type="text" id="messageInput" placeholder="Type your message..."></textarea>
            <input type="hidden" id="user_Id" value="' . $val['user_id'] . '">
            <input type="hidden" id="projectId" value="' . $val['id'] . '">
            <input type="hidden" id="assignedFrom" value="' . $val['assigned_from'] . '">
            <input type="hidden" id="sender_Id" value="' . $id . '">
            <button class="btn btn-primary pull-right" onclick="sendMessage()">Send</button>
            
             <div id="chats">
            ';


                $user_id = $val['user_id'];

                $sql = "SELECT * FROM chat_comment WHERE sender_id = '$id' OR user_id = $user_id ORDER BY `time` DESC";
                $comment_data = $dbF->getRows($sql);
                foreach ($comment_data as $commentVal) {
                    $message = $commentVal['message'];
                    $sender_id = $commentVal['sender_id'];
                    $time2 = $commentVal['time'];
                    $time = substr($time2, 11);
                    $username = $functions->webUserName($sender_id);

                    echo '
                    <div class="chat-message">
                    ' . $username["acc_name"] . '-<b>' . $message . '</b>
                    <div class="time-message">' . $time . '</div>
                    </div>
                    
                    ';
                }


                echo '</div></div>';
            }
        }
    } else {
        echo "No Project Found .";
    }
}

?>




<?php
if ($_SESSION['webUser']['usertypenew'] == 'Client') {
    $id = $_SESSION['webUser']['id'];

$currentDateTime = date('Y-m-d H:i:s');
$sql_Order = "SELECT * FROM `orders` WHERE `order_user`=? AND `expire_date` >= ?";
$order_chk = $dbF->getRows($sql_Order, array($id, $currentDateTime));

if($order_chk){
        $sql_file = "SELECT * FROM final_img WHERE user_id = '$id'";
        $result_New = $dbF->getRows($sql_file);
  


 
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





<h1>User Name : <?php echo $_SESSION['webUser']['name'] ?></h1>
<h1><a href=logout.php>logout</a></h1>

<!--<button class="link-button"><a href="<?php //echo WEB_URL . "/generator?user_id=" . base64_encode($id). "&username=" . $encoded_username; ?>">Share-->
<!--        link</a></button>-->
<button class="link-button"><a href="<?php echo WEB_URL . "/dashboard"?>">Dashboard</a></button>
        
<?php if (@$val['project_status'] == 0){ ?>
<form method="post" enctype="multipart/form-data">
    <h2 class="tab_heading">Album Images</h2>
    <input type="hidden" id="AjaxFileNewId" name="ProductNewId" value="<?php echo $id ?>">
    <input type="hidden" id="AjaxFileNewPage" value="album">
    <input type="hidden" name="user" value="<?php echo $id ?>">

    <div id="dropbox">
        <?php //$functions->albumEditImagess($id); 
            ?>

    </div><span class="message">Drop images here to upload.<br />
        <i>they will only be visible to you</i></span><br>

</form>
<?php } ?>
<!--<form action="uploadPiture.php" method="POST">-->
<!--    <div class="main-container">-->
<!--        <h2>Original Image</h2>-->
<!--        <div id="image-container">-->

<!--        </div>-->
<!--    </div>-->



<?php if (@$val['project_status'] == 1 ){ ?>
<div class="main_heading">
    <h3>Original Imags</h3>
    <h3 class="edit_images">Edit Images</h3>
</div>
<div class="gallery-container">
    <div class="thumbnails"></div>
    <div class="scrollbar">
        <div class="thumb"></div>
    </div>
   
    <div class="main">
<?php 

        $qry = "SELECT * FROM uploaded_files WHERE account_id = $id AND `status`= '1' ";
    $eData = $dbF->getRows($qry);
    
    
    


    $url = WEB_URL;

    $i = 1;
    if ($dbF->rowCount > 0) {
        $html = '';
        foreach ($eData as $val3) {
        $imageId=$val3['id'];
    
    echo'<div class="slides2">';
        $qry2 = "SELECT * FROM editor_upload WHERE editor_id = $editor_id AND `status`= '1' AND img_index = $imageId ORDER BY id DESC";
    $eData2 = $dbF->getRows($qry2);
    @$images = $eData2['image_path'];

    foreach ($eData2 as $val2) {
         $name = 'Image ' . $i;
        $image = $val2['image_path'];
  echo '<div ><img class="img_edi" src="' . $url . "/" . $image . '"></div>';
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
         <button id="updateButton">Update Status</button>
            <p id="status"><?php
            $qry_Status = "SELECT * FROM final_img WHERE user_id = $id ";
            $Data = $dbF->getRow($qry_Status);
            $userStatus=$Data['status'];
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
if(@$val['project_status'] == 0 &&@$val['publish'] == 0){
    
    echo' <form action="uploadPiture.php" method="POST">
    <div class="main-container">
        <h2>Original Image</h2>
        <div id="image-container">


        ';
         $qry = "SELECT * FROM uploaded_files WHERE account_id = '$id' && `Status`= '0' ORDER BY id ASC";
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
            <input type="hidden" name="userid" value="' . $id . '">
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
        $qry = "SELECT * FROM `final_img` WHERE `user_id`= $id";
        $result = $dbF->getRow($qry);

        if (@$result['user_id'] == $id) {
            echo '<input class="submit-button" type="submit" value="Upload Selected Images">
            
            </form>';
        }        
?>

  
    <?php
        $qry = "SELECT * FROM `final_img` WHERE `user_id`= $id";
        $result = $dbF->getRow($qry);
 if (@$result['user_id'] == $id && @$result['project_status']==1) {
            echo '


  <div class="chat-box" id="chatBox">';
            echo '
  <textarea  type="text" id="messageInput" placeholder="Type your message..."></textarea>
<input type="hidden" id="user_Id" value="' . $result['user_id'] . '">
<input type="hidden" id="projectId" value="' . $result['id'] . '">
<input type="hidden" id="assignedFrom" value="' . $result['assigned_from'] . '">
<input  type="hidden" id="sender_Id" value="' . $id . '">
  <button class="btn btn-primary pull-right" onclick="sendMessage()">Send</button>
  
  <div id="chats">
  ';
            $assigned = $result['assigned_from'];

            $sql = "SELECT * FROM chat_comment WHERE sender_id = '$id' OR assigned_from = $assigned ORDER BY `time` DESC";
            $comment_data = $dbF->getRows($sql);
            foreach ($comment_data as $commentVal) {
                $message = $commentVal['message'];
                $sender_id = $commentVal['sender_id'];
                $time2 = $commentVal['time'];
                $time = substr($time2, 11);
                $username = $functions->webUserName($sender_id);

                echo '
                    <div class="chat-message">
                    ' . $username["acc_name"] . '-<b>' . $message . '</b>
                    <div class="time-message">' . $time . '</div>
                    </div>
                    
                    ';
            }

            echo ' </div></div>';
        }else{
        $qry = "SELECT * FROM uploaded_files WHERE account_id = '$id' && `Status`= '1' ORDER BY id ASC";
        $eData = $dbF->getRows($qry);
        if($eData){
            echo "<h3>Your Project send an Admin .......</h3>";
            
        }else{
            echo "<h3>All Packages</h3>";
        
        }
        }
}

        ?>
        <?php
        
         $sql = "SELECT * FROM `proudct_detail_spb` WHERE `product_update`='1' AND `category`='Monthly' LIMIT 3";
        $data = $dbF->getRows($sql);



echo '<div class="product-card-main">';

foreach ($data as $key => $val) {
    $prodetAddOn = $val['prodet_addOn'];
    $validity = intval($val['validity']);
    $CheckExp = $functions->isProductExpired($prodetAddOn,$validity);

  
    if($CheckExp){
        $productName = unserialize($val['prodet_name']);
        $productDsc = unserialize($val['prodet_shortDesc']);
        $prodetId = $val['prodet_id'];
        $productKey=key($productName);
        $name = $productName[$productKey];
        $description = $productDsc[$productKey];
        
        
        
        $sql2 = "SELECT `propri_price` FROM `product_price_spb` WHERE `propri_prodet_id`=$prodetId";
        $data2 = $dbF->getRow($sql2);

        
        $sql3 = "SELECT `image` FROM `product_image_spb` WHERE `product_id`=$prodetId LIMIT 1";
        $data3 = $dbF->getRow($sql3);
   
        if($data3){
        $img=$data3['image'];
        }
  
        
        echo '
            <div class="product-card">';
            if($data3){
             echo'   <img src="'.WEB_URL.'/uploads/'.$img.'" alt="Product Image not set">';
            }
            echo'    <h2 class="product-title">' . $name . '</h2>
                <p class="product-description">' . $description . '</p>';
                if($data2){
                echo'<div class="product-price">£'.$data2['propri_price'].'</div>';
}else{
                echo'<div class="product-price">Price Not Set</div>';
    
}
       if ($login && $data2) {
    // echo "<button class='add-to-cart buy-button' data-product-id='" . $prodetId . "'>Buy</button>";
    echo "<button id='buyButton' class='add-to-cart buy-button' onclick='openModal()' data-product-id='" . $prodetId . "'>Buy</button>";

}

        echo '</div>';
}
}

echo '</div>';

?>


<div id="cod-modal" class="modal">
  <div class="modal-content">
    <button onclick="closeModal()" class="close-button">Close</button>
    <h2>Cash on Delivery (COD) Information</h2>
    <form id="cod-form" method="POST" action="orderInvoice.php">
      <label for="name">Name:</label>
      <input type="text" id="name" name="pname" required>

  <label for="mobile">Mobile Number:</label>
      <input type="tel" id="mobile" name="mobile" required>

  <label for="city">city:</label>
      <input type="text" id="city" name="city" required>



      <label for="address">Address:</label>
      <textarea id="address" name="address" required></textarea>
      




          <input type="hidden" id="validity" name="validity" value="">
      <input type="hidden" id="price" name="price" value="">
      <input type="hidden" id="productId" name="productId" value="">
      <input type="hidden" id="pName" name="pName" value="">

      <button type="submit">Place Order</button>
    </form>
    
  </div>
</div>

    <?php
}
    ?>


    <script>
  
    // console.log('JavaScript code is loaded.');

    $('.buy-button').on('click', function() {
    //   console.log('Buy button is clicked.');
      var productId = this.getAttribute('data-product-id');

      $.ajax({
        type: 'POST',
        url: '<?php echo WEB_URL  ?>/_models/functions/products_ajax_functions.php?page=packageinfo',
        data: { productId: productId },
        dataType: 'json',
        success: function(response) {
        $('#validity').val(response['validity']);
        $('#price').val(response['price']);
        $('#productId').val(response['prodet_id']);
        $('#pname').val(response['validity']);
        //   console.log(response);
        },
        error: function() {
          console.error('Failed to fetch popup content.');
        }
      });
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
            $.ajax({
                url: 'get_images2.php', // The URL of your PHP endpoint
                type: 'POST',
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





    <?php include("footer.php"); ?>