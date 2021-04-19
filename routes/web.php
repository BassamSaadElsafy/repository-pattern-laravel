<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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

//using get request for testing only//
Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{id}/update', [CustomerController::class, 'update'])->name('customers.update');
Route::get('/customers/{id}/delete', [CustomerController::class, 'destroy'])->name('customers.destroy');

