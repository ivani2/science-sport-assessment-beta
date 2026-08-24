FROM php:8.4-cli

# 1. Instalar dependencias del sistema, SQLite y Node.js
RUN apt-get update && apt-get install -y \
    unzip \
    libsqlite3-dev \
    git \
    curl \
    gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_sqlite

# 2. Copiar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# 3. Copiar el código
COPY . .

# 4. Instalar dependencias y compilar assets (Tailwind / Vite)
RUN composer install --no-dev --optimize-autoloader
RUN npm install
RUN npm run build

# 5. Crear BD SQLite y asignar PERMISOS TOTALES a la carpeta public y storage
RUN mkdir -p /app/database \
    && touch /app/database/database.sqlite \
    && chmod -R 777 /app/database \
    && chmod -R 777 /app/storage /app/bootstrap/cache /app/public

EXPOSE 10000

# 6. Ejecutar migraciones + SEEDERS al arrancar
CMD php artisan migrate:fresh --seed --force && php artisan serve --host=0.0.0.0 --port=10000
