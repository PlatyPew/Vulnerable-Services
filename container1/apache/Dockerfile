FROM php:8-apache-buster

COPY src /var/www/html
COPY image /var/www/html/images

RUN mkdir /var/www/html/uploads && \
    docker-php-ext-install mysqli && docker-php-ext-enable mysqli
