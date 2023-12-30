<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
   
});

Route::get('/',[HomeController::class,'index']);
Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/view_category',[AdminController::class,'view_category'])->middleware('auth');
Route::post('/add_category',[AdminController::class,'add_category'])->middleware('auth');

Route::delete('/delete_category/{id}',[AdminController::class,'delete_category'])->middleware('auth')->name('delete_category');
Route::delete('/delete_product/{id}',[AdminController::class,'delete_product'])->middleware('auth')->name('delete_product');
Route::get('/update_product/{id}',[AdminController::class,'update_product'])->middleware('auth')->name('update_product');
Route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm'])->middleware('auth')->name('update_product_confirm');

Route::get('/view_product',[AdminController::class,'view_product'])->middleware('auth');
Route::post('/add_product',[AdminController::class,'add_product'])->middleware('auth');
Route::get('/show_product',[AdminController::class,'show_product'])->middleware('auth');

Route::get('/show_cart',[HomeController::class,'show_cart']);
Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

Route::get('/product_details/{id}',[HomeController::class,'product_details']);
Route::get('/add_to_cart/{id}',[HomeController::class,'add_to_cart'])->middleware('auth')->name('add_to_cart');




