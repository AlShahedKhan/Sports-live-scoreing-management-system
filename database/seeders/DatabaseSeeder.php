<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MatchNameSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            MatchNameSeeder::class,
            TeamSeeder::class,
            BowlerSeeder::class,
            BatterSeeder::class,
            CommentryCreateSeeder::class,
            PlayerSeeder::class,
            BatterSeeder::class
        ]);
    }
}
