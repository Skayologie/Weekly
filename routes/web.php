<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home',["posts"=>Post::all(),"categories"=>Category::all()]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');







Route::middleware('auth')->group(function () {


    Route::get('/categories', [CategoryController::class , "create"]);
    Route::post('/category', [CategoryController::class , "store"]);
    Route::get('/category/{id}/archive', [CategoryController::class , "archive"]);
    Route::get('/category/{id}/restore', [CategoryController::class , "restore"]);
    Route::post('/comment/create', [CommentController::class , "store"]);

    Route::post('/posts', [PostController::class , "store"]);
    Route::get('/posts', [PostController::class , "create"]);
    Route::get('/posts/{route}', [PostController::class , "create"]);
    Route::get('/posts/{id}/archive', [PostController::class , "archive"]);
    Route::get('/posts/{id}/restore', [PostController::class , "restore"]);
    Route::delete('/posts/{id}/delete', [PostController::class , "destroy"])->name('comments.destroy');;
    Route::get('/post/{slug}', [PostController::class , "show"]);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';
