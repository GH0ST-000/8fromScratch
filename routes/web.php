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

 Route::get('register',[\App\Http\Controllers\RegisterController::class,'create']);
Route::post('register',[\App\Http\Controllers\RegisterController::class,'store']);





