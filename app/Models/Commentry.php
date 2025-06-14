<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Matchh;
use App\Models\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentry extends Model
{
    use HasFactory;

    use HasFactory;
protected $fillable = ['team_id','match_id','player_id','player2_id','to_id','details_id'];

    public function team(){
        return $this->belongsTo(Team::class,'team_id');
    }
    public function matchh(){
        return $this->belongsTo(Matchh::class,'match_id');
    }
    public function player(){
        return $this->belongsTo(Player::class,'player_id');
    }
    public function player2(){
        return $this->belongsTo(Player::class,'player2_id');
    }

    public function CommentryCreateTo(){
        return $this->belongsTo(CommentryCreate::class,'to_id');
    }

    public function CommentryCreateDetails(){
        return $this->belongsTo(CommentryCreate::class,'details_id');
    }

}
