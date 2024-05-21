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
        if($functions->getFormToken('inquiryForm')){
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
            $functions->send_mail($to,$subject.' Inquiry Form',$msg);

            $nameUser =   $_POST['form']['full_name'];
            $to =   $_POST['form']['email'];

            $thankT = $dbF->hardWords('Thanks for your interest. Our representative will get in touch with you.',false);
            $message2="Hello ".ucwords($nameUser).",<br><br>
            $thankT.<br><br>";

            if($functions->send_mail($to,'','','inquiryFormSubmit',$nameUser)){
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
                            <?php $functions->setFormToken('inquiryForm');?>
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
                            <div class="form_1_side">Product Name:</div>
                            <!-- form_1_side close -->
                            <div class="form_2_side hvr-shadow-radial">
                                <input type="text" name="form[p_name]" required placeholder="Enter Here Product Name"> </div>
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
                        <div class="form2 wow fadeInLeft">
                            <?php $box12 = $webClass->getBox('box12'); ?>
                            <h3><?php echo $box12['heading'] ?></h3>
                            <div class="form2_side">
                                <h4><?php echo $box12['heading2'] ?>: </h4><?php echo $box12['text'] ?>
                            </div>
                            <!-- form2_side close -->
                            <div class="form2_side">
                                <?php $box13 = $webClass->getBox('box13'); ?>
                                <h4><?php echo $box13['heading'] ?>:</h4><?php echo $box13['text'] ?>
                            </div>
                            <!-- form2_side close -->
                            <div class="form2_side">
                                <?php $box11 = $webClass->getBox('box11'); ?>
                                <h4><?php echo $box11['heading'] ?>:</h4>
                                <div class="form2_inner">
                                    <div class="form2_inner1"><?php echo $box11['heading2'] ?>:</div>
                                    <!-- form2_inner1 close -->
                                    <div class="form2_inner2"> <?php echo $box11['linkText'] ?></div>
                                    <!-- form2_inner1 close -->
                                </div>
                                <!-- form2_inner close -->
                                <div class="form2_inner">
                                    <?php $box2 = $webClass->getBox('box2'); ?>
                                    <div class="form2_inner1"><?php echo $box2['heading'] ?>:</div>
                                    <!-- form2_inner1 close -->
                                    <div class="form2_inner2"><a href="mailto:<?php echo $box2['linkText'] ?>"><?php echo $box2['linkText'] ?></a></div>
                                    <!-- form2_inner1 close -->
                                </div>
                                <!-- form2_inner close -->
                                <div class="form2_inner">
                                    <?php $box14  = $webClass->getBox('box14'); ?>
                                    <div class="form2_inner1"><?php echo $box14['heading'] ?>:</div>
                                    <!-- form2_inner1 close -->
                                    <div class="form2_inner2"><a href="<?php echo $box14['link'] ?>" target="_blank"><?php echo $box14['linkText'] ?></a></div>
                                    <!-- form2_inner1 close -->
                                </div>
                                <!-- form2_inner close -->
                            </div>
                            <!-- form2_side close -->
                        </div>
                        <!-- form2 close -->
                    </div>
                    <!-- form_side close -->
                </div>
            </div>
<?php
}
    return ob_get_clean(); ?>