# doorprizeLaravel
1. install xammp(php and mysql) dan composer
2. create database di mysql <nama database>, sebelumnya nyalakan mysql di xampp nya
3. buka directory project di terminal/cmd, pastiin arahin ke folder yang di dalemnya ada file laravel nya (ada folder app,bootstrap, config, database dsb)
4. composer install (untuk install depedency yang dipake di project laravel nya)
5. create/copy env file + configure (copy .env.example .env)  , env file = file konfigurasi untuk db dan semacamnya
6. php artisan key:generate (untuk generate app_key nya)
7. php artisan migrate (untuk create table participant, prize dan claim di db nnya)
8. php artisan serve (untuk jalanin si aplikasi web nya, di arahin ke 127.0.0.1:8000 nanti)
