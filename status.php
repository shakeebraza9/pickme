<?php
include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;

                $id = $_SESSION['webUser']['id'];
                $acc_Type = $_SESSION['webUser']['usertypenew'];
                @$proID=$_POST['proId'];

// $qry2 = "Update * FROM uploaded_files WHERE account_id = $id AND 'status'= 1 ";
// $Data = $dbF->getRow($qry2);

                // $sql_up = "UPDATE uploaded_files SET `status` = '0' WHERE `status` = '1' AND account_id = ?";
                //     $array = array($id);
                //     $dbF->setRow($sql_up, $array, false);
                $sql = "UPDATE final_img SET `status` = '1'  WHERE user_id = ? AND package_id=? ";
                $array = array($id,$proID);
                $dbF->setRow($sql, $array, false);
                include('dashboard_header.php');
                if($dbF->rowCount>0){
  ?>
    <script>
          alertify.alert("Project has been finish successfully!", function () {

    history.back();
  });
  </script>
                <?php
}else{
?>
    <script>
          alertify.alert("Something went wrong with your upload!", function () {

    history.back();
  });
  </script>
<?php
}
        include('dashboard_footer.php'); 
?>