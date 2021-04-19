<?php

use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\PostController;
use App\Models\BillType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sub-bill-type',function(Request $request){
    $provinceId = $request->input('q');
    return BillType::query()->where('pid', $provinceId)->get(['id', DB::raw('tag as text')]);
})->name('sub-bill-type');

Route::middleware('throttle:60,1')->prefix('v1')->domain(env('API_DOMAIN', 'api.chia2.com'))->group(function() {
    Route::get('/articles/{page?}', [PostController::class, 'index'])->name('blog.articles');
    Route::get('/article/{id}',  [PostController::class, 'detail'])->where(['id' => '[1-9]{1}[0-9]*']);
});

Route::middleware('throttle:60,1')->prefix('v2')->domain(env('API_DOMAIN', 'api.chia2.com'))->group(function() {
    Route::get('/bing', [ImageController::class, 'bing'])->name('bing');
});
