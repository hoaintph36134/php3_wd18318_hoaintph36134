<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SendMailController;
use App\Http\Middleware\AdminMiddleware;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [PostController::class, 'indexHome'])->name('homePage');
Route::get('/load-more-post', [PostController::class, 'load_more_post'])->name('load.more');
Route::get('/detailpost/{id}', [PostController::class, 'detailPost'])->name('post.detail');
Route::get('/category/{id}', [CategoryController::class, 'category'])->name('category');
Route::post('/search', [PostController::class, 'search_form'])->name('search-form');
Route::get('/search', [PostController::class, 'search_form'])->name('search-form');

// Route::get('/search', [PostController::class, 'search_form'])->name('search');




Route::get('/footer', function(){
    return view('user.footer');
});


Route::get('/header', function(){
    return view('user.header');
});

Route::get('tim-kiem', function(){
    return view('user.search');
});

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/create', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/edit/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});

// Login/ register

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'postRegister'])->name('postRegister');
