<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CanController;
use App\Http\Controllers\CanUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/brands', [BrandController::class, 'index'])
    ->name('brands.index');
Route::get('/brands/create', [BrandController::class, 'create'])
    ->name('brands.create');
Route::get('/brands/{id}', [BrandController::class, 'show'])
    ->name('brands.details');
Route::post('/brands', [BrandController::class, 'store'])
    ->name('brands.store');

Route::get('/cans', [CanController::class, 'index'])
    ->name('cans.index');
Route::get('/cans/create', [CanController::class, 'create'])
    ->name('cans.create')
    ->middleware('auth');
Route::post('/cans', [CanController::class, 'store'])
    ->name('cans.store')
    ->middleware('auth');
Route::get('/cans/{id}', [CanController::class, 'show'])
    ->name('cans.show');
Route::get('/cans/create/{id}', [CanController::class, 'edit'])
    ->name('cans.edit')
    ->middleware('auth');
Route::post('/cans', [CanController::class, 'update'])
    ->name('cans.update');

Route::get('/collection', [CanUserController::class, 'index'])
    ->name('collection.index');
Route::get('/collection/create', [CanUserController::class, 'create'])
    ->name('collection.create');
Route::get('/collection/{id}', [CanUserController::class, 'show'])
    ->name('collection.details');
Route::post('/collection', [CanUserController::class, 'store'])
    ->name('collection.store');

Route::get('/reviews', [ReviewController::class, 'index'])
    ->name('reviews.index');
Route::get('/reviews/create', [ReviewController::class, 'create'])
    ->name('reviews.create');
Route::get('/reviews/{id}', [ReviewController::class, 'show'])
    ->name('reviews.details');
Route::post('/reviews', [ReviewController::class, 'store'])
    ->name('reviews.store');

