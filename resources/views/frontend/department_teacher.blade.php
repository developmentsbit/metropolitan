@extends('frontend.index')
@section('content')



<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-9 col-12">

      <ul class="list-group p-0">
       <li class="list-group-item">
        @if($data)
        @foreach($data as $d)
        <span class="student"><span uk-icon="icon: info; ratio: 1.2"></span>&nbsp;&nbsp;@if($lang == 'en'){{$d->department}}@elseif($lang == 'bn'){{$d->department_name_bn}}@endif @lang('frontend.department_info') </span>
        @endforeach
        @endif
      </li>

      <li class="list-group-item">
        <div class="col-sm-12 col-12 p-0">
          <div class="row">

            @if($teacherview)
            @foreach($teacherview as $view)
            <div class="col-sm-6 col-12 mt-3" data-aos="fade-right" data-aos-duration="2000">
              <table class="table table-bordered "id="studenttable">
                   <tr>
                 <td colspan="2">
                  <center><img src="{{ asset($view->image) }}" class="img-fluid rounded" id="" style="max-height: 100px"><br></center>
                </td>
              
              </tr>
              
               <tr>
                  <th>@lang('frontend.mobile')</th>
                <td>{{$view->name}}</td>
              </tr>

              <tr>
                <th>@lang('frontend.designation')</th>
                <td>{{$view->designation}}</td>
              </tr>
              <tr>
                <th>@lang('frontend.mobile')</th>
                <td>{{$view->mobile}}</td>
              </tr>

              <tr>
                <th>@lang('frontend.mail')</th>
                <td>{{$view->email}}</td>
              </tr>

              <tr>
                <td colspan="3"><center><a href="{{url('teacherstaffdetails')}}/{{$view->id}}" class="btn btn-outline-success btn-sm">@lang('frontend.detail')</a></center></td> 
              </tr>               
            </table>
          </div><!-----------End Teacher Information----------------------->
          @endforeach
          @endif



        </div>
      </div>
      <div class="float-right">
        {{ $teacherview->links() }}
      </div>
    </li>
  </ul>
  <br>

</div>



  @include('frontend.sidebar')





</div>
</div>
</div>





@endsection