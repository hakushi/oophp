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
<h1>Testa loop-konstruktioner while() och for()</h1>

<?php
echo "<p>Count to ten using a while-loop.</p>";
$i = 0;
while($i <= 10) {
  echo "$i<br>";
  $i++;
}

echo "<p>Count to ten using a do-while-loop.</p>";
$i = 0;
do {
  echo "$i<br>";
  $i++;
} while($i <= 10);

echo "<p>Count to ten using a for-loop.</p>";
for($i = 0; $i <= 10; $i++) {
  echo "$i<br>";
}
?>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
