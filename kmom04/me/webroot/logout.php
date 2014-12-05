<?php


//Include the main config file
include(__DIR__.'/config.php');
$tard['title'] = "Logout";

if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}
//Uncomment to include navigation header
include(__DIR__.'/navigation.php');

$tard['main'] = <<< EOD
<article>

    <p>Du har loggat ut!</p>

</article>
EOD;
include(TARD_THEME_PATH);