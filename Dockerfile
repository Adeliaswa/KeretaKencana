# --- STAGE 1: BUILD APLIKASI (untuk Composer & NPM) ---
FROM php:8.2-fpm AS build

# Install dependencies yang dibutuhkan untuk build (DEBIAN)
RUN apt-get update && apt-get install -y \
    git curl zip unzip \
    libpq-dev   # <--- Pastikan libpq-dev ada di sini

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql # <--- Akan menggunakan libpq-dev dari atas

# Install Node.js 18 (required for Vite/NPM)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# ... (Baris-baris lainnya tetap sama)

# --- STAGE 2: PRODUCTION RUNTIME (PHP-FPM + Nginx - ALPINE) ---
FROM php:8.2-fpm-alpine AS runtime

# Install Nginx dan dependencies yang dibutuhkan di runtime (APK)
RUN apk add --no-cache nginx

# Instal libpq-dev (headers) untuk mengompilasi pdo_pgsql, lalu hapus.
RUN apk add --no-cache --virtual .build-deps \
        libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && apk del .build-deps \
    && rm -rf /var/cache/apk/*
    
# Tambahkan libpq (runtime dependency) yang diinstal secara terpisah (opsional, untuk memastikan)
RUN apk add --no-cache libpq

# ... (Baris-baris lainnya tetap sama, pastikan copy nginx.conf tetap ada)

# Konfigurasi Nginx
COPY ./docker/nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 10000

# Script startup
CMD php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan route:clear && \
    php artisan storage:link || true && \
    php artisan migrate --force && \
    echo "Starting Nginx and PHP-FPM on port 10000" && \
    /usr/sbin/php-fpm82 -D && \
    nginx -g "daemon off;"