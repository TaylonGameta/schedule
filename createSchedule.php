<?php
    include_once "database.php";
    include_once "models/Schedule.php";

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Authorization");
    header('Content-Type: application/json');

    $MAX_HOURS = 3;
    $MAX_SCHEDULES = 4;

    $database = new Database();
    $conn = $database->create();

    $schedule = new Schedule($conn);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $json = file_get_contents('php://input');
        $data = json_decode($json);

        if(isset($data->return)){

            $response;
           
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
            $goingObj = $schedule->create();

            $response['going'] = $goingObj;
            $emailMessage = "
                <p><b>Agendamento</b></p>
                <p>Rota: $schedule->route</p>
                <p>Data e hora: $schedule->date - $schedule->hour</p>
                <p>Local de Partida: $schedule->place</p>
                <p>Valor: $schedule->value </p>
                <p>Qtd passageiros: $schedule->passengers </p>
                <p><b>Dados do Cliente</b></p>
                <p>Nome: $schedule->name</p>
                <p>Email: $schedule->email</p>
                <p>Flight Number: $schedule->flightNumber</p>
                <p>Whatsapp: $schedule->phone<p/>";
            $schedule->sendEmail($emailMessage);
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

            $returnObj = $schedule->create();
            $response['return'] = $returnObj;
            $emailMessage = "
                <p><b>Agendamento</b></p>
                <p>Rota: $schedule->route</p>
                <p>Data e hora: $schedule->date - $schedule->hour</p>
                <p>Local de Partida: $schedule->place</p>
                <p>Valor: $schedule->value </p>
                <p>Qtd passageiros: $schedule->passengers </p>
                <p><b>Dados do Cliente</b></p>
                <p>Nome: $schedule->name</p>
                <p>Email: $schedule->email</p>
                <p>Flight Number: $schedule->flightNumber</p>
                <p>Whatsapp: $schedule->phone<p/>";
            $schedule->sendEmail($emailMessage);
            echo json_encode($response);

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
            $response = $schedule->create();
            $emailMessage = "
                <p><b>Agendamento</b></p>
                <p>Rota: $schedule->route</p>
                <p>Data e hora: $schedule->date - $schedule->hour</p>
                <p>Local de Partida: $schedule->place</p>
                <p>Valor: $schedule->value </p>
                <p>Qtd passageiros: $schedule->passengers </p>
                <p><b>Dados do Cliente</b></p>
                <p>Nome: $schedule->name</p>
                <p>Email: $schedule->email</p>
                <p>Flight Number: $schedule->flightNumber</p>
                <p>Whatsapp: $schedule->phone<p/>";
            $schedule->sendEmail($emailMessage);
            echo json_encode($response);
        }

    }
?>