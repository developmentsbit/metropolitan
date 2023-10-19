<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class SuggestionController extends Controller
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
        $data = DB::table("suggestion")
        ->join('addclass','addclass.id','suggestion.class_id')
        ->select("suggestion.*",'addclass.class_name','addclass.class_name_bn')
        ->get();
        return view('admin.suggestion.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.suggestion.create',compact('class'));
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
        $upload_path='suggestion_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('suggestion')->insert($data);

    }
    else{
        DB::table('suggestion')->insert($data);
    }

    Toastr::success(__('Suggestion Added Successfully'));
    return redirect()->route('suggestion.index');
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
        $data = DB::table("suggestion")->where('id',$id)->first();
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.suggestion.edit',compact('data','class'));
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

        $old_image = DB::table("suggestion")->where('id',$id)->first();

        $path = public_path().'/'.$old_image->image;

        if(file_exists($path))
        {
            unlink($path);
        }


        $image_name= rand(1111,9999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='suggestion_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $update = DB::table('suggestion')->where('id', $id)->update($data);

    }else{
        $update = DB::table('suggestion')->where('id', $id)->update($data);
    }

    if ($update) {
        Toastr::success(__('Suggestion Update Successfully'));
        return redirect()->route('suggestion.index');    }
    else{
        Toastr::error(__('Suggestion Update Unsuccessfully'));
        return redirect()->route('suggestion.index');    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("suggestion")->where('id',$id)->first();

        if ($data) {

            $old_image = DB::table("suggestion")->where('id',$id)->first();

        $path = public_path().'/'.$old_image->image;

        if(file_exists($path))
        {
            unlink($path);
        }

           DB::table("suggestion")->where("id",$id)->delete();
           Toastr::success(__('Suggestion Delete Successfully'));
           return redirect()->route('suggestion.index');
       }
       else{
           Toastr::error(__('Suggestion Delete Unsuccessfully'));
           return redirect()->route('suggestion.index');
    }
}
}
