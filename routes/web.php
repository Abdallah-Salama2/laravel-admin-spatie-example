<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\PostController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth','role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('admin',[\App\Http\Controllers\Admin\indexController::class,'index'])->name('index');
    Route::resource('roles',\App\Http\Controllers\Admin\RoleController::class)->except('show');
    Route::post('/roles/{role}/permissions',[\App\Http\Controllers\Admin\RoleController::class,'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])
        ->name('roles.permissions.revoke');
    Route::resource('permissions',\App\Http\Controllers\Admin\PermissionController::class)->except('show');
    Route::post('/permissions/{permission}/roles',[\App\Http\Controllers\Admin\PermissionController::class,'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}',[\App\Http\Controllers\Admin\PermissionController::class,'removeRole'])->name('permissions.roles.remove');

});

Route::get("/posts/{post}",[\App\Http\Controllers\PostController::class,'destroy'])->name('posts.delete');


Route::post("/posts",[\App\Http\Controllers\PostController::class,'store'])->name('posts.store');

Route::put("/posts/{post}", [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
