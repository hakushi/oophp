<?php 
/**
 * sets variables for output in dice.php
 */

$roll = $rolls = $header = null;

if (isset($_SESSION['game']['current_player'])) {
    $player = $_SESSION['game']['current_player']['name'];
    if (isset($_SESSION['game']['current_player']['roll'])) {
        $rolls = '<div class="dice_wrapper">';
        foreach ($_SESSION['game']['current_player']['rolls'] as $val) {
            $rolls .= $Dice->printDice($val);
        }
        $rolls .= '</div>';
    }
}
if (isset($_SESSION['header'])) {
    $header = $_SESSION['header'];
}

$message = $_SESSION['game']['message'];
$controls = $_SESSION['game']['controls'];
