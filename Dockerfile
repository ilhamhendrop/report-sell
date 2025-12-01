FROM dunglas/frankenphp:php8.4-bookworm

RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev libxml2-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql

WORKDIR /app
COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --no-scripts --optimize-autoloader

RUN mkdir -p storage/framework/{sessions,views,cache} \
    && chmod -R 777 storage bootstrap/cache

RUN php artisan config:cache || true
RUN php artisan route:cache || true
RUN php artisan view:cache || true

EXPOSE 8080

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
