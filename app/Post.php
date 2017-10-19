<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    function Catagory(){
    	return $this->belongsTo('App\Catagory');
    }

    function Tags(){
    	return $this->belongsToMany('App\Tag');
    }
}
