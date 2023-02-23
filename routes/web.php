<?php

use App\Http\Controllers\admin\CustomerReportController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\InvoiceController;
use App\Http\Controllers\admin\InvoiceReportController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;

//auth
Route::get('/',[AuthController::class,'login_page'])->name('login.page');
Route::get('register_page',[AuthController::class,'register_page'])->name('register.page');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

//dashboard
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    Route::resource('/section',SectionController::class);

    Route::resource('/product',ProductController::class);
    //invoice
    Route::get('index', [InvoiceController::class,'index'])->name('index');
    Route::get('create', [InvoiceController::class,'create'])->name('create');
    Route::get('getproducts', [InvoiceController::class,'getproducts'])->name('getproducts');
    Route::post('store', [InvoiceController::class,'store'])->name('store');
    Route::get('edit/{id}', [InvoiceController::class,'edit'])->name('edit');
    Route::get('show/{id}', [InvoiceController::class,'show'])->name('show');
    Route::post('update/{id}', [InvoiceController::class,'update'])->name('update');
    Route::post('delete', [InvoiceController::class,'delete'])->name('delete');
    Route::post('change_status', [InvoiceController::class,'change_status'])->name('change.invoice.status');


    Route::get('open_file/{file_name}', [InvoiceController::class,'open_file'])->name('open.file_name');
    Route::get('download_file/{file_name}', [InvoiceController::class,'download_file'])->name('download.file_name');

    Route::get('paid', [InvoiceController::class,'paid'])->name('paid');
    Route::get('unpaid', [InvoiceController::class,'unpaid'])->name('unpaid');
    Route::get('paid_partial', [InvoiceController::class,'paid_partial'])->name('paid_partial');
    Route::get('archive_invoice', [InvoiceController::class,'archive_invoice'])->name('archive_invoice');

    Route::get('print_invoice/{id}', [InvoiceController::class,'print_invoice'])->name('print');
    Route::get('invoices/export/', [InvoiceController::class, 'export'])->name('export');

    Route::get('invoices_report', [InvoiceReportController::class, 'index'])->name('invoices.report');
    Route::post('Search_invoices', [InvoiceReportController::class, 'search_invoices'])->name('search.invoices');

    Route::get('customers_report', [CustomerReportController::class, 'index'])->name('customers.report');
    Route::post('Search_customers', [CustomerReportController::class, 'search_customers'])->name('search.customers');

    Route::get('MarkAsRead_all',[NotificationController::class,'MarkAsRead_all'])->name('MarkAsRead_all');
    Route::get('unreadNotifications_count', [NotificationController::class,'unreadNotifications_count'])->name('unreadNotifications_count');
    Route::get('unreadNotifications', [NotificationController::class,'unreadNotifications'])->name('unreadNotifications');

    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);

});