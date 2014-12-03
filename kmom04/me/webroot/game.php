<?php 

//Include the main config file
include(__DIR__.'/config.php');

$settings = [
    'host'     => 'localhost',
    'db'       => 'game',
    'login'    => 'root',
    'password' => '',
    'options'  => array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'")
];

$CGameDatabase = new CDatabase($settings);
$CHTMLTable = new CHTMLTable($settings);
$CSearch = new CSearch();

$CGameDatabase->ConnectToDatabase();

$search = $CSearch->getQuery();
$_SESSION['search'] = $search;
$gameForm = $CSearch->GenerateForm();

$_SESSION['query_string_no_order'] = $CSearch->queryStrip($search, 'order');
$_SESSION['query_string_no_genre'] = $CSearch->queryStrip($search, 'genre');
$_SESSION['query_string_no_limit'] = $CSearch->queryStrip($search, 'limit');
$_SESSION['query_string_no_pagination'] = $CSearch->queryStrip($search, 'page');

$sqlQuery = $CSearch->filterResults($search);

$sqlQuery = $CSearch->filterResults($search);

$games = $CGameDatabase->executeSQLQuery($sqlQuery);

$gameTable = $CHTMLTable->generateGameTable($games);

$query = $_SESSION['last_query'];
$rows = $_SESSION['rows'];

$rowSelect = $CHTMLTable->getRowNav($rows);
$pagination = $CHTMLTable->getPagination($rows);

// var_dump($_SESSION['query']);
$tard['title'] = "Speldatabas";

//Uncomment to include navigation header
include(__DIR__.'/navigation.php');

$tard['main'] = <<< EOD

<article>
    <h3>
        Sök
    </h1>
    <p>
        $gameForm
    </p>
    <div class='table-footer'>
        $gameTable
        <div class='pagination'>
            $pagination
        </div>
        <div class='rows'>
            $rowSelect
        </div>
    </div>  
    <div class='query'>
    <span class='query-label'>Query: </span> $query
    </div>
</article>
<span>
EOD;

include(TARD_THEME_PATH);
