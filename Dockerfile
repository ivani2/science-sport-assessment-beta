FROM php:8.4-cli

# Instalar dependencias del sistema y extensiones de PHP para SQLite
RUN apt-get update && apt-get install -y \
    unzip \
    libsqlite3-dev \
    git \
    curl \
    && docker-php-ext-install pdo pdo_sqlite

# Copiar Composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Crear el directorio database si no existe, el archivo sqlite y dar permisos de escritura
RUN mkdir -p /app/database \
    && touch /app/database/database.sqlite \
    && chmod -R 777 /app/database

EXPOSE 10000

# Comando de arranque: ejecuta migraciones y levanta el servidor
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000
