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
// 
}
if(isset($_POST['profileid'])){
  
 
 
 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $profileId = $_POST["profileid"];

    // Directory where you want to save the uploaded profile pictures
    $uploadDirectory = "uploads/profile/";

    // Create the directory if it doesn't exist
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    $targetFile = $uploadDirectory . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the uploaded file is an image
    $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
    // var_dump($check);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check if file already exists
    // if (file_exists($targetFile)) {
    //     $uploadOk = 0;
    // }

    // Check file size
    // if ($_FILES["profile_picture"]["size"] > 500000) {
    //     $uploadOk = 0;
    // }

    // Allow only certain file formats (you can modify this based on your needs)
    // if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    //     $uploadOk = 0;
    // }

    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
    } else {
        $tempFileName = $_FILES["profile_picture"]["tmp_name"];
        if (move_uploaded_file($tempFileName, $targetFile)) {
             
            $sql = "UPDATE `accounts_user` SET `acc_profile`='$targetFile' WHERE acc_id=$profileId";
        if ($dbF->setRow($sql) === true) {
            $HTML="Profile updated successfully!";
        }
            // echo "The file " . basename($_FILES["profile_picture"]["name"]) . " has been uploaded.";
            // Perform any additional actions with the uploaded file, such as updating the database
        } else {
            $HTML= "Sorry, there was an error uploading your file.";
        }
    }
}
 
    
}
// var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if(isset($_POST) && isset($_POST['id'])){
    $name=$_POST['username'];
    $number=$_POST['number'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $id=$_POST['id'];
    $update=$functions->profileEdit($name,$number,$address,$city,$country,$id);
    
    
    @$password_old=$_POST['current_password'];
    @$password_new=$_POST['new_password'];
    if (isset($password_new) && isset($password_old) && !empty($password_new) && !empty($password_old)) {
       		$sql_pass  = "SELECT * FROM accounts_user WHERE acc_id  = $id";
            $data_pass =  $dbF->getRow($sql_pass);
            $passw=$functions->encode($password_old);
            $pass=$data_pass["acc_pass"];
            if($pass == $passw){
                $passNew=$functions->encode($password_new);
             $sql = "UPDATE  accounts_user SET
                                acc_pass = ?
                                WHERE acc_id = '$id'";
                    $array = array($passNew);
                    $dbF->setRow($sql, $array, false);
                    if($dbF->rowCount==0){
                        $meg="<p>Your password has been updated<p/>";
                        
                        
                    }

            }else{
            
                $meg="<p>Current password is invalid <p/>"; 
  

            }
            
    }else if($update){
        $meg="<p>profile has been edit successfully <p/>";
    }
   
 


}
}
$msg = $webClass->webUserEditSubmit();
include("dashboard_header.php");
$id = $_SESSION['webUser']['id'];
?>
    <style>
body {
    font-size:1.6rem;
}

.profile_main_div span{
    font-size:1.6rem;
}

.form-control{
    font-size:1.6rem;
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
} 

.profile_form_heading{
    background:#272727;
    color:#fff;
    text-transform:uppercase;
    padding:12px 6px;
}  

.profile_form_heading h4{
    font-size:2rem;
    font-weight:700;
    margin-bottom:0;
} 

.main_profile {
    position: relative;
    width: 150px;
    height: 150px;
    overflow: hidden;
    border-radius: 50%;
    margin-bottom:1rem;
}

.main_profile img{
    width:100%;
    object-fit:cover;
    height:100%;
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 1.6rem;
    font-weight:600;
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}

.profile_new {
    font-size: 25px;
}

/* Style for the file input and button */
.file-label {
    display: inline-block;
    background-color: rgb(39 39 39);
    color: white;
    padding: 7px 14px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: small;
    margin-top: 20px;
}

.file-label input[type="file"] {
    display: none;
}

.upload-button {
    display: block;
    margin-top: 10px;
    background-color: #2ecc71;
    color: white;
    padding: 8px 38px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Hover and focus styles */
.file-label:hover, .upload-button:hover {
    background-color: #2980b9;
}

.file-label:focus-within, .upload-button:focus {
    outline: none;
    background-color: #3498db;
}
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    font-size: 1.4rem;
    margin-top: 10px;
}
    </style>

<div class="inner_main_product">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right profile_new">
            <?php
            $profile=$functions->profile($id);
            $username=$functions->usernameee($id);
            // if(@$_SESSION['webUser']['profile'] != NULL){
            // $profile=WEB_URL."/".$_SESSION['webUser']['profile'];
                
            // }else{
            //     $profile="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg";
            // }
            ?>
            <div class="d-flex flex-column align-items-center text-center p-3 py-5 profile_main_div">
                <div class="main_profile">
                    <img src="<?php echo $profile ?>">
                </div>
                <span class="font-weight-bold" style="font-size:1.8rem"><?php echo $username?>
                </span><span class="text-black-50"><?php echo $_SESSION['webUser']['email'];?></span><span> </span>
    <form id="profile-picture-form" method="POST" action="" enctype="multipart/form-data">
        
        <label for="file-input" class="file-label" style="width:100%;">
            <input type="file" name="profile_picture" id="file-input">
            <input type="hidden" name="profileid" value="<?php echo $id ?>">
            <span>Choose Profile Picture</span>
        </label>
        <button type="submit" class="btn_gradient" style="width:100%; margin-top:1rem;">
                <span class="start">Upload</span>
                <span class="hover">Upload</span>
        </button>
        <?php
        if(isset($HTML)){
        echo'<p>'.$HTML.'<p>';
        }
        ?>
    </form>
</body>
</html>
   </div>
   </div>
        <div class="col-md-8 border-left">
<form method="POST">
    <div class="p-3 py-5">
        <div class="d-flex justify-content-between align-items-center mb-3 profile_form_heading">
            <h4 class="text-right">Profile</h4>
        </div>
        <?php
        $data = $functions->webUserName($id);
        $user = $data['acc_name'];
        
        $sql    = "SELECT * FROM accounts_user_detail WHERE id_user = '$id'";
        $userInfo   = $dbF->getRows($sql);
        $numberinfo=$functions->webUserInfo($userInfo, 'number');
        $addressinfo=$functions->webUserInfo($userInfo, 'address');
        $cityinfo=$functions->webUserInfo($userInfo, 'city');
        $countryinfo=$functions->webUserInfo($userInfo, 'country');
        ?>
        <div class="col-md-12">
            <label class="labels">Name</label>
            <input type="text" name="username" class="form-control" placeholder="Name" value="<?php echo @$user ?>">
        </div>
        <div class="row mt-3">
            <div class="col-md-12 mt-3">
                <label class="labels">Mobile Number</label>
                <input type="text" name="number" class="form-control" placeholder="Enter Mobile Number" value="<?php echo @$numberinfo ?>">
            </div>
            <div class="col-md-12 mt-3">
                <label class="labels">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address" value="<?php echo @$addressinfo ?>">
            </div>
            <div class="col-md-12 mt-3">
                <label class="labels">city</label>
                <input type="text" name ="city" class="form-control" placeholder="Enter City" value="<?php echo @$cityinfo ?>">
                <input type="hidden" name ="id" class="form-control"  value="<?php echo $id ?>">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <label class="labels">Country</label>
                <input type="text" name ="country" class="form-control" placeholder="Enter Country" value="<?php echo @$countryinfo ?>">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <label class="labels">Current Password</label>
                <input type="password" name ="current_password" class="form-control" placeholder="Enter Current Password">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <label class="labels">New Password</label>
                <input type="text" name ="new_password" class="form-control" placeholder="Enter New Password">
            </div>
        </div>
        <div class="mt-5 text-center">
            <button class="btn_gradient_small" type="submit">
                <span class="start">Save Profile</span>
                <span class="hover">Save Profile</span>
            </button>
                        <?php
            if($update){
                echo'
             <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
        '.$meg.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
                
                ';
            }
            ?>
        </div>
    </div>
</form>
        </div>
    </div>
</div>
</div>
</div>

</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    
          function showSuccessAlert() {
            $("#successAlert").addClass("show"); // Add 'show' class to display the alert
            setTimeout(function() {
                closeAlert();
            }, 2000); // Automatically close the alert after 2 seconds
        }

        function closeAlert() {
            $("#successAlert").removeClass("show"); // Remove 'show' class to hide the alert
        }
</script>



<?php include("dashboard_footer.php"); ?>