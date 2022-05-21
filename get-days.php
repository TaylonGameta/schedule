<?php
    include_once "database.php";

    $database = new Database();
    $conn = $database->create();

    if($_SERVER['REQUEST_METHOD'] === 'GET'){

        if(isset($_GET['start_date']) && isset($_GET['end_date'])){
            $startDate = $_GET['start_date']; 
            $endDate = $_GET['end_date']; 

            $stmt = $conn->prepare("select * from schedule_date
            where schedule_date.date between :start and :end
            group by schedule_date.date
            ");

            $stmt->execute([
                ':start' => $startDate,
                ':end' => $endDate
            ]);
    
            if($stmt->rowCount() > 0){
                $jsonResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($jsonResult);
            }
        }

    }

?>