FROM php:8-apache-buster

COPY --chown=www-data:www-data src /var/www/html

RUN useradd -m -g users computer1 && \
    useradd -m -g users rooot && \
    docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY --chown=computer1:users ./flag1.txt /home/computer1/flag.txt
COPY --chown=rooot:root ./flag2.txt /home/computer1/chickendinner.txt

RUN apt-get update && apt-get install net-tools -y && apt-get clean && \
    chown rooot:root /usr/sbin/arp && chmod 4755 /usr/sbin/arp && \
    chmod 600 /home/computer1/chickendinner.txt

USER computer1
