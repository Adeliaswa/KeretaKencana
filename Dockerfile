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

# Create necessary Laravel storage folders & permissions
RUN mkdir -p /app/storage/framework/cache/data \
    && mkdir -p /app/storage/framework/sessions \
    && mkdir -p /app/storage/framework/views \
    && mkdir -p /app/storage/logs \
    && mkdir -p /app/bootstrap/cache \
    && chmod -R 777 /app/storage \
    && chmod -R 777 /app/bootstrap/cache

RUN echo "APP_NAME=${APP_NAME}" > /app/.env && \
    echo "APP_ENV=production" >> /app/.env && \
    echo "APP_KEY=${APP_KEY}" >> /app/.env && \
    echo "APP_DEBUG=false" >> /app/.env && \
    echo "APP_URL=${APP_URL}" >> /app/.env && \
    echo "LOG_CHANNEL=stderr" >> /app/.env && \
    echo "LOG_LEVEL=debug" >> /app/.env && \
    echo "DB_CONNECTION=pgsql" >> /app/.env && \
    echo "DB_HOST=${DB_HOST}" >> /app/.env && \
    echo "DB_PORT=5432" >> /app/.env && \
    echo "DB_DATABASE=${DB_DATABASE}" >> /app/.env && \
    echo "DB_USERNAME=${DB_USERNAME}" >> /app/.env && \
    echo "DB_PASSWORD=${DB_PASSWORD}" >> /app/.env && \
    echo "SESSION_DRIVER=file" >> /app/.env

CMD php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan storage:link || true && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=10000

EXPOSE 10000
