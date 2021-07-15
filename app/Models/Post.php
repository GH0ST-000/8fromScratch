<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\File;

class Post
{
public  static  function find($slug){
    if (!file_exists($path=resource_path("post/{$slug}.html"))){
throw  new ModelNotFoundException();
    }

////   $post= cache()->remember("posts.{$slug}",now()->addMinute(20),function() use ($path){
////return file_get_contents($path);
//    });

    return cache()->remember("posts.{$slug}",1200,fn()=>file_get_contents($path));
}
public  static  function all(){
    $files= File::files(resource_path("post/"));
  return   array_map(function ($file){
          return $file->getContents();
    },$files);

}



}
