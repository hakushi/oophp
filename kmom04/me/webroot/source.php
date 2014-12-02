<?php 
//Include the main config file
include(__DIR__.'/config.php'); 

$tard['title'] = "Visa källkod";

$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..'));
//Uncomment to include navigation header
include(__DIR__.'/navigation.php');

$tard['main'] = <<< EOD
<article>
	<h2>
	Visa källkod
	</h2>
EOD;
$tard['main'] .= $source->View(). "</article>";

include(TARD_THEME_PATH);