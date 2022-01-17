<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\FrontEndController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController as FrontendFrontendController;
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

Route::get('/', [FrontendFrontendController::class, 'index']);
Route::get('/category', [FrontendFrontendController::class, 'categories']);
Route::get('/category/{id}', [FrontendFrontendController::class, 'viewcategory']);
Route::get('/category/{name}/{id}', [FrontendFrontendController::class, 'productview']);

Auth::routes();

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('delete-cart/{id}', [CartController::class, 'destroy']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::get('delall', [CartController::class, 'dellAll']);
    Route::post('place-order', [CheckoutController::class, 'order']);
    Route::get('/dashboard', [FrontEndController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    //**CATEGORIES RELATED ROUTES */
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
