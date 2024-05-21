<?php include("global.php");
global $webClass;

//var_dump($seo);

$functions->includeOnceCustom("_models/functions/webNewsEvents.php");
$newsC = new web_news();
$showAllNews = "<div class='h3'><span>"._u($_e['LATEST NEWS'])."</span></div>";
if(!isset($_GET['n'])) {
    $newDiv =  $newsC->newsCollapse();
}else{
    $newsId = $_GET['n'];
    $newDiv =   $newsC->newsDetail($newsId);
    $showAllNews = "<div class='pull-right' style='display: inline-block;'><a href='".WEB_URL."/news' class='btn btn-xs btn-default themeButton-xs'>".$_e['Show All News'] ."</a></div>";
}

include("header.php");
?>
<style>
    .newsMain{
        margin: 20px auto;
    }
</style>


    <!--Inner Container Starts-->

    <div class="inner_details_container">
        <div class="inner_details_content container-fluid">

            <div class="newsMain">
                <div class=""><?php echo $showAllNews; ?></div>
                <?php echo $newDiv; ?>
            </div>

        </div>
    </div>

    <!--Inner Container Ends-->

<?php include("footer.php"); ?>