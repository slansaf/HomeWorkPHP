# Используем официальный образ PHP с поддержкой Composer
FROM php:8.1-cli

# Устанавливаем необходимые расширения
RUN apt-get update && apt-get install -y \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем файлы проекта в контейнер
COPY . /app

# Устанавливаем рабочую директорию
WORKDIR /app

# Устанавливаем зависимости с помощью Composer
RUN composer install

# Команда по умолчанию для запуска
CMD ["php", "index.php"]
