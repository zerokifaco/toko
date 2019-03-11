<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Produk::class, function (Faker\Generator $faker) {
    //static $password;

    return [
        // 'name' => $faker->name,
        // 'email' => $faker->unique()->safeEmail,
        // 'password' => $password ?: $password = bcrypt('secret'),
        // 'remember_token' => str_random(10),

        'id_kategori' => rand(1, 5),
        'kode_produk' => rand(1, 1000000),
        'nama_produk' => str_random(10),
        'merk' => str_random(10),
        'harga_beli' => rand(1, 300).'000',
        'diskon' => rand(1, 10),
        'harga_jual' => rand(1, 300).'000',
        'stok' => rand(1, 300)

        // 'first_name' => str_random(5),
        // 'last_name' => str_random(5),
        // 'email' => $faker->unique()->safeEmail,
        // 'gender' => rand(1, 2),
        // 'country' => str_random(10),
        // 'salary' => rand(1, 300).'000'
    ];
});
