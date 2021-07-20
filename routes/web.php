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

Route::get('/', function () {

    return view('post',[
       'posts'=>\App\Models\Post::with('category')->get()
    ]);

});

Route::get('posts/{post:slug}', function ($post) {

    return view('blog', [
        'posts' =>App\Models\Post::find($post   )
    ]);
})->where('post','[A-z_\-]+');

Route::get('categories/{category:slug}',function (\App\Models\Category $category){

    return view('post',[
        'posts'=>$category->posts
    ]);
});

