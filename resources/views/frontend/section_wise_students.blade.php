@extends('frontend.index')
@section('content')



<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-9 col-12">


     <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
        @if($data)
        @foreach($data as $v)
       <ul class="list-group p-0">
        <li class="list-group-item font-weight-bold bg-success text-light" id="about">@if($lang == 'en'){{$v->title}}@elseif($lang == 'bn'){{$v->title_bn}}@endif</li>
      </ul>
      <li class="list-group-item">
        <div style="font-size: 14px; line-height: 25px; text-align: justify;">

          <p>
           {!! $v->details !!}
         </p>


         <div class='embed-responsive' style='padding-bottom:135%'>

          <object data="{{ asset($v->image) }}" type='application/pdf' width='100%' height='100%'></object>


        </div>




      </div>


    </li>
    @endforeach
    @endif



  </div>
</div>



@include('frontend.sidebar')





</div>
</div>
</div>





@endsection
