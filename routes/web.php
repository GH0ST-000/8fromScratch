<?php

use  App\modes\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;





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
Route::post('newsletter/',\App\Http\Controllers\NewsletterController::class );
Route::get('/',[\App\Http\Controllers\PostController::class,'index'])->name('home');


 Route::get('posts/{posts}',function (\App\Models\Post  $posts){

//     $post=\App\Models\Post::findorFail($id);
     return view('posts.index',[
         'posts'=>$posts
     ]);



 });

 Route::get('categories/{category:slug}',function (\App\Models\Category $category){
     return view('posts.show',[
         'posts'=>$category->posts,
         'currentCategory'=>$category,
         'categories'=>\App\Models\Category::all()
     ]);
 });

 Route::get('register',[\App\Http\Controllers\RegisterController::class,'create'])->middleware('guest');
Route::post('register',[\App\Http\Controllers\RegisterController::class,'store'])->middleware('guest');
Route::post('logout',[\App\Http\Controllers\SessionController::class,'destroy'])->middleware('auth');
Route::get('/login',[\App\Http\Controllers\SessionController::class,'create'])->middleware('guest');

Route::post('login',[\App\Http\Controllers\SessionController::class,'store'])->middleware('guest');
Route::post('posts/{post:slug}/comments',[\App\Http\Controllers\PostCommentController::class,'store']);

Route::get('admin/posts',[\App\Http\Controllers\AdminPostController::class,'index'])->middleware('admin');
Route::get('admin/posts/create',[\App\Http\Controllers\PostController::class,'create'])->middleware('admin');

Route::post('admin/posts',[\App\Http\Controllers\PostController::class,'store'])->middleware('admin');
Route::get('admin/posts/1/edit',[\App\Http\Controllers\AdminPostController::class,'edit'])->middleware('admin');
Route::delete('admin/posts/6',[\App\Http\Controllers\AdminPostController::class,'destroy'])->middleware('admin');
