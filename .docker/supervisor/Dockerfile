FROM php:8.1.3-apache

LABEL maintainer="Nice <kanyarut@wecraft.co.th>" \
      version="1.0"

ADD .docker/supervisor/supervisord.conf /etc/

RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install bcmath \
    && apt-get update \ 
    && apt-get install -y --no-install-recommends supervisor

RUN pecl install redis && docker-php-ext-enable redis

COPY .docker/webapp/php.ini /usr/local/etc/php/

CMD ["supervisord", "-c", "/etc/supervisord.conf"]