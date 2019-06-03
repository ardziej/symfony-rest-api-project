# Symfony REST API

## Usage example

#### URL:
```http://127.0.0.1:8000/api/v1/country/name/ukraine```
#### Response:
```json
{
    "message": "OK",
    "code": 200,
    "data": {
        "name": "Ukraine",
        "nativeName": "Україна",
        "currencyName": "UAH",
        "currencyPrice": 0.1417
    }
}
```