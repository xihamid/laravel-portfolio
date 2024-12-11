<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;




// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('pages.homePage');
});


// Blog Routes
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index'); // List all blogs
Route::get('/blogs/{id}', [BlogController::class, 'show'])
->where('id', '[0-9]+') // Ensure it matches numeric IDs only
->name('blogs.show'); // Show specific blog
Route::get('/blogs/search', [BlogController::class, 'search'])->name('blogs.search'); // Search blogs


Route::middleware(['auth', CheckUsername::class])->group(function () {
    // Blog Routes
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create'); // Create blog form
    Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store'); // Store blog

    Route::post('/upload-image', [BlogController::class, 'uploadImage'])->name('blogs.uploadImage'); // TinyMCE image upload

    // New Routes for Editing and Deleting Blogs
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit'); // Edit blog form
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update'); // Update blog
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy'); // Delete blog

    // Category Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit'); // Edit category
    Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update'); // Update category
    Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy'); // Delete category
});






Auth::routes(['register' => false]);

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
