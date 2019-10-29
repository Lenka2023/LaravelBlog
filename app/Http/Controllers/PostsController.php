<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use Auth;
use App\User;
use Storage;
use Html;
use App\Category;
class PostsController extends Controller
{
    public function index()
    {
      $posts = Post::orderBy('id', 'desc')->take(3)->get();
       return view('index', compact('posts'));
    }
    public function show(Post $post)
    {//$file=$request->file('file');
       $url=Storage::url('1.jpg'); 

                    // dd($url);  
                     
                   echo "<img src='".$url."'/>";
        return view('posts.show', compact('post'));
    }
    public function create()
    {
    	$post=Post::all();
      $cat=Category::all();
        return view("posts.create", ['post'=>$post, 'cat'=>$cat]);
    }
	 public function store( request $request)
    {
        
       
      
  
        $this->validate(request(), [
           'title' => 'required|min:2',
            'alias' => 'required',
            'intro' => 'required',
            'body' => 'required',
            'category_id' => 'required',
           

        ]);

        Post::create(
            request(array( 'title', 'alias', 'intro', 'body', 'category_id', 'image'))
        );

     return redirect('/');  
    }

	    public function edit(Post $post, request $request)
    {
$post->title=$request->input('title');
$post->alias=$request->input('alias');
$post->intro=$request->input('intro');
$post->body=$request->input('body');
$post->category_id=$request->input('category_id');

       // dd('edit');
						$user= new User;
            //$post=Post::find($id);
            $cat=Category::all();
						
						 if($user = Auth::user()){

							return view("posts.edit", ['post'=>$post, 'cat'=>$cat]);
                            
						}else{
							return redirect('/'); 

							}

						
							 


}
		 
     public function update(Post $post, request $request)

    {
         if($request->hasFile('file')){
                            
                              $file=$request->file('file');
                              //putFile('1', $request->file('file'));
                             // dd($request->file('file'));
                             // $folder='1';
                              $request->file->storeAs('','1.jpg'); 
                              $url=Storage::url('1.jpg'); 

                              
                             }else{
                                return 'No file selected';
                                }
     
       $path=url($file);
($path);
    //dd('update');
        //dd(request()->all());
        $this->validate(request(), [
            'title' => 'required|min:2',
            'alias' => 'required',
            'intro' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        $post->update(request(['title', 'alias', 'intro', 'body', 'category_id', 'image']));
        return redirect('/');
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect('/');
    }
}






