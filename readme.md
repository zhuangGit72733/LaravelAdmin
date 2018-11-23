1、laravel安装

2、laravel-admin的添加

composer require encore/laravel-admin         composer下载laravel-admin
 
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"     发布laravel-admin资源

php artisan admin:install          laravel-admin安装

3、Auth模板引入

php artisan make:auth           生成Auth模板

4、model与controller生成

php artisan make:model Models\Article  生成Article模型

php artisan make:controller ArticlesController --resource --model=Models\Article  建立article控制器，关联article模型

5、route与controller的基本操作

6、laravel-admin后台引入

php artisan admin:make ArticlesController --model=App\Models\Article        laravel-admin引入article模块

7、laravel-admin完善基本功能

8、过滤规则引入

9、分类模块

php artisan make:controller CategoriesController --resource --model=Models\Category  生成分类的控制器和模型

php artisan admin:make CategoriesController --model=App\Models\Category      laravel-admin引入分类模块

10、图片功能添加

11、api接口开发

php artisan make:resource Article          生成Article资源，即json串

php artisan make:controller Api\ArticlesController   生成Api\ArticlesController控制器，用来设置过滤规则
