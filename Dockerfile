FROM php:8.4-cli

# 1. Instalar dependencias del sistema, SQLite y Node.js (necesario para Vite)
RUN apt-get update && apt-get install -y \
    unzip \
    libsqlite3-dev \
    git \
    curl \
    gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_sqlite

# 2. Copiar Composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# 3. Copiar el proyecto
COPY . .

# 4. Instalar dependencias de PHP y compilar el Frontend (Vite)
RUN composer install --no-dev --optimize-autoloader
RUN npm install
RUN npm run build

# 5. Preparar la base de datos SQLite y permisos
RUN mkdir -p /app/database \
    && touch /app/database/database.sqlite \
    && chmod -R 777 /app/database \
    && chmod -R 777 /app/storage /app/bootstrap/cache

EXPOSE 10000

# 6. Ejecutar migraciones y encender el servidor
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000
