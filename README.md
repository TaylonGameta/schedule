## API dos agendamentos

[https://scheduleday.herokuapp.com](https://scheduleday.herokuapp.com)


# Documentação

## Pegar uma lista de dias

### Request

`GET /get-days.php?start_date={date}&end_date={date}`

    curl -i -H 'Accept: application/json' https://scheduleday.herokuapp.com/get-days.php?start_date={date}&end_date={date}

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

    []


