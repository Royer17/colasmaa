<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// DB::table('users')->insert([
		// 	'name' => 'admin',
		// 	'email'=> 'admin',
		// 	'password' => bcrypt('admin'),
        // ]);
        
        DB::table('users')->insert([
            'name' => 'imagen',
            'email'=> 'imagen',
            'password' => bcrypt('imagen'),

        ]);
    }
}
