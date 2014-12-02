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
<h1>Magiska konstanter och absolut sökväg</h1>

<?php
echo "<p>Constant <code>__DIR__</code> (available from PHP 5.3) is:<br><code>" . __DIR__ . "</code></p>";
echo "<p>Constant <code>__FILE__</code> is:<br><code>" . __FILE__ . "</code></p>";
echo "<p>Filename-part of <code>__FILE__</code> is:<br><code>" . basename(__FILE__) . "</code></p>";
echo "<p>Directory-part of <code>__FILE__</code> is:<br><code>" . dirname(__FILE__) . "</code></p>";
 
echo "<p>Lets include a file by using <code>__FILE__</code> and <code>__DIR__</code> to create the absolute path.</p>";
include(dirname(__FILE__) . "/empty_file.php");
include(__DIR__ . "/empty_file.php");

?>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>

