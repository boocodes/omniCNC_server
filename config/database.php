<?php
include_once "../environment/environment.php"
class DataBase{
    private $host = $HOST;
    private $db_name = $DB_NAME;
    private $username = $DB_USERNAME;
    private $password = $DB_PASSWORD;
    public $conn;

    public function set_connection()
    {
        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host. ";dbname=" . $this->db_name . $this->username . $this->password);
            $this->conn->exec("set names utf8");
        }
        catch(PDOException $exception)
        {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}