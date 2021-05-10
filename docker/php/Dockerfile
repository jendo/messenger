FROM php:7.4-fpm

SHELL ["/bin/bash", "-o", "pipefail", "-c"]

RUN \
 usermod -u 1000 www-data && \
 groupmod -g 1000 www-data && \
 usermod -d /home/www-data -m -s /bin/bash www-data && \
 chown -R www-data:www-data /home/www-data

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libicu-dev wget zip unzip vim curl git

RUN docker-php-ext-install intl
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install opcache

# xdebug
RUN pecl install xdebug-2.9.8 && \
    docker-php-ext-enable xdebug

RUN mkdir -p /messenger
RUN chown -R www-data:www-data /messenger

ARG COMPOSER_VERSION=1.10.10
ARG COMPOSER_SHA256=8f16aa77b1236ed40855d8d141c0a939d108a939c8e73f9f32eadd3f05f181b9
RUN mkdir -p /usr/local/bin && \
    php -r "copy('https://getcomposer.org/download/${COMPOSER_VERSION}/composer.phar', '/usr/local/bin/composer');" && \
    test "$(sha256sum /usr/local/bin/composer | cut -d ' ' -f 1)" = "${COMPOSER_SHA256}" && \
    chmod +x /usr/local/bin/composer && \
    chown www-data:www-data /usr/local/bin/composer

WORKDIR /messenger
