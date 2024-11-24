FROM php:8.2.12-fpm

# Instalar dependencias y herramientas necesarias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    curl \
    git \
    && docker-php-ext-install pdo pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir el directorio de trabajo
WORKDIR /opt/htdocs/pr_comercio_electronico/

# Copiar los archivos del proyecto
COPY . .

# Instalar dependencias con Composer
RUN composer install
