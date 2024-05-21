<?php
include_once("global.php");
global $webClass;
$pMmsg = '';
$contactAllow = true;

// print_r($_POST);
// exit;

// include("inner_header.php");
$rrr = explode(":", $_GET['sid']);

// $dbF->prnt($rrr);




?>
<div class="standard">
<div class="popup_main_">
<div class="popup_nav">
<div class="popup_close_btn">
<a href="#">
<div class="popup_btn">
<img src="webImages/product/11.png" alt="">
</div>
</a>
</div>
</div> <!-- close popup_nav -->
<div class="order_end">
<div class="step1">
<h1>Conform Your Service</h1>
<!-- <img src="webImages/atten.png" alt=""> -->
<!-- <h2>Follow The Below Steps To Fill The Form</h2>
<p>Step 1 - To Get the <span>Seller Account Display Name<br>
Go To Settings -> Account Info</span></p> -->
<!-- <img src="webImages/step1.png" alt=""> -->
</div>
<!-- <div class="step2">
<p>Step 2 - To Get the <span>Legal Business Name<br>
Go To Settings -> Account Info -> Legal Entity</span></p>
<img src="webImages/step2.png" alt="">
<img src="webImages/step3.png" alt="">
</div> -->
<!-- <div class="step3">
<p><span>****** DO NOT MISS THIS STEP ******</span></p>
<p>Step 3 - Send Both Seller Account Name Page & Legal Entity Details Page<br>Screenshots As An Email To <span>info@amazonproservices.com</span><br>
With The Subject "Seller Account Name - Category Name"</p>
<p><span>****** DO NOT MISS THIS STEP ******</span></p>
<p>Step 3 - Send Both Seller Account Name Page & Legal Entity Details Page<br>Screenshots As An Email To <span>info@amazonproservices.com</span><br>
With The Subject "Seller Account Name - Category Name"</p>
</div> -->
<div class="step4_form">
<!-- <p><span>The Funnel Guru - Amazon Ungating Service</span></p>
<p>Please Fill this Form to Get it Ungated in the restricted categories. You can choose Misc, if you don't see<br>your category name and then fill the comments section too.</p> -->
<div class="step4">
<div class="ungating">
<!-- <div class="col9_right">
<div class="col9_right_head">
<h2>Questions? <span>Chat With Us</span></h2>
<h2>OR email: info@amazonproservices.com</h2>
</div>
<div class="right_mid">
<h4>Package List</h4>
<h5>Offer Price</h5>
</div>
<div class="product_list"> -->
<!-- <ul>
<li>
<div class="right_in_">
<label><input type="radio" name="contact">
Grocery & Gourmet Foods</label>
</div>
<div class="pro_price">
<h6>$499.00</h6>
</div>
</li>
</ul> -->
<!-- </div>
</div> -->
<div class="final_form">
<!-- <p>Have you ever tried to submit documents to amazon on your own? If yes, forward the documents to info@amazonproservices.com after completing this form *</p> -->
<!-- <form>
<div class="right_in_">
<label><input type="radio" name="contact">
Yes, Rejected</label>
</div>
<div class="right_in_">
<label><input type="radio" name="contact">
No, Never Tried</label>
</div>
</form> -->
<div class="order_form">
<h3>

<?php $echo = explode("^^",  $rrr[2]);
echo str_replace("___", " ", $echo[1]); 



 ?>
 	
(
USD 

<?php $echo = explode("^^",  $rrr[1]);
echo  $echo[1]; 



 ?>)





 </h3>
<div class="col9_right_in">
<form  method="post" autocomplete="off">
<?php $functions->setFormToken('orderSubmit'); ?>
<div class="col6_form_box">
<label>Name <span>*</span></label>
<input type="text" name="form[Buyer name]" required="">
<input type="hidden" name="form[sName]" value="<?php $echo = explode("^^",  $rrr[2]);
echo str_replace("___", " ", $echo[1]); 



 ?>" required="">
<input type="hidden" name="form[amount]" value="PKR<?php $echo = explode("^^",  $rrr[1]);echo  $echo[1];?>" required="">
</div>


<div class="col6_form_box">
<label>Email Address <span>*</span></label>
<input type="text" required name="form[Buyer email]">
</div>



<div class="col6_form_box">
<label>Contact</label>
<input type="text" name="form[Buyer contact]">
</div>

<div class="col6_form_box">
<label>Country</label>
<input type="text" name="form[Buyer country]">
</div>


<div class="col6_form_box">
<label>City</label>
<input type="text" name="form[Buyer city]">
</div>


<div class="col6_form_box">
<label>Address</label>
<textarea name='form[Buyer address]'></textarea>
</div>



<div class="col6_form_box">
<!-- <label>City</label> -->
<input type="submit" name="submit" value="SUBMIT INFORMATION">
</div>






</form>
</div>
<!-- col9_right_in close -->
</div>
<!-- <div class="btn_main">
<a href="#">SUBMIT INFORMATION
</a>
</div> -->
</div>
</div>
</div>
</div>
</div> <!-- close col12_main -->
</div>
<!-- close popup_main_ -->

<script type="text/javascript">
	$('.popup_close_btn').click(function() {

     console.log('asdasdasdasdsd');

     
    $('.popup_main').removeClass('popup_main_1');
    $('.fixed_side').removeClass('fixed_side_');
});
</script>
</div>

