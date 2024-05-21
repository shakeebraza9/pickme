<?php 
//Edit Global Setting Values , see below

/*define("DB_HOST", 'localhost');
define("DB_USER", 'sharkspc_testuse');   // sharkspc_test_17
define("DB_PASS", ')zhi[ry%$Mt{'); // Database!@# // LHsykW?Xi(kk
define("DB_NAME", 'sharkspc_test_db_2019'); //  using in pdo // sharkspc_test_new_2017
define("DB_TYPE", 'mysql');*/


define("DB_HOST", 'localhost');
define("DB_USER", 'sharkspc_liveusr');   // sharkspc_test_17
define("DB_PASS", '&rFGO_nTP}TbR!JS?8'); // Database!@# // LHsykW?Xi(kk
define("DB_NAME", 'sharkspc_live_2017'); //  using in pdo // sharkspc_test_new_2017
define("DB_TYPE", 'mysql');





// define("DB_HOST", 'localhost');
// define("DB_USER", 'sharkspc_liveusr');   // sharkspc_test_17
// define("DB_PASS", '&rFGO_nTP}TbR!JS?8'); // Database!@# // LHsykW?Xi(kk
// define("DB_NAME", 'sharkspc_live_2017'); //  using in pdo // sharkspc_test_new_2017
// define("DB_TYPE", 'mysql');

// define("DB_HOST", 'localhost');
// define("DB_USER", 'sharkspc_newtmp'); // sharkspc_web
// define("DB_PASS", ';y=gS$kbf.*5Eu_;bn'); // Database!@#
// define("DB_NAME", 'sharkspc_new_2017_temp'); //  using in pdo // sharkspeed_to_make_live_2017_march
// define("DB_TYPE", 'mysql');


##### GET URL  #####
$REQUEST_URI_WEB = "/";
$host = $_SERVER['HTTP_HOST'];


$lang_define = false;
  if( ! isset($_GET['lang']) ){
    switch($host){
      case "sharkspeed.se":
          $lang_define = true;
          $_GET['lang'] = "Swedish";
          break;
      case "sharkspeed.fi":
          $lang_define = true;
          $_GET['lang'] = "Finnish";
          break;
      case "sharkspeed.dk":
          $lang_define = true;  
          $_GET['lang'] = "Danish";
          break;
      case "sharkspeed.no":
          $lang_define = true;
          $_GET['lang'] = "Norwegian";
          break;
      default:
          //$_GET['lang'] = "Swedish";
          break;
    }
  }

define("lang_define" , $lang_define);


$host = "https://".$host.""; // no slash at end..


define("WEB_URL" , $host); // no slash at end.. also update in common function
define("REQUEST_URI_WEB", $REQUEST_URI_WEB); //After domain name,, Or same as web .htaccess RewriteBase url

define("PROJECT_ID", "24");
define("PROJECT_NAME","SharkSpeed 2017"); // on any Illegal activity send this name

//////////// Online Major define Var Setting End /////////////////////

// For admin user, All sql right from phpmyadmin ,
define("ADMIN_DB_USER", DB_USER); // want to use Different User for web and admin, just enter user name is web and admin
define("ADMIN_DB_PASS", DB_PASS);

define("ADMIN_FOLDER" ,"myAdmin"); // no slash at start and end.., also change from admin .htaccess
define("WEB_ADMIN_URL" , WEB_URL."/".ADMIN_FOLDER); // no slash at end..

$cronWithTime   =  "* * * * * /usr/bin/php /home/sharkspcom/public_html/cron/cron.php";// Every minute
//$cronWithTime   =  "* * * * * /usr/bin/curl -A cron ".WEB_URL."/cron/cron.php";// Every minute
//$cronWithTime   =  "* * * * * php -q ".$_SERVER['DOCUMENT_ROOT'].REQUEST_URI_WEB."cron/cron.php";// Every minute

define("CRON_FILE" , $cronWithTime); // completeFile Dir after domain name
date_default_timezone_set('Asia/Karachi'); //PENDING

define("REQUEST_URI_ADMIN", REQUEST_URI_WEB.ADMIN_FOLDER);

//Edit Global Setting Values , see below
/********************************************************************************************************************/


trait global_setting
{
       public $setTimeOutLocal = 0; //using for testing Ajax in localhost,, set 0 on Live PENDING
       public $setTimeOutSocial = 500; // using Social Media to load after Page load.
       public $domainName   = 'sharkspeed'; //Example IBMS OR imedia
       public $domain       = 'sharkspeed.com';  // Example.com OR imedia.com no www ibms.com Dont use sub domain
       public $webName      = 'Shark Speed';  // Example Here IBMS Management OR Interactive Media using for replace name, Also use in Email {{WebName}} Or aorg
       public $defaultEmail = "sharkspeed.com";  //Only domain name ibms.com,, OR imedia.com
       public $bounceEmail  = "b@sharkspeed.com";  //Only use in cron
       public $isCheckBounceWebMails  = true;  //true|false; if true, then website mails if fail then return bounce email include in mail functions
       public $bounceWebEmail  = "fails@imediahostings.com";  //if $isCheckBounceWebMails is ture, then this workds. // on $bounceWebEmail email all fail mails report send...
     //////////// Online Major Setting End /////////////////////

    /////////////////////// Error Reporting Setting ////////////////
        public $showErrorOnLocal = false;
        public $showErrorOnLive  = true;
    /////////////////////// Error Reporting Setting END ////////////////

    /////////////////////// Project Key //////////////////////////////
    public $i_key        = "TLwkO5JkEH8MnR4zvefe+nsXPLVD5xW4k2K5xqQquRA="; //Project Key, In case of any damage Imedia need this key to recover your lose data,
   //sharkSpeed. change this name when key change with project, this is help full to remember is you  update key or not

    public $defaultHttp = "https://";  //http:// or https://
    public $IBMSVersion = "4.3.2";  //

    public $request_uri_Web  = REQUEST_URI_WEB; //After domain name,, First use in admin permission e.g: /projects/projects/, e.g projects.imedia.pk/projectName (projectName)
    public $request_uri_Web_admin  = REQUEST_URI_ADMIN; //After domain name,, First use in admin permission e.g: /projects/projects/admin/
    //if on real domain uri set / for web and /admin/ for admin
    //if you dont know, and Want to check website uri? echo $_SERVER['HTTP_REFERER']; on home page, and on admin page

    public $menu_show = true;
    public $secret_key   = "_s3cr@t007-asad_showcase"; //Don't Change it...

    public static $root_url = WEB_URL; // no slash at end..
    public static $admin_root = WEB_ADMIN_URL; // no slash at end..

    //slug start value, if you change this also change from web .htaccess
    // use in menu links, sitemap, categories, and detail link.
    public $dataPage        = 'page-';
    public $productDetail   = 'product-';
    public $dealProduct     = 'deal-';
    public $pCategory       = 'pCategory-';
    public $dealCategory    = 'dealCategory-';
    public $blogPage        = 'blog-';
    //slug info end
}

?>