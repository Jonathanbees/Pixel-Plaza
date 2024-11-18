# Usa una imagen base de PHP con Apache
FROM php:8.2-apache

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    && docker-php-ext-configure gd \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Cambia el DocumentRoot de Apache para que apunte a la carpeta public de Laravel
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Habilita mod_rewrite en Apache
RUN a2enmod rewrite

# Copia los archivos del proyecto al contenedor
COPY . /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Cambia permisos para los directorios necesarios
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instala Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Instala dependencias con Composer
RUN composer install --no-dev --optimize-autoloader

# Configura el puerto que expondrá Apache
EXPOSE 80

# Define el comando para iniciar Apache en primer plano
CMD ["apache2-foreground"]
