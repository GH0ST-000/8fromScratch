<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public  function  index(){
        return view('posts',[
            'posts'=>$this->getPosts(),
            'categories'=>\App\Models\Category::all()
        ]);

    }
protected function getPosts(){
    $posts=Post::all();
    if (\request('search')){
        $posts
            ->where('title','like','%'.\request('search').'%')
            ->orWhere('body','like','%'.\request('search').'%');
    }

}


}
