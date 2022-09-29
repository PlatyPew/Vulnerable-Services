FROM php:8-apache-buster

COPY src /var/www/html

RUN useradd -m -g users computer1 && \
    mkdir /var/www/html/uploads && \
    docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY --chown=computer1:users ./flag1.txt /home/computer1

USER computer1
