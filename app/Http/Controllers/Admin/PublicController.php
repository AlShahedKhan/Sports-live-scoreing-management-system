<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matchh;
use App\Models\Score;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{

    // public function view()
    // {
    //     $data = Score::all();
    //     $match = DB::table('matchhs')
    //         ->get();

    //     return view('public.index', compact('match','data'));
    // }

    // public function getStates(Request $request)
    // {
    //     $matchData = DB::table('scores')
    //     ->join('players', 'scores.player_id', '=', 'players.id')
    //     ->join('teams','scores.team_id','=','teams.id')
    //     ->join('matchhs','scores.match_id','=','matchhs.id')
    //     ->where('scores.match_id', $request->match_id)
    //     ->select('scores.*', 'players.player_name','teams.team_name','matchhs.match_name')
    //     ->get();

    //   if (count($matchData) > 0) {
    //       return response()->json($matchData);
    //   }
    // }
}
