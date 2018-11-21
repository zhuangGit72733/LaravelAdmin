1、laravel安装

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

8、过滤规则引入

9、分类模块

php artisan make:controller CategoriesController --resource --model=Models\Category

php artisan admin:make CategoriesController --model=App\Models\Category

10、图片功能添加
