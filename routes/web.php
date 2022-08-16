<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookController;


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

Route::get('/', [PageController::class, 'main']);
Route::get('/books', [PageController::class, 'book']);
Route::get('/about', [PageController::class, 'about']);
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
Route::get('/admin', [AdminController::class, 'main'])->middleware('admin');
Route::get('/admin/books', [BookController::class, 'main'])->middleware('admin');
Route::post('/admin/books', [BookController::class, 'store'])->middleware('admin');
/**
 * Route Donatur
 */
Route::get('/donatur/profile', function () {
    $data['title'] = 'Dashboard';
    return view('donatur.index', $data);
})->middleware('donatur');
/**
 * Route User
 */
Route::get('/users/profile', function () {
    $data['title'] = 'Dashboard';
    return view('user.index', $data);
})->middleware('user');

