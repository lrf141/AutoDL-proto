# Gambit
教育用深層学習システムのプロトタイプ

# 環境セットアップ

```
$ docker-compose build
$ docker-compose up -d
$ composer install
$ echo '' >> ./storage/logs/laravel.log
$ sudo chmod 777 -R ./storage/ ./bootstrap/
$ cp .env.example .env
$ php artisan key:generate
```
