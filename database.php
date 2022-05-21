<?php 

class Database{
    public $conn;

    public function create(){
        try{
            $this->conn = new PDO('mysql:dbname=schedule;host=127.0.0.1', 'root', '');
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        return $this->conn;
    }
}

?>