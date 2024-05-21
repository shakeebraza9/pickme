<?php
include("global.php");
global $webClass;
global $productClass;
global $dbF;
global $db, $functions;
$dbp = $db;

function signUpSubmit()
{
    global $dbF;
    global $db;
    global $functions;
    global $webClass;

    if (
        isset($_POST['signUp']['fullname']) && !empty($_POST['signUp']['fullname'])
        && isset($_POST['signUp']['email']) && !empty($_POST['signUp']['email'])
        && isset($_POST['signUp']['pass']) && !empty($_POST['signUp']['pass'])
        && isset($_POST['signUp']['rpass']) && !empty($_POST['signUp']['rpass'])
    ) {

        if (!$functions->getFormToken('signUpUser')) {
            return false;
        }


        $useralreadyT = $dbF->hardWords('User Name/Email name already exist', false);
        $TryagainT = $dbF->hardWords('Try again. Or contact administrator.', false);
        $ThankWeSend = $dbF->hardWords('Thank you! We have sent verification email. Please check your email.', false);
        
        $emailchk=$_POST['signUp']['email'];
        $sql = "SELECT * FROM accounts_user WHERE acc_email = '$emailchk'";
        $test   =   $dbF->getRow($sql);
        if ($dbF->rowCount > 0) {
            $msg = "$useralreadyT <br /><br>";
            return $msg;
        }


        $DearT = $dbF->hardWords('Dear', false);
        /*       $ThankForRegT = $dbF->hardWords('Thank you for your registration to our website.',false);
        $verifyT = $dbF->hardWords('Please verify your account from the link below:',false);
        $YourVerifyT = $dbF->hardWords('Your verification code is',false);
        $AccVerifyT = $dbF->hardWords('Account Verification',false);
*/


        $thankYoumsg    =   $dbF->hardWords('Thank you for registering.', false);

        if (isset($_POST["code"]) && $_POST["code"] != $_SESSION["rand_code"]) {
            $msg = $dbF->hardWords('Captcha Code Not Match Please Try Again', false);
            return $msg;
        } else {
            try {
                $email = strip_tags(strtolower(trim($_POST['signUp']['email'])));
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $status = "1"; //pending 0 .. 1 active
                    $type = "Client"; //pending 0 .. 1 active
                    $name   = empty($_POST['signUp']['fullname'])  ? "" : $_POST['signUp']['fullname'];
                    $pass   = empty($_POST['signUp']['pass'])  ? "" : $_POST['signUp']['pass'];
                    $rpass  = empty($_POST['signUp']['rpass']) ? "" : $_POST['signUp']['rpass'];
                    $today  = date("Y-m-d H:i:s");

                    if ($pass != $rpass) {
                        $msg = $dbF->hardWords('Password Not Matched!', false);
                        return $msg;
                    }
                    $password  = $functions->encode($pass);

                    $db->beginTransaction();
                    $sql = "INSERT INTO accounts_user SET
                                acc_name = ?,
                                acc_email = ?,
                                acc_pass = ?,
                                acc_type = '$status',
                                user_typeee = '$type',
                                acc_created = '$today'";
                    $array = array($name, $email, $password);

                    $dbF->setRow($sql, $array, false);
                    $lastId = $dbF->rowLastId;

                    $setting    = empty($_POST['signUp']) ? array() : $_POST['signUp'];

                    $sql        =   "INSERT INTO `accounts_user_detail` (`id_user`,`setting_name`,`setting_val`) VALUES ";
                    $arry       =   array();
                    foreach ($setting as $key => $val) {
                        $sql .= "('$lastId',?,?) ,";
                        $arry[] = $key;
                        $arry[] = $val;
                    }
                    $sql = trim($sql, ",");
                    $dbF->setRow($sql, $arry, false);

                    $code   = $webClass->vcode($name, $email);
                    $aLink  = WEB_URL . "/verify.php?a=" . urlencode($email);

                    $SincerelyT = $dbF->hardWords('Sincerely', false);
                    $msg  = "$DearT " . ucwords($name) . ".! <br> $thankYoumsg<br /><br>" . "\n";
                    $mailArray['link']        =   $aLink;
                    $mailArray['code']        =   $code;
                    $functions->send_mail($email, '', '', 'signUp', $name, $mailArray);
                    //$msg = $msg;
                } else {
                    $AccLoginInfoT = $dbF->hardWords('Invalid Email Address!', false);
                    $msg = $AccLoginInfoT;
                    return $msg;
                }


                $db->commit();
                $loginReturn = $webClass->userLogin(false);
                if ($loginReturn === true) {
                    if (isset($_GET['ref']) && ($_GET['ref'] == 'cart' || $_GET['ref'] == 'cart.php')) {
                        $loc = 'cart.php';
                    } else {
                        $loc = 'viewOrder.php';
                    }
                    echo '<script>
                    //location.replace("' . $loc . '");
                    </script>';
                }
                return $msg;
            } catch (PDOException $e) {
                $msg = "$useralreadyT <br /><br>
                    $TryagainT<br><br>";
                $db->rollBack();
                return $msg;
            }
        }
    }
}

$msg = signUpSubmit();
include("header_new.php");
?>


<script type="text/javascript">
    function passM() {
        var pass = document.getElementById("pass").value;
        var rpass = document.getElementById("rpass").value;
        if (pass.length >= 4) {
            if (pass == rpass) {
                document.getElementById("pm").style.color = "green";
                document.getElementById("pm").innerHTML = "<?php $dbF->hardWords('Password Matched!'); ?>";
                document.getElementById("signup_btn").disabled = false;
            } else {
                document.getElementById("pm").style.color = "red";
                document.getElementById("pm").innerHTML = "<?php $dbF->hardWords('Password Not Matched!'); ?>";
                document.getElementById("signup_btn").disabled = true;
            }
        } else {
            document.getElementById("pm").style.color = "orange";
            document.getElementById("pm").innerHTML = "<?php $dbF->hardWords('Atleat 4 characters!'); ?>";
            document.getElementById("signup_btn").disabled = true;
        }
    }

    function vali() {
        var u_l = document.getElementById("user").value.length;
        if (u_l <= 3) {
            document.getElementById("um").style.color = "red";
            document.getElementById("signup_btn").disabled = true;
        } else {
            document.getElementById("um").style.color = "black";
            document.getElementById("signup_btn").disabled = false;
        }
    }

    function subf() {
        var terms = document.getElementById("ch").checked;
        if (terms == true) {
            document.getElementById("sf").submit();
        }
    }
</script>


        <!-- Section 3 -->
        <div class="main_section section3 log-in-page inner_main_page" style="padding: 6rem 0">
            <div class="standard">
                <div class="section_heading">
                    <h1>Sign up</h1>
                    <p>Embark on an incredible adventure! Sign up now to unlock a world of possibilities<br> and create your personalized account</p>
                </div>
                <div class="sec3_inner flex_" style="justify-content: space-between">
                    <div class="leftFlex wow bounceIn" style="width: 50%">
                        <img src="webImages/footer_bg.jpg" alt="Signup" />
                    </div>
                    <div class="rightFlex main-page login-main-page wow slideInRight">
                        <!--<div class="section_heading">-->
                        
                        <span class="guide">
                        <?php 
                        if(@$msg != '') { 
                        echo $msg;
                        ?>
                        </span>
                                <?php  ?>
                                <?php } ?>
                            <!--<h1>Sign Up</h1>-->
                            <!--<span class="guide">Please enter your details.</span>-->
                        <!--</div>-->
                        <form class="form" method="POST">
                            <?php $functions->setFormToken('signUpUser');?>
                            <label for="fullname" class="label">
                                Fullname
                                <input name="signUp[fullname]" type="text" class="input-field" id="fullname"
                                    placeholder="Enter your full name" />
                            </label>
                            <label for="email" class="label">
                                Email
                                <input name="signUp[email]" type="email" class="input-field" id="email"
                                    placeholder="Enter your email" />
                            </label>

                            <label for="password" class="label">
                                Password
                                <input name="signUp[pass]" type="password" class="input-field" id="password"
                                    placeholder="Enter your password" />
                            </label>
                            <label for="con-password" class="label">
                                Confirm Password
                                <input name="signUp[rpass]" type="password" class="input-field" id="con-password"
                                    placeholder="Confirm your password" />
                            </label>
                            <div class="actions_2">
                                <label for="check-box">
                                    <input type="radio" class="check-box" id="check-box" name="signUp[gender]" />
                                    Male</label>
                                <label for="check-box">
                                    <input type="radio" class="check-box" id="check-box" name="signUp[gender]" />
                                    Female</label>
                            </div>
                            <button name="submit" class="btn_gradient w-100">
                                <span class="start">Sign up</span>
                                <span class="hover">Sign up</span>
                            </button>
                        </form>

                        <p><a href="login">Already have an account? Log in</a></p>
                    </div>
                </div>
            </div>

            <div class="bg_shape">
                <img src="webImages/bg-shape-1.png" alt="" class="style-shape fbs-1">
                <img src="webImages/bg-shape-2.png" alt="" class="style-shape fbs-2">
            </div>
        </div>
        <!-- Section 3 Ends-->

<script>
    $(document).ready(function() {
        //dateJqueryUi();
    });
</script>
<?php include("footer_new.php");  ?>