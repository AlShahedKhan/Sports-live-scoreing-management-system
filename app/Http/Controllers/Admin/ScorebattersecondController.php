<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matchh;
use App\Models\Player;
use App\Models\Score;
use App\Models\Scorebattersecond;
use App\Models\Scoreupdate;
use App\Models\Team;
use App\Models\Updatebowler;
use Illuminate\Support\Facades\DB;

class ScorebattersecondController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $data=Scorebattersecond::all();
            $team=Team::all();
            $match=Matchh::all();
            $player=Player::all();
            $scoreupdate=Scoreupdate::all();
            return view('admin.manage.scorebattersecond.index',compact('data','team','match','player','scoreupdate'));
    }

    // store methode
    public function store(Request $request)
    {
        // eluquent ORM
        Scorebattersecond::insert([
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
        $notification = array('message'=>'Score Batter Second Inserted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $scorebattersecond=Scorebattersecond::find($id);
        $scorebattersecond->delete();
        $notification = array('message'=>'Score Batter Second Deleted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
            $data=Scorebattersecond::find($id);
            $match=DB::table('matchhs')->get();
            $team=DB::table('teams')->get();
            $player=DB::table('players')->get();
            $scoreupdate=DB::table('scoreupdates')->get();

            return view('admin.manage.scorebattersecond.edit',compact('data','match','team','player','scoreupdate'));
    }

    public function update(Request $request)
    {
        // Query Bulder
            $data=array();
            // $data['team_id']=$request->team_id;
            $data['scoreupdate_id']=$request->scoreupdate_id;
            $data['outby_id']=$request->outby_id;
            $data['one_id']=$request->one_id;
            $data['two_id']=$request->two_id;
            $data['three_id']=$request->three_id;
            $data['four_id']=$request->four_id;
            $data['six_id']=$request->six_id;
            $data['balls_played_id'] = $request->balls_played_id;

            DB::table('scorebatterseconds')->where('id',$request->id)->update($data);

        $notification = array('message'=>'Score Batter Soconds Updated!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
