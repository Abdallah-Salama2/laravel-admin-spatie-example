<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\PostController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get("/posts/{post}",[\App\Http\Controllers\PostController::class,'destroy'])->name('posts.delete');
Route::post("/posts",[\App\Http\Controllers\PostController::class,'store'])->name('posts.store');
Route::put("/posts/{post}", [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
