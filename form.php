<?php
include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;

?> 
 
    
        <div class="col5_close col5_close2">
            <img src="webImages/close.png" alt="" class="hvr-pop">
        </div>
        <div class="standard">
            <div class="section_heading">
                <h1>Book your package</h1>
            </div>
            <form method="POST" action="packages.php" class="">
                <?php echo $functions->setFormToken("contactForm",false); ?>
                <!-- form flex -->
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="text" id="name_f1" name="form[name]" placeholder="Full Name" required>
                            <input type="hidden" name="busnies" value="busnies">
                            <input type="hidden" id ="token" name="token" value="">
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- form flex -->
                

                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="email" id="email_f1" name="form[email]" placeholder="Email Address" required>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- form flex -->
                <div class="form_flex">
                    <!-- 1 -->
                    <div class="form_group">
                        <div class="input_">
                            <input class="effect-7" type="number" id="pnumber_f1" name="form[mobile]"
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
                            <textarea class="effect-7" id="message_f1" name="form[meg]"
                                placeholder="Your Message"></textarea>
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

<script type="text/javascript">
					grecaptcha.ready(function() {
						grecaptcha.execute('6LcQIscZAAAAAGLytR5dCMklULVOUfxXZ6mRmDnc').then(function(token) {
							document.getElementById('token').value = token ;
						});
					});
					
					$(document).ready(function() {
  $(".col5_close2").click(function () {
    console.log('hello');
    $("#fixed_side").removeClass("fixed_side_");
    $("#package_popup2").removeClass("package_popup2_");
    $("body").removeClass("scroll_stop");
  });
});
				</script>