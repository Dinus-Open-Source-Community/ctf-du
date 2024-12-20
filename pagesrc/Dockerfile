FROM php:8.1-apache

WORKDIR /var/www/html

COPY src/ .

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
