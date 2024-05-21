<?php
include_once("global.php");
global $webClass;
global $dbF;
global $_e;

@$fileId = $_GET['fileId'];
@$fName  = $_GET['fName'];
$notFoundLink = WEB_URL."/data/fileNotFound";

$sql = "SELECT id,file_heading,layer0,layer1,downloads FROM filesmanager WHERE publish = '1' AND id= '$fileId'";
$data = $dbF->getRow($sql);
if($dbF->rowCount>0) {
    //check if same person download same file again...
    if(!isset($_SESSION['webUser']['downloadFile_'.$fileId])) {
        $sql = "UPDATE filesmanager SET downloads = downloads+1 WHERE id= '$fileId'";
        $dbF->setRow($sql);
        $_SESSION['webUser']['downloadFile_'.$fileId] = $fileId;
    }
    if($dbF->rowCount>0) {
        $downloadLink    =  $functions->addWebUrlInLink(translateFromSerialize($data['layer1']));
        if(stristr($downloadLink,WEB_URL)){
            //if our link check is file exists
            if($functions->isFileExists($downloadLink,true)){
                header("Location: $downloadLink");
            }else{
                header("Location: $notFoundLink");
            }
        }else{
            header("Location: $downloadLink");
        }

    }else{
        header("Location: $notFoundLink");
    }

}else{
    header("Location: $notFoundLink");
}

//Download file End

?>