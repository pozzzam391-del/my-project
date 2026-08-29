<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 🟢 កែត្រង់នេះ (ដក middleware auth ចេញ)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// 🟢 Route សម្រាប់ memory page
Route::get('/memory', function () {
    return view('memory');
})->name('memory');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
