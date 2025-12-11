FROM php:8.2-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install necessary packages
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/
COPY flag.txt /

# Create clone directory with appropriate permissions
RUN mkdir -p /var/www/html/clone && \
    chown -R www-data:www-data /var/www/html/clone && \
    chmod -R 755 /var/www/html/clone

# Set Apache to listen on port 80
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]
