<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\add_subject;
use App\Models\class_info;
use App\Models\group_info;

class AddSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = add_subject::leftjoin("addclass",'addclass.id','add_subjects.class_id')
        ->leftjoin("addgroup",'addgroup.id','add_subjects.group_id')
        ->select("add_subjects.*",'addclass.class_name','addgroup.group_name','addclass.class_name_bn','addgroup.group_name_bn')
        ->get();
        return view('admin.add_subject.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = class_info::all();
        $group = group_info::all();

        return view('admin.add_subject.create',compact('class','group'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = array(
            'class_id'=>$request->class_id,
            'subject_name_en'=>$request->subject_name_en,
            'subject_name_bn'=>$request->subject_name_bn,
            'subject_code'=>$request->subject_code,
            'subject_serial_no'=>$request->subject_serial_no,
            'subject_type'=>$request->subject_type,
            'status'=>$request->status,
        );

        if($request->group_id)
        {
            $data['group_id'] = $request->group_id;
        }
        else
        {
            $data['group_id'] = NULL;
        }

        // dd($data);
        $insert = add_subject::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('add_subject.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('add_subject.index'));
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
        $data = add_subject::find($id);
        $class = class_info::all();
        $group = group_info::all();

        return view('admin.add_subject.edit',compact('data','class','group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = add_subject::find($id)->update([
            'class_id'=>$request->class_id,
            'subject_name_en'=>$request->subject_name_en,
            'subject_name_bn'=>$request->subject_name_bn,
            'subject_code'=>$request->subject_code,
            'subject_serial_no'=>$request->subject_serial_no,
            'subject_type'=>$request->subject_type,
            'status'=>$request->status,
        ]);

        if($request->group_id)
        {
            $data['group_id'] = $request->group_id;
        }
        else
        {
            $data['group_id'] = NULL;
        }

        add_subject::where('id',$id)->update($data);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('add_subject.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Update Error');
            return redirect(route('add_subject.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        add_subject::find($id)->delete();

        Toastr::error('Data Delete Success', 'success');
        return redirect(route('add_subject.index'));
    }
}
