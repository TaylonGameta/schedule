<?php
    include_once "database.php";

    $MAX_HOURS = 48;
    $MAX_SCHEDULES = 8;

    $database = new Database();
    $conn = $database->create();

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Authorization");
    header('Content-Type: application/json');


    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(isset($_GET['date'])){
            $date = $_GET['date']; 

            $stmt = $conn->prepare("select schedule_hour.id, schedule_hour.hour, schedule_hour.passengers, schedule_date.date from schedule_hour
            left join schedule_date on schedule_date.id = schedule_hour.date_id
            where schedule_date.date = :date and schedule_hour.passengers > :max_schedules
            ");

            $stmt->execute([
                ':date' => $date,
                ':max_schedules' => $MAX_SCHEDULES
            ]);

            if($stmt->rowCount() > 0){
                $jsonResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($jsonResult);
            }
        }
    }

?>