<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryChartController;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', function () {
    return view('shop.index');
});
Route::get('category-chart',[CategoryChartController::class,'index']);

Route::resource('/products',ProductsController::class);

