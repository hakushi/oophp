<?php
/**
*
* Tard config file
*
**/

//Error reporting
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly

//Set swedish Locale
setlocale(LC_ALL, "sv_SE");

//Set paths
define('TARD_INSTALL_PATH', __DIR__ . '/..');
define('TARD_THEME_PATH', TARD_INSTALL_PATH . '/theme/render.php');

//Bootstrap source
include(TARD_INSTALL_PATH . '/src/bootstrap.php');

//Start session
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();

//Database settings


//set the $tard array
$tard = array();

//Site settings
$tard['lang']         = 'sv';
$tard['title_append'] = '';

$tard['header'] = "<span class='sitetitle'>Me.</span>";

require_once('../src/CCalendar/CCalendar.php');
$Calendar = new CCalendar;

if (isset ($_GET['y']) && isset($_GET['m'])) {
    $year = $_GET['y'];
    $month = $_GET['m'];
} else {
    $year = date('Y');
    $month = date('m');
}
$tard['header'] .= "<div id='tiny_cal'>".$Calendar->printTinyCalendar($month, $year)."</div>";


$tard['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright <i class="fa fa-copyright"></i> David Edström 2014 | 
<a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn-validering</a>
<a href="https://github.com/hakushi" target="_blank">
	<i class="fa fa-github fa-2x footer-icon"></i>
</a>
</span></footer>
EOD;

//Theme settings
$tard['stylesheets'] = array('css/style.css'); //base styles
$tard['stylesheets'][] = 'css/source.css'; //styles for CSource
$tard['stylesheets'][] = 'css/dice.css'; //styles for CSource
$tard['stylesheets'][] = 'css/navigation.css'; //styles for CNavigation
$tard['stylesheets'][] = 'css/game.css'; //styles Game database
$tard['stylesheets'][] = 'css/calendar.css'; //styles for CCalendar
$tard['stylesheets'][] = '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css'; //Font-awesome
$tard['favicon']    = 'favicon.ico';

//JavaScript settings
$tard['modernizr'] = 'js/modernizr.js';
$tard['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
$tard['javascript_include'] = array(); //add your included .js-files here

$tard['google_analytics'] = 'null'; //add your Google Analytics ID here