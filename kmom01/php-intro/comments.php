<?php
/** 
 * Here is a PHPDoc comment.
 *
 * @author Mikael Roos <me@mikaelroos.se>
 */
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
<h1>Utskrifter och kommentarer i PHP</h1>

 <?php
/* Here is a multi-line comment, just as i CSS or C/C++
second line of comment.
third line.
*/
echo "<p>Hello World!</p>"; // One line comment, comment to end of line
echo "<p>Hello PHP!</p>";
echo "<p>My name is Mikael...</p>"; # Comment as shell-style

// Another one liner comment.
echo "<p>Hello PHP again!</p>";

?>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
