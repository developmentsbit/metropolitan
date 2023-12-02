<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\class_wise_student_info;
use DB;

class ClassWiseStudentinfo extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = class_wise_student_info::leftjoin('addclass','addclass.id','class_wise_student_infos.class_id')
        ->select('class_wise_student_infos.*','addclass.class_name','addclass.class_name_bn')->get();
        return view('admin.class_wise_student.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = DB::table('addclass')->get();
        return view('admin.class_wise_student.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = array(
            'class_id'=>$request->class_id,
            'description'=>$request->details,
            'image'=>'0',
        );

        $image = $request->file('image');

        if($image)
        {
            $imageName = rand().'.'.$image->getClientOriginalExtension();

            $upload_path = '/class_wise_student_image/'.$imageName;

            $image->move(public_path().'/class_wise_student_image/',$imageName);

            $data['image'] = $upload_path;
        }

        class_wise_student_info::create($data);


        return redirect()->route('class_wise_student.index')->with('message','Data Added Successfully');
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
        $class = DB::table('addclass')->get();
        $data = class_wise_student_info::find($id);
        return view('admin.class_wise_student.edit',compact('data','class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array(
            'class_id'=>$request->class_id,
            'description'=>$request->details,
            'image'=>'0',
        );

        $image = $request->file('image');

        if($image)
        {
            $data = class_wise_student_info::find($id);
            $path = public_path().'/'.$data->image;
            if(file_exists($path))
            {
                unlink($path);
            }
        }

        if($image)
        {
            $imageName = rand().'.'.$image->getClientOriginalExtension();

            $upload_path = '/class_wise_student_image/'.$imageName;

            $image->move(public_path().'/class_wise_student_image/',$imageName);

            $data['image'] = $upload_path;
        }

        class_wise_student_info::where('id',$id)->update($data);


        return redirect()->route('class_wise_student.index')->with('message','Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = class_wise_student_info::find($id);
        $path = public_path().'/'.$data->image;
        if(file_exists($path))
        {
            unlink($path);
        }

        class_wise_student_info::where('id',$id)->delete();


        return redirect()->route('class_wise_student.index')->with('message','Data Delete Successfully');
    }
}
