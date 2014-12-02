<?php
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly
?>

<!doctype html>
<html lang="sv"> 
<head>
<meta charset="iso-8859-1"/>
<title>php20</title>
</head>
<body>
<h1>Hur l�ng �r en str�ng, strlen('���') i ISO-8859-1</h1>

<p>Teckenkodningen p� denna filen (1) och p� webbsidan (2) �r ISO-8859-1.</p>

<p>L�ngden p� str�ngen '���' �r strlen('���') = <?=strlen('åäö'). mb_strlen('åäö')?> (skall vara 3).</p>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">K�llkod</a>
</body>
</html>
