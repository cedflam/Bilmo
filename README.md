# Bilmo

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/d58bc2c08fa64f78b09ff1475454e405)](https://www.codacy.com/manual/cedflam/Bilmo?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=cedflam/Bilmo&amp;utm_campaign=Badge_Grade)
[![Maintainability](https://api.codeclimate.com/v1/badges/d142ab48bbdee89417be/maintainability)](https://codeclimate.com/github/cedflam/Bilmo/maintainability)

 
Bilmo is an API built as part of my OpenClassrooms course and constitutes project 7 of it.

# Context
BileMo is a company offering a selection of high-end mobile phones.

You are in charge of the development of the showcase of BileMo mobile phones. The business model of BileMo is not to sell directly on the website, but to provide all platforms that wish to access the catalog via an API (Application Programming Interface). It is therefore sales exclusively B2B (business to business).

# Built-with
- Symfony 4.4
- Doctrine
- PHPUnit-Bridge
- Jwt-Athentication
- faker 
- NelmioApiDocBundle
- FosResBundle
- PagerFanta
- JMS Serializer

# Install
#### 1 - Clone or download the repository into your environment.
#### 2 - Change the files .env.dist and phpunit.xml.dist with your own data :
#### 3 - Install the database and inject the fixtures :
- php bin/console doctrine:database:create
- php bin/console doctrine:schema:update --force
- php bin/console doctrine:fixtures:load --append
#### 4 - Generate the JWTAuthentication SSH keys
- mkdir config/jwt
- openssl genrsa -out config/jwt/private.pem -aes256 4096
- openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem

# Test Application 
In postman select post request with route api/login and enter this email and password then copy the token.
Once the token has been received, paste it in the authorizations tab and select "Bearer" from the drop-down list
{
  "email": "admin@admin.fr"
  "password": "password"
}

# Documentation
This API project is documented, so you can find a full documentation of API methods by adding /api/doc at the end of your API URI.

