FROM php:8.1-fpm-alpine3.16 as base

RUN apk --update --virtual build-deps add \
        autoconf \
        make \
        gcc \
        g++ \
        libtool \
        icu-dev \
        curl-dev \
        freetype-dev \
        imagemagick-dev \
        pcre-dev \
        postgresql-dev \
        libmcrypt-dev \
        libjpeg-turbo-dev \
        libpng-dev \
        libwebp-dev \
        libxml2-dev && \
    apk add \
        git \
        curl \
        bash \
        bash-completion \
        icu \
        imagemagick \
        pcre \
        freetype \
        libmcrypt \
        libintl \
        libjpeg-turbo \
        libpng \
        libltdl \
        libxml2 \
        libzip \
        libzip-dev \
        curl-dev \
        mysql-client \
        npm \
        postgresql \
        openjdk8-jre\
    libreoffice && \
    pecl install \
        apcu \
        imagick \
        mcrypt-1.0.0

RUN docker-php-ext-configure gd \
        --enable-gd \
        --with-freetype \
        --with-jpeg\
        --with-webp
RUN docker-php-ext-configure bcmath && \
    docker-php-ext-configure calendar
RUN docker-php-ext-install \
        soap \
        zip \
        curl \
        bcmath \
        exif \
        gd \
        intl \
        opcache \
        pdo_mysql \
        calendar \
        pdo_pgsql && \
    apk del \
        build-deps

RUN apk add libzip # For error: Please reinstall the libzip distribution
RUN apk add libgomp

RUN apk --no-cache add msttcorefonts-installer fontconfig && \
    update-ms-fonts && \
    fc-cache -f

RUN echo "extension=apcu.so" > /usr/local/etc/php/conf.d/pecl-apcu.ini \
 && echo "extension=imagick.so" > /usr/local/etc/php/conf.d/pecl-imagick.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN apk add libreoffice ttf-linux-libertine
RUN apk add libxslt libxslt-dev && docker-php-ext-install -j$(nproc) xsl


RUN apk add $PHPIZE_DEPS
RUN apk add c-ares-dev && pecl install -D 'enable-sockets="yes" enable-openssl="yes" enable-http2="yes" enable-mysqlnd="yes" enable-swoole-json="yes" enable-swoole-curl="yes" enable-cares="yes" with-postgres="no"' swoole

RUN docker-php-ext-enable swoole \
        && pecl install redis && docker-php-ext-enable redis

RUN apk add --no-cache rabbitmq-c-dev && \
    pecl install amqp && \
    docker-php-ext-enable amqp

### DEV stage
FROM base as dev
RUN  apk add --update linux-headers && \
     pecl install xdebug && docker-php-ext-enable xdebug

RUN echo "fs.inotify.max_user_instances=524288" >> /etc/sysctl.conf && sysctl -p #NPM WATCH FIX
RUN echo "fs.inotify.max_user_instances=524288" >> /etc/sysctl.conf
RUN echo "fs.inotify.max_user_watches=524288" >> /etc/sysctl.conf
RUN echo "fs.inotify.max_queued_events=524288" >> /etc/sysctl.conf  && sysctl -p