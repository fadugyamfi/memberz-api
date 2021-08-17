# Memberz.Org API
This is the API backend for the Memberz.Org Angular application.

## Basic Requirements
	PHP >= 7.4
	OpenSSL PHP Extension
	PDO PHP Extension
    JSON PHP extension
	Mbstring PHP Extension
	Tokenizer PHP Extension
	XML PHP Extension
	MySQL >= 5.7

## API Documentation
To generate/update api documentation, run
```
php artisan scribe:generate
```
Ensure to set the value of `SCRIBE_AUTH_KEY` in your `.env` file to a valid API token so the API requests can
be authenticated to generate valid examples for the various endpoints.

## Generate JWT Secrete Key
 - php artisan key:generate
 - php artisan jwt:secret
 - php artisan cache:clear
 - php artisan config:clear
