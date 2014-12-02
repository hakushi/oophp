<?php
/**
 * Get the url to the current page. 
 *
 * @return string as the url to the current page.
 */
function getCurrentUrl() {
  $url = "http";
  $url .= (@$_SERVER["HTTPS"] == "on") ? 's' : '';
  $url .= "://";
  $serverPort = ($_SERVER["SERVER_PORT"] == "80") ? '' :
    (($_SERVER["SERVER_PORT"] == 443 && @$_SERVER["HTTPS"] == "on") ? '' : ":{$_SERVER['SERVER_PORT']}");
  $url .= $_SERVER["SERVER_NAME"] . $serverPort . htmlspecialchars($_SERVER["REQUEST_URI"]);
  return $url;
}

$url = getCurrentUrl();

?><!doctype html>
<meta charset=utf-8>
<title>Get the url to current page</title>
<h1>Get the url to current page</h1>
<p>This is the url to this page:<br><a href='<?=$url?>'><?=$url?></a></p>
