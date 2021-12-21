<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdditionalController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\OrderController;

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

//Route::get('/', function () {
//    return view('include.main');
//});
Route::get('/', [HomeController::class, 'index'])->name('home');

// category
Route::get('all-cat', [CategoryController::class, 'allCategory'])->name('cat');
Route::get('add-cat', [CategoryController::class, 'addCat'])->name('add-cat');
Route::post('/store-cat', [CategoryController::class, 'storeCat'])->name('store-cat');
Route::get('edit-cat/{slug}', [CategoryController::class, 'editCat'])->name('edit-cat');
Route::patch('update-cat/{id}', [CategoryController::class, 'updateCat'])->name('update-cat');
Route::get('cat-delete/{id}', [CategoryController::class, 'destroy'])->name('cat-delete');

// subcategory
Route::get('all-subcat', [SubCategoryController::class, 'allSubCategory'])->name('subcat');
Route::get('add-subcat', [SubCategoryController::class, 'addSubCat'])->name('add-subcat');
Route::post('store-subcat', [SubCategoryController::class, 'storeSubCat'])->name('store-subcat');
Route::get('edit-subcat/{slug}', [SubCategoryController::class, 'editSubCat'])->name('edit-subcat');
Route::patch('update-subcat/{id}', [SubCategoryController::class, 'updateSubCat'])->name('update-subcat');
Route::get('subcat-delete/{id}', [SubCategoryController::class, 'destroy'])->name('subcat-delete');


//country
Route::get('all-country', [HomeController::class, 'allCountry'])->name('country');
Route::get('add-country', [HomeController::class, 'addCountry'])->name('add-country');
Route::post('store-country', [HomeController::class, 'storeCountry'])->name('store-country');
Route::get('edit-country/{slug}', [HomeController::class, 'editCountry'])->name('edit-country');
Route::patch('update-country/{id}', [HomeController::class, 'updateCountry'])->name('update-country');
Route::get('country-delete/{id}', [HomeController::class, 'destroyCountry'])->name('country-delete');

//country
Route::get('all-brand', [HomeController::class, 'allBrand'])->name('brand');
Route::get('add-brand', [HomeController::class, 'addBrand'])->name('add-brand');
Route::post('store-brand', [HomeController::class, 'storeBrand'])->name('store-brand');
Route::get('edit-brand/{slug}', [HomeController::class, 'editBrand'])->name('edit-brand');
Route::patch('update-brand/{id}', [HomeController::class, 'updateBrand'])->name('update-brand');
Route::get('brand-delete/{id}', [HomeController::class, 'destroyBrand'])->name('brand-delete');

//color & size
Route::get('all-color', [AdditionalController::class, 'allColor'])->name('color');
Route::get('add-color', [AdditionalController::class, 'addColor'])->name('add-color');
Route::post('store-color', [AdditionalController::class, 'storeColor'])->name('store-color');
Route::get('color-delete/{id}', [AdditionalController::class, 'destroyColor'])->name('color-delete');

Route::get('all-size', [AdditionalController::class, 'allSize'])->name('size');
Route::get('add-size', [AdditionalController::class, 'addSize'])->name('add-size');
Route::post('store-size', [AdditionalController::class, 'storeSize'])->name('store-size');
Route::get('size-delete/{id}', [AdditionalController::class, 'destroySize'])->name('size-delete');



//product
Route::get('product', [ProductController::class, 'allProduct'])->name('product');
Route::get('product-details/{slug}', [ProductController::class, 'productDetail'])->name('product-details');
Route::get('add-product', [ProductController::class, 'addPro'])->name('add-product');
Route::post('store-product', [ProductController::class, 'storePro'])->name('store-product');
Route::get('edit-product/{slug}', [ProductController::class, 'editProduct'])->name('edit-product');
Route::patch('update-product/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
Route::get('product-delete/{id}', [ProductController::class, 'destroy'])->name('product-delete');

//attribute
Route::get('product-attribute/{slug}', [ProductController::class, 'attribute'])->name('product-attribute');
Route::post('store-attribute', [ProductController::class, 'storeAttribute'])->name('store-attribute');

//stock
Route::get('product-stock-log', [ProductController::class, 'StockProductLog'])->name('product-stock-log');
Route::get('add-stock/{id}', [ProductController::class, 'addStock'])->name('add-stock');
Route::post('store-stock/{id}', [ProductController::class, 'storeStock'])->name('store-stock');

Route::get('purchase', [OrderController::class, 'purchase'])->name('purchase');
Route::post('store-order', [OrderController::class, 'order'])->name('store-order');

//variation
Route::get('all-variation', [VariationController::class, 'variation'])->name('variation');
Route::get('add-variation', [VariationController::class, 'addVariation'])->name('add-variation');
Route::post('store-variation', [VariationController::class, 'storeVariation'])->name('store-variation');
Route::get('edit-variation/{id}', [VariationController::class, 'editVariation'])->name('edit-variation');
Route::patch('update-variation/{id}', [VariationController::class, 'updateVariation'])->name('update-variation');
Route::get('variation-delete/{id}', [VariationController::class, 'destroyVariation'])->name('variation-delete');


//variation item
Route::get('all-variation-item', [VariationController::class, 'variationItem'])->name('variation-item');
Route::get('add-variation-item', [VariationController::class, 'addVariationItem'])->name('add-variation-item');
Route::post('store-variation-item', [VariationController::class, 'storeVariationItem'])->name('store-variation-item');
Route::get('edit-variation-item/{id}', [VariationController::class, 'editVariationItem'])->name('edit-variation-item');
Route::patch('update-variation-item/{id}', [VariationController::class, 'updateVariationItem'])->name('update-variation-item');
Route::get('variation-item-delete/{id}', [VariationController::class, 'destroyVariationItem'])->name('variation-item-delete');




