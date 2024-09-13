<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ClientController;

Route::controller(ClientController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/{category:slug}/{post:slug}', 'getPost');
});
Route::controller(ApiController::class)->group(function () {
    Route::get('/api/slug/{slug}', 'checkSlug');
    Route::get('/api/search/{search_query}', 'search');
});
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'dashboard');
    Route::get('/admin/posts', 'all');
    Route::get('/admin/posts/new', 'new');
    Route::get('/admin/posts/{post}', 'edit');
    Route::post('/admin/posts/new', 'store');
    Route::patch('/admin/posts/{post}', 'patch');
    Route::delete('/admin/posts/{post}', 'delete');
    Route::get('/admin/categories', 'categories');
    Route::get('/admin/categories/new', 'new_category');
    Route::get('/admin/categories/{category}', 'edit_category');
    Route::post('/admin/categories/', 'store_category');
    Route::patch('/admin/categories/{category}', 'update_category');
    Route::delete('/admin/categories/{category}', 'delete_category');
});
