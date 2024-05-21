<?php
global $webClass;
global $functions;
global $_e;
global $webClass;
global $db;

//No Need to define global it is just for PHPstrom suggestion list....

?>
    <footer class="main_footer_div">
      <div class="main_footer">
        <div class="standard">
          <div class="footer_inner flex_">
            <div class="footer_img wow bounceIn">
                <?php $box1 = $webClass->getBox('box1'); ?>
              <a href="<?php echo $box1['link']; ?>">
                <?php $box9 = $webClass->getBox('box9'); ?>
                <img src="<?php echo $box9['image']; ?>" alt="picmee logo" />
                <svg id="Layer_1" width="70" height="70" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
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
              </a>
            </div>

            <div class="footer_links wow slideInLeft">
              <ul>
                  <?php
                                $css      = false;
                                $mainMenu = $menuClass->footerInnerMenu(0);
                                // var_dump($mainMenu);
                                foreach ($mainMenu as $val) {
                                    $insideActive = false;
                                    $innerUl      = '';
                                    $menuId       = $val['id'];
                                    $text         = $val['menu'];
                                    $link         = $val['link'];
                                    echo '<li><a href="' . $link . '">' . $text . '</a>' . $innerUl . '</li>';
                                }
                                ?>
                  
                  ?>
                  
              </ul>
            </div>

            <div class="footer_socials">
              <ul>
                <li class="wow swing" data-wow-iteration="2">
                  <a href="https://www.facebook.com/">
                    <i class="fa-brands fa-facebook-f"></i>
                  </a>
                </li>
                <li class="wow swing" data-wow-iteration="2">
                  <a href="https://www.twitter.com/">
                    <i class="fa-brands fa-twitter"></i>
                  </a>
                </li>
                <li class="wow swing" data-wow-iteration="2">
                  <a href="https://www.linkedin.com/">
                    <i class="fa-brands fa-linkedin-in"></i>
                  </a>
                </li>
                <li class="wow swing" data-wow-iteration="2">
                  <a href="https://www.youtube.com/">
                    <i class="fa-brands fa-youtube"></i>
                  </a>
                </li>
              </ul>
            </div>

            <div class="footer_btn">
              <a href="<?php echo WEB_URL.'/page-packages' ?>" class="btn_gradient" style="padding: 1rem 6rem">
                <span class="start">Start Now</span>
                <span class="hover">Start Now</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="main_footer_bottom">
        <div class="standard">
          <div class="footer_bottom_inner flex_">
            <div class="copyright">
              <p>
                © Copyright - <?php
                echo $currentYear = date("Y");
                ?>
                <a href="#" class="compname">Picmee</a> All Right Reserved
              </p>
            </div>

              <?php echo $webClass->ourLogo(); ?>
            <!--<div class="imedia" id="a_463a96ecf1086d">-->
            <!--  <a href="http://imedia.com.pk/" target="_blank" title="Karachi Web Designing Company"-->
            <!--    class="design_develop">Design &amp; Developed by:</a>-->
            <!--  <a href="http://imedia.com.pk/" target="_blank" title="Web Designing Company Pakistan"><img-->
            <!--      src="webImages/imedia.png" alt="" />-->
            <!--  </a>-->
              <!--<div class="m_text">-->
              <!--  <a href="http://imedia.com.pk/" target="_blank" title="Website Design by Interactive Media">Interactive-->
              <!--    Media</a>-->
              <!--  <a href="http://imediaintl.com/" target="_blank" title="International Web Development Company"-->
              <!--    class="digital_media">DIGITAL MEDIA ON DEMAND Globally</a>-->
              <!--</div>-->
              <!--m_text end-->
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>




  <script src="<?php echo WEB_URL ?>/Js/jquery-3.6.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
  <script src="<?php echo WEB_URL ?>/Js/mmenu.min.all.js"></script>
  <script src="<?php echo WEB_URL ?>/Js/jquery.easing.1.3.js"></script>
  <script src="<?php echo WEB_URL ?>/Js/jquery.fancybox.js"></script>
  <script src="<?php echo WEB_URL ?>/Js/WOW.js"></script>
  <script src="https://use.fontawesome.com/eecfb424a6.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo WEB_URL ?>/Js/script.js"></script>




</body>

</html>