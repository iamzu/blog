<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    //轮播图
    $router->resource('rotations', 'RotationController');
    //博客菜单
    $router->resource('blog-menus', 'BlogMenuController');
    //文章
    $router->resource('posts', 'PostController');
    //标签
    $router->resource('tags', 'TagController');
    //友情链接
    $router->resource('links', 'LinkController');
});
