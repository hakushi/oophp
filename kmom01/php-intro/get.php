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
<h1>Fördefinierade variabler, $_GET</h1>

<?php
if(empty($_GET)) {
  echo "<p>Du har inte skickat några parametrar till sidan</p>";
}

if(isset($_GET['hej'])) {
  echo "<p>Hej på dej själv!</p>";
}

if(isset($_GET['namn'])) {
  echo "<p>Ah, så ditt namn är '" . htmlentities($_GET['namn']) . "'. Mitt namn är Mumintrollet.</p>";
}

echo "<p>Allt innehåll i arrayen \$_GET:<br><pre>" . htmlentities(print_r($_GET, 1)) . "</pre>";
?>

<p>Pröva att klicka på någon av följande länkar:</p>

<ul>
  <li><a href='?hej'>Säg hej</a></li>
  <li><a href='?namn=Marvin'>Mitt namn är Marvin, vad heter du?</a></li>
  <li><a href='?namn=Marvin&amp;hej'>Säg hej och presentera dig!</a></li>
  <li><a href='?'>Skicka inga parametrar alls.</a></li>
</ul>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
