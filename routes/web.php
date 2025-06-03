<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ResourceController::class, 'index']);
Route::get('/dashboard', [ResourceController::class, 'dashboard']);
Route::get('/resources/create', [ResourceController::class, 'create']);
Route::get('/resources/{id}/edit', [ResourceController::class, 'edit'])->name('resources.edit');
Route::put('/resources/{id}', [ResourceController::class, 'update'])->name('resources.update');
Route::delete('/resources/{id}', [ResourceController::class, 'destroy'])->name('resources.destroy');
Route::post('/resources', [ResourceController::class, 'store']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::post('/categories', [CategoryController::class, 'store']);

