<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset table if use mysql
        DB::table('tags')->truncate();

        $php = new Tag();
        $php->name = 'PHP';
        $php->slug = 'php';
        $php->save();

        $laravel = new Tag();
        $laravel->name = 'Laravel';
        $laravel->slug = 'laravel';
        $laravel->save();

        $codeigniter = new Tag();
        $codeigniter->name = 'Codeigniter';
        $codeigniter->slug = 'codeigniter';
        $codeigniter->save();

        $yii = new Tag();
        $yii->name = 'Yii';
        $yii->slug = 'yii';
        $yii->save();

        $vue = new Tag();
        $vue->name = 'Vue Js';
        $vue->slug = 'vuejs';
        $vue->save();

        $tags = [
            $php->id,
            $laravel->id,
            $codeigniter->id,
            $yii->id,
            $vue->id,
        ];

        foreach (Post::all() as $post)
        {
            shuffle($tags);
            
            for ($i=0; $i<rand(0, count($tags)-1); $i++) 
            {
                $post->tags()->detach($tags[$i]);
                $post->tags()->attach($tags[$i]);
            }
        }
    }
}
