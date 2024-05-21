<?php
include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;

$id = $_SESSION['webUser']['id'];
$acc_Type = $_SESSION['webUser']['usertypenew'];

if ($acc_Type == 'Editor') {
    $qry = "SELECT * FROM editor_upload WHERE editor_id = $id AND `status`= '1' ";
    $eData = $dbF->getRows($qry);
    @$images = $eData['image_path'];

    $url = WEB_URL;

    $i = 1;
    if ($dbF->rowCount > 0) {
        $html = array();
        foreach ($eData as $val) {
            $name = 'Image ' . $i;
            $image = $val['image_path'];
  $html[] = '<div ><img class="img_edi" src="' . $url . "/" . $image . '"></div>
          
        ';



            $i++;
        }

        echo json_encode($html);
    }
} else {
       $qry = "SELECT * FROM uploaded_files WHERE account_id = '$id' && `Status`= '$project_Status' ORDER BY id ASC";
        $url = WEB_URL;
        $eData = $dbF->getRows($qry);
$html=array();
        $i = 1;
        foreach ($eData as $key => $val) {
            $img    = $val['file_path'];
            $imgId  = $val['id'];
            $name   = $val['file_name'];

            if (empty($name)) {
                $name = 'Image ' . $i;
            }
$html[]='<img src="' . $url . "/uploads/" . $img . '" alt="' . $name . '">';
   

            $i++;
        }
        
        echo json_encode($html);

    }

