# Gunakan image resmi PHP 8.2-FPM sebagai dasar
FROM php:8.2-fpm

# Set working directory di dalam container
WORKDIR /var/www/kanatojong

# Install dependensi sistem yang dibutuhkan
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

# Install ekstensi PHP yang dibutuhkan oleh Laravel & Intervention Image
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd xml

# Install Composer secara global
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Salin package.json dan package-lock.json terlebih dahulu
COPY package*.json ./

# FIX: Jalankan npm install di sini, di dalam container
RUN npm install

# Salin sisa file proyek
COPY . .

# Install dependensi Composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Atur kepemilikan file agar web server bisa menulis
RUN chown -R www-data:www-data /var/www/kanatojong/storage /var/www/kanatojong/bootstrap/cache

# Expose port 9000 untuk komunikasi dengan Nginx
EXPOSE 9000

# Perintah untuk menjalankan PHP-FPM saat container dimulai
CMD ["php-fpm"]