<?php
require_once("CSearch.php");

class CHTMLTable 
{
    private $search;
    private $pdo;
    function __construct($pdo)
    {
        $this->search = new CSearch();
        $this->pdo = $pdo;
    }
    
    public function GenerateGameTable($games)
    {
        $row = 0;
        
        if (empty($games)) {
            $gameTable = "";
        } else {

        $gameTable = "<table class='gameTable' cellpadding='0' cellspacing='0' boder='0'>
             <tr>";

        $headers = [
            ['display_name' => 'Rad', 'db_name' => 'row'],
            ['display_name' => 'Id','db_name' => 'id'],
            ['display_name' => '', 'db_name' => 'image'],
            ['display_name' => 'Titel', 'db_name' => 'title'],
            ['display_name' => 'Utgivare', 'db_name' => 'publisher'],
            ['display_name' => 'År', 'db_name' => 'year'],
            ['display_name' => 'Genre', 'db_name' => 'genre'],
            ['display_name' => 'Konsol', 'db_name' => 'console'],
        ];

        foreach($headers as $header) {

            $gameTable .= "<th>{$header['display_name']}";
            $gameTable .= (
                $header['db_name'] == 'row' ||
                $header['db_name'] == 'image'
                ) ? "</th>" : "<br>
                    <a href=?{$_SERVER['QUERY_STRING']}&order_by={$header['db_name']}&order=desc>
                    <i class='fa fa-chevron-down'></i></a>
                    <a href=?{$_SERVER['QUERY_STRING']}&order_by={$header['db_name']}&order=asc>
                    <i class='fa fa-chevron-up'> </i>
                </th>";
        }

        $gameTable .= "</tr>";
        $row_count = count($games);
        $limit =  (isset($_GET['limit']) && $_GET['limit'] != '') ? $_GET['limit'] : '2';
        $page =  (isset($_GET['p'])) ? $_GET['p'] : '1';

        $i = 0;
        foreach ($games as $game) {
            $gameArray[] = [
                'row'        => $i,
                'id'         => $game->id,
                'image_url'  => $game->image,
                'title'      => $game->title,
                'publisher'  => $game->publisher,
                'year'       => $game->year,
                'genre'      => $game->genre,
                'console'    => $game->console
            ];
            $i++;
        }
        for ($i=0;$i<$limit;$i++) {
        $index = ($page == 1) ? $i : $i+(($page-1)*$limit);
        if($index >= $row_count) {
            break;
        }
        $gameTable .= 
                    "<tr>
                        <td>{$gameArray[$index]['row']}</td>
                        <td>{$gameArray[$index]['id']}</td>
                        <td><img src='{$gameArray[$index]['image_url']}' 
                                alt='{$gameArray[$index]['title']}'>
                        </td>
                        <td>{$gameArray[$index]['title']}</td>
                        <td>{$gameArray[$index]['publisher']}</td>
                        <td>{$gameArray[$index]['year']}</td>
                        <td>{$gameArray[$index]['genre']}</td>
                        <td>{$gameArray[$index]['console']}</td>
                    </tr>"; 
                // $row++;
            }
        }

        $gameTable .= "</table>";
        return $gameTable;
       
        }

    public function getRowNav($rows)
    {
        $nav = "$rows resultat. Antal rader per sida:";
        $nav .= ((isset($_GET['limit']) && $_GET['limit'] == 2)
                || isset($_GET['show_all']) || $_GET['limit'] == '') ? " 2" :
                " <a href=?{$_SESSION['query_string_no_limit']}&limit=2>2</a>";
        $nav .= (isset($_GET['limit']) && $_GET['limit'] == 4) ? " 4" :
                " <a href=?{$_SESSION['query_string_no_limit']}&limit=4>4</a>";
        $nav .= (isset($_GET['limit']) && $_GET['limit'] == 8) ? " 8" :
                " <a href=?{$_SESSION['query_string_no_limit']}&limit=8>8</a>";
        return $nav;
    }

    public function getPagination($rows)
    {
        if (!isset($_GET['limit']) || $_GET['limit'] == '') {
            $limit = 2;
        } else {
            $limit = $_GET['limit'];
        }
        
        $currentPage = (isset($_GET['p'])) ? $_GET['p'] : 1;
        $pageCount = $rows/$limit;
        $pag = "Sida: ";
        
        for ($i = 1; $i < $pageCount+1; $i++) {
            $pag .= ($currentPage == $i) ? " $i " :
            "<a href=?{$_SESSION['query_string_no_pagination']}&p=$i>$i</a> ";
        }
        
        if ($rows <= $limit) {
            $pag = "";
        }
        
        return $pag;
    }
}