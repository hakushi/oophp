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
<h1>Loopa genom en array</h1>

<?php
$a = array(
  'answer'  => 42, 
  'name'    => "Mumintrollet",
  'elite'   => 1337, 
);

foreach($a as $value) {
  echo "Arrayen innehåller värdet '$value'.<br>";
}

foreach($a as $key => $value) {
  echo "Värdet på nyckel '$key' är '$value'.<br>";
}
?>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
