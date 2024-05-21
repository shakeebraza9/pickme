<?php include_once("global.php");
global $webClass;

if(!isset($_GET['page']) || $_GET['page']==''){
    header("HTTP/1.0 404 Not Found");
}

//var_dump($seo);

$pg         = $_GET['page'];
$page       = $webClass->getPage("$pg");
$pg_id      = $page['id'];
$setting_field  = $functions->setting_fieldsGet($pg_id,'pages');
$loginReq       = $functions->setting_fieldsArray($setting_field,'loginReq');
$icons          = $functions->setting_fieldsArray($setting_field,'icon');

if( $loginReq == '1' ){
    if(!userLoginCheck()){
        header('Location: '.WEB_URL.'/login');
    }
}

//Redirect If link
$redirectLink = $page['link'];
if($redirectLink!=''){
    header("Location: $redirectLink");
    exit;
}

global $seo;
if($seo['title']==''  || $seo['reWriteTitle']=='0'){
    $seo['title'] = $page['heading'];
}
if($seo['description']=='' || $seo['default']=='1'){
    //$seo['description'] = substr(trim(strip_tags($page['desc'])),0,250);
    $seo['description'] = substr(trim(strip_tags($page['desc'])),0,500); //500 for facebook share
}

if($page['comment']=='1'){
    $functions->require_once_custom('webBlog_functions');
    $blogC = new webBlog_functions();
    $reviewMsg = $blogC->reviewSubmit();
    $reviews =  $blogC->reviews($pg,'page',2);
    $reviews = '<div class="clearfix"></div><br><div class="pageReview container-fluid padding-0 table-bordered">'.$reviews.'</div><div class="clearfix"><br><br></div>';
}else{
    $reviews = '';
}


$desc1 =  ($page['desc']);
if(stristr($desc1,'{{contactForm}}')){
    $contactForm = include_once(__DIR__.'/contact.php');
    $desc1       = str_replace('{{contactForm}}',$contactForm,$desc1);
}

if(stristr($desc1,'{{employee}}')){
    if($functions->developer_setting('employeePage') == '1') {
        $employee = include_once(__DIR__ . '/employee.php');
        $desc1 = str_replace('{{employee}}', $employee, $desc1);
    }
}

if(stristr($desc1,'{{files-Manager}}')){
    if($functions->developer_setting('filesManagerPage') == '1') {
        $employee = include_once(__DIR__ . '/files-Manager.php');
        $desc1 = str_replace('{{files-Manager}}', $employee, $desc1);
    }
}

if(stristr($desc1,'{{testimonial}}')){
    if($functions->developer_setting('testimonialPage') == '1') {
        $employee = include_once(__DIR__ . '/testimonial.php');
        $desc1 = str_replace('{{testimonial}}', $employee, $desc1);
    }
}

if(preg_match("@{{album.*}}@i",$desc1)){
    $functions->modelFunFile('webGallery_functions.php');
    $galleryC = new web_gallery();
    $desc1 = '{{albumSingle(gallery)}}';
    $desc1 = $galleryC->albumPage($desc1);
}

    $bannerImg = $page['image'];
    $shrtDesc  = $page['short_desc'];
    $subHeading  = $page['heading2'];


include("header.php");
?>

<!--Inner Container Starts-->
<?php $webClass->seoSpecial();  ?>

<div class="clearfix"></div>
<div class="index_content">
<div class="col1_left">
    <?php $functions->includeOnceCustom('left_side_panel.php'); ?>
    <!-- u-vmenu close -->
</div>
<div class="col1_right" style="background: white">
    
     <div class="col3_main_all">
            </div>
            
            
<div class="container-fluid padding-0">
            <div class="container-fluid well well-sm h3">
                <h1 class="page_heading"><?php echo $page['heading']; ?></h1>
            </div>
            <div class="inner_content_page_div container-fluid ">
                <?php echo $desc1; ?>
                <?php echo $reviews; ?>
            </div> 
        </div>
</div>
</div>

    <!--Inner Container Ends-->

<?php include("footer.php"); ?>