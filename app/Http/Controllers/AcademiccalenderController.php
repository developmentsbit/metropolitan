<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class AcademiccalenderController extends Controller
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
        $data = DB::table("academiccalender")->get();
        return view('admin.academiccalender.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.academiccalender.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


     $data = array();
     $data['title']      = $request->title;
     $data['title_bn']      = $request->title_bn;
     $data['date']       = $request->date;
     $image              = $request->file('image');

     if ($image) {
        $image_name= rand(11111,99999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='academiccalender_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('academiccalender')->insert($data);

    }else{
        DB::table('academiccalender')->insert($data);
    }

    Toastr::success(__('Academic Calender Added Successfully'));
    return redirect()->route('academiccalender.index');
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
       $data = DB::table("academiccalender")->where('id',$id)->first();
       return view('admin.academiccalender.edit',compact('data'));
   }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

       $data = array();
       $data['title']      = $request->title;
       $data['title_bn']      = $request->title_bn;
       $data['date']       = $request->date;
       $image              = $request->file('image');


       if ($image) {
           $old_image = DB::table("academiccalender")->where('id',$id)->first();

           $path = public_path().'/'.$old_image->image;

            if(file_exists($path))
            {
                unlink($path);
            }



        $image_name= rand(1111,9999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='academiccalender_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $update = DB::table('academiccalender')->where('id', $id)->update($data);

    }else{
        $update = DB::table('academiccalender')->where('id', $id)->update($data);
    }

    if ($update) {
    Toastr::success(__('Academic Calender Update Successfully'));
    return redirect()->route('academiccalender.index');
 }
 else{
    Toastr::error(__('Academic Calender Update Unsuccessfully'));
    return redirect()->route('academiccalender.index');
}
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("academiccalender")->where('id',$id)->first();

        if ($data) {

            $old_image = DB::table("academiccalender")->where('id',$id)->first();

           $path = public_path().'/'.$old_image->image;

            if(file_exists($path))
            {
                unlink($path);
            }

           DB::table("academiccalender")->where("id",$id)->delete();
            Toastr::success(__('Academic Calender Delete Successfully'));
            return redirect()->route('academiccalender.index');
       }
       else{
            Toastr::error(__('Academic Calender Delete Unsuccessfully'));
            return redirect()->route('academiccalender.index');
     }


 }
}






