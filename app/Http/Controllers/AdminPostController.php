<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request; # remove unused import

class AdminPostController extends Controller
{
   public function index(){
       return view('admin.posts.index',[
           'posts'=>Post::all()
       ]);
   }
# remove unnecessary line

   public  function edit(Post $post){
       return view('admin.posts.edit',['post'=>$post]);
   }

   # remove additional space into function names
   public  function  destroy(Post $post){
       $post->delete();
       return back()->with('success','Post Deleted');
   }
# remove unnessesary line.
}
