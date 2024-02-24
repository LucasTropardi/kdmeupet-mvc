<?php

namespace app\models;

abstract class Connection
{
    private $dbname = 'mysql:host=localhost;dbname=kdmeupet';
    private $user = 'root';
    private $pass = '';

    protected function connect()
    {
        try {
            $conn = new \PDO($this->dbname, $this->user, $this->pass);
            $conn->exec("set names utf8");
            return $conn;
        } catch (\PDOException $e) {
            echo "erro: " . $e->getMessage();
        }
    }
}