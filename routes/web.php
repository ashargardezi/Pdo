<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PrintBarcodeController;
use App\Http\Controllers\StockCountcontroller;
use App\Http\Controllers\POSController;

use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UnitController;
use Illuminate\Routing\Router;

// for site controller
Route::get('/', [SiteController::class,'home'])->name('home');



// for Products
Route::get('/products', [ProductController::class,'index'])->name('products.index');
Route::get('/product/create', [ProductController::class,'create'])->name('products.create');
Route::post('/product', [ProductController::class,'store'])->name('products.store');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');



// for units

Route::get('/units', [UnitController::class,'index'])->name('units.index');
Route::get('/units/create', [UnitController::class,'create'])->name('units.create');
Route::get('/units/{id}/edit', [UnitController::class, 'edit'])->name('units.edit');
Route::put('/units/{id}/update', [UnitController::class, 'update'])->name('units.update');
Route::delete('/units/{id}', [UnitController::class, 'destroy'])->name('units.destroy');
Route::post('/units', [UnitController::class, 'store'])->name('units.store');



// for category
Route::get('/category', [CategoryController::class,'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class,'create'])->name('category.create');
Route::post('/category', [CategoryController::class,'store'])->name('category.store');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');

Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');




// for brands
Route::get('/brand', [BrandController::class,'index'])->name('brand.index');
Route::get('/brand/create', [BrandController::class,'create'])->name('brand.create');
Route::get('/brand/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
Route::put('/brand/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::delete('/brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
Route::post('/brand', [BrandController::class,'store'])->name('brand.store');


// for barcode
Route::get('/printbarcode', [PrintBarcodeController::class,'index'])->name('barcode.index');


// for stock
Route::get('/stock/count', [StockCountcontroller::class,'index'])->name('stock.index');

// for POs
Route::get('/pos', [POSController::class,'index'])->name('pos.index');























//  for sles
Route::prefix('sale')->group(function(){
    Route::get('/salelist', [SaleController::class,'salelist_show'])->name('salelist');
    Route::get('/addsale', [SaleController::class,'addSale_show'])->name('addsale');
    Route::get('/pos', [SaleController::class,'pos_show'])->name('pos');
    
    });
    