<?php
ob_start();
include_once ("global.php");
global $webClass;
$pMmsg        = '';
$tailorAllow = true;

if (isset($_POST['tailor']) && !empty($_POST)){ 
    if(isset($_POST['g-recaptcha-response'])){
        $captcha=$_POST['g-recaptcha-response'];
    }
    // if(!$captcha){
    //     $pMmsg = $dbF->hardWords('Please verify that you passed the captcha code.',false);
    //     $tailortAllow = false;
    // }
    // $secretKey = "6LdFUQ4UAAAAAIEhDC88obZeG1mw4IUGDWREnHbG";
    // $ip = $_SERVER['REMOTE_ADDR'];
    // $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    // $responseKeys = json_decode($response,true);
    // if(intval($responseKeys["success"]) !== 1) {
        
    // $pMmsg = $dbF->hardWords('Please verify that you passed the captcha code.',false);
    // $tailorAllow = false;
     
    else{
        if ($functions->getFormToken('tailorform'))
        {
             $checkbox1 = $_POST['Gender'];
             $checkbox2 = $_POST['Clothing'];
            $chk=""; 
            $img = ""; 
             $ch=''; 
             $msg="";
            foreach($checkbox1 as $chk1)  
               {  
                  $chk .= $chk1.",";  
               } 
              $chk = trim($chk,',');
             $msg .= '<table border="1">
                    <tr>
                    <td>Gender</td>
                    <td>'.$chk.'</td>
                    </tr>';
           // extract();  
            
            foreach( $checkbox2 as $chk2)  
               {  
                   
                  $ch .= $chk2.","; 
               }  
                 $ch = trim($ch,',');
            $msg .= '<tr>
                        <td>Clothing</td>
                        <td>'.$ch.'</td>
                    </tr>';
            foreach ($_POST['form'] as $key => $val)
            {
                $msg .= '<tr>
                            <td>' . ucwords(str_replace("_", " ", $key)) . '</td>
                            <td>' . $val . '</td>
                         </tr>';
            }
            
            //$subject = $_POST['form']['subject'];
            $msg .= '<tr> <td>Date Time</td>  <td>' . date("D j M Y g:i a") . '</td> </tr>';
            $msg .= '</table>';
            $to = $functions->ibms_setting('Email');
            $functions->send_mail($to, 'Tailor Form', $msg);
            $nameUser     = $_POST['form']['name'];
            $to           = $_POST['form']['email'];
            $thankT       = $dbF->hardWords('Thanks for your interest. Our representative will get in touch with you.', false);
            $message2     = "Hello " . ucwords($nameUser) . ",<br><br>
                            $thankT.<br><br>";
            if ($functions->send_mail($to, '', '', 'tailorform', $nameUser)){

                $pMmsg        = "$thankT";

            }else{
             
                $errorT       = $dbF->hardWords('An Error occured while sending your mail. Please Try Later', false);
                $pMmsg        = "$errorT";
            }

            $tailorAllow = false;
        }else{

            $tailorAllow = true;
        }
    }

    
}

    $locationMap = $functions->ibms_setting('locationMap');

?>


            <div class="text_side">
                <div class="standard">
                     <?php  if (@$pMmsg != ''){
                         echo "<br><div class='alert alert-info'style='font-size: large;'>$pMmsg</div>";
                     }
                     ?>
                    <div class="text_side_left">
                        <div class="contact_detail">
                            <div class="contact_right">
                                <h5>Order Summary</h5>
                                <form method="post" id="whatsAppAnyForm">
                                    <?php $functions->setFormToken('tailorform'); ?> 
                                    <div class="form_1_">
                                        <div class="form_1_side_">Full Name:</div>
                                        <!-- form_1_side close -->
                                        <div class="form_2_side_ hvr-shadow-radial">
                                            <input type="text" name="form[name]" placeholder="Your Full Name">
                                        </div>
                                        <!-- form_2_side close -->
                                         <div class="form_1_side_">Contact No.:</div>
                                        <!-- form_1_side close -->
                                        <div class="form_2_side_ hvr-shadow-radial">
                                           <input type="tel" name="form[contact]" placeholder="Phone"> 
                                        </div>
                                        <!-- form_2_side close -->
                                        <div class="form_1_side_">email:</div>
                                        <!-- form_1_side close -->
                                        <div class="form_2_side_ hvr-shadow-radial">
                                            <input type="email" name="form[email]" placeholder="Email" required="">
                                        </div>
                                        <!-- form_2_side close -->
                                        <div class="form_1_side_">Gender:</div>
                                        <!-- form_1_side close -->
                                        <div class="">
                                            <input type="checkbox" id="Men" name="Gender[]" value="Men"> Men 
                                              
                                            <input type="checkbox" id="Women" name="Gender[]" value="Women"> Women 
                                             
                                            <input type="checkbox" id="Boys" name="Gender[]" value="Boys"> Boys  
                                             
                                           <input type="checkbox" id="Girl" name="Gender[]" value="Girl"> Girl    
                                        </div>
                                        <!-- form_2_side close -->

                                        <div class="form_1_side_">Clothing Type:</div>
                                        <!-- form_1_side close -->
                                        <div class="">
                                            <input type="checkbox" id="Suits" name="Clothing[]" value="Suits"> Suits 
                                              
                                            <input type="checkbox" id="Shirts" name="Clothing[]" value="Shirts"> Shirts 
                                             
                                            <input type="checkbox" id="Pants" name="Clothing[]" value="Pants"> Pants  
                                             
                                           <input type="checkbox" id="Blazers" name="Clothing[]" value="Blazers"> Blazers 
                                           <input type="checkbox" id="Accessories" name="Clothing[]" value="Accessories"> Accessories 
                                              
                                            <input type="checkbox" id="Traditional_dress" name="Clothing[]" value="Traditional_dress"> Traditional dress 
                                             
                                            <input type="checkbox" id="Uniform" name="Clothing[]" value="Uniform"> Uniform  
                                             
                                           <input type="checkbox" id="Corporate_Deals" name="Clothing[]" value="Corporate_Deals"> Corporate Deals 
                                           <input type="checkbox" id="Others" name="Clothing[]" value="Others"> Others
                                        </div><br><br>
                                        <!-- form_2_side close -->
                                        <div class="form_1_side_">Order Detail:</div>
                                        <!-- form_1_side close -->
                                        <div class="form_2_side_ hvr-shadow-radial">
                                            <textarea placeholder="Detail" name="form[Detail]"></textarea>
                                        </div>
                                        <!-- form_2_side close -->
                                        <div class="form_1_side_" style="visibility: hidden;">Your Message:</div>
                                         <div class="form_2_side_ form_2_side_cap">
                                            <div id="recaptcha2"></div>
                                         </div>
                                        <div class="form_1_side_ mbl_side" style="visibility: hidden;">Submit</div>
                                        <!-- form_1_side close -->
                                        <div class="form_2_side_ form_1 new">
                                         <button type="submit" class="submit_side" value=" " name="tailor" id="whatsappFormSubmit">SUBMIT INFORMATION</button>
                                        </div>
                                            <!-- form_2_side close -->
                                    </div>
                                  </form>
                                <!-- form_1 close -->
                            </div>
                            <!-- contact_right close -->
                        </div>
                        <!-- contact_detail close -->
                    </div>
                    <!-- text_side_left close -->
                </div>
                <!-- standard close -->
            </div>
            <!-- text_side close -->
<script>
(function($){
        "use strict";
			$('#whatsAppAnyForm').appPlugin( 
				{
				    whatsappPhone: '+923073719558', // Your Whatsapp Number, on which you want to send message.
					submissionMessage: 'You have been redirected to the WhatsApp to submit the message. Thank you.' // form submission message
				});	
})(jQuery);
</script>

<script defer="defer" src="<?php echo WEB_URL ?>/js/appform.js"></script>
<script defer="defer" src="<?php echo WEB_URL ?>/js/jquery.validate.min.js"></script>
<?php
// }
return ob_get_clean();

?>
