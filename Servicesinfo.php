<?php

include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;


$pageid=base64_decode($_GET['pageid']);
include("header_new.php");

if($pageid){
   $sql =   "SELECT * FROM gallery WHERE `publish`='1' AND gallery_pk =? ";
             $data =   $dbF->getRows($sql,array($pageid));
             foreach($data as $val){
                $galleryId=$val['gallery_pk'];
                $albumName=$val['album'];
                $description=$val['description'];
                 $sql2 =   "SELECT * FROM gallery_images WHERE `gallery_id`= ? ";
                $data2 =   $dbF->getRows($sql2,array($galleryId));
                 foreach($data2 as $row){
                     $img=$row['image'];
                     echo'
                             <!-- Section 3 -->
        <div class="main_section section3 inner_main_page" style="padding: 6rem 0">
            <div class="section_heading">
                
                <!--<p>Inspired by innovation. Committed to excellence.<br> Join our journey.</p>-->
            </div>
            <div class="standard">
                <div class="sec3_inner flex_" style="justify-content: space-between">
                    <div class="leftFlex wow bounceIn" style="width: 40%">
                        <img src="'.WEB_URL.'/uploads/'.$img.'" alt="Image Edit" />
                    </div>
                    <div class="rightFlex wow slideInRight">
                        <div class="section_subheading">
                            <h1>'.$albumName.'</h1>
                        </div>

                        <div class="txtHolder">';
                        if($description){
                            echo'
                            <p>
                            '.$description.'
                            </p>
                            
                            ';
                        }else{
                           echo'
                            <p>
                            Description are not set....
                            </p>
                            
                            '; 
                        }
                            
                echo'    
                        </div>

                        <div class="btnHolder">
                    
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg_shape">
                <img src="webImages/bg-shape-1.png" alt="" class="style-shape fbs-1">
                <img src="webImages/bg-shape-2.png" alt="" class="style-shape fbs-2">
            </div>
        </div>
        <!-- Section 3 Ends-->
                     ';
                     
                 }
             }  
}

?>





<?php include("footer_new.php"); ?>