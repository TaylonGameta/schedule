## API dos agendamentos

### Request
`POST /schedule.php`
    curl -i -H 'Accept: application/json' -d 'date=2022-10-10&hour=10' http://localhost:7000/schedule

### Request
`GET /get-hours.php?date={some_date}`
    curl -i -H 'Accept: application/json' http://localhost:7000/get-hours.php?date=some_date

### Request
`GET /get-days.php?start_date={some_date}&end_date={some_date}`
    curl -i -H 'Accept: application/json' http://localhost:7000/get-days.php?start_date={some_date}&end_date={some_date}

