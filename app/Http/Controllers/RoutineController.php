<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;


class RoutineController extends Controller
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
        $data = DB::table("classroutine")
        ->join('addclass','addclass.id','classroutine.class_id')
        ->select("classroutine.*",'addclass.class_name','addclass.class_name_bn')
        ->get();
        return view('admin.classroutine.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.classroutine.create',compact('class'));
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
     $data['class_id']   = $request->class_id;
     $image              = $request->file('image');

     if ($image) {
        $image_name= rand(11111,99999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='classroutine_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('classroutine')->insert($data);

    }
    else{
        DB::table('classroutine')->insert($data);
    }

    Toastr::success(__('Class Routine Added Successfully'));
    return redirect()->route('classroutine.index');
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
        $data = DB::table("classroutine")->where('id',$id)->first();
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.classroutine.edit',compact('data','class'));
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
      $data['class_id']   = $request->class_id;
      $image              = $request->file('image');


      if ($image) {

        $old_image = DB::table("classroutine")->where('id',$id)->first();

        $path = public_path().'/'.$old_image->image;

        if(file_exists($path))
        {
            unlink($path);
        }


        $image_name= rand(1111,9999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='classroutine_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $update = DB::table('classroutine')->where('id', $id)->update($data);

    }else{
        $update = DB::table('classroutine')->where('id', $id)->update($data);
    }

    if ($update) {
        Toastr::success(__('Class Routine Update Successfully'));
        return redirect()->route('classroutine.index');
    }
    else{
        Toastr::error(__('Class Routine Update Unsuccessfully'));
        return redirect()->route('classroutine.index');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("classroutine")->where('id',$id)->first();

        if ($data) {

            $old_image = DB::table("classroutine")->where('id',$id)->first();

            $path = public_path().'/'.$old_image->image;

            if(file_exists($path))
            {
                unlink($path);
            }

           DB::table("classroutine")->where("id",$id)->delete();
            Toastr::success(__('Class Routine Delete Successfully'));
            return redirect()->route('classroutine.index');
       }
       else{
            Toastr::error(__('Class Routine Delete Unsuccessfully'));
            return redirect()->route('classroutine.index');
    }
}
}
