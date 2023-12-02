@extends('frontend.index')
@section('content')

<style>
    table {
        width: 100%;
    }

</style>

<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-9 col-12">

      <ul class="list-group p-0">
       <li class="list-group-item">
        <span class="student">@lang('frontend.student_attendance')</span>
      </li>

      <li class="list-group-item">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <input type="date" class="form-control form-control-sm" name="search_from_date" id="search_from_date">
                </div>
                <div class="col-lg-4 col-12">
                    <button class="btn btn-sm btn-info" id="getDatewiseAttData" onclick="return loadajaxdateattdata()">@lang('frontend.search')</button>
                </div>
            </div>
        </div>
        <br>
        <div class="col-12">
            <table class="table table-borderd">
                <tr>
                    <th>@lang('frontend.class')</th>
                    <th>@lang('frontend.total_student')</th>
                    <th class="table-success">@lang('frontend.present')</th>
                    <th class="table-danger">@lang('frontend.absent')</th>
                </tr>
                <tbody id="showData">
                @if($class)
                @foreach ($class as $c)
                <tr>
                    <td><a href="/ems/studentsportal/dailyAttendanceSheet.php">{{$c->class_name}}</a></td>
                    <td>
                        @php
                        $total_student = DB::connection('mysql_second')->table('running_student_info')->where('class_id',$c->id)->count();
                        @endphp
                        {{$total_student}}
                    </td>
                    <td class="table-success">
                        @php
                        $total_present = DB::connection('mysql_second')->table('attendance')->where('class_id',$c->id)->where('attendance',1)->where('attend_date',date('Y-m-d'))->count();
                        @endphp
                        {{$total_present}}
                    </td>
                    <td class="table-danger">{{$total_student - $total_present}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
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


<script>
    function loadajaxdateattdata()
    {
        var from_date = $('#search_from_date').val();

        // alert(from_date);

        if(from_date != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{url('getDateAttData')}}',

                type : 'POST',

                data : {from_date},

                success : function(data)
                {
                    $('#showData').html(data);
                }
            });
        }
    }
</script>


@endsection
