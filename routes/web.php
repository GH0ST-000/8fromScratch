<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;
use  App\Http\Controllers\RegisterController;
use  App\Http\Controllers\SessionController;
use  App\Http\Controllers\NewsletterController;

Route::post('newsletter/',NewsletterController::class );
Route::get('/',[PostController::class,'index'])->name('home');
Route::get('posts/{posts}',[PostController::class,'viewpost'])->name('post_slug');
Route::get('categories/{category:slug}',[PostController::class,'showallcategory'])->name("categories_slug");
Route::post('logout',[SessionController::class,'destroy'])->middleware('auth');
Route::post('posts/{post:slug}/comments',[PostCommentController::class,'store']);

Route::middleware('guest')->group(function() {
    Route::get('register',[RegisterController::class,'create']);
    Route::post('register',[RegisterController::class,'store'])->name('regiter');
    Route::get('/login',[SessionController::class,'create'])->name('login');
    Route::post('login',[SessionController::class,'store']);
});

Route::middleware('admin')->group(function (){
    Route::get('admin/posts',[AdminPostController::class,'index']);
    Route::get('admin/posts/create',[PostController::class,'create']);
    Route::post('admin/posts',[PostController::class,'store']);
    Route::get('admin/posts/1/edit',[AdminPostController::class,'edit']);
    Route::delete('admin/posts/6',[AdminPostController::class,'destroy']);
});



