FROM php:8.2-cli

# Install system dependencies & zip
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

# Copy dependency definition files first
COPY composer.json composer.lock ./

# Install dependencies with full flags to bypass local platform strictness
RUN composer install --no-dev --prefer-dist --no-interaction --ignore-platform-reqs

# Copy the rest of the application code
COPY . .

# Run config and route caching safely during build if env allows, otherwise just dump-autoload
RUN composer dump-autoload --optimize --no-dev --ignore-platform-reqs

EXPOSE 10000

CMD php artisan serve --host 0.0.0.0 --port 10000