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
<h1>Inbyggda funktioner i PHP</h1>

<?php
echo "<p>Talet PI är lika med: " . pi() . "</p>";
echo "<p>Kvadratroten ur talet 2 är lika med: " . sqrt(2) . "</p>";

echo "<p>Dagens datum och tid är nu " . date('r') . "</p>";
echo "<p>Så här många sekunder har det gått sedan den förste januari 1970: " . time() . "</p>";


echo "<p>Hur många tecken finns det i strängen 'Mumintrollet'? Svar: " . strlen('Mumintrollet') . "</p>";
echo "<p>Är strängen 'Hello' samma som 'hello'? Svar: </p>";
var_dump(strcmp('Hello', 'hello'));


echo "<p>Koda strängen 'moped' enligt ROT13: " . str_rot13('moped') . "</p>";
echo "<p>Hur ser en md5-hash av strängen 'MegaMic' ut? Svar: " . md5('MegaMic') . "</p>";
?>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
