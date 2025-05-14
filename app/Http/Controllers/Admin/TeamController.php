<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // all category showing methode
    public function index()
    {
        // $data=DB::table('categories')->get(); //query bulder
        $data = Team::all();
        return view('admin.manage.teams.index', compact('data'));
    }

    // store methode
    public function store(Request $request)
    {
        $validated = $request->validate([
            'team_name' => 'required|unique:teams|max:55',
        ]);

        // eluquent ORM
        Team::insert([
            'team_name' => $request->team_name,
            'team_slug' => Str::slug($request->team_name, '-')
        ]);

        $notification = array('message'=>'Team Inserted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    // edit methode
    public function edit($id)
    {
        // $data=DB::table('categories')->where('id',$id)->first();
        $data=Team::findorfail($id);
        return response()->json($data);
    }

    // update methode
    public function update(Request $request)
    {
        //Query Bulder
            // $data=array();
            // $data['category_name']=$request->category_name;
            // $data['category_slug']=Str::slug($request->category_name,'-');
            // DB::table('categories')->where('id',$request->id)->update($data);
        // Elequent ORM
        $team=Team::where('id',$request->id)->first();
        $team->update([
            'team_name' => $request->team_name,
            'category_slug' => Str::slug($request->team_name, '-')
        ]);

        $notification = array('message'=>'Team Update!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    // delete category methode
    public function destroy($id)
    {
        // query builder
            // DB::table('categories')->where('id',$id)->delete();
        // eleqoent ORM
        $team=Team::find($id);
        $team->delete();
        $notification = array('message'=>'Team Deleted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
