FROM neighborhoods/php-fpm-phalcon:php7.2_phalcon3.4
RUN apt-get update -y && apt-get install -y unzip procps
ARG PROJECT_NAME=demo3

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

EXPOSE 9002
