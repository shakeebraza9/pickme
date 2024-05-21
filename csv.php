<?php

var_dump($_SERVER["HTTP_REFERER"]);


if(preg_match('@http://sharkspeed.@i',$_SERVER["HTTP_REFERER"]) || preg_match('@https://sharkspeed.@i',$_SERVER["HTTP_REFERER"])){
    var_dump("ss");
}else{
var_dump("s");
}
   
   
   
   