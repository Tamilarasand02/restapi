# Use an official PHP runtime as a parent image
FROM php:8.3-apache

# Set working directory
WORKDIR /var/www/html

# Copy application files to the container
COPY . ./

# Install required PHP extensions and Composer
RUN apt-get update && apt-get install -y libzip-dev unzip \
    && docker-php-ext-install zip

# Install Composer dependencies
RUN composer install

# Expose port 8080
EXPOSE 8080

# Set environment variable for the port
ENV PORT 8080
RUN sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf && \
    sed -i "s/:80/:${PORT}/" /etc/apache2/sites-available/000-default.conf

# Start Apache in the foreground
CMD ["apache2-foreground"]
