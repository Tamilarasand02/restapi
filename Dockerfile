# Use an official PHP runtime as a parent image
FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Copy all application files to /var/www/html (not inside wwwroot)
COPY . /var/www/html/

# Install required PHP extensions and Composer
RUN apt-get update && apt-get install -y libzip-dev unzip \
    && docker-php-ext-install zip

# Install Composer dependencies
RUN composer install

# Expose the port for the web service
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
