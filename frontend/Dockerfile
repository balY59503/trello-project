# Используем образ Node.js
FROM node:14-alpine

# Устанавливаем рабочую директорию
WORKDIR /usr/src/app

# Копируем зависимости и устанавливаем их
COPY frontend/package.json .
COPY frontend/package-lock.json .

RUN npm install

# Копируем исходный код фронтенда в контейнер
COPY frontend/src .

# Собираем приложение Vue
RUN npm run build

# Команда по умолчанию для запуска приложения (может быть изменена в зависимости от потребностей)
# CMD ["npm", "run", "serve"]