<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class NoticesController extends Controller
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
        $data = DB::table("notices")->get();
        return view('admin.notices.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('admin.notices.create');
 }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = array();
       $data['type']       = $request->type;
       $data['title']      = $request->title;
       $data['title_bn']      = $request->title_bn;
       $data['date']       = $request->date;
       $data['details']    = $request->details;
       $data['details_bn']    = $request->details_bn;
       $data['image'] = '0';
       $image              = $request->file('image');

       if ($image) {
        $image_name= rand(11111,99999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='notices_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('notices')->insert($data);

    }
    else{
        DB::table('notices')->insert($data);
    }

    Toastr::success(__('Notices Added Successfully'));
    return redirect()->route('notices.index');
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
        $data = DB::table("notices")->where('id',$id)->first();
     return view('admin.notices.edit',compact('data'));
 }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $data = array();
      $data['type']       = $request->type;
      $data['title']      = $request->title;
      $data['title_bn']      = $request->title_bn;
      $data['date']       = $request->date;
      $data['details']    = $request->details;
      $data['details_bn']    = $request->details_bn;
      $image              = $request->file('image');

      $old_image = DB::table("notices")->where('id',$id)->first();

      if ($image) {

        $data = DB::table('notices')->where('id',$id)->first();

        $path = public_path().'/'.$data->image;

        if(file_exists($path))
        {
            unlink($path);
        }



        $image_name= rand(1111,9999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='notices_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $update = DB::table('notices')->where('id', $id)->update($data);

    }else{
        $update = DB::table('notices')->where('id', $id)->update($data);
    }

    if ($update) {
        Toastr::success(__('Notices Update Successfully'));
        return redirect()->route('notices.index');
   }
   else{
        Toastr::error(__('Notices Update Unsuccessfully'));
        return redirect()->route('notices.index');
}
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("notices")->where('id',$id)->first();

       if ($data) {

        $path = public_path().'/'.$data->image;

        if(file_exists($path))
        {
            unlink($path);
        }

         DB::table("notices")->where("id",$id)->delete();
            Toastr::success(__('Notices Delete Successfully'));
            return redirect()->route('notices.index');
     }
     else{
            Toastr::error(__('Notices Delete Successfully'));
            return redirect()->route('notices.index');
   }
}
}
