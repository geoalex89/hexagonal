FROM php:8.2-fpm

ARG HOST_USER=hostuser
ARG HOST_UID=1000
RUN groupadd --gid=$HOST_UID $HOST_USER \
    && useradd -c "Local user" --no-log-init --uid $HOST_UID --gid $HOST_UID -d /home/$HOST_USER -m -s /bin/bash $HOST_USER

# Install packages
RUN apt-get update && apt-get install -y libicu-dev libmcrypt-dev libzip-dev git curl zip unzip \
    && pecl install xdebug \
    && docker-php-ext-install intl \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pcntl

# setup xdebug
COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Configure PHP-FPM
COPY fpm-pool.conf /usr/local/etc/php-fpm.d/www.conf
COPY php.ini $PHP_INI_DIR/conf.d/custom.ini

# install composer && prestissimo plugin to speed up the installation process
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --no-ansi --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"