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
<h1>Testa en switch/case-sats</h1>

<?php
//$a = 42;
//$a = 1337;
$a = "Hello World";

// As if-statements
echo "<p>As if.</p>";
if($a == 42) {
  echo '<p>$a is equal to 42</p>';
} 
else if ($a == 1337) {
  echo '<p>$a is equal to 42</p>';
} 
else if ($a == "Hello World") {
  echo '<p>$a is equal to 42</p>';
} 
else {
  echo '<p>$a is NOT an known value.</p>';
}

// As switch/case
echo "<p>As switch.</p>";
switch($a) {
  case 42:
    echo '<p>$a is equal to 42</p>';
    break;
  
  case 1337:
    echo '<p>$a is equal to 42</p>';
    break;
    
  case "Hello World":
    echo '<p>$a is equal to 42</p>';
    break;
    
  default:
    echo '<p>$a is NOT an known value.</p>';
}
?>


<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>

