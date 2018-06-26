<?php

use App\Level;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::insert(
        	[
        		['name' => 'JIS1','tag' => 'A'],
        		['name' => 'JIS1','tag' => 'B'],
        		['name' => 'JIS2','tag' => 'A'],
        		['name' => 'JIS2','tag' => 'B'],
        		['name' => 'JIS3','tag' => null],
        		['name' => 'SIS1','tag' => null],
        		['name' => 'SIS2','tag' => null],
        		['name' => 'SIS3','tag' => null]
        	]
        );
    }
}
