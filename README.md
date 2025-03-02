# Fashionably Late

## 環境構築

### Dockerビルド
1. git clone git@github.com:coachtech-material/laravel-docker-template.git
2. mv laravel-docker-template fashionably-late
3. git remote set -url origin git@github.com:ri0921/fashionably-late.git
4. git add .
5. git commit -m "リモートリポジトリの変更"
6. git push origin main
7. docker-compose.ymlのversion属性の記述を削除し、mysql:にplatform: linux/amd64の記述を追加
8. docker-compose up -d --build

### Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. composer require laravel/fortify
5. php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
6. php artisan migrate
7. composer require laravel-lang/lang:~7.0 --dev
8. php artisan db:seed


## 使用技術
* PHP 7.4.9
* Laravel 8.83.8
* MySQL 8.0.26

## ER図
![ER図](fashionably-late.png)

## URL
* 開発環境：[http://localhost/](http://localhost/)
* phpMyadmin：[http://localhost:8080/](http://localhost:8080/)
