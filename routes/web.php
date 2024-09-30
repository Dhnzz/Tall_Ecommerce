<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Product;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/products', Product::class)
    ->middleware(['auth'])
    ->name('products');

require __DIR__.'/auth.php';
