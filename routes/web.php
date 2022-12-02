<?php

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
    return view('welcome');
});

//Админпанель
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::get('/', IndexController::class)->name('admin.main.index');

//Категории 
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', IndexController::class)->name('admin.category.index');
        Route::get('/create', CreateController::class)->name('admin.category.create');
        Route::post('/', StoreController::class)->name('admin.category.store');
        Route::get('/{category}', ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', DeleteController::class)->name('admin.category.delete');
    });

    //Теги 
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', IndexController::class)->name('admin.tag.index');
        Route::get('/create', CreateController::class)->name('admin.tag.create');
        Route::post('/', StoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', ShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', EditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}', UpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}', DeleteController::class)->name('admin.tag.delete');
    });

        //Цвета
        Route::group(['namespace' => 'Color', 'prefix' => 'colors'], function () {
            Route::get('/', IndexController::class)->name('admin.color.index');
            Route::get('/create', CreateController::class)->name('admin.color.create');
            Route::post('/', StoreController::class)->name('admin.color.store');
            Route::get('/{color}', ShowController::class)->name('admin.color.show');
            Route::get('/{color}/edit', EditController::class)->name('admin.color.edit');
            Route::patch('/{color}', UpdateController::class)->name('admin.color.update');
            Route::delete('/{color}', DeleteController::class)->name('admin.color.delete');
        });

        //Пользователи
        Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
            Route::get('/', IndexController::class)->name('admin.user.index');
            Route::get('/create', CreateController::class)->name('admin.user.create');
            Route::post('/', StoreController::class)->name('admin.user.store');
            Route::get('/{user}', ShowController::class)->name('admin.user.show');
            Route::get('/{user}/edit', EditController::class)->name('admin.user.edit');
            Route::patch('/{user}', UpdateController::class)->name('admin.user.update');
            Route::delete('/{user}', DeleteController::class)->name('admin.user.delete');
        });

});


