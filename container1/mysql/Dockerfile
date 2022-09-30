FROM mariadb:10.9-jammy

RUN useradd -m -g mysql maria && \
    chown -R maria:mysql /var/lib/mysql

COPY 2204_for_fun.sql /docker-entrypoint-initdb.d/

USER maria
