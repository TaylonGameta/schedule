<?php

    

    class Schedule{
        public $passengers;

        public $date;
        public $hour;

        public $route;
        public $place;
        public $value;
        public $email;
        public $name;
        public $phone;
        public $flightNumber;
        public $roundTrip;

        private $conn;

        private $MAX_HOURS = 3;
        private $MAX_SCHEDULES = 4;


        function __construct($db){
            $this->conn = $db;
        }

        public function create(){

            $dateId = md5(uniqid(""));
            $hourId = md5(uniqid(""));
            $infoId = md5(uniqid(""));

            $existentHourId;
            

            //criando uma data pra ida
            $stmt = $this->conn->prepare("insert into schedule_date(id, date, is_full) values(:id, :date, 0)");
            $stmt->execute([
                ':id' => $dateId,
                ':date' => $this->date
            ]);

            
            //verificando se existe um horário com a data de ida escolhida
            $stmt = $this->conn->prepare("select schedule_hour.id from schedule_hour
            left join schedule_date on schedule_date.id = schedule_hour.date_id
            where schedule_hour.hour = :hour and schedule_date.date = :date");

            $stmt->execute([
                ':hour' => $this->hour,
                ':date' => $this->date,
            ]);

            //se nao existir o else vai criar um se existir o codigo segue e o update da tabela sera feito
            if($stmt->rowCount() > 0){
                $jsonResult = $stmt->fetch(PDO::FETCH_ASSOC);
                $existentHourId = $jsonResult['id'];
                //nao existe
            }else{
                $stmt = $this->conn->prepare("insert into schedule_hour(id, hour, date_id, passengers) values(:id, :hour, :date_id, 0)");
                $stmt->execute([
                    ':id' => $hourId,
                    ':hour' => $this->hour,
                    ':date_id' => $dateId,
                ]);
            }

            if(isset($existentHourId)){
                $hourId = $existentHourId;
            }

            //salvar informacoes do agendamento
            $stmt = $this->conn->prepare("insert into schedule_info(id, hour_id, name, phone, flightNumber, value, place, email, route, roundTrip)
            values(:id, :hour_id, :name, :phone, :flightNumber, :value, :place, :email, :route, :roundTrip)");
            $stmt->execute([
                ':id' => $infoId,
                ':hour_id' => $hourId,
                ':name' => $this->name,
                ':phone' => $this->phone,
                ':flightNumber' => $this->flightNumber,
                ':value' => $this->value,
                ':place' => $this->place,
                ':email' => $this->email,
                ':route' => $this->route,
                ':roundTrip' => $this->roundTrip
            ]);

            $stmt = $this->conn->prepare("update schedule_hour
            left join schedule_date on schedule_hour.date_id = schedule_date.id
            set schedule_hour.passengers = schedule_hour.passengers + :passengers
            where schedule_date.date = :date AND schedule_hour.hour = :hour");
            $stmt->execute([
                ':date' => $this->date,
                ':hour' => $this->hour,
                ':passengers' => $this->passengers
            ]);

            $stmt = $this->conn->prepare("select schedule_hour.id, schedule_hour.hour,
            schedule_hour.passengers, schedule_date.date from schedule_hour
            left join schedule_date on schedule_hour.date_id = schedule_date.id
            where schedule_date.date = :date AND schedule_hour.hour = :hour");
            $stmt->execute([
                ':date' => $this->date,
                ':hour' => $this->hour
            ]);

            if($stmt->rowCount() > 0){
                $jsonResult = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $stmt = $this->conn->prepare("select * from schedule_hour
                left join schedule_date on schedule_hour.date_id = schedule_date.id
                where schedule_hour.passengers > :max_schedules and schedule_date.date = :date");
            
                $stmt->execute([
                    ':date' => $this->date,
                    ':max_schedules' => $this->MAX_SCHEDULES
                ]);

                if($stmt->rowCount() > $this->MAX_HOURS){

                    $stmt = $this->conn->prepare("update schedule_date
                    set schedule_date.is_full = 1
                    where schedule_date.date = :date");
                    
                    $stmt->execute([
                        ':date' => $this->date,
                    ]);
                }

                
            }

            
        }

    }

?>