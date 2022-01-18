#!/bin/bash

git pull
composer install --prefer-dist --no-dev -o
composer dump-autoload
php artisan config:clear && php artisan cache:clear && php artisan route:clear
php artisan storage:link
php artisan migrate --force
php artisan queue:restart
