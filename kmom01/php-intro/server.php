<?php
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly
?>

<!doctype html>
<html lang="sv"> 
<head>
<meta charset="utf-8"/>
<title>php20</title>
</head>
<body>
<h1>Fördefinierade variabler, $_SERVER</h1>

<?php
echo "<p>IP-adress till den som öppnade denna sidan: " . htmlentities($_SERVER['REMOTE_ADDR']);
echo "<p>I HTTP_USER_AGENT går det att utläsa vilken webbläsare som används: " . htmlentities($_SERVER['HTTP_USER_AGENT']);
echo "<p>Allt innehåll i arrayen \$_SERVER:<br><pre>" . htmlentities(print_r($_SERVER, 1)) . "</pre>";
?>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>

