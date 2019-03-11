<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
        	[
        		'name' => 'Riki krismawan',
        		'email' => 'krismawan4@gmail.com',
        		'password' => bcrypt('passadmin'),
        		'foto' => 'user.png',
        		'level' => 1
        	],
        	[
        		'name' => 'Anisa',
        		'email' => 'anisa@gmail.com',
        		'password' => bcrypt('passuser'),
        		'foto' => 'user.png',
        		'level' => 2
        	]
        ));
    }
}
