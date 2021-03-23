# Copyright (c) 2021 Gu Xiaoyu
# Frameworks-Benchmark is licensed under Mulan PSL v2.
# You can use this software according to the terms and conditions of the Mulan PSL v2. 
# You may obtain a copy of Mulan PSL v2 at:
#          http://license.coscl.org.cn/MulanPSL2 
# THIS SOFTWARE IS PROVIDED ON AN "AS IS" BASIS, WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO NON-INFRINGEMENT, MERCHANTABILITY OR FIT FOR A PARTICULAR PURPOSE.  
# See the Mulan PSL v2 for more details.

FROM php:8.0-fpm-buster
RUN sed -i 's/deb.debian.org/mirrors.aliyun.com/g' /etc/apt/sources.list; \
    sed -i 's/security.debian.org/mirrors.aliyun.com/g' /etc/apt/sources.list
RUN apt-get update -y
RUN apt install -y libicu-dev
RUN docker-php-ext-install intl
RUN docker-php-ext-install opcache
RUN docker-php-ext-install pdo_mysql

RUN apt install -y unzip

WORKDIR /home/httpd/www
COPY . .
RUN php composer.phar install --no-dev --prefer-dist --optimize-autoloader  

RUN mkdir -p "/home/httpd/www/storage/framework/cache" "/home/httpd/www/storage/framework/sessions" "/home/httpd/www/storage/logs"
RUN chown -R www-data:www-data /home/httpd/www/storage

USER www-data
VOLUME [ "/home/httpd/www/storage/framework/cache", "/home/httpd/www/storage/framework/sessions", "/home/httpd/www/storage/logs" ]

USER root