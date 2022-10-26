<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\RazorPaymentController;

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

Route::post('/update-record', [BooksController::class, 'update']);


Route::get('/add-book', function () {
    return view('add-book');
});

Route::post('store-book', [BooksController::class, 'store']);



Route::get('/view-added-books', [BooksController::class, 'index']);
Route::post('/view-added-books', [BooksController::class, 'index']);



Route::post('delete-book', [BooksController::class, 'destroy']);



Route::get('/delete-book/{id}', function ($id) {
    $id =compact('id');
    return view('/delete-book')->with($id);
});

Route::get('edit-book/{id}', [BooksController::class, 'update']);


Route::get('/edit-book/{id}', function ($id) {
    $id =compact('id');
    return view('/edit-book')->with($id);
});

Route::post('update-book', [BooksController::class, 'update']);


Route::get('/purchase-book/{id}', function ($id) {
    $id =compact('id');
    return view('/purchase-book')->with($id);
});

Route::post('buy-book', [PurchasesController::class, 'index']);

Route::post('show-invoice', [InvoicesController::class, 'index']);



Route::get('/invoice', function () {
    return view('/invoice');
});

// Route::post('/print-invoice', [InvoicesController::class, 'createPDF']);

Route::get('/print-invoice', function () {
    return view('/print-invoice');
});


Route::get('/view-invoice', function () {
    return view('/invoice-view-pdf');
});

Route::post('view-invoice', [InvoicesController::class, 'createPDF']);

// Route::get('generate-invoice-pdf', [InvoicesController::class, 'downloadPDF']);



Route::get('razorpay-payment', [RazorPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorPaymentController::class, 'store'])->name('razorpay.payment.store');