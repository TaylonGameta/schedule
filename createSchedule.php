<?php
    include_once "database.php";
    include_once "models/Schedule.php";

    $MAX_HOURS = 3;
    $MAX_SCHEDULES = 4;

    $database = new Database();
    $conn = $database->create();

    $schedule = new Schedule($conn);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $json = file_get_contents('php://input');
        $data = json_decode($json);

        if(isset($data->return)){
           
            $schedule->passengers = $data->passengers;

            $schedule->date = $data->going->date;
            $schedule->hour = $data->going->hour;

            $schedule->name = $data->name;
            $schedule->email = $data->email;
            $schedule->phone = $data->phone;
            $schedule->flightNumber = $data->flightNumber;
            $schedule->value = $data->value;
            $schedule->roundTrip = 1;
            $schedule->place = $data->going->place;
            $schedule->route = $data->going->route;
            $schedule->create();

            $schedule->passengers = $data->passengers;

            $schedule->date = $data->return->date;
            $schedule->hour = $data->return->hour;

            $schedule->name = $data->name;
            $schedule->email = $data->email;
            $schedule->phone = $data->phone;
            $schedule->flightNumber = $data->flightNumber;
            $schedule->value = $data->value;
            $schedule->roundTrip = 1;
            $schedule->place = $data->return->place;
            $schedule->route = $data->return->route;
            $schedule->create();

        }else{

            $schedule->passengers = $data->passengers;

            $schedule->date = $data->going->date;
            $schedule->hour = $data->going->hour;

            $schedule->name = $data->name;
            $schedule->email = $data->email;
            $schedule->phone = $data->phone;
            $schedule->flightNumber = $data->flightNumber;
            $schedule->value = $data->value;
            $schedule->roundTrip = 0;
            $schedule->place = $data->going->place;
            $schedule->route = $data->going->route;
            $schedule->create();

        }

    }
?>