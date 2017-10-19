<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $table = 'catagories';

    function Posts(){
    	return $this->hasMany('App\Post');
    }
}
