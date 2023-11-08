@extends('frontend.index')
@section('content')




<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-9 col-12">


     <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
       <ul class="list-group p-0">
        <li class="list-group-item font-weight-bold bg-success text-light" id="about">@if($lang == 'en'){{$facility->title ?: $facility->title_bn}}@else {{$facility->title_bn ?: $facility->title}}@endif</li>
      </ul>
      <li class="list-group-item">
        <span>
            @if($lang == 'en')
            {{$facility->description ?: $facility->description_bn}}
            @else {{$facility->description_bn ?: $facility->description}}
            @endif
        </span>
        <div class="row" uk-lightbox>
            @if(isset($data))
            @foreach($data as $d)

            <div class="col-sm-6 col-12 p-0">
            <a href="{{ asset('facility_image') }}/{{$d->image_name}}"><img src="{{ asset('facility_image') }}/{{$d->image_name}}" alt="" class="img-fluid photoimg" style="height: 400px;width:100%;"></a>
            <div class="uk-overlay uk-overlay-primary uk-position-bottom p-1 text-center">
                <p>
                    @if($lang == 'en')
                    {{ $d->image_title}}
                    @else   
                    {{$d->image_title}}
                    @endif
                </p>
            </div>
            </div>
            @endforeach
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