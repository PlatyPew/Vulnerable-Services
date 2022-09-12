FROM node:18-alpine

RUN adduser -S computer2 -G users -s /bin/sh && \
    apk add --no-cache openssh openrc && ssh-keygen -A && \
    chmod u+s /usr/sbin/sshd && \
    sed -i 's/#PasswordAuthentication yes/PasswordAuthentication no/g' /etc/ssh/sshd_config && \
    mkdir -p /root/.ssh && \
    mkdir -p /run/openrc && touch /run/openrc/softlevel

COPY ./weak-rsa/authorized_keys /root/.ssh
COPY ./flag4.txt /root/flag.txt


USER computer2
WORKDIR /opt/vault

COPY --chown=computer2:users ./bad-js /opt/vault
COPY --chown=computer2:users ./authorized_keys /home/computer2
COPY --chown=computer2:users ./flag3.txt /home/computer2/flag.txt

RUN npm install && \
    echo "sudo cp authorized_keys /root/.ssh/authorized_keys" >> /home/computer2/.ash_history

USER root

EXPOSE 22 3000

CMD ["sh", "-c", "rc-status; rc-service sshd start; su computer2 -c 'npm run start'"]
