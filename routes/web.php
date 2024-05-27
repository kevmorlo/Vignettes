<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return View('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');

Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');

Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');

Route::get('/user/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');

Route::put('/user/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::delete('/user/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');



Route::get('/thumbnail', function () {
    return Inertia::render('Thumbnail/Index', [
        'thumbnails' => App\Models\Thumbnail::all(),
    ]);
})->name('thumbnail.index');

Route::get('/thumbnail/{thumbnail}', function (App\Models\Thumbnail $thumbnail) {
    return Inertia::render('Thumbnail/Show', [
        'thumbnail' => $thumbnail->load('category', 'size', 'user'),
    ]);
})->name('thumbnail.show');



Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');

require __DIR__.'/auth.php';
