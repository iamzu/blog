<?php

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
