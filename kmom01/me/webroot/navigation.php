<?php

// Set menu items array
$menu = array(
	'callback' => 'modifyNavbar',
	'items' => array(
	'index' => array('text'=>'Hem', 'url'=>'index.php', 'class' => null),
	'reports'  => array('text'=>'Resovisningar', 'url'=>'reports.php', 'class' => null),
	'source' => array('text'=>'Källkod', 'url'=>'source.php', 'class' => null)
	)
);