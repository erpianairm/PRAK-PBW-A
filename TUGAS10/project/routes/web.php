<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', Controllers\HomeController::class);
Route::get('/about-us', [Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/gallery', [Controllers\GalleryController::class, 'index'])->name('gallery');

Route::resource('users', Controllers\UserController::class)->middleware('auth');


Route::get('login', [Controllers\LoginController::class,'loginForm' ])->name('login')->middleware('guest');
Route::post('login', [Controllers\LoginController::class,'authenticate']);

Route::post('logout', Controllers\LogoutController::class)->name('logout')->middleware('auth');