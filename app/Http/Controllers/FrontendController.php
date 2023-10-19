<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\teaching_permission;
use App\Models\mpoNationalizatio;
use App\Models\gender_wise;
use App\Models\section_wise;
use PDF;
use App;

class FrontendController extends Controller
{
	public function index()
	{

        // return ;

		$notice = DB::table("notices")->where("type",1)->limit(6)->orderby('id','DESC')->get();
		return view('frontend.home',compact('notice'));

	}

	public function teacher_permission()
	{
		$data = teaching_permission::get();
		return view('frontend.teacher_permission',compact('data'));
	}

	public function mpo_nationalizations()
	{
		$data = mpoNationalizatio::get();
		return view('frontend.mpo_nationalizations',compact('data'));
	}

	public function principle_message()
	{
		$data = DB::table("principles")->where('type',1)->first();
		return view('frontend.principle_message',compact('data'));
	}
	public function vice_principal_message()
	{
		$data = DB::table("vice_principal_messages")->first();
		return view('frontend.vice_principal_message',compact('data'));
	}

	public function presidentmessage()
	{
		$data = DB::table("principles")->where('type',2)->first();
		return view('frontend.principle_message',compact('data'));
	}


	public function managing_comitte(){
		$data = DB::table("members")->where('status',1)->where('type',3)->get();
		return view('frontend.members',compact('data'));

	}

	public function presidents(){
		$data = DB::table("members")->where('status',1)->where('type',2)->get();
		return view('frontend.members',compact('data'));

	}


	public function principles(){
		$data = DB::table("members")->where('status',1)->where('type',1)->get();
		return view('frontend.members',compact('data'));

	}


	public function donar(){
		$data = DB::table("members")->where('status',1)->where('type',4)->get();
		return view('frontend.members',compact('data'));

	}

	public function ex_member(){
		$data = DB::table("members")->where('status',1)->where('type',5)->get();
		return view('frontend.members',compact('data'));

	}


	public function memberdetails($id){
		$data = DB::table("members")->where('id',$id)->first();
		return view('frontend.memberdetails',compact('data'));

	}



	public function teacherinfo(){
		$data = DB::table("teacherstaff")
        ->where('type',1)
        ->orderby('sl','ASC')
        ->get();
		return view('frontend.teacherinfo',compact('data'));

	}

	public function Teacher_infos($id)
	{
	    $teacherview = DB::table('teacherstaff')
		->where('type',1)
		->where('status',1)
		->where('department_id',$id)
        ->orderby('sl','ASC')
		->simplePaginate(12);

		$data = DB::table("department")->where('id',$id)->get();

		return view('frontend.department_teacher',compact('teacherview','data'));

	}

	public function staffinfo(){
		$data = DB::table("teacherstaff")
        ->where('type',2)
        ->orderby('sl','ASC')
        ->get();
		return view('frontend.staffinfo',compact('data'));

	}



	public function teacherstaffdetails($id){
		$data = DB::table("teacherstaff")
        ->where('id',$id)
        ->orderby('sl','ASC')
        ->first();
		return view('frontend.teacherstaffdetails',compact('data'));

	}



	public function admissionInfo($id)
	{
		$data = DB::table("admissioninfo")->where('id',$id)->orderBy('id','DESC')->get();
		return view('frontend.admissioninfo',compact('data'));
	}


	public function examroutine()
	{
		$data = DB::table("examroutine")
		->orderBy('examroutine.id','DESC')
		->join('addclass','addclass.id','examroutine.class_id')
		->select('examroutine.*','addclass.class_name')
		->get();
		return view('frontend.examroutine',compact('data'));
	}




	public function examsyllabus()
	{
		$data = DB::table("syllabus")
		->orderBy('syllabus.id','DESC')
		->join('addclass','addclass.id','syllabus.class_id')
		->select('syllabus.*','addclass.class_name')
		->get();
		return view('frontend.examsyllabus',compact('data'));
	}


	public function examsuggession()
	{
		$data = DB::table("suggestion")
		->orderBy('suggestion.id','DESC')
		->join('addclass','addclass.id','suggestion.class_id')
		->select('suggestion.*','addclass.class_name')
		->get();
		return view('frontend.examsuggession',compact('data'));
	}


	public function academiccalenders()
	{
		$data = DB::table("academiccalender")
		->orderBy('academiccalender.id','DESC')
		->get();
		return view('frontend.academiccalenders',compact('data'));
	}


	public function classroutines()
	{
		$data = DB::table("classroutine")
		->orderBy('classroutine.id','DESC')
		->join('addclass','addclass.id','classroutine.class_id')
		->select('classroutine.*','addclass.class_name')
		->get();
		return view('frontend.classroutines',compact('data'));
	}


	public function holidaylist()
	{
		$data = DB::table("holidaylist")
		->orderBy('holidaylist.id','DESC')
		->get();
		return view('frontend.holidaylist',compact('data'));
	}









	public function allnotices()
	{
		$data = DB::table("notices")->where('type',1)->orderBy('id','DESC')->get();
		return view('frontend.allnotices',compact('data'));
	}


	public function events()
	{
		$data = DB::table("notices")->where('type',2)->orderBy('id','DESC')->get();
		return view('frontend.events',compact('data'));
	}



	public function notices($id)
	{
		$data = DB::table("notices")->where('type',1)->where('id',$id)->first();
		return view('frontend.notices',compact('data'));
	}



	public function photogallery()
	{
		$data = DB::table("photogallerys")->orderBy('id','DESC')->get();
		return view('frontend.photogallery',compact('data'));
	}


	public function videogallery()
	{
		$data = DB::table("videogallerys")->orderBy('id','DESC')->get();
		return view('frontend.videogallery',compact('data'));
	}


	public function agreements()
	{
		$data = DB::table("industrylinkages")->orderBy('id','DESC')->where('type',1)->get();
		return view('frontend.agreements',compact('data'));
	}


	public function industrialattachment()
	{
		$data = DB::table("industrylinkages")->orderBy('id','DESC')->where('type',2)->get();
		return view('frontend.industrialattachment',compact('data'));
	}


	public function industriesvisit()
	{
		$data = DB::table("industrylinkages")->orderBy('id','DESC')->where('type',3)->get();
		return view('frontend.industriesvisit',compact('data'));
	}


	public function nearindustries()
	{
		$data = DB::table("industrylinkages")->orderBy('id','DESC')->where('type',3)->get();
		return view('frontend.nearindustries',compact('data'));
	}


	public function internalresult($id)
	{
		$data = DB::table("result")
		->orderBy('result.id','DESC')
		->where('result.department_id',$id)
		->join('semesters','semesters.id','result.semester_id')
		->join('departments','departments.id','result.department_id')
		->select('result.*','semesters.semester_name_bn','departments.department_name_bn')
		->get();
		return view('frontend.internalresult',compact('data'));
	}



	public function class_routine($id)
	{
		$data = DB::table("classroutine")
		->orderBy('classroutine.id','DESC')
		->where('classroutine.department_id',$id)
		->join('semesters','semesters.id','classroutine.semester_id')
		->join('departments','departments.id','classroutine.department_id')
		->select('classroutine.*','semesters.semester_name_bn','departments.department_name_bn')
		->get();
		return view('frontend.class_routine',compact('data'));
	}


	public function syllabus($id)
	{
		$data = DB::table("syllabus")
		->orderBy('syllabus.id','DESC')
		->where('syllabus.department_id',$id)
		->join('semesters','semesters.id','syllabus.semester_id')
		->join('departments','departments.id','syllabus.department_id')
		->select('syllabus.*','semesters.semester_name_bn','departments.department_name_bn')
		->get();
		return view('frontend.syllabus',compact('data'));
	}



	public function semesterplan($id)
	{
		$data = DB::table("semesterplan")
		->orderBy('semesterplan.id','DESC')
		->where('semesterplan.department_id',$id)
		->join('semesters','semesters.id','semesterplan.semester_id')
		->join('departments','departments.id','semesterplan.department_id')
		->select('semesterplan.*','semesters.semester_name_bn','departments.department_name_bn')
		->get();
		return view('frontend.semesterplan',compact('data'));
	}


	public function probidhan()
	{
		$data = DB::table("probidhan")->orderBy('id','DESC')->get();
		return view('frontend.probidhan',compact('data'));
	}



	public function aboutdepartment($id)
	{
		$data = DB::table("aboutdepartments")
		->where('aboutdepartments.department_id',$id)
		->join('departments','departments.id','aboutdepartments.department_id')
		->select('aboutdepartments.*','departments.department_name_bn')
		->first();
		return view('frontend.aboutdepartment',compact('data'));
	}


	public function departmentteacher($id)
	{
		$data = DB::table("teacherstaff")
		->where('teacherstaff.department_id',$id)
		->where('teacherstaff.type',2)
		->join('departments','departments.id','teacherstaff.department_id')
		->select('teacherstaff.*','departments.department_name_bn')
		->get();
		return view('frontend.departmentteacher',compact('data'));
	}


	public function departmentteacherdetails($id)
	{
		$data = DB::table("teacherstaff")
		->where('teacherstaff.id',$id)
		->join('departments','departments.id','teacherstaff.department_id')
		->select('teacherstaff.*','departments.department_name_bn')
		->first();
		return view('frontend.departmentteacherdetails',compact('data'));
	}





	public function departmentemployee($id)
	{
		$data = DB::table("teacherstaff")
		->where('teacherstaff.department_id',$id)
		->where('teacherstaff.type',3)
		->join('departments','departments.id','teacherstaff.department_id')
		->select('teacherstaff.*','departments.department_name_bn')
		->get();
		return view('frontend.departmentemployee',compact('data'));
	}


	public function departmentemployeedetails($id)
	{
		$data = DB::table("teacherstaff")
		->where('teacherstaff.id',$id)
		->join('departments','departments.id','teacherstaff.department_id')
		->select('teacherstaff.*','departments.department_name_bn')
		->first();
		return view('frontend.departmentemployeedetails',compact('data'));
	}



	public function departmenthead($id)
	{
		$data = DB::table("teacherstaff")
		->where('teacherstaff.department_id',$id)
		->orderBy('teacherstaff.id','DESC')
		->where('teacherstaff.type',1)
		->join('departments','departments.id','teacherstaff.department_id')
		->select('teacherstaff.*','departments.department_name_bn')
		->first();

		return view('frontend.departmenthead',compact('data'));
	}



	public function page($id){

		$data = DB::table("pages")->where('id',$id)->first();
		return view('frontend.page',compact('data'));
	}



	public function principledetails()
	{
		$data = DB::table("teacherstaff")
		->where('teacherstaff.type',4)
		->orderBy('id','DESC')
		->first();
		return view('frontend.principledetails',compact('data'));
	}


	public function viceprincipledetails()
	{
		$data = DB::table("teacherstaff")
		->where('teacherstaff.type',5)
		->orderBy('id','DESC')
		->first();
		return view('frontend.viceprincipledetails',compact('data'));
	}


	public function previousprinciples()
	{
		$data = DB::table("teacherstaff")
		->where('teacherstaff.type',6)
		->orderBy('id','DESC')
		->get();
		return view('frontend.previousprinciples',compact('data'));
	}


	public function prevprincipledetails($id)
	{
		$data = DB::table("teacherstaff")
		->where('teacherstaff.id',$id)
		->first();
		return view('frontend.prevprincipledetails',compact('data'));
	}

    public function gender_wise_student_list()
    {
        // return 1;

        $class = DB::connection('mysql_second')->table('add_class')->get();
        $group = DB::connection('mysql_second')->table('add_group')->get();
        return view('frontend.gender_wise_student',compact('class','group'));
    }
    public function section_wise_student_list()
    {
        // return 1;

        $class = DB::connection('mysql_second')->table('add_class')->get();
        $group = DB::connection('mysql_second')->table('add_group')->get();
        $section = DB::connection('mysql_second')->table('add_section')->get();
        return view('frontend.section_wise_student',compact('class','section','group'));
    }
	public function student_attendance()
    {
        // return 1;

        // $data = DB::table("student_attendance_infos")->first();
        $class = DB::connection('mysql_second')->table('add_class')->get();
        return view('frontend.student_attendance',compact('class'));
    }

	public function gender_wise_students()
    {
        $data= gender_wise::get();

        return view('frontend.gender_wise_students',compact('data'));
    }

	public function section_wise_students()
    {
        $data= section_wise::get();

        return view('frontend.section_wise_students',compact('data'));
    }

    public function classWiseStudent($id)
    {
        $data = DB::table('class_wise_student_infos')
        ->where('class_wise_student_infos.class_id',$id)->first();
        return view('frontend.class_wise_student',compact('data'));
    }

    public function class_student_info($id)
    {
        // $class = DB::
        $student = DB::connection('mysql_second')->table('running_student_info')->where('running_student_info.class_id',$id)
                ->leftjoin('student_personal_info','student_personal_info.id','running_student_info.student_id')
                ->leftjoin('student_guardian_information','student_guardian_information.id','running_student_info.student_id')
                ->leftjoin('add_group','add_group.id','running_student_info.group_id')
                ->select('running_student_info.*','student_personal_info.student_name','student_personal_info.father_name','student_personal_info.mother_name','student_personal_info.gender','student_personal_info.contact_no','student_personal_info.religious','add_group.group_name')
                ->paginate('50');
        $class = DB::connection('mysql_second')->table('add_class')->where('id',$id)->first();
        return view('frontend.class_student_info',compact('student','class'));
    }

    public function loadSearchStudent(Request $r)
    {
        $class_id = $r->class_id;
        $search_data = $r->search_data;
        // return $search_data;x
        $student = DB::connection('mysql_second')->table('running_student_info')
                ->where('running_student_info.class_id',$class_id)
                ->leftjoin('student_personal_info','student_personal_info.id','running_student_info.student_id')
                ->leftjoin('student_guardian_information','student_guardian_information.id','running_student_info.student_id')
                ->leftjoin('add_group','add_group.id','running_student_info.group_id')
                ->where('student_personal_info.student_name','LIKE','%'.$r->search_data.'%')
                ->orWhere('student_personal_info.contact_no','LIKE','%'.$r->search_data.'%')
                ->orWhere('running_student_info.class_roll','LIKE','%'.$r->search_data.'%')
                ->orWhere('running_student_info.student_id','LIKE','%'.$r->search_data.'%')
                ->select('running_student_info.*','student_personal_info.student_name','student_personal_info.father_name','student_personal_info.mother_name','student_personal_info.gender','student_personal_info.contact_no','student_personal_info.religious','add_group.group_name')
                ->get();
        $i = 1;
        return view('frontend.load_search_data',compact('student','i'));
    }

    public function view_student_details($student_id)
    {
        $running_info = DB::connection('mysql_second')->table('running_student_info')
        ->join('add_class','add_class.id','running_student_info.class_id')
        ->leftjoin('add_group','add_group.id','running_student_info.group_id')
        ->where('running_student_info.student_id',$student_id)
        ->select('running_student_info.*','add_class.class_name','add_group.group_name')
        ->first();

        $personal_info = DB::connection('mysql_second')->table('student_personal_info')->where('id',$student_id)->first();

        $guardian_info = DB::connection('mysql_second')->table('student_guardian_information')->where('id',$student_id)->first();

        $academic_information = DB::connection('mysql_second')->table('student_acadamic_information')->where('id',$student_id)->first();

        $adress_information = DB::connection('mysql_second')->table('student_address_info')->where('id',$student_id)->first();

        $data = [
            'running_info'=>$running_info,
            'personal_info'=>$personal_info,
            'guardian_info'=>$guardian_info,
            'academic_information'=>$academic_information,
            'adress_information'=>$adress_information,
        ];

        $subject = DB::connection('mysql_second')->table('subject_registration_table')
        ->join('add_subject_info','add_subject_info.id','subject_registration_table.subject_id')
        ->where('subject_registration_table.std_id',$student_id)
        ->where('subject_registration_table.class_id',$data['running_info']->class_id)
        ->select('subject_registration_table.*','add_subject_info.subject_name','add_subject_info.subject_code','add_subject_info.select_subject_type')
        ->get();

        $setting = DB::table('setting')->first();
        // // $pdf = PDF::loadView('frontend.view_student_details',compact('data','setting','subject'));
        // // return $pdf->download('test.pdf');

        $pdf = PDF::loadView('frontend.view_student_details',compact('data','setting','subject'));
        return $pdf->stream($data['personal_info']->student_name.'.pdf');


        // return view('frontend.view_student_details',compact('data','setting','subject'));


    }

    public function getDateAttData(Request $request)
    {
        $class = DB::connection('mysql_second')->table('add_class')->get();
        $from_date = $request->from_date;
        return view('frontend.load_date_wise_att_data',compact('class','from_date'));
    }


}
