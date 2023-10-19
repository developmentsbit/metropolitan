@extends('frontend.index')
@section('content')



<div class="container">
  <div class="col-sm-12 col-12" id="mainpage">


   <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
    <ul class="list-group p-0">
      <li class="list-group-item font-weight-bold bg-success text-light" id="about">@lang('frontend.teaching_permission_recognition')</li>
      <li class="list-group-item">

        <div class="table table-responsive">
          <table id="example" class="display table-bordered" style="width:100%">
            <thead>
              <tr style="font-size: 15px;">
                <th>#</th>
                <th>@lang('teaching_permission.subject')</th>
                <th>@lang('teaching_permission.part')</th>
                <th>@lang('teaching_permission.memorial_no')</th>
                <th>@lang('teaching_permission.date')</th>
                <th>@lang('frontend.download')</th>
              </tr>
            </thead>
            <tbody>


              @php
              $i = 1;
              @endphp
              @if(isset($data))
              @foreach($data as $d)

              <tr style="font-size: 12px;">
                <td>{{ $i++ }}</td>
                <td>@if($lang == 'en'){{$d->subject}}@elseif($lang == 'bn'){{$d->subject_bn}}@endif</td>
                <td>@if($lang == 'en'){{$d->part}}@elseif($lang == 'bn'){{$d->part_bn}}@endif</td>
                <td>{{ $d->memorial_no }}</td>
                <td>{{ $d->date }}</td>
                <td><a  href="{{ asset($d->image) }}" class="btn btn-sm btn-danger" download="{{ asset($d->image) }}" ><img src="{{ asset("/") }}frontend/img/pdf_icon.png" class="img-fluid"></a></td>
              </tr>


              @endforeach
              @endif



            </table>

          </div>

        </li>

      </ul>
    </div>
  </div>





</div>
</div>







@endsection