<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(array(
        	['title' => 'The firs post 1','description' => 'hello world', 'content' => 'this is content','thumb' => 'images/pic02.jpg',
        		'catagory_id' => 1, 'slug' => str_slug('The firs post 1')
        	],
        	['title' => 'The firs post 2', 'description' => 'hello world', 'content' => 'this is content','thumb' => 'images/pic03.jpg',
        		'catagory_id' => 1, 'slug' => str_slug('The firs post 2')
        	],
        	['title' => 'The firs post 3', 'description' => 'hello world', 'content' => 'this is content','thumb' => 'images/pic04.jpg',
        		'catagory_id' => 1, 'slug' => str_slug('The firs post 3')
        	],
        	['title' => 'The firs post 4', 'description' => 'hello world', 'content' => 'this is content','thumb' => 'images/pic05.jpg',
        		'catagory_id' => 1, 'slug' => str_slug('The firs post 4')
        	]
        ));
    }
}
