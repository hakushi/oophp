<?php
//use CDatabase;

class CLogin
{

    private $username;
    private $password;
    private $database;

    function __construct($username, $password, $database) {
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function login()
    {

        $query = "SELECT name, password, salt FROM user WHERE name = '"
                 . $this->username ."'";

        $user = $this->database->executeSQLQuery($query);
        $user = $user[0];

        if ($user->password == md5($this->password . $user->salt))
            return $user;
        return false;
    }

}