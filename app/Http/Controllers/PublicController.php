<?php

namespace App\Http\Controllers;

use App\Models\Curve;
use App\Models\Matchh;
use App\Models\Score;
use App\Models\Scorebattersecond;
use App\Models\Scorebowlerfirst;
use App\Models\Scorebowlersecond;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function view()
    {
        $data = Score::all();
        $match = Matchh::orderby('match_datetime', 'ASC')->where('is_game_over', 0)->get();
        $match1 = Matchh::orderby('match_datetime', 'DESC')->where('is_game_over', 1)->get();
        $match2 = Matchh::orderby('match_datetime', 'DESC')->where('is_game_over', 2)->get();
        $EN = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        $BN = ["০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯"];
        return view('public.index', compact('data', 'match', 'match1', 'match2','EN','BN'));
    }

    public function getGraph(Request $request)
    {
        $data['team1'] = [];
        $data['team2'] = [];
        $curves = Curve::where('match_id', $request->match_id)->groupby('team_id')->get();
        if (count($curves) != 0) {
            $team1 = Curve::select('runs')
                ->where('match_id', $request->match_id)
                ->where('team_id', $curves[0]->team_id)
                ->get();
            $team2 = Curve::select('runs')
                ->where('match_id', $request->match_id)
                ->where('team_id', $curves[1]->team_id)
                ->get();

            foreach ($team1 as $value) {
                $data['team1'][] = $value->runs;
            }
            foreach ($team2 as $value) {
                $data['team2'][] = $value->runs;
            }
        }
        $data['curves'] =  $curves;

        // return $data;
        return response()->json([
            'html' => view('public.inc._scoreGraph')->with($data)->render(),
        ]);
    }

    public function getStates(Request $request)
    {
        $data['data'] = Score::where('match_id', $request->match_id)->get();
        $data['databowlerfirst'] = Scorebowlerfirst::where('match_id', $request->match_id)->get();
        $data['databattersecond'] = Scorebattersecond::where('match_id', $request->match_id)->get();
        $data['databowlersecond'] = Scorebowlersecond::where('match_id', $request->match_id)->get();
        $data['curves'] = Curve::where('match_id', $request->match_id)->groupby('team_id')->get();
        $data['matchData'] = DB::table('scores')
            ->join('players', 'scores.player_id', '=', 'players.id')
            ->join('teams', 'scores.team_id', '=', 'teams.id')
            ->join('matchhs', 'scores.match_id', '=', 'matchhs.id')
            ->join('scoreupdates', function ($join) {
                $join->on('scores.one_id', '=', 'scoreupdates.id')
                    ->orOn('scores.two_id', '=', 'scoreupdates.id')
                    ->orOn('scores.three_id', '=', 'scoreupdates.id');
            })
            ->where('scores.match_id', $request->match_id)
            ->select(
                'scores.*',
                'players.player_name',
                'teams.team_name',
                'matchhs.match_name',
                'scoreupdates.one',
                'scoreupdates.two',
                'scoreupdates.three'
            )
            ->get();
        // return $data;
        if (count($data['matchData']) > 0) {
            // return response()->json($matchData);
            return response()->json([
                'html' => view('public.inc._scoreTable')->with($data)->render(),
            ]);
        }
    }
}
