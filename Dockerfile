# PHP base image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    nginx

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Set working directory
WORKDIR /var/www/html

# Copy app source
COPY . .

# Install composer inside container
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Laravel optimize
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Expose port 80
EXPOSE 80

# Start PHP + Nginx
CMD service nginx start && php-fpm