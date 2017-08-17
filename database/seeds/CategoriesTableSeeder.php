<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // set foreign key 0 if use mysql
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // reset table if use mysql
        DB::table('categories')->truncate();

        // reset table if use postgresql
        // DB::statement('TRUNCATE categories CASCADE');
    
        // generate data dummy
        DB::table('categories')->insert([
        	[
        		'title' 	=> "Uncategorized",
        		'slug' 		=> "uncategorized",
        	],
            [
                'title'     => "Tips and Tricks",
                'slug'      => "tips-and-tricks",
            ],
        	[
        		'title' 	=> "Build Apps",
        		'slug' 		=> "build-apps",
        	],
        	        	[
        		'title' 	=> "News",
        		'slug' 		=> "news",
        	],
        	        	[
        		'title' 	=> "Freebies",
        		'slug' 		=> "freebies",
        	],
        ]);

        // set foreign key 1 if use mysql
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
