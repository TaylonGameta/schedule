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

            $stmt = $conn->prepare("select schedule_date.date, schedule_hour.passengers, schedule_hour.hour from schedule_info
            left join schedule_hour on schedule_hour.id = schedule_info.hour_id
            left join schedule_date on schedule_date.id = schedule_hour.date_id
            where schedule_info.roundTrip = 0 and schedule_date.date = :date;
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