FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    unzip zip curl libicu-dev libzip-dev libpq-dev \
    && docker-php-ext-install intl zip pdo pdo_pgsql pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

COPY composer.json composer.lock ./

RUN composer install --optimize-autoloader --no-scripts

COPY . .

RUN chmod -R 777 database \
    && chmod 664 database/database.sqlite

RUN composer run-script post-autoload-dump

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

EXPOSE 8000

CMD php artisan migrate:fresh --seed --force && php artisan serve --host=0.0.0.0 --port=8000
