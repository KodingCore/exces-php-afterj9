<?php

abstract class AbstractManager
{
    protected PDO $db;
    
    public function __construct()
    {
        $host = "localhost";
        $port = "3306";
        $dbName = "kodingcore";
        $logname= "root";
        $password = "";
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbName";
        $this->db = new PDO(
            $connexionString,
            $logname,
            $password
        );
    }
    
}

?>