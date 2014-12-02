<?php 
require_once('CDiceMatch.php');

class CDiceGame extends CDice {

    // Sets the controls for the form
    public $controls = [
        'form_open'   => "<form action='dice.php' method='post'>",
        'form_close'  => "</form>",

        'roll'        => "<input type='submit' id='roll' name='roll' class='buttons' value='Kasta tärning' />",
        'save'        => "<input type='submit' id='save' name='save' class='buttons' value='Spara och stå över rundan' />",
        'next'        => "<input type='submit' id='next' name='next' class='buttons' value='Nästa spelare' />",
        'continue'   => "<input type='submit' id='continue' name='continue' class='buttons' value='Kasta tärning' />",
        'register'    => "<input type='submit' id='register_player' name='register_player' class='buttons' value='Börja spela' />",
        
        'player_name'   => "<p><label for='player1'>Namn spelare: </label><input type='text' name='player1' value='Spelare' required='required'/></p>",
        'player1_name'   => "<p><label for='player1'>Namn spelare 1: </label><input type='text' name='player1' value='Spelare 1' required='required'/><br>",
        'player2_name'   => "<label for='player2'>Namn spelare 2: </label><input type='text' name='player2' value='Spelare 2' required='required'/></p>",
        'cpu_name'   => "<input type='hidden' name='player2' value='Datorn' required='required'/>",

        'reset'       => "<input type='submit' id='reset' name='reset' class='buttons' value='Avsluta spelet' />",

        'mode_single' => "<input type='submit' id='single' name='single' class='buttons' value='Spela själv' />",
        'mode_multi'  => "<input type='submit' id='multi' name='multi' class='buttons' value='Spela mot en kompis' />",
        'mode_cpu'    => "<input type='submit' id='cpu' name='cpu' class='buttons' value='Spela mot datorn' />"
    ];

    // Define game menus
    public $menu = [
        'main' => [
            'controls' => null,
            'message'  => null
        ],
        'players' => [
            'controls' => null,
            'message' => null
        ],
        'start' => [
            'controls' => null,
            'message' => null
        ],
        'win' => [
            'controls' => null,
            'message' => null
        ],
        'roll' => [
            'controls' => null,
            'message' => null
        ],
        'roll_one' => [
            'controls' => null,
            'message' => null
        ],
        'save' => [
            'controls' => null,
            'message' => null
        ],
        'continue' => [
            'controls' => null,
            'message' => null
        ],
        'name_error' => [
            'controls' => null,
            'message' => null
        ]
    ];
    
    public function __construct ()
    {
    
        // defines the menus
        $this->menu['main']['controls'] = $this->controls['form_open'].$this->controls['mode_single'].
                                          $this->controls['mode_multi'].$this->controls['mode_cpu'].
                                          $this->controls['form_close'];
        $this->menu['single_player']['controls'] = $this->controls['form_open'].$this->controls['player_name'].
                                                   $this->controls['register'].$this->controls['form_close'];
        $this->menu['multi_player']['controls'] =  $this->controls['form_open'].$this->controls['player1_name'].
                                                   $this->controls['player2_name'].$this->controls['register'].
                                                   $this->controls['form_close'];
        $this->menu['player_vs_cpu']['controls'] = $this->controls['form_open'].$this->controls['player_name'].
                                                   $this->controls['cpu_name'].$this->controls['register'].
                                                   $this->controls['form_close'];
        $this->menu['start']['controls'] = $this->controls['form_open'].$this->controls['roll'].
                                           $this->controls['reset'].$this->controls['form_close'];
        
        // set the messages
        $this->menu['main']['message']    = "<p>Välj spelläge nedan:</p>";
        $this->menu['players']['message'] = "<p>Skriv in namn nedan:</p>";
        $this->menu['start']['message']   = "<p>Använd knappen nedan för att kasta en tärning.
            Målet är att uppnå 100 poäng. Kastar du en etta så nollställs dina poäng från 
            gången du senast sparade. Lycka till!</p>";
        $this->menu['name_error']['message'] = "<p class='warning'><i class='fa fa-warning'> </i>".
            "Spelarna får inte ha samma namn!</p>";

        if (!isset($_SESSION['game'])) {
            $_SESSION['menu'] = $this->menu;
            $this->setMessage($this->menu['main']['message']);
            $this->setControls($this->menu['main']['controls']);
        }

        if (isset($_POST['single']) || isset($_POST['multi']) || isset($_POST['cpu'])) {
            $this->gameStart();
        }
        
        if (isset ($_POST['save'])) {
            $_SESSION['game']['current_player']['save'] = $_SESSION['game']['current_player']['score'];
        }
        
        if (isset ($_POST['register'])) {
            $this->updateUI();
        }    
        
    }

    public function updateUI()
    {
        $this->menu['roll']['message'] = "<p></p>";
        $this->menu['roll']['controls'] = $this->controls['form_open'].$this->controls['roll'].
                                          $this->controls['save'].$this->controls['reset'].
                                          $this->controls['form_close'];

        $this->menu['roll_one']['message'] = "<p class='warning'><i class='fa fa-warning'> </i>
            Du kastade en etta! Dina poäng har återställts till då du senast sparade!</p>";
        
        $this->menu['roll_one']['controls'] = $this->menu['save']['controls'] =
                                              $this->controls['form_open'].$this->controls['next'].
                                              $this->controls['reset'].$this->controls['form_close'];
        $this->menu['save']['message'] = "<p class='success'><i class='fa fa-save'> </i> Dina poäng är sparade!</p>";
        
        $this->menu['continue']['controls'] = $this->controls['form_open'].$this->controls['continue'].
                                              $this->controls['reset'].$this->controls['form_close'];

        $this->menu['win']['message'] = "<p class='success'><i class='fa fa-trophy'> </i> ".
                    "Grattis, ".$_SESSION['game']['current_player']['name']."! Du har uppnått 100 poäng!</p>";
        
        $this->menu['lose']['message'] = "<p class='warning'><i class='fa fa-thumbs-o-down'> </i> ".
                    "Tyvärr, ".$_SESSION['game']['player1']['name'].". Du förlorade mot datorn!</p>";
        
        $this->menu['win']['controls'] = $this->controls['form_open'].
                                              $this->controls['reset'].$this->controls['form_close'];
        $this->menu['start']['controls'] = $this->controls['form_open'].$this->controls['roll'].
                                           $this->controls['reset'].$this->controls['form_close'];
        


        $_SESSION['menu'] = $this->menu;
        if ($_SESSION['game']['current_player']['name'] == $_SESSION['game']['player1']['name']) {
            $_SESSION['game']['player1'] = $_SESSION['game']['current_player'];
        } elseif ($_SESSION['game']['current_player']['name'] == $_SESSION['game']['player2']['name']) {
            $_SESSION['game']['player2'] = $_SESSION['game']['current_player'];
        }

        // Header start
        if (isset($_SESSION['game']['current_player'])) {
            $_SESSION['header'] = "<div class='player_wrapper_label'><i class='fa fa-user'></i>&nbsp;</div>".
                "<div class='player_wrapper'>".$_SESSION['game']['current_player']['name']."</div>";
            
            if (isset ($_SESSION['game']['player1']['score'])) {
                $_SESSION['header'] .= "<div class='point_wrapper'>".
                "<div class='player_wrapper_label'>".$_SESSION['game']['player1']['name']."</div>".
                 "<div class='player_wrapper'>".$_SESSION['game']['player1']['score']."</div>".
                 "</div>";
            }
            if (isset ($_SESSION['game']['mode']) && $_SESSION['game']['mode'] != 'single') {
                 $_SESSION['header'] .= "<br><div class='point_wrapper'>".
                "<div class='player_wrapper_label'>".$_SESSION['game']['player2']['name']."</div>".
                 "<div class='player_wrapper'>".$_SESSION['game']['player2']['score']."</div>".
                 "</div>";
            }

        }
        // Header stop
    }

    public function setGameMode($mode)
    {
        $_SESSION['game']['mode'] = $mode;       
    }

    public function setMessage($message)
    {
        $_SESSION['game']['message'] = $message;
    }

    public function setControls($controls)
    {
        $_SESSION['game']['controls'] = $controls;
    }

    public function gameStart($win = false)
    {
        if (isset ($_POST['single'])) {
            $this->setGameMode('single');
        } elseif (isset ($_POST['multi'])) {
            $this->setGameMode('multi');
        } elseif (isset ($_POST['cpu'])) {
            $this->setGameMode('cpu');
        }

        if (isset ($_SESSION['game']['mode']) && !isset ($_SESSION['game']['current_player'])) {
            $this->setMessage('');
            switch ($_SESSION['game']['mode']) {
                case 'single':
                    $this->setControls($this->menu['single_player']['controls']);
                    break;
                case 'multi':
                    $this->setControls($this->menu['multi_player']['controls']);
                    break;
                case 'cpu':
                    $this->setControls($this->menu['player_vs_cpu']['controls']);
                    break;
            }
        }
    }
}