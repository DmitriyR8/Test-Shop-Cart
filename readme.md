           
            
            Инструкция по развороту проекта:
            
1. Склонить проект: git clone https://DmitryR8@bitbucket.org/DmitryR8/shop.git
2. Cоздать .env в корне с примера .env.example и заменить данные 
    DB_DATABASE=shop
    DB_USERNAME=user_name
    DB_PASSWORD=pass
3. Выполнить команду composer install
4. Выполнить команду php artisan key:generate
5. Создать БД с именем базы указанной в .env
6. Проверить что все миграции проведены(php artisan migrate:status должен
   показать все пункты выполненными, иначе прогнать миграции командой
   php artisan migrate)
7. Прогнать сидеры с помощью команды php artisan db:seed
8. Запустить проект с помощью команды php artisan serve

В проекте есть админка в которой можно создавать и изменять данные, к админке можно достучаться
по роуту /admin. Логин - admin, пароль - admin.
