<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::orderBy('created_at','desc')->paginate(10);
        return view('tags.index')->withTags($tags);
    }


    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required'
        ));
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
        Session::flash('success','The tag "'.$tag->name.'" created!');
        return redirect()->route('tags.index');
    }


    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->Posts()->detach();
        $tag->delete();
        Session::flash('success','The tag "'.$tag->name.'" deleted!');
        return redirect()->route('tags.index');
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tags.show')->withTag($tag);
    }
}
