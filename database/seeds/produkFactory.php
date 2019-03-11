<?php

use Illuminate\Database\Seeder;
use App\Produk;

class produkFactory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Produk::class, 50)->create()->each(function($p){
        //     $p->posts()->save(factory(App\Produk::class)->make());
        // });
        factory(Produk::class, 40)->create();
    }
}
