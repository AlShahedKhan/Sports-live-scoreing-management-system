<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scorebattersecond extends Model
{
    use HasFactory;
    protected $fillable = ['team_id','match_id','player_id','scoreupdate_id','outby_id','out_type',
                            'one_id','two_id','three_id','four_id','six_id'];

    public function team(){
        return $this->belongsTo(Team::class,'team_id');
    }
    public function matchh(){
        return $this->belongsTo(Matchh::class,'match_id');
    }
    public function player(){
        return $this->belongsTo(Player::class,'player_id');
    }

    public function scoreupdate(){
        return $this->belongsTo(Scoreupdate::class,'scoreupdate_id');
    }
    public function scoreupdateoutbytype(){
        return $this->belongsTo(Scoreupdate::class,'outby_id');
    }
    public function scoreupdateone(){
        return $this->belongsTo(Scoreupdate::class,'one_id');
    }
    public function scoreupdatetwo(){
        return $this->belongsTo(Scoreupdate::class,'two_id');
    }
    public function scoreupdatethree(){
        return $this->belongsTo(Scoreupdate::class,'three_id');
    }
    public function scoreupdatefour(){
        return $this->belongsTo(Scoreupdate::class,'four_id');
    }
    public function scoreupdatesix(){
        return $this->belongsTo(Scoreupdate::class,'six_id');
    }
    public function scoreupdateballsplayed(){
        return $this->belongsTo(Scoreupdate::class,'balls_played_id');
    }
}
