<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curve extends Model
{
    use HasFactory;
    protected $fillable = ['team_id','match_id','runs'];

    public function team(){
        return $this->belongsTo(Team::class,'team_id');
    }
    public function matchh(){
        return $this->belongsTo(Matchh::class,'match_id');
    }
    // public function player(){
    //     return $this->belongsTo(Player::class,'player_id');
    // }
}
