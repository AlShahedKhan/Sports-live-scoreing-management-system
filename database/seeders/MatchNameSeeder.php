<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Matchh;
use Illuminate\Database\Seeder;

class MatchNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Matchh::create([
            'match_name' => 'বাংলাদেশ বনাম ভারত',
            'match_slug' => 'বাংলাদেশ বনাম ভারত',
            'match_datetime' => Carbon::create('2022', '07', '12'),
            'is_game_over' => '0'
        ]);
        Matchh::create([
            'match_name' => 'নিউজিল্যান্ড বনাম অস্ট্রেলিয়া',
            'match_slug' => 'নিউজিল্যান্ড বনাম অস্ট্রেলিয়া',
            'match_datetime' => Carbon::create('2022', '08', '03'),
            'is_game_over'=>'0'
        ]);
    }
}
