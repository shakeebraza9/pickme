<?php
if (session_status() == PHP_SESSION_NONE || session_id() == '') {
    session_start();
}
include_once(__DIR__."/../../../_models/setting/global.setting.php");

if(isset($_SESSION['_uid']) && $_SESSION['_uid']>0){
    switch ($_SESSION["_role"]):
        case "super_admin":
        case "admin":
        case "manager":
            break;
        default :
            //no admin login
            exit;
            break;
    endswitch;
}else{
    //no admin login
    exit;
}

/** This file is part of KCFinder project
  *
  *      @desc Base configuration file
  *   @package KCFinder
  *   @version 2.54
  *    @author Pavel Tzonkov <sunhater@sunhater.com>
  * @copyright 2010-2014 KCFinder Project
  *   @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
  *   @license http://www.opensource.org/licenses/lgpl-2.1.php LGPLv2
  *      @link http://kcfinder.sunhater.com
  */

// IMPORTANT!!! Do not remove uncommented settings in this file even if
// you are using session configuration.
// See http://kcfinder.sunhater.com/install for setting descriptions



$_CONFIG = array(


// GENERAL SETTINGS

    'disabled' => false,
    'theme' => "oxygen",
    'uploadURL' => WEB_URL."/uploads",
    'uploadDir' => __DIR__."../../../../uploads/",

    'types' => array(

    // (F)CKEditor types
        'files'   =>  "",
        'flash'   =>  "mp4 webm",
        'images'  =>  "jpg jpeg png gif webp",

    // TinyMCE types
        'file'    =>  "",
        'media'   =>  "swf flv avi mpg mpeg qt mov wmv asf rm",
        'image'   =>  "jpg jpeg png gif webp",
        'mp4' => 'video/mp4 video/webm'
    ),


// IMAGE SETTINGS

    'imageDriversPriority' => "imagick gmagick gd",
    'jpegQuality' => 90,
    'thumbsDir' => ".thumbs",

    'maxImageWidth' => 0,
    'maxImageHeight' => 0,

    'thumbWidth' => 100,
    'thumbHeight' => 100,

    'watermark' => "",


// DISABLE / ENABLE SETTINGS

    'denyZipDownload' => false,
    'denyUpdateCheck' => false,
    'denyExtensionRename' => false,


// PERMISSION SETTINGS

    'dirPerms' => 0755,
    'filePerms' => 0644,

    'access' => array(

        'files' => array(
            'upload' => true,
            'delete' => true,
            'copy'   => true,
            'move'   => true,
            'rename' => true
        ),

        'dirs' => array(
            'create' => true,
            'delete' => true,
            'rename' => true
        )
    ),

    'deniedExts' => "exe com msi bat php phps phtml php3 php4 cgi pl",


// MISC SETTINGS

    'filenameChangeChars' => array(
        ' ' => "_",
        '&' => "_",
        '$' => "_",
        ':' => "."
    ),

    'dirnameChangeChars' => array(
        ' ' => "_",
        '&' => "_",
        '$' => "_",
        ':' => "."
    ),

    'mime_magic' => "",

    'cookieDomain' => "",
    'cookiePath' => "",
    'cookiePrefix' => 'Imedia_',


// THE FOLLOWING SETTINGS CANNOT BE OVERRIDED WITH SESSION SETTINGS

    '_check4htaccess' => true,
    //'_tinyMCEPath' => "/tiny_mce",

    '_sessionVar' => &$_SESSION['Imedia'],
    //'_sessionLifetime' => 30,
    //'_sessionDir' => "/full/directory/path",

    //'_sessionDomain' => ".mysite.com",
    //'_sessionPath' => "/my/path",
);

?>