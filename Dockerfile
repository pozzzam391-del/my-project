FROM php:8.2-cli

# Install system dependencies & zip for composer
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip

# Install all required PHP extensions for Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring xml bcmath

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Install dependencies ignoring platform requirements if any extension is missing locally
RUN composer install --no-dev --prefer-dist --no-interaction --ignore-platform-reqs

EXPOSE 10000

CMD php artisan serve --host 0.0.0.0 --port 10000