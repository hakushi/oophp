<?php 
//Include the main config file
include(__DIR__.'/config.php'); 

$tard['title'] = "Tard";

//Uncomment to include navigation header
// include(__DIR__.'/navigation.php');

$tard['main'] = <<<EOD
<h1>I Made a webpage once.</h1>
<p>It was awful.</p>
<img src="img/tard.jpg" style="width:25%" alt="Tard logo">
EOD;

include(TARD_THEME_PATH);
