<?php

use Illuminate\Database\Seeder;

class Post_factory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 50)->create()->each(function($p){
            $p->posts()->save(factory(App\Post::class)->make());
        });
    }
}
