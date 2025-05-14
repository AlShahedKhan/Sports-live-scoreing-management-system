<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CommentryCreate;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CommentryCreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $data=CommentryCreate::all();
            return view('admin.manage.commentrycreate.index',compact('data'));
    }

    // store methode
    public function store(Request $request)
    {
        $validated = $request->validate([
            'to' => 'required|max:55',
            'details' => 'required|max:5000',
        ]);

        // eluquent ORM
        CommentryCreate::insert([
            'to' => $request->to,
            'details' => $request->details,
        ]);
        $notification = array('message'=>'Commentry Create Inserted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $commnetrycreate=CommentryCreate::find($id);
        $commnetrycreate->delete();
        $notification = array('message'=>'commnetry crate Deleted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        // Eloquent ORM
            // $data=Subcategory::find($id);
            // $category=Category::all();
        // Query Bulder
            $data=CommentryCreate::find($id);
            return view('admin.manage.commentrycreate.edit',compact('data'));
    }

    public function update(Request $request)
    {
        // Query Bulder
            $data=array();
            $data['to']=$request->to;
            $data['details']=$request->details;
            DB::table('commentry_creates')->where('id',$request->id)->update($data);
        $notification = array('message'=>'commentry creates Updated!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
