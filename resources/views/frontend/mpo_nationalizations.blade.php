@extends('frontend.index')
@section('content')



<div class="container">
  <div class="col-sm-12 col-12" id="mainpage">


   <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
    <ul class="list-group p-0">
      <li class="list-group-item font-weight-bold bg-success text-light" id="about">@lang('mpo_nationalization.title')</li>
      <li class="list-group-item">

        <div class="table table-responsive">
          <table id="example" class="display table-bordered" style="width:100%">
            <thead>
              <tr style="font-size: 15px;">
                <th>#</th>
                <th>@lang('mpo_nationalization.subject')</th>
                <th>@lang('mpo_nationalization.layer')</th>
                <th>@lang('mpo_nationalization.memorial')</th>
                <th>@lang('common.date')</th>
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
                <td>@if($lang == 'en'){{$d->layer}}@elseif($lang == 'bn'){{$d->layer_bn}}@endif</td>
                <td>{{ $d->memorial_no }}</td>
                <td>{{ $d->date }}</td>
                <td><a  href="{{ asset($d->image) }}" class="btn btn-sm btn-danger" download="" ><img src="{{ asset("/") }}frontend/img/pdf_icon.png" class="img-fluid"></a></td>
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