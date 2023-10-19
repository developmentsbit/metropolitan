@php
$setting = DB::table("setting")->first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('frontend.student_form_title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="{{ asset($setting->image) }}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}frontend/css/uikit.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}frontend/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}frontend/style.css">
    <link href="{{ asset('/') }}frontend/css/bootstrap-4-navbar.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.0.js" ></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    {{-- @include('sweetalert::alert') --}}
</head>
<style>
    body{
        background : white;
    }
    .form-header img {
    max-width: 93px;
}
#adress{
    font-size : 18px;
}
.form-box.container {
    background: #f8f2f2;
    box-shadow: 0px 2px 3px 0px;
    margin-top: 11px;
    padding: 0px;
}

.input-single-box{
    margin-top: 5px;
}

.form-header {
    background: #282858;
    padding: 14px;
    color: white;
}

div#adress {
    text-align: center;
}
.forms-tabs ul {
    padding: 0px;
    margin: 0px;
}

.forms-tabs ul li {
    list-style: none;
    display: inline-block;
    padding: 5px 15px;
}

.forms-tabs ul li a {
    text-decoration: none;
    color: black;
    font-size: 14px;
    text-transform: uppercase;
}
li.active {
    /* background: #282858; */
    color: white !important;
    border-bottom: 4px solid #ffd008;
}
li.active>a {
    font-weight:bold;
}
.form-control{
    border-radius:0px;
    border : 1px solid lightgray;
}

.form-control:focus{
    box-shadow : none;
}
#form-box{
    margin-top : 15px;
}
.isDisabled {
  color: currentColor;
  cursor: not-allowed;
  opacity: 0.5;
  text-decoration: none;
}
.logo {
    margin-right: 18px;
}

.adress {
    margin-top: 22px;
}
div#page-title {
    padding: 0px;
    text-align: center;
    background: white;
    padding: 10px 5px;
    text-transform: uppercase;
}
</style>
<body>

    <div class="form-box container">
        <div class="form-header">
            <div class="form-head d-flex">
                <div class="logo">
                    <img src="{{ asset($setting->image) }}" alt="">
                </div>
                <div class="adress">
                    <b style="font-size:25px;">{{$setting->name}}</b><br>
                    <span style="font-size:15px;">{{$setting->address}}</span><br>

                </div>
            </div>

        </div>
        <div class="col-12" id="page-title">
                <b style="font-size:20px;">Admission Form</b>
        </div>
        <div class="form-body mt-3">
            <div class="forms" style="border-top:1px dashed white;padding:12px 12px;">
            <form method="POST" enctype="multipart/form-data" action="{{url('storeStudentInfo')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-single-box">
                            <label for="name">Name</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-single-box">
                            <label for="father_name">Father Name</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="father_name" id="father_name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-single-box">
                            <label for="mothers_name">Mother Name</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="mothers_name" id="mothers_name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-single-box">
                            <label for="permenant_adress">Permenant Adress</label>
                            <textarea name="permenant_adress" id="permenant_adress" cols="30" rows="" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-single-box">
                            <label for="present_adress">Present Adress</label>
                            <textarea name="present_adress" id="present_adress" cols="10" rows="" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-single-box">
                            <label for="gender">Gender</label><span class="text-danger">*</span>
                            <select class="form-control" name="gender" id="gender">
                                <option value="">-- Select One --</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-single-box">
                            <label for="religion">Religion</label><span class="text-danger">*</span>
                            <select class="form-control" name="religion" id="religion">
                                <option value="">-- Select One --</option>
                                <option value="Islam">Islam</option>
                                <option value="Hindhu">Hindhu</option>
                                <option value="Buddist">Buddist</option>
                                <option value="Christian">Christian</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-single-box">
                            <label for="blood_group">Blood Group</label>
                            <input type="text" class="form-control" name="blood_group" id="blood_group">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-single-box">
                            <label for="guardian_contact_no">Guardian Contact No.</label>
                            <input type="text" class="form-control" name="guardian_contact_no" id="guardian_contact_no">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-single-box">
                            <label for="class_id">Select Class</label><span class="text-danger">*</span>
                            <select class="form-control" name="class_id" id="class_id" onchange="return getGroup()">
                                <option value="">-- Select One --</option>
                                @if($class)
                                @foreach ($class as $v)
                                <option value="{{$v->id}}">{{$v->class_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-single-box">
                            <label for="group_id">Select Group</label><span class="text-danger">*</span>
                            <select class="form-control" name="group_id" id="group_id" onchange="return getSubject()">
                                <option value="">-- Select One --</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-single-box">
                            <label for="session">Select Session</label><span class="text-danger">*</span>
                            <select class="form-control" name="session" id="session">
                                <option value="">-- Select One --</option>
                                <option value="2018-2019">2018-2019</option>
                                <option value="2019-2020">2019-2020</option>
                                <option value="2020-2021">2020-2021</option>
                                <option value="2021-2022">2021-2022</option>
                                <option value="2022-2023">2022-2023</option>
                                <option value="2023-2024">2023-2024</option>
                                <option value="2024-2025">2024-2025</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" id="showSubject">

                </div>

                <div class="col-12 mt-4">
                    <input type="submit" class="btn btn-success btn-block btn-sm" value="Submit">
                </div>
                </form>
            </div>

        </div>
    </div>



 <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="{{ asset('/') }}frontend/js/bootstrap-4-navbar.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/js/jquery.nivo.slider.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/js/uikit.min.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/js/uikit-icons.min.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/js/jquery.exzoom.js"></script>
  <script>
    AOS.init();
    var preloader=document.getElementById('load');
    function myfunctions() {
      preloader.style.display='none';
    }
    $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
  <script src="{{ asset('/') }}frontend/js/sliderResponsive.js"></script>
  <script>
    $(document).ready(function() {



      $("#slider1").sliderResponsive({
      });

      $("#slider2").sliderResponsive({
        fadeSpeed: 300,
        autoPlay: "off",
        showArrows: "on",
        hideDots: "on"
      });

      $("#slider3").sliderResponsive({
        hoverZoom: "off",
        hideDots: "on"
      });

    });
  </script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" type="text/javascript" ></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>

<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format : 'dd/mm/yyyy'
        });
    </script>

    <script>
     image.onchange = evt => {
        const [file] = image.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
        }
    </script>


<script>
    function getGroup()
    {
        // alert();
        var class_id = $('#class_id').val();

        // alert(class_id);

        if(class_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{csrf_token()}}'
                },

                url : '{{url('getGroupClasswise')}}/'+class_id,

                type : 'GET',

                success : function(data)
                {
                    $('#group_id').html(data);
                }
            });
        }
    }


    function getSubject()
    {
        var class_id = $('#class_id').val();
        var group_id = $('#group_id').val();

        if(class_id != '' || group_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{csrf_token()}}'
                },

                url : '{{url('getSubject')}}/'+class_id+'/'+group_id,

                type : 'GET',

                success : function(data)
                {
                    $('#showSubject').html(data);
                }
            });
        }
    }
</script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  @if(Session::has('success'))
  <script>
    UIkit.notification({message: '{{Session::get('success')}}', status: 'success'});
  </script>
  @endif

</body>
</html>
