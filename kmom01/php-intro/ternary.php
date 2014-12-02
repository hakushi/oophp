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
<h1>Testa villkor med ternary operatorn</h1>

<?php
$b = 1;

// Så här gör du med en if-sats
$a = null;
if(isset($b)) {
  $a = $b + 1;
}

// Så här gör du med ternary operatorn
$a = isset($b) ? $a + 1 : null; 
?>

<p>$b = <?=isset($b) ? var_dump($b) : 'NULL'?></p>
<p>$a = <?=var_dump($a)?></p>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>

