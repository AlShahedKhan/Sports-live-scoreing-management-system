<?php

namespace App\Http\Controllers;

use App\Models\Matchh;
use App\Models\Score;
use Illuminate\Http\Request;

class KhelapagolController extends Controller
{
    public function index()
    {
        return view('khelapahol.index');
    }
}
