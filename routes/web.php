<?php

use App\Models\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

Route::get('/', [ClientController::class, 'home']);
Route::get('/admin', [AdminController::class, 'dashboard']);
Route::get('/admin/posts', [AdminController::class, 'all']);
Route::get('/admin/posts/new', [AdminController::class, 'new']);
Route::post('/admin/posts/new', [AdminController::class, 'store']);
