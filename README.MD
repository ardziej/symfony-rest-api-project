# Symfony REST API


## Installation
Install all composer dependencies
```bash
composer install
```
JWT
```bash
mkdir -p config/jwt
openssl genrsa -out config/jwt/private.pem -aes256 4096
openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
```
Symfony Server
```bash
symfony server:start
```
## Usage example

### Authentication

Method:
```
POST
```
URL:
```
http://127.0.0.1:8000/api/login_check
```
Body:
```json
_username: 'user'
_password: 'password'
```
Response:
```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NTk2Mjk3NTcsImV4cCI6MTU1OTYzMzM1Nywicm9sZXMiOlsiUk9MRV9BRE1JTiJdLCJ1c2VybmFtZSI6ImFkbWluIn0.mMtGEhPzN0VqvSWoCuG7c9UnWG2UyG-tlf8NQJSC_loAreCJnGsZwDYv1k0eniI6BbTREPjRmJ6V6HzGY8HFEuvVBrbPk0TD5Nx9Us6YvYRMk6BQaNsu-8WB6m1_jwOh2oCcvWwcBxLup8s-XwLmFNK2A98Qws6XzdFk_cEzEp9BECj3HhymFOjS0TgTrRuM79x8AnIkcnKleOs3BwFyvl6OZA7O8R0LdBqzn84YWFaTsDcwumScUVFiVMDeBeWTAtb5kTXpT9BTHHXphnlqFrb3U1t55fZ29b6yrIOF9KEQjx3Vz6tTs-6sJBLBRDQ_0F0VfwqBYItGkBKvzxUDsfhRa3plYQZJ7rAMrXJq7fsyRkk9crfUeIMDNd-hg_ASsJYES8mwuAR_jI2S2FhGAVf9JfFfA_dhN6-IpWTQv7r4Qu8UTXoX0vDJd0WU6mKlhIFZscDmBI8_Ohu4ETfaZigPjTB1lILgrn0EWxn_-L3Eby-GHe2qFOrqBtnqQOu2J2gzSkdZuJszvyuZLwjL8X3fnMsxQHc2qixONJxqK1wsZsXphGfGLeO35EiaXU5lOBZzd4c9RZJT9oS-cMb-jJo_443s3Rywy0IVCy2Cce4D6muRDrlfFlrE3-VW13k1oGs4urHvBTnurfRF5CHvIxXw18oypDNVjkTxCeJumyU"
}
```

### Get Country
Method:
```
GET
```
URL:
```
http://127.0.0.1:8000/api/v1/country/name/ukraine
```
Header:
```
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NTk2Mjk3NTcsImV4cCI6MTU1OTYzMzM1Nywicm9sZXMiOlsiUk9MRV9BRE1JTiJdLCJ1c2VybmFtZSI6ImFkbWluIn0.mMtGEhPzN0VqvSWoCuG7c9UnWG2UyG-tlf8NQJSC_loAreCJnGsZwDYv1k0eniI6BbTREPjRmJ6V6HzGY8HFEuvVBrbPk0TD5Nx9Us6YvYRMk6BQaNsu-8WB6m1_jwOh2oCcvWwcBxLup8s-XwLmFNK2A98Qws6XzdFk_cEzEp9BECj3HhymFOjS0TgTrRuM79x8AnIkcnKleOs3BwFyvl6OZA7O8R0LdBqzn84YWFaTsDcwumScUVFiVMDeBeWTAtb5kTXpT9BTHHXphnlqFrb3U1t55fZ29b6yrIOF9KEQjx3Vz6tTs-6sJBLBRDQ_0F0VfwqBYItGkBKvzxUDsfhRa3plYQZJ7rAMrXJq7fsyRkk9crfUeIMDNd-hg_ASsJYES8mwuAR_jI2S2FhGAVf9JfFfA_dhN6-IpWTQv7r4Qu8UTXoX0vDJd0WU6mKlhIFZscDmBI8_Ohu4ETfaZigPjTB1lILgrn0EWxn_-L3Eby-GHe2qFOrqBtnqQOu2J2gzSkdZuJszvyuZLwjL8X3fnMsxQHc2qixONJxqK1wsZsXphGfGLeO35EiaXU5lOBZzd4c9RZJT9oS-cMb-jJo_443s3Rywy0IVCy2Cce4D6muRDrlfFlrE3-VW13k1oGs4urHvBTnurfRF5CHvIxXw18oypDNVjkTxCeJumyU
```
Response:
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