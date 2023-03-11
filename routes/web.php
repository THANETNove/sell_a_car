<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CarBrandController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/address', [AddressController::class, 'index']);
Route::post('/add-address',[ AddressController::class,'store']);
Route::put('update-address/{id}',[ AddressController::class,'update']);

Route::get('/car_brand', [CarBrandController::class, 'index']);
Route::get('/add-car_brand', [CarBrandController::class, 'create']);
Route::get('/edit-car_brand/{id}', [CarBrandController::class, 'edit']);
Route::post('/add-car_brand_name', [CarBrandController::class, 'store']);
Route::put('update-car_brand_name/{id}',[ CarBrandController::class,'update']);