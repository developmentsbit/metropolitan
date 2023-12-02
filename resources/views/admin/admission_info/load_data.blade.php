@if($data)
@foreach ($data as $v)
<tr>
    <td>{{$i++}}</td>
    <td>{{$v->apply_date}}</td>
    <td>{{$v->student_name}}</td>
    <td>{{$v->class_name}}</td>
    <td>{{$v->group_name}}</td>
    <td>
        <img src="{{asset('StudentImage')}}/{{$v->image}}" height="80px" width="80px">
    </td>
    <td>
        <a target="_blank" href="{{route('admission_info.show',$v->id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> @lang('frontend.view_data')</a>
        <a onclick="return confirm('Are You Sure ?')" target="" href="{{url('deleteAdmissionInfo')}}/{{$v->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> @lang('frontend.delete_data')</a>
    </td>
    </tr>
@endforeach
@endif
