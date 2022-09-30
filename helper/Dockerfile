FROM python:3.10-alpine3.16

RUN adduser -S helper -G users

USER helper
WORKDIR /home/helper

COPY --chown=helper:users ./index.html /home/helper

EXPOSE 8000

CMD ["python3", "-m", "http.server"]
