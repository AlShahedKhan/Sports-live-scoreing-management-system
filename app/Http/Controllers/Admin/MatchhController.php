<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matchh;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class MatchhController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Matchh::orderby('match_datetime', 'ASC')->where('is_game_over', 0)->get();
        $data1 = Matchh::orderby('match_datetime', 'DESC')->where('is_game_over', 1)->get();
        $data2 = Matchh::orderby('match_datetime', 'DESC')->where('is_game_over', 2)->get();
        return view('admin.manage.matchh.index', compact('data', 'data1', 'data2'));
    }

    // store methode
    public function store(Request $request)
    {
        $request->validate([
            'match_name' => 'required|max:55',
            'match_datetime' => 'required',
        ]);

        // eluquent ORM
        Matchh::insert([
            'match_name' => $request->match_name,
            'match_slug' => Str::slug($request->match_name, '-'),
            'match_datetime' => $request->match_datetime,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $notification = array('message'=>'Match Inserted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    // edit methode
    public function edit($id)
    {
        $data=Matchh::findorfail($id);
        return response()->json($data);
    }

    // update methode
    public function update(Request $request)
    {

        // Elequent ORM
        $match=Matchh::where('id',$request->id)->first();
        $request->validate([
            'match_name' => 'unique:matchhs,match_name,'.$match->id,
            // 'match_datetime' => 'required',
        ]);

        $match->update([
            'match_name' => $request->match_name,
            'match_slug' => Str::slug($request->match_name, '-'),
            // 'match_datetime' => $request->match_datetime,
            'is_game_over' => $request->status,
            'updated_at' => now(),
        ]);
        // return $match;
        $notification = array('message'=>'Team Update!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    // delete category methode
    public function destroy($id)
    {
        // eleqoent ORM
        $match=Matchh::find($id);
        $match->delete();
        $notification = array('message'=>'Match Deleted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
