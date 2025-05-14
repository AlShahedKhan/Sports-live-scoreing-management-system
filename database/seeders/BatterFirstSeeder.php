<?php

namespace Database\Seeders;

use App\Models\Score;
use Illuminate\Database\Seeder;

class BatterFirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Score::create([
            'match_id'          => 1,
            'team_id'           => 1,
            'player_id'         => 1,
            'scoreupdate_id'    => 1,
            'outby_id'          => 1,
            'one_id'            => 1,
            'two_id'            => 1,
            'three_id'          => 1,
            'four_id'           => 1,
            'six_id'            => 1,
            'balls_played_id'   => 1
        ]);
    }
}
