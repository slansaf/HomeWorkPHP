# Используем официальный образ PHP
FROM php:8.1-cli

# Устанавливаем необходимые расширения (если нужно)
RUN apt-get update && apt-get install -y \
    libzip-dev \
    && docker-php-ext-install zip

# Копируем файлы проекта в контейнер
COPY src/ /app/src/
COPY index.php /app/

# Устанавливаем рабочую директорию
WORKDIR /app

# Команда по умолчанию для запуска
CMD ["php", "index.php"]
