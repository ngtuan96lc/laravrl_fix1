<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    function getIndex(){
    	$posts = Post::orderBy('updated_at','desc')->paginate(5);
    	return view('index')->withPosts($posts);
    }

    function getSingle($slug){
    	$post = Post::where('slug',$slug)->first();
    	if(isset($post))
    		return view('single')->withPost($post);
    	else
    		return redirect()->route('index');
    }

    function getAdmin(){
        return redirect()->route('posts.index');
    }
}
