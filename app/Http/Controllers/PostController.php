<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){
        return view('posts.show',[
            'posts'=>$this->getPosts(),
            'categories'=>Category::all()
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
    public function create(){
        $categories=Category::all();
    return view('posts.create',[
        "categories"=>$categories
    ]);
}
    public function store(){
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
    public function viewpost(Post $posts){
        return view('posts.index',[
            'posts'=>$posts
        ]);
    }
    public function showallcategory(Category $category){
        return view('posts.show',[
            'posts'=>$category->posts,
            'currentCategory'=>$category,
            'categories'=>\App\Models\Category::all()
        ]);
    }
}
