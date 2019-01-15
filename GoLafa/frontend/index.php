<?php
    require_once "libs/Mobile_Detect.php";
    $detect = new Mobile_Detect;

    if( $detect->isMobile() && !$detect->isTablet() ){
        include_once("index-m.php");
    } else {
        include_once("index-d.php");
    }
?>