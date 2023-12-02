@if($class)
@foreach ($class as $c)
<tr>
    <td>{{$c->class_name}}</td>
    <td>
        @php
        $total_student = DB::connection('mysql_second')->table('running_student_info')->where('class_id',$c->id)
        ->count();
        @endphp
        {{$total_student}}
    </td>
    <td class="table-success">
        @php
        $total_present = DB::connection('mysql_second')->table('attendance')->where('class_id',$c->id)->where('attendance',1)
        ->where('attend_date',$from_date)
        ->count();
        @endphp
        {{$total_present}}
    </td>
    <td class="table-danger">{{$total_student - $total_present}}</td>
</tr>
@endforeach
@endif
