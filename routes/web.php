<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\BankNameController;
use App\Http\Controllers\AddPointController;
use App\Http\Controllers\MoneyCustomersController;
use App\Http\Controllers\PointLowestController;
use App\Http\Controllers\PostProductsController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProvinceController;
use Illuminate\Support\Facades\DB;
use App\Models\PostProducts;



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
    $current_date = date('Y-m-d H:i:s');
    $data = DB::table('post_products')
    ->where('expiration_date','<' ,$current_date)
    ->get();

    foreach ($data as $items) {
        PostProducts::where('id', $items->id)
        ->update(['status' => 'expired']);
    }
  
    $dataZone = DB::table('post_products')
        ->where('status','!=' ,"expired")
        ->where('zom_name','!=', "0")
        ->orderBy('id','DESC')
        ->paginate(50);

        $dataImage = DB::table('adverts')
        ->get();
        $manu = DB::table('categories')
        ->get();
    
    return view('welcome',['dataZone' => $dataZone,'dataImage'=> $dataImage,'manu' => $manu]);
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::post('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/address', [AddressController::class, 'index']);
Route::post('/add-address',[ AddressController::class,'store']);
Route::put('update-address/{id}',[ AddressController::class,'update']);

Route::get('/car_brand', [CarBrandController::class, 'index']);
Route::get('/add-car_brand', [CarBrandController::class, 'create']);
Route::get('/edit-car_brand/{id}', [CarBrandController::class, 'edit']);
Route::post('/add-car_brand_name', [CarBrandController::class, 'store']);
Route::put('update-car_brand_name/{id}',[ CarBrandController::class,'update']);
Route::get('/delete-car_brand/{id}', [CarBrandController::class, 'destroy']);


Route::get('/car_model', [CarModelController::class, 'index']);
Route::get('/add-model_car', [CarModelController::class, 'create']);
Route::post('/add-model_name', [CarModelController::class, 'store']);
Route::get('/edit-model_name/{id}', [CarModelController::class, 'edit']);
Route::put('/update-model_name/{id}', [CarModelController::class, 'update']);
Route::get('/delete-model_name/{id}', [CarModelController::class, 'destroy']);
Route::get('/get-api-model/{id}', [CarModelController::class, 'get_api_model']);


Route::get('/bank_name', [BankNameController::class, 'index']);
Route::get('/create_bank_name', [BankNameController::class, 'create']);
Route::post('/add-bank_name', [BankNameController::class, 'store']);
Route::get('/delete-bank_name/{id}', [BankNameController::class, 'destroy']);


Route::get('/add_point', [AddPointController::class, 'index']);
Route::get('/create_point', [AddPointController::class, 'create']);
Route::post('/add-point', [AddPointController::class, 'store']);
Route::put('/update-point/{id}', [AddPointController::class, 'update']);

Route::get('/money-customers', [MoneyCustomersController::class, 'index']);
Route::post('/money-customers', [MoneyCustomersController::class, 'index']);
Route::get('/all-products', [MoneyCustomersController::class, 'products']);
Route::post('/all-products', [MoneyCustomersController::class, 'products']);

Route::get('/point-loweste', [PointLowestController::class, 'index']);
Route::get('/create-point_loweste', [PointLowestController::class, 'create']);
Route::post('/add-point_loweste', [PointLowestController::class, 'store']);
Route::put('/update-point_loweste/{id}', [PointLowestController::class, 'update']);
Route::get('/delete-point_lowest/{id}', [PointLowestController::class, 'destroy']);


Route::get('/post_products', [PostProductsController::class, 'index']);
Route::post('/post_products', [PostProductsController::class, 'index']);
Route::get('/create-post_products', [PostProductsController::class, 'create']);
Route::post('/add-post_products', [PostProductsController::class, 'store']);
Route::put('/destroy-post_products/{id}', [PostProductsController::class, 'destroy']);
Route::get('/edit-post_products/{id}', [PostProductsController::class, 'edit']);
Route::put('/update-post_products/{id}', [PostProductsController::class, 'update']);
Route::get('/renew-post_products/{id}', [PostProductsController::class, 'renew']);
Route::put('/update-renew/{id}', [PostProductsController::class, 'updateRenew']);



Route::get('/all-car', [CarController::class, 'index']);
Route::get('/select-car/{id}', [CarController::class, 'show']);
Route::post('/searchCar', [CarController::class, 'selectCar']);
Route::get('/category-manu/{name}', [CarController::class, 'category']);
Route::get('/searchPo-ma/{name}', [CarController::class, 'searchPoma']);


Route::get('/advert', [AdvertController::class, 'index']);
Route::get('/create-advert', [AdvertController::class, 'create']);
Route::get('/edit-advert/{id}', [AdvertController::class, 'edit']);
Route::post('/add-advert', [AdvertController::class, 'store']);
Route::put('/update-advert/{id}', [AdvertController::class, 'update']);
Route::put('/update-advert/{id}', [AdvertController::class, 'update']);
Route::get('/delete-advert/{id}', [AdvertController::class, 'destroy']);


Route::get('/manu', [CategoryController::class, 'index']);
Route::get('/create_manu', [CategoryController::class, 'create']);
Route::post('/add-manu', [CategoryController::class, 'store']);
Route::get('/edit-manu/{id}', [CategoryController::class, 'edit']);
Route::put('/update-manu/{id}', [CategoryController::class, 'update']);
Route::get('/delete-manu/{id}', [CategoryController::class, 'destroy']);


Route::get('/province', [ProvinceController::class, 'index']);
Route::get('/create-province', [ProvinceController::class, 'create']);
Route::post('/add-province', [ProvinceController::class, 'store']);
Route::get('/delete-province/{id}', [ProvinceController::class, 'destroy']);