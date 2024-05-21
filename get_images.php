<?php
include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;

$id = $_SESSION['webUser']['id'];
$acc_Type = $_SESSION['webUser']['usertypenew'];
$productId=$_POST['productId'];
if ($acc_Type == 'Editor') {
    $qry = "SELECT * FROM final_img WHERE assigned_from = $id AND package_id=$productId";
    $eData = $dbF->getRow($qry);
    // var_dump($eData);


    @$project_Status = $eData['project_status'];
    @$acc_id = $eData['user_id'];
    @$publish = $eData['publish'];

        $qry2 = "SELECT * FROM uploaded_files WHERE account_id = $acc_id && product_id=$productId AND `Status`= '$project_Status'  ORDER BY id ASC";
        $url = WEB_URL;
        $imgData = $dbF->getRows($qry2);
        $html = array();

    
  
    

    $i = 1;
    if ($dbF->rowCount > 0) {
        $html = array();
        foreach ($imgData as $val) {
        $imgurl=$val['file_path'];
        
            $img_Id=$val['id'];
            $imgType  = $val['file_type'];
                if($imgType=='image'){
                //   $typOfData='<video id="img_user" src="'.$url.'/uploads/'.$imgurl.'" data-img="'.$img_Id.'" width="300" height="180" controls></video>';
                  $typeOfData='<a data-fancybox="selected_image_for_editor" href="' . $url . "/uploads/" . $imgurl . ' ">
                  <img id="img_user" src="'.$url.'/uploads/'.$imgurl.'" data-img="'.$img_Id.'"></a>';  
                }else{
                  $typeOfData='
                 
                  <a class="thumb_link" href="' . $imgurl . ' "title="'.$imgurl.'" target="_blank" data-img="'.$img_Id.'" data-link="'.$img_Id.'">
                </a>

                  ';
                    
                }



  $html[] = $typeOfData;


            $i++;
        }

        echo json_encode($html);
    }
} else {

    $qry2 = "SELECT * FROM final_img WHERE user_id = $id AND package_id=$productId";
    $Data = $dbF->getRow($qry2);
    
    @$project_Status = $Data['project_status'];
    @$publish = $Data['publish'];
    if ($project_Status == 1 && $publish == 1) {
        $qry = "SELECT * FROM uploaded_files WHERE account_id = '$id' && product_id =$productId && `Status`= '$project_Status'  ORDER BY id ASC";
        $url = WEB_URL;
        $eData = $dbF->getRows($qry);
        $html = array();
        $i = 1;
        foreach ($eData as $key => $val) {
            $img    = $val['file_path'];
            $imgId  = $val['id'];
            $name   = $val['file_name'];
            $imgType  = $val['file_type'];
            
             if (empty($name)) {
                $name = 'Image ' . $i;
            }
                if($imgType=='image'){
                //   $typOfData='<video id="img_user" src="'.$url.'/uploads/'.$imgurl.'" data-img="'.$img_Id.'" width="300" height="180" controls></video>';
                  $typeOfData='<a data-fancybox="selected_image_for_editor" href="' . $url . "/uploads/" . $img . ' ">
                  <img id="img_user" src="'.$url.'/uploads/'.$img.'" data-img="'.$name.'"></a>';  
                }else{
                  $typeOfData='
                 
                  <a class="thumb_link" href="' . $img . ' "title="'.$img.'" target="_blank">
                </a>

                  ';
                    
                }
            // $allowed_video_ext = array('mp4', 'mp5', 'webm');
            //     if(in_array($file_extension,$allowed_video_ext)){
            //       $typOfData='<video src="'.$url.'/uploads/'.$img.'" data-image="'.$name.'" width="300" height="180" controls></video>';  
            //     }else{
            //       $typOfData='<img src="'.$url.'/uploads/'.$img.'" data-image="'.$name.'">';  
                    
            //     }

           

            $html[] =$typeOfData;
            // $html[] = '
            // <a data-fancybox="selected_image_for_editor" href="' . $url . "/uploads/" . $img . ' ">
            // ' . $typOfData . '</a>';
        
  

            $i++;
        }
      
        echo json_encode($html);
        // echo "10";
    } else{
        $qry = "SELECT * FROM uploaded_files WHERE account_id = '$id' && product_id=$productId && `Status`= '$project_Status'  ORDER BY id ASC";
        $url = WEB_URL;
        $eData = $dbF->getRows($qry);
        $html=array();
        $i = 1;
        foreach ($eData as $key => $val) {
            $img    = $val['file_path'];
            $file_extension = pathinfo($img, PATHINFO_EXTENSION);
            $imgId  = $val['id'];
            $name   = $val['file_name'];
                        $allowed_video_ext = array('mp4', 'mp5', 'webm');
                if(in_array($file_extension,$allowed_video_ext)){
                  $typOfData='<video src="'.$url.'/uploads/'.$img.'" data-image="'.$name.'" width="300" height="180" controls></video>';  
                }else{
                  $typOfData='<img src="'.$url.'/uploads/'.$img.'" data-image="'.$name.'">';  
                    
                }

            if (empty($name)) {
                $name = 'Image ' . $i;
            }
$html[]=$typOfData;

            $i++;
        }
        echo json_encode($html);
        // echo "100";
        
        
    }
   
}
