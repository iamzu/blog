<?php

use App\Http\Controllers\Manage\PostController;
use App\Http\Controllers\Manage\TagController;
use App\Http\Controllers\Manage\UploadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
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
Route::get('/blog', [BlogController::class, 'index'])->name('blog.name');
Route::get('/blog/test', [BlogController::class, 'test'])->name('blog.test');
Route::get('/blog/{slug}', [BlogController::class, 'showPost'])->name('blog.detail');

Route::get('manage', function () {
    return redirect('/admin/post');
});

Route::middleware('auth')->prefix('manage')->group(function () {
    Route::resource('/post', PostController::class)->except('show');
    Route::resource('/tag', TagController::class);
    Route::get('/upload', [UploadController::class, 'index']);
    Route::post('upload/file', [UploadController::class, 'uploadFile']);
    Route::delete('upload/file', [UploadController::class, 'deleteFile']);
    Route::post('upload/folder', [UploadController::class, 'createFolder']);
    Route::delete('upload/folder', [UploadController::class, 'deleteFolder']);
});

//登录退出
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('contact', [ContactController::class, 'showForm']);
Route::post('contact', [ContactController::class, 'sendContactInfo']);
Route::get('rss', [BlogController::class, 'rss']);
Route::get('sitemap.xml', [BlogController::class, 'siteMap']);
