<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\UserPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home')->name('home');



Route::resource('contact', ContactController::class)->only(['index','store']);

Route::resource('posts', PostController::class)->except('edit');

Route::resource('posts.comments', PostCommentController::class);

// Route::resource('comments', CommentController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource("user.posts",UserPostController::class)->only('index');

Route::get("popular/posts",[PostController::class,'popular'])->name("popular.posts");

Route::get("users/{user}/posts",[UserPostController::class,'posts'])->name("users.posts");
