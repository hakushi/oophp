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
<h1>Testa villkor med if-satser</h1>

<?php

$a = 242;
$b = 666;

if($a < $b) {
  echo "<p>$a är mindre än $b</p>";
}

if($a > $b) {
  echo "<p>$a är större än $b</p>";
} 
else {
  echo "<p>$a är mindre än (eller lika med) $b</p>";
}

if($a > $b) {
  echo "<p>$a är större än $b</p>";
} 
else if($a == $b) {
  echo "<p>$a är lika med $b</p>";
} 
else {
  echo "<p>$a är verkligen mindre än $b</p>";
}

if($a == 42 && $b == 1337) {
  echo "<p>$a = 42 OCH $b = 1337</p>";
}
else if($a == 42 || $b == 1337) {
  echo "<p>$a = 42 ELLER $b = 1337</p>";
}
else {
  echo "<p>Någon har mixtrat med filen och ändrat värdena i både \$a och \$b. Bra gjort.";
}
?>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>