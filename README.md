## Установка

- git clone https://github.com/Denisqin/applicationTest.git -b master
- composer install
- docker-compose up -d --build
- docker exec -it applicationtest_apache_1 /bin/bash
- cp .env.example .env
- php artisan migrate --seed
- php artisan key:generate
- php artisan passport:install
- php artisan schedule:work (Для проверки перехода статуса по дате, дабы проверка не затянулась на сутки в файле App\Console\Kernel $schedule->command('check:acceptingEndDate')->daily() заменить daily() на everyMinute() и поставить ближайшую дату в нужном объекте)

# Первичные данные

Документация localhost/api/docs

### Пользователи

##### Зазакчики
firstcustomer@example.com / password
secondcustomer@example.com / password

##### Исполнители
firstexecutor@example.com / password
secondexecutor@example.com / password


