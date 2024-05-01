FROM php:8.2-fpm-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

RUN mkdir -p /var/www/app

WORKDIR /var/www/app

RUN delgroup dialout

RUN addgroup -g ${GID} --system trudnyj_vybor
RUN adduser -G trudnyj_vybor --system -D -s /bin/sh -u ${UID} trudnyj_vybor

RUN sed -i "s/user = www-data/user = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

RUN docker-php-ext-install pdo pdo_mysql bcmath

USER trudnyj_vybor

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]