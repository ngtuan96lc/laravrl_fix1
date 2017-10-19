<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Catagory;
use App\Tag;
use Session;
use Purifier;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at','desc')->paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagories = Catagory::all();
        $tags = Tag::all();
        return view('posts.create')->withCatagories($catagories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(array(
            'title' => 'required',
            'description' => 'required',
            'catagory' => 'required',
            'content' => 'required'
        ));
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->catagory_id = $request->catagory;
        $post->content = Purifier::clean($request->content);
        $post->thumb = 'default_thumb.jpg';
        if($request->hasFile('thumb')){
            $path = $request->thumb->store('public');
            $post->thumb = str_replace('public/', '', $path);
        }
        $post->slug = str_slug($request->title);
        $post->save();
        $post->Tags()->sync($request->tags, false);
        Session::flash('success', 'The post "'.$post->title.'" saved!');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(isset($post)){
            $catagories = Catagory::all();
            $tags = Tag::all();
            return view('posts.edit')->withPost($post)->withCatagories($catagories)->withTags($tags);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(array(
            'title' => 'required|max:191',
            'description' => 'required|max:500',
            'catagory' => 'required',
            'content' => 'required',
            'thumb' => 'image'
        ));
        $post = Post::find($id);
        if (isset($post)) {
            $post->title = $request->title;
            $post->description = $request->description;
            $post->catagory_id = $request->catagory;
            $post->content = Purifier::clean($request->content);
            if($request->hasFile('thumb')){
                $path = $request->thumb->store('public');
                Storage::delete('public/'.$post->thumb);
                $post->thumb = str_replace('public/', '', $path);
            }
            $post->slug = str_slug($request->title);
            $post->save();
            $post->Tags()->detach();
            $post->Tags()->sync($request->tags, false);
            Session::flash('success', 'The post "'.$post->title.'" updated!');
            return redirect()->route('posts.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(isset($post)){
            if($post->thumb != 'default_thumb.jpg')
                Storage::delete('public/'.$post->thumb);
            $post->Tags()->detach();
            $post->delete();
            Session::flash('success','The post "'.$post->title.'" deleted!');
            return redirect()->route('posts.index');
        }
    }
}
