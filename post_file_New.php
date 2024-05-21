<?php
// If you want to ignore the uploaded files, 
// set $demo_mode to true;
// http://tutorialzine.com/2011/09/html5-file-upload-jquery-php/
include("global.php");
global $dbF;
global $db, $functions;
$dbp = $db;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$demo_mode = false;
$upload_dirMain = 'uploads/'; // Main folder DIR
$path = 'dropfile/';  //change name here if you want to change ajax to asad :P
//Now Go to below switch Case your work is finish

$upload_dir = $upload_dirMain . $path;
//create folder ajax
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777);
}

//create page folder
if (isset($_POST['page'])) {
    $page = $_POST['page'];
    $page = $page . "/";
    $path = $path . $page;
    $upload_dir = $upload_dirMain . $path;
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777);
    }
    /////
    $year = date('Y') . '/';
    $month = date('m') . '/';
    $path  = $path . $year;
    $upload_dir = $upload_dirMain . $path;
    //create folder year
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777);
    }

    $path  = $path . $month;
    $upload_dir = $upload_dirMain . $path;
    //create folder month
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777);
    }
} else {
    exit;
}

//$upload_dir = $upload_dir.$path;

// $allowed_ext = array('jpg','jpeg','png','gif', 'pdf');
// $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
$allowed_ext = array('jpg', 'jpeg', 'png', 'gif', 'mp4', 'mov', 'avi', 'mkv', 'webm');

if (strtolower($_SERVER['REQUEST_METHOD']) != 'post') {
    exit_status('Error! Wrong HTTP method!');
}
// var_dump($_FILES['pic']);
// var_dump($_FILES['pic']['error']);

if (array_key_exists('pic', $_FILES)) {

    if(is_array($_FILES['pic']['size'])){
    $size=count($_FILES['pic']['size']);
$i=0;
     for ($j = 0; $j < $size; $j++) {

    $pic = $_FILES['pic'];
    
    if (!in_array(get_extension($pic['name'][$i]), $allowed_ext)) {
        exit_status('Only ' . implode(',', $allowed_ext) . ' files are allowed!');
    }

    if (isset($pic['name'])) {
        $pic['name'][$i] = specialChar_to_english_letters2($pic['name'][$i]);
    }


    if ($demo_mode) {

        // File uploads are ignored. We only log them.

        $line = implode('		', array(date('r'), $_SERVER['REMOTE_ADDR'], $pic['size'], $pic['name']));
        file_put_contents('log.txt', $line . PHP_EOL, FILE_APPEND);

        exit_status('Uploads are ignored in demo mode.');
    }


    // Move the uploaded file from the temporary 
    // directory to the uploads folder:
    //@$name=$_POST['page']."_".$_POST['item_id']."_".$pic['name'];
    $rand = rand(100, 999);
    @$name = $_POST['item_id'] . "_" . $rand . '_' . $pic['name'][$i]; //IMG name : INSERT PARENT ID_RANDOM NUMBER_IMG NAME;

    if (!file_exists(__DIR__ . "/" . $upload_dir . $name)) {
        if (move_uploaded_file($pic['tmp_name'][$i], $upload_dir . $name)) {

            // $ajax = new ajax_functions(); //Class obj
            @$page = $_POST['page']; //This is comming from your upload page in hidden input
            $saveName = $path . $name;

            //File name saving in DB
                if($page =='EditorAlbum'){
                      $userId = base64_decode($_POST['user_Id']);
                    $editorId = $_POST['item_id'];
                  

                    $sql = "INSERT INTO editor_upload (editor_id, user_id,image_path,`status`)
                    VALUES ($editorId,$userId,'$saveName', 1)";
                    $dbF->setRow($sql);
                }
   
                if($page=="album"){
                                        $id_user = $_POST['id'];
                    $productId = $_POST['ProductNewId'];
                    // $sql_Order = "SELECT * FROM `orders` WHERE `order_user`=?";
                    // $order_chk = $dbF->getRows($sql_Order, array($id_user));
                    
                    
                    $sql = "INSERT INTO uploaded_files (file_path, account_id,product_id,file_type)
                    VALUES ('$saveName', $id_user,$productId,'image')";
                    $dbF->setRow($sql);
                }
                 if($page=="album_new"){
                                        $id_user = $_POST['id'];
                    $productId = $_POST['ProductNewId'];
                    // $sql_Order = "SELECT * FROM `orders` WHERE `order_user`=?";
                    // $order_chk = $dbF->getRows($sql_Order, array($id_user));
                    
                    
                    $sql = "INSERT INTO uploaded_files (file_path, account_id,product_id,file_type)
                    VALUES ('$saveName', $id_user,$productId,'image')";
                    $dbF->setRow($sql);
                }
            
        }

}
        // exit_status('File was uploaded successfuly!');
        $i++;
          
    }
        
    }else{

    $pic = $_FILES['pic'];

    if (!in_array(get_extension($pic['name']), $allowed_ext)) {
        exit_status('Only ' . implode(',', $allowed_ext) . ' files are allowed!');
    }

    if (isset($pic['name'])) {
        $pic['name'] = specialChar_to_english_letters2($pic['name']);
    }


    if ($demo_mode) {

        // File uploads are ignored. We only log them.

        $line = implode('		', array(date('r'), $_SERVER['REMOTE_ADDR'], $pic['size'], $pic['name']));
        file_put_contents('log.txt', $line . PHP_EOL, FILE_APPEND);

        exit_status('Uploads are ignored in demo mode.');
    }


    // Move the uploaded file from the temporary 
    // directory to the uploads folder:
    //@$name=$_POST['page']."_".$_POST['item_id']."_".$pic['name'];
    $rand = rand(100, 999);
    @$name = $_POST['item_id'] . "_" . $rand . '_' . $pic['name']; //IMG name : INSERT PARENT ID_RANDOM NUMBER_IMG NAME;

    if (!file_exists(__DIR__ . "/" . $upload_dir . $name)) {
        if (move_uploaded_file($pic['tmp_name'], $upload_dir . $name)) {

            // $ajax = new ajax_functions(); //Class obj
            @$page = $_POST['page']; //This is comming from your upload page in hidden input
            $saveName = $path . $name;

            //File name saving in DB
                if($page =='EditorAlbum'){
                      $userId = base64_decode($_POST['user_Id']);
                    $editorId = $_POST['item_id'];
                  

                    $sql = "INSERT INTO editor_upload (editor_id, user_id,image_path,`status`)
                    VALUES ($editorId,$userId,'$saveName', 1)";
                    $dbF->setRow($sql);
                }
   
                if($page=="album_new"){
                                        $id_user = $_POST['id'];
                    $productId = $_POST['ProductNewId'];
                    // $sql_Order = "SELECT * FROM `orders` WHERE `order_user`=?";
                    // $order_chk = $dbF->getRows($sql_Order, array($id_user));
                    
                    
                    $sql = "INSERT INTO uploaded_files (file_path, account_id,product_id,file_type)
                    VALUES ('$saveName', $id_user,$productId,'image')";
                    $dbF->setRow($sql);
                }
            
        }

}
        // exit_status('File was uploaded successfuly!');
       
          
 
    }
    if($_POST['page']=="album"){
        include('header_new.php');
  ?>
    <script>
  alertify.alert("File was uploaded successfuly!", function () {

    history.back();
  });
  </script>
                <?php
        include('dashboard_footer.php'); 
      
    }else{
     
    $id_user = $_POST['id'];
    $productId = $_POST['ProductNewId'];
    @$packid = $_POST['packId'];

    if($packid == 1){
         $qry5 = "SELECT * FROM uploaded_files WHERE account_id = '$id_user' AND product_id =$productId AND status=0";
    $data5 = $dbF->getRows($qry5);
    }else{
         $qry5 = "SELECT * FROM uploaded_files WHERE account_id = '$id_user' AND product_id =$productId AND status=0 AND file_type='image'";
    $data5 = $dbF->getRows($qry5);
    }
    // $qry5 = "SELECT * FROM uploaded_files WHERE account_id = '$id_user' AND product_id =$productId AND status=0 AND file_type='image'";
    // $data5 = $dbF->getRows($qry5);
    $html=array();
   
    foreach($data5 as $val){
        
        $img=$val['file_path'];
        $file_extension = pathinfo($img, PATHINFO_EXTENSION);
        $data_Id=$val['id'];
         $type=$val['file_type'];
        $url=WEB_URL;
        $allowed_video_ext = array('mp4', 'mp5', 'webm');
        if(in_array($file_extension,$allowed_video_ext)){
                  $typOfData='<video src="'.$url.'/uploads/'.$img.'" data-image="'.$data_Id.'"></video>';  
                }else{
                  $typOfData='<img src="'.$url.'/uploads/'.$img.'" data-image="'.$data_Id.'">';  
                    
                }
    //   $html[] = '
    // <div class="thumb_wrapper"><div class="thumb_container">
    // <a class="thumb" data-fancybox="select_image" href="' . $url . '/uploads/' . $img . '" data-userid="' . $id_user . '">
    // '.$typOfData.'
    // </a><button class="productEditImageDel delete_image_btn" data-id="' . $data_Id . '"><i class="fa fa-xmark-circle">
    // </i></button><input type="checkbox" >
    // </div></div>
    // ';
            if($type=='image'){
       $html[] = '
    <div class="thumb_wrapper"><div class="thumb_container">
    <a class="thumb" data-fancybox="select_image" href="' . $url . '/uploads/' . $img . '" data-userid="' . $id_user . '">
    '.$typOfData.'
    </a><button class="productEditImageDel delete_image_btn" data-id="' . $data_Id . '"><i class="fa fa-xmark-circle">
    </i></button><input type="checkbox">
    </div></div>
    ';
            
        }else{
                  $html[] ='
                            <div class="thumb_wrapper">
                            <div class="thumb_container">
                            <a class="thumb thumb_link" src="' . $img . '" data-image="'.$data_Id.'" target="_blank"></a>
                            <button class="productEditImageDel delete_image_btn" data-id="'.$data_Id.'">
                            <i class="fa fa-xmark-circle"></i></button>
                            </button>
                            </div>
                            </div>
                            ';
                    
        }
    }
    $html[] .= '<script>
    
        console.log("This is called by post_file_New after image uploaded");
        $(".productEditImageDel").click(function(e) {
            e.preventDefault();
            if (secure_delete()) {
                id = $(this).attr("data-id");
                parnt = $(this).closest(".thumb_wrapper");
                $.ajax({
                    type: "POST",
                    url: "gallery_ajax.php?page=albumEditImageDel",
                    data: {
                        imageId: id
                    }
                }).done(function(data) {
                    if (data == "1") {
                        parnt.remove();
                        //parnt.hide(500);
                    } else if (data == "0") {
                        jAlertifyAlert("Image Not Delete Please Try Again");
                        return false;
                    }
                });
            }
        });  
    
    
    </script>';
    echo json_encode($html);
     }
        // echo '<script>
        //           // Show the alert box with the message
        //           alert("File was uploaded successfuly!");
                  
        //           // Redirect to profile.php after the user clicks "OK" in the alert box
        //           window.history.back();
        //         </script>';
}
else{
    if($_POST['page']=="album_new"){
        
         $id_user = $_POST['id'];
    $productId = $_POST['ProductNewId'];
 @$packid = $_POST['packid'];
    if($packid == 1){
         $qry5 = "SELECT * FROM uploaded_files WHERE account_id = '$id_user' AND product_id =$productId AND status=0";
    $data5 = $dbF->getRows($qry5);
    }else{
         $qry5 = "SELECT * FROM uploaded_files WHERE account_id = '$id_user' AND product_id =$productId AND status=0 AND file_type='image'";
    $data5 = $dbF->getRows($qry5);
    }
    // $qry5 = "SELECT * FROM uploaded_files WHERE account_id = '$id_user' AND product_id =$productId AND status=0 AND file_type='image'";
    // $data5 = $dbF->getRows($qry5);
    $html=array();
    foreach($data5 as $val){
        $img=$val['file_path'];
        $file_extension = pathinfo($img, PATHINFO_EXTENSION);
        $data_Id=$val['id'];
        $type=$val['file_type'];
        $url=WEB_URL;
        $allowed_video_ext = array('mp4', 'mp5', 'webm');
         if(in_array($file_extension,$allowed_video_ext)){
                  $typOfData='<video src="'.$url.'/uploads/'.$img.'" data-image="'.$data_Id.'"></video>';  
                }else{
                  $typOfData='<img src="'.$url.'/uploads/'.$img.'" data-image="'.$data_Id.'">';  
                    
                }
        if($type=='image'){
       $html[] = '
    <div class="thumb_wrapper"><div class="thumb_container">
    <a class="thumb" data-fancybox="select_image" href="' . $url . '/uploads/' . $img . '" data-userid="' . $id_user . '">
    '.$typOfData.'
    </a><button class="productEditImageDel delete_image_btn" data-id="' . $data_Id . '"><i class="fa fa-xmark-circle">
    </i></button><input type="checkbox">
    </div></div>
    ';
            
        }else{
                  $html[] ='
                            <div id="selected_image_con" class="selected_image_container">
                            <a class="thumb_link" src="' . $img . '" data-image="'.$imgId.'"></a>
                            <button class="productEditImageDel delete-button fa fa-x" data-id="'.$imgId.'">
                            </button>
                            </div>
                            ';
        }
    }
    }
    else{
                include('header_new.php');
  ?>
    <script>
  alertify.alert("Something went wrong with your upload!", function () {

    history.back();
  });
  </script>
                <?php
        include('dashboard_footer.php'); 

}
        
    }
// Helper functions

function exit_status($str)
{
    echo json_encode(array('status' => $str));
    exit;
}

function get_extension($file_name)
{
    $ext = explode('.', $file_name);
    $ext = array_pop($ext);
    return strtolower($ext);
}
