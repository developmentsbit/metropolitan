@extends('frontend.index')
@section('content')



<div class="container">

 <div class="col-sm-12 col-12" id="mainpage">
   <div class="row">

    <div class="col-sm-9 col-12">
      <ul class="list-group p-0">
        <li class="list-group-item bg-success text-white">
          <span class="student"><span uk-icon="icon: info; ratio: 1.2"></span>&nbsp;&nbsp;@if($lang == 'en'){{$data->title ?: $data->title_bn}}@else {{$data->title_bn ?: $data->title}}@endif</span>
        </li>
        <br>
        <h5>@if($lang == 'en'){{$data->title ?: $data->title_bn}}@else {{$data->title_bn ?: $data->title}}@endif<a href="{{ asset($data->image) }}" class="btn btn-sm btn-dark float-end" download="{{ asset($data->image) }}"> Download</a></h5>

        <p>
        @if($lang == 'en'){!! $data->details !!}@elseif($lang == 'bn'){!! $data->details_bn !!}@endif
        </p>

        <div class='embed-responsive' style='padding-bottom:150%'>


          <object data="{{ asset($data->image) }}"  type='application/pdf' width='100%' height='100%'></object>


        </div>  


      </ul>
      <br>



    </div>


    @include('frontend.sidebar')




    @endsection