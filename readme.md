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

5、route与controller的基本操作

6、laravel-admin后台引入

php artisan admin:make ArticlesController --model=App\Models\Article

7、laravel-admin完善基本功能