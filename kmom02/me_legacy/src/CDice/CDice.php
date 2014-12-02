<?php

class CDice
{
    public $control_roll = "<input type='submit' id='roll' name='roll' class='buttons' value='Kasta tärning' />";
    public $control_save = "<input type='submit' id='save' name='save' class='buttons' value='Spara och stå över rundan'>";
    public $control_next = "<input type='submit' id='next' name='next' class='buttons' value='Nästa spelare'>";
    public $control_next_save = "<input type='submit' id='next' name='next-save' class='buttons' value='Din tur!' />";
    public $control_reset = "<input type='submit' id='reset' name='reset' class='buttons' value='Avsluta spelet' />";
    public $control_form_open = "<form action='' method='post'>";
    public $control_form_close = "</form>";

    public static function rollDice()
    {
        if (!isset ($_SESSION[$_SESSION['current_player']]['dice'])) {
            $_SESSION[$_SESSION['current_player']]['dice'] = 0;
        }

        $roll = rand(1, 6);
        $_SESSION[$_SESSION['current_player']]['dice'] += $roll;
        
        return $roll;
    }

    public function printDice()
    {
           
        $roll = (integer) $this->rollDice();
        
        $_SESSION[$_SESSION['current_player']]['dice_last'] = $roll;
        
        $diceView = [
            [0,0,0,0,1,0,0,0,0], [0,0,0,1,0,1,0,0,0], [1,0,0,0,1,0,0,0,1],
            [1,0,1,0,0,0,1,0,1], [1,0,1,0,1,0,1,0,1], [1,0,1,1,0,1,1,0,1]
        ];
        
        $diceArr = $diceView[$roll-1];
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
        
        if (!isset ($_SESSION[$_SESSION['current_player']]['dice_last_print'])) {
            $_SESSION[$_SESSION['current_player']]['dice_last_print'] = "";
        }
            $_SESSION[$_SESSION['current_player']]['dice_last_print'] = $_SESSION[$_SESSION['current_player']]['dice_last_print'].$dice;

        if ($roll == 1) {
            if (!isset($_SESSION[$_SESSION['current_player']]['dice_save'])) {
                $_SESSION[$_SESSION['current_player']]['dice_save'] = 0;
                
            }
            $_SESSION[$_SESSION['current_player']]['dice'] = $_SESSION[$_SESSION['current_player']]['dice_save'];
            $_SESSION['controls'] = $this->control_form_open.$this->control_next.
            $this->control_reset.$this->control_form_close;

            $_SESSION['dice_message'] = "<p class='warning'><i class='fa fa-warning'> </i> Du kastade en etta! Dina poäng har återställts till
                                         då du senast sparade!</p>
                                         <p>Din totala poäng är: <strong>". $_SESSION[$_SESSION['current_player']]['dice']."</strong></p>";
            $_SESSION['roll_one'] = true;
        } elseif ($_SESSION[$_SESSION['current_player']]['dice'] >= 100) {
            $_SESSION['dice_message'] = "<p class='success'><i class='fa fa-angellist'> </i> Du har uppnått 100 poäng! Grattis!</p>";
            $_SESSION[$_SESSION['current_player']]['dice'] = 0;
            CDiceGame::start($win = true);
            
        } else {
            $_SESSION['dice_message'] = "<p>Ditt senaste kast var en <strong>".$_SESSION[$_SESSION['current_player']]['dice_last'].":a</strong></p>".
                                        "<p>Din totala poäng är: <strong>". $_SESSION[$_SESSION['current_player']]['dice']."</strong></p>";
            $_SESSION['controls'] = $this->control_form_open.$this->control_roll.$this->control_save.
            $this->control_reset.$this->control_form_close;
        }
        return $roll;
    }

    public function saveDice()
    {
        //dice_save
        $_SESSION[$_SESSION['current_player']]['dice_save'] = $_SESSION[$_SESSION['current_player']]['dice'];
        
        //dice_message
        $_SESSION['dice_message'] = "<p class='success'>Dina poäng är sparade!</p>".$_SESSION['dice_message'];
        
        
        if (!isset($_SESSION[$_SESSION['current_player']]['dice_saved_print']) ||
            $_SESSION[$_SESSION['current_player']]['dice_saved_print'] == null) {
                $_SESSION[$_SESSION['current_player']]['dice_saved_print'] =
                    "<h1 class='saved_dices_heading'>".$_SESSION['current_player']."s sparade kast:</h1>";
        }
        
        $_SESSION[$_SESSION['current_player']]['dice_saved_print'] .=
            "<span class='saved_dices_group'>".$_SESSION[$_SESSION['current_player']]['dice_last_print']."</span>";
        
        $_SESSION[$_SESSION['current_player']]['dice_last_print'] = null;
        
        if ($_SESSION['game_mode'] != 'single') {
            $_SESSION['controls'] = $this->control_form_open.$this->control_next.$this
                                         ->control_reset.$this->control_form_close;
        } else {
            $_SESSION['controls'] = $this->control_form_open.$this->control_roll.$this
                                         ->control_reset.$this->control_form_close;
        }
    }

    public function changePlayer()
    {
        if ($_SESSION['current_player'] == $_SESSION['player1']) {
            $_SESSION['current_player'] = $_SESSION['player2'];
        } elseif ($_SESSION['current_player'] == $_SESSION['player2']) {
            $_SESSION['current_player'] = $_SESSION['player1'];
        }
        if (!($_SESSION['game_mode'] == 'cpu' && $_SESSION['current_player'] == $_SESSION['player2'])) {

            if (isset($_SESSION[$_SESSION['current_player']]['dice_last'])) {
                $_SESSION['dice_message'] = 
                    "<p>Ditt senaste kast var en <strong>".$_SESSION[$_SESSION['current_player']]['dice_last'].
                    ":a</strong></p>".
                    "<p>Din totala poäng är: <strong>". $_SESSION[$_SESSION['current_player']]['dice'].
                    "</strong></p>";
            } else {
                $_SESSION['dice_message'] = "<p>Använd knappen nedan för att kasta en tärning. 
                    Målet är att uppnå 100 poäng. Kastar du en etta så nollställs dina poäng från 
                    gången du senast sparade. Lycka till!</p>";
            }
                $_SESSION['controls'] = $this->control_form_open.$this->control_roll.$this->control_reset.$this->control_form_close;
        } else {
                
                do {
                    $i = rand(1, 100);
                    $roll = $this->printDice();
                    if($roll == 1 || $_SESSION[$_SESSION['current_player']]['dice'] >= 100) {
                        break;
                    }
                } while ($i > 20);

                $_SESSION['controls'] = $this->control_form_open.$this->control_next_save.$this->control_reset.$this->control_form_close;
        }
    }
}

