<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use App\Models\Matchh;
use App\Models\Player;
use App\Models\Commentry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CommentryCreate;

class CommentryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['commentry'] = Commentry::all();
        $data['team'] = Team::all();
        $data['match'] = Matchh::all();
        $data['player'] = Player::all();
        $data['player2'] = Player::all();
        $data['CommentryCreate'] = CommentryCreate::all();
        // dd($data);
        // return $data;
        return view('admin.manage.commentry.index')->with($data);
    }

    // store methode
    public function store(Request $request)
    {
        // eluquent ORM
        Commentry::insert([
            'match_id' => $request->match_id,
            'team_id' => $request->team_id,
            'player_id' => $request->player_id,
            'player2_id' => $request->player2_id,
            'to_id' => $request->to_id,
            'details_id' => $request->details_id,
        ]);
        $notification = array('message' => 'Commentry Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $commentry = Commentry::find($id);
        $commentry->delete();
        $notification = array('message' => 'commentry Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = Commentry::find($id);
        $match = DB::table('matchhs')->get();
        $team = DB::table('teams')->get();
        $player = DB::table('players')->get();
        $player2 = DB::table('players')->get();
        $CommentryCreate = DB::table('commentry_creates')->get();

        return view('admin.manage.commentry.edit', compact('data', 'match', 'team', 'player','player2','CommentryCreate'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        // Query Bulder
        $data = array();
        $data['player_id']=$request->player_id;
        $data['team_id']=$request->team_id;
        $data['match_id']=$request->match_id;
        $data['player2_id']=$request->player2_id;
        $data['to_id']=$request->to_id;
        $data['details_id']=$request->details_id;
        try {
            DB::table('commentries')->where('id', $request->id)->update($data);
        } catch (\Throwable $th) {
            throw $th;
        }

        $notification = array('message' => 'commentrys Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

}
