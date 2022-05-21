<?php
    include_once "database.php";

    $database = new Database();
    $conn = $database->create();

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Authorization");
    header('Content-Type: application/json');


    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(isset($_GET['date'])){
            $date = $_GET['date']; 

            $stmt = $conn->prepare("select * from schedule_hour
            left join schedule_date on schedule_date.id = schedule_hour.date_id
            where schedule_date.date = :date;
            ");

            $stmt->execute([
                ':date' => $date
            ]);

            if($stmt->rowCount() > 0){
                $jsonResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($jsonResult);
            }
        }
    }

?>