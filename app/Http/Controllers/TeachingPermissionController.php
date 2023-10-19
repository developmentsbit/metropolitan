<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teaching_permission;

class TeachingPermissionController extends Controller
{
    public function getDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[2].'-'.$explode[0].'-'.$explode[1];

        return $date;
    }

    public function getOriginalDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[1].'-'.$explode[2].'-'.$explode[0];

        return $date;
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = teaching_permission::all();
        $sl=1;
        return view('admin.teaching_permission.index',compact('data','sl'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teaching_permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $this->getDate('/',$request->date);

        $data = array(
            'date'=>$date,
            'subject'=>$request->subject,
            'subject_bn'=>$request->subject_bn,
            'part'=>$request->part,
            'part_bn'=>$request->part_bn,
            'memorial_no'=>$request->memorial_no,
        );

        $file = $request->file('image');

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/admin/teaching_permission/',$imageName);

            $data['image'] = $imageName;

        }

        $insert = teaching_permission::create($data);

        if($insert)
        {
            return redirect()->route('teaching_permission.index')->with('message','Teaching Permission Added Successfully');
        }
        else
        {
            return redirect()->route('teaching_permission.index')->with('error','Teaching Permission Added Unsuccessfully');
        }
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
        $data = teaching_permission::find($id);

        $explode = explode('-',$data->date);

        $date = $explode['1'].'/'.$explode['2'].'/'.$explode[0];

        return view('admin.teaching_permission.edit',compact('data','date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = $request->file('image');

        if($file)
        {
            $pathImage = teaching_permission::find($id);

            $path = public_path().'/admin/teaching_permission/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }

        }

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/admin/teaching_permission',$imageName);

            teaching_permission::where('id',$id)->update(['image'=>$imageName]);

        }

        $date = $this->getDate('/',$request->date);

        $update = teaching_permission::find($id)->update([
            'date'=>$date,
            'subject'=>$request->subject,
            'subject_bn'=>$request->subject_bn,
            'part'=>$request->part,
            'part_bn'=>$request->part_bn,
            'memorial_no'=>$request->memorial_no,
        ]);

        if($update)
        {
            return redirect()->route('teaching_permission.index')->with('message','Teaching Permission Update Successfully');
        }
        else
        {
            return redirect()->route('teaching_permission.index')->with('error','Teaching Permission Update Unsuccessfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        teaching_permission::find($id)->delete();

        return redirect()->route('teaching_permission.index')->with('error','Teaching Permission Deleted Successfully');
    }

    public function retrive_teachingpermission($id){
        teaching_permission::where('id',$id)->withTrashed()->restore();

        return redirect()->route('teaching_permission.index')->with('message','Teaching Permission Restore Successfully');
    }

    public function teachingpermissionDelete($id)
    {
        $pathImage=teaching_permission::where('id',$id)->withTrashed()->select('image')->first();

        $path=public_path().'/admin/teaching_permission/'.$pathImage->image;
        // return $path;
        if(file_exists($path))
        {
            unlink($path);
        }

        teaching_permission::where('id',$id)->withTrashed()->forceDelete();

        return redirect()->route('teaching_permission.index')->with('error','Teaching Permission Permanently Deleted');
    }
}
