<?php include("global.php");

global $webClass;
global $productClass;
$msg = '';
$loginReturn = $webClass->userLogin();


// if($loginReturn===true){
//     if(isset($_GET['ref'])){
//         $reffer = $_GET['ref'];
//         $loc = htmlentities(base64_decode($reffer));
//         header("Location: $loc");
//         exit;
//     }else{
//         $loc = 'dashboard.php';
//     }

    //if user success login then refer on previous open page
    // header("Location: $loc");
    // exit;
// }else if($loginReturn!=false){
//     $msg = $loginReturn;
// }
if($loginReturn!=false){
    $msg = $loginReturn;
}
$login       =  $webClass->userLoginCheck();
if($login){
    //if user already login then go to profile
    header("Location: dashboard.php");
    exit();
}

include("header_new.php");
//var_dump($_SESSION);

@$reffer = $_SERVER['HTTP_REFERER'];
$reffer = str_replace(WEB_URL.'/','',$reffer);

if(!empty($reffer)){
    //getting reffer link and set in url, when login success page redirect on location
    if(isset($_GET['ref'])) {
        $reffer = htmlentities(base64_decode($_GET['ref']));
    }
    $reffer = base64_encode($reffer);

?>
    <script>
        $(document).ready(function(){
           history.pushState(null, "login", "?ref=<?php echo $reffer; ?>");
        });
    </script>
<?php } ?>

        <!-- Section 3 -->
        <div class="main_section section3 log-in-page inner_main_page" style="padding: 6rem 0">
            <div class="standard">
                <div class="section_heading">
                    <h1>Login</h1>
                    <p>Welcome back! Please log in to access a world of personalized<br> experiences and embark on your journey</p>
                </div>
                <div class="sec3_inner flex_" style="justify-content: space-between">
                    <div class="leftFlex wow bounceIn" style="width: 50%">
                        <img src="webImages/footer_bg.jpg" alt="Login" />
                    </div>
                    <div class="rightFlex main-page login-main-page wow slideInRight">
                        <div class="section_heading">
                            <!--<h1>Welcome back</h1>-->
                            <span class="guide"><?php echo $msg?></span>
                        </div>
                        <form class="form" action="" method="POST">
                            <label for="email" class="label">
                                Email
                                <input type="email" name="email" class="input-field" id="email"
                                    placeholder="Enter your email" />
                            </label>

                            <label for="password" class="label">
                                Password
                                <input type="password" name="pass" class="input-field" id="password"
                                    placeholder="Enter your password" />
                            </label>

                            <p class="error"></p>

                            <div class="actions">
                                <!-- <label for="check-box">
                                    <input type="checkbox" class="check-box" id="check-box" />
                                    Remember me</label> -->

                                <a href="trouble">Forgot Password?</a>
                            </div>
                            <button name="submit" class="btn_gradient w-100">
                                <span class="start">Sign in</span>
                                <span class="hover">Sign in</span>
                            </button>
                        </form>

                        <p><a href="signup_form.php">Don't have an account? Sign up</a></p>
                    </div>
                </div>
            </div>
            
            <div class="bg_shape">
                <img src="webImages/bg-shape-1.png" alt="" class="style-shape fbs-1">
                <img src="webImages/bg-shape-2.png" alt="" class="style-shape fbs-2">
            </div>
        </div>
        <!-- Section 3 Ends-->

<?php include("footer_new.php");  ?>