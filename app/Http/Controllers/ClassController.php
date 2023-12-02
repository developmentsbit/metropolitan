<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class ClassController extends Controller
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
     $data = DB::table("addclass")->get();
     return view('admin.addclass.index',compact('data'));
 }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('admin.addclass.create');
 }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $data = array();
     $data['class_name']      = $request->class_name;
     $data['class_name_bn']      = $request->class_name_bn;
     $data['status']         = $request->status;

     DB::table('addclass')->insert($data);

     Toastr::success(__('New Class Added Successfully'));
     return redirect()->route('addclass.index');
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
        $data = DB::table("addclass")->where('id',$id)->first();
        return view('admin.addclass.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['class_name']      = $request->class_name;
        $data['class_name_bn']      = $request->class_name_bn;
        $data['status']    = $request->status;

        $update = DB::table('addclass')->where('id', $id)->update($data);

        if ($update) {
            Toastr::success(__('New Class Update Successfully'));
            return redirect()->route('addclass.index');
        }
        else{
            Toastr::error(__('New Class Update Unsuccessfully'));
            return redirect()->route('addclass.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $data = DB::table("addclass")->where('id',$id)->first();

       if ($data) {
           DB::table("addclass")->where("id",$id)->delete();
           Toastr::success(__('New Class Delete Successfully'));
           return redirect()->route('addclass.index');
        }
       else{
        Toastr::success(__('New Class Delete Unsuccessfully'));
        return redirect()->route('addclass.index');
    }
}


}
