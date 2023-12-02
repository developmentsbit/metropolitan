@if($student)
@foreach($student as $s)
<tr>
    <td>{{$i++}}</td>
    <td>
        @php
        $path = base_path().'/ems/others_img/'.$s->student_id.'.jpg';
        @endphp
        @if(file_exists($path))
        <img src="{{base_path().'/ems/others_img'}}/{{$s->student_id.'.jpg'}}" alt="" style="height: 60px;width:60px;">
        @else
        <img src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=" alt="" style="height:60px;width:60px;">
        @endif
    </td>
    <td>
        {{$s->student_id}}
    </td>
    <td>
        {{$s->class_roll}}
    </td>
    <td>
        {{$s->group_name}}
    </td>
    <td>{{$s->student_name}}</td>
    <td>{{$s->father_name}}</td>
    <td>{{$s->mother_name}}</td>
    <td>{{$s->contact_no}}</td>
    <td>{{$s->gender}}</td>
    <td>{{$s->religious}}</td>
    <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-eye"></i></a></td>
</tr>
@endforeach
@endif
