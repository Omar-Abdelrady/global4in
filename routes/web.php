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

});

Route::group(['middleware' => 'auth:admin','as' => 'admin', 'name' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/', ['App\Http\Controllers\Admin\AdminController', 'index'])->name('.index');

    Route::group(['as' => '.store.', 'name' => 'admin', 'prefix' => '/store'], function (){
        Route::get('/categories', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'index'])->name('category');
        Route::get('/category/{slug}', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'show'])->name('category.show');
        Route::get('/category/edit/{slug}', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/category/update/{id}', ['App\Http\Controllers\Admin\Store\CategoryController', 'update'])->name('category.update');
        Route::get('/category/create', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'create'])->name('category.create');
        Route::post('/category/store', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'store'])->name('category.store');
    });
});

Route::get('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login');
Route::post('/login/submit', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'submit'])->name('admin.login.submit');
