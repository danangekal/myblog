<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
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
        DB::table('users')->truncate();
        
        // reset table if use postgresql
        // DB::statement('TRUNCATE users');

        $faker  = Factory::create();

        // generate 2 users
        DB::table('users')->insert([
        	[
        		'name' 		=> "Danang Eko Alfianto",
        		'email' 	=> "danangekal@gmail.com",
        		'password'	=> bcrypt('d34oksip'),
                'slug'      => "danang-eko-alfianto",
                'bio'       => $faker->text(rand(250, 300)),
        	],
        	[
        		'name' 		=> "Dea",
        		'email' 	=> "dea@gmail.com",
        		'password'	=> bcrypt('123456'),
                'slug'      => "dea",
                'bio'       => $faker->text(rand(250, 300)),
        	]
        ]);

        // set foreign key 1 if use mysql
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
