FROM nginx:stable-alpine

RUN mkdir -p /var/www/app

WORKDIR /var/www/app