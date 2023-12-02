@extends('frontend.index')
@section('content')



<div class="container">
  <div class="col-sm-12 col-12" id="mainpage">


   <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
    <ul class="list-group p-0">
        @php
        $class = DB::table('addclass')->where('id',$data->class_id)->first();
        @endphp
      <li class="list-group-item font-weight-bold bg-success text-light" id="about">@if($lang == 'en'){{$class->class_name}}@else{{$class->class_name_bn}}@endif</li>
      <li class="list-group-item">
        <p>
            {!! $data->description !!}
          </p>

          <div class='embed-responsive' style='padding-bottom:150%'>


            <object data="{{ asset($data->image) }}" type='application/pdf' width='100%' height='100%'></object>


          </div>


        </li>

      </ul>
    </div>
  </div>





</div>
</div>







@endsection
