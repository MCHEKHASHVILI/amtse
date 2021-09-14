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
    return redirect()->route("dashboard");
    //return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');


Route::get('/dashboard/orders/transportation_out/{order}', [App\Http\Controllers\OrdersController::class, "transportation_out"])->name("order.transportation.out");
Route::get('/dashboard/orders/transportation_end/{order}', [App\Http\Controllers\OrdersController::class, "transportation_end"])->name("order.transportation.end");
Route::get('/dashboard/orders/transportation_start/{order}', [App\Http\Controllers\OrdersController::class, "transportation_start"])->name("order.transportation.start");

Route::get('/dashboard/orders/manufacturing_out/{order}', [App\Http\Controllers\OrdersController::class, "manufacturing_out"])->name("order.manufacturing.out");
Route::get('/dashboard/orders/manufacturing_end/{order}', [App\Http\Controllers\OrdersController::class, "manufacturing_end"])->name("order.manufacturing.end");
Route::get('/dashboard/orders/manufacturing_start/{order}', [App\Http\Controllers\OrdersController::class, "manufacturing_start"])->name("order.manufacturing.start");
Route::get('/dashboard/orders/sell/{order}', [App\Http\Controllers\OrdersController::class, "sell"])->name("order.sell");
Route::post('/dashboard/orders/create_offer/{order}', [App\Http\Controllers\OrdersController::class, "create_offer"])->name("order.offer.create");
Route::put('/dashboard/orders/update_offer/{offer}', [App\Http\Controllers\OrdersController::class, "update_offer"])->name("order.offer.update");
Route::resource('/dashboard/orders', App\Http\Controllers\OrdersController::class);
Route::resource('/dashboard/products', App\Http\Controllers\ProductsController::class);



