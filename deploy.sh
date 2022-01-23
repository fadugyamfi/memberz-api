#!/bin/bash

git pull
composer install --prefer-dist --no-dev -o --ignore-platform-reqs
composer dump-autoload
php artisan cache:clear && php artisan config:cache &&  && php artisan route:cache
php artisan storage:link
php artisan migrate --force
php artisan queue:restart
