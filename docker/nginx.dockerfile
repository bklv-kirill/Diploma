FROM nginx:stable-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

RUN delgroup dialout

RUN addgroup -g ${GID} --system diploma
RUN adduser -G diploma --system -D -s /bin/sh -u ${UID} diploma
RUN sed -i "s/user  nginx/user diploma/g" /etc/nginx/nginx.conf

RUN mkdir -p /var/www/html