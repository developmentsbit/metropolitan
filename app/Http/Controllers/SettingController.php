<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $data = DB::table("setting")->first();

      if($data){
        $data = DB::table("setting")->first();
    }else{
        $data2 = DB::table("setting")->insert([

            'name' => 'Demo School'

        ]);

        $data = DB::table("setting")->first();
    }

    return view("admin.setting.create",compact('data'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $data = array();
      $data['name']         = $request->name;
      $data['name_bangla']         = $request->name_bangla;
      $data['email']        = $request->email;
      $data['phone']        = $request->phone;
      $data['established']  = $request->established;
      $data['established_bangla']  = $request->established_bangla;
      $data['eiin']  = $request->eiin;
      $data['eiin_bangla']  = $request->eiin_bangla;
      $data['meta']         = $request->meta;
      $data['meta_title']   = $request->meta_title;
      $data['description']  = $request->description;
      $data['map']          = $request->map;
      $data['page']         = $request->page;
      $data['youtube']      = $request->youtube;
      $data['address']      = $request->address;
      $data['address_bangla']      = $request->address_bangla;
      $data['type']      = $request->type;
      $image                = $request->file('image');

      if ($image) {

        $image_name= rand(1111,9999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='setting_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $update = DB::table('setting')->where('id', $id)->update($data);

    }else{
        $update = DB::table('setting')->where('id', $id)->update($data);
    }

    if ($update) {
     return redirect()->route('setting.create')->with('message','Page Update Successfully');
 }
 else{
    return redirect()->route('setting.create')->with('error','Page Update Unsuccessfully');
}
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
