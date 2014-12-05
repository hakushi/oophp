<?php

//Include the main config file
include(__DIR__.'/config.php');

$tard['title'] = "Login";

$login_form = "
    <form name='login' method='post' action=''>

            <label for='username'>Användarnamn: </label>

            <input type='text' name='username' />

            <label for='password'>Lösenord: </label>

            <input type='password' name='password'>

            <input type='submit' name='login' value='logga in' />

        </form>";

$message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $CLogin    = new CLogin($username, $password, $CDatabase);

    $user = $CLogin->login();

    if ($user) {
        $_SESSION['user'] = $user->name;
        $login_form = '';
    } else {
        $message = 'Kunde inte hitta någon användare med angivet användarnamn och/eller lösenord.';
    }
}

$status = (isset($_SESSION['user'])) ? 'inloggad som ' . $_SESSION['user'] : 'inte inloggad';

//Uncomment to include navigation header
include(__DIR__.'/navigation.php');

$tard['main'] = <<< EOD
<article>
    <p class='warning'>$message<p>

    <p>Du är $status.</p>

    $login_form

</article>
EOD;
include(TARD_THEME_PATH);