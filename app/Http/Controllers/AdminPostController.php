<?php # insert new line below
namespace App\Http\Controllers; # insert newline below
use App\Models\Post;

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

   public function destroy(Post $post){
       $post->delete();
       return back()->with('success','Post Deleted');
   }
   # remove blank line here
}
