<?php
ob_start();
include_once("global.php");
global $webClass;
$pMmsg = '';
$contactAllow = true;
if(isset($_POST) && !empty($_POST) ){ ?>
    <?php

    if(isset($_POST["code"]) && $_POST["code"]!=$_SESSION["rand_code"]){
        $pMmsg = $dbF->hardWords('Captcha Code Not Correct',false);
        $contactAllow = true;
    }
    else{
        if($functions->getFormToken('contactForm')){
            $img="";

            $msg='<table border="1">';
            foreach($_POST['form'] as $key=>$val){
                $msg.= '
                    <tr>
                        <td>'.ucwords(str_replace("_"," ",$key)).'</td>
                        <td>'.$val.'</td>
                    </tr>
                ';
            }

            $subject = $_POST['form']['subject'];

            $msg.='<tr> <td>Date Time</td>  <td>'.date("D j M Y g:i a").'</td> </tr>';
            $msg.='</table>';

            $to = $functions->ibms_setting('Email');
            $functions->send_mail($to,$subject.' Contact Form',$msg);

            $nameUser =   $_POST['form']['full_name'];
            $to =   $_POST['form']['email'];

            $thankT = $dbF->hardWords('Thanks for your interest. Our representative will get in touch with you.',false);
            $message2="Hello ".ucwords($nameUser).",<br><br>
            $thankT.<br><br>";

            if($functions->send_mail($to,'','','contactFormSubmit',$nameUser)){
                $pMmsg = "$thankT";
            } else {
                $errorT = $dbF->hardWords('An Error occured while sending your mail. Please Try Later',false);
                $pMmsg = "$errorT";
            }
            $contactAllow = false;
        }else{
            $contactAllow = true;
        }
    }
    if($pMmsg!=''){
        echo "<div class='alert alert-info'>$pMmsg</div>";
    }

}
if($contactAllow){

    $labelClass  = "col-sm-3 padding-0";
    $divClass    = "col-sm-9";
    $pg          = $_GET['page'];
    $page        = $webClass->getPage("$pg");
    $title       = $page['heading'];
    $locationmap = $functions->ibms_setting('locationMap');
?>

            <div class="contact_side">
                <div class="standard">
                    <h1><?php echo $title; ?></h1>
                    
                    
                    <div class="form_side">
                        <div class="form_1 wow fadeInRight">
                            <form class='form-horizontal' method="post" >
                            <?php $functions->setFormToken('contactForm');?>
                            <h3>Form</h3>
                            <div class="form_1_side">Full Name:</div>
                            <!-- form_1_side close -->
                            <div class="form_2_side hvr-shadow-radial">
                                <input type="text" name="form[full_name]" required placeholder="Enter Full Name"> </div>
                            <!-- form_2_side close -->
                            <div class="form_1_side">Email:</div>
                            <!-- form_1_side close -->
                            <div class="form_2_side hvr-shadow-radial">
                                <input type="email" name="form[email]" required placeholder="Enter Here Email"> </div>
                            <!-- form_2_side close -->
                            <div class="form_1_side">Contact No:</div>
                            <!-- form_1_side close -->
                            <div class="form_2_side hvr-shadow-radial">
                                <input type="text" name="form[contact]" required placeholder="Enter Here Contact No"> </div>
                            <div class="form_1_side">Phone:</div>
                            <!-- form_1_side close -->
                            <div class="form_2_side hvr-shadow-radial">
                                <input type="text" name="form[phone]" required placeholder="Enter Here Phone"> </div>
                            <!-- form_2_side close -->
                            <div class="form_1_side">Subject:</div>
                            <!-- form_1_side close -->
                            <div class="form_2_side hvr-shadow-radial">
                                <input type="text" name="form[subject]" required placeholder="Enter The Subject"> </div>
                            <!-- form_2_side close -->
                            <div class="form_1_side">Message:</div>
                            <!-- form_1_side close -->
                            <div class="form_2_side hvr-shadow-radial">
                                <textarea name="form[message]" placeholder="Message"></textarea>
                            </div>
                            <!-- form_2_side close -->
                            <div class="form_1_side mbl_side" style="visibility: hidden;">Captcha</div>
                            <!-- form_1_side close -->
                            <div id="recaptcha2"></div>
                            <br />
                            <!-- recaptcha2 close -->
                            <div class="form_1_side mbl_side" style="visibility: hidden;">Submit</div>
                            <!-- form_1_side close -->
                            <div class="form_2_side">
                                <input type="submit" class="col1_btn" value="SUBMIT INFORMATION"> </div>
                            <!-- form_2_side close -->
                            </form>
                        </div>
                        <!-- form_1 close -->
                        
                    </div>
                    <!-- form_side close -->
                </div>
            </div>
<?php
}
    return ob_get_clean(); ?>