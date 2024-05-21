<?php
ob_start();
include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;
?>

        <!-- Section 1 -->
    <div class="main_section section1">
      <div class="standard">
        <div class="section_heading">
        <?php $box6 = $webClass->getBox('box6'); ?>
          <h1>ONLINE SEVICES PICTURE ARCHIVE</h1>
          <p>
              <?php echo $box6['linkText']; ?>
          </p>
        </div>
        <div class="inner_services">
          <div class="inner_services_flex"> 
              
        <?php
             $sql =   "SELECT * FROM gallery WHERE `publish`='1' ";
             $data =   $dbF->getRows($sql);
             foreach($data as $val){
                $cardId=$val['gallery_pk'];
                $cardIdDecode=base64_encode($cardId);
                $galleryId=$val['gallery_pk'];
                $albumName=$val['album'];
                $sql2 =   "SELECT * FROM gallery_images WHERE `gallery_id`= ? ";
                $data2 =   $dbF->getRows($sql2,array($galleryId));
                 foreach($data2 as $row){
                     $imgPath=$row['image'];
                      echo'
                        <div class="swiper-slide">
                      <div class="single_main_card wow bounceInLeft">
                        <div class="card_img">
                          <img data-original="'.WEB_URL.'/uploads/'.$imgPath.'" src="webImages/placeholder.gif"
                            alt="wedding_photoshoot" class="lazy" />
                        </div>
                        <div class="card_body">
                          <div class="card_txt">
                            <h4>'.$albumName.'</h4>
                          </div>
        
                          <div class="card_btn">
                            <!-- <a href="#">View More <i class="fa-solid fa-arrow-right"></i></a> -->
                           <a href=" '.WEB_URL.'/Servicesinfo.php?pageid='.$cardIdDecode.'" class="btn_gradient_small">
                              <span class="start">View More</span>
                              <span class="hover">View More</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>';
             } 
                 
             }     
              ?>
              

          </div>

          <div class="swiper-button-next section_controller"></div>
          <div class="swiper-button-prev section_controller"></div>
          <!-- <div class="swiper-pagination"></div> -->
        </div>
      </div>

      <!-- bg shape -->
      <div class="bg_shape">
        <!--<img src="webImages/bg-shape-1.png" alt="" class="style-shape fbs-1" />-->
        <img src="webImages/bg-shape-2.png" alt="" class="style-shape fbs-2" />
      </div>
    </div>
    <!-- Section 1 Ends-->

<?php
return ob_get_clean();
?>