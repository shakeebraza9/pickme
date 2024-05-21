<?php
include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;



include("header_new.php");
 
?>
<style>
    button{
        width:100px;
        height:50px;
    }
    
    .single_package.wow.bounceInLeft{
        margin: 20px;
        height: 620px;
        width:300px;
    }
    .single_package.wow.bounceInUp{
        margin: 20px;
        height: 620px;
        width:300px;
    }
    .single_package.wow.bounceInUp{
         margin: 20px;
         height: 620px;
         width:300px;
    }
    .single_package.wow.bounceInRight{
         margin: 20px;
         height: 620px;
         width:300px;
         
    }
    /*.btn_main{*/
    /*    display:flex;*/
    /*}*/
</style>



<div class="main_section main_banner">
      <div class="rev_slider_inner">
        <!-- START REVOLUTION SLIDER 5.1.1RC auto mode -->
        <div class="rev_slider_inner">
          <ul>
            <li>
              <!-- <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat"
                data-no-retina="" src="webImages/banner/example3.webp" /> -->
                <?php $functions->includeOnceCustom('banner.php');?>
            
            </li>
          </ul>
          <div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25)"></div>
        </div>
      </div>

      <!-- Banner Overlay -->
      <div class="banner_overlay">
        <div class="banner_text">
          <div class="banner_img wow fadeInDownBig">
            <!-- <img src="webImages/Logo.png" alt=""> -->
            <svg id="Layer_1" class="banner_SVG" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
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
              <path class="cls-1" d="M199.35,157.37a31.61,31.61,0,0,0-18.09,18.22l-17.37,10a46.76,46.76,0,0,1,20-37.2Z"
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

          <h1 class="wow fadeInUpBig">
            Preserve your memories eternally with Picmee.
          </h1>
        </div>
      </div>
    </div>
    
    
    <div class="bottom_overlay">
      <div class="standard">
        <div class="inner_banner">
          <div class="single_counter wow bounceInLeft">
            <div class="icnHolder">
              <i class="fa fa-eye-dropper"></i>
            </div>
             <div class="txtHolder">
            <?php $box2 = $webClass->getBox('box2'); ?>
                <h3><?php echo $box2['heading']; ?></h3>
                <span class="counter"><?php echo $box2['heading2']; ?></span>
              </div>
          </div>
          <div class="single_counter wow bounceInUp">
            <div class="icnHolder">
              <i class="fa fa-user"></i>
            </div>
            <div class="txtHolder">
                <?php $box3 = $webClass->getBox('box3'); ?>
              <h3><?php echo $box3['heading']; ?></h3>
              <span class="counter"><?php echo $box3['heading2']; ?></span>
            </div>
          </div>
          <div class="single_counter wow bounceInUp">
            <div class="icnHolder">
              <i class="fa fa-user-pen"></i>
            </div>
            <div class="txtHolder">
                <?php $box4 = $webClass->getBox('box4'); ?>
              <h3><?php echo $box4['heading']; ?></h3>
              <span class="counter"><?php echo $box4['heading2']; ?></span>
            </div>
          </div>
          <div class="single_counter wow bounceInRight">
            <div class="icnHolder">
              <i class="fa fa-ribbon"></i>
            </div>
            <div class="txtHolder">
                <?php $box5 = $webClass->getBox('box5'); ?>
              <h3><?php echo $box5['heading']; ?></h3>
              <span class="counter"><?php echo $box5['heading2']; ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    
        <!-- Section 1 -->
    <div class="main_section section1">
      <div class="standard">
        <div class="section_heading">
        <?php $box6 = $webClass->getBox('box6'); ?>
          <h1><?php echo $box6['heading']; ?></h1>
          <p>
              <?php echo $box6['linkText']; ?>
          </p>
        </div>
        <div class="swiper mySwiper section1_slider">
          <div class="swiper-wrapper">
              
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
        <img src="webImages/bg-shape-1.png" alt="" class="style-shape fbs-1" />
        <img src="webImages/bg-shape-2.png" alt="" class="style-shape fbs-2" />
      </div>
    </div>
    <!-- Section 1 Ends-->
    
    
        <!-- Section 2 -->
    <div class="main_section section2">
      <div class="standard">
        <div class="sec2_inner flex_">
          <div class="leftFlex wow bounceInLeft" style="width: 60%">
              <?php $box7 = $webClass->getBox('box7');?>
            <h1>
             <?php echo $box7['heading2']; ?>
            </h1>
          </div>
          <div class="rightFlex wow bounceInRight">
            <a href="#Section4" class="btn_gradient">
              <span class="start"><?php echo $box7['linkText']; ?></span>
              <span class="hover"><?php echo $box7['linkText']; ?></span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Section 2 Ends-->
    <!-- Section Tabs -->
    <div class="main_section main_section5">
      <div class="standard">
        <div class="section_heading">
          <h1><?php echo $box7['heading']; ?></h1>
        </div>

        <div class="filter_portfolio">
          <ul>
            <?php
            $sql3="SELECT DISTINCT captivategallery_heading FROM  captivategallery WHERE publish='1' AND captivategallery_heading IN (SELECT captivategallery_heading FROM captivategallery GROUP BY captivategallery_heading HAVING COUNT(*) > 0)ORDER BY sort ASC";
            $data3 =   $dbF->getRows($sql3);
            foreach($data3 as $val){
                $name=getTextFromSerializeArray($val['captivategallery_heading']);
                $loweCaseName=strtolower($name);
                $finalname = str_replace(" ", "", $loweCaseName);
                
                
                echo'<li class="list active" data-filter="'.$finalname.'">'.$name.'</li>';
            }
            ?>
          </ul>

          <div class="portfolio_img">
              
    <?php
        $webImgData    =   $webClass->web_img();
        $imgdata = '';
        // $i = 0;
        // var_dump($webImgData);
        foreach($webImgData as $val2){
            
            $title1      =  $val2['title'];
            $loweCaseName=strtolower($title1);
            $finalname = str_replace(" ", "", $loweCaseName);
             $oriImg      =  $val2['layer0'];
             $editImg      =  $val2['layer1'];
             

                $imgdata .= '
                <div class="portfolioBox '.$finalname.'">
                  <div class="portfolio_thumb container">
                    <div class="img background-img" style="background-image: url(\'' . $editImg . '\');"></div>
                    <div class="img foreground-img" style="width: 50%; background-image: url(\'' . $oriImg . '\');"></div>
                    <input type="range" min="1" max="100" value="50" class="slider" name="slider" id="slider" />
                    <div class="slider-button"></div>
                  </div>
                </div>';
            
        }
              
echo $imgdata;          
              

              
              ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Section Tabs Ends -->
    
    <!-- Section 3 -->
    <?php $box8 = $webClass->getBox('box8');?>
    <div class="main_section section3">
      <div class="standard">
        <div class="sec3_inner flex_">
          <div class="leftFlex wow bounceIn" style="width: 40%">
            <img src="<?php echo $box8['image']; ?>" alt="Image Edit" />
          </div>
          <div class="rightFlex wow slideInRight">
            <div class="section_subheading">
              <h1><?php echo $box8['heading']; ?></h1>
            </div>

            <div class="txtHolder">
            <?php echo $box8['text']; ?>
            </div>

            <div class="btnHolder">
              <a href="<?php echo WEB_URL?>/page-services" class="btn_gradient">
                <span class="start"><?php echo $box8['linkText']; ?></span>
                <span class="hover"><?php echo $box8['linkText']; ?></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Section 3 Ends-->
      <div class="fixed_side"></div>
    <div class="package_popup">
        <div class="col5_close">
            <img src="webImages/close.png" alt="" class="hvr-pop">
        </div>
        <div class="standard">
            <div class="section_heading">
                <h1>Book your package</h1>
            </div>
            <form method="POST" action="orderInvoice.php" class="inner_form fadeInLeft">
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
    
        <!-- Section 6 -->
    <div id="section6" class="main_section section6">
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
          <path class="cls-1" d="M199.35,157.37a31.61,31.61,0,0,0-18.09,18.22l-17.37,10a46.76,46.76,0,0,1,20-37.2Z"
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
        </div>
        <div class="sec6_inner flex_">
          <!--  -->
          <?php
        $sql5 ="SELECT * FROM `proudct_detail_spb` WHERE `page`='main' AND `product_update`='1' AND `category`='Month' ORDER BY `prodet_id` DESC LIMIT 5";
        $data5 = $dbF->getRows($sql5);
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

                $prodetId = $val['prodet_id'];
                $productKey=key($productName);
                $name = $productName[$productKey];

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
              <h1>£'.$price.' <span></span></h1>
            </div>

            <div class="package_body">
              '.$desc.'
            </div>
             <div class="btn_main">
            <div class="package_footer">';
            //   echo'
            //   <a href="'.WEB_URL.'/packages?packageid='.base64_encode($prodetId).'" class="btn_gradient_small g2">
            //     <span class="start">View More</span>
            //     <span class="hover">View More</span>
            //   </a>';
              echo'
              
                  <a href="javascript:void(0)" id="package_popup" class="btn_gradient_small g2 buy-button" data-product-id="' . $prodetId . '">
                                <span class="start">Buy Now</span>
                                <span class="hover">Buy Now</span>
                                
                            </a>';
                            echo'
            </div>
            
            <div class="package_footer">';
            //   echo'
            //   <a href="'.WEB_URL.'/packages?packageid='.base64_encode($prodetId).'" class="btn_gradient_small g2">
            //     <span class="start">View More</span>
            //     <span class="hover">View More</span>
            //   </a>';
            //   echo'
              
            //       <a href="javascript:void(0)" id="package_popup" class="btn_gradient_small g2 buy-button" data-product-id="' . $prodetId . '">
            //                     <span class="start">With Editing</span>
            //                     <span class="hover">With Editing</span>
                                
            //                 </a>';
                            echo'
            // </div>
            </div>
            
           
                        
                 
          </div>
                
                ';
                    
                }
                $i++;
        }
          
          ?>

        </div>
      </div>
    </div>
    <!-- Section 6 Ends-->
    
        <!-- Section 4 -->
    <div id="Section4"class="main_section section4">
      <div class="standard_fullwidth">
        <div class="section_heading">
          <h1>How it works</h1>
        </div>

        <div class="sec4_inner flex_">
          <!--  -->
          <div class="single_main_card">
            <div class="card_img wow flip" data-wow-iteration="1" data-wow-duration=".15">
              <img src="webImages/howitworks/select_package.svg" alt="picmee package" />
            </div>
            <div class="card_body">
              <div class="card_txt wow fadeInUp">
                <b>Select package</b>
              </div>
            </div>
          </div>
          <!--  -->
          <div class="single_main_card">
            <div class="card_img wow flip" data-wow-iteration="1" data-wow-duration=".15">
              <img src="webImages/howitworks/scan.svg" alt="picmee qrcode" />
            </div>
            <div class="card_body">
              <div class="card_txt wow fadeInUp">
                <b>Share your unique QR code or weblink for your digital event
                  gallery.</b>
              </div>
            </div>
          </div>
          <!--  -->
          <div class="single_main_card">
            <div class="card_img wow flip" data-wow-iteration="1" data-wow-duration=".15">
              <img src="webImages/howitworks/participants.svg" alt="picmee participants" />
            </div>
            <div class="card_body">
              <div class="card_txt wow fadeInUp">
                <b>Participants of your event take memorial pictures</b>
              </div>
            </div>
          </div>
          <!--  -->
          <div class="single_main_card">
            <div class="card_img wow flip" data-wow-iteration="1" data-wow-duration=".15">
              <img src="webImages/howitworks/upload.svg" alt="picmee uploads" />
            </div>
            <div class="card_body">
              <div class="card_txt wow fadeInUp">
                <b>Guests Upload event pictures and videos</b>
              </div>
            </div>
          </div>
          <!--  -->
          <div class="single_main_card">
            <div class="card_img wow flip" data-wow-iteration="1" data-wow-duration=".15">
              <img src="webImages/howitworks/select.svg" alt="picmee select image" />
            </div>
            <div class="card_body">
              <div class="card_txt wow fadeInUp">
                <b>You Select the pictures and videos you want edited</b>
              </div>
            </div>
          </div>
          <!--  -->
          <div class="single_main_card">
            <div class="card_img wow flip" data-wow-iteration="1" data-wow-duration=".15">
              <img src="webImages/howitworks/receive.svg" alt="picmee receive image" />
            </div>
            <div class="card_body">
              <div class="card_txt wow fadeInUp">
                <b>You will receive your edited pictures and videos within 72
                  hours, ready to share on social media</b>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
     <a href="https://php8.imdemo.xyz/pickme/page-how-it-works" style="text-decoration: none;">
    <button style="padding: px 20px; border: 4px solid black; border-radius: 5px; cursor: pointer; font-size: 15px; margin-left:750px;">
        More Info
    </button>

    <!-- Section 4 Ends-->
    
        <!-- Section 5 -->
    <div class="main_section section5">
      <div class="standard">
        <div class="section_heading">
          <h1 class="title">Our Reviews</h1>
        </div>

        <div class="sec5_slider">
          <div class="swiper swiper3 mySwiper3">
            <div class="swiper-wrapper">
                <?php
                $sql6 = "SELECT * FROM `reviews` WHERE `status`=1 ";
                $data6 = $dbF->getRows($sql6);

                foreach($data6 as $val6){
                  $heading=$val6['subject'];
                  $comment=$val6['comment'];
                  
                  echo'
                  <div class="swiper-slide inner_slider2">
                <div class="review-box wow bounceInDown">
                  <div class="stars stars-4">
                    <div class="star">
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="star">
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="star">
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="star">
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="star">
                      <i class="fa fa-star"></i>
                    </div>
                  </div>

                  <div class="review_title">
                    <h3>'.$heading.'</h3>
                  </div>
                  <div class="review_text">
                    <p>
                  '.$comment.'
                    </p>
                  </div>
                  <div class="review_name">
                    <div class="review_img">
                      <img src="webImages/user.jpg" />
                    </div>
                    <div class="name_side">
                      <h5>Paul Stinner,</h5>
                      <h5>Hampshire</h5>
                    </div>
                  </div>
                </div>
              </div>
                  ';  
                }
                
                ?>
              <!-- 1 -->
              <!--<div class="swiper-slide inner_slider2">-->
              <!--  <div class="review-box wow bounceInDown">-->
              <!--    <div class="stars stars-4">-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--    </div>-->

              <!--    <div class="review_title">-->
              <!--      <h3>Pixel Perfect: Your photos, perfected!</h3>-->
              <!--    </div>-->
              <!--    <div class="review_text">-->
              <!--      <p>-->
              <!--        Pixel Perfect: Transforming your photos with precision-->
              <!--        and expertise." "Pixel Perfect: Elevating your images to-->
              <!--        perfection.-->
              <!--      </p>-->
              <!--    </div>-->
              <!--    <div class="review_name">-->
              <!--      <div class="review_img">-->
              <!--        <img src="webImages/user.jpg" />-->
              <!--      </div>-->
              <!--      <div class="name_side">-->
              <!--        <h5>Paul Stinner,</h5>-->
              <!--        <h5>Hampshire</h5>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->
              <!-- 2 -->
              <!--<div class="swiper-slide inner_slider2">-->
              <!--  <div class="review-box wow bounceInDown">-->
              <!--    <div class="stars">-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--    </div>-->

              <!--    <div class="review_title">-->
              <!--      <h3>-->
              <!--        Picture Perfect Edits: Unleash Your Photos' Potential.-->
              <!--      </h3>-->
              <!--    </div>-->
              <!--    <div class="review_text">-->
              <!--      <p>-->
              <!--        Picture Perfect Edits exceeded my expectations! They-->
              <!--        truly unlocked the hidden potential of my photos,-->
              <!--        transforming them into breathtaking works of art.-->
              <!--      </p>-->
              <!--    </div>-->
              <!--    <div class="review_name">-->
              <!--      <div class="review_img">-->
              <!--        <img src="webImages/user.jpg" />-->
              <!--      </div>-->
              <!--      <div class="name_side">-->
              <!--        <h5>Paul Smith,</h5>-->
              <!--        <h5>Australia</h5>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->
              <!-- 3 -->
              <!--<div class="swiper-slide inner_slider2">-->
              <!--  <div class="review-box wow bounceInDown">-->
              <!--    <div class="stars">-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--    </div>-->

              <!--    <div class="review_title">-->
              <!--      <h3>-->
              <!--        Outstanding Photo Editing: Unleash the Beauty of Your-->
              <!--        Images.-->
              <!--      </h3>-->
              <!--    </div>-->
              <!--    <div class="review_text">-->
              <!--      <p>-->
              <!--        I'm amazed by the outstanding photo editing skills of-->
              <!--        this team. They have a knack for bringing out the true-->
              <!--        beauty in every image, resulting in stunning visuals-->
              <!--        that leave a lasting impression.-->
              <!--      </p>-->
              <!--    </div>-->
              <!--    <div class="review_name">-->
              <!--      <div class="review_img">-->
              <!--        <img src="webImages/user.jpg" />-->
              <!--      </div>-->
              <!--      <div class="name_side">-->
              <!--        <h5>Sarah Thompson,</h5>-->
              <!--        <h5>Canada</h5>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->
              <!-- 4 -->
              <!--<div class="swiper-slide inner_slider2">-->
              <!--  <div class="review-box wow bounceInDown">-->
              <!--    <div class="stars">-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--    </div>-->

              <!--    <div class="review_title">-->
              <!--      <h3>-->
              <!--        Exceptional Photo Edits: Elevate Your Visuals to New-->
              <!--        Heights.-->
              <!--      </h3>-->
              <!--    </div>-->
              <!--    <div class="review_text">-->
              <!--      <p>-->
              <!--        I can't recommend the photo editing services enough! The-->
              <!--        level of expertise and attention to detail is-->
              <!--        exceptional. They took my visuals to new heights,-->
              <!--        enhancing every aspect of the images and leaving me in-->
              <!--        awe of the final results.-->
              <!--      </p>-->
              <!--    </div>-->
              <!--    <div class="review_name">-->
              <!--      <div class="review_img">-->
              <!--        <img src="webImages/user.jpg" />-->
              <!--      </div>-->
              <!--      <div class="name_side">-->
              <!--        <h5>John Anderson,</h5>-->
              <!--        <h5>United Kingdom</h5>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->
              <!-- 5 -->
              <!--<div class="swiper-slide inner_slider2">-->
              <!--  <div class="review-box wow bounceInDown">-->
              <!--    <div class="stars">-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--    </div>-->

              <!--    <div class="review_title">-->
              <!--      <h3>Unleash the Magic: Unforgettable Photo Edits.</h3>-->
              <!--    </div>-->
              <!--    <div class="review_text">-->
              <!--      <p>-->
              <!--        Their photo edits are pure magic! Each image they worked-->
              <!--        on became truly unforgettable. From color correction to-->
              <!--        creative enhancements, they bring out the essence and-->
              <!--        emotion in every shot. Absolutely mind-blowing work!-->
              <!--      </p>-->
              <!--    </div>-->
              <!--    <div class="review_name">-->
              <!--      <div class="review_img">-->
              <!--        <img src="webImages/user.jpg" />-->
              <!--      </div>-->
              <!--      <div class="name_side">-->
              <!--        <h5>Lisa Johnson,</h5>-->
              <!--        <h5>Australia</h5>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->
              <!-- 6 -->
              <!--<div class="swiper-slide inner_slider2">-->
              <!--  <div class="review-box wow bounceInDown">-->
              <!--    <div class="stars">-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--      <div class="star">-->
              <!--        <i class="fa fa-star"></i>-->
              <!--      </div>-->
              <!--    </div>-->

              <!--    <div class="review_title">-->
              <!--      <h3>-->
              <!--        Breathtaking Transformations: Unleash the Power of Photo-->
              <!--        Edits.-->
              <!--      </h3>-->
              <!--    </div>-->
              <!--    <div class="review_text">-->
              <!--      <p>-->
              <!--        Prepare to be amazed! Their photo edits deliver-->
              <!--        breathtaking transformations. They have a keen eye for-->
              <!--        detail and a talent for taking images to the next level.-->
              <!--        The impact they create is simply outstanding. I'm beyond-->
              <!--        impressed!-->
              <!--      </p>-->
              <!--    </div>-->
              <!--    <div class="review_name">-->
              <!--      <div class="review_img">-->
              <!--        <img src="webImages/user.jpg" />-->
              <!--      </div>-->
              <!--      <div class="name_side">-->
              <!--        <h5>Michael Thompson,</h5>-->
              <!--        <h5>United States</h5>-->
              <!--      </div>-->
              <!--    </div>-->
                </div>
              </div>
            </div>
            <div class="swiper-button-next section_controller"></div>
            <div class="swiper-button-prev section_controller"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Section 5 Ends-->
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
<?php include_once(__DIR__ . "/footer_new.php");?>