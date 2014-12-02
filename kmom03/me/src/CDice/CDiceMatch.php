<?php

class CDiceMatch extends CDiceGame{

    public function __construct ()
    {

        
        // ställ in namn
        if (isset ($_POST['player1']) && isset ($_POST['player2'])) {
            $this->setPlayerName(strip_tags($_POST['player1']), strip_tags($_POST['player2']));
        } elseif (isset ($_POST['player1'])) {
            $this->setPlayerName(strip_tags($_POST['player1']));
        }
        if (isset ($_SESSION['game']['player1']) && !isset ($_SESSION['game']['current_player'])) {
            $this->matchStart();
        }
        
        // växla spelare
        if (isset ($_POST['roll']) || isset ($_POST['continue']) || isset($_POST['next'])) {
            if (isset ($_POST['continue']) || isset ($_POST['next'])) {
                $this->changePlayer();
            }
        // kasta tärning
            if (isset($_POST['next'])) {
                $this->updateUI();
                
                if ($_SESSION['game']['current_player']['name'] == 'Datorn') {
                    $this->setMessage('');
                    $this->cpuRoll();                    
                } else {
                    // var_dump($this->menu);
                    $this->setControls($this->menu['start']['controls']);
                    $this->setMessage('<p><br><br><br><br></p>');
                }
            } else {
                $roll = $this->rollDice();
                     
                if ($roll == 1) {
                    if ($_SESSION['game']['mode'] == 'single') {
                        $this->setControls($_SESSION['menu']['continue']['controls']);
                    } else {
                        $this->setControls($_SESSION['menu']['roll_one']['controls']);
                    }
                    $this->setMessage($_SESSION['menu']['roll_one']['message']);
                } elseif ($_SESSION['game']['current_player']['score'] >= 100) {
                    $this->setControls($_SESSION['menu']['win']['controls']);
                    $this->setMessage($_SESSION['menu']['win']['message']);
                } else {
                    $this->setControls($_SESSION['menu']['roll']['controls']);
                    $this->setMessage($_SESSION['menu']['roll']['message']);
                }
            }
        }

        if (isset ($_SESSION['game']['current_player']) && $_SESSION['game']['current_player']['name'] == "Datorn" &&
           $_SESSION['game']['current_player']['score'] >= 100) {
                    $this->setControls($_SESSION['menu']['win']['controls']);
                    $this->setMessage($_SESSION['menu']['lose']['message']);
        }

        if (isset ($_POST['save'])) {
            if ($_SESSION['game']['mode'] == 'single') {
                $this->setControls($_SESSION['menu']['continue']['controls']);
            } else {
                $this->setControls($_SESSION['menu']['save']['controls']);
            }
            $this->setMessage($_SESSION['menu']['save']['message']);
        }
        
    }

    // starta matchen
    public function matchStart()
    {
        $this->changePlayer();
        $this->setMessage($_SESSION['menu']['start']['message']);
        $this->setControls($_SESSION['menu']['start']['controls']);
        $this->updateUI();
           
    }

    // växla spelare / ställ in spelare som börjar spela
    public function changePlayer()
    {
        if (!isset ($_SESSION['game']['current_player'])) {
            if ($_SESSION['game']['mode'] == 'multi') {
                $i = rand(0, 1);
                if ($i == 0) {
                    $_SESSION['game']['current_player'] = $_SESSION['game']['player1'];
                } else {
                    $_SESSION['game']['current_player'] = $_SESSION['game']['player2'];
                }
            } else {
                $_SESSION['game']['current_player'] = $_SESSION['game']['player1'];
            }
        } elseif ($_SESSION['game']['mode'] != 'single') {
            if ($_SESSION['game']['current_player']['name'] == $_SESSION['game']['player1']['name']) {
                $_SESSION['game']['player1'] = $_SESSION['game']['current_player'];
                $_SESSION['game']['current_player'] = $_SESSION['game']['player2'];
            } elseif ($_SESSION['game']['current_player']['name'] == $_SESSION['game']['player2']['name']) {
                $_SESSION['game']['player2'] = $_SESSION['game']['current_player'];
                $_SESSION['game']['current_player'] = $_SESSION['game']['player1'];
            }
        }

        $_SESSION['game']['current_player']['roll'] = null;
        $_SESSION['game']['current_player']['rolls'] = array();
    }

    // ställ in namn på spelarna
    public function setPlayerName($player1, $player2 = null)
    {
        if ($player1 != $player2) {
            $_SESSION['game']['player1']['name'] = $player1;
            $_SESSION['game']['player2']['name'] = $player2;
            $_SESSION['game']['player1']['score'] = 0;
            $_SESSION['game']['player2']['score'] = 0;
        }
    }
}
