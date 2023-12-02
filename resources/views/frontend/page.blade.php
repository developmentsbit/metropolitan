@extends('frontend.index')
@section('content')



<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-9 col-12">


     <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
       <ul class="list-group p-0">
        <li class="list-group-item font-weight-bold bg-success text-light" id="about">@if($lang == 'en'){{ $data->title ?: $data->title_bn}}@else {{$data->title_bn ?: $data->title}}@endif</li>
      </ul>
      <li class="list-group-item">
        <div style="font-size: 14px; line-height: 25px; text-align: justify;">

          <p>
           @if($lang == 'en'){!! $data->details ?: $data->details_bn !!}@elseif($lang == 'bn'){!! $data->details_bn ?: $data->details !!}@endif
         </p>

         @if($data->image)

         <div class='embed-responsive' style='padding-bottom:135%'>

          <object data="{{ asset($data->image) }}" type='application/pdf' width='100%' height='100%'></object>


        </div>
        @endif



      </div>


    </li>



  </div>
</div>



@include('frontend.sidebar')





</div>
</div>
</div>





@endsection
