<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class AdmissioninfoController extends Controller
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
        $data = DB::table("admissioninfo")->get();
        return view('admin.admissioninfo.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admissioninfo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


     $data = array();
     $data['type']      = $request->type;
     $data['title']      = $request->title;
     $data['title_bn']      = $request->title_bn;
     $data['date']       = $request->date;
     $image              = $request->file('image');

     if ($image) {
        $image_name= rand(11111,99999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='admissioninfo_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('admissioninfo')->insert($data);

    }else{
        DB::table('admissioninfo')->insert($data);
    }
    Toastr::success(__('Admission Info. Added Successfully'));
    return redirect()->route('admissioninfo.index');

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
       $data = DB::table("admissioninfo")->where('id',$id)->first();
       return view('admin.admissioninfo.edit',compact('data'));
   }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

       $data = array();
       $data['title']      = $request->title;
       $data['title_bn']      = $request->title_bn;
       $data['type']      = $request->type;
       $data['date']       = $request->date;
       $image              = $request->file('image');

       $old_image = DB::table("admissioninfo")->where('id',$id)->first();

       if ($image) {



        $image_name= rand(1111,9999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='admissioninfo_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $update = DB::table('admissioninfo')->where('id', $id)->update($data);

    }else{
        $update = DB::table('admissioninfo')->where('id', $id)->update($data);
    }

    if ($update) {
        Toastr::success(__('Admission Info. Update Successfully'));
        return redirect()->route('admissioninfo.index');
    }
 else{
        Toastr::error(__('Admission Info. Update Unsuccessfully'));
        return redirect()->route('admissioninfo.index');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("admissioninfo")->where('id',$id)->first();

        if ($data) {

           DB::table("admissioninfo")->where("id",$id)->delete();
           Toastr::success(__('Admission Info. Delete Successfully'));
           return redirect()->route('admissioninfo.index');
       }
       else{
        Toastr::error(__('Admission Info. Delete Unsuccessfully'));
        return redirect()->route('admissioninfo.index');     }


 }
}






