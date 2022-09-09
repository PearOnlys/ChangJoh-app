FROM php:8.1.3-apache

LABEL maintainer="Nice <kanyarut@wecraft.co.th>" \
      version="1.0"

RUN apt-get update && apt-get install -y \
    libonig-dev \
    libmagickwand-dev --no-install-recommends

RUN pecl install imagick \
	  && docker-php-ext-enable imagick

RUN docker-php-ext-install pdo pdo_mysql \
    && a2enmod rewrite negotiation \
    && docker-php-ext-install opcache

RUN apt-get install -y unzip libzip-dev zlib1g-dev \
    && docker-php-ext-install zip

RUN pecl install redis && docker-php-ext-enable redis

RUN apt-get install -y libxml2-dev \
    && CFLAGS="-I/usr/src/php" docker-php-ext-install xmlreader

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

RUN mkdir /srv/app
RUN chown www-data:www-data /srv/app
COPY .docker/webapp/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY .docker/webapp/php.ini /usr/local/etc/php/

WORKDIR /srv/app
COPY /src .
RUN chmod -R 755 /srv/app/storage
RUN composer install --optimize-autoloader --no-dev
