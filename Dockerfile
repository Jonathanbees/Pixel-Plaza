FROM php:8.2-fpm

# Instalar extensiones y herramientas necesarias
RUN apt-get update && apt-get install -y \
    curl \
    libpq-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip

# Instalar Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copiar el código del proyecto
WORKDIR /var/www/html

# Exponer el puerto 8000
EXPOSE 8000

CMD ["php", "artisan", "migrate"]

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
