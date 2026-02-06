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
    return view('home', compact('posts'));
})->name('home');

Route::get('/post/{post:slug}', function (Post $post, Request $request) {
    return view('post', compact('post'));
})->name('posts.index');

Route::get('/posts', function () {
    $posts = Post::latest()->paginate(9);
    return view('posts', compact('posts'));
})->name('posts.show');

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Controller admin
Route::prefix('dashboard')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    // Controller upload berita
    Route::name('post.')->group(function () {
        Route::get('/post', [PostController::class, 'index'])->name('index');
        Route::get('/post/create', [PostController::class, 'create'])->name('create');
        Route::post('/post', [PostController::class, 'store'])->name('store');
        Route::get('/post/{post:slug}/edit', [PostController::class, 'edit'])->name('edit');
        Route::put('/post/{post:slug}/update', [PostController::class, 'update'])->name('update');
    });
});
