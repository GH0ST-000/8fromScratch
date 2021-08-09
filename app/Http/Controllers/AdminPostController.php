<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
   public function index(){
       return view('admin.posts.index',[
           'posts'=>Post::all()
       ]);
   }


   public  function edit(Post $post){
       return view('admin.posts.edit',['post'=>$post]);
   }

   public  function  destroy(Post $post){
       $post->delete();
       return back()->with('success','Post Deleted');
   }

}
