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
    exit();
}

$msg = $webClass->webUserEditSubmit();
include("header.php");
$id = $_SESSION['webUser']['id'];
?>
<style>
#dropbox {
    background: url(http://localhost/LushLeather/images/background_tile_3.jpg);
    /* background: url(https://localhost/LushLeather/images/backimg.jpg); */
    border-radius: 10px;
    position: relative;
    min-height: 290px;
    overflow: hidden;
    padding-bottom: 40px;
}
.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

/* Styles for the modal content */
.modal-content {
  background-color: #fff;
  width: 530px;
  padding: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 5px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}
#cod-form textarea {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 3px;
  resize: vertical; /* Allow vertical resizing of the textarea */
  min-height: 80px; /* Minimum height of the textarea */
}

/* Styles for the form inside the modal */
#cod-form {
  display: flex;
  flex-direction: column;
}

/* Styles for the form labels */
#cod-form label {
  margin-top: 10px;
  font-weight: bold;
}

/* Styles for the form input fields */
#cod-form input {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

/* Styles for the submit button */
#cod-form button[type="submit"] {
  margin-top: 20px;
  padding: 10px;
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

/* Styles for the close button */
.close-button {
  margin-top: 5px;
  padding: 5px;
  background-color: #d51111;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  margin-inline-start: 441px;
}

.gallery-container {
    display: flex;
    justify-content: left;
}
.upload-button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: blac solid;
    border-radius: 5px;
    cursor: pointer;
    width: 77px;
    height: 36px;
    margin-top: 8px;
}
.thumbnails {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

img {
    aspect-ratio: 1;
    -o-object-fit: cover;
    object-fit: cover;
    border-radius: 0.3rem;
}

.thumbnails img {
    width: 283px;
    /*height: 150px;*/
    height: 164px;
    cursor: pointer;
}

.scrollbar {
       width: 2px;
    height: auto;
    background: #ccc;
    display: block;
    margin: -2px 4px 3px 8px
   
   
    /*width: 1px;*/
    /*height: 520px;*/
    /*background: #ccc;*/
    /*display: block;*/
    /*margin: 0 0 0 8px;*/
}

.thumb {
    width: 1px;
    position: absolute;
    height: 0;
    background: #000;
}

.slides {
    margin: -17px 37px;
    display: grid;
    grid-auto-flow: row;
    gap: 1rem;
    width: calc(540px + 1rem);
    padding: 0 0.25rem;
    /*height: 520px;*/
    overflow-y: auto;
    overscroll-behavior-y: contain;
    scroll-snap-type: y mandatory;
    scrollbar-width: none;
}

.slides>div {
    scroll-snap-align: start;
}

.slides img {
    width: 540px;
    object-fit: contain;
}

.slides::-webkit-scrollbar {
    display: none;
}

.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

* {
    margin: 0;
    padding: 0;
}

input,
button,
select,
textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}

.form-horizontal .form-group {
    margin-right: -15px;
    margin-left: -15px;
}

#dropbox .preview {
    width: 235px;
    height: 220px px;
    float: left;
    margin: 30px 0 0 20px;
    position: relative;
    text-align: center;
    padding: 4px;
    background: #eee;
}

#dropbox .preview {
    width: 235px;
    height: 220px;
    float: left;
    margin: 30px 0 0 20px;
    position: relative;
    text-align: center;
    padding: 4px;
    background: #eee;
}

#dropbox .preview img {
    max-width: 225px;
    max-height: 165px;
    border: 3px solid #fff;
    display: block;
    box-shadow: 0 0 2px #000;
}

#dropbox .uploaded {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: url(https://localhost/LushLeather/myAdmin/ajaxFileUpload/img/done.png) no-repeat center center rgba(255, 255, 255, 0.5);
    display: none;
}

#dropbox .preview.done .progress {
    width: 100% !important;
    background: #87BA41;
    height: 20px;
}

#dropbox .imageHolder {
    display: inline-block;
    position: relative;
}

#dropbox .progressHolder {
    position: absolute;
    height: 40px;
    width: 100%;
    left: 0;
    bottom: 0;
}


/* Example CSS styles for the images */
.image-container {
    display: inline-block;
    margin: 10px;
    border: 1px solid #ccc;
    padding: 5px;
    width: 235px;
    height: 220px;
    /* float: left; */
    margin: 30px 0 0 20px;
    position: relative;
    text-align: center;
    padding: 4px;
    background: #eee;
}

.main-container {
    border: 1px solid #F2F2F2;
    margin-bottom: 40px;
    padding: 12px;
    
}


.image-container img {
    max-width: 100%;
    height: auto;

}

.submit-button {
    /* margin-top: 261px; */
    margin-inline-start: 40%;
    background-color: #224f56;
    /* Green background color */
    color: white;
    /* Text color */
    border: none;
    /* Remove border */
    padding: 10px 20px;
    /* Add padding */
    cursor: pointer;
    /* Add a pointer cursor on hover */
    font-size: 16px;
    /* Font size */
    border-radius: 5px;
    /* Rounded corners */
}

#load-images-button {
    background: darkgreen;
    padding: 4px;
    color: white;
    border-radius: 2%;
    text-align: right;
    margin-inline-start: 76.5%;
    margin-top: 8px;

}

.Decline-button {
    background-color: #9d0505;
    /* Green background color */
    color: white;
    /* Text color */
    border: none;
    /* Remove border */
    padding: 10px 20px;
    /* Add padding */
    cursor: pointer;
    /* Add a pointer cursor on hover */
    font-size: 16px;
    /* Font size */
    border-radius: 5px;
    /* Rounded corners */
}

/* Apply additional styles on hover */
.submit-button:hover {
    background-color: #45a049;
}

.custom-input {
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    padding: 8px;
    border-radius: 4px;
}

.custom-button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.all-btn {
    display: inline-grid;
    justify-content: right;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
}

.chat-box {
    width: 50%;
    height: 300px;
    border: 1px solid #ccc;
    overflow-y: scroll;
    padding: 10px;
    background-color: #fdfafa94;
    margin-inline-start: 388px;
    margin-bottom: 39px;
     background-image: url(http://localhost/LushLeather/images/backimg.jpg);
    /*opacity: 0.5; */
}

.chat-message {
    margin-bottom: 10px;
}

.chat-message {
      padding: 13px;
    margin-top: 40px;
    border: #c39c9c73 solid 1px;
    background-color: #ffddda00;
    margin-right: 0%;
    border-radius: 1px;
    color: white;

}



textarea {

    resize: none;
    padding: 20px;
    height: 130px;
    width: 100%;
    border: 1px solid #F2F2F2;
}

.time-message {
    margin-inline-start: 90%;
}

h1 {
    text-align: center;
}

.link-button {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #77f0ff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.image-container:hover {
    border: 1px solid #777;
        cursor: pointer;
        opacity: 0.5;
    
}

.btn_combine{
        /*margin-inline-start: 400px;*/
        display: table;
        margin-top: 62px;
}
.img_edi{
    width: 285px;
    height: 100%;
    cursor: pointer;
}
.main{
    display: grid;
    margin-inline-start: 4px;
}
.slides2{
    display: flex;
    /*flex-direction: column;*/
     width: 100%;
    height: 164px;

    overflow-x:auto;
    gap: 8px;
    
}

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        /* Styling for alternate table rows */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Styling for the image container */
        #image-container2 {
            /* Add your styles for the image container here */
        }
.main_heading {
    margin: 10px;
    display: flex;
    border-bottom: 2px solid #ccc;
    margin-bottom: 3px;
}
h3.edit_images {
    margin-inline-start: 147px;
}
button#updateButton {
    background-color: red;
    color: white;
    padding: 5px;
    border: none;
    border-radius: 5px;
}
.custom-select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: white;
    color: #333;
    margin-top: 4px;
}

.custom-select option {
  font-size: 16px;
  background-color: white;
  color: #333;
}
.modal {
  /* Other styles for the modal */
  overflow-y: auto; /* Add a vertical scrollbar when content overflows */
}

.modal-content {
  /* Other styles for the modal content */
  max-height: 80vh; /* Set a maximum height for the modal content */
  padding: 20px; /* Adjust padding as needed */
}
</style>
<!--Inner Container Starts-->


<h1>User Name : <?php echo $_SESSION['webUser']['name'] ?></h1>
<h1><a href=logout.php>logout</a></h1>
<?php
if ($_SESSION['webUser']['usertypenew'] == 'Editor') {
// echo'<button class="link-button"><a href="'.WEB_URL.'/dashboard">Dashboard</a></button>';
header('Location: dashboard.php');
}

?>




<?php
if ($_SESSION['webUser']['usertypenew'] == 'Client') {
echo'<button class="link-button"><a href="'.WEB_URL.'/dashboard">Dashboard</a></button>';
         $sql = "SELECT * FROM `proudct_detail_spb` WHERE `product_update`='1' AND `category`='Month' LIMIT 3";
        $data = $dbF->getRows($sql);


echo '<div class="product-card-main">';

foreach ($data as $key => $val) {
    $prodetAddOn = $val['prodet_addOn'];
    $validity = intval($val['validity']);
    $CheckExp = $functions->isProductExpired($prodetAddOn,$validity);

  
    if($CheckExp){
        $productName = unserialize($val['prodet_name']);
        $productDsc = unserialize($val['prodet_shortDesc']);
        $prodetId = $val['prodet_id'];
        $productKey=key($productName);
        $name = $productName[$productKey];
        $description = $productDsc[$productKey];
        
        
        
        $sql2 = "SELECT `propri_price` FROM `product_price_spb` WHERE `propri_prodet_id`=$prodetId";
        $data2 = $dbF->getRow($sql2);

        
        $sql3 = "SELECT `image` FROM `product_image_spb` WHERE `product_id`=$prodetId LIMIT 1";
        $data3 = $dbF->getRow($sql3);
   
        if($data3){
        $img=$data3['image'];
        }
  
        
        echo '
            <div class="product-card">';
            if($data3){
             echo'   <img src="'.WEB_URL.'/uploads/'.$img.'" alt="Product Image not set">';
            }
            echo'    <h2 class="product-title">' . $name . '</h2>
                <p class="product-description">' . $description . '</p>';
                if($data2){
                echo'<div class="product-price">£'.$data2['propri_price'].'</div>';
}else{
                echo'<div class="product-price">Price Not Set</div>';
    
}
       if ($login && $data2) {
    // echo "<button class='add-to-cart buy-button' data-product-id='" . $prodetId . "'>Buy</button>";
    echo "<button id='buyButton' class='add-to-cart buy-button' onclick='openModal()' data-product-id='" . $prodetId . "'>Buy</button>";

}

        echo '</div>';
}
}

echo '</div>';

?>


<div id="cod-modal" class="modal">
  <div class="modal-content">
    <button onclick="closeModal()" class="close-button">Close</button>
    <h2>Cash on Delivery (COD) Information</h2>
    <form id="cod-form" method="POST" action="orderInvoice.php">
      <label for="name">Name:</label>
      <input type="text" id="name" name="pname" required>
 
        <label for="name" >Event Type</label>     
        <select class="custom-select" name="type">
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
        </select>
     
      <label for="name">Event Name:</label>
      <input type="text" id="name" name="eventname" required>
      
      <label for="name">Event Page Header:</label>
      <input type="text" id="name" name="eventheadername" required>
      
      <label for="address">WellCome Message:</label>
      <textarea id="address" name="message" required></textarea>
      
      <label for="name">Date of Event:</label>
      <input type="date" id="name" name="eventdate" required>

        <label for="mobile">Mobile Number:</label>
      <input type="tel" id="mobile" name="mobile" required>

    <label for="city">city:</label>
      <input type="text" id="city" name="city" required>



      <label for="address">Address:</label>
      <textarea id="address" name="address" required></textarea>
      




          <input type="hidden" id="validity" name="validity" value="">
      <input type="hidden" id="price" name="price" value="">
      <input type="hidden" id="productId" name="productId" value="">
      <input type="hidden" id="pName" name="pName" value="">

      <button type="submit">Place Order</button>
    </form>
    
  </div>
</div>

    <?php
}
    ?>


    <script>
  
    // console.log('JavaScript code is loaded.');

    $('.buy-button').on('click', function() {
    //   console.log('Buy button is clicked.');
      var productId = this.getAttribute('data-product-id');

      $.ajax({
        type: 'POST',
        url: '<?php echo WEB_URL  ?>/_models/functions/products_ajax_functions.php?page=packageinfo',
        data: { productId: productId },
        dataType: 'json',
        success: function(response) {
        $('#validity').val(response['validity']);
        $('#price').val(response['price']);
        $('#productId').val(response['prodet_id']);
        $('#pname').val(response['validity']);
        //   console.log(response);
        },
        error: function() {
          console.error('Failed to fetch popup content.');
        }
      });
    });

  


    
    
     </script>





    <?php include("footer.php"); ?>