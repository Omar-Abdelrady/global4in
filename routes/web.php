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
Route::get('/admin', function () {
    return view('admin.index');
});

Route::group(['middleware' => 'auth:web'], function () {
    Route::group(['as' => 'store.', 'name' => 'store', 'prefix' => 'store'], function () {
        Route::post('/feedback/store', [\App\Http\Controllers\Web\Store\ProductFeedbackController::class, 'store'])->name('feedback.store');
    });
});

Route::group(['middleware' => 'auth:admin', 'as' => 'admin', 'name' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/', ['App\Http\Controllers\Admin\AdminController', 'index'])->name('.index');

    Route::group(['as' => '.store.', 'name' => 'admin', 'prefix' => '/store'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Store\StoreController::class, 'index'])->name('store.index');
        Route::get('/categories/create', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'create'])->name('category.create');
        Route::post('/categories/store', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'store'])->name('category.store');
        Route::get('/categories', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'index'])->name('category');
        Route::get('/categories/{slug}', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'show'])->name('category.show');
        Route::get('/categories/edit/{slug}', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/categories/update/{id}', ['App\Http\Controllers\Admin\Store\CategoryController', 'update'])->name('category.update');
        Route::post('categories/delete/{slug}', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'destroy'])->name('category.destroy');
        Route::resource('sizes', \App\Http\Controllers\Admin\Store\SizeController::class)->parameters(['sizes' => 'id']);
        Route::resource('colors', \App\Http\Controllers\Admin\Store\ColorController::class)->parameters(['colors' => 'id']);
        Route::resource('products', \App\Http\Controllers\Admin\Store\ProductController::class)->parameters(['products' => 'slug']);
    });

    Route::get('admin/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
});

Route::get('admin/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login');
Route::post('/login/submit', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'submit'])->name('admin.login.submit');
