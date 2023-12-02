<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class UsefulController extends Controller
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
     $data = DB::table("usefullinks")->get();
     return view('admin.usefullinks.index',compact('data'));
 }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('admin.usefullinks.create');
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

     DB::table('usefullinks')->insert($data);

    Toastr::success(__('Link Added Successfully'));
    return redirect()->route('usefullink.index');
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
        $data = DB::table("usefullinks")->where('id',$id)->first();
        return view('admin.usefullinks.edit',compact('data'));
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

        $update = DB::table('usefullinks')->where('id', $id)->update($data);

        if ($update) {
            Toastr::success(__('Link Update Successfully'));
            return redirect()->route('usefullink.index');
        }
        else{
            Toastr::error(__('Link Update Unsuccessfully'));
        return redirect()->route('usefullink.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $data = DB::table("usefullinks")->where('id',$id)->first();

       if ($data) {
           DB::table("usefullinks")->where("id",$id)->delete();
           Toastr::success(__('Link Delete Successfully'));
           return redirect()->route('usefullink.index');
       }
       else{
        Toastr::success(__('Link Delete Successfully'));
        return redirect()->route('usefullink.index');
    }
}


}
