<?php
/**
* 
*/
class CSearch
{
    function __construct()
    {
    }
    public function filterResults($search, $table){

        $sql[] = "SELECT * FROM `{$table}`";
        $sql[] = (empty($search['genre'])) ? "" : "`genre` = '{$search['genre']}'";
        $sql[] = (empty($search['title'])) ? "" : "`title` LIKE '%{$search['title']}%'";
        $sql[] = (empty($search['from']) || empty($search['to'])) ? "" : "`year` BETWEEN {$search['from']} AND {$search['to']}";
        $sql = array_filter($sql);  
        
        $i = 0;
        $query = "";
        foreach($sql as $val)
        {
            $query .= ($i == 0) ? $val : "";
            $query .= ($i == 1) ? " WHERE {$val}" : "";
            $query .= ($i > 1) ? " AND {$val}" : "";
         $i++;
        }
        $query .= (
            empty($search['order_by']) ||
            empty($search['order'])) ? "" : " ORDER BY {$search['order_by']} ". strtoupper($search['order']);

        //$query .= (empty($search['limit'])) ? "" : " LIMIT {$search['limit']}";

        $_SESSION['query'] = $query;

        return $query;
    }   

    public function GenerateForm(){
        $title      = (isset($_GET['title'])) ? $_GET['title'] : '';
        $genre      = (isset($_GET['genre'])) ? $_GET['genre'] : '';
        $yearFrom   = (isset($_GET['from'])) ? $_GET['from'] : '';
        $yearTo     = (isset($_GET['to'])) ? $_GET['to'] : '';
        $orderBy    = (isset($_GET['order_by'])) ? $_GET['order_by'] : '';
        $order      = (isset($_GET['order'])) ? $_GET['order'] : '';

        $query = $_SESSION['query_string_no_genre'];
        $form = "
            <form method='<get' action=''>
                <span class='form_label'>Välj genre:</span>
                <a href='?genre=rpg&{$query}'>RPG</a> |
                <a href='?genre=fps&{$query}'>FPS</a> |
                <a href='?genre=platform&{$query}'>platform</a> |
                <a href='?genre=shootemup&{$query}'>shootemup</a> |    
                <a href='?genre=strategi&{$query}'>strategi</a> |
                <a href='?genre=beatemup&{$query}'>beatemup</a>
            <br><br>
                <label for='title'>Titel:</label>
                <input type='text' name='title' class='inline_input' value='{$title}' />
            <br><br>
                <input type='hidden'name='genre' value='{$genre}' />
                <label for='q'>Årtal:</label>
                <input type='text' name='from' class='inline_input year_input' value='{$yearFrom}'/> &ndash;
                <input type='text' name='to' class='inline_input year_input' value='{$yearTo}'/>
                <br><br>
                <input type='submit' value='Sök'/>
            </form>
            <br>
            <form method='post' action='game.php?show_all'>
                <input type='submit' value='Visa alla'/>
            </form>
            ";
        return $form;
    }

    public function GenerateGameMenu()
    {
        $gameMenu = "
        <nav class='navBar'>
            <ul>
            <li>
                <a href='?show_all'>Visa alla</a>
            </li>
            
            <li class='selected_parent'><a href=#>Sök</a>
                <ul>
                    <li>
                        <a href='?search=title'>Sök titel</a>
                    </li>
                    <li>
                        <a href='?search=year'>Sök år</a>
                    </li>
                    <li>
                        <a href='?search=genre'>Sök genre</a>
                    </li>
                    <li>
                        <a href='?search=all'>Advancerad sökning</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>";
    return $gameMenu;
    }

    public function getQuery()
    {

        $title = (isset($_GET['title'])) ? $_GET['title'] : '';
        $genre = (isset($_GET['genre'])) ? $_GET['genre'] : '';
        $from = (isset($_GET['from'])) ? $_GET['from'] : '';
        $to = (isset($_GET['to'])) ? $_GET['to'] : '';
        $order_by = (isset($_GET['order_by'])) ? $_GET['order_by'] : '';
        $order = (isset($_GET['order'])) ? $_GET['order'] : '';
        $limit = (isset($_GET['limit'])) ? $_GET['limit'] : '2';
        $page = (isset($_GET['p'])) ? $_GET['p'] : '';

        $search = [
            'title'     => $title,
            'genre'     => $genre,
            'from'      => $from,
            'to'        => $to,
            'order_by'  => $order_by,
            'order'     => $order,
            'limit'     => $limit,
            'page'      => $page
        ];
        return $search;
    }

    public function queryStrip($search, $value)
    {
        switch ($value) {

            case 'order' :
                unset($search['order_by']);
                unset($search['order']);
                return http_build_query($search, '', '&amp;');
            
            case 'genre' :
                unset($search['genre']);
                return http_build_query($search, '', '&amp;');

            case 'limit' :
                unset($search['limit']);
                return http_build_query($search, '', '&amp;');
            
            case 'page' :
                unset($search['page']);
                return http_build_query($search, '', '&amp;');
        }
    }
}