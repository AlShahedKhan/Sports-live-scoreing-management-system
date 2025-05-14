<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scorebowlersecond extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_id', 'match_id', 'player_id', 'overs_id', 'maidens_id', 'runs_id', 'wickets_id',
        'no_balls_id', 'wides_id', 'panalty_runs_id'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
    public function matchh()
    {
        return $this->belongsTo(Matchh::class, 'match_id');
    }
    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
    public function updatebowlerovers()
    {
        return $this->belongsTo(Updatebowler::class, 'overs_id');
    }
    public function updatebowlermaidens()
    {
        return $this->belongsTo(Updatebowler::class, 'maidens_id');
    }
    public function updatebowlerruns()
    {
        return $this->belongsTo(Updatebowler::class, 'runs_id');
    }
    public function updatebowlerwickets()
    {
        return $this->belongsTo(Updatebowler::class, 'wickets_id');
    }
    public function updatebowlernoballs()
    {
        return $this->belongsTo(Updatebowler::class, 'no_balls_id');
    }
    public function updatebowlerwides()
    {
        return $this->belongsTo(Updatebowler::class, 'wides_id');
    }
    public function updatebowlerpanaltyruns()
    {
        return $this->belongsTo(Updatebowler::class, 'panalty_runs_id');
    }
}
