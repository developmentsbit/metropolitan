@extends('frontend.index')
@section('content')



<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-9 col-12">


     <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
       <ul class="list-group p-0">
        <li class="list-group-item font-weight-bold bg-success text-light" id="about">
        @if($data->type == 1)
        @lang('frontend.principal_message')
        @else
        @lang('frontend.presidentmessage')
        @endif
      </li>
      </ul>
      <li class="list-group-item">
        <div style="font-size: 14px; line-height: 25px; text-align: justify;">

          <img src="{{ asset($data->image) }}" class="img-fluid p-2 img-thumbnail" style="max-height: 300px;"><br><br>

          <p>
          @if($lang == 'en'){!! $data->details !!}@elseif($lang == 'bn'){!! $data->details_bn !!}@endif
          </p>

          <br><br>



        </div>


      </li>



    </div>
  </div>



  @include('frontend.sidebar')





</div>
</div>
</div>





@endsection
