laravel包

laravel-admin的添加
composer require encore/laravel-admin
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
php artisan admin:install
Auth模板引入
php artisan make:auth
