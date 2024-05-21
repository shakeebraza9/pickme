<?php include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;

$login = $webClass->userLoginCheck();
if (!$login) {
    header('Location: login');
    exit();
}



$msg = $webClass->webUserEditSubmit();
include("dashboard_header.php");

// var_dump($_SESSION);

$id = $_SESSION['webUser']['id'];
$userName=$functions->webUserName($id);
$username=$userName['acc_name'];
$encoded_username = base64_encode($username);
$currentDateTime = date('Y-m-d H:i:s');

$sql = "SELECT * FROM `orders` WHERE `order_user`=? AND `expire_date` >= ?";
$result = $dbF->getRows($sql, array($id, $currentDateTime));
?>
<style>
    .table {
    width: 95%;
    max-width: 100%;
    margin-bottom: 20px;
    margin-inline-start: 40px;
    font-size: -webkit-xxx-large;
}



h3 {
    text-align: center;
    padding: 17px;
    font-size: x-large;
    color: #173336;
}
th, td {
  text-align: left;
  padding: 10px;
  border: 1px solid #ccc;
}

th {
  background-color: #f0f0f0;
}

tr:nth-child(even) {
  background-color: #f8f8f8;
}

.table-responsive {
  max-width: 1000px;
  margin: 0 auto;
}
  .link-button {
    /* Add your desired button styles here */
      display: inline-block;
    padding: 5px 20px;
    background-color: #0aaec9ab;
    color: white;
    text-align: center;
    text-decoration: none;
    border: none;
    cursor: pointer;
    border-radius: 7px;
  }
  .link-button2 {
    /* Add your desired button styles here */
      display: inline-block;
    padding: 5px 20px;
    background-color: #0aaec9ab;
    color: white;
    text-align: center;
    text-decoration: none;
    border: none;
    cursor: pointer;
    border-radius: 7px;
  }

  .link-button a {
    /* Add styles for the link inside the button */
    color: white;
    text-decoration: none;
  }
  .link-button2 a {
    /* Add styles for the link inside the button */
    color: white;
    text-decoration: none;
  }

  .link-button:hover {
    /* Add styles for when hovering over the button */
    background-color: #272727;
  }
  .link-button2:hover {
    /* Add styles for when hovering over the button */
    background-color: #272727;
  }
  th, td {
    text-align: center;
  }
.view-button {
    background-color: #7e726d57;
    color: #ffffff;
    border: none;
    padding: 5px 14px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin-inline-start: 12px;
}
  .view-button:hover {
    background-color: #272727;
  }

  /* Styling for the SVG icon */
  .view-button svg {
    vertical-align: middle;
    margin-right: 5px;
    width: 16px;
    height: 16px;
  }
  button#shareButton_expired {
    background-color: #c91313;
}
p {
    text-align: center;
}
.event{
    width:160px;
    padding-top:10px;
    border-radius:15px;
    /*display:flex;*/
    margin-left:1250px;
    position:absolute;
    top:15px;
    
}
.event a{
    text-decoration:none;
}

</style>

<?php
if ($_SESSION['webUser']['usertypenew'] == 'Editor') {

echo'
<h3>Your Events</h3>
<div class="table_overflow">
<table class="table table-striped">
  <thead>
    <tr>
      <th>Sno</th>
      <th>User Name</th>
      <th>Total Images</th>
      <th>Date</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

';
$qry = "SELECT * FROM `final_img` WHERE `assigned_from`=?";
$data = $dbF->getRows($qry, array($id));
if($data){
    $i=1;
   foreach($data as $val) {
    $img=$val['images_path'];
    $package_id=$val['package_id'];
   $qry = "SELECT COUNT(*) as count FROM `uploaded_files` WHERE `product_id`=? ANd status=1";
    $data = $dbF->getRow($qry, array($package_id)); // Assuming getRow returns a single row
    $count = $data['count'];

    if($val['project_status']==NULL){
        $status="Not Select";
    }else if($val['status']==1){
        $status="Completed";
        
    }
    else{
        $status="Working";
        
    }
    $productID=$val['package_id'];
        echo'
          <tr>
        <td>'.$i.'</td>
        <td>'.$val['user_name'].'</td>
        <td>'.$count .'</td>
        <td>'.$val['date'].'</td>
        <td>'.$status.'</td>
        <td>
        <button class="view-button"><a href="'.WEB_URL.'/view?product_id='.base64_encode($productID).'&user_id='.base64_encode($id).'">&#128065;</a></button>
        </td>
      </tr>
    ';
$i++;
}
echo'  </tbody>
</table>
</div>';
}
}?>





<?php
if ($_SESSION['webUser']['usertypenew'] == 'Client') {
?>

<div class="main_heading">
    <h1>All Your Events</h1>
    <button class="event">
    <a href="<?php  echo WEB_URL.'/page-packages' ?>"><p>Add Another Event</p></a>
    </button>
    <!--<p>"Share this link with your friend and OTP as well. It contains valuable information that we believe they might find interesting or useful. Thank you!"</p>-->
</div>

<div class="table_overflow">
    <table class="table table-striped events_table">
  <thead>
    <tr>
      <th>Sno</th>
      <th>User Name</th>
      <th>Product Name</th>
      <th>Product type</th>
      <th>Event Name</th>
      <th>Purchase Date</th>
      <th>Expiry Date</th>
      <th>Price</th>
      <th>Status</th>
      <th>OTP</th>
      <th>Share link</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i=1;
   foreach($result as $row) {
//   $productID=intval($row['order_id']);
   $productID=$row['order_id'];
   $order_Id=$row['order_id'];
   $idNew=$row['product_id'];
 $date = date('d-M-Y', strtotime($row['order_date']));
 $exp = date('d-M-Y', strtotime($row['expire_date']));
   
    $qrytoken="SELECT pin FROM `order_detail` WHERE `order_id`=?";
    $datatoken = $dbF->getRow($qrytoken,array($productID));
    $pin =$datatoken['pin'];
   
    $sqlnn = "SELECT `event_name` FROM `event` WHERE `user_id`=? AND order_id=?";
    $datann = $dbF->getRow($sqlnn, array($id,$order_Id));
    @$event_name=$datann['event_name'];
    if(!$event_name && $event_name==NULL){
        $event_name="Picmee";
    }
   $sql1 = "SELECT prodet_name,packagetype FROM `proudct_detail_spb` WHERE `prodet_id`=?";

    $data = $dbF->getRow($sql1,array($idNew));
    
    $product = unserialize($data['prodet_name']);
    @$productName=$product['English'];

    $packagetype=$data['packagetype'];

    if($packagetype == 1){
        $packagType='Without Edit';
    }else{
        $packagType='With Edit';
        
    }
    
    
   $qry = "SELECT * FROM `final_img` WHERE `user_id`=? AND `package_id`=?";

    $dataSttaus = $dbF->getRow($qry,array($id,$order_Id));
    @$statusdata=$dataSttaus['project_status'];
        if($statusdata==NULL){
        $status="Pending";
    }else if($dataSttaus['status']==1){
        $status="Completed";
        
    }
    else{
        $status="Working";
        
    }
    if($statusdata != '1' && empty($dataSttaus['images_path'])){
      $linkntn="Share link";
      $btn="shareButton_new";
    }else{
       $linkntn="Expired link";
      $btn="shareButton_expired";
    }
    

   ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $username?></td>
        <td><?php echo $productName ?></td>
        <td><?php echo $packagType ?></td>
        <td><?php echo $event_name ?></td>
        <td><?php echo $date ?></td>
        <td><?php echo $exp ?></td>
        <td><?php echo $row['price_per_month']; ?> € </td>
        <td><?php echo $status; ?></td>
        <td><?php echo $pin?></td>
        <td><button class="link-button" id="<?php echo $btn?>"data-userid="<?php echo base64_encode($id)?>" data-productid="<?php echo base64_encode($productID)?>"><?php echo $linkntn?></button>
        </td>
        <td class="btn-main"><?php  
        
        // if($statusdata == NULL){
        
        echo '
        <button class="link-button2"><a href="'.WEB_URL.'/guestlogin.php?user_id='.base64_encode($id).'&proid='.base64_encode($productID).'">View link</a></button>';
        // }
        echo'<button class="view-button"><a href="'.WEB_URL.'/view?product_id='.base64_encode($productID).'&user_id='.base64_encode($id).'">&#128065;</a></button>';
        ?></td>
      </tr>
    <?php 
    $i ++;
    } ?>
  </tbody>
</table>
</div>

<?php
}
?> 


<script>
document.addEventListener("DOMContentLoaded", function() {
    const shareButtons = document.querySelectorAll(".link-button");

    shareButtons.forEach(shareButton => {
        shareButton.addEventListener("click", function() {
            const encodedUserId = this.getAttribute("data-userid");
            const encodedProductId = this.getAttribute("data-productid");

            const baseUrl = '<?php echo WEB_URL?>'; // Replace with your actual base URL
            const url = `${baseUrl}/guestlogin.php?user_id=${encodedUserId}&proid=${encodedProductId}`;

            copyToClipboard(url);
            this.innerHTML = 'Link copied';
        });
    });

    function copyToClipboard(text) {
        const dummyInput = document.createElement("textarea");
        document.body.appendChild(dummyInput);
        dummyInput.value = text;
        dummyInput.select();
        document.execCommand("copy");
        document.body.removeChild(dummyInput);
    }
});
</script>


    <?php include("dashboard_footer.php"); ?>