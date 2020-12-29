<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Unitcontroller;

use App\Http\Controllers\Productcontroller;

use App\Http\Controllers\ProductInController;
use App\Http\Controllers\ProductOutController;
use App\Http\Controllers\FinalReportController;
use App\Http\Controllers\Productcategorycontroller;
use App\Http\Controllers\ProductCalculateController;

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
Route::get('productsin/{productIn}/edit',[ProductIncontroller::class,'edit'])->name('editProductIn');
Route::put('productsin/{productIn}',[ProductIncontroller::class,'update'])->name('updateProductIn');
Route::delete('productsin/{productIn}',[ProductIncontroller::class,'destroy'])->name('deleteProductIn');

Route::get('/searchProducts', [ProductInController::class, 'search'])->name('search');

//route for productsout
Route::get('/productsout' , [ProductOutController::class, 'index'])->name('productsOut');
Route::get('/productsout/create', [ProductOutController::class, 'create'])->name('createProductsOut');
Route::post('/productsout', [ProductOutController::class, 'store'])->name('addProductsOut');
route::get('/getdata/{id}', [ProductOutController::class, 'getData']);
Route::get('productsout/{productOut}/edit',[ProductOutcontroller::class,'edit'])->name('editProductOut');
Route::put('productsout/{productOut}',[ProductOutcontroller::class,'update'])->name('updateProductOut');
Route::delete('productsout/{productOut}',[ProductOutcontroller::class,'destroy'])->name('deleteProductOut');


Route::get('/data/{id}', [ProductOutController::class, 'show']);

//Route for final report
Route::get('/finalreport', [FinalReportController::class, 'index'])->name('finalReport');




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