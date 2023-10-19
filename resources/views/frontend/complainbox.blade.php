@extends('frontend.index')
@section('content')



<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-9 col-12">


      <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
       <ul class="list-group p-0">
        <li class="list-group-item font-weight-bold bg-success text-light" id="about">অভিযোগ বাক্স</li>
      </ul>
      <li class="list-group-item">
                <div style="font-size: 14px; line-height: 25px; text-align: justify;">

            <div class="compain-box-form">
                <form action="#" method="POST">
                    <input type="hidden" name="_token" value="W9UI7hGq7vTB2fbZFKrmXVWp8dVRAmONQO0vyc37">                    <div class="form-group row">
                        <div class="col-lg-4 col-md-6 col-12" id="inputSingleBox">
                            <label>নাম </label><span class="text-danger">*</span>
                            <input type="text" class="form-control form-control-sm" name="name" required>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12" id="inputSingleBox">
                            <label>মোবাইল নাম্বার</label><span class="text-danger">*</span>
                            <input type="number" class="form-control form-control-sm" name="phone" required>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12" id="inputSingleBox">
                            <label>বিষয়</label>
                            <input type="text" class="form-control form-control-sm" name="subject">
                        </div>
                        <div class="col-lg-12 col-md-12 col-12" id="inputSingleBox">
                            <label>অভিযোগ / মতামত</label><span class="text-danger">*</span>
                            <textarea name="complain" id="" cols="10" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <input type="submit" class="btn btn-sm btn-info w-100" value="সাবমিট করুন">
                        </div>
                    </div>
                </form>
            </div>

       </div>

     </li>



   </div>
   
   
  </div>



  @include('frontend.sidebar')





</div>
</div>
</div>





@endsection
