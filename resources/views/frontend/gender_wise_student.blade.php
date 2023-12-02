@extends('frontend.index')
@section('content')

<style>
    table {
        width: 100%;
    }
    table tr td{
        padding : 3px !important;
        border: 1px solid black !important;
    }
</style>

<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-9 col-12">

      <ul class="list-group p-0">
       <li class="list-group-item">
        <span class="student">@lang('frontend.gender_wise_student_info') </span>
      </li>

      <li class="list-group-item">

        <div class="col-12">

            <table class="">
                @if($class)
                @foreach ($class as $c)

                @php
                $count_student = DB::connection('mysql_second')->table('running_student_info')->where('class_id',$c->id)->count();
                $total_student = 0;
                @endphp
                @if($count_student > 0)
                <tr>
                    <td style="text-align: center" class="table-success">{{$c->class_name}}</td>
                    <td style="padding: 0px !important;border-bottom:0px !important;">
                        <table style="border : none;">
                            <tr>
                                @if($group)
                                @foreach ($group as $g)
                                @if($c->id == $g->class_id)
                                <td class="table-success" style="border : 1px solid black;padding:0px !important;text-align:center;border-bottom:0px !important;">{{$g->group_name}}
                                    <table>
                                        <tr>
                                            <td class="table-info" style="border:1px solid black;border-bottom:0px;">@lang('frontend.male')</td>
                                            <td class="table-info" style="border:1px solid black;border-bottom:0px;">@lang('frontend.female')</td>
                                        </tr>
                                        <tr>
                                            @php
                                            $male_student = DB::connection('mysql_second')->table('running_student_info')->where('running_student_info.class_id',$c->id)->where('running_student_info.group_id',$g->id)
                                            ->join('student_personal_info','student_personal_info.id','running_student_info.student_id')
                                            ->where('student_personal_info.gender','Male')
                                            ->count();

                                            $female_student = DB::connection('mysql_second')->table('running_student_info')->where('running_student_info.class_id',$c->id)->where('running_student_info.group_id',$g->id)
                                            ->join('student_personal_info','student_personal_info.id','running_student_info.student_id')
                                            ->where('student_personal_info.gender','Female')
                                            ->count();

                                            $total_student = $total_student + $male_student + $female_student;

                                            @endphp
                                            <td class="bg-white" style="border:1px solid black;border-bottom:0px;">{{$male_student}}</td>
                                            <td class="bg-white" style="border:1px solid black;border-bottom:0px;">{{$female_student}}</td>
                                        </tr>
                                    </table>
                                </td>
                                @endif
                                @endforeach
                                @endif
                            </tr>
                        </table>
                    </td>
                    <td class="table-success" style="text-align: center">
                       @lang('frontend.total') {{$total_student}}
                    </td>
                </tr>
                @endif
                @endforeach
                @endif
            </table>

        </div>

    </li>
  </ul>
  <br>

</div>



  @include('frontend.sidebar')





</div>
</div>
</div>





@endsection
