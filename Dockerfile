FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . /app

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Create necessary Laravel folders & set permissions
RUN mkdir -p /app/storage/framework/cache/data \
    && mkdir -p /app/storage/framework/sessions \
    && mkdir -p /app/storage/framework/views \
    && mkdir -p /app/storage/logs \
    && mkdir -p /app/bootstrap/cache \
    && chmod -R 777 /app/storage \
    && chmod -R 777 /app/bootstrap/cache

# Create storage symlink
RUN php artisan storage:link || true

# Run migrations and start server
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000

EXPOSE 10000
