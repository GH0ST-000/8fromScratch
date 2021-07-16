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

    $posts=[];
    $files= File::files(resource_path("post"));

    foreach ($files as $file){
      $document=  \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
        $posts[]=new \App\Models\Post(
          $document->title,
          $document->excerpt,
            $document->date,
            $document->body(),
           $document->slug
        );
    }
    return view('post',[
       'posts'=>$posts
    ]);

});

Route::get('posts/{post}', function ($slug) {

    return view('blog', [
        'posts' =>App\Models\Post::find($slug)
    ]);
})->where('post','[A-z_\-]+');

