## Как запустить проект

- Клонируйте репозиторий и откройте папку приложения
- Создайте файл .env в корневой папке приложения
- Создайте БД с именем url_shortener
- Выполните команды ```composer install``` и ```npm install``` в терминале, чтобы установить проект и его зависимости.
- Выполните команду ```php artisan key:generate``` для создания ключа приложения.
- Выполните команду ```php artisan migrate``` для создания таблиц в БД.
- Выполните ```npm run build``` и ```php artisan serve``` для запуска проекта.
- Проект запуститься по адресу http://127.0.0.1:8000
