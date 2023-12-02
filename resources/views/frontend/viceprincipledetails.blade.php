@extends('frontend.index')
@section('content')



<div class="container">

 <div class="col-sm-12 col-12" id="mainpage">
   <div class="row">

    <div class="col-sm-9 col-12">

      @if($data)


      <ul class="list-group p-0">
        <li class="list-group-item bg-success text-white">
          <span class="student"><span uk-icon="icon: info; ratio: 1.2"></span>&nbsp;&nbsp;উপাধ্যক্ষ তথ্য</span>
        </li>



        <center>
          <div class="col-sm-12 mt-4">

            <img src="{{ asset($data->image) }}" style="max-height: 200px; border-radius: 5px;" class="img-fluid"> 
          </div> 
          <hr>
        </center>


        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <tbody>
              <tr>
                <td width="100">নাম</td>
                <td width="3" align="center">:</td>
                <td width="230">{{ $data->name }}</td>
              </tr>

              <tr>
                <td>পদবী</td>
                <td align="center">:</td>
                <td>{{ $data->designation }}</td>
              </tr>



              <tr>
                <td>পিতার নাম</td>
                <td align="center">:</td>
                <td>{{ $data->fathers_name }}</td>
              </tr> 


              <tr>
                <td>মাতার নাম</td>
                <td align="center">:</td>
                <td>{{ $data->mothers_name }}</td>
              </tr> 


              <tr>
                <td>মোবাইল</td>
                <td align="center">:</td>
                <td>{{ $data->mobile }}</td>
              </tr>

              <tr>
                <td>ই-মেইল</td>
                <td align="center">:</td>
                <td>{{ $data->mobile }}</td>
              </tr> 

              <tr>
                <td>লিঙ্গ</td>
                <td align="center">:</td>
                <td>{{ $data->gender }}</td>
              </tr>

              <tr>
                <td>রক্তের গ্রুপ</td>
                <td align="center">:</td>
                <td>{{ $data->blood_group }}</td>
              </tr>

              <tr>
                <td>ঠিকানা</td>
                <td align="center">:</td>
                <td>{{ $data->present_address }}</td>
              </tr> 


            </tbody>
          </table>
        </div>




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