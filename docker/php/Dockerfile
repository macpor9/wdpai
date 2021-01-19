FROM php:7.4.3-fpm-alpine3.11

# Copy the application code
COPY . /app


RUN echo 'memory_limit = 2M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

VOLUME ["/app"]
