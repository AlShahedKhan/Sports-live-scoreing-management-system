<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $data=DB::table('newss')->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($row){
                        $actionbtn='<a href="#" class="btn btn-info btn-sm edit"
                        data-id="'.$row->id.'" data-toggle="modal"
                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                        <a href="'.route('score.delete',[$row->id]).'"
                        class="btn btn-danger btn-sm" id="delete"><i
                            class="fas fa-trash"></a>';
                        return $actionbtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.manage.news.index');
    }

    public function store(Request $request)
    {
        $validated = $request ->validate([
            'news_name' => 'required|unique:newss|max:55',
        ]);

        $slug=Str::slug($request->news_name,'-');

        $data=array();
        $data['news_name']=$request->news_name;
        $data['news_slug']=Str::slug($request->news_name,'-');

            $photo=$request->news_logo;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();

            Image::make($photo)->resize(240,120)->save('public'.$photoname);

            $data['news_logo']='public'.$photoname;
            DB::table('newss')->insert($data);
            $notification = array('message'=>'News Inserted!','alert-type'=>'success');
             return redirect()->back()->with($notification);
    }
}
