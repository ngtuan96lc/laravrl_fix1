<?php

use Illuminate\Database\Seeder;

class CatagoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catagories')->insert(array(
        	['name' => 'PHP'],
        	['name' => 'JAVA'],
        	['name' => 'C#']
        ));
    }
}
