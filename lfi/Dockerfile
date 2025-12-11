FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libzip-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install zip pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files first (for better caching)
COPY composer.json composer.lock* ./

# Install dependencies (if composer.lock exists)
RUN if [ -f composer.lock ]; then composer install --no-dev --no-interaction --no-progress; fi

# Copy application files
COPY . /var/www/html/

# Create clone directory with appropriate permissions
RUN mkdir -p /var/www/html/clone && \
    chown -R www-data:www-data /var/www/html/clone && \
    chmod -R 777 /var/www/html/clone

# Optimize autoloader
RUN if [ -f composer.json ]; then composer dump-autoload --optimize; fi

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Set Apache to listen on port 80
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]
