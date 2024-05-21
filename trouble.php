<?php include("global.php");
$the_side_menu = false;

include("header_new.php");
?>
<?php
if(isset($_POST["code"]) && $_POST["code"]==$_SESSION["rand_code"]){

    if(isset($_POST['email']) && !empty($_POST['email'])){

        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            $email=($_POST['email']);
            $sql    = "SELECT * FROM `accounts_user` WHERE `acc_email`='$email' ";
            $data   =   $dbF->getRow($sql);
            if($dbF->rowCount>0){
                $to =   $email;
                $user   = $data['acc_name'];
                $passwordDecode = $functions->decode($data['acc_pass']);

                $aLink  =   WEB_URL.'/login';
                $mailArray['link']        =   $aLink;
                $mailArray['password']    =   $passwordDecode;
                $functions->send_mail($to,'','','accountTrouble',$user,$mailArray);

                $msg    =   "An email is sent. Please check your emails.";
                $msg= $dbF->hardWords($msg,false);
                $html=        "<div class='alert alert-success'>$msg</div>";
            }
            else{
                $msg="No user found! Please Check Your Email";
                $msg= $dbF->hardWords($msg,false);
                $html= "<div class='alert alert-danger'>$msg</div>";
            }
        }
        else{
            $msg="Incorrect Email.";
            $msg= $dbF->hardWords($msg,false);
            $html= "<div class='alert alert-danger'>$msg</div>";
        }
    }
}

elseif(isset($_POST["code"]) && $_POST["code"]!=$_SESSION["rand_code"]){
    $msg="Captcha Code Incorrect. Please try again.";
    $html= "<div class='alert alert-danger'>$msg</div>";
}
$email = empty($_POST['email']) ? "" : $_POST['email'];
?>




        <!-- Section 3 -->
        <div class="main_section section3 log-in-page inner_main_page" style="padding: 6rem 0">
            <div class="standard">
                <div class="section_heading">
                    <h1>Forget Password</h1>
                    <p><?php $msg= $dbF->hardWords('Enter your email and we send you a password reset link')?></p>
                </div>
                <div class="sec3_inner flex_" style="justify-content: space-between">
                    <div class="leftFlex wow bounceIn" style="width: 50%">
                        <img src="webImages/footer_bg.jpg" alt="Login" />
                    </div>
                    <div class="rightFlex main-page login-main-page wow slideInRight">
                        <div class="section_heading">
                            <!--<h1>Welcome back</h1>-->
                            <!--<span class="guide">Please enter your details.</span>-->
                        </div>
                        <form class="form" method="post" action="?do=resend&r=email">
                            <label for="email" class="label">
                                Email
                                <input type="email" name="email" class="input-field" id="email"
                                    placeholder="Enter your email" />
                            </label>

                            <p class="error"></p>

                            <div class="actions">
                                <!-- <label for="check-box">
                                    <input type="checkbox" class="check-box" id="check-box" />
                                    Remember me</label> -->
                                <div class="col-sm-10">
                                <div class="col-sm-6"><img src="captcha.php" alt="<?php $msg= $dbF->hardWords('Please Type The Code.'); ?>"/></div>
                                <div class="col-sm-6">
                                    <input type="text" class="input-field" name="code"
                                           placeholder="<?php $msg= $dbF->hardWords('Please Type Captcha Code'); ?>" required="">
                                </div>
                            </div>
                            </div>
                            <button name="submit" class="btn_gradient w-100">
                                <span class="start">Send Email</span>
                                <span class="hover">Send Email</span>
                            </button>
                        </form>
                        <?php
                        if(isset($_GET['do']) && isset($_GET['r'])){
                          echo $html;  
                        }
                        
                        ?>
                        <!--<p><a href="signup_form.php">Don't have an account? Sign up</a></p>-->
                    </div>
                </div>
            </div>
            
            <div class="bg_shape">
                <img src="webImages/bg-shape-1.png" alt="" class="style-shape fbs-1">
                <img src="webImages/bg-shape-2.png" alt="" class="style-shape fbs-2">
            </div>
        </div>




<?php include("footer_new.php"); ?>