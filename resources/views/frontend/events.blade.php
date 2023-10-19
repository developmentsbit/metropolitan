@extends('frontend.index')
@section('content')



<div class="container">
  <div class="col-sm-12 col-12" id="mainpage">


   <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
    <ul class="list-group p-0">
      <li class="list-group-item font-weight-bold bg-success text-light" id="about">ইভেন্টস</li>
      <li class="list-group-item">

        <div class="table table-responsive">
          <table id="example" class="display table-bordered" style="width:100%">
            <thead>
              <tr style="font-size: 15px;">
                <th>ক্রমিক</th>
                <th>প্রকাশের তারিখ</th>
                <th>শিরোনাম</th>
                <th>ডাউনলোড</th>
              </tr>
            </thead>
            <tbody>


              @php
              $i = 1;
              @endphp
              @if(isset($data))
              @foreach($data as $d)

              <tr style="font-size: 12px;">
                <td>{{ $i++ }}</td>
                <td><a href="{{ url('noticesdetails',$d->id) }}" style="text-decoration: none;color: black">{{ date('d M Y', strtotime($d->date)); }}</a></td>
                <td><a href="{{ url('noticesdetails',$d->id) }}" style="text-decoration: none;color: black">{{ $d->title }}</a></td>
                <td><a  href="{{ asset($d->image) }}" class="btn btn-sm btn-danger" download="" ><img src="frontend/img/pdf_icon.png" class="img-fluid"></a></td>
              </tr>


              @endforeach
              @endif



            </table>

          </div>

        </li>

      </ul>
    </div>
  </div>





</div>
</div>







@endsection