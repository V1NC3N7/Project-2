FROM php:7.1-fpm-alpine

RUN  apk update && docker-php-ext-install pdo pdo_mysql mysqli

RUN apk add freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    openssl \
&& docker-php-ext-install iconv \
&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install gd

RUN mkdir /php

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apk add --no-cache $PHPIZE_DEPS \
	&& pecl install xdebug-2.5.0 \
	&& docker-php-ext-enable xdebug

RUN pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && echo "extension=mongo.so" > /usr/local/etc/php/conf.d/ext-mongo.ini