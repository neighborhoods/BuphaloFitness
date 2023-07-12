FROM php:8.1-fpm

# Install base libs
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        curl \
        jq \
        openssh-client \
        wget \
        git \
        libmemcached-dev \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        libxml2-dev \
        libedit-dev \
        libc-client-dev \
        libkrb5-dev \
        libzookeeper-mt-dev \
        libpcre3-dev \
        libzip-dev \
        libonig-dev \
        gcc \
        make \
        re2c \
        gettext-base \
        && \
    rm -r /var/lib/apt/lists/*

## Install PHP core modules
RUN docker-php-ext-install \
    pcntl

#    soap \
#    zip \
#    ftp \
#    sockets \
#    bcmath \
#    mbstring \
#    readline \
#    posix \
#    sysvmsg \
#    sysvsem \
#    sysvshm

# Install gd
RUN docker-php-ext-configure gd \
        --with-jpeg \
        --with-freetype && \
    docker-php-ext-install gd

# Install the PHP pdo_mysql extention
RUN docker-php-ext-install pdo_mysql

# Install the PHP pdo_pgsql extention
RUN docker-php-ext-install pdo_pgsql

## Install Redis
RUN pecl install redis-5.3.4 && \
    docker-php-ext-enable redis

## Install Memcached
RUN pecl install memcached \
    && docker-php-ext-enable memcached

## Install IMAP
RUN docker-php-ext-configure imap --with-imap-ssl --with-kerberos && \
	docker-php-ext-install imap

## Install Opcache
RUN docker-php-ext-install opcache && \
    docker-php-ext-enable opcache

# Install composer and add its bin to the PATH.
RUN curl -s http://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

ENV CONF_DIR="/usr/local/etc/php/conf.d"

RUN apt-get update -y && apt-get install -y unzip procps
ARG PROJECT_NAME=templates1

# COMPOSER_TOKEN can also be passed via file using COMPOSER_GITHUB_TOKEN
ARG COMPOSER_TOKEN=placeholder_token_you_must_replace_via_args_in_compose_file
ARG INSTALL_XDEBUG=true
ARG COMPOSER_INSTALL=true

ENV PROJECT_DIR=/var/www/html/${PROJECT_NAME}
ENV IS_DOCKER=1

RUN usermod -u 1000 www-data
RUN mkdir -p $PROJECT_DIR
WORKDIR $PROJECT_DIR

COPY . $PROJECT_DIR

RUN cp docker/xdebug.ini docker/opcache.ini docker/overrides.ini /usr/local/etc/php/conf.d/ ;\
    cp docker/entrypoint.sh /usr/local/bin/prime_containers.sh

RUN bash docker/build.sh \
    --xdebug ${INSTALL_XDEBUG} \
    --composer-install ${COMPOSER_INSTALL}

RUN mkdir -p data/cache/
RUN chmod -R a+rw data/cache/

CMD ["php-fpm"]

EXPOSE 9003
