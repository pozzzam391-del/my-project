FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring xml bcmath zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy dependency definition files first to leverage Docker cache
COPY composer.json composer.lock ./

# Install dependencies without running scripts initially
RUN composer install --no-dev --prefer-dist --no-interaction --no-scripts --ignore-platform-reqs

# Copy the rest of the application code
COPY . .

# Generate optimized autoloader
RUN composer dump-autoload --optimize --no-dev

EXPOSE 10000

CMD php artisan serve --host 0.0.0.0 --port 10000