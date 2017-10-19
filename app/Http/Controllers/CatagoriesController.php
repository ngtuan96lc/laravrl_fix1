<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;
use Session;

class CatagoriesController extends Controller
{
    public function index()
    {
        $catagories = Catagory::orderBy('created_at','desc')->paginate(10);
        return view('catagories.index')->withCatagories($catagories);
    }


    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required'
        ));
        $catagory = new Catagory;
        $catagory->name = $request->name;
        //$catagory->slug = str_slug($request->name);
        $catagory->save();
        Session::flash('success','This catagory "'.$catagory->name.'" created!');
        return redirect()->route('catagories.index');
    }

    
    public function destroy($id)
    {
        $catagory = Catagory::find($id);
        if(isset($catagory)){
            $posts = $catagory->Posts;
            foreach ($posts as $post) {
                $post->catagory_id = NULL;
                $post->save();
            }
            $catagory->delete();
            Session::flash('success','This catagory "'.$catagory->name.'" deleted!');
        }
        return redirect()->route('catagories.index');
    }

    public function show($id)
    {
        $catagory = Catagory::find($id);
        if(isset($catagory))
            return view('catagories.show')->withCatagory($catagory);
    }
}
