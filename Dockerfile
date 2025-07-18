FROM php:8.3-fpm

WORKDIR /var/www/symfony

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libpq-dev \
    && docker-php-ext-install pdo_mysql pgsql mysqli

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY . .

RUN composer install --no-interaction --optimize-autoloader

EXPOSE 9000 80