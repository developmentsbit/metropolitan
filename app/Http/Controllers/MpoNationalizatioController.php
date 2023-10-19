<?php

namespace App\Http\Controllers;

use App\Models\mpoNationalizatio;
use Illuminate\Http\Request;
use DB;

class MpoNationalizatioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =mpoNationalizatio::get();
        // dd($data);
        $i=1;
        return view('admin.mpo_nationalization.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mpo_nationalization.create');
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array();
        $data['date']      = $request->date;
        $data['subject']      = $request->subject;
        $data['subject_bn']      = $request->subject_bn;
        $data['layer']      = $request->layer;
        $data['layer_bn']      = $request->layer_bn;
        $data['memorial_no']      = $request->memorial_no;
        $file              = $request->file('image');

        if($file)
        {  
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/admin/mpo_nationalization',$imageName);
            $data['image']=$imageName;
            DB::table('mpo_nationalizatios')->insert($data);
            
        }
        else
        {
            DB::table('mpo_nationalizatios')->insert($data);
        }
        
        return redirect()->route('mpo_nationalization.index')->with('message','MPO Nationalization List Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(mpoNationalizatio $mpoNationalizatio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = DB::table("mpo_nationalizatios")->where('id',$id)->first();
       return view('admin.mpo_nationalization.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $data = array();
        $data['date']      = $request->date;
        $data['subject']      = $request->subject;
        $data['subject_bn']      = $request->subject_bn;
        $data['layer']      = $request->layer;
        $data['layer_bn']      = $request->layer_bn;
        $data['memorial_no']      = $request->memorial_no;
        $file              = $request->file('image');

        if($file){
            $old_image = DB::table("mpo_nationalizatios")->where('id',$id)->first();

            
            $path=public_path().'/admin/mpo_nationalization/'.$old_image->image;
            // return $path;
            if(file_exists($path))
            {
                unlink($path);
            }
        }

        if($file)
        {  
            
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/admin/mpo_nationalization',$imageName);
            $data['image']=$imageName;
            DB::table('mpo_nationalizatios')->where('id', $id)->update($data);
            
        }
        else
        {
            DB::table('mpo_nationalizatios')->where('id', $id)->update($data);
        }
        
        return redirect()->route('mpo_nationalization.index')->with('message','MPO Nationalization List Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        mpoNationalizatio::find($id)->delete();
        return redirect()->route('mpo_nationalization.index') ->with('message','MPO Nationalization List Deleted Successfully');
    }

    public function retrive_mpo($id)
    {
        mpoNationalizatio::where('id',$id)->withTrashed()->restore();
        return redirect()->route('mpo_nationalization.index') ->with('message','MPO Nationalization List Retrive Successfully');
    } 
    public function delete_mpo($id){

        $pathImage=mpoNationalizatio::where('id',$id)->withTrashed()->select('image')->first();
        $path=public_path().'/admin/mpo_nationalization/'.$pathImage->image;
        // return $path;
        if(file_exists($path))
        {
            unlink($path);
        }

        mpoNationalizatio::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('mpo_nationalization.index') ->with('message','MPO Nationalization List Permanently Deleted Successfully');
    }
}
