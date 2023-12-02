<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class PrincipleController extends Controller
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
        $data = DB::table("principles")->get();
        return view('admin.principle.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.principle.create');
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $validated = $request->validate([
        'type' => 'required|unique:principles|max:255',
    ]);

       $data = array();
       $data['name']       = $request->name;
       $data['name_bn']       = $request->name_bn;
       $data['details']    = $request->details;
       $data['details_bn']    = $request->details_bn;
       $data['type']       = $request->type;
       $image              = $request->file('image');

       if ($image) {
        $image_name= rand(11111,99999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='principle_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('principles')->insert($data);

    }

    Toastr::success(__('Principle Message Added Successfully'));
    return redirect()->route('principle.index');

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
     $data = DB::table("principles")->where('id',$id)->first();
     return view('admin.principle.edit',compact('data'));
 }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['name']       = $request->name;
        $data['name_bn']       = $request->name_bn;
        $data['details']    = $request->details;
        $data['details_bn']    = $request->details_bn;
        $data['type']       = $request->type;
        $image              = $request->file('image');

        $old_image = DB::table("principles")->where('id',$id)->first();

        if ($image) {

            if(file_exists($old_image->image))
            {

                unlink($old_image->image);
            }

            $image_name= rand(1111,9999);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='principle_image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            $update = DB::table('principles')->where('id', $id)->update($data);

        }else{
            $update = DB::table('principles')->where('id', $id)->update($data);
        }

        if ($update) {
            Toastr::success(__('Principle Message Update Successfully'));
            return redirect()->route('principle.index');
        }
        else{
            Toastr::error(__('Principle Message Update Unsuccessfully'));
            return redirect()->route('principle.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("principles")->where("id",$id)->first();

        if ($data) {
            $path = public_path().'/'.$data->image;
            if(file_exists($path))
            {

                unlink($path);
            }
            DB::table("principles")->where("id",$id)->delete();
            Toastr::success(__('Principle Message Delete Successfully'));
            return redirect()->route('principle.index');
        }
        else{
            Toastr::error(__('Principle Message Delete Unsuccessfully'));
            return redirect()->route('principle.index');
     }



 }
}
