<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use Auth;
use App\User;
use Storage;
use Html;
//use App\Http\Controllers\HTML;
class PostsController extends Controller
{
    public function index()
    {
      $posts = Post::all();
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
    	
        return view("posts.create");
    }
	 public function store( request $request)
    {
        
       
       $title = $request->input('title');
       //dd($title);
       HTML::entities($title);
      // $title=htmlentities($title);
       $alias = $request->input('alias');
       HTML::entities($alias);
      // $alias=htmlentities($alias);
       $intro = $request->input('intro');
       HTML::entities($intro);
      // $intro=htmlentities($intro);
       $body = $request->input('body');
       HTML::entities($body);
      // $body=htmlentities($body);
       //dd($title);
        //$title=htmlentities($title);
      
       /*foreach( $all as $item ) {
       $item = htmlentities( $item );
       dd($item);*/
  
        $this->validate(request(), [
           HTML::entities('title') => 'required|min:2',
            'alias' => 'required',
            'intro' => 'required',
           'body' => 'required',

        ]);
$request=request(array('title', 'alias', 'intro', 'body','image'));
        Post::create(
            request(array( HTML::entities('title'), 'alias', 'intro', 'body','image'))
        );

     return redirect('/');  
    }

	    public function edit(Post $post)
    {

       // dd('edit');
						$user= new User;
						
						 if($user = Auth::user()){
							return view("posts.edit", compact('post'));
                            
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
        ]);
        $post->update(request(['title', 'alias', 'intro', 'body','image']));
        return redirect('/');
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect('/');
    }
}






