<?php

namespace App\Http\Controllers;

use App\Models\studentAttendanceInfo;
use Illuminate\Http\Request;
use DB;

class StudentAttendanceInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $data= studentAttendanceInfo::first();
        return view('admin.student_attendance_info.edit',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(studentAttendanceInfo $studentAttendanceInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(studentAttendanceInfo $studentAttendanceInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['title']      = $request->title;
        $data['title_bn']      = $request->title_bn;
        $data['details']    = $request->details;
        // $data['details_bn']    = $request->details_bn;
 
        $file              = $request->file('image');

        if($file){
            $old_image = DB::table("student_attendance_infos")->where('id',$id)->first();

            
            $path=public_path().'/admin/student_attendance_info/'.$old_image->image;
            // return $path;
            if(file_exists($path))
            {
                unlink($path);
            }
        }

        if($file)
        {  
            
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/admin/student_attendance_info',$imageName);
            $data['image']=$imageName;
            DB::table('student_attendance_infos')->where('id', $id)->update($data);
            
        }
        else
        {
            DB::table('student_attendance_infos')->where('id', $id)->update($data);
        }
        
        return redirect()->route('student_attendance_info.index')->with('message','student_attendance_info List Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(studentAttendanceInfo $studentAttendanceInfo)
    {
        //
    }
}
