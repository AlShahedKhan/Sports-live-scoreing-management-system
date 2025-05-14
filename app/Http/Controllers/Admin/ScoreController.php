<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matchh;
use App\Models\Player;
use App\Models\Score;
use App\Models\Scorebowlerfirst;
use App\Models\Scoreupdate;
use App\Models\Team;
use App\Models\Updatebowler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ScoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['score_short'] = Score::select(
                'id', 'team_id', 'match_id',
                DB::raw("sum(one_id) as total_one"),
                DB::raw("sum(two_id) as total_two"),
                DB::raw("sum(three_id) as total_three"),
                DB::raw("sum(four_id) as total_four"),
                DB::raw("sum(six_id) as total_six")
            )
            ->groupBy('team_id')
            ->get();
        $data['score'] = Score::all();
        $data['team'] = Team::all();
        $data['match'] = Matchh::all();
        $data['player'] = Player::all();
        $data['scoreupdate'] = Scoreupdate::all();
        $data['updatebowler'] = Updatebowler::all();
        // return $data;
        return view('admin.manage.score.index')->with($data);
    }

    // store methode
    public function store(Request $request)
    {
        // eluquent ORM
        Score::insert([
            'match_id' => $request->match_id,
            'team_id' => $request->team_id,
            'player_id' => $request->player_id,
            'scoreupdate_id' => $request->scoreupdate_id,
            'outby_id' => $request->outby_id,
            'one_id' => $request->one_id,
            'two_id' => $request->two_id,
            'three_id' => $request->three_id,
            'four_id' => $request->four_id,
            'six_id' => $request->six_id,
            'balls_played_id' => $request->balls_played_id,
        ]);
        $notification = array('message' => 'Scoreupdate Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $score = Score::find($id);
        $score->delete();
        $notification = array('message' => 'Score Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = Score::find($id);
        $match = DB::table('matchhs')->get();
        $team = DB::table('teams')->get();
        $player = DB::table('players')->get();
        $scoreupdate = DB::table('scoreupdates')->get();
        $updatebowler = DB::table('updatebowlers')->get();

        return view('admin.manage.score.edit', compact('data', 'match', 'team', 'player', 'scoreupdate', 'updatebowler'));
    }

    public function update(Request $request)
    {
        // Query Bulder
        $data = array();
        // $data['team_id']=$request->team_id;
        $data['scoreupdate_id'] = $request->scoreupdate_id;
        $data['outby_id'] = $request->outby_id;
        $data['one_id'] = $request->one_id;
        $data['two_id'] = $request->two_id;
        $data['three_id'] = $request->three_id;
        $data['four_id'] = $request->four_id;
        $data['six_id'] = $request->six_id;
        $data['balls_played_id'] = $request->balls_played_id;
        // ==============================
        // $data['overs_id']=$request->overs_id;
        // $data['maidens_id']=$request->maidens_id;
        // $data['runs_id']=$request->runs_id;
        // $data['wickets_id']=$request->wickets_id;
        // $data['no_balls_id']=$request->no_balls_id;
        // $data['wides_id']=$request->wides_id;
        // $data['panalty_runs_id']=$request->panalty_runs_id;

        DB::table('scores')->where('id', $request->id)->update($data);

        $notification = array('message' => 'Scores Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
