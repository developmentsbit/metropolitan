@extends('frontend.index')
@section('content')




<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-9 col-12">


     <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
       <ul class="list-group p-0">
        <li class="list-group-item font-weight-bold bg-success text-light" id="about">@if($lang == 'en'){{$data->title ?: $data->title_bn}}@else {{$data->title_bn ?: $data->title}}@endif</li>
      </ul>
      <li class="list-group-item">
        <div class="text-center mt-2">
            <img src="{{asset('co_curriculum')}}/{{$data->image}}" alt="" style="height: 150px;" class="img-fluid">
        </div>
     </li>
      <li class="list-group-item">
        <span>
            @if($lang == 'en')
            {{$data->description ?: $data->description_bn}}
            @else {{$data->description_bn ?: $data->description}}
            @endif
        </span>
     </li>



   </div>
 </div>




 @include('frontend.sidebar')






</div>
</div>
</div>



@endsection
