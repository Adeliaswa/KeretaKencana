# --- STAGE 1: BUILD APLIKASI (untuk Composer & NPM) ---
FROM php:8.2-fpm AS build

# Install dependencies 
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql

# Install Node.js 18 (required for Vite/NPM)
# Menggunakan NodeSource untuk Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Copy Composer binary
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy seluruh aplikasi
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies & build Vite assets
RUN npm install && npm run build

# --- STAGE 2: PRODUCTION RUNTIME (PHP-FPM + Nginx) ---
FROM php:8.2-fpm-alpine AS runtime

# Install Nginx dan dependencies lain
# Menggunakan alpine untuk image yang lebih kecil
RUN apk add --no-cache nginx \
    libpq \
    && rm -rf /var/cache/apk/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql

COPY --from=build /app /var/www/html/

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Konfigurasi Nginx
COPY ./docker/nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 10000

CMD php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan route:clear && \
    php artisan storage:link || true && \
    php artisan migrate --force && \
    echo "Starting Nginx and PHP-FPM on port 10000" && \
    /usr/sbin/php-fpm82 -D && \
    nginx -g "daemon off;"