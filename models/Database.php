<?php


class Database
{
    private $host = 'localhost:3306';
    private $user = 'root';
    private $password = '';
    private $dbName = 'task_23devs';

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Ошибка соединения с БД: ' . $e->getMessage();
        }

        return $this->conn;
    }
}