<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\FrontEndController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    //**CATEGORIES RELATED ROUTES */
    Route::get('/dashboard', [FrontEndController::class, 'index']);
    Route::get('categories', [CategoriesController::class, 'index']);
    Route::get('add-category', [CategoriesController::class, 'add']);
    Route::post('insert-category', [CategoriesController::class, 'insert']);
    Route::get('edit-category/{id}', [CategoriesController::class, 'edit']);
    Route::post('update-category/{id}', [CategoriesController::class, 'update']);
    Route::get('delete-category/{id}', [CategoriesController::class, 'destroy']);

    //**PRODUCTS RELATED ROUTES */
    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-product', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::post('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);



});

