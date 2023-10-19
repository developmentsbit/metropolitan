<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class VideoController extends Controller
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
      $data = DB::table("videogallerys")->get();
      return view('admin.videogallerys.index',compact('data'));
  }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.videogallerys.create');
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = array();
       $data['title']      = $request->title;
       $data['title_bn']      = $request->title_bn;
       $data['linkurl']    = $request->linkurl;

       DB::table('videogallerys')->insert($data);


       Toastr::success(__('VIdeo Added Successfully'));
        return redirect()->route('videogallerys.index');
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

        $data = DB::table("videogallerys")->where('id',$id)->first();
        return view('admin.videogallerys.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $data = array();
      $data['title']      = $request->title;
      $data['title_bn']      = $request->title_bn;
      $data['linkurl']    = $request->linkurl;

      $update = DB::table('videogallerys')->where('id', $id)->update($data);

      if ($update) {
        Toastr::success(__('Video Update Successfully'));
        return redirect()->route('videogallerys.index');
    }
    else{
        Toastr::error(__('Video Update Successfully'));
        return redirect()->route('videogallerys.index');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     $data = DB::table("videogallerys")->where('id',$id)->first();

     if ($data) {
         DB::table("videogallerys")->where("id",$id)->delete();
         Toastr::success(__('Video Delete Successfully'));
        return redirect()->route('videogallerys.index');
     }
     else{
        Toastr::error(__('Video Delete Successfully'));
        return redirect()->route('videogallerys.index');
    }
}
}
