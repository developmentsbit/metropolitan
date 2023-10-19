<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class TeacherstaffController extends Controller
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
        $data = DB::table("teacherstaff")
        ->leftjoin('department','department.id','teacherstaff.department_id')
        ->select("teacherstaff.*",'department.department')
        ->get();
        return view('admin.teacherstaff.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = DB::table("department")->get();
        return view('admin.teacherstaff.create',compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


       $data = array();
       $data['department_id']        = $request->department_id;
       $data['sl']        = $request->sl;
       $data['name']                 = $request->name;
       $data['designation']          = $request->designation;
       $data['nid']                  = $request->nid;
       $data['dob']                  = $request->dob;
       $data['blood']                = $request->blood;
       $data['religion']             = $request->religion;
       $data['relationship']         = $request->relationship;
       $data['father_name']          = $request->father_name;
       $data['mother_name']          = $request->mother_name;
       $data['mobile']               = $request->mobile;
       $data['email']                = $request->email;
       $data['join_date']            = $request->join_date;
       $data['mpo_date']             = $request->mpo_date;
       $data['present_address']      = $request->present_address;
       $data['parmanent_address']    = $request->parmanent_address;
       $data['education']            = $request->education;
       $data['gender']               = $request->gender;
       $data['type']                 = $request->type;
       $data['image'] = '0';
       $image                        = $request->file('image');

       if ($image) {
        $image_name= rand(11111,99999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='teacherstaff_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('teacherstaff')->insert($data);

    }else{
        DB::table('teacherstaff')->insert($data);
    }

    Toastr::success(__('Teacher/Staff Added Successfully'));
        return redirect()->back();

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
     $data = DB::table("teacherstaff")->where('id',$id)->first();
     $department = DB::table("department")->get();
     return view('admin.teacherstaff.edit',compact('data','department'));
 }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = array();
        $data['department_id']        = $request->department_id;
        $data['sl']        = $request->sl;
        $data['name']                 = $request->name;
        $data['designation']          = $request->designation;
        $data['nid']                  = $request->nid;
        $data['dob']                  = $request->dob;
        $data['blood']                = $request->blood;
        $data['religion']             = $request->religion;
        $data['relationship']         = $request->relationship;
        $data['father_name']          = $request->father_name;
        $data['mother_name']          = $request->mother_name;
        $data['mobile']               = $request->mobile;
        $data['email']                = $request->email;
        $data['join_date']            = $request->join_date;
        $data['mpo_date']             = $request->mpo_date;
        $data['present_address']      = $request->present_address;
        $data['parmanent_address']    = $request->parmanent_address;
        $data['education']            = $request->education;
        $data['gender']               = $request->gender;
        $data['type']                 = $request->type;
        $image              = $request->file('image');


        if ($image) {
            $old_image = DB::table("teacherstaff")->where('id',$id)->first();

            $path = public_path().'/'.$old_image->image;

            if(file_exists($path))
            {
                unlink($path);
            }

            $image_name= rand(1111,9999);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='teacherstaff_image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            $update = DB::table('teacherstaff')->where('id', $id)->update($data);

        }else{
            $update = DB::table('teacherstaff')->where('id', $id)->update($data);
        }

        if ($update) {
            Toastr::success(__('Teacher/Staff Update Successfully'));
            return redirect()->back();
       }
       else{
        Toastr::error(__('Teacher/Staff Update Unsuccessfull'));
        return redirect()->back();
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("teacherstaff")->where('id',$id)->first();

        if ($data) {

            $old_image = DB::table("teacherstaff")->where('id',$id)->first();

            $path = public_path().'/'.$old_image->image;

            if(file_exists($path))
            {
                unlink($path);
            }

         DB::table("teacherstaff")->where("id",$id)->delete();
     }
     Toastr::success(__('Teacher/Staff Delete Successfully'));
        return redirect()->back();

}
}






