<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Unitcontroller;

use App\Http\Controllers\Productcontroller;

use App\Http\Controllers\ProductInController;
use App\Http\Controllers\ProductOutController;
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
Route::get('/products',[Productcontroller::class,'index'])->name('products');
Route::get('/products/create',[Productcontroller::class,'create'])->name('createProduct');
Route::post('/products',[Productcontroller::class,'store'])->name('addProduct');
Route::get('products/{product}/edit',[Productcontroller::class,'edit'])->name('editProduct');
Route::put('products/{product}',[Productcontroller::class,'update'])->name('updateProduct');
Route::delete('products/{product}',[Productcontroller::class,'destroy'])->name('deleteProduct');

//route for productsin

Route::get('/productsin' , [ProductInController::class, 'index'])->name('productsIn');
Route::get('/productsin/create', [ProductInController::class, 'create'])->name('createProductsIn');
Route::post('/productsin', [ProductInController::class, 'store'])->name('addProductsIn');
route::get('/getdata/{id}', [ProductInController::class, 'getData']);

//route for productsout
Route::get('/productsout' , [ProductOutController::class, 'index'])->name('productsOut');
Route::get('/productsout/create', [ProductOutController::class, 'create'])->name('createProductsOut');
Route::post('/productsout', [ProductOutController::class, 'store'])->name('addProductsOut');
route::get('/getdata/{id}', [ProductOutController::class, 'getData']);


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