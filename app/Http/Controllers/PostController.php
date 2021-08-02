<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public  function  index(){
        return view('posts.show',[
            'posts'=>$this->getPosts(),
            'categories'=>\App\Models\Category::all()
        ]);

    }
protected function getPosts(){
    $posts=null;
    if (\request('search')){

        $posts=Post::where('title','like','%'.\request('search').'%')
            ->orWhere('body','like','%'.\request('search').'%');
    }
    if ($posts===null){
        return Post::all();

    }else
        return $posts;



}


}
