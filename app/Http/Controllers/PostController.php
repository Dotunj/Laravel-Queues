<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

public function index()
{
	return view('index');
}    

public function store(Request $request)
{
	$request->validate([
       'title'=>'required|min:6',
       'body'=> 'required|min:6',
	]);
 
 $post = new Post;

 $post->title = $request->title;
 $post->body = $request->body;

 $post->save();

 return redirect()->back()->with('status', 'Your post has been published successfully');




}

}
