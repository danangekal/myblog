<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset table if use mysql
        DB::table('posts')->truncate();
        
        // reset table if use postgresql
        // DB::statement('TRUNCATE posts');
        
        // generate 36 data dummy
        $posts 	= [];
        $faker 	= Factory::create();
        $date   = Carbon::now()->modify('-1 year');
        $image 	= "Post_Image_" . rand(1, 5). ".jpg";

        for ($i=1; $i <=36 ; $i++) { 
	        $date->addDays(10); 
            $publishedDate = clone($date);
            $createdDate   = clone($date); 

        	$posts[] = [
        		'author_id' => rand(1, 2),
        		'title' 	=> $faker->sentence(rand(8, 12)),
        		'excerpt' 	=> $faker->text(rand(250, 300)),
        		'body' 		=> $faker->paragraphs(rand(10, 15), true),
        		'slug' 		=> $faker->slug(),
        		'image' 	    => rand(0,1) == 1 ? $image : NULL,
        		'created_at'    => $createdDate,
        		'updated_at'    => $createdDate,
                'published_at'  =>  $i < 30 ? $publishedDate : ( rand(0, 1) == 0 ? NULL : $publishedDate->addDays(4) ),
                'category_id'   => rand(1, 5),
                'view_count'    => rand(1, 10) * 10,
        	]; 
        }

        DB::table('posts')->insert($posts);
    }
}
