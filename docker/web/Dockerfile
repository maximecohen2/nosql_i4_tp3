FROM php:7.2.2-apache

RUN pecl install redis \
    && docker-php-ext-enable redis

RUN a2enmod rewrite && service apache2 restart

VOLUME /var/www/html

EXPOSE 80