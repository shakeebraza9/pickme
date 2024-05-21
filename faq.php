<?php
ob_start();

include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;
?>
        <div class="main_section faq_main inner_main_page" style="padding: 6rem 0;">
            <div class="standard">
                <div class="section_heading">
                    <?php $box10 = $webClass->getBox('box10'); ?>
                    <h1><?php echo $box10['heading']; ?></h1>
                    <p><?php echo $box10['heading2']; ?></p>
                </div>
                <ul class="accordion-list">
                    <?php
                    $sql =   "SELECT * FROM faq WHERE `publish`='1' order by id ASC";
                    $data =   $dbF->getRows($sql);
                    foreach($data as $val){
                        $heading=$val['title'];
                        $dsc=$val['dsc'];
                        echo'
                        <li>
                      <h3>'.$heading.'</h3>
                      <div class="answer">
                      '.$dsc.'
                      </div>
                    </li>
                        
                        
                        ';
                    }
                    
                    ?>
                  </ul>
            </div>
             <div class="bg_shape">
                <img src="webImages/bg-shape-1.png" alt="" class="style-shape fbs-1">
                <img src="webImages/bg-shape-2.png" alt="" class="style-shape fbs-2">
            </div>
        </div>

<?php
return ob_get_clean();
?>