<?php
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly

// Set the cookie
$value = 'something from somewhere';

$output = null;
if(isset($_GET['set'])) {
  setcookie("TestCookie1", $value);
  setcookie("TestCookie2", $value, time()+3600);
  $output = "<p>Skapade två cookies med namn TestCookie1 och TestCookie2. <a href='?''>Ladda om sidan för att se dem</a>.</p>";
}
else if(isset($_GET['reset'])) {
  // Set time in past to trigger removal of cookie in browser
  setcookie("TestCookie1", "", time()-3600);
  setcookie("TestCookie2", "", time()-3600); 
  $output = "<p>Raderade två cookies med namn TestCookie1 och TestCookie2. <a href='?'>Ladda om sidan för att se att de inte finns kvar</a>.</p>";
}
?>

<!doctype html>
<html lang="sv"> 
<head>
<meta charset="utf-8"/>
<title>php20</title>
</head>
<body>
<h1>Fördefinierade variabler, $_COOKIE</h1>

<?="<p>Allt innehåll i arrayen \$_COOKIE:<br><pre>" . htmlentities(print_r($_COOKIE, 1)) . "</pre>"?>

<p><a href="?">Ladda om sidan</a> | <a href="?set">Skapa cookie</a> | <a href="?reset">Ta bort cookie</a></p>

<?=$output?>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>

