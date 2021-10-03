# Memberz.Org API
This is the API backend for the Memberz.Org Angular application.

## Basic Requirements
	PHP >= 8.0
	OpenSSL PHP Extension
	PDO PHP Extension
    JSON PHP extension
	Mbstring PHP Extension
	Tokenizer PHP Extension
	XML PHP Extension
	MySQL >= 5.7

## Packages Requiring PHP8
The following packages require PHP8 and it recommended you use it as a minimum for best result

- spatie/laravel-activity-log:^4.0.0


## Setup Virtual Host
In order to use *Server Sent Events (SSE)* for notifications on the client side, it is recommended that you run
a PHP/Apache configuration instead of using `php artisan serve` to serve the API.

It is recommended that you setup a virtual host in your PHP/Apache to mimic running this as a production instance.
The virtual host should be pointed to the `/public` directory of the installation, and have the domain

    api.memberz.test

## Installing Dependencies
Open your command line application tool and navigate to the directory you have cloned the application.
Run the following commands to install and initialize your application:

	composer install

## Database Setup
Ensure you have a database configured for the application. Copy and paste the `.env.example` file and rename to `.env`. Update the file with your database configuration information.

On a fresh installation of the API, you should can generate the database and seed data using

    php artisan migrate:fresh --seed

## Generate JWT Secrete Key
Authentication to the backend is via JSON Web Tokens (JWT). The following steps must be run to generate the keys
and secrets for encrypting the token

    php artisan key:generate
    php artisan jwt:secret
    php artisan cache:clear
    php artisan config:clear

## Task Scheduler
If on **Windows**, see [this article](https://gist.github.com/Splode/94bfa9071625e38f7fd76ae210520d94) on how to create a task scheduler to run the artisan background jobs scheduler

On Unix/Linux systems, you can create a crontab and schedule the jobs using the following commands

    crontab -e
	* * * * * cd path-to-app/memberz-api && php artisan schedule:run >> /dev/null 2>&1

## API Documentation
A version of the API documentation exists [included](http://api.memberz.test/docs). To generate/update api documentation locally, run

    php artisan scribe:generate

Ensure to set the value of `SCRIBE_AUTH_KEY` in your `.env` file to a valid API token so the API requests can
be authenticated to generate valid examples for the various endpoints.
