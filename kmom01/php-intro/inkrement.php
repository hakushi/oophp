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
<h1>Inkrementering och dekrementering</h1>

<?php
$a = 42;

echo $a++ . "<br>";  // Skriv ut värdet på variabeln och öka det sedan med 1

echo --$a . "<br>";  // Skriv ut värdet på variabeln men minska det med 1 innan du tar dess värde.
?>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
