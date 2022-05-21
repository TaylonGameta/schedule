<?php 

    $user = $_ENV["DB_USER"];
    $password = $_ENV["DB_PASSWORD"];
    $host = $_ENV["DB_HOST"];
    $database = $_ENV["DB_DATABASE"];


class Database{
    public $conn;

    public function create(){
        try{
            $this->conn = new PDO("mysql:dbname=$database;host=$host", $user, $password);
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        return $this->conn;
    }
}

?>