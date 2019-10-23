<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use Auth;
use App\User;
use Storage;
class PostsController extends Controller
{
    public function index()
    {
      $posts = Post::all();
       return view('index', compact('posts'));
    }
    public function show(Post $post, request $request)
    {
       // dd('show');
        dd($request->file('file'));
					 $url=Storage::url('1.jpg'); 
                     //$url1=url('1.jpg'); 
					 return "<img src='".$url."'/>";
                              
      // dd($url1);  
    	//$post= Post::find($id);
        return view('posts.show', compact('post'));
    }
    public function create()
    {
    	
        return view("posts.create");
    }
	 public function store(request $request)
    {
        dd('store');
       
        $this->validate(request(), [
            'title' => 'required|min:2',
            'alias' => 'required',
            'intro' => 'required',
           'body' => 'required',

        ]);

        Post::create(
            request(array('title', 'alias', 'intro', 'body','image'))
        );

       
    }

	    public function edit(Post $post, request $request)
    {
        //dd('edit');
						$user= new User;
						
						 if($user = Auth::user()){
							return view("posts.edit", compact('post'));

						}else{
							return redirect('/'); 

							}

						if($request->hasFile('file')){
                            dd(000000000000000);
							  $uplfile=$request->file('file');
							  dd($request->file('file'));
							  $request->file->storeAs('public/new','1.jpg');  
							   
							 $url=Storage::url('1.jpg'); 
                             dd(000000000000000);
							 return "<img src='".$url."'/>";
							 }else{
								return 'No file selected';
								}



		 }
     public function update(Post $post)
    {//dd('update');
       // dd(request()->all());
        $this->validate(request(), [
            'title' => 'required|min:2',
            'alias' => 'required',
            'intro' => 'required',
            'body' => 'required',
        ]);
        $post->update(request(['title', 'alias', 'intro', 'body','image']));
        return redirect('/');
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect('/');
    }
}






