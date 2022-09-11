FROM node:18-alpine

RUN adduser -S computer2 -G users -s /bin/sh && \
    apk add --no-cache openssh openrc && ssh-keygen -A && \
    chmod u+s /usr/sbin/sshd && \
    sed -i 's/#PasswordAuthentication yes/PasswordAuthentication no/g' /etc/ssh/sshd_config && \
    mkdir -p /root/.ssh && \
    mkdir -p /run/openrc && touch /run/openrc/softlevel

COPY ./authorized_keys /root/.ssh


USER computer2
WORKDIR /opt/vault

COPY --chown=computer2:users ./bad-js /opt/vault

RUN npm install
USER root

EXPOSE 22 8080

CMD ["sh", "-c", "rc-status; rc-service sshd start; su computer2 -c 'npm run start'"]
