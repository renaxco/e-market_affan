<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/blog', [DashboardController::class, 'blog']);
Route::resource('/produk', ProdukController::class);
Route::get('/download/produk', [ProdukController::class, 'download']);