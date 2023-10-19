@extends('frontend.index')
@section('content')

<div class="container">

 <div class="col-sm-12 col-12" id="mainpage">
   <div class="row">

    <div class="col-sm-9 col-12">
     @if(count($data)>0)
     <ul class="list-group p-0">
      <li class="list-group-item bg-success text-white">
        <span class="student"><span uk-icon="icon: info; ratio: 1.2"></span>&nbsp;&nbsp;
        {{ $data[0]->department_name_bn }} বিভাগের শিক্ষকদের তথ্য</span>
      </li>


      @if(isset($data))
      @foreach($data as $d)

      <li class="list-group-item">
        <div class="col-sm-12 col-12 p-0">
          <div class="row">

            <div class="col-sm-6 col-12 mt-3" data-aos="fade-right" data-aos-duration="2000">
              <table class="table table-bordered " id="studenttable">
                <tr>
                 <td rowspan="4">
                  <center><img src="{{ asset($d->image) }}" class="img-fluid" id="" style="max-height: 100px;"><br></center>
                </td>
                <td>নাম</td>
                <td>{{ $d->name }}</td>
              </tr>

              <tr>
                <td>বিভাগ/শাখা</td>
                <td>{{ $d->department_name_bn }}</td>
              </tr>
              <tr>
                <td>পদবী</td>
                <td>{{ $d->designation }}</td>
              </tr>

              <tr>
                <td>ই-মেইল</td>
                <td>{{ $d->email }}</td>
              </tr>

              <tr>
                <td colspan="3"><center><a href="{{ url('departmentemployeedetails',$d->id) }}" class="btn btn-warning text-white btn-sm float-end">বিস্তারিত দেখুন</a></center></td> 
              </tr>               
            </table>
          </div><!-----------End Teacher Information----------------------->



        </div>
      </div>
    </li>


    @endforeach
    @endif


  </ul>
  <br>

  @else

  <center>
    <img src="{{ asset('/') }}frontend/img/404.jpg" class="img-fluid">
    <h4 class="text-uppercase"><b>Data Not Found</b></h4>
    
  </center>

  @endif

</div>


@include('frontend.sidebar')




@endsection

