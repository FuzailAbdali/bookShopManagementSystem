<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\InvoicesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('store', 'BooksController@store');
Route::post('/store', [BooksController::class, 'store']);

Route::post('/update-record', [BooksController::class, 'update']);

Route::post('/delete-record', [BooksController::class, 'destroy']);

Route::post('/show-record', [BooksController::class, 'index']);



Route::post('/purchase-book', [PurchasesController::class, 'index']);

Route::get('/book-invoice', [InvoicesController::class, 'index']);