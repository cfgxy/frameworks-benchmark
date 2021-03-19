FROM php:8.0-fpm-buster
RUN sed -i 's/deb.debian.org/mirrors.aliyun.com/g' /etc/apt/sources.list; \
    sed -i 's/security.debian.org/mirrors.aliyun.com/g' /etc/apt/sources.list
RUN apt-get update -y
RUN apt install -y libicu-dev
RUN docker-php-ext-install intl
RUN docker-php-ext-install opcache

WORKDIR /home/httpd/www
COPY . .

RUN mkdir -p "/home/httpd/www/writable/cache" "/home/httpd/www/writable/debugbar" "/home/httpd/www/writable/logs" "/home/httpd/www/writable/session" "/home/httpd/www/writable/uploads"
RUN chown -R www-data:www-data /home/httpd/www/writable

USER www-data
VOLUME [ "/home/httpd/www/writable/cache", "/home/httpd/www/writable/debugbar", "/home/httpd/www/writable/logs", "/home/httpd/www/writable/session", "/home/httpd/www/writable/uploads" ]

USER root