FROM php:8.3.11-apache
RUN apt-get update -y && apt-get install -y openssl zip unzip git 
RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /var/www/html
COPY ./public/.htaccess /var/www/html/.htaccess
WORKDIR /var/www/html

# Renombrar .env.example a .env y agregar campos necesarios
RUN cp .env.example .env
RUN sed -i 's/DB_DATABASE=laravel/DB_DATABASE=pixel-plaza-bd/' .env
RUN sed -i 's/DB_USERNAME=root/DB_USERNAME=pixelplaza/' .env
RUN sed -i 's/DB_PASSWORD=/DB_PASSWORD=pixelplazapass/' .env
RUN echo "GEMINI_API_KEY=${GEMINI_API_KEY}" >> .env
RUN echo "HUGGINGFACE_API_KEY=${HUGGINGFACE_API_KEY}" >> .env

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

RUN php artisan key:generate
RUN php artisan migrate
RUN chmod -R 777 storage
RUN a2enmod rewrite
RUN service apache2 restart