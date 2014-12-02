<?php

class CDiceMatch {

    
    public function start($mode)
    {
        $_SESSION['game_mode'] = $mode;
        
        $_SESSION['current_player'] = $_SESSION['player1'];
        $_SESSION['dice_message'] = "<p>Använd knappen nedan för att kasta en tärning. 
            Målet är att uppnå 100 poäng. Kastar du en etta så nollställs dina poäng från 
            gången du senast sparade. Lycka till!</p>";
        $_SESSION['controls'] = "<form action='' method='post'>".
                                "<input type='submit' id='roll' name='roll' class='buttons' value='Kasta tärning' />".
                                "<input type='submit' id='reset' name='reset' class='buttons' value='Avsluta spelet' />".
                                "</form>";
        
    }

    public function name($mode)
    {
        if ($mode == 'single') {

            $_SESSION['dice_message'] = "<p><form action='' method='post'>".
            "<label for='player1'>Namn spelare: </label><input type='text' name='player1' required='required' />";
        } elseif ($mode == 'multi') {

            $_SESSION['dice_message'] = "<p><form action='' method='post'>".
            "<label for='player1'>Namn spelare 1: </label><input type='text' name='player1' required='required'/><br>".
            "<label for='player1'>Namn spelare 2: </label><input type='text' name='player2' required='required'/>";
        } elseif ($mode == 'cpu') {
            $_SESSION['dice_message'] = "<p><form action='' method='post'>".
            "<label for='player1'>Namn spelare: </label><input type='text' name='player1' required='required' />".
            "<input type='hidden' name='player2' value='Datorn' required='required'/>";
        }
            $_SESSION['controls'] = 
            "<input type='submit' id='register_player' name='register_player' class='buttons' value='Börja spela' />".
            "</form></p>";
    }

}
