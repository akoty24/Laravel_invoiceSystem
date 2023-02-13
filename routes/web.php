<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\InvoiceController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\front\frontController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth','auth.admin'])->group(callback: function () {
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
});


Route::get('/',[AuthController::class,'login_page'])->name('login.page');
Route::get('register_page',[AuthController::class,'register_page'])->name('register.page');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');


Route::get('home',[frontController::class,'home'])->name('home');
Route::resource('/section',SectionController::class);
Route::resource('/product',ProductController::class);

Route::get('index', [InvoiceController::class,'index'])->name('index');
Route::get('create', [InvoiceController::class,'create'])->name('create');
Route::get('getproducts', [InvoiceController::class,'getproducts'])->name('getproducts');
Route::post('store', [InvoiceController::class,'store'])->name('store');
Route::get('edit/{id}', [InvoiceController::class,'edit'])->name('edit');
Route::post('change_status', [InvoiceController::class,'change_status'])->name('change.invoice.status');
Route::get('show/{id}', [InvoiceController::class,'show'])->name('show');
Route::post('update/{id}', [InvoiceController::class,'update'])->name('update');
Route::post('delete', [InvoiceController::class,'delete'])->name('delete');
Route::get('open_file/{file_name}', [InvoiceController::class,'open_file'])->name('open.file_name');
Route::get('download_file/{file_name}', [InvoiceController::class,'download_file'])->name('download.file_name');

Route::get('paid', [InvoiceController::class,'paid'])->name('paid');
Route::get('unpaid', [InvoiceController::class,'unpaid'])->name('unpaid');
Route::get('paid_partial', [InvoiceController::class,'paid_partial'])->name('paid_partial');
