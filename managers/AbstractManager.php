<?php

abstract class AbstractManager
{
    protected PDO $db;
    
    public function __construct(string $dbName, string $port, string $host, string $username, string $password)
    {
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbName";
        $this->db = new PDO(
            $connexionString,
            $username,
            $password
        );
    }
    
}

?>