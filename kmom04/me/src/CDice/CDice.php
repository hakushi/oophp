<?php
require_once('CDiceGame.php');

class CDice
{
    // Dice array for the printed dice 
    public $diceView = [
        [0,0,0,0,1,0,0,0,0], [0,0,0,1,0,1,0,0,0], [1,0,0,0,1,0,0,0,1],
        [1,0,1,0,0,0,1,0,1], [1,0,1,0,1,0,1,0,1], [1,0,1,1,0,1,1,0,1]
    ];
    public $player = null;

    public function __construct ()
    {
        if (isset ($_POST['reset'])) {
            session_destroy();
            $_SESSION = array();
        }

        if (isset($_SESSION['game']['current_player'])) {
            $player = $_SESSION['game']['current_player'];
        }
    }

    // rolls a dice
    public static function roll()
    {
        return rand(1, 6);
    }

    // prints a rolled dice
    public function printDice($rolledDice)
    {
        $diceArr = $this->diceView[$rolledDice-1];
        $dice = "<table class='dice'>";
        $diceBlank = "<td>&nbsp;</td>";
        $diceDot = "<td><i class='fa fa-circle'> </i></td>";
        
        $i = 0;
        
        for ($i = 0; $i< 9; $i++) {
            if ($i == 0 || $i == 3 || $i ==6) {
                $dice .= "<tr>";
            }
            $dice .= (($diceArr[$i] == 0) ? $diceBlank : $diceDot);
            if ($i == 2 || $i == 5 || $i == 8) {
                $dice .= "</tr>";
            }
        }
        $dice .= "</table>";

        return $dice;
    }   
    public function rollDice()
    {
        // echo $_SESSION['current_player'];
        $roll = $this->roll();
        $_SESSION['game']['current_player']['rolls'][] = $roll;
        $_SESSION['game']['current_player']['roll'] = $roll;
        if ($roll == 1) {
            if (isset ($_SESSION['game']['current_player']['save'])) {
                $_SESSION['game']['current_player']['score'] =
                    $_SESSION['game']['current_player']['save'];
                $_SESSION['game']['current_player']['saved_rolls'][] =
                    $_SESSION['game']['current_player']['rolls'];
            } else {
                $_SESSION['game']['current_player']['score'] = 0;
            }
        } elseif (isset($_SESSION['game']['current_player']['score'])) {
            $_SESSION['game']['current_player']['score'] += $roll;
        } else {
            $_SESSION['game']['current_player']['score'] = $roll;
        }
        $this->updateUI();

        return $roll;
    }
    public function cpuRoll()
    {
        do {
            $i = rand(1, 100);
            $roll = $this-> rollDice();
            if ($roll == 1) {
                break;
            } elseif ($_SESSION['game']['current_player']['score'] >= 100) {
                break;
            } elseif ($i < 20) {
                $_SESSION['game']['current_player']['save'] = $_SESSION['game']['current_player']['score'];
            }
        } while ($i >= 20);
    }
}
