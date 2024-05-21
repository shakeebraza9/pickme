<?php
include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;

if(!empty($_POST)){
	// echo 1;
	$captcha = $_POST['token'];
// 	var_dump($captcha);
	$secret   = "6LcQIscZAAAAAIZtvX0F2x2SxjUdqi9JBNQZgoBm";
	$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
		// use json_decode to extract json response
	$response = json_decode($response);
	

// 	if ($response->success === false) {
// 		$pMmsg = $dbF->hardWords('The form has not been submitted please refill the form and submit.',false);
// 		$contactAllow = false;
// 	echo 2;
// 	}
	if ($response->success === false){
	echo 3;
		$img="";
		$f = '';
		$v = '';
		$c = 1;
		$array = array();
		$msg='<table border="1">';



		foreach($_POST['form'] as $key=>$val){

			$msg.= '
			<tr>
			<td>'.ucwords(str_replace("_"," ",$key)).'</td>
			<td>'.$val.'</td>
			</tr>';
			$f .= 'field'.$c.' = ?,';
			$v = ucwords(str_replace("_"," ",$key)).':'.$val;
			$array[]= $v;
			$c++;
		}
		$msg.='<tr> <td>Date Time</td>  <td>'.date("D j M Y g:i a").'</td> </tr>';
		$msg.='</table>';
		$msg;
		$f = trim($f,",");

		 $functions->saveFormData($f,$array, 'BUSINESS PACKAGES');
		 $to = $functions->ibms_setting('Email');
      
		 $functions->send_mail($to,'BUSINESS PACKAGES',$msg);

		$nameUser =   $_POST['form']['name'];
		$to =   $_POST['form']['email'];
		$thankT = $dbF->hardWords('Thanks for your interest. Our representative will get in touch with you.',false);
		$message2="Hello ".ucwords($nameUser).",<br><br>

		$thankT.<br><br>";

		if($functions->send_mail($to,'','','contactFormSubmit',$nameUser)){
			$pMmsg = $thankT;
		} else {
			$errorT = $dbF->hardWords('An Error occured while sending your mail. Please Try Later',false);
			$pMmsg = "$errorT";
		}
	}
}

?>
 

<style>
    .package_footer {
    justify-content: left;
    /*margin-inline-start: 51%;*/
}
    .package_footer {
    justify-content: left;
    /*margin-inline-start: 51%;*/
    
    }
.single_package.wow.bounceInRight {
    margin: 20px;
    height: 644px;
    width:300px;
}

.single_package.wow.bounceInleft {
    margin: 20px;
    height: 644px;
     width:300px;
}
.single_package.wow.bounceInUp{
    margin: 20px;
    height: 644px;
     width:300px;
}
.single_package.wow.bounceInLeft{
     margin: 20px;
    height: 644px;
     width:300px;
    
}


</style>
<?php

if(@$_GET['packageid']){
$packageid=base64_decode($_GET['packageid']);
include("header_new.php");

        $sql = "SELECT * FROM `proudct_detail_spb` WHERE `product_update`='1' AND `category`='Month' AND prodet_id =$packageid  ORDER BY `prodet_id` DESC LIMIT 3";
        $data = $dbF->getRow($sql);
        $heading=unserialize($data['prodet_name']);
        $productKey=key($heading);
        $name = $heading[$productKey];
        
        $shortDesc=unserialize($data['prodet_shortDesc']);
        $shortDesckey=key($shortDesc);
        $Desc=$shortDesc[$shortDesckey];
        
        
                $sql2 = "SELECT `propri_price` FROM `product_price_spb` WHERE `propri_prodet_id`=$packageid";
                $data2 = $dbF->getRow($sql2);
                $price=$data2['propri_price'];

                $sql3 = "SELECT `setting_val` FROM `product_setting_spb` WHERE `p_id`=$packageid AND `setting_name`='ldesc' LIMIT 1";
                $data3 = $dbF->getRow($sql3);
                $desc=getTextFromSerializeArray($data3['setting_val']);
        
                $sql4 = "SELECT `image` FROM `product_image_spb` WHERE `product_id`=$packageid";
                $data4 = $dbF->getRow($sql4);
                @$img=$data4['image'];
                if(!empty($img)){
                   $imgs= WEB_URL.'/uploads/'.$img;
                }else{
                    $imgs='webImages/aboutus.webp';
                }
echo'
<!-- Section 3 -->
<div class="main_section section3 inner_main_page" style="padding: 6rem 0">
<div class="section_heading">
<h1>'.$name.'</h1>

<p>'.$Desc.'</p>
</div>

<div class="standard">
<div class="sec3_inner flex_" style="justify-content: space-between">
<div class="leftFlex wow bounceIn" style="width: 40%"><img alt="Image Edit" src="'.$imgs.'" /></div>


<div class="rightFlex wow slideInRight">
<div class="section_subheading">
</div>

<div class="txtHolder">
<ul>
'.$desc.'
</ul>
</div>
</div>
</div>
</div>
          <div class="package_footer">
                            <a href="javascript:void(0)" id="package_popup" class="btn_gradient_small buy-button" data-product-id="' . $packageid . '">
                                <span class="start">Buy Now</span>
                                <span class="hover">Buy Now</span>
                            </a>
                        </div>
<div class="bg_shape"><img alt="" class="style-shape fbs-1" src="webImages/bg-shape-1.png" /> <img alt="" class="style-shape fbs-2" src="webImages/bg-shape-2.png" /></div>
</div>

          </div>
<!-- Section 3 Ends-->

';

echo'
          <div class="fixed_side"></div>
    <div class="package_popup">
        <div class="col5_close">
            <img src="webImages/close.png" alt="" class="hvr-pop">
        </div>
        <div class="standard">
            <div class="section_heading">
                <h1>Book your package</h1>
            </div>
            <form method="POST" action="orderInvoice.php" class="inner_form wow fadeInLeft">
                <!-- form flex -->
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="text" id="name_f1" name="pname" placeholder="Full Name" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- form flex -->
                      <input type="hidden" id="validity" name="validity" value="">
                              <input type="hidden" id="price" name="price" value="">
                              <input type="hidden" id="productId" name="productId" value="">
                              <input type="hidden" id="pName" name="pName" value="">';
                
           
                // echo 1;
                $login = $webClass->userLoginCheck();
                if(!$login) {
                echo'
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="email" id="email_f1" name="email" placeholder="Email Address" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>';

} 

echo'                <!-- form flex -->
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="number" id="pnumber_f1" name="mobile"
                                placeholder="Phone Number" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="text" id="eventname" name="eventname"
                                placeholder="Event Name" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="form_flex">
    <!-- 1 -->
    <div class="form_group">
        <div class="input_">
            <select class="effect-7" id="name_f1" name="type" required>
                <option value="" disabled selected>Event Type</option>
                <option value="Birthday">Birthday</option>
                <option value="Holy Day">Holiday</option>
                <!-- Add more options as needed -->
            </select>
            <span class="focus-border">
                <i></i>
            </span>
        </div>
    </div>
</div>
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="text" id="eventheadername" name="eventheadername"
                                placeholder="Event Page Header" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
            <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="date" id="eventdate" name="eventdate"
                                placeholder="Event Date" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <textarea class="effect-7" id="message_f1" name="message"
                                placeholder="Welcome Message"></textarea>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="text" id="name_f1" name="city" placeholder="City" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <textarea class="effect-7" id="message_f1" name="address"
                                placeholder="address"></textarea>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>

                

                <div class="form_btn">
                    <button class="btn_gradient_small">
                        <span class="start">Submit</span>
                        <span class="hover">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

';


include_once(__DIR__ . "/footer_new.php");
}else{
ob_start();

include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;
?>
<style>
    b {
    font-size: initial;
}
</style>

        <!-- Section 6 -->
        <div class="main_section section6 inner_main_page">
            <div class="bg_shape_logo">
                <svg id="Layer_1" width="450" height="450" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 228.75 228.75">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #6ed6d1;
                            }

                            .cls-2 {
                                fill: #d1d3d4;
                            }

                            .cls-3 {
                                fill: #231f20;
                            }
                        </style>
                    </defs>
                    <g id="rotateGroup1" class="rotate-group" transform="translate(114.375, 114.375)">
                        <path class="cls-1"
                            d="M325.19,186.85h-4.73A109.77,109.77,0,0,0,210.82,77.21V72.48A114.51,114.51,0,0,1,325.19,186.85"
                            transform="translate(-96.44 -72.48)" />
                        <!-- Other paths here -->
                        <path class="cls-1"
                            d="M210.82,301.23A114.51,114.51,0,0,1,96.44,186.85h4.73A109.77,109.77,0,0,0,210.82,296.5v4.73Z"
                            transform="translate(-96.44 -72.48)" />
                    </g>

                    <g id="rotateGroup2" class="rotate-group" transform="translate(114.375, 114.375)">
                        <path class="cls-1"
                            d="M121.23,186.85H116.5a94.42,94.42,0,0,1,94.31-94.31v4.73a89.69,89.69,0,0,0-89.58,89.58"
                            transform="translate(-96.44 -72.48)" />

                        <path class="cls-1"
                            d="M210.82,281.17v-4.73a89.69,89.69,0,0,0,89.58-89.59h4.73a94.42,94.42,0,0,1-94.31,94.32"
                            transform="translate(-96.44 -72.48)" />
                    </g>

                    <path class="cls-1"
                        d="M257.58,182.72h0l-15.49,8.94a32.59,32.59,0,0,0,.38-4.83,31.6,31.6,0,0,0-7.11-19.94V146.83a46.8,46.8,0,0,1,22.22,35.89"
                        transform="translate(-96.44 -72.48)" />
                    <path class="cls-2"
                        d="M276.45,171.83l-14.39,8.31c-0.15-1.19-.35-2.38-0.59-3.55a51.65,51.65,0,0,0-26.11-35.21V124.15a67.39,67.39,0,0,1,41.09,47.68"
                        transform="translate(-96.44 -72.48)" />
                    <path class="cls-2"
                        d="M230.63,122.49v16.63c-1.1-.46-2.22-0.89-3.37-1.27a51.75,51.75,0,0,0-43.55,5l-14.92-8.61a67.3,67.3,0,0,1,61.84-11.77"
                        transform="translate(-96.44 -72.48)" />
                    <path class="cls-1"
                        d="M225.76,142.34a43.68,43.68,0,0,1,4.87,2v17.9a31.63,31.63,0,0,0-19.81-7,32.29,32.29,0,0,0-5,.41l-17.36-10a47.05,47.05,0,0,1,37.33-3.26"
                        transform="translate(-96.44 -72.48)" />
                    <path class="cls-2"
                        d="M159.15,186.85c0,0.5,0,1,0,1.5L144.25,197A67.37,67.37,0,0,1,165,137.53l14.38,8.3c-0.95.73-1.88,1.49-2.78,2.29a51.64,51.64,0,0,0-17.47,38.72"
                        transform="translate(-96.44 -72.48)" />
                    <path class="cls-1"
                        d="M199.35,157.37a31.61,31.61,0,0,0-18.09,18.22l-17.37,10a46.76,46.76,0,0,1,20-37.2Z"
                        transform="translate(-96.44 -72.48)" />
                    <path class="cls-1"
                        d="M186.28,206.81v20.07a47,47,0,0,1-21.47-30.7,42.34,42.34,0,0,1-.74-5.19L179.54,182a30.85,30.85,0,0,0-.38,4.8,31.56,31.56,0,0,0,7.12,20"
                        transform="translate(-96.44 -72.48)" />
                    <path class="cls-2"
                        d="M186.28,232.34v17.22a67.44,67.44,0,0,1-41.1-47.67l14.4-8.31c0.15,1.19.36,2.37,0.59,3.54a51.73,51.73,0,0,0,26.11,35.23"
                        transform="translate(-96.44 -72.48)" />
                    <path class="cls-1"
                        d="M195.89,231.37a43.68,43.68,0,0,1-4.87-2V211.52a31.57,31.57,0,0,0,19.81,7,32.25,32.25,0,0,0,5-.4l17.35,10a47,47,0,0,1-37.31,3.25"
                        transform="translate(-96.44 -72.48)" />
                    <path class="cls-2"
                        d="M252.84,239.45A67.39,67.39,0,0,1,191,251.21V234.59c1.1,0.45,2.22.88,3.36,1.25a51.79,51.79,0,0,0,43.55-5Z"
                        transform="translate(-96.44 -72.48)" />
                    <path class="cls-1"
                        d="M241.88,222a44.86,44.86,0,0,1-4.13,3.24l-15.48-8.93a31.75,31.75,0,0,0,18.1-18.23l17.37-10a47,47,0,0,1-15.87,34"
                        transform="translate(-96.44 -72.48)" />
                    <path class="cls-2"
                        d="M278.15,186.85a67.33,67.33,0,0,1-21.53,49.32l-14.38-8.3c0.95-.72,1.88-1.48,2.78-2.28a51.7,51.7,0,0,0,17.48-38.74c0-.5,0-1,0-1.48h0l14.92-8.61a68.48,68.48,0,0,1,.76,10.1"
                        transform="translate(-96.44 -72.48)" />
                    <path class="cls-3"
                        d="M226.63,180.48a6.91,6.91,0,0,1-10.6-5.85,6.79,6.79,0,0,1,1-3.63,17,17,0,1,0,9.56,9.48M204.2,196a2.09,2.09,0,1,1,2.09-2.09A2.09,2.09,0,0,1,204.2,196"
                        transform="translate(-96.44 -72.48)" />
                </svg>
            </div>
            <div class="standard">
                <div class="section_heading">
          <h1>Explore Our Competitive Pricing</h1>
          <p>Explore flexible pricing options designed to suit your needs.<br> From budget-friendly plans to comprehensive packages.</p>
        </div>
        <div class="sec6_inner flex_">
          <!--  -->
          <?php
        $sql5 =  "SELECT * FROM `proudct_detail_spb` WHERE `product_update` = '1' AND `category` = 'Month' AND   `page`='package' ORDER BY `sort` ASC LIMIT 4";
        $data5 = $dbF->getRows($sql5);
        // var_dump($data5);
        $i=1;
        foreach($data5 as $val){
            
            
            if($i==1){
                $bounce="bounceInLeft";
            }else if($i==2){
                $bounce="bounceInUp";
                
            }else{
                $bounce="bounceInRight";
                
            }
            
            
            $prodetAddOn = $val['prodet_addOn'];
            $validity = intval($val['validity']);
            $CheckExp = $functions->isProductExpired($prodetAddOn,$validity);
            // var_dump($CheckExp);
            if(!$CheckExp){
                $productName = unserialize($val['prodet_name']);
                $shortDesc = unserialize($val['prodet_shortDesc']);

                $prodetId = $val['prodet_id'];
                $productKey=key($productName);
                $name = $productName[$productKey];
                
                $productKeydsc=key($shortDesc);
                $shortDes = $shortDesc[$productKeydsc];

                $sql2 = "SELECT `propri_price` FROM `product_price_spb` WHERE `propri_prodet_id`=$prodetId";
                $data2 = $dbF->getRow($sql2);
                $price=$data2['propri_price'];

                $sql3 = "SELECT `setting_val` FROM `product_setting_spb` WHERE `p_id`=$prodetId AND `setting_name`='ldesc' LIMIT 1";
                $data3 = $dbF->getRow($sql3);
                $desc=getTextFromSerializeArray($data3['setting_val']);
                
                echo '
                 <div class="single_package wow '.$bounce.'">
            <div class="single_package_bg"></div>
            <div class="package_header">
              <h3>'.$name.'</h3>
              <h1>£'.$price.' <span>/mo</span></h1>
              <b><p>'.$shortDes.'</p></b>
            </div>

            <div class="package_body">
              '.$desc.'
            </div>

          <div class="package_footer">
                            <a href="javascript:void(0)" id="package_popup" class="btn_gradient_small buy-button" data-product-id="' . $prodetId . '">
                                <span class="start">Buy Now</span>
                                <span class="hover">Buy Now</span>
                            </a>
                        </div>
          </div>
                
                ';
                    
                }
                $i++;
        }
          
          ?>

        </div>
        <br>
         <div class="sec6_inner flex_">
          <!--  -->
          <?php
        $sql5 = "SELECT * FROM `proudct_detail_spb` WHERE `page`='main' AND `product_update`='1' AND `category`='Month' AND `sort` > 4 ORDER BY `sort` ASC LIMIT 4";
        $data5 = $dbF->getRows($sql5);
        // var_dump($data5);
        $i=1;
        foreach($data5 as $val){
 
            
            if($i==1){
                $bounce="bounceInLeft";
            }else if($i==2){
                $bounce="bounceInUp";
                
            }else{
                $bounce="bounceInRight";
                
            }
            
            
            $prodetAddOn = $val['prodet_addOn'];
            $validity = intval($val['validity']);
            $CheckExp = $functions->isProductExpired($prodetAddOn,$validity);
            if($CheckExp){
                $productName = unserialize($val['prodet_name']);
                $shortDesc = unserialize($val['prodet_shortDesc']);

                $prodetId = $val['prodet_id'];
                $productKey=key($productName);
                $name = $productName[$productKey];
                
                $productKeydsc=key($shortDesc);
                $shortDes = $shortDesc[$productKeydsc];

                $sql2 = "SELECT `propri_price` FROM `product_price_spb` WHERE `propri_prodet_id`=$prodetId";
                $data2 = $dbF->getRow($sql2);
                $price=$data2['propri_price'];

                $sql3 = "SELECT `setting_val` FROM `product_setting_spb` WHERE `p_id`=$prodetId AND `setting_name`='ldesc' LIMIT 1";
                $data3 = $dbF->getRow($sql3);
                $desc=getTextFromSerializeArray($data3['setting_val']);
                
                echo '
                 <div class="single_package wow '.$bounce.'">
            <div class="single_package_bg"></div>
            <div class="package_header">
              <h3>'.$name.'</h3>
              <h1>£'.$price.' <span>/mo</span></h1>
              <b><p>'.$shortDes.'</p></b>
            </div>

            <div class="package_body">
              '.$desc.'
            </div>

          <div class="package_footer">
                            <a href="javascript:void(0)" id="package_popup" class="btn_gradient_small buy-button" data-product-id="' . $prodetId . '">
                                <span class="start">Buy Now</span>
                                <span class="hover">Buy Now</span>
                            </a>
                        </div>
          </div>
                
                ';
                    
                }
                $i++;
        }
          
          ?>

        </div>
        <br>
<!--        <div class="sec6_inner flex_">-->
<!--        <div class="single_package wow bounceInLeft" style="visibility: visible; animation-name: bounceInLeft;">-->
<!--            <div class="single_package_bg"></div>-->
<!--            <div class="package_header">-->
<!--              <h3>Business packages</h3>-->
<!--            </div>-->

<!--            <div class="package_body">-->
<!--              <ul>-->
<!--	<li>If you require Picture/video editing services for your promotional requirements, kindly-->
<!--reach out to us. Our dedicated sales team will promptly respond to your inquiry.</li>-->
<!--	<li>Festivals and concerts for more than 500 guests.</li>-->
<!--</ul>-->

<!--            </div>-->

<!--          <div class="package_footer">-->
<!--                            <a href="javascript:void(0)" id="open_form" class="btn_gradient_small buy-button2" data-product-id="82">-->
<!--                                <span class="start">Make enquiry</span>-->
<!--                                <span class="hover">Make enquiry</span>-->
<!--                            </a>-->
<!--                        </div>-->
          </div>
      </div>
      </div>
          <div class="fixed_side"></div>
    <div class="package_popup">
        <div class="col5_close">
            <img src="webImages/close.png" alt="" class="hvr-pop">
        </div>
        <div class="standard">
            <div class="section_heading">
                <h1>Book your package</h1>
            </div>
            <form method="POST" action="orderInvoice.php" class="inner_form wow fadeInLeft">
                <!-- form flex -->
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="text" id="name_f1" name="pname" placeholder="Full Name" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- form flex -->
                      <input type="hidden" id="validity" name="validity" value="">
                              <input type="hidden" id="price" name="price" value="">
                              <input type="hidden" id="productId" name="productId" value="">
                              <input type="hidden" id="pName" name="pName" value="">
                
                <?php
                // echo 1;
                $login = $webClass->userLoginCheck();
                if(!$login) {
                
                ?>
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="email" id="email_f1" name="email" placeholder="Email Address" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
<?php
} 
?>
                <!-- form flex -->
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="number" id="pnumber_f1" name="mobile"
                                placeholder="Phone Number" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="text" id="eventname" name="eventname"
                                placeholder="Event Name" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="form_flex">
    <!-- 1 -->
    <div class="form_group">
        <div class="input_">
            <select class="effect-7" id="name_f1" name="type" required>
                <option value="" disabled selected>Event Type</option>
                <option value="Birthday">Birthday</option>
                <option value="Holy Day">Holiday</option>
                <!-- Add more options as needed -->
            </select>
            <span class="focus-border">
                <i></i>
            </span>
        </div>
    </div>
</div>
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="text" id="eventheadername" name="eventheadername"
                                placeholder="Event Page Header" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
            <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="date" id="eventdate" name="eventdate"
                                placeholder="Event Date" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <textarea class="effect-7" id="message_f1" name="message"
                                placeholder="Welcome Message"></textarea>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="text" id="name_f1" name="city" placeholder="City" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <textarea class="effect-7" id="message_f1" name="address"
                                placeholder="address"></textarea>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>

                

                <div class="form_btn">
                    <button class="btn_gradient_small">
                        <span class="start">Submit</span>
                        <span class="hover">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    
              <div class="fixed_side" id='fixed_side'></div>
              
    <div class="package_popup2" id="package_popup2">
    </div>
</div>


    <!-- Section 6 Ends-->
       <script>
  var openButton = document.getElementById("open_form");
  var packagePopupElement = document.getElementById("package_popup2");
  var fixedSideElement = document.getElementById("fixed_side");

  // Add a click event listener to the button
  openButton.addEventListener("click", function() {
    // Add the desired classes to the elements
    packagePopupElement.classList.add("package_popup2_");
    fixedSideElement.classList.add("fixed_side_");
  });

  
$(document).ready(function() {
    $("#open_form").click(function() {
        $.ajax({
            url: "form.php", // The URL of the form content
            method: "POST",
            dataType: "html",
            success: function(response) {
                $("#package_popup2").html(response); // Load the form content into the container
                //  modifyForm(); // Call the function to modify the form attributes
                // openPopup(); // Call the function to open the popup
            }
        });
    });
    
});
// function modifyForm() {
//     $(".fadeInLeft form").removeAttr("style"); // Remove the style attribute
// }
// function openPopup() {
//     $(".package_popup").show();
// }

// function closePopup() {
//     $(".package_popup").hide();
// }

    $('.buy-button').on('click', function() {
    //   console.log('Buy button is clicked.');
      var productId = this.getAttribute('data-product-id');
      

      $.ajax({
        type: 'POST',
        url: '<?php echo WEB_URL  ?>/_models/functions/products_ajax_functions.php?page=packageinfo',
        data: { productId: productId },
        dataType: 'json',
        success: function(response) {
            console.log(response);
        $('#validity').val(response['validity']);
        $('#price').val(response['price']);
        $('#productId').val(response['prodet_id']);
        $('#pName').val(response['pname']);
        //   console.log(response);
        },
        error: function() {
          console.error('Failed to fetch popup content.');
        }
      });
    });

  


    
    
     </script> 


<?php
return ob_get_clean();
}
?>