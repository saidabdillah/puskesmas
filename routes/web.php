<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;

Route::get('/', function () {
    $posts = Post::latest()->paginate(9);
    return view('welcome', compact('posts'));
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Controller admin
Route::prefix('dashboard')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    // Controller upload berita
    Route::name('berita.')->group(function () {
        Route::get('/berita', [PostController::class, 'index'])->name('index');
        Route::post('/berita', [PostController::class, 'store'])->name('store');
    });
});
