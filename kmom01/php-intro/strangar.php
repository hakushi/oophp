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
<h1>Strängar och stränghantering</h1>

<?php
$tal = 1337;

// Enkel fnutt
$str01 = '<p>En enkel sträng inom "enkelfnuttar" med en variabel som INTE expanderas till sitt värde $tal.</p>';
$str02 = '<p>En
sträng inom 
enkelfnuttar (\') som sträcker sig över flera rader.
Men variabler såsom \$tal ($tal) expanderas inte till sitt värde.
</p>';

// Dubbel fnutt
$str11 = "<p>En enkel sträng inom 'dubbelfnuttar' med en variabel som expanderas till sitt värde $tal.</p>";
$str12 = "<p>En
sträng inom 
dubbelfnuttar (\") som sträcker sig över flera rader.
Här expanderas variabler såsom \$tal ($tal) till sitt värde.
</p>";

$str21 = <<<EOD
<p>Här kan man skriva text tills slutmarkören EOD dyker upp. Men det är oerhört viktigt att slutmarkören står ensam på raden och att den inte finns tomma tecken, som mellanslag eller tabbar, varken före eller efter slutmarkören. <b>Kom ihåg det!</b> Slutmarkör och tomma tecken ger dig problem.

<p>Variabler expanderar till sitt rätta värde och \$tal = $tal.
EOD;

// Ouput
echo <<<EOD
$str01
$str11
<hr>
<pre>$str02</pre>
$str02
<hr>
<pre>$str12</pre>
$str12
<hr>
<pre>$str21</pre>
$str21;
EOD;
?>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
