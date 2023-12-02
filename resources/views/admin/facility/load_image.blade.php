@if($data)
@foreach ($data as $v)
    <tr>
        <td>
            <input type="text" name="image_title" onchange="return imagetitleUpdate({{$v->id}})" value="{{$v->image_title}}" class="form-control form-control form-control-sm" id="image_title{{$v->id}}"></td>
        <td>
            <img src="{{asset('facility_image')}}/{{$v->image_name}}" alt="" style="height: 60px;">
        </td>
        <td>
            <a class="btn btn-sm btn-danger" id="imageDelete" onclick="return deleteImage({{$v->id}})"><i class="fa fa-trash-alt"></i></a>
        </td>
    </tr>
@endforeach
@endif


@push('footer_scripts')
    
@endpush