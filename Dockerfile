FROM php:7.2-apache

RUN apt-get update && apt-get install -y \
    libmcrypt-dev libicu-dev libxml2-dev zlib1g-dev\
    && docker-php-ext-install pdo_mysql mbstring intl xml json zip

RUN
    - 'docker-compose exec -T laravel a2enmod rewrite'
       - 'docker-compose stop'
       - 'docker-compose up -d'

COPY config/php.ini /usr/local/etc/php/