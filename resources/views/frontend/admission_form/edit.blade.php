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

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    {{-- @include('sweetalert::alert') --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
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
            <!--<div class="row">-->
            <!--    <div class="col">-->
            <!--        <img src="{{ asset($setting->image) }}" alt="">-->
            <!--    </div>-->
            <!--    <div class="col-10 mt-2" id="">-->
            <!--        <b style="font-size:25px;">{{$setting->name}}</b><br>-->
            <!--        <span style="font-size:15px;">{{$setting->address}}</span><br>-->
            <!--        <b style="font-size:20px;"><u>Admission Form</u></b>-->
            <!--    </div>-->
            <!--</div>-->
            
        </div>
        
        <div class="col-12" id="page-title">
                <b style="font-size:20px;">Admission Form</b>
        </div>
        <div class="form-body mt-3">
            <div class="btn-link p-1 text-right">
                <a href="{{url('/')}}" class="btn btn-sm btn-info">@lang('frontend.home')</a>
                <a href="{{url('/admission_form')}}" class="btn btn-sm btn-dark">@lang('frontend.create_new')</a>
            </div>
            <div class="forms-tabs">
                <ul>
                    <li class="@if($step == 'step_1') active @endif"><a class="" href="{{url('editStudentData')}}/step_1/{{$data->id}}">@lang('frontend.personal_info')</a></li>
                    <li class="@if($step == 'step_2') active @endif"><a class="" href="{{url('editStudentData')}}/step_2/{{$data->id}}">@lang('frontend.academic_info')</a></li>
                    <li class="@if($step == 'step_3') active @endif"><a class="" href="{{url('editStudentData')}}/step_3/{{$data->id}}">@lang('frontend.adress')</a></li>
                    <li class="@if($step == 'step_4') active @endif"><a class="" href="{{url('editStudentData')}}/step_4/{{$data->id}}">@lang('frontend.guardian_info')</a></li>
                </ul>
            </div>
            @if($step == 'step_1')
            <div class="forms" style="border-top:1px dashed white;padding:12px 12px;">
            <form method="POST" enctype="multipart/form-data" action="{{url('updateStep1')}}/{{$data->id}}">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.apply_date')</label>
                        <input type="text" class="form-control form-control-sm" readonly value="{{$apply_date}}" name="apply_date">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.student_name')<span class="text-danger">**</span></label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->student_name}}" name="student_name" required>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.father_name')<span class="text-danger">**</span></label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->father_name}}" name="father_name" required>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.mother_name')<span class="text-danger">**</span></label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->mother_name}}" name="mother_name" required>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.religion')<span class="text-danger">**</span></label>
                        <select class="form-control" name="religion" required>
                            <option value="">-----@lang('frontend.select_one')-----</option>
                            <option @if($data->religion == 'Islam') selected @endif value="Islam">Islam</option>
                            <option @if($data->religion == 'Hindu') selected @endif value="Hindu">Hindu</option>
                            <option @if($data->religion == 'Christian') selected @endif value="Christian">Christian</option>
                            <option @if($data->religion == 'Buddist') selected @endif value="Buddist">Buddist</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.blood_group')</label>
                        <select class="form-control" name="blood_group">
                            <option value="">-----@lang('frontend.select_one')-----</option>
                            <option @if($data->blood_group == 'A+') selected @endif value="B+">B+</option>
                            <option @if($data->blood_group == 'B+') selected @endif value="B+">B+</option>
                            <option @if($data->blood_group == 'O+') selected @endif value="O+">O+</option>
                            <option @if($data->blood_group == 'O-') selected @endif value="O-">O-</option>
                            <option @if($data->blood_group == 'B-') selected @endif value="B-">B-</option>
                            <option @if($data->blood_group == 'A-') selected @endif value="A-">A-</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.date_of_birth')<span class="text-danger">**</span></label>
                        <input type="text" class="form-control form-control-sm" placehoder="dd/mm/yyyy" name="date_of_birth" id="" autocomplete="off" value="{{$data->date_of_birth}}">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.gender')<span class="text-danger">**</span></label><br>
                        <div class="form-check form-check-inline">
                            <input @if($data->gender == 'Male') checked  @endif class="form-check-input" type="radio" name="gender" id="male" value="Male">
                            <label class="form-check-label" for="male">@lang('frontend.male')</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input @if($data->gender == 'Female') checked  @endif class="form-check-input" type="radio" name="gender" id="female" value="Female">
                            <label class="form-check-label" for="female">@lang('frontend.female')</label>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.image')</label>
                        <input type="file" name="image" class="form-control" id="image" accept="image/*">
                        <img id="blah" src="{{asset('StudentImage')}}/{{$data->image}}" alt="your image" style="height:80px;width:80px;">
                    </div>
                </div>
                <div class="col-12 mt-3 text-center">
                    <input type="submit" class="btn btn-success btn-sm" value="@lang('frontend.submit')">
                </div>
                </form>
            </div>
        </div>
        @elseif($step == 'step_2')
        <div class="forms" style="border-top:1px dashed white;padding:12px 12px;">
            <form method="POST" enctype="multipart/form-data" action="{{url('updateStep2')}}/{{$data->id}}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h3>@lang('frontend.admission_class')</h3>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.class')<span class="text-danger">**</span></label>
                        <select class="form-control" name="class_id" required onchange="return getGroup()" id="class_id">
                            <option value="">-----@lang('frontend.select_one')-----</option>
                            @if($class)
                            @foreach($class as $c)
                            <option @if($data->class_id == $c->id) selected @endif value="{{$c->id}}">{{$c->class_name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.group')<span class="text-danger">**</span></label>
                        <select class="form-control" name="group_id" id="group_id">
                            <option value="">-----@lang('frontend.select_one')-----</option>
                            @if($group)
                            @foreach($group as $g)
                            <option @if($g->id == $data->group_id) selected @endif value="{{$g->id}}">{{$g->group_name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.year')<span class="text-danger">**</span></label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->year}}" name="year" id="" autocomplete="off">
                    </div>
                    <div class="col-12 mt-2">
                        <h4>Previous Result</h4>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.class')</label>
                        <select class="form-control" name="class">
                            <option value="">-----@lang('frontend.select_one')-----</option>
                            <option @if($classes)@if($classes->class == 'Five') selected @endif @endif value="Five">Five</option>
                            <option @if($classes)@if($classes->class == 'Six') selected @endif @endif value="Six">Six</option>
                            <option @if($classes)@if($classes->class == 'Seven') selected @endif @endif value="Seven">Seven</option>
                            <option @if($classes)@if($classes->class == 'Eight') selected @endif @endif value="Eight">Eight</option>
                            <option @if($classes)@if($classes->class == 'Nine') selected @endif @endif value="Nine">Nine</option>
                            <option @if($classes)@if($classes->class == 'Ten') selected @endif @endif value="Ten">Ten</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.institute_name')</label>
                        <input type="text" class="form-control form-control-sm" value="@if($classes){{$classes->institute_name}}@endif" name="institute_name" id="" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.board_roll')</label>
                        <input type="text" class="form-control form-control-sm" value="@if($classes){{$classes->board_roll}}@endif" name="board_roll" id="" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.reg_no')</label>
                        <input type="text" class="form-control form-control-sm" value="@if($classes){{$classes->reg_no}}@endif" name="reg_no" id="" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.group')</label>
                        <input type="text" class="form-control form-control-sm" value="@if($classes){{$classes->group}}@endif" name="group" id="" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.passing_year')</label>
                        <input type="text" class="form-control form-control-sm" value="@if($classes){{$classes->passing_year}}@endif" name="passing_year" id="" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.gpa')</label>
                        <input type="text" class="form-control form-control-sm" value="@if($classes){{$classes->gpa}}@endif" name="gpa" id="" autocomplete="off">
                    </div>
                    <div class="col-12" id="form-box">
                        <input type="file" name="file" class="form-control">
                        @if($classes)
                        <img src="{{asset('StudentPreviousFiles')}}/{{$classes->files}}" alt="" height="80px;">
                        @endif
                    </div>
                <div class="col-12 mt-3 text-center">
                    <input type="submit" class="btn btn-success btn-sm" value="@lang('frontend.submit')">
                </div>
                </form>
            </div>
        </div>
        @elseif($step == 'step_3')
        <div class="forms" style="border-top:1px dashed white;padding:12px 12px;">
            <form method="POST" enctype="multipart/form-data" action="{{url('updateStep3')}}/{{$data->id}}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h3>@lang('frontend.present_adress')</h3>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.house_name')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->present_house_name}}" name="present_house_name" id="house_name" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.village')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->present_village}}" name="present_village" id="village" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.po')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->present_po}}" name="present_po" id="po" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.post_code')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->present_post_code}}" name="present_post_code" id="post_code" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.upazila')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->present_upazila}}" name="present_upazila" id="upazila" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.district')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->present_district}}" name="present_district" id="district" autocomplete="off">
                    </div>

                    <!-- //permenant_adress -->
                    <div class="col-12 mt-3">
                        <h3>@lang('frontend.permenant_adress')</h3><br>
                        <input type="checkbox" name="sameaspresent" id="sameAsPresent" onclick="return fillPermenantAdress()">
                        <label for="sameAsPresent">@lang('frontend.same_as_present')</label>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.house_name')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->permenant_house_name}}" name="permenant_house_name" id="p_house_name" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.village')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->permenant_village}}" name="permenant_village" id="p_village" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.po')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->permenant_po}}" name="permenant_po" id="p_po" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.post_code')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->permenant_post_code}}" name="permenant_post_code" id="p_post_code" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.upazila')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->permenant_upazila}}" name="permenant_upazila" id="p_upazila" autocomplete="off">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.district')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->permenant_district}}" name="permenant_district" id="p_district" autocomplete="off">
                    </div>
                <div class="col-12 mt-3 text-center">
                    <input type="submit" class="btn btn-success btn-sm" value="@lang('frontend.submit')">
                </div>
                </form>
            </div>
        </div>
        @elseif($step == 'step_4')
        <div class="forms" style="border-top:1px dashed white;padding:12px 12px;">
            <form method="POST" enctype="multipart/form-data" action="{{url('updateStep4')}}/{{$data->id}}">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.guardian_name')<span class="text-danger">**</span></label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->guardian_name}}" name="guardian_name" id="guardian_name" autocomplete="off" required>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.relation')</label>
                        <select class="form-control" name="relation">
                        <option @if($data->relation == 'Father') selected @endif value="Father">@lang('frontend.father')</option>
                        <option @if($data->relation == 'Mother') selected @endif value="Mother">@lang('frontend.mother')</option>
                        <option @if($data->relation == 'Elder Brother') selected @endif value="Elder Brother">@lang('frontend.elder_brother')</option>
                        </select>

                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.guardian_contact')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->guardian_contact}}" name="guardian_contact" id="" autocomplete="off" maxlength="11">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12" id="form-box">
                        <label>@lang('frontend.guardian_email')</label>
                        <input type="text" class="form-control form-control-sm" value="{{$data->guardian_email}}" name="guardian_email" id="" autocomplete="off">
                    </div>

                <div class="col-12 mt-3 text-center">
                    <input type="submit" class="btn btn-success btn-sm btn-block" value="@lang('frontend.submit')">
                </div>
                </form>
            </div>
        </div>
        @endif
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
            let class_id = $('#class_id').val();

            $.ajax({

                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{url('getGroup')}}',

                type : 'POST',

                data : {class_id},

                success : function(data)
                {
                    $('#group_id').html(data);
                }

            });
        }

        function fillPermenantAdress()
        {
            // alert();
            if($('#sameAsPresent').is(':checked'))
            {
                let house_name = $('#house_name').val();
                $('#p_house_name').val(house_name);

                let village = $('#village').val();
                $('#p_village').val(village);

                let po = $('#po').val();
                $('#p_po').val(po);

                let post_code = $('#post_code').val();
                $('#p_post_code').val(post_code);

                let upazila = $('#house_name').val();
                $('#p_upazila').val(upazila);

                let district = $('#district').val();
                $('#p_district').val(district);
            }
        }

    </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  @if(Session::has('success'))
  <script>
    UIkit.notification({message: '{{Session::get('success')}}', status: 'success'});
  </script>
  @endif


  {{-- @if(Session::has('warning_pay'))
  <script>
      swal('Oops!', '{{ Session::get('warning_pay') }}', 'warning');
  </script>

@endif --}}
</body>
</html>
