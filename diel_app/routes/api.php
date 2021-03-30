<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::get("/orders",[OrderController::class,"index"])->name("orders_view");
Route::get("/orders/{id}",[OrderController::class,"show"])->name("order_view");
Route::post('/order_save', [OrderController::class,"store"])->name("order_store");
Route::put('/order_update/{id}', [OrderController::class,"update"])->name("order_update");
Route::delete('/orders/{order}', [OrderController::class,"delete"])->name("order_delete");