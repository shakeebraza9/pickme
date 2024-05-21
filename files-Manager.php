<?php
ob_start();
include_once("global.php");
global $webClass;
global $dbF;
global $_e;
$_w = array();
$_w['Email']    = '' ;

//$_e    =   $dbF->hardWordsMulti($_w,currentWebLanguage(),'Website Employee');

$sql = "SELECT id,file_heading,layer0,layer1,downloads FROM filesmanager WHERE publish = '1' ORDER BY sort";
$data = $dbF->getRows($sql);
if (!$dbF->rowCount) {
    return false;
}

echo  '<div class="container-fluid padding-0"> <div class="list-group">';
foreach ($data as $key => $val) {
    $id = $val['id'];
    $downloadCount = $val['downloads'];

    //var_dump($userInfo);
    $image    = $functions->addWebUrlInLink(translateFromSerialize($val['layer0']));
    $imageR   = $image;
    $image   =  $functions->resizeImage($imageR,'20','20',false,false,false);

    $downloadLink    =  translateFromSerialize($val['layer1']);
    $fileName    = explode("/",$downloadLink);
    $fileName    =  end($fileName);

    $Name  =  translateFromSerialize($val['file_heading']);

    $downloadLInk = WEB_URL."/download";
    $downloadLInk .= "?fileId=$id&fName=$fileName";

    echo "<a href='$downloadLInk' target='_blank' class='col-xs-12 col-sm-4 list-group-item margin-5'>
                <div class='col-xs-1 padding-0'>
                    <img class='img-responsive pull-left' src='$image'/>
                </div>
                <div class='col-xs-11 padding-0'>
                    <span class='pull-right glyphicon glyphicon-cloud-download'>$downloadCount</span> &nbsp;
                $Name
                </div>
          </a>";
}

echo '</div></div><!--container-fluid-->';


echo "";?>

<?php



return ob_get_clean(); ?>