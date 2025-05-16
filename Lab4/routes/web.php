<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/test', function () {
    return view('test');
});
Route::resource('posts', PostController::class)->except(['show']);
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.view');
Route::get('posts/restore/{id}', [PostController::class, 'restore'])->name('posts.restore');
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
