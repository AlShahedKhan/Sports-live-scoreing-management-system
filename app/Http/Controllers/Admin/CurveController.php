<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curve;
use App\Models\Matchh;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
            $data=Curve::all();
            $team=Team::all();
            $match=Matchh::all();
            // $player=Player::all();
            return view('admin.manage.curve.index',compact('data','team','match'));
    }

    // store methode
    public function store(Request $request)
    {
        // eluquent ORM
        Curve::insert([
            'match_id' => $request->match_id,
            'team_id' => $request->team_id,
            // 'player_id' => $request->player_id,
            'runs' => $request->runs,
            // 'overs' => $request->overs,
            // 'wickets' => $request->wickets,
        ]);
        $notification = array('message'=>'New record Inserted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $curve=Curve::find($id);
        $curve->delete();
        $notification = array('message'=>'Record Deleted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
            $data=Curve::find($id);
            $match=DB::table('matchhs')->get();
            $team=DB::table('teams')->get();
            // $player=DB::table('players')->get();

            return view('admin.manage.curve.edit',compact('data','match','team'));
    }

    public function update(Request $request)
    {
        // Query Bulder
            $data=array();
            $data['match_id']=$request->match_id;
            $data['team_id']=$request->team_id;
            $data['runs']=$request->runs;

            DB::table('curves')->where('id',$request->id)->update($data);

        $notification = array('message'=>'Record Updated!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
