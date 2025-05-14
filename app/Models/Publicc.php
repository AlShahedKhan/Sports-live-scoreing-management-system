<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicc extends Model
{
    use HasFactory;
    public function matchh(){
        return $this->belongsTo(Score::class);
    }
}
