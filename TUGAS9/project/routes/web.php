<?php

use App\Http\Controllers;
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

Route::get('/', Controllers\HomeController::class);


Route::get('/about', [Controllers\AboutController::class, 'index']);

Route::get('/contact', [Controllers\ContactController::class, 'index']);

Route::get('/gallery', [Controllers\GalleryController::class, 'index']);

Route::get('/users', [Controllers\UserController::class, 'index']);

Route::get('/users/create', [Controllers\UserController::class, 'create']);

Route::post('/users', [Controllers\UserController::class, 'store']);
