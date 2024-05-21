<?php
header('Content-Type: application/xml; charset=utf-8');
//multi language PENDING
include("global.php");

global $webClass;
// sitemap

$links      =   array();

$links[]    =   "Main Links";
$links[]    =   array(
    "loc"       => WEB_URL,
    "lastmod"   => date("Y-m-d"),
    "changefreq"=> "weekly",
    "priority"  => "1.0",
    "extLink"  => "?"
);
//Get Pages Links
$sql    = "SELECT slug,dateTime,page_pk FROM  pages WHERE publish = '1'";
$data   = $dbF->getRows($sql);
foreach($data as $val){
$link = WEB_URL."/".$db->dataPage.$val['slug'];
$page_pk = "/page-".$val['page_pk'];
$sqlID    = "SELECT id FROM seo WHERE ref_id = '$page_pk'";
$dataID   = $dbF->getRow($sqlID);
$seoid=$dataID['id'];
$sql_seo_slug = "SELECT slug FROM seo_slug WHERE seo_id = '$seoid' and slug != ''";
$check_seo_slug = $dbF->getRow($sql_seo_slug);
if ($dbF->rowCount > 0){
$link = WEB_URL . "/" . $check_seo_slug['slug'];
}else{
$link = WEB_URL."/".$db->dataPage.$val['slug'];
}



    $date = date("Y-m-d",strtotime($val['dateTime']));
    $links[]    =   array(
        "loc"       => $link,
        "lastmod"   => $date,
        "priority"  => "0.8",
        "extLink"  => "&"
    );
}


//get Categories
$links[] = "Main Categories";
category();


//Get Products that are active
$links[] = "Main Products";
$date   =date('m/d/Y');
$sql    ="SELECT prodet_id,prodet_timeStamp,slug
                    FROM
                       `proudct_detail`
                        WHERE
                            prodet_id IN (SELECT p_id FROM `product_setting`
                                            WHERE `setting_name`='publicAccess'
                                                  AND `setting_val`   = '1')
                            AND prodet_id IN (SELECT p_id FROM `product_setting`
                                            WHERE `setting_name`='launchDate'
                                                  AND `setting_val`  <= '$date')
                            AND `proudct_detail`.`product_update` = '1'
                     ORDER BY `proudct_detail`.`prodet_id` ASC";
$data   = $dbF->getRows($sql);
foreach($data as $val){
    //$link = WEB_URL."/detail?pId=".$val['prodet_id'];
    $link         =   WEB_URL."/".$db->productDetail."$val[slug]"; // product slug



$page_pk = "/product-".$val['prodet_id'];
$sqlID    = "SELECT id FROM seo WHERE ref_id = '$page_pk'";
$dataID   = $dbF->getRow($sqlID);
$seoid=$dataID['id'];
$sql_seo_slug = "SELECT slug FROM seo_slug WHERE seo_id = '$seoid' and slug != ''";
$check_seo_slug = $dbF->getRow($sql_seo_slug);
if ($dbF->rowCount > 0){
$link = WEB_URL . "/" . $check_seo_slug['slug'];
}else{
$link         =   WEB_URL."/".$db->productDetail."$val[slug]"; // product slug
}



    $date = date("Y-m-d",strtotime($val['prodet_timeStamp']));
    $links[]    =   array(
        "loc"       => $link,
        "lastmod"   => $date,
        "changefreq"=> "monthly",
        "priority"  => "1.0",
        "extLink"  => "&"
    );
}


//get Deal Product categories if have
if($functions->developer_setting('dealProduct') == '1') {
    $links[] = "Deals Categories";
    category("productDeals");

    //get deal products
    $links[] = "Deals Products";
    $sql    = "SELECT id,slug,dateTime FROM  product_deal WHERE publish = '1'";
    $data   = $dbF->getRows($sql);
foreach($data as $val){
//$link = WEB_URL."/productDeals?deal=".$val['id'];
$link         =   WEB_URL."/".$db->dealProduct."$val[slug]"; // product slug


$page_pk = "/deal-".$val['id'];
$sqlID    = "SELECT id FROM seo WHERE ref_id = '$page_pk'";
$dataID   = $dbF->getRow($sqlID);
$seoid=$dataID['id'];
$sql_seo_slug = "SELECT slug FROM seo_slug WHERE seo_id = '$seoid' and slug != ''";
$check_seo_slug = $dbF->getRow($sql_seo_slug);
if ($dbF->rowCount > 0){
$link = WEB_URL . "/" . $check_seo_slug['slug'];
}else{
$link         =   WEB_URL."/".$db->dealProduct."$val[slug]"; // product slug

}





        $date = date("Y-m-d",strtotime($val['dateTime']));
        $links[]    =   array(
            "loc"       => $link,
            "changefreq"=> "monthly",
            "priority"  => "0.6",
            "extLink"  => "&",
              "lastmod"   => $date
        );
    }
}

//Functions
//Categories
function category($page = "products")
{
    global $links;
    global $dbF;
    global $db;

    $sql = "SELECT * FROM `categories` WHERE id != '1'";
    $data = $dbF->getRows($sql);
    $link = WEB_URL . "/$page";
    $links[] = array(
        "loc" => $link,
        "extLink"  => "?"
    );

    if($page=='products') {
        $link = WEB_URL . "/".$db->pCategory;
        $link1 = $db->pCategory;
    }else {
        $link = WEB_URL . "/".$db->dealCategory;
        $link1 = $db->dealCategory;
    }

    foreach ($data as $val) {
        //$linkT = $link . "?cat=$val[nm]&catId=$val[id]";

$name = translateFromSerialize($val['name']);

$linkT  =  $link."$val[id]-$name"; // pCategory slug


$page_pk = "/".$link1."-".$val['id'];


$sqlID    = "SELECT id FROM seo WHERE ref_id = '$page_pk'";
$dataID   = $dbF->getRow($sqlID);
$seoid=$dataID['id'];
$sql_seo_slug = "SELECT slug FROM seo_slug WHERE seo_id = '$seoid' and slug != ''";
$check_seo_slug = $dbF->getRow($sql_seo_slug);
if ($dbF->rowCount > 0){
$linkT = WEB_URL . "/" . $check_seo_slug['slug'];
}else{
$linkT  =  $link."$val[id]-$name"; // pCategory slug

}

$linkT=preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $linkT);


        $slug = translateFromSerialize($val['name']);
        $links[] = array(
            "loc" => $linkT,
            "priority"  => "0.7",
            "extLink"  => "&"
        );
    }
}


/**
 *
 *  Final Print XML
 *
 */
header('Content-Type: application/xml; charset=utf-8');


$newLine = "";
$tab  = "";
$msg = "";
// $msg = "<!-- use ?view to view Proper data --> ";
$msg = "";
if(isset($_GET['view']) || isset($_GET['uncompress'])){
    $newLine = "\n";
    $tab = "\t";
    $msg = "";
}

/*echo $msg.'<?xml version="1.0" encoding="UTF-8"?> <!-- use ?view to view Proper data -->'.$newLine.'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

*/
echo $msg.'<?xml version="1.0" encoding="utf-8" standalone="no"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';


foreach($links as $val){


    if(!is_array($val)){
        if(empty($msg)) {
            echo $newLine . $newLine . "";
            // echo $newLine . $newLine . "<!-- $val -->";
        }
        continue;
    }
    echo $newLine."<url>";
    foreach($val as $key=>$property){
        if($key=='extLink') continue;
        echo $newLine.$tab."<$key>$property</$key>";
    }
    echo $newLine."</url>";
}

echo $newLine."</urlset>";