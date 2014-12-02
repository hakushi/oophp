<?php
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly

$a = 42;
//$a = 1337;

$b = array(
  'Namn' => 'Mumitrollet',
  'Bor'  => 'Mumindalen',
);
?>

<!doctype html>
<html lang="sv"> 
<head>
<meta charset="utf-8"/>
<title>php20</title>
</head>
<body>
<h1>Testa alternativ syntax för if och foreach</h1>

<p>Nedan tabell visar namn och adressdetaljer.</p>
<table>
<?php foreach($b as $key => $val): ?>
  <tr>
    <th><?=$key?></th>
    <td><?=$val?></td>
  </tr>
<?php endforeach; ?>
</table>


<?php if($a == 42): ?>
<p>Jag har svaret på frågan om allting.</p>
<?php elseif($a == 1337): ?>
<p>Jag är ett pro!</p>
<?php endif; ?>


<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>

