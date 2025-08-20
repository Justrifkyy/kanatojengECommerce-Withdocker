FROM php:8.2-fpm

WORKDIR /var/www/kanatojeng

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    nodejs \
    npm

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd xml

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY package*.json ./
RUN npm install

COPY . .

RUN composer install --no-interaction --optimize-autoloader --no-dev

RUN chown -R www-data:www-data /var/www/kanatojeng/storage /var/www/kanatojeng/bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
