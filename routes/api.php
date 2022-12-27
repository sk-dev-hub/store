<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'App\Http\Controllers\API'], function () {

    //Продукты
    Route::group(['namespace' => 'Product', 'prefix' => 'products'], function () {
        Route::post('/', IndexController::class)->name('api.product.index');
        Route::get('/filters', FilterListController::class)->name('api.product.filter');
        Route::get('/{product}', ShowController::class)->name('api.product.show');


    });

});