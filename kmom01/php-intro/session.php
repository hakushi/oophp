<?php
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly

// Start the session
session_name('php20guiden');
session_start();

if(isset($_SESSION['count'])) {
  $_SESSION['count']++;
}
else {
  $_SESSION['count'] = 0;
}

if(isset($_GET['reset'])) {
  $_SESSION['count'] = 0;
}



?>

<!doctype html>
<html lang="sv"> 
<head>
<meta charset="utf-8"/>
<title>php20</title>
</head>
<body>
<h1>Fördefinierade variabler, $_SESSION</h1>

<?="<p>Allt innehåll i arrayen \$_SESSION:<br><pre>" . htmlentities(print_r($_SESSION, 1)) . "</pre>"?>

<?="<p>Session-ID: " . session_id() . "<br>" ?>
<?="<p>Session-namn: " . session_name() . "<br>" ?>
<?="<p>Sessionen lever i " . session_cache_expire() . " minurer<br>" ?>
<p><a href="?">Ladda om sidan och öka variabeln med ett</a> | <a href="?reset">Nollställ variabeln</a></p>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
