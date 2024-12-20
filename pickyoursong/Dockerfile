FROM php:7.4-apache

COPY src/ /var/www/html/
COPY flag.php /var/www/
RUN chown -R www-data:www-data /var/www/html/
RUN chmod 755 /var/www/html/
