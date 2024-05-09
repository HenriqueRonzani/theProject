# Use the official PHP image as the base image
FROM php:7.4-fpm

# Set the working directory inside the container
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the project files into the container
COPY . .

# Install project dependencies
RUN composer install --no-interaction --no-scripts --no-plugins

# Generate application key
RUN php artisan key:generate

# Set permissions for storage and bootstrap/cache directories
RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
