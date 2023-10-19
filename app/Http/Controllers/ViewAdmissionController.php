<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\StudentAdmission;
use App\Models\PreviousClassInfo;

class ViewAdmissionController extends Controller
{
    public function getOriginDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[2].'/'.$explode[1].'/'.$explode[0];

        return $date;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = DB::table('addclass')->where('status',1)->get();
        return view('admin.admission_info.index',compact('class'));
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
    public function show(string $id)
    {
        $data = StudentAdmission::leftjoin('addclass','addclass.id','student_admissions.class_id')
        ->leftjoin('addgroup','addgroup.id','student_admissions.group_id')
        ->where('student_admissions.id',$id)
        ->select('student_admissions.*','addclass.class_name','addgroup.group_name')
        ->first();

        $p_class = PreviousClassInfo::where('student_id',$id)->first();

        $date_of_birth = $this->getOriginDate('-',$data->date_of_birth);

        return view('admin.admission_info.show',compact('data','date_of_birth','p_class'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pathImage = StudentAdmission::find($id);

        $path = public_path().'StudentImage/'.$pathImage->image;

        if(file_exists($path))
        {
            unlink($path);
        }

        $count = PreviousClassInfo::where('student_id',$id)->count();
        if($count > 0)
        {
            $pathImage =PreviousClassInfo::where('student_id',$id)->first();
            $path = public_path().'/StudentPreviousFiles/'.$pathImage->files;
            if(file_exists($path))
            {
                unlink($path);
            }
        }

        PreviousClassInfo::where('student_id',$id)->delete();


        StudentAdmission::find($id)->delete();

        return redirect()->route('admission_info.index')->with('message','Admission Data Delete Successfully');
    }

    public function getStudentData(Request $request)
    {
        $data = StudentAdmission::leftjoin('addclass','addclass.id','student_admissions.class_id')
        ->leftjoin('addgroup','addgroup.id','student_admissions.group_id')
        ->where('student_admissions.class_id',$request->class_id)
        ->select('student_admissions.*','addclass.class_name','addgroup.group_name')
        ->get();
        $i = 1;

       return view('admin.admission_info.load_data',compact('data','i'));
    }
}
