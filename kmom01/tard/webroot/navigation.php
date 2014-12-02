<?php

// Set menu items array
$menu = array(
	'callback' => 'modifyNavbar',
	'items' => array(
	'home'  => array('text'=>'Home', 'url'=>'?p=home', 'class' => null),
	'away'  => array('text'=>'Away', 'url'=>'?p=away', 'class' => null),
	'about' => array('text'=>'About', 'url'=>'?p=about', 'class' => null)
	)
);