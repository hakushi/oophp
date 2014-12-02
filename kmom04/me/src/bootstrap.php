<?php
//Bootstrap functions

//Tard exeption handler
function myExceptionHandler($exception)
{
    echo "Tard: Uncaught exception: <p>" . $exception->getMessage() .
        "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');

//Class autoloader
function myAutoloader($class)
{
    $path = TARD_INSTALL_PATH . "/src/{$class}/{$class}.php";
    if (is_file($path)) {
        include ($path);
    } else {
        throw new Exception("Classfile '{$class}' does not exists.");
    }
}

spl_autoload_register('myAutoloader');

function dump($array)
{
    echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}

function dd($var)
{
    die(var_dump($var));
}

function ds()
{
    session_destroy();
    $_SESSION = array();
}
function getCurrentUrl()
{
    $url = "http";
    $url .= (@$_SERVER["HTTPS"] == "on") ? 's' : '';
    $url .= "://";
    $serverPort = ($_SERVER["SERVER_PORT"] == "80") ? '' :
    (($_SERVER["SERVER_PORT"] == 443 && @$_SERVER["HTTPS"] == "on") ? '' : ":{$_SERVER['SERVER_PORT']}");
    $url .= $_SERVER["SERVER_NAME"] . $serverPort . htmlspecialchars($_SERVER["REQUEST_URI"]);
    return $url;
}
 