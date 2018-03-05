FROM php:7-fpm

RUN apt-get update && docker-php-ext-install pdo pdo_mysql && apt-get install -y libmcrypt-dev mysql-client && pecl install mcrypt-1.0.1 && docker-php-ext-enable mcrypt pdo_mysql

WORKDIR /var/www