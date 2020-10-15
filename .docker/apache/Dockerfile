FROM php:7.3-apache

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libicu-dev \
        libpq-dev \
        libxml2-dev \
        libzip-dev

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) opcache gd intl pdo_pgsql pdo_mysql zip \
    && docker-php-ext-enable opcache

RUN mkdir /var/log/apache/
RUN mkdir /var/www/html/web/

RUN sed -i "s/Listen 80/Listen 8080/" /etc/apache2/ports.conf

COPY apache.conf /etc/apache2/sites-available/site.conf

RUN a2enmod rewrite \
    && a2ensite site
