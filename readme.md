<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

# Laravel 5.5

### 社群登入

使用官方套件 Laravel Socialite 串接 Facebook 登入。

### 十二星座

以爬蟲方式抓取[十二星座](http://astro.click108.com.tw/)資料，使用了 GuzzleHttp、Dom Crawler 相關套件。

  - 當天日期
  - 星座名稱
  - 整體運勢的評分及說明
  - 愛情運勢的評分及說明
  - 事業運勢的評分及說明
  - 財運運勢的評分及說明

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.5/installation#installation)


Clone the repository

    git clone git@github.com:ryotsu1036/laravel55.git

Switch to the repo folder

    cd laravel55

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
