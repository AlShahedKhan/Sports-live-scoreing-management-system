<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $data=Player::all();
            $team=Team::all();
            return view('admin.manage.players.index',compact('data','team'));
    }

    // store methode
    public function store(Request $request)
    {
        $validated = $request->validate([
            'player_name' => 'required|max:55',
        ]);

        // eluquent ORM
        Player::insert([
            'team_id' => $request->team_id,
            'player_name' => $request->player_name,
            'player_slug' => Str::slug($request->player_name, '-')
        ]);
        $notification = array('message'=>'Player Inserted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $player=Player::find($id);
        $player->delete();
        $notification = array('message'=>'Subcategory Deleted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        // Eloquent ORM
            // $data=Subcategory::find($id);
            // $category=Category::all();
        // Query Bulder
            $data=Player::find($id);
            $team=DB::table('teams')->get();

            return view('admin.manage.players.edit',compact('data','team'));
    }

    public function update(Request $request)
    {
        // Query Bulder
            $data=array();
            $data['team_id']=$request->team_id;
            $data['player_name']=$request->player_name;
            $data['player_slug']=Str::slug($request->player_name,'-');
            DB::table('players')->where('id',$request->id)->update($data);

        $notification = array('message'=>'Player Updated!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
