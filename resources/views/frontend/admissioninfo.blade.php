@extends('frontend.index')
@section('content')







<div class="container">
  <div class="col-sm-12 col-12" id="mainpage">


    @if(count($data)>0)

    <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
      <ul class="list-group p-0">
        <li class="list-group-item font-weight-bold bg-success text-light" id="about">
         @if($data[0]->type == 1)
         @lang('frontend.prospectus')
         @elseif($data[0]->type == 2)
         @lang('frontend.admission_rules')
         @elseif($data[0]->type == 3)
         @lang('frontend.admission_procedure')
         @elseif($data[0]->type == 4)
         @lang('frontend.admission_test_result')
         @else
         @lang('frontend.admission_test_questions')
         @endif

       </li>
       <li class="list-group-item">

        <div class="table table-responsive">
          <table id="example" class="display table-bordered" style="width:100%">
            <thead>
              <tr style="font-size: 15px;">
                <th>@lang('frontend.sl')</th>
                <th>@lang('frontend.release_date')</th>
                <th>@lang('frontend.title')</th>
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
                <td>{{ date('d M Y', strtotime($d->date)); }}</td>
                <td>{{ $d->title }}</td>
                <td><a  href="{{ asset($d->image) }}" class="btn btn-sm btn-danger" download="" ><span uk-icon="icon: file-pdf; ratio: 1"></span></a></td>
              </tr>


              @endforeach
              @endif



            </table>

          </div>

        </li>

      </ul>


    </div>

    @else
     Not Found...

    @endif




</div>
</div>







@endsection