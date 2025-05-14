<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchh extends Model
{
    use HasFactory;
    protected $fillable = [
        'match_name',
        'match_slug',
        'match_datetime',
        'is_game_over',

    ];
    public $timestamps = true;
}
