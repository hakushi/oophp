<?php 


class CDiceGame {

    public static function start($win = false)
    {
        if ($win == false) {
            $_SESSION['dice_message'] = "<p>Välj spelläge nedan:</p>";
        } else {
            session_destroy();
            $_SESSION['dice_message'] .= "<p>Vill du spela igen? Välj läge nedan:</p>";
        }
        
            $_SESSION['controls'] = "<form action='' method='post'>".
                                    "<input type='submit' id='single' name='single' class='buttons' value='Spela själv' />".
                                    "<input type='submit' id='multi' name='multi' class='buttons' value='Spela mot en kompis' />".
                                    "<input type='submit' id='cpu' name='cpu' class='buttons' value='Spela mot datorn' />".
                                    "</form>";
        
    }

}