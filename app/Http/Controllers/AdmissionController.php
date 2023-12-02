<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAdmission;
use App\Models\PreviousClassInfo;
use App\Models\class_info;
use App\Models\group_info;
use App\Models\subject_info;
use App\Models\student_information;
use App\Models\student_registration;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Brian2694\Toastr\Facades\Toastr;

class AdmissionController extends Controller
{
    public function AutoCode($table, $fildname, $prefix, $length)
    {
        $id_length = $length;
        $max_id = DB::table($table)->max($fildname);
        $prefix = $prefix;
        $prefix_length = strlen($prefix);
        $only_id = substr($max_id, $prefix_length);
        $new = (int)($only_id);
        $new++;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        $made_id = $prefix . $zero . $new;
        return $made_id;
    }
    public function getDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[2].'-'.$explode[1].'-'.$explode[0];

        return $date;
    }
    public function getOriginDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[2].'/'.$explode[1].'/'.$explode[0];

        return $date;
    }
    public function admission_form()
    {
        $class = class_info::all();
        return view('frontend.admission_form.create',compact('class'));
    }
    public function storeAdmissionForm(Request $request)
    {
        // dd($request->all());

        // return $request->date_of_birth;

        $data = array(
            'apply_date'=>$this->getDate('/',$request->apply_date),
            'student_name'=>$request->student_name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'religion'=>$request->religion,
            'date_of_birth'=>$request->date_of_birth,
            'gender'=>$request->gender,
            'blood_group'=>$request->blood_group,
        );

        $file = $request->file('image');

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/StudentImage/',$imageName);

            $data['image'] = $imageName;
        }

        $insert = StudentAdmission::create($data);

        if($insert)
        {
            return redirect('/editStudentData/step_2/'.$insert->id)->with('success','Your Information Is Stored. Fill Step By Step');
        }

    }

    public function editStudentData($step,$id)
    {
        $data = StudentAdmission::find($id);
        $class = DB::table('addclass')->where('status',1)->get();
        $group = DB::table('addgroup')->where('class_id',$data->class_id)->get();
        $apply_date = $this->getOriginDate('-',$data->apply_date);
        $date_of_birth = $this->getOriginDate('-',$data->date_of_birth);
        $classes =PreviousClassInfo::where('student_id',$id)->first();
        return view('frontend.admission_form.edit',compact('data','step','class','group','apply_date','date_of_birth','classes'));
    }

    public function getGroup(Request $request)
    {
        $group = DB::table('addgroup')->where('class_id',$request->class_id)->get();

        foreach($group as $g)
        {
            echo '<option value="'.$g->id.'">'.$g->group_name.'</option>';
        }

    }

    public function updateStep1(Request $request,$id)
    {
        // dd($request->all());
        $data = array(
            'apply_date'=>$this->getDate('/',$request->apply_date),
            'student_name'=>$request->student_name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'religion'=>$request->religion,
            'date_of_birth'=>$request->date_of_birth,
            'gender'=>$request->gender,
            'blood_group'=>$request->blood_group,
        );

        $file = $request->file('image');

        if($file)
        {
            $pathImage = StudentAdmission::find($id);

            $path = public_path().'StudentImage/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }
        }

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/StudentImage/',$imageName);

            $data['image'] = $imageName;
        }

        StudentAdmission::find($id)->update($data);



        return redirect('/editStudentData/step_2/'.$id)->with('success','Your Information Is Updated');
    }
    public function updateStep2(Request $request,$id)
    {
        // dd($request->all());
        $data = array(
            'class_id'=>$request->class_id,
            'group_id'=>$request->group_id,
            'year'=>$request->year,
        );

        if($request->class)
        {
            $data1 = array(
                'student_id'=>$id,
                'class'=>$request->class,
                'institute_name'=>$request->institute_name,
                'board_roll'=>$request->board_roll,
                'reg_no'=>$request->reg_no,
                'group'=>$request->group,
                'passing_year'=>$request->passing_year,
                'gpa'=>$request->gpa,
            );

            $file = $request->file('file');


            if($file)
            {
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
            }

            if($file)
            {
                $imageName = rand().'.'.$file->getClientOriginalExtension();

                $file->move(public_path().'/StudentPreviousFiles/',$imageName);

                $data1['files'] = $imageName;
            }

            $count = PreviousClassInfo::where('student_id',$id)->count();

            if($count > 0)
            {
                PreviousClassInfo::where('student_id',$id)->update($data1);
            }
            else{
                PreviousClassInfo::insert($data1);
            }
        }

        StudentAdmission::find($id)->update($data);

        return redirect('/editStudentData/step_3/'.$id)->with('success','Your Information Is Updated');
    }
    public function updateStep3(Request $request,$id)
    {
        // dd($request->all());
        $data = array(
            "present_house_name" => $request->present_house_name,
            "present_village" => $request->present_village,
            "present_po" => $request->present_po,
            "present_post_code" => $request->present_post_code,
            "present_upazila" =>$request->present_upazila,
            "present_district" =>$request->present_district,
            "permenant_house_name" =>$request->permenant_house_name,
            "permenant_village" =>$request->permenant_village,
            "permenant_po" => $request->permenant_po,
            "permenant_post_code" =>$request->permenant_post_code,
            "permenant_upazila" => $request->permenant_upazila,
            "permenant_district" =>$request->permenant_district,
        );

        StudentAdmission::find($id)->update($data);

        return redirect('/editStudentData/step_4/'.$id);
    }
    public function updateStep4(Request $request,$id)
    {
        // dd($request->all());
        $data = array(
            "guardian_name" =>$request->guardian_name,
            "relation" =>$request->relation,
            "guardian_contact" =>$request->guardian_contact,
            "guardian_email" =>$request->guardian_email,
        );

        StudentAdmission::find($id)->update($data);


        return redirect('/admission_form')->with('success','Your Information Is Stored');
    }

    public function getGroupClasswise($id)
    {
        $group = group_info::where('class_id',$id)->get();
        $output = '<option value="">-- Select Group --</option>';
        if($group)
        {
            foreach($group as $v)
            {
                $output.='<option value="'.$v->id.'">'.$v->group_name.'</option>';
            }
        }

        return $output;
    }

    public function getSubject($class_id,$group_id)
    {
        $subject = subject_info::where('class_id',$class_id)->where('group_id',$group_id)->get();

        return view('frontend.admission_form.get_subject',compact('subject'));
    }

    public function storeStudentInfo(Request $request)
    {
        // dd($request->all());
        $explode_session = explode('-',$request->session);

        $student_id = $this->AutoCode('student_informations','student_id',$explode_session[0],'8');

        // return $student_id;

        $data = array(
            'entry_date'=>date('Y-m-d'),
            'student_id'=>$student_id,
            "name" => $request->name,
            "father_name" => $request->father_name,
            "mother_name" => $request->mothers_name,
            "permenant_adress" => $request->permenant_adress,
            "present_adress" => $request->present_adress,
            "gender" =>$request->gender,
            "religion" => $request->religion,
            "blood_group" => $request->blood_group,
            "guardian_contact_no" =>$request->guardian_contact_no,
            "class_id" => $request->class_id,
            "group_id" => $request->group_id,
            "session" => $request->session,
        );

        $insert = student_information::create($data);

        if($insert)
        {
            for ($i=0; $i < count($request->subject_id) ; $i++)
            {
                student_registration::create([
                    'student_id'=>$student_id,
                    'class_id'=>$request->class_id,
                    'group_id'=>$request->group_id,
                    'subject_id'=>$request->subject_id[0],
                ]);
            }
        }

        return redirect()->back()->with('success','Your Information Stored');

    }
}
