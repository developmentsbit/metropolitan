<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class GroupController extends Controller
{

   public function __construct()
   {
        $this->middleware('auth');
   }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $data = DB::table("addgroup")
     ->leftjoin("addclass",'addclass.id','addgroup.class_id')
     ->select("addgroup.*",'addclass.class_name','addclass.class_name_bn')
     ->get();
     return view('admin.addgroup.index',compact('data'));
 }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.addgroup.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $data = array();
     $data['class_id']      = $request->class_id;
     $data['group_name']    = $request->group_name;
     $data['group_name_bn']    = $request->group_name_bn;
     $data['status']         = $request->status;

     DB::table('addgroup')->insert($data);

     Toastr::success(__('Group Added Successfully'));
     return redirect()->route('addgroup.index');
 }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table("addgroup")->where('id',$id)->first();
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.addgroup.edit',compact('data','class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['class_id']      = $request->class_id;
        $data['group_name']    = $request->group_name;
        $data['group_name_bn']    = $request->group_name_bn;
        $data['status']        = $request->status;

        $update = DB::table('addgroup')->where('id', $id)->update($data);

        if ($update) {
            Toastr::success(__('Group Update Successfully'));
            return redirect()->route('addgroup.index');
        }
        else{
            Toastr::error(__('Group Update Successfully'));
            return redirect()->route('addgroup.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $data = DB::table("addgroup")->where('id',$id)->first();

       if ($data) {
           DB::table("addgroup")->where("id",$id)->delete();
           Toastr::success(__('Group Delete Successfully'));
        return redirect()->route('addgroup.index');
       }
       else{
        Toastr::error(__('Group Delete Unsuccessfully'));
        return redirect()->route('addgroup.index');
    }
}


}
