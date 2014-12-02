<?php 


//Include the main config file
include(__DIR__.'/config.php');

// destroys session (for testing purposes)
if (isset($_GET['ds'])) {
    ds();
}

$tard['title'] = "Kalender";

//Uncomment to include navigation header
include(__DIR__.'/navigation.php');

$Calendar = new CCalendar;


if (isset ($_GET['y']) && isset($_GET['m'])) {
    $year = $_GET['y'];
    $month = $_GET['m'];
} else {
    $year = date('Y');
    $month = date('m');
}

$tard['main'] = "<article>" . $Calendar->printCalendar($month, $year) . "</article>";

include(TARD_THEME_PATH);
