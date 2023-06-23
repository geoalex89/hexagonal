FROM nginx
RUN rm /etc/nginx/conf.d/default.conf

ARG HOST_USER=hostuser
ARG HOST_UID=1000

RUN groupadd --gid=$HOST_UID $HOST_USER \
    && useradd -c "Local user" --no-log-init --uid $HOST_UID --gid $HOST_UID -d /home/$HOST_USER -m -s /bin/bash $HOST_USER