<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
public  function addComents(){

}
public  function  create(){


        return view('posts.create');
}
    public  function  store(){
     $attributes=  \request()->validate([
          'title'=>'required',
          'slug'=>['required',Rule::unique('posts','slug')],
          'excerpt'=> 'required',
           'body'=>'required',
           'category_id'=>['required',Rule::exists('categories','id')]
       ]);
     $attributes['user_id']=auth()->id();
     Post::create($attributes);
     return redirect('/');
    }


}
