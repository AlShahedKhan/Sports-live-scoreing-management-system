<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
// use Image;
class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $data=DB::table('brands')->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($row){
                        $actionbtn='<a href="#" class="btn btn-info btn-sm edit"
                        data-id="'.$row->id.'" data-toggle="modal"
                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                        <a href="'.route('childcategory.delete',[$row->id]).'"
                        class="btn btn-danger btn-sm" id="delete"><i
                            class="fas fa-trash"></a>';
                        return $actionbtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.category.brand.index');
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'brand_name'=>'required|unique:brands|max:55',
    //     ]);

    //     $slug=Str::slug($request->brand_name,'-');

    //     $data=array();
    //     $data['brand_name']=$request->brand_name;
    //     $data['brand_slug']=Str::slug($request->brand_name,'-');

    //         // Working with image
    //         $photo=$request->brand_logo;
    //         $photoname=$slug.'.'.$photo->getClientOriginalExtension();

    //     // $photo->move('public/files/brand/',$photoname); //without image intervetion
    //     Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname); //image intervention

    //     $data['brand_logo']='public/files/brand/'.$photoname; //public/files/brand/plus-point.jpg
    //     DB::table('brands')->insert($data);

    //     $notification = array('message'=>'Brand Inserted!','alert-type'=>'success');
    //     return redirect()->back()->with($notification);
    // }

    public function store(Request $request)
    {
        $validated = $request ->validate([
            'brand_name' => 'required|unique:brands|max:55',
        ]);

        $slug=Str::slug($request->brand_name,'-');

        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_slug']=Str::slug($request->brand_name,'-');

            $photo=$request->brand_logo;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();

            Image::make($photo)->resize(240,120)->save('public'.$photoname);

            $data['brand_logo']='public'.$photoname;
            DB::table('brands')->insert($data);
            $notification = array('message'=>'Brand Inserted!','alert-type'=>'success');
             return redirect()->back()->with($notification);
    }
}
