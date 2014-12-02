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
<h1>Fördefinierade variabler, $_POST och ett formulär</h1>

<?php
// Alltid validera och sanitera inkommande information innan den används.
$field1 = isset($_POST['field1']) ? htmlentities($_POST['field1']) : null;
$field2 = isset($_POST['field2']) ? htmlentities($_POST['field2']) : null;
?>

<form method=post>
<fieldset>
<legend>Ett formulär att posta</legend>
<p><input type=text name=field1 value='<?=$field1?>'></p>
<p><textarea name=field2><?=$field2?></textarea></p>
<input type=submit value=Skicka>
</fieldset>
</form>

<?="<p>Allt innehåll i arrayen \$_POST:<br><pre>" . htmlentities(print_r($_POST, 1)) . "</pre>"?>


<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
