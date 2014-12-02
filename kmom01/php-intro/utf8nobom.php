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
<h1>Hur lång är en sträng, strlen('åäö') i UTF-8</h1>

<p>Teckenkodningen på denna filen (1) och på webbsidan (2) är UTF-8. Den interna kodningen för PHP-installationen (3) är <?=mb_internal_encoding()?>.</p>

<p>För att vara säker på att PHP betraktar alla strängar som UTF-8 så sätter jag mb_internal_encoding('utf-8').</p>

<?php mb_internal_encoding('utf-8'); ?>

<p>PHP's interna kodning är nu: <?=mb_internal_encoding()?></p>

<p>Längden på strängen 'åäö' är strlen('åäö') = <?=strlen('åäö')?> (skall vara 6).</p>

<p>Längden på strängen 'åäö' är mb_strlen('åäö') = <?=mb_strlen('åäö')?> (skall vara 3).</p>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
