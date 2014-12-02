<?php 
//Include the main config file
include(__DIR__.'/config.php');

$tard['title'] = "Tärning 100";
// ds();
// dump($_SESSION);
// session_destroy();
//Uncomment to include navigation header
include(__DIR__.'/navigation.php');

$Dice = new CDice;
$DiceGame = new CDiceGame;
$DiceMatch = new CDiceMatch;

require_once(__DIR__.'/../src/diceHelper.php');

$tard['main'] .= <<< EOD
    <div class="dice_wrapper">$dice_last_print</div>
    <p>$message</p>
    $controls
</article>

EOD;
if (isset($dice_last_print)) {
    $tard['main'] .= "<article class='dice_footer'>
    <div class='dice_wrapper_small'>$dice_saved_print</div>
    </article>";
}

if (isset($_SESSION['roll_one']) && $_SESSION['roll_one'] == true) {
    $_SESSION[$_SESSION['current_player']]['dice_last_print'] = null;
    $_SESSION['roll_one'] = false;
    $_SESSION['controls'] = $Dice->control_form_open.$Dice->control_roll.
        $Dice->control_save.$Dice->control_reset.$Dice->control_form_close;
 /*   if ($_SESSION['game_mode'] != 'single')
        $DiceMatch->changePlayer();*/
}

/*if (isset($_POST['save'])) {
    $DiceMatch->changePlayer();
}*/
// dump($_SESSION);
include(TARD_THEME_PATH);
