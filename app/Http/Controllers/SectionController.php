<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SectionController extends Controller
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
     $data = DB::table("addsection")
     ->leftjoin("addclass",'addclass.id','addsection.class_id')
     ->leftjoin("addgroup",'addgroup.id','addsection.group_id')
     ->select("addsection.*",'addclass.class_name','addgroup.group_name','addclass.class_name_bn','addgroup.group_name_bn')
     ->get();
     return view('admin.addsection.index',compact('data'));
 }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.addsection.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $data = array();
     $data['class_id']      = $request->class_id;
     $data['group_id']      = $request->group_id;
     $data['section_name']  = $request->section_name;
     $data['section_name_bn']  = $request->section_name_bn;
     $data['status']        = $request->status;

     DB::table('addsection')->insert($data);

     Toastr::success(__('Section Added Successfully'));
     return redirect()->route('addsection.index');
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
        $data = DB::table("addsection")->where('id',$id)->first();
        $class = DB::table("addclass")->where('status',1)->get();
        $group = DB::table('addgroup')->where('class_id',$data->class_id)->get();
        return view('admin.addsection.edit',compact('data','class','group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['class_id']      = $request->class_id;
        $data['group_id']      = $request->group_id;
        $data['section_name']  = $request->section_name;
        $data['section_name_bn']  = $request->section_name_bn;
        $data['status']        = $request->status;

        $update = DB::table('addsection')->where('id', $id)->update($data);

        if ($update) {
            Toastr::success(__('Section Update Successfully'));
            return redirect()->route('addsection.index');
        }
        else{
            Toastr::error(__('Section Update Unsuccessfully'));
            return redirect()->route('addsection.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $data = DB::table("addsection")->where('id',$id)->first();

       if ($data) {
           DB::table("addsection")->where("id",$id)->delete();
           Toastr::success(__('Section Delete Successfully'));
           return redirect()->route('addsection.index');
       }
       else{
        Toastr::error(__('Section Delete Unsuccessfully'));
        return redirect()->route('addsection.index');
    }
}

public function getgroup($class_id){

    $group  = DB::table("addgroup")->where("class_id",$class_id)->where("status",1)->get();

    if($group)
    {
        foreach($group as $v)
        {
            if(config('app.locale') == 'en')
            {
                $group_name = $v->group_name;
            }
            else
            {
                $group_name = $v->group_name_bn;
            }
            echo "<option value='".$v->id."'>".$group_name."</option>";
        }
    }

}


}
