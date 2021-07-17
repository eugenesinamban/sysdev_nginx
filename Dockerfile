FROM php:8.0-fpm-alpine AS php

RUN docker-php-ext-install pdo_mysql

RUN isntall -o www-data -g www-data -d /var/www/pubilc/image