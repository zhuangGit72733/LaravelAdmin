1、laravel包

2、laravel-admin的添加

composer require encore/laravel-admin

php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"

php artisan admin:install

3、Auth模板引入

php artisan make:auth

4、model与controller生成

php artisan make:model Models\Article

php artisan make:controller ArticlesController --resource --model=Models\Article