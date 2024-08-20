# Use an official PHP runtime as a parent image
FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Install required PHP extensions and Composer
RUN apt-get update && apt-get install -y libzip-dev unzip \
    && docker-php-ext-install zip

# Install Composer for dependency management
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy PHP application code
COPY . /var/www/html/

# Install dependencies
RUN composer install

# Expose the port for the web service
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
