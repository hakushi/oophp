<?php
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly

$do = isset($_GET['do']) ? $_GET['do'] : null;

switch($do) {
  case 'redirect':
    // Redirect to another page, perhaps a resultpage showing the result of a posted form
  echo " ";
    header("Location: http://dbwebb.se/");
    exit;
    break;
    
  case '404':
    // Generate HTTP response code 404 Not Found
    header("HTTP/1.0 404 Not Found");
    echo "This is a generated page with a 404 Not Found HTTP header, analyse the headerinformation with your browser or Firebug.";
    exit;
    break;
    
  case '403':
    // Generate HTTP response code 403 Forbidden
    header("HTTP/1.0 403 Forbidden");
    echo "This is a generated page with a 403 Forbidden HTTP header, analyse the headerinformation with your browser or Firebug.";
    exit;
    break;
    
  case 'pdf':
    // Download a pdf-file and name it downloaded.pdf
    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="downloaded.pdf"');
    readfile(__DIR__ . '/hello.pdf');
    exit;
    break;
    
  case 'zip':
    // Download a zip-file and name it downloaded.zip
    header('Content-type: application/zip');
    header('Content-Disposition: attachment; filename="downloaded.zip"');
    readfile(__DIR__ . '/hello.zip');
    exit;
    break;

  default:
    ;
}
?>

<!doctype html>
<html lang="sv"> 
<head>
<meta charset="utf-8"/>
<title>php20</title>
</head>
<body>
<h1>Generera header med PHP</h1>

<p>
  <a href="?">Ladda om sidan</a> | 
  <a href="?do=redirect">Redirect till hemsidan</a> | 
  <a href="?do=404">404 Not Found</a> |
  <a href="?do=403">403 Forbidden</a> |
  <a href="?do=pdf">Download PDF-file</a> |
  <a href="?do=zip">Download ZIP-file</a> |
</p>


<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
