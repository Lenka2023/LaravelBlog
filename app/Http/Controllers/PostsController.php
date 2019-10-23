<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use Auth;
use App\User;
class PostsController extends Controller
{
    public function index()
    {
      $posts = Post::all();
       return view('index', compact('posts'));
    }
    public function show(Post $post)
    {
    	//$post= Post::find($id);
        return view('posts.show', compact('post'));
    }
    public function create()
    {
    	
        return view("posts.create");
    }
	 public function store()
    {
        $this->validate(request(), [
            'title' => 'required|min:2',
            'alias' => 'required',
            'intro' => 'required',
           

        ]);

        Post::create(
            request(array('title', 'alias', 'intro', 'body'))
        );

        return redirect('/');
    }

	    public function edit(Post $post)
    {
        
    $user= new User;
        
         if($user = Auth::user()){
            
        return view("posts.edit", compact('post'));

    }else{
     return redirect('/'); 

    }
    }
     public function update(Post $post)
    {
       // dd(request()->all());
        $this->validate(request(), [
            'title' => 'required|min:2',
            'alias' => 'required',
            'intro' => 'required',
            'body' => 'required',
        ]);
        $post->update(request(['title', 'alias', 'intro', 'body']));
        return redirect('/');
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect('/');
    }
}






