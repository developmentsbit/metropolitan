@extends('frontend.index')
@section('content')



<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-9 col-12">
    @if(count($data)>0)

     <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
       <ul class="list-group p-0">
        <li class="list-group-item font-weight-bold bg-success text-light" id="about">

          @if($data[0]->type == 3)
          @lang('frontend.managing_comitte')
          @elseif($data[0]->type == 2)
          @lang('frontend.presidents')
          @elseif($data[0]->type == 1)
          @lang('frontend.principles')
          @elseif($data[0]->type == 4)
          @lang('frontend.donar')
          @else
          @lang('frontend.ex_member')
          @endif

        </li>
      </ul>
      <li class="list-group-item">


       <div class="col-sm-12 col-12 p-0">
        <div class="row">

          @if(isset($data))
          @foreach($data as $d)

          <div class="col-sm-6 col-12 mt-3" data-aos="fade-right" data-aos-duration="2000">
            <table class="table table-bordered " id="studenttable">
              <tr>
               <td rowspan="4">
                <center><img src="{{ asset($d->image) }}" class="img-fluid" id="" style="max-height: 100px;"><br></center>
              </td>
              <td>@lang('frontend.name')</td>
              <td>{{ $d->name }}</td>
            </tr>

            <tr>
              <td>@lang('frontend.designation')</td>
              <td>{{ $d->designation }}</td>
            </tr>

            <tr>
              <td>@lang('frontend.mobile')</td>
              <td>{{ $d->mobile }}</td>
            </tr>

            <tr>
              <td>@lang('frontend.mail')</td>
              <td>{{ $d->email }}</td>
            </tr>

            <tr>
              <td colspan="3"><center><a href="{{ url("memberdetails",$d->id) }}" class="btn btn-warning text-white btn-sm float-end">@lang('frontend.detail')</a></center></td> 
            </tr>               
          </table>
        </div><!-----------End Teacher Information----------------------->


        @endforeach
        @endif

      </li>



    </div>

    @else
     <img src="{{ asset('frontend/empty1.png') }}" alt="">
    @endif
  </div>



  @include('frontend.sidebar')





</div>
</div>
</div>





@endsection