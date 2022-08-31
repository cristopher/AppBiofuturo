FROM php:7-fpm-alpine
RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
  docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql && \
  apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev