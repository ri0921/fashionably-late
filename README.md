# Fashionably Late

## 環境構築

### Dockerビルド
1. git clone https://github.com/ri0921/fashionably-late
2. docker-compose up -d --build

### Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. composer require laravel/fortify
5. php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
6. php artisan migrate
7. composer require laravel-lang/lang:~7.0 --dev
8. php artisan db:seed
9. php artisan key:generate


## 使用技術
* PHP 7.4.9
* Laravel 8.83.8
* MySQL 8.0.26

## ER図
![ER図](fashionably-late.png)

## URL
* 開発環境：[http://localhost/](http://localhost/)
* phpMyadmin：[http://localhost:8080/](http://localhost:8080/)
