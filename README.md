[![Build Status](https://travis-ci.org/lrf141/Gambit.svg?branch=master)](https://travis-ci.org/lrf141/Gambit)
[![Code Coverage](https://scrutinizer-ci.com/g/lrf141/Gambit/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/lrf141/Gambit/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/lrf141/Gambit/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/lrf141/Gambit/?branch=master)
[![PHP-Version](https://img.shields.io/badge/PHP-%3E%3D7.2-blue.svg)](PHP-V)
[![Node-Version](https://img.shields.io/badge/node-10.10.0-blue.svg)](Node-V)
[![Laravel-Version](https://img.shields.io/badge/laravel-5.6-blue.svg)](Laravel-V)
[![MIT License](http://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)
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
