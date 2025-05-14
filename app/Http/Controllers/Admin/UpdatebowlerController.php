<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Updatebowler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdatebowlerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $data=Updatebowler::all();
            return view('admin.manage.updatebowlers.index',compact('data'));
    }

    // store methode
    public function store(Request $request)
    {
        $validated = $request->validate([
            'overs' => 'required|max:55',
            'maidens' => 'required|max:55',
            'runs' => 'required|max:55',
            'wickets' => 'required|max:55',
            'no_balls' => 'required|max:55',
            'wides' => 'required|max:55',
            'panalty_runs' => 'required|max:55',
        ]);

        // eluquent ORM
        Updatebowler::insert([
            'overs' => $request->overs,
            'maidens' => $request->maidens,
            'runs' => $request->runs,
            'wickets' => $request->wickets,
            'no_balls' => $request->no_balls,
            'wides' => $request->wides,
            'panalty_runs' => $request->panalty_runs,
        ]);
        $notification = array('message'=>'Updatebowlers Inserted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $player=Updatebowler::find($id);
        $player->delete();
        $notification = array('message'=>'Updatebowlers Deleted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        // Eloquent ORM
            // $data=Subcategory::find($id);
            // $category=Category::all();
        // Query Bulder
            $data=Updatebowler::find($id);
            return view('admin.manage.updatebowlers.edit',compact('data'));
    }

    public function update(Request $request)
    {
        // Query Bulder
            $data=array();
            $data['overs']=$request->overs;
            $data['maidens']=$request->maidens;
            $data['runs']=$request->runs;
            $data['wickets']=$request->wickets;
            $data['no_balls']=$request->no_balls;
            $data['wides']=$request->wides;
            $data['panalty_runs']=$request->panalty_runs;
            DB::table('updatebowlers')->where('id',$request->id)->update($data);
        $notification = array('message'=>'updatebowlers Updated!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
