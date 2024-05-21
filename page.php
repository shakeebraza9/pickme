<?php include("global.php");

global $webClass;



if (!isset($_GET['page']) || $_GET['page'] == '') {

    header("HTTP/1.0 404 Not Found");
}





$pg         = $_GET['page'];

$page       = $webClass->getPage("$pg");

@$pg_id      = $page['id'];

// $setting_field  = $functions->setting_fieldsGet($pg_id,'pages');

// $loginReq       = $functions->setting_fieldsArray($setting_field,'loginReq');

// $icons          = $functions->setting_fieldsArray($setting_field,'icon');





//Redirect If link

@$redirectLink = $page['link'];

if ($redirectLink != '') {

    header("Location: $redirectLink");

    exit;
}



global $seo;

if (isset($seo['title']) || isset($seo['reWriteTitle'])) {
    if ($seo['title'] == ''  || $seo['reWriteTitle'] == '0') {

        $seo['title'] = $page['heading'];
    }
}

if (isset($seo['description']) && isset($seo['default'])) {
    if ($seo['description'] == '' || $seo['default'] == '1') {

        //$seo['description'] = substr(trim(strip_tags($page['desc'])),0,250);

        $seo['description'] = substr(trim(strip_tags($page['desc'])), 0, 500); //500 for facebook share

    }
}



@$desc1 =  ($page['desc']);

$contact_page = FALSE;

$feedback_page = FALSE;





$is_gallery_page = false;

if (preg_match("@{{album.*}}@i", $desc1)) {

    $functions->modelFunFile('webGallery_functions.php');

    $galleryC = new web_gallery();

    $desc1 = $galleryC->albumPage($desc1);

    $is_gallery_page = true;
}



if (stristr($desc1, '{{faq}}')) {
    $faq = include_once(__DIR__ . '/faq.php');

    $desc1       = str_replace('{{faq}}', $faq, $desc1);

    $faqpage = TRUE;
}

if (stristr($desc1, '{{services}}')) {
    $Services = include_once(__DIR__ . '/Services.php');

    $desc1       = str_replace('{{services}}', $Services, $desc1);

    $Servicespage = TRUE;
}
if (stristr($desc1, '{{packages}}')) {
    $packages = include_once(__DIR__ . '/packages.php');

    $desc1        = str_replace('{{packages}}', $packages, $desc1);

    $packagespage = true;
}
if (stristr($desc1, '{{howItWorks}}')) {
    $howItWorks = include_once(__DIR__ . '/howItWorks.php');

    $desc1        = str_replace('{{howItWorks}}', $howItWorks, $desc1);

    $howItWorksspage = true;
}
if (stristr($desc1, '{{management}}')) {
    $management = include_once(__DIR__ . '/management.php');

    $desc1       = str_replace('{{management}}', $management, $desc1);

    $managementpage = TRUE;
}

if (stristr($desc1, '{{boardOfDirector}}')) {
    $boardOfDirector = include_once(__DIR__ . '/boardOfDirector.php');

    $desc1       = str_replace('{{boardOfDirector}}', $boardOfDirector, $desc1);

    $boardOfDirectorpage = TRUE;
}

if (stristr($desc1, '{{financialreport}}')) {
    $financialreport = include_once(__DIR__ . '/financialreport.php');

    $desc1       = str_replace('{{financialreport}}', $financialreport, $desc1);

    $financialreportpage = TRUE;
}
if (stristr($desc1, '{{account-opening}}')) {
    $account_opening = include_once(__DIR__ . '/account_opening.php');

    $desc1       = str_replace('{{account-opening}}', $account_opening, $desc1);

    $account_opening = TRUE;
}

if (stristr($desc1, '{{ncb_and_lcb}}')) {
    $ncb_and_lcb = include_once(__DIR__ . '/ncb_and_lcb.php');

    $desc1       = str_replace('{{ncb_and_lcb}}', $ncb_and_lcb, $desc1);

    $ncb_and_lcbpage = TRUE;
}

if (stristr($desc1, '{{research}}')) {
    $research = include_once(__DIR__ . '/research.php');

    $desc1       = str_replace('{{research}}', $research, $desc1);

    $researchpage = TRUE;
}

if (stristr($desc1, '{{morningReview}}')) {
    $morningReview = include_once(__DIR__ . '/morningReview.php');

    $desc1       = str_replace('{{morningReview}}', $morningReview, $desc1);

    $morningReviewpage = TRUE;
}

if (stristr($desc1, '{{closingReview}}')) {
    $closingReview = include_once(__DIR__ . '/closingReview.php');

    $desc1       = str_replace('{{closingReview}}', $closingReview, $desc1);

    $closingReviewpage = TRUE;
}

if (stristr($desc1, '{{coverageReport}}')) {
    $coverageReport = include_once(__DIR__ . '/coverageReport.php');

    $desc1       = str_replace('{{coverageReport}}', $coverageReport, $desc1);

    $coverageReportpage = TRUE;
}

if (stristr($desc1, '{{feedback}}')) {
    $feedback = include_once(__DIR__ . '/feedback.php');

    $desc1       = str_replace('{{feedback}}', $feedback, $desc1);

    $feedback = TRUE;
}

if (stristr($desc1, '{{career}}')) {
    $career = include_once(__DIR__ . '/career.php');

    $desc1       = str_replace('{{career}}', $career, $desc1);

    $careerpage = TRUE;
}

if (stristr($desc1, '{{contact}}')) {
    $contact = include_once(__DIR__ . '/contact.php');

    $desc1       = str_replace('{{contact}}', $contact, $desc1);

    $contact = TRUE;
}

if (stristr($desc1, '{{analysis}}')) {
    $analysis = include_once(__DIR__ . '/analysis.php');

    $desc1       = str_replace('{{analysis}}', $analysis, $desc1);

    $analysisPage = TRUE;
}

// if(stristr($desc1,'{{contactForm}}')){

// $contactForm = include_once(__DIR__.'/contact.php');

// $desc1       = str_replace('{{contactForm}}',$contactForm,$desc1);

// $contact_page = TRUE;

// }

if (stristr($desc1, '{{signup}}')) {

    $signup = include_once(__DIR__ . '/signup_form.php');

    $desc1       = str_replace('{{signup}}', $signup, $desc1);

    $signuppage = TRUE;
}

if (stristr($desc1, '{{signin}}')) {

    $signin = include_once(__DIR__ . '/login.php');

    $desc1       = str_replace('{{signin}}', $signin, $desc1);

    $signinpage = TRUE;
}

if (stristr($desc1, '{{sitemap}}')) {

    $sitemap = include_once(__DIR__ . '/sitemap.php');

    $desc1       = str_replace('{{sitemap}}', $sitemap, $desc1);

    $sitemappage = TRUE;
}

if (stristr($desc1, '{{accountOpen}}')) {
    $accountOpen = include_once(__DIR__ . '/account_open.php');
    $desc1       = str_replace('{{accountOpen}}', $accountOpen, $desc1);
    $accountOpenpage = TRUE;
}


// if(stristr($desc1,'{{inquiryForm}}')){

// $inquiryForm = include_once(__DIR__.'/inquiry.php');

// $desc1       = str_replace('{{inquiryForm}}',$inquiryForm,$desc1);

// }



$financial_positions = explode(',', $functions->ibms_setting('financial_positions'));

foreach ($financial_positions as $field) {

    if (stristr($desc1, "{{financial::$field}}")) {

        $reportData    =   $webClass->finance($field);

        $desc1 = str_replace("{{financial::$field}}", $reportData, $desc1);
    }
}



$briefingfile = explode(',', $functions->ibms_setting('briefingfile'));

foreach ($briefingfile as $field) {

    if (stristr($desc1, "{{files::$field}}")) {

        $reportData    =   $webClass->files($field);

        $desc1 = str_replace("{{files::$field}}", $reportData, $desc1);
    }
}



if($desc1){
include("header_new.php");
echo $desc1;
}else{
  echo'Page not found....';  
}
if($desc1){
if($pg == "about" || $pg=="terms-condition" || $pg=="privacy" || $pg=="complaints"){
    $box7 = $webClass->getBox("box7");
echo '
    <!-- Section 2 -->
    <div class="main_section section2">
        <div class="standard">
            <div class="sec2_inner flex_">
                <div class="leftFlex wow bounceInLeft" style="width: 60%">

                    <h1>' . $box7['heading2'] . '</h1>
                </div>
                <div class="rightFlex wow bounceInRight">
                    <a href="' . $box7['link'] . '" class="btn_gradient">
                        <span class="start">' . $box7['linkText'] . '</span>
                        <span class="hover">' . $box7['linkText'] . '</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
';
}
?>

<?php include("footer_new.php"); 
}?>