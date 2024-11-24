<?php

use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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


/** sesion de Router PRoducts  */
Route::get('/products',[ProductController::class, 'index']);
Route::post('/products',[ProductController::class, 'store']);
//Route::put('/cuenta/{id}',[CuentaController::class, 'update']);
Route::delete('/products/{id}',[ProductController::class, 'destroy']);
Route::post('/products-show',[ProductController::class, 'show']);


/** sesion de Router ORder  */
Route::get('/order',[OrderController::class, 'index']);
Route::post('/order',[OrderController::class, 'store']);
//Route::put('/cuenta/{id}',[CuentaController::class, 'update']);
Route::delete('/order/{id}',[OrderController::class, 'destroy']);
Route::post('/order-show',[OrderController::class, 'show']);

Route::post('/order-items',[OrderController::class, 'order_create']);
