<?php

//use App\Http\Controllers\Admin\PostController;
//use App\Http\Controllers\Admin\TagController;
//use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Blog\IndexController;
//use App\Http\Controllers\BlogController;
//use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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

//Route::get('/', function () {
//    return redirect('/blog');
//});
//Route::get('/excel', [BlogController::class, 'excel'])->name('blog.excel');
//Route::get('/blog', [BlogController::class, 'index'])->name('blog.name');
//Route::get('/blog/test', [BlogController::class, 'test'])->name('blog.test');
//Route::get('/blog/{slug}', [BlogController::class, 'showPost'])->name('blog.detail');
//
//Route::get('admin', function () {
//    return redirect('/admin/post');
//});
//
//Route::middleware('auth')->prefix('admin')->group(function () {
//    Route::resource('/post', PostController::class)->except('show');
//    Route::resource('/tag', TagController::class);
//    Route::get('/upload', [UploadController::class, 'index']);
//    Route::post('upload/file', [UploadController::class, 'uploadFile']);
//    Route::delete('upload/file', [UploadController::class, 'deleteFile']);
//    Route::post('upload/folder', [UploadController::class, 'createFolder']);
//    Route::delete('upload/folder', [UploadController::class, 'deleteFolder']);
//});
//
////登录退出
//Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//Route::post('/login', [LoginController::class, 'login']);
//Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//
//Route::get('contact', [ContactController::class, 'showForm']);
//Route::post('contact', [ContactController::class, 'sendContactInfo']);
//Route::get('rss', [BlogController::class, 'rss']);
Route::group(['domain' => 'manage.chia2.com'], function () {
    Route::get('{all}', function () {
        return Redirect::away('https://manage.chia2.com/manage', 301);
    })->where('all', '.*');
});
//博客
Route::group(['domain' => 'blog.chia2.com'], function () {
////    Route::get('sitemap.xml', [BlogController::class, 'siteMap']);
    Route::get('/', [IndexController::class, 'index'])->name('blog.index');
    Route::get('/post/{id}', [IndexController::class, 'showPost'])->name('blog.detail');

    Route::get('/upgrade-browser.html', function(){
        return view('blog.upgrade-browser');
    });
});

