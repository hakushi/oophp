<?php 
//Include the main config file
include(__DIR__.'/config.php');

// destroys session (for testing purposes)
if (isset($_GET['ds'])) {
    ds();
}

$tard['title'] = "Tärning 100";

//Uncomment to include navigation header
include(__DIR__.'/navigation.php');

$Dice = new CDice;
$DiceGame = new CDiceGame;
$DiceMatch = new CDiceMatch;


require_once('dice_variables.php');

$tard['main'] = <<< EOD

<article>
    $header
    $rolls
    <br>
    $message
    <div class='controls'>$controls</div>
</article>
EOD;

include(TARD_THEME_PATH);
