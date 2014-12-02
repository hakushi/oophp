<?php 
     // dump($_SESSION);

if (isset($_POST['reset'])) {
    session_destroy();
    $_SESSION = array();
    
}
if (isset($_POST['next']) ) {
    $Dice->changePlayer();
}

if (!isset($_SESSION['game_mode'])) {
    $DiceGame->start();
}

if (isset ($_POST['single']) || isset ($_POST['multi']) || isset ($_POST['cpu'])) {
     // dd($_SESSION);
    $_SESSION['game_mode'] = key($_POST);
    $DiceMatch->name($_SESSION['game_mode']);
}
if (isset($_POST['player1'])) {
    $_SESSION['player1'] = $_POST['player1'];
}

if (isset($_POST['player2'])) {
    $_SESSION['player2'] = $_POST['player2'];
}

if (isset($_SESSION['game_mode']) && isset($_SESSION['player1']) && !isset( $_SESSION['current_player'])) {
    $DiceMatch->start($_SESSION['game_mode']);
}
if (isset($_POST['roll'])) {
    $Dice->printDice();
}

// dump($_SESSION);    
if (isset($_POST['save'])) {
    $Dice->saveDice();
}

if (isset($_POST['next-save'])) {
    $Dice->saveDice();
    $Dice->changePlayer();
}


if (isset ($_SESSION['dice_message'])) {
    $message = $_SESSION['dice_message'];
}
if (isset($_SESSION['current_player'])) {

    if (isset($_SESSION[$_SESSION['current_player']]['dice'])) {
        $dice = $_SESSION[$_SESSION['current_player']]['dice'];
    }
    if (isset($_SESSION[$_SESSION['current_player']]['dice_last'])) {
        $dice_last = $_SESSION[$_SESSION['current_player']]['dice_last'];
    }
    if (isset($_SESSION[$_SESSION['current_player']]['dice_last_print'])) {
        $dice_last_print = $_SESSION[$_SESSION['current_player']]['dice_last_print'];
    }
        

}
if (!isset($_SESSION['current_player']) || !isset($_SESSION[$_SESSION['current_player']]['dice_saved_print'])) {
    $dice_saved_print = null;
} elseif ($_SESSION['game_mode'] == 'single') {
    $dice_saved_print = $_SESSION[$_SESSION['current_player']]['dice_saved_print'];
} else {
    $dice_saved_print = $_SESSION[$_SESSION['player1']]['dice_saved_print'];
    if (isset($_SESSION[$_SESSION['player2']]['dice_saved_print'])) {
        $dice_saved_print .= $_SESSION[$_SESSION['player2']]['dice_saved_print'];
    }
}

if (isset($_SESSION['player1'])) {
    $player1 = $_SESSION['player1'];
}
if (isset($_SESSION['player2'])) {
    $player2 = $_SESSION['player2'];
}
if (isset($_SESSION['current_player'])) {
    $player = $_SESSION['current_player'];
    
}

$controls = $_SESSION['controls'];

if (!isset($dice_last_print)) {
    $dice_last_print = "";
}

if (isset ($_SESSION['current_player'])) {
    $tard['main'] = "<article><div class='player_wrapper_label'><i class='fa fa-user'> </i></div><div class='player_wrapper'>".$_SESSION['current_player']."</div>";
} else {
    $tard['main'] = "<article>";
}

if (isset ($_SESSION['player2']) && isset($_SESSION[$_SESSION['player2']]['dice'])){
    $tard['main'] .= "<div class='point_wrapper'><div class='player_wrapper'>".$player1."</div><div class='player_wrapper_label'>".$_SESSION[$_SESSION['player1']]['dice']."</div> ";
    $tard['main'] .= "<div class='player_wrapper'>".$player2."</div><div class='player_wrapper_label'>".$_SESSION[$_SESSION['player2']]['dice']."</div></div>";
}