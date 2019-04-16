FROM php:7.2.2-apache

RUN pecl install redis \
    && docker-php-ext-enable redis

VOLUME /var/www/html

EXPOSE 80