<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurposeBrandController;
use App\Http\Controllers\PurposeServicesController;
use Illuminate\Support\Facades\Auth;

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


Route::group(['middleware' => 'auth' ], function() {


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::resource('services', ServiceController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('purpose_brand', PurposeBrandController::class);
    Route::resource('purpose_service', PurposeServicesController::class);


 

    # Raw Companies
    Route::get('/raw-companies', [\App\Http\Controllers\RawCompanyController::class, 'index'])->name('raw-companies');
    Route::post('/raw-companies/store', [\App\Http\Controllers\RawCompanyController::class, 'store']);

    # Raw Category
    Route::get('/raw-category', [\App\Http\Controllers\RawCategoryController::class, 'index']);
    Route::post('/raw-category/store', [\App\Http\Controllers\RawCategoryController::class, 'store']);

    # Raw Service
    Route::get('/raw-service', [\App\Http\Controllers\RawServiceController::class, 'index']);
    Route::post('/raw-service/store', [\App\Http\Controllers\RawServiceController::class, 'store']);

    # Raw Brand
    Route::get('/raw-brand', [\App\Http\Controllers\RawBrandController::class, 'index']);
    Route::post('/raw-brand/store', [\App\Http\Controllers\RawBrandController::class, 'store']);

     # Password Reset
    Route::get('/change_password_view', [App\Http\Controllers\HomeController::class, 'change_password_view'])->name('change_password_view');
    Route::PUT('change_password', [App\Http\Controllers\HomeController::class, 'change_password'])->name('change_password');

});

