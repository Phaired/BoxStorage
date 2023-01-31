ARG PHP_ALPINE
ARG PHP_VERSION

FROM php:${PHP_VERSION}-fpm-alpine${PHP_ALPINE}
ARG PHP_EXTENSIONS
ARG TIMEZONE

RUN apk add --no-cache tzdata
ENV TZ $TIMEZONE
RUN printf '[PHP]\ndate.timezone = '${TZ}'\n' > /usr/local/etc/php/conf.d/tzone.ini

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && install-php-extensions ${PHP_EXTENSIONS}

RUN curl -o /usr/local/bin/composer https://getcomposer.org/download/latest-stable/composer.phar && \
    chmod +x /usr/local/bin/composer

RUN apk add --no-cache git bash &&  \
    curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash && apk add symfony-cli

WORKDIR /var/www/html

CMD ["php-fpm"]

EXPOSE 9000