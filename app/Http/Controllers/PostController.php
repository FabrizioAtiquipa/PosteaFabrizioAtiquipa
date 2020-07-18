<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Datetime;
use Jenssegers\Mongodb\Eloquent\Model;
use Carbon\Carbon;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
 
    public function index(){
        $publicaciones = Post::paginate(10);
        return view('posts.index', compact('publicaciones'));
    }
    

    public function create(){
        return view('posts.create');
    }

    public function show($id){
        return view('posts.postUnico',['post' => Post::find($id)]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required:max:120',
            'image' => 'required|image|mimes:jpeg,png,jpg|:max2048',
            'content' => 'required:max:2200',
        ]);

        //$image = $request->file('image');
        $imageName = $request->file('image')->store('posts/'.Auth::id(),'public');
        $title = $request->get('title');
        $content = $request->get('content');

        $post = $request->user()->posts()->create([
            'title'=>$title,
            'image'=>$imageName,
            //'image'=>'storage/'.$imageName,
            'content'=>$content,
        ]);

        //$request->image->move(public_path('img'),$imageName);

        return redirect()->route('post',['id' => $post->id]);
    }

    public  function userPosts(){
        $user_id = Auth::id();
        $publicaciones = Post::where('user_id','=',$user_id)->get();
        return view('posts.myPosts',compact('publicaciones'));
    }

    public function delete(Request $request){
        $id = $request->get('id');
        $post = Post::find($id);
        $post->delete();
        
        $user_id = Auth::id();
        $publicaciones = Post::where('user_id','=',$user_id)->get();
        return view('posts.myPosts',compact('publicaciones'));
    }
}
