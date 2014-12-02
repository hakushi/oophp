<?php
require_once("CHTMLTable.php");

class CDatabase
{
    private $pdo;
    private $dsn;
    private $host;
    private $db;
    private $settings = [];

    function __construct($settings)
    {
        $this->pdo = null;
        $this->settings = $settings;
        $this->host = $settings['host'];
        $this->db = $_SESSION['db'] = $settings['db'];
        $this->dsn = "mysql:host={$this->host};dbname={$this->db}";
    }

    public function ConnectToDatabase()
    {
        try {
        $this->pdo = new PDO (
            $this->dsn, $this->settings['login'], $this->settings['password'],
            $this->settings['options']
            );
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (Exception $e) {
                throw new PDOException('Could not connect to database, hiding connection details.');
            }
        return $this->pdo;
    }

     public function executeSQLQuery($sql){        
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        $_SESSION['last_query'] = $sql;
        $_SESSION['rows'] = $sth->rowCount();
        return $sth->fetchAll();
    }
    
}