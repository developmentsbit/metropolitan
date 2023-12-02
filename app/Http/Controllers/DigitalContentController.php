<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\digital_content;
use App\Models\add_subject;
use App\Models\class_info;
use App\Models\group_info;

class DigitalContentController extends Controller
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = digital_content::leftjoin("addclass",'addclass.id','digital_contents.class_id')
        ->leftjoin("addgroup",'addgroup.id','digital_contents.group_id')
        ->leftjoin("add_subjects",'add_subjects.id','digital_contents.subject_id')
        ->select("digital_contents.*",'addclass.class_name','addgroup.group_name','add_subjects.subject_name_bn','addclass.class_name_bn','addgroup.group_name_bn','add_subjects.subject_name_en')
        ->get();
        return view('admin.digital_content.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = class_info::all();
        $group = group_info::all();
        $subject = add_subject::all();

        return view('admin.digital_content.create',compact('class','group','subject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $this->getDate('/',$request->date);

        $data = array(
            'date'=>$date,
            'class_id'=>$request->class_id,
            'subject_id'=>$request->subject_id,
            'title'=>$request->title,
            'title_bn'=>$request->title_bn,
            'teacher_name'=>$request->teacher_name,
            'teacher_name_bn'=>$request->teacher_name_bn,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
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

        $file = $request->file('file');

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/files/digital_content/',$imageName);

            $data['file'] = $imageName;

        }
        // dd($data);

        $insert = digital_content::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('digital_content.index'));
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
        $data = digital_content::find($id);
        $class = class_info::all();
        $group = group_info::all();
        $subject = add_subject::all();

        $explode = explode('-',$data->date);

        $date = $explode['1'].'/'.$explode['2'].'/'.$explode[0];

        return view('admin.digital_content.edit',compact('date','data','class','group','subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $date = $this->getDate('/',$request->date);

        $update = digital_content::find($id)->update([
            'date'=>$date,
            'class_id'=>$request->class_id,
            'subject_id'=>$request->subject_id,
            'title'=>$request->title,
            'title_bn'=>$request->title_bn,
            'teacher_name'=>$request->teacher_name,
            'teacher_name_bn'=>$request->teacher_name_bn,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
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

        $file = $request->file('file');

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/files/digital_content/',$imageName);

            $data['file'] = $imageName;

        }
        

        digital_content::where('id',$id)->update($data);

        if($update)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('digital_content.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('digital_content.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        digital_content::find($id)->delete();

        Toastr::error('Data Delete Success', 'success');
        return redirect(route('digital_content.index'));
    }

    public function loadClassSubject(Request $request)
    {
        $data = '';
        $data = add_subject::where('class_id',$request->class_id)->where('status',1)->get();
        
        $output = '';
        foreach($data as $v)
        {
            $output .= '<option value="'.$v->id.'">'.$v->subject_name_en.'</option>';
        }

        return $output;
    }
    public function getGroupSubject(Request $request)
    {
        $data = '';
        $data = add_subject::where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('status',1)->get();
        
        $output = '';
        foreach($data as $v)
        {
            $output .= '<option value="'.$v->id.'">'.$v->subject_name_en.'</option>';
        }

        return $output;
    }
}
