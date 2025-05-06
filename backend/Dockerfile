# Используем образ PHP
FROM php:7.4-apache

# Устанавливаем необходимые расширения PHP и пакеты
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev

# Копируем исходный код серверной части приложения в контейнер
COPY backend /var/www/html

# Настройка Apache (если необходимо)
# ...

# Экспонируем порт (если нужно)
# EXPOSE 80

# Команда запуска сервера приложения
# CMD ["apache2-foreground"]