<?php
ob_start();
include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;
?>

 <div>
     <h1>How it works</h1>
     <button><a href="https://php8.imdemo.xyz/pickme/page-packages">Get Started</a></button>
 </div>
 
 
 
<?php
return ob_get_clean();
?>