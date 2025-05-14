<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matchh;
use App\Models\Player;
use App\Models\Score;
use App\Models\Scorebowlerfirst;
use App\Models\Scoreupdate;
use App\Models\Team;
use App\Models\Updatebowler;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ScorebowlerfirstController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $data=Scorebowlerfirst::all();
            $team=Team::all();
            $match=Matchh::all();
            $player=Player::all();
            $updatebowler=Updatebowler::all();
            return view('admin.manage.scorebowlerfirst.index',compact('data','team','match','player','updatebowler'));
    }

    // store methode
    public function store(Request $request)
    {
        // eluquent ORM
        Scorebowlerfirst::insert([
            'match_id' => $request->match_id,
            'team_id' => $request->team_id,
            'player_id' => $request->player_id,
            'overs_id' => $request->overs_id,
            'maidens_id' => $request->maidens_id,
            'runs_id' => $request->runs_id,
            'wickets_id' => $request->wickets_id,
            'no_balls_id' => $request->no_balls_id,
            'wides_id' => $request->wides_id,
            'panalty_runs_id' => $request->panalty_runs_id,
        ]);
        $notification = array('message'=>'Scorebowlerfirst Inserted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $score=Scorebowlerfirst::find($id);
        $score->delete();
        $notification = array('message'=>'Scorebowlerfirst Deleted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
            $data=Scorebowlerfirst::find($id);
            $match=DB::table('matchhs')->get();
            $team=DB::table('teams')->get();
            $player=DB::table('players')->get();
            $updatebowler=DB::table('updatebowlers')->get();

            return view('admin.manage.scorebowlerfirst.edit',compact('data','match','team','player','updatebowler'));
    }

    public function update(Request $request)
    {
        // Query Bulder
            $data=array();
            $data['overs_id']=$request->overs_id;
            $data['maidens_id']=$request->maidens_id;
            $data['runs_id']=$request->runs_id;
            $data['wickets_id']=$request->wickets_id;
            $data['no_balls_id']=$request->no_balls_id;
            $data['wides_id']=$request->wides_id;
            $data['panalty_runs_id']=$request->panalty_runs_id;

            DB::table('scorebowlerfirsts')->where('id',$request->id)->update($data);

        $notification = array('message'=>'Scorebowlerfirst Updated!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
