@extends('frontend.index')
@section('content')




<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-12 col-12">


     <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
       <ul class="list-group p-0">
        <li class="list-group-item font-weight-bold bg-success text-light" id="about" style="font-size:25px;text-align: center;">ভর্তি সম্পর্কিত যেকোনো তথ্য ও পরামর্শের জন্য যোগাযোগ করুন</li>
      </ul>
      <li class="list-group-item">
        <div class="row" uk-lightbox>


          @if(isset($data))
          @foreach($data as $d)

         <div class="col-sm-3 col-12 p-0">
           <a href="{{asset('/assets/images/about_admission')}}/{{$d->image}}"><img src="{{asset('/assets/images/about_admission')}}/{{$d->image}}" alt="" class="img-fluid photoimg" style="width: 400px;height: auto;border: 2px solid #fff;"></a>
         </div>


         @endforeach
         @endif


       </div>

     </li>



   </div>
 </div>






</div>
</div>
</div>



@endsection