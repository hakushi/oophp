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
<h1>Matematiska operatorer</h1>

<?php
echo (5 + 37) . "<br>";
echo (43 - 1) . "<br>";
echo (2 * 10 + 27 - 10 / 2) . "<br>";
echo (-42 * -1) . "<br>";
echo (9 % 5) . "<br>";
echo (5 % 3) . "<br>";
?>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
