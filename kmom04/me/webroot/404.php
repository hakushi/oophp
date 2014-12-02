<?php 
/**
*
* 404 page for Tard
*
**/

// Basic config file
include(__DIR__.'/config.php'); 

//Set variables for the 404 page
$anax['title'] = "404";
$anax['header'] = "";
$anax['main'] = "<img src=\"img/no.png\">";
$anax['footer'] = "";

header("HTTP/1.0 404 Not Found");

include(TARD_THEME_PATH);
