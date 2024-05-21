<?php
include("global.php");
include("dashboard_header.php");
global $dbF;
global $db, $functions;
$dbp = $db;;
?>


<?php


if (@$_POST['selectedImg']) {
    $selectedImages = @$_POST['selected_images'];

    if($selectedImages==NULL){
  ?>
    <script>
  alertify.alert("Your not slected a single image.", function () {
    // Callback function when the "OK" button is clicked
    history.back(); // Go back one step in the browser's history
  });
       
      </script>
<?php
}
    else{

        $producNewtId = $_POST['productId'];
        
        
        $qry_New = "SELECT `product_id` FROM `orders` WHERE order_id = ?";
        $array_new = array($producNewtId);
        $datanew= $dbF->getRow($qry_New, $array_new, false);
        
        $proid=$datanew['product_id'];
        
        $sql_New = "SELECT `image_size` FROM `proudct_detail_spb` WHERE prodet_id = ?";
        $array = array($proid);
        $data5= $dbF->getRow($sql_New, $array, false);
        
        $imgSize = intval($data5['image_size']);
    //   var_dump(count($selectedImages));
    //   var_dump($imgSize);
    //   exit();
             
                    
    if (count($selectedImages) <= $imgSize) {
        $userid = $_POST['userid'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedImg'])) {
            if (!empty($selectedImages)) {
                foreach ($selectedImages as $val) {

                    $integerNumber = intval($val);
                    $sql_up = "UPDATE uploaded_files SET `status` = '1' WHERE id = $integerNumber AND account_id = ?";
                    $array = array($userid);
                    $dbF->setRow($sql_up, $array, false);
                }
                $sql_Sel = "SELECT * FROM uploaded_files WHERE `status` = ?  AND account_id = ?";
                $array = array('1', $userid);
                $SelectData = $dbF->getRows($sql_Sel, $array);
                foreach ($SelectData as $fileName) {
                    $finalImages[] = $fileName['file_name'];
                    $finalPath[] = $fileName['file_path'];
                    $account_id = $fileName['account_id'];
                }
                $finalImagesName = implode(",", $finalImages);
                $finalPathImg = implode(",", $finalPath);
                $user_Name = $functions->webUserName($account_id);
    
            $sql = "UPDATE final_img
                        SET
                        user_name = ?,
                        publish = 1,
                        images_path = ?
                        WHERE user_id = ? AND package_id=?";
                $array = array($user_Name['acc_name'], $finalPathImg,$userid,$producNewtId);
                $dbF->setRow($sql, $array, false);
                // echo "Picture has been selected sucessful .....";
?>                                                
 
          <script>
  alertify.alert("Picture has been Save successfully!", function () {
    // Callback function when the "OK" button is clicked
    history.back(); // Go back one step in the browser's history
  });
       
      </script>
<?php
            } 
            else {
                ?>
                          <script>
  alertify.alert("Picture has been Not selected sucessful .....", function () {
    // Callback function when the "OK" button is clicked
    history.back(); // Go back one step in the browser's history
  });
  </script>
                <?php
          
          
            }
        } else {
            echo 'Some Error !!!!';
        }
    } else {
                       ?>
                          <script>
  alertify.alert("Select only " + imgsize + " images", function () {
    // Callback function when the "OK" button is clicked
    history.back(); // Go back one step in the browser's history
  });
  </script>
                <?php
        
    }
    }
} else if (@$_POST['Decline'] == 'Decline' || @$_POST['Accept'] == 'Accept') {
    // $userId = $_POST['id'];
    $rowID = $_POST['newid'];
    $productId = $_POST['productId'];
    if (@$_POST['Accept'] == 'Accept') {
        $sql = "UPDATE `final_img`
    SET `project_status`= 1,
    `publish`=1
    WHERE `package_id` = ?";
        $array = array($productId);
        $dbF->setRow($sql, $array, false);
                               ?>
                          <script>
  alertify.alert("project has been accepted", function () {
    // Callback function when the "OK" button is clicked
    history.back(); // Go back one step in the browser's history
  });
  </script>
                <?php
      

    } else {


        $sql = "UPDATE `final_img`
    SET `assigned_from` = 0
    WHERE `package_id` = ?";

        $array = array($productId);
        $dbF->setRow($sql, $array, false);
        
                                       ?>
                          <script>
  alertify.alert("Are you sure Decline this Project", function () {
    // Callback function when the "OK" button is clicked
    window.location.href = "dashboard"; // Go back one step in the browser's history
  });
  </script>
                <?php
        

    }
}

else{


@$userId   =$_POST['userId'];
@$editorId  =$_POST['editorId']; 
@$imgId   =$_POST['imgId'];
@$productId   =$_POST['product_id'];
@$fileType   =$_POST['filetype'];
if(!$imgId && !$editorId && !$userId){
echo '<script>
window.location.replace("dashboard");
      </script>';
}
 if($fileType=="link"){
     $targetFile=$_POST['fileToUpload'];
          $sql = "INSERT INTO editor_upload (editor_id,product_id, user_id,image_path,img_index,`status`,file_type)
                    VALUES ($editorId,$productId,$userId,'$targetFile',$imgId, 1,'$fileType')";
                    $dbF->setRow($sql);
                    
                                                           ?>
                          <script>
  alertify.alert("Link has been uploaded", function () {
    // Callback function when the "OK" button is clicked
    history.back(); // Go back one step in the browser's history
  });
  </script>
                <?php

        
    }else{

 if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
     $sqlQry = "SELECT * FROM final_img WHERE assigned_from = '$editorId' AND package_id=$productId";
    $dataueditor = $dbF->getRow($sqlQry);
    $chk=$dataueditor['status'];
    if($chk==1){
        
                      echo '<script>
        // Show the alert box with the message
        alert("Your Project is Completed");

        // Go back to the previous page
        window.location.href = "dashboard";
      </script>';
      exit();
    }
    
   
    
        $imageName = $_FILES['fileToUpload']['name']; // Access the image name

        // Process the uploaded file (move it to a specific directory)
        // $targetDir = 'uploads/dropfile/EditorAlbum'; // Directory where the uploaded files will be stored
        // $targetFile = WEB_URL ."/".$targetDir . basename($imageName);
        // var_dump($targetFile);
    $targetDir = 'uploads/dropfile/EditorAlbum'; // Directory where the uploaded files will be stored
$targetFile = $targetDir . '/' . basename($_FILES['fileToUpload']['name']);
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
        $sql = "INSERT INTO editor_upload (editor_id,product_id, user_id,image_path,img_index,`status`,file_type)
                    VALUES ($editorId,$productId,$userId,'$targetFile',$imgId, 1,'$fileType')";
                    $dbF->setRow($sql);
    // File has been moved and saved successfully
    // echo "File was uploaded and saved as: " . $targetFile;

?>
                          <script>
  alertify.alert("image has been uploaded", function () {
    // Callback function when the "OK" button is clicked
    history.back(); // Go back one step in the browser's history
  });
  </script>
                <?php

} else {
    // Error occurred while moving the file
    // echo "Error: File upload failed. Please check the target directory permissions.";
    ?>
                          <script>
  alertify.alert("Error: File upload failed. Please check the target directory permissions.", function () {
    // Callback function when the "OK" button is clicked
    history.back(); // Go back one step in the browser's history
  });
  </script>
                <?php

}    
    
    
     
    
    
 
    
 }  else{
         ?>
                          <script>
  alertify.alert("Select an image...", function () {
    // Callback function when the "OK" button is clicked
    history.back(); // Go back one step in the browser's history
  });
  </script>
                <?php
     
 } 
    }
}
include("dashboard_footer.php");