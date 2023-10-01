1. Клонировать проект: git clone https://github.com/sintsovamy/api.git
2. Перейти в каталог проекта
3. Запустить Docker Compose: docker-compose up -d
4. Запустить миграции и заполнение данных: php artisan migrate && php artisan db:seed или sail artisan migrate && sail artisan db:seed
5. Запустить приложение: php artisan serve или sail artisan serve
