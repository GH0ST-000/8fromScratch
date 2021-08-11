<?php

use  App\modes\Post; # Remove unused imports
use Illuminate\Support\Facades\File; # Remove unused imports
use Illuminate\Support\Facades\Route;
# Remove Blank lines




# Import Classes, don't use fullnames
# Good: NewsletterController::class
# bad: \App\Http\Controllers\NewsletterController::class

# Have one standard, give every route name or give non of them
Route::post('newsletter/',\App\Http\Controllers\NewsletterController::class );
Route::get('/',[\App\Http\Controllers\PostController::class,'index'])->name('home');

# Extract logic into its own controller
 Route::get('posts/{posts}',function (\App\Models\Post  $posts){
# Remove Commented Code
//     $post=\App\Models\Post::findorFail($id);
     return view('posts.index',[
         'posts'=>$posts
     ]);
# Remove unnecessary blank lines


 });

 Route::get('categories/{category:slug}',function (\App\Models\Category $category){
     return view('posts.show',[
         # insert spaces around array arrows
         'posts'=>$category->posts,
         'currentCategory'=>$category,
         'categories'=>\App\Models\Category::all()
     ]);
 });

 /**
 * 
 * Route::middleware('guest')->group(function() {
 *   Route::get('register',[RegisterController::class,'create']);
 *   Route::post('register',[RegisterController::class,'store']);
 *   Route::get('/login',[SessionController::class,'create']);
 *   Route::post('login',[SessionController::class,'store']);
 *});
 */

 # Set route groups for routes
 Route::get('register',[\App\Http\Controllers\RegisterController::class,'create'])->middleware('guest');
Route::post('register',[\App\Http\Controllers\RegisterController::class,'store'])->middleware('guest');
Route::post('logout',[\App\Http\Controllers\SessionController::class,'destroy'])->middleware('auth');
Route::get('/login',[\App\Http\Controllers\SessionController::class,'create'])->middleware('guest');

Route::post('login',[\App\Http\Controllers\SessionController::class,'store'])->middleware('guest');
Route::post('posts/{post:slug}/comments',[\App\Http\Controllers\PostCommentController::class,'store']);

/**
 * Have nicer look.
 * 
 * Route::prefix('admin')->middleware('admin')->group(function() {
 *      Route::get('posts',[AdminPostController::class,'index']);
 *      Route::get('posts/create',[PostController::class,'create']);
 *      Route::post('posts',[PostController::class,'store']);
 *      Route::get('posts/1/edit',[AdminPostController::class,'edit']);
 *      Route::delete('posts/6',[AdminPostController::class,'destroy']);    
 * });
 */
Route::get('admin/posts',[\App\Http\Controllers\AdminPostController::class,'index'])->middleware('admin');
Route::get('admin/posts/create',[\App\Http\Controllers\PostController::class,'create'])->middleware('admin');

Route::post('admin/posts',[\App\Http\Controllers\PostController::class,'store'])->middleware('admin');
Route::get('admin/posts/1/edit',[\App\Http\Controllers\AdminPostController::class,'edit'])->middleware('admin');
Route::delete('admin/posts/6',[\App\Http\Controllers\AdminPostController::class,'destroy'])->middleware('admin');
