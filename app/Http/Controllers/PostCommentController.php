<?php
namespace App\Http\Controllers;
use App\Models\Post;
# Correct Indentations
class PostCommentController extends Controller
{ 
    public function store(Post $post ){
        \request()->validate([
           'body'=>'required'
        ]);
$post->comments()->create([ # Correct indentations
    'user_id'=>\request()->user()->id,
   'body'=>\request('body')
]);
return back();
    }
}
