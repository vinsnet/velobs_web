FROM php:7.0-apache

COPY src/ /var/www/html/

COPY ./docker-entrypoint /usr/local/bin/

ENTRYPOINT ["docker-entrypoint"]
#CMD ["apache2-foreground"]
