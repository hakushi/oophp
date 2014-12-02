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
<h1>Arrayer</h1>

<?php
// En tom array
$a = array();  

// Läs ett värde från position 1 i arrayen, ger felmeddelande eftersom det inte finns något i position 0
echo "<i>Här kommer ett felmeddelande med flit!</i>";
echo "Position 1 i arrayen innehåller " . $a[1];

// Sätt värden i arrayen
$a[1] = 42;
$a['name'] = "Mumintrollet";

echo "<pre>", print_r($a, true), "</pre>";
echo "<pre>", var_dump($a), "</pre>";


// array med endast värden
$a = array("1337", 42, 13.37, true, false, null);

echo "<hr><p>Här kommer arrayen med endast värden, nycklarna tilldelas automatiskt med start på 0. Det är samma som värdet position i arrayen, eller i listan. Notera att värdet på false och null inte skrivs ut, de ger bara ingenting.</p>";
echo "<pre>", print_r($a, true), "</pre>";
echo "<pre>", var_dump($a), "</pre>";

// Läs ett värde från position 1 i arrayen, ger 42
echo "Position 1 i arrayen innehåller " . $a[1];


// array med både värden och nycklar
$a = array(
  'answer'  => 42, 
  'name'    => "Mumintrollet",
  'elite'   => 1337, 
);

echo "<hr><p>Här en array där värdena fått explicit definerade nycklar.</p>";
echo "<pre>", print_r($a, true), "</pre>";
echo "<pre>", var_dump($a), "</pre>";

// Läs det värde som är kopplat till nyckeln 'name'
echo "Värdet som är kopplat till array-nyckeln 'name' är " . $a['name'];
?>

<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
