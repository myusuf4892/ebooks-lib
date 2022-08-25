<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Donatur\DonaturController;
use App\Http\Controllers\Donatur\BookDonaturController;
use App\Http\Controllers\Donatur\ReportDonaturController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\ReportController;


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

Route::get('/', [PageController::class, 'index']);
Route::get('/books', [PageController::class, 'books']);
Route::get('/books/{id}', [PageController::class, 'show'])->middleware('user');

Route::post('/carts', [PageController::class, 'cart'])->middleware('user');
Route::get('/carts/user/{id}', [PageController::class, 'cartDetail'])->middleware('user');
Route::post('/checkout', [PageController::class, 'checkout'])->middleware('user');
Route::get('/checkout/user/{id}', [PageController::class, 'checkoutDetail'])->middleware('user');
Route::get('/pay', [PageController::class, 'pay'])->middleware('user');
/**
 * Authentication app
 */
Route::get('/register', [RegisterController::class, 'main']);
Route::get('/register/donatur', [RegisterController::class, 'donatur']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'main']);
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [UserController::class, 'logout']);
/**
 * Route Admin
 */
Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');
Route::put('/admin/settings/{id}', [AdminController::class, 'setting'])->middleware('admin');
/**
 * Admin Books
 */
Route::get('/admin/books', [BookController::class, 'index'])->middleware('admin');
Route::post('/admin/books', [BookController::class, 'store'])->middleware('admin');
Route::post('/verification', [BookController::class, 'verification'])->middleware('admin');
Route::get('/admin/books/{id}/edit', [BookController::class, 'edit'])->middleware('admin');
Route::put('/admin/books/{id}', [BookController::class, 'update'])->middleware('admin');
Route::delete('/admin/books/{id}', [BookController::class, 'destroy'])->middleware('admin');
/**
 * Report Admin
 */
Route::get('/admin/reports', [ReportController::class, 'index'])->middleware('admin');
/**
 * Report Donatur
 */
Route::get('/donatur', [DonaturController::class, 'index'])->middleware('donatur');
Route::get('/donatur/reports/user/{id}', [ReportDonaturController::class, 'index'])->middleware('donatur');
/**
 * Donatur Books
 */
Route::get('/donatur/books/user/{id}', [BookDonaturController::class, 'index'])->middleware('donatur');
Route::post('/donatur/books', [BookDonaturController::class, 'store'])->middleware('donatur');
/**
 * Route User
 */
Route::get('/users/profile', function () {
    $data['title'] = 'Dashboard';
    return view('user.index', $data);
})->middleware('user');

