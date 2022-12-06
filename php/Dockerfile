FROM php:8.1.4-fpm

RUN ln -snf /usr/share/zoneinfo/"Europe/Paris" /etc/localtime && echo "Europe/Paris" > /etc/timezone \
&& printf '[PHP]\ndate.timezone = "%s"\n', "Europe/Paris" > /usr/local/etc/php/conf.d/tzone.ini \
&& "date"

RUN apt-get update \
    &&  apt-get install -y --no-install-recommends \
        locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev unzip libpq-dev nodejs npm wget \
        apt-transport-https lsb-release ca-certificates

RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen  \
    &&  echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen \
    &&  locale-gen



RUN docker-php-ext-configure \
            intl \
    &&  docker-php-ext-install \
            pdo pdo_mysql pdo_pgsql opcache intl zip calendar dom mbstring gd xsl

RUN pecl install apcu && docker-php-ext-enable apcu

WORKDIR /var/www/html

CMD composer i -o ; php-fpm

EXPOSE 9000