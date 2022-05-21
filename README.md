## API dos agendamentos

[https://scheduleday.herokuapp.com](https://scheduleday.herokuapp.com)


# Documentação

## Criar um agendamento

### Request

`POST /schedule.php`

    curl -i -H 'Accept: application/json' -d 'date=2022-06-21&hour=11' https://scheduleday.herokuapp.com/schedule.php

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 201 Created
    Connection: close
    Content-Type: application/json
    Location: /thing/1
    Content-Length: 36

    {
		"id": "019ca7f0d63d2a15e61d3667c08c119d",
		"date": "2022-06-21",
		"is_full": "1"
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


