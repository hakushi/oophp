<!DOCTYPE html>
<html>
<head>
	<title>Dynamic Menu</title>

	<style type="text/css">
		.navbar {display block;background-color:#333;font-family:Verdana;padding:0.5em;}
		.navbar a {background-color:#999;color:#fff;padding:0.2em;text-decoration:none;}
		.navbar a:hover {background-color:#666;padding:0.5em 0.2em 0.5em 0.2em}
		.navbar a.selected {background-color:#fff;padding:0.3em 0.2em 0.5em 0.2em;color:#333;}
	</style>
</head>

<?php

// Modify navbar before page load

function modifyNavbar($items) {
  $ref = isset($_GET['p']) && isset($items[$_GET['p']]) ? $_GET['p'] : null;
  if($ref) {
    $items[$ref]['class'] .= 'selected'; 
  }
  return $items;
}

// Set menu items array

$menu = array(
	'callback' => 'modifyNavbar',
	'items' => array(
	'home'  => array('text'=>'Home', 'url'=>'?p=home', 'class' => null),
	'away'  => array('text'=>'Away', 'url'=>'?p=away', 'class' => null),
	'about' => array('text'=>'About', 'url'=>'?p=about', 'class' => null)
	)
);

// Create navigation constructor class

class CNavigation {
  public static function GenerateMenu($menu, $class) {
    if(isset($menu['callback'])){
    	$items = call_user_func($menu['callback'], $menu['items']);
    }
    $html = "<nav class=$class>\n";
    foreach($items as $key => $item) {
    	$selected = ((isset($_GET['p'])) && $_GET['p'] == $key) ? 'selected' : null;
    	$html .= "<a href='{$item['url']}' class='{$selected}'>{$item['text']}</a>\n";
    }
    $html .= "</nav>\n";
    return $html;
  }
};

?>
<body>

<?= CNavigation::GenerateMenu($menu, 'navbar') ?>

</body>
</html>

