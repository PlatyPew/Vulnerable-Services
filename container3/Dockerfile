FROM debian:buster

RUN apt-get update && apt-get install socat -y && \
    useradd -m -g users computer3

WORKDIR /opt/website
COPY ./web-bof/httpserver /opt/website
COPY ./web-bof/index.html /opt/website

COPY ./format-attack/echoservice /usr/bin
RUN chmod 4755 /usr/bin/echoservice

USER computer3

EXPOSE 8080

CMD ["socat", "tcp-l:8080,fork,reuseaddr", "exec:'./httpserver'"]
