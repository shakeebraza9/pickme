<?php
include("global.php");
global $dbF;
global $db, $functions;
$dbp = $db;

function deleteOldSingleImage2($image)
{
    if ($image == '') {
        return false;
    }
    @unlink(__DIR__ . "/uploads/$image");
}

function albumAltUpdate(){
    global $dbF;
        $id=$_POST['imageId'];
        $alt=$_POST['altT'];
        $sql3="UPDATE `uploaded_files`SET description=? WHERE id = '$id'";
        $array = array($alt);
        $data=$dbF->setRow($sql3,$array);
        if($dbF->rowCount>0){
            echo "1";
        }else{
            echo "0";
        }
    }
if (isset($_GET['page'])) {
    // require_once(__DIR__ . "/classes/gallery_ajax.class.php");
    $page = $_GET['page'];

    // $ajax = new gallery_ajax();
    switch ($page) {
        case 'albumEditImageDel':
            // $ajax->albumEditImageDel();
            $id = $_POST['imageId'];

            $sql3 = "SELECT * FROM `uploaded_files` WHERE `id`='$id'";
            $data = $dbF->getRow($sql3);

            deleteOldSingleImage2($data['file_path']);

            $sql3 = "DELETE FROM `uploaded_files` WHERE `id`='$id'";
            $dbF->setRow($sql3);

            if ($dbF->rowCount > 0) {
                echo "1";
            } else {
                echo "0";
            }



            break;
        case 'profile':
           var_dump($_FILES);



            break;
        case 'realtimechat':
           
           $productId=$_POST['projectId'];
            $sql = "SELECT * FROM chat_comment WHERE `project_id`= $productId ORDER BY `time` DESC";
            $comment = $dbF->getRows($sql);
            $html = "";
            foreach ($comment as $key => $comment_data) {

        $message = $comment_data['message'];
        $sender_id = $comment_data['sender_id'];
        // $time2 = $comment_data['time'];
        // $time = substr($time2, 11);
            $time2 = $comment_data['time'];
            $time = substr($time2, 11);
                
            $timestamp = strtotime($time);

            $formattedTime = date('h:i A', $timestamp);
        $username = $functions->webUserName($sender_id);

        $html .=
            '
                    <div class="chat-message" id="'.$productId.'">
                    ' . $username["acc_name"] . '-<b>' . $message . '</b>
                    <div class="time-message">' . $formattedTime . '</div>
                    </div>
                    
                    ';
    }
    $response = array('status' => 'success', 'message' => 'Message inserted successfully',);
    echo $html;



            break;
        case 'guestbookchat':
            
            $projectId = $_POST['productId'];
            $userId = $_POST['user_id'];
            $name = $_POST['name'];
            $comment = $_POST['comment'];
            $email = $_POST['email'];
           
            
            
            $sql = "INSERT INTO guest_book_chat (product_id, user_id ,name ,message ,email)
        VALUES ($projectId, $userId, '$name', '$comment' ,'$email')";


    if ($result = $dbF->setRow($sql)) {
    // Success
    $lastId = $dbF->rowLastId;
    $sql = "SELECT * FROM guest_book_chat WHERE product_id = '$projectId' AND user_id = $userId ORDER BY `date` DESC";
    $comment = $dbF->getRows($sql);
    $html = "";
    foreach ($comment as $key => $comment_data) {

        $message = $comment_data['message'];
        $name = $comment_data['name'];
        // $time2 = $comment_data['date'];
        // $time = substr($time2, 11);
        
        // $username = $functions->webUserName($sender_id);

        $html .=
            '<div class="comment" >
               <p><strong>'.$name.':</strong> '.$message.'</p>
                 </div>   
                    ';
    }
    $response = array('status' => 'success', 'message' => 'Message inserted successfully',);
    echo $html;
    // echo json_encode($response);
} else {
    // Error
    $response = array('status' => 'error', 'message' => 'Error inserting message: ');
    echo json_encode($response);
}



            break;

        case 'albumAltUpdate':
            // $ajax->albumAltUpdate();
            $id = $_POST['imageId'];
            $alt = $_POST['altT'];
            $sql3 = "UPDATE `uploaded_files` SET file_name=? WHERE `id`='$id'";
            $array = array($alt);
            $data = $dbF->setRow($sql3, $array);
            if ($dbF->rowCount > 0) {
                echo "1";
            } else {
                echo "0";
            }



            break;

        case 'userLinksave':
                    $id_user = $_POST['userId'];
                    $productId = $_POST['productId'];
                    $videoLink = $_POST['videoLink'];
                    
                    
                    $sql = "INSERT INTO uploaded_files (file_path, account_id,product_id,file_type)
                    VALUES ('$videoLink', $id_user,$productId,'link')";
                    $dbF->setRow($sql);
                    if($dbF->rowCount>0){
                        $qry5 = "SELECT * FROM uploaded_files WHERE account_id = '$id_user' AND product_id =$productId AND status=0 AND file_type='link' ORDER BY `id` DESC LIMIT 1 ";
                        $data5 = $dbF->getRows($qry5);
                        // $html=array();
                        foreach($data5 as $val){
                        $img=$val['file_path'];

                        $imgId = $data_Id=$val['id'];

                          echo  '
                                                        <div class="thumb_wrapper thumb_wrapper_link">
                        <div class="thumb_container thumb_container_link">
                        <a class="thumb thumb_link" href="' . $img . '" data-userid="' . $id_user . '"title="'.$img.'" target="_blank">
                        </a>
                        <button class="productEditImageDel2 delete_image_btn" data-id="'.$imgId.'">
                        <i class="fa fa-xmark-circle"></i></button>
                        <input type="checkbox" class="selected_image_checkbox2" name="selected_images[]" value="'.$data_Id.'"></div>
                        <input type="hidden" name="userid" value="' . $id_user . '">
                        <input type="hidden" name="selectedImg" value="' . $img . '">
                        </div>';
                        }
                 echo '
                 <script>
    $(".productEditImageDel2").click(function(e) {
        e.preventDefault();
        if (secure_delete()) {
            id = $(this).attr("data-id");
            parnt = $(this).closest(".thumb_wrapper");
            $.ajax({
                type: "POST",
                url: "gallery_ajax.php?page=albumEditImageDel", // Corrected URL
                data: {
                    imageId: id
                }
            }).done(function(data) {
                if (data == "1") {
                    parnt.remove();
                    // parnt.hide(500);
                } else if (data == "0") {
                    jAlertifyAlert("Image Not Delete Please Try Again");
                    return false;
                }
            });
        }
    });
</script>';
                    
                        // echo $html;
                    }
                    
            break;
        case 'guestuserLinksave':
                    $id_user = $_POST['userId'];
                    $productId = $_POST['productId'];
                    $videoLink = $_POST['videoLink'];
                    
                    
                    $sql = "INSERT INTO uploaded_files (file_path, account_id,product_id,file_type)
                    VALUES ('$videoLink', $id_user,$productId,'link')";
                    $dbF->setRow($sql);
                    if($dbF->rowCount>0){
                        $qry5 = "SELECT * FROM uploaded_files WHERE account_id = '$id_user' AND product_id =$productId AND status=0 ";
                        $data5 = $dbF->getRows($qry5);
                        // $html=array();
                        foreach($data5 as $val){
                        $img=$val['file_path'];

                        $data_Id=$val['id'];
                        $file_type=$val['file_type'];
                        if($file_type=="link"){
                              echo'
                            <div id="selected_image_con" class="selected_image_container">
                            <a class="thumb_link" src="' . $img . '" data-image="'.$data_Id.'"></a>
                            <button class="productEditImageDel delete-button fa fa-x" data-id="'.$data_Id.'">
                            </button>
                            </div>
                            ';
                            
                        }else{
                            echo'
                            <div id="selected_image_con" class="selected_image_container">
                            <img src="'.WEB_URL.'/uploads/' . $img . '" data-image="'.$data_Id.'">
                            <button class="productEditImageDel delete-button fa fa-x" data-id="'.$data_Id.'">
                            </button>
                            </div>
                            ';
                        }

                        //   echo  '
                        //                                 <div class="thumb_wrapper thumb_wrapper_link">
                        // <div class="thumb_container thumb_container_link">
                        // <a class="thumb thumb_link" href="' . $img . '" data-userid="' . $id_user . '"title="'.$img.'" target="_blank">
                        // </a>
                        // <input type="checkbox" class="selected_image_checkbox" name="selected_images[]" value="'.$data_Id.'"></div>
                        // <input type="hidden" name="userid" value="' . $id_user . '">
                        // <input type="hidden" name="selectedImg" value="' . $img . '">
                        // </div>';
                        }
                    
                        // echo $html;
                    }
                    
            break;

        case 'activeAlbums':
            // $ajax->activeAlbums();
            break;
            
         case 'update':
            albumAltUpdate();
            break;

        case 'deleteAlbum':
            // $ajax->deleteAlbum();
            break;
    }
    
    
    
}
