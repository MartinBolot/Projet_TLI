FROM php:7.2.6-apache

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql
RUN a2enmod rewrite
COPY apache2.conf /etc/apache2/apache2.conf
