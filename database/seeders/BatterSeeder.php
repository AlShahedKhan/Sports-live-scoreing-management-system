<?php

namespace Database\Seeders;

use App\Models\Score;
use App\Models\Scoreupdate;
use Illuminate\Database\Seeder;

class BatterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Scoreupdate::create([
            'out_type'    => '*',
            'out_by_type' => '.',
            'one'         => 1,
            'two'         => 1,
            'three'       => 1,
            'four'        => 1,
            'six'         => 1,
            'balls_played'=> 1,
        ]);

        Scoreupdate::create([
            'out_type'    => 'b',
            'out_by_type' => '.',
            'one'         => 2,
            'two'         => 2,
            'three'       => 2,
            'four'        => 2,
            'six'         => 2,
            'balls_played'=> 2,
        ]);

        Scoreupdate::create([
            'out_type'    => 'b',
            'out_by_type' => 'c',
            'one'         => 3,
            'two'         => 3,
            'three'       => 3,
            'four'        => 3,
            'six'         => 3,
            'balls_played'=> 3,
        ]);
    }
}
