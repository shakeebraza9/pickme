<?php 
    global $dbF, $functions, $productClass, $_e, $webClass;
?>

<div class="modal fade" id="orangeModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div id="modal-content">
            <div class="">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Subscribe</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text"><i class="far fa-times-circle"></i></span>
                </button>
            </div>
            <form method="post" action="" id="longTimeForm">
                <?php $webClass->setFormToken('LongWaitForm'); ?>
                <div class="">
                    <div class="form-group">
                        <label for="name">Your name</label>
                        <input type="text" id="name" name="l_name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="text" id="email" name="l_email" class="form-control" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Your Phone No</label>
                        <input type="text" id="phone" name="l_phone" class="form-control" placeholder="Your Phone No" required>
                    </div>
                </div>
                <div class="">
                    <input type="button" name="longWaitSubscribe" id="longTimeSubmit" value="Send">
                </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>

<?php 
$popupDelay = $functions->ibms_setting('LongTimePopupDelay');
$delaySec = $popupDelay*60;
$delaySec = $delaySec*1000;

 ?>

<script type="text/javascript">

    // $(document).ready(function() {
    //     displayPopup();
    // });

    function onPopupClose() {
      $('#orangeModalSubscription').modal('toggle');
      Cookies.set('colorboxShown', 'yes', {
        expires: 1
      });
      lastFocus.focus();
    }

    function displayPopup() {
      $('#orangeModalSubscription').modal('show');
    }

    var lastFocus;
    var popupShown = Cookies.get('colorboxShown');

    if (popupShown) {} 
      else {
      setTimeout(function() {
        lastFocus = document.activeElement;
        displayPopup();
      }, <?php echo $delaySec; ?>);
    }

    $(function() {
        $('#longTimeSubmit').on('click', function(){
            form = $('#longTimeForm').serialize();
            $.ajax({
                url: 'ajax_call.php?page=longTimeSubscribe',
                type: 'post',
                data: form
            }).done(function(res){
                onPopupClose();
                if(res == '1'){
                    jAlertifyAlert('<?php echo _js($_e['Thank You For Subscribe.']); ?>');
                }else{
                    jAlertifyAlert('<?php echo _js($_e['Subscribe Fail, You Already Subscribe.']); ?>');
                }
            });
        });
    });
</script>