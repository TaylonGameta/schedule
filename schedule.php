<?php
    include_once "database.php";

    $database = new Database();
    $conn = $database->create();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $currentId = md5(uniqid(""));
        $hourId = md5(uniqid(""));
        $dayId= md5(uniqid(""));

        $json = file_get_contents('php://input');
        $data = json_decode($json);
        $stmt = $conn->prepare("insert into schedule_date(id, date, is_full) values(:id, :date, 0)");
        $stmt->execute([
            ':id' => $currentId,
            ':date' => $data->date
        ]);

    
        $day = explode("-", $data->date);

      
        $stmt = $conn->prepare("select * from schedule_hour
        left join schedule_date on schedule_date.id = schedule_hour.date_id
        where schedule_hour.hour = :hour and schedule_date.date = :date");

        $stmt->execute([
            ':hour' => $data->hour,
            ':date' => $data->date,
        ]);

        if($stmt->rowCount() > 0){
            
        }else{
            $stmt = $conn->prepare("insert into schedule_hour(id, hour, date_id, schedules) values(:id, :hour, :date_id, 0)");
            $stmt->execute([
                ':id' => $hourId,
                ':hour' => $data->hour,
                ':date_id' => $currentId,
            ]);
        }


        $stmt = $conn->prepare("update schedule_hour
        left join schedule_date on schedule_hour.date_id = schedule_date.id
        set schedule_hour.schedules = schedule_hour.schedules + 1
        where schedule_date.date = :date AND schedule_hour.hour = :hour");
        $stmt->execute([
            ':date' => $data->date,
            ':hour' => $data->hour
        ]);

        $stmt = $conn->prepare("select * from schedule_hour
        left join schedule_date on schedule_hour.date_id = schedule_date.id
        where schedule_date.date = :date AND schedule_hour.hour = :hour");
        $stmt->execute([
            ':date' => $data->date,
            ':hour' => $data->hour
        ]);

        if($stmt->rowCount() > 0){
            $jsonResult = $stmt->fetch(PDO::FETCH_ASSOC);
            
    
            $stmt = $conn->prepare("select * from schedule_hour
            left join schedule_date on schedule_hour.date_id = schedule_date.id
            where schedule_hour.schedules > 3 and schedule_date.date = :date");
           
            $stmt->execute([
                ':date' => $data->date,
            ]);

            if($stmt->rowCount() > 3){

                $stmt = $conn->prepare("update schedule_date
                set schedule_date.is_full = 1
                where schedule_date.date = :date");
                
                $stmt->execute([
                    ':date' => $data->date,
                ]);
            }

            echo json_encode($jsonResult);
            
        }
        

    }
?>