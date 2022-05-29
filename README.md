## API dos agendamentos

[https://scheduleday.herokuapp.com](https://scheduleday.herokuapp.com)


# Documentação

## Criar um agendamento

### Request

`POST /createSchedule.php`

    curl -i -H 'Accept: application/json' -d 'date=2022-06-21&hour=11' https://scheduleday.herokuapp.com/createSchedule.php

    {
        "passengers": 4,
        "name": "Jorge",
        "email": "jorge@email.com",
        "phone": "238723823",
        "flightNumber": "12123",
        "value": "10.00",
        "going": {
            "date": "2022-07-03",
            "hour": "14",
            "place": "porto",
            "route": "braga"
        },
        "return": {
            "date": "2022-07-04",
            "hour": "11",
            "place": "braga",
            "route": "porto"
        }
    }

### Response

    HTTP/1.1 200 Ok
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 Ok
    Connection: close
    Content-Type: application/json
    Location: /thing/1
    Content-Length: 36

    {
		
	}

## Pegar uma lista de dias

### Request

`GET /get-days.php?start_date=2022-05-01&end_date=2022-07-01`

    curl -i -H 'Accept: application/json' https://scheduleday.herokuapp.com/get-days.php?start_date=2022-05-01&end_date=2022-07-01

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

    [
        {
		    "id": "019ca7f0d63d2a15e61d3667c08c119d",
		    "date": "2022-06-21",
		    "is_full": "1"
	    }
    ]


## Pegar uma lista de horarios

### Request

`GET /get-hours.php?date=2022-05-01`

    curl -i -H 'Accept: application/json' https://scheduleday.herokuapp.com/get-hours.php?date=2022-05-01

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

    [
        {
		    "id": "0396c83f0196c3316283dcfe3484edf9",
		    "hour": "9",
		    "date": "2022-06-21"
	    }
    ]


## Pegar uma lista de horarios sem volta

### Request

`GET /get-hours-no-comeback.php?date=2022-05-01`

    curl -i -H 'Accept: application/json' https://scheduleday.herokuapp.com/get-hours-no-comeback.php?date=2022-05-01

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

    [
        {
            "date": "2022-07-06",
            "passengers": "4",
            "hour": "14"
        }
    ]

