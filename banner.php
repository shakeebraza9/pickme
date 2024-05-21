<?php 
include_once("global.php");
global $webClass;
global $menuClass;
global $functions;
global $_e;


global $menu;

global $db;

/** Help don't remove this
 *
    $bannersData    =   $webClass->web_banners();
    $banners = '';
    $pager = '';
    $i = 1;
    foreach($bannersData as $val){
        $title  =   $val['title'];
        $text   =   $val['text'];
        $image  =   $val['layer0'];
        $layer1 =   $val['layer1'];
        $layer2 =   $val['layer2'];
        $layer3 =   $val['layer3'];
        $link   =   $val['link'];
        $banners .= '<li><img src="'.$image.'" alt="'.$title.'"></li>';
        $pager  .= '<li class=""><a href="#'.$i.'" class=""></a></li>';
        $i++;
    }
    echo $banners; //where want
 * echo $pager; //where want
 *
 */

?>
         

 
 <ul id="banner">

    <?php
        $bannersData    =   $webClass->web_banners();
        $banners = '';
        $box3 = $webClass->getBox('box3');
        // $i = 0;
        foreach($bannersData as $val){
        // $id         =  $val['id'];
        // $title1      =  $val['title'];
        $video      =  $val['layer0'];
        // $link       =  $val['link'];
        // $linktext   =  $val['linkText'];
        // $text       =  $val['text'];
        // $layer1 =   $val['layer1'];
        // $layer2 =   $val['layer2'];
        // $layer3 =   $val['layer3'];

        $banners .= '  
                      <video loop autoplay muted width="100%" class="rev-slidebg" data-bgfit="cover"
                data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="">
                <source src="'.$video.'" type="video/mp4" />
              </video>
              ';
        }

echo $banners;   ?>

   </ul>
    
