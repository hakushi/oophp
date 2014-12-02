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
<h1>Operatorer för jämförelse</h1>

<h2>Jämför två tal</h2>
<?php
$a = 42;
$b = 1337;

echo "<p>$a == $a<br>";
var_dump($a == $a); 

echo "<p>$a != $a<br>";
var_dump($a != $a); 

echo "<p>$b >= $a<br>";
var_dump($b >= $a);

echo "<p>$b < $a<br>";
var_dump($b <= $a); 
?>

<h2>Exakt och lös jämförelse och betydelsen av type juggling</h2>
<?php
$a = 42;
$b = "42";
$c = "1337 små grisar";

echo "<p>$a === $a<br>";
var_dump($a); 
var_dump($a); 
var_dump($a === $a); 

echo "<p>$b !== $a<br>";
var_dump($b); 
var_dump($a); 
var_dump($b !== $a); 

echo "<p>$c > $a<br>";
var_dump($c); 
var_dump($a); 
var_dump($c > $a); 

echo "<p>$a + $b<br>";
var_dump($a); 
var_dump($b); 
var_dump($a + $b); 

echo "<p>$c + $a<br>";
var_dump($c); 
var_dump($a); 
var_dump($c + $a); 
?>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
