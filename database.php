<?php

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $db = substr($url["path"], 1);

    if(isset($url["host"]) && isset($url["user"]) && isset($url["pass"])){
        $server = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
    }else{
        $username = "root";
        $password = "";
    }

    if(isset($db) && isset($server)){
        $dsn = "mysql:dbname=$db;host=$server";
    }else{
        $dsn = "mysql:dbname=u699633739_easy_transfer;host=localhost";
    }
  

    //echo $pdo;

    class Database{
        public $conn;

        public function create(){

            global $url, $dsn, $server, $db, $username, $password;

            try{
                $this->conn = new PDO($dsn, "senhasegura", "Easyroot1");
            }catch(PDOException $e){
                echo $e->getMessage();
            }

            return $this->conn;
        }
    }
?>