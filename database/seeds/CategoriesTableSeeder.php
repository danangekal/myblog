<?php

use Illuminate\Database\Seeder;

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
                'title'     => "Web Design",
                'slug'      => "web-design",
            ],
        	[
        		'title' 	=> "Web Programming",
        		'slug' 		=> "web-pogramming",
        	],
        	        	[
        		'title' 	=> "Internet",
        		'slug' 		=> "internet",
        	],
        	        	[
        		'title' 	=> "Social Marketting",
        		'slug' 		=> "social-marketing",
        	],
        	        	[
        		'title' 	=> "Photography",
        		'slug' 		=> "photography",
        	]
        ]);

        // set foreign key 1 if use mysql
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
