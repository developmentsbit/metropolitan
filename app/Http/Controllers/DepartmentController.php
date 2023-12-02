<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class DepartmentController extends Controller
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
     $data = DB::table("department")->get();
     return view('admin.department.index',compact('data'));
 }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('admin.department.create');
 }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $data = array();
     $data['department']      = $request->department;
     $data['department_name_bn']      = $request->department_name_bn;


     DB::table('department')->insert($data);

     Toastr::success(__('Department Added Successfully'));
        return redirect()->route('department.index');


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
        $data = DB::table("department")->where('id',$id)->first();
        return view('admin.department.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['department']      = $request->department;
        $data['department_name_bn']      = $request->department_name_bn;


        $update = DB::table('department')->where('id', $id)->update($data);

        if ($update) {
            Toastr::success(__('Department Update Successfully'));
            return redirect()->route('department.index');
        }
        else{
            Toastr::error(__('Department Update Unsuccessfully'));
            return redirect()->route('department.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $data = DB::table("department")->where('id',$id)->first();

       if ($data) {
           DB::table("department")->where("id",$id)->delete();
           Toastr::success(__('Department Delete Successfully'));
           return redirect()->route('department.index');
       }
       else{
        Toastr::error(__('Department Delete Unsuccessfully'));
        return redirect()->route('department.index');
    }
}


}
