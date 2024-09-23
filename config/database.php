<?php
class DataBase{
    private $host = getenv("HOST");
    private $db_name = getenv("DB_NAME");
    private $username = getenv("DB_USERNAME");
    private $password = getenv("DB_PASSWORD");
    public $conn;

    public function set_connection()
    {
        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host. ";dbname=" . $this->db_name , $this->username , $this->password);
            $this->conn->exec("set names utf8");
        }
        catch(PDOException $exception)
        {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}