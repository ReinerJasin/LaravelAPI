<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(10)->create();
        Model::unguard(); //untuk membuka larangan me run seeder dari default setting laravel

        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
        ]);

        Model::reguard();
    }
}