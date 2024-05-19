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
RUN echo "post_max_size = 200M" >> /usr/local/etc/php/conf.d/docker-fpm.ini
RUN echo "upload_max_filesize = 200M" >> /usr/local/etc/php/conf.d/docker-fpm.ini

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions pdo pdo_mysql bcmath sockets

COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
RUN apk update && \
    apk update && \
    apk add --no-cache linux-headers && \
    apk add --no-cache --virtual .docker-php-xdebug $PHPIZE_DEPS && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug && \
    apk del .docker-php-xdebug

USER trudnyj_vybor

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]