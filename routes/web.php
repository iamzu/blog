<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/blog');
});
Route::get('/blog', [BlogController::class,'index'])->name('blog.name');
Route::get('/blog/{slug}', [BlogController::class,'showPost'])->name('blog.detail');

Route::get('admin',function(){
    return redirect('/admin/post');
});

Route::middleware('auth')->group(function(){
    Route::resource('admin/post', PostController::class);
    Route::resource('admin/tag', TagController::class);
    Route::get('admin/upload', [UploadController::class,'index']);
});

//登录退出
Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login']);
Route::get('/logout', [LoginController::class,'logout'])->name('logout');