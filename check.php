<?php
include(__DIR__ . "/global.php");
//error_reporting(0);ini_set('display_errors', 0);
global $dbF;
?>

<?php
//echo "fdsfsdfsdf";
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);


//echo $adminPanelLanguage;
$default_lang =  defaultWebLanguage();

//$part =  $uri_segments[2];
$segment =  $uri_segments[1];

//echo $segment;


// echo "<pre>"; print_r($uri_path); echo "</pre>";
// die;


// if($part == 'Norwegian' || $part == 'Swedish' || $part == 'Finnish' || $part == 'Danish') {
// 	$segment =  (isset($uri_segments[5]) && !empty($uri_segments[5])) ? $uri_segments[5] : '';
// }
// else {
// 	$segment =  $uri_segments[4];
// }

// if($adminPanelLanguage == $default_lang){
// 	$segment =  $uri_segments[4];
// }
// else{
// 	$segment =  $uri_segments[5];

// }


//$sql = "SELECT * FROM seo WHERE pageLink like '%$segment%'";
$sql = "SELECT * FROM seo WHERE slug = '$segment'";
$check = $dbF->getRow($sql);

if ($dbF->rowCount > 0) {

	$p_link = $check['pageLink'];
	$a = explode('-', $p_link, 2);
	$key = $a[0];


	//echo $key; 
	



	switch($key){

		case '/product':
			//$_GET['pSlug'] = $segment;
			$_GET['pSlug'] = $a[1];
			include(__DIR__ . "/detail.php");
		break;

		case '/pCategory':
			$_GET['catSlug'] = $a[1];
			include(__DIR__ . "/products.php");
		break;

		case '/dealCategory':
			$_GET['catSlug'] = $a[1];
			include(__DIR__ . "/productDeals.php");
		break;

		case '/product':
			$_GET['pSlug'] = $a[1];
			include(__DIR__ . "/detail.php");
		break;

		case '/page':
			$_GET['page'] = $a[1];
			include(__DIR__ . "/page.php");
		break;

		case '/blog':
			$_GET['blog'] = $a[1];
			include(__DIR__ . "/blog.php");
		break;

		case '/deal':
			$_GET['dealSlug'] = $a[1];
// 			include(__DIR__ . "/productDeals.php");
			include(__DIR__ . "/dealDetailNew.php");
		break;
	}

}
else{
	echo "<div style='text-align: center'>
	<span>No Data Found!</span>
	</div>";

	?>
	<script>
	setTimeout(function(){window.location.href="<?php echo WEB_URL; ?>"},3000);
	</script>
	<?php
}

?>