<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Unitcontroller;

use App\Http\Controllers\Productcontroller;

use App\Http\Controllers\Productcategorycontroller;
use App\Http\Controllers\ProductCalculateController;

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

// Route for product
Route::get('/product',[Productcontroller::class,'viewproduct']);

Route::post('/product',[Productcontroller::class,'addproduct']);

Route::get('/productlist',[Productcontroller::class,'listproduct']);

Route::get('productedit/{id}',[Productcontroller::class,'editproduct']);

Route::put('productupdate/{id}',[Productcontroller::class,'updateproduct']);

Route::get('productdelete/{id}',[Productcontroller::class,'deleteproduct']);

// Route for productcategory

Route::get('/productcategory',[Productcategorycontroller::class,'viewproductcategory']);

Route::post('/productcategory',[Productcategorycontroller::class,'addproductcategory']);

Route::get('/productcategorylist',[Productcategorycontroller::class,'listproductcategory']);

Route::get('productcategoryedit/{id}',[Productcategorycontroller::class,'editproductcategory']);

Route::put('productcategoryupdate/{id}',[Productcategorycontroller::class,'updateproductcategory']);

Route::get('productcategorydelete/{id}',[Productcategorycontroller::class,'deleteproductcategory']);


// Route for unit

Route::get('/unit',[Unitcontroller::class,'index']);

Route::post('/addunit',[Unitcontroller::class,'store']);

Route::get('/unitlist',[Unitcontroller::class,'list']);

Route::get('/unitedit/{id}',[Unitcontroller::class,'edit']);

Route::put('/unitupdate/{id}',[Unitcontroller::class,'update']);

Route::get('/unitdelete/{id}',[Unitcontroller::class,'delete']);

//Route for ProductCalculation

Route::get('/productcalculate', [ProductCalculateController::class, 'total']);