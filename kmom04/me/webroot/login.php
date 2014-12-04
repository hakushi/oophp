<?php
 
//Include the main config file
include(__DIR__.'/config.php');
$tard['title'] = "Login";

//Uncomment to include navigation header
include(__DIR__.'/navigation.php');

if (isset($_POST['username']) && isset($_POST['password'])) {

    $settings = [
        'host'     => 'localhost',
        'db'       => 'oophp',
        'login'    => 'homestead',
        'password' => 'secret',
        'options'  => array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'")
    ];
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $CDatabase = new CDatabase($settings);
    $CDatabase->connectToDatabase();
    $CLogin    = new CLogin($username, $password, $CDatabase); 

    $user = $CLogin->login();

    if ($user) {
        $_SESSION['user'] = $user->name;
    }


    echo "user:  " . $_POST['username'] . '<br>';
    echo "lösen: " . $_POST['password'];
}

$status = (isset($_SESSION['user'])) ? 'inloggad som ' . $_SESSION['user'] : 'inte inloggad';

$tard['main'] = <<< EOD
<article>

    <p>Du är $status.</p>

    <form name='login' method='post' action=''>
    
        <label for='username'>Användarnamn: </label>
    
        <input type='text' name='username' />

        <label for='password'>Lösenord: </label>

        <input type='password' name='password'>

        <input type='submit' name='login' value='logga in' />
    </form>

</article>
EOD;
include(TARD_THEME_PATH);