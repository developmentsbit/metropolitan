@php
$slider = DB::table('photogallerys')->where("slider",1)->orderBy('id','DESC')->get();
$setting = DB::table("setting")->first();
@endphp


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@if($lang == 'en'){{ $setting->name }}@else {{$setting->name_bangla}}@endif</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="icon" href="{{ asset($setting->image) }}" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ asset('/') }}frontend/css/uikit.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/') }}frontend/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/') }}frontend/style.css">
  <link href="{{ asset('/') }}frontend/css/bootstrap-4-navbar.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <link href="{{ asset('/') }}frontend/css/sliderResponsive.css" rel="stylesheet" type="text/css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/js/main.js"></script>

</head>



<style type="text/css">
.container{
    background: white;
}
.site-lang {

display: flex;
align-items: center;
}
.site-lang ul {
margin:0;
padding:0;
list-style:none;
}
.site-lang > ul > li {
position: relative;
display: block;
text-align: left;
/* padding: 11px 0; */
}
.site-lang ul li a {
font-weight:700;
color:#222222;
position:relative;
top:2px;
}
.site-lang > ul > li > a::after {
font-family:FontAwesome;
content:"\f107";
margin-left:5px;
font-weight:normal;
}
.site-lang ul li a:hover {
color: #7e7678;
}
.site-lang ul li img {
width:26px;
height:26px;
border-radius:100%;
margin-right:15px;
}
.site-lang ul li ul {
background-color: #ffffff;
box-shadow: 5.5px 9.526px 43px 0px rgb( 98, 143, 144, 0.15 );
position: absolute;
top:100%;
left: -18px;
min-width: 165px;
transition: .4s;
transform-origin: top;
z-index: 400;
border-radius: 10px;
opacity:0;
visibility:hidden;
}
.site-lang ul li:hover ul {
opacity:1;
visibility:visible;
}
.site-lang ul li ul {
padding:10px 0;
}
.site-lang ul li ul li {
padding: 10px 25px;
}
.site-lang.style-2 {
padding-left:50px;
}
.site-lang.style-2 > ul > li > a {
color:#ffffff;
}
.site-lang.in-right ul {
left:unset;
right:0;
}

.logo-sm-header{
    display: block;
    background: none;
    border-top: none;
    padding: 0px;
}






@media (max-width: 768px)
      {
        .logo-sm-header {
            display: block;
            background: #683091;
            border-top: 1px solid white;
            padding: 16px 0px;
        }
        #slider1{
            display: none;
        }
        .logoName{
            position: relative !important;
        }
        .logoName.d-flex {
            margin-top: 0px !important;
        }

        .logoName.d-flex img {
            max-width: 59px !important;
        }

        .logoName.d-flex span {
            font-size: 15px !important;
        }

        .siteNameEst {
            margin-top: 12px !important;
        }

        .bangabondhu{
            text-align: center !important;
        }

        #top_button{
            font-size: 9px !important;
            padding: 9px 5px !important;
        }

        #email label a {
          font-size: 12px;
          padding: 6px 17px 7px 4px;
          text-align: center;
          /* justify-content: center; */
        }
        .site-lang a img{
          width: 26px;
        }

        .siteNameEst {
            margin-top: -77px !important;
            padding-left: 114px;
            font-weight: bold;
            font-size: 14px !important;
        }
        .siteNameEst span:first-child{
            font-size: 17px !important;
        }
      }

.btn-success {
    background : #05c76a

}


.logoName span{
    color: white;
}

.logoName img {
    max-width : 80px;
    border-radius : 5px;
}
.siteNameEst {
    margin-top: -77px;
    font-weight: bold;
    font-size: 19px;
    padding: 0px 0px 0px 115px;
}

.siteNameEst span:first-child{
    font-size: 25px;
}

.siteLogo img{
  height: 100px;
  width : 100px;
  padding: 7px;
  border-radius: 12%;
}
.facility_area {
    background: #683091;
    box-shadow: 0px 1px 3px 1px lightgray;
    border-bottom: 5px solid #05c76a;
}

div#FacBox {
    padding: 0px;
    color: white;
    border-right: 1px solid white;
    padding: 8px 27px;
    border-bottom: 1px solid white;
}

div#FacBox a {
    text-decoration: none;
    color: white;
    transition: .3s;
}
div#FacBox a:hover {
    text-decoration: none;
    color: rgb(248, 0, 0);
}
.text-center.mt-2.sec-div {
    background: lightgray;
    padding: 7px 0px;
}
a.uk-position-center-left.uk-position-small.uk-hidden-hover.uk-icon.uk-slidenav-previous.uk-slidenav {
    background: #05c76a;
    color: white;
}
a.uk-position-center-right.uk-position-small.uk-hidden-hover.uk-icon.uk-slidenav-next.uk-slidenav {
    background: #05c76a;
    color: white;
}
li.slideBox {
    border: 1px solid white;
    padding: 5px;
    background: #ebebeb;
}
</style>

@if(config('app.locale') == 'en')
<style>
    .container{
    max-width : 1272px !important;
  }
  </style>
<style>
    li.nav-item a {
      font-size: 12.46px;
      padding: 14px 6px !important;
      text-transform: capitalize;
      font-weight: bold;
  }

</style>
@endif

@if(config('app.locale') == 'bn')
<style>
      .container{
        max-width: 1135px !important;
        }
</style>
@endif


@if($setting->type == 'school')




@else

<style>
    .container{
  max-width : 1198px !important;
}
</style>

@endif


<body>




  <div class="container">


    <div class="col-sm-12 col-12 pt-2" style="background: #fff;">

     <div class="col-sm-12 col-12  topheader">
      <div class="row">
        <div class="col-sm-4 col-12 bangabondhu" id="email">

          <label><a href="{{url('/time_line')}}"  class="btn btn-success btn-sm" target="_blank"><span uk-icon="icon: grid; ratio: 0.8"></span>&nbsp;@lang('frontend.golden_jubilee_and_bangabandhu_corner')  </a></label>

        </div>


        <div class="col-sm-8 col-12 text-center text-sm-center text-lg-right" id="email">
          <div class="btn-group" role="group" aria-label="Basic example">

            <label><a id="top_button" target="_blank" href="https://fgc.gov.bd/showResult.php" style="text-decoration:none;color:white;margin-right:10px" class="btn btn-outline-danger btn-sm">@lang('frontend.internal_results')</a></label>
            <label><a id="top_button" target="_blank" href="/ems/admission/" style="text-decoration:none;color:white;margin-right:10px" class="btn btn-outline-warning btn-sm"> <i class="fa fa-users"></i>&nbsp; @lang('frontend.admission_form')</a></label>
            <label><a id="top_button" target="_blank" href="#" style="text-decoration:none;color:white;margin-right:10px" class="btn btn-outline-info btn-sm">@lang('frontend.student_login')</a></label>
            <label>
              <div class="site-lang" style="margin-top: -4px;">
                  @if(config('app.locale')=='bn')
                  <a id="top_button" class="nav-link btn btn-outline-success" href="{{ route('lang', 'en') }}" role="button">
                      <img src="{{ asset('assets/images/flags/us.jpg') }}" alt="user-image" class="me-0 me-sm-1" height="12" width="30px">
                      <span>{{'English'}}</span>
                  </a>
                  @else
                  <a id="top_button" class="nav-link btn btn-outline-success" href="{{ route('lang', 'bn') }}" role="button">
                      <img src="{{ asset('assets/images/flags/bd.jpg') }}" alt="user-image" class="me-0 me-sm-1" height="12" width="30px">
                      <span>{{'বাংলা'}}</span>
                  </a>
                  @endif
              </div>
            </label>
        </div>

          </div>

        </div>
      </div><!------------Top Header End---------------->

      <div class="col-sm-12 col-12  tophead">
      <div class="row">

        <div class="col-sm-6 col-12">
          <div class="siteLogo">
            <a href="{{ url('/') }}"><img src="{{ asset($setting->image) }}" class="img-fluid"></a>
          </div>
          <div class="siteNameEst">
              <span>@if($lang == 'en'){{ $setting->name }}@else {{$setting->name_bangla}} @endif</span>
              <br>
              <span>
              @lang('frontend.established') - @if($lang == 'en'){{ $setting->established }}@else {{$setting->established_bangla}} খ্রিঃ@endif </span>
          </div>
        </div>


        <div class="col-sm-3 col-12 text-center text-sm-center text-lg-right mt-4">
          <div class="phone d-flex">
            <div style="padding-top : 5px;">
            <i class="fa fa-id-card"></i>
            </div>
            <div style="text-align:left;padding-left:10px;">
            <h5>@lang('setting.eiin')</h5>
            <span>@if($lang == 'en'){{$setting->eiin ?: $setting->eiin_bangla}}@else {{$setting->eiin_bangla ?: $setting->eiin}}@endif</span>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-12 text-center text-sm-center text-lg-right mt-4">
          <div class="phone d-flex">
            <div style="padding-top : 5px;">
            <i class="fa fa-phone-square"></i>
            </div>
            <div style="text-align:left;padding-left:10px;">
            <h5>@lang('setting.more_details')</h5>
            <span>{{ $setting->phone }}</span>
            </div>
          </div>
        </div>

        </div>
      </div><!------------Top Header End---------------->


      <div class="col-sm-12 col-12 p-0">

        <div class="slider" id="slider1">
          <!-- Slides -->


          @if(isset($slider))
          @foreach($slider as $s)


          <div style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('/') }}{{ $s->image  }}'); background-size:cover;background-repeat:no-repeat;"></div>


          @endforeach
          @endif





          <!-- The Arrows -->
          <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path></svg></i>
          <i class="right" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path></svg></i>
          <!-- Title Bar -->
      </div><!---------------End Slider------------------->


      <div id="carouselExampleControls" class="carousel slide d-block d-sm-none" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php
            $i = 0;
            @endphp
            @if(isset($slider))
            @foreach($slider as $s)

            @php
            $i= $i +1;
            @endphp
              <div class="carousel-item @if($i == 1) active @endif">
                <img src="{{ asset('/') }}{{ $s->image  }}" class="d-block w-100" alt="...">
              </div>
            @endforeach
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <nav class="navbar navbar-expand-lg navbar-light btco-hover-menu menubar" style="background: #fff; border-bottom: 1px solid #e5e5e5; padding: 0px; box-shadow: 0 1px 5px -2px #999;">


        <a class="navbar-brand d-sm-none d-block" style="color: #000; font-weight: bold;" href="">@lang('frontend.select_menu')</a>

        <button  class="navbar-toggler"  uk-toggle="target: #offcanvas-slide" style="background-color: #f4f4f4; color: #fff; padding: 5px 10px;">
          <span class="navbar-toggler-icon" style="color: #fff;"></span>
        </button>


        <div class="collapse navbar-collapse " id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true" style="font-size: 15px;"></i></a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @lang('frontend.institute_introduction')
              </a>
              <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width: 400px;  max-width:100%;">

                <div class="row">

                  <div class="col-md-6 col-12 dmenu mt-3">
                    <li><a href="{{ url('page/1') }}">@lang('frontend.about_us')</a></li>
                    <li><a href="{{ url('page/2') }}">@lang('frontend.mission_vision')</a></li>
                    <li><a href="{{ url('page/3') }}">@lang('frontend.history')</a></li>
                    <li><a href="{{ url('page/4') }}">@lang('frontend.citizen_charter')</a></li>

                    <li><a href="{{url('teacher_permission')}}">@lang('frontend.teaching_permission_recognition')</a></li>
                    <li><a href="{{url('mpo_nationalizations')}}">@lang('frontend.mpo_nationalization_info')</a></li>

                  </div>

                  <div class="col-md-6 col-12 dmenu mt-3">
                    <li><a href="{{ url('page/6') }}">@lang('frontend.infrastructure')</a></li>
                    <li><a href="{{ url('page/7') }}">@lang('frontend.yearly_working_plan') </a></li>
                    <li><a href="{{ url('page/8') }}">@lang('frontend.contact')</a></li>
                  </div>



                </div>



              </ul>
            </li>



            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @lang('frontend.administrative_information')
              </a>
              <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width:260px; max-width:100%;">

                @php
                 $president_check = DB::table('principles')->where('type',2)->count();
                @endphp

                <div class="col-md-12 col-12 dmenu mt-3">
                  <li><a href="{{ url('presidentmessage') }}">@lang('frontend.presidentmessage') </a></li>
                  <li><a href="{{ url('vice_principal_messages') }}">@lang('frontend.vicepresidentmessage') </a></li>
                <li><a href="{{ url('principal_message') }}">@lang('frontend.principal_message')</a></li>

                 {{--<li><a href="{{ url('managing_comitte') }}">@lang('frontend.managing_comitte')</a></li>

                 @if($president_check)
                 <li><a href="{{ url('presidents') }}">@lang('frontend.presidents')</a></li>
                 @endif

                 <li><a href="{{ url('donar') }}">@lang('frontend.donar')</a></li>
                 <li><a href="{{ url('ex_member') }}">@lang('frontend.ex_member')</a></li> --}}
                 <li><a href="{{ url('principles') }}">@lang('frontend.principles')</a></li>
                 <li><a href="{{ url('viceprinciples') }}">@lang('frontend.viceprinciples')</a></li>
               </div>
             </ul>
           </li>



           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @lang('frontend.teachers_and_staff')
            </a>
            @if($setting->type == 'college')
            <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width: 500px;  max-width:100%;">
            @else
            <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width: 217px;  max-width:100%;">
            @endif

              <div class="col-md-12 col-12 dmenu mt-3">
               <div class="row">
                @if($setting->type == 'college')
                <div class="col-md-7">

               <li><a href="{{ url('teacherinfo') }}">@lang('frontend.teacherinfo')</a></li>
               @php
                $department = DB::table('department')->limit(9)->get();
               @endphp

               @if(isset($department))
               @foreach($department as $d)
               <li><a href="{{ url('department_teacher/'.$d->id) }}">@if($lang == 'en'){{$d->department}}@elseif($lang == 'bn'){{$d->department_name_bn}}@endif</a></li>

               @endforeach
               @endif



               </div>

                <div class="col-md-5">
                @if($setting->type == 'college')
                @php
                $department2 = DB::table('department')->skip(9)->limit(9)->get();
               @endphp

               @if(isset($department2))
               @foreach($department2 as $d)
               <li><a href="{{ url('department_teacher/'.$d->id) }}">@if($lang == 'en'){{$d->department}}@elseif($lang == 'bn'){{$d->department_name_bn}}@endif</a></li>

               @endforeach
               @endif


               <li><a href="{{ url('staffinfo') }}">@lang('frontend.staffinfo')</a></li>

            </div>
            @endif
               @else
               <div class="col-12">

                    <li><a href="{{ url('teacherinfo') }}">@lang('frontend.teacherinfo')</a></li>
                    <li><a href="{{ url('staffinfo') }}">@lang('frontend.staffinfo')</a></li>
               </div>
               @endif
               </div>

             </div>
           </ul>
         </li>

         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @lang('frontend.student')
         </a>
         <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink">

          <div class="col-md-12 col-12 dmenu mt-3">


            <li><a href="{{url('gender_wise_student_list')}}">@lang('frontend.class_gender_based_education')</a></li>
           <li><a href="{{url('section_wise_student_list')}}">@lang('frontend.section_wise_student')</a></li>


          {{-- <li><a href="{{url('gender_wise_students')}}">@lang('frontend.class_gender_based_education')</a></li>
           <li><a href="{{url('section_wise_students')}}">@lang('frontend.section_wise_student')</a></li> --}}

           <li><a href="{{ url('student_attendance') }}">@lang('frontend.student_attendance')</a></li>
           {{--

            this is from original database

            @php
            $class = DB::table('addclass')->get();
           @endphp
           @if($class)
           @foreach ($class as $c)
            @php
            $check = DB::table('class_wise_student_infos')->where('class_id',$c->id)->count();
            @endphp

            @if($check > 0)
           <li><a href="{{url('classWiseStudent')}}/{{$c->id}}">@if($lang == 'en'){{$c->class_name}}@else {{$c->class_name_bn}}@endif</a></li>
            @endif
           @endforeach
           @endif
           --}}

           {{-- this is from secondary database --}}

           @php
           $class = DB::connection('mysql_second')->table('add_class')->get();
           @endphp

                @if($class)
                @foreach ($class as $c)

                @php
                $count = DB::connection('mysql_second')->table('running_student_info')->where('class_id',$c->id)->count();
                @endphp

                @if($count > 0)
                <li><a href="{{url('class_student_info')}}/{{$c->id}}">{{$c->class_name}}</a></li>
                @endif
                @endforeach
                @endif

         </div>
       </ul>
     </li>




     <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @lang('frontend.academic_information')
         </a>
         <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink">

          <div class="col-md-12 col-12 dmenu mt-3">

           <li><a href="{{ url('page/9') }}">@lang('frontend.rules_regulation')</a></li>
           <li><a href="{{ url('academiccalenders') }}">@lang('frontend.academiccalenders')</a></li>
           <li><a href="{{ url('classroutines') }}">@lang('frontend.classroutines')</a></li>
           <li><a href="{{ url('holidaylists') }}">@lang('frontend.holidaylists')</a></li>
           <li><a href="{{ url('page/10') }}">@lang('frontend.uniform')</a></li>
           <li><a href="{{ url('page/11') }}">@lang('frontend.fees')</a></li>
           <li><a href="{{ url('page/5') }}">@lang('frontend.studentinfochart')</a></li>


         </div>
       </ul>
     </li>











     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      @lang('frontend.co_curricular')
      </a>
      <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width: 514px;  max-width:100%;">

        <div class="row">
            @php
            use App\Models\CoCurriculamActivity;
            $first_seven = CoCurriculamActivity::take(7)->get();
            $last_seven = CoCurriculamActivity::skip(7)->take(7)->get();
            @endphp
          <div class="col-md-6 col-12 dmenu mt-3">
            @if($first_seven)
            @foreach ($first_seven as $v)
            <li><a href="{{ url('view_cocurriculam') }}/{{$v->id}}">@if($lang == 'en'){{$v->title ?: $v->title_bn}}@else {{$v->title_bn ?: $v->title}}@endif</a></li>
            @endforeach
            @endif
          </div>

          <div class="col-md-6 col-12 dmenu mt-3">
            @if($last_seven)
            @foreach ($last_seven as $v)
            <li><a href="{{ url('view_cocurriculam') }}/{{$v->id}}">@if($lang == 'en'){{$v->title ?: $v->title_bn}}@else {{$v->title_bn ?: $v->title}}@endif</a></li>
            @endforeach
            @endif
          </div>



        </div>



      </ul>
    </li>


    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @lang('frontend.admission_information')
      </a>
      <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink">

        <div class="col-md-12 col-12 dmenu mt-3">

         <li><a href="{{ url('admissionInfo/3') }}">@lang('frontend.prospectus')</a></li>
         <li><a href="{{ url('admissionInfo/2') }}">@lang('frontend.admission_rules')</a></li>
         <li><a href="{{ url('admissionInfo/4') }}">@lang('frontend.admission_procedure')</a></li>
         <li><a href="{{ url('admissionInfo/5') }}">@lang('frontend.admission_test_result')</a></li>
         <li><a href="{{ url('admissionInfo/6') }}">@lang('frontend.admission_test_questions')</a></li>


       </div>
     </ul>
   </li>


   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    @lang('frontend.exam_information')
    </a>
    <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink">

      <div class="col-md-12 col-12 dmenu mt-3">
       <li><a href="{{ url('page/12') }}">@lang('frontend.exam_rules')</a></li>
       <li><a href="{{ url('examroutines') }}">@lang('frontend.examroutines')</a></li>
       <li><a href="{{ url('examsyllabus') }}">@lang('frontend.examsyllabus')</a></li>
       <!--<li><a href="{{ url('examsuggession') }}">@lang('frontend.examsuggession')</a></li>-->

     </div>
   </ul>
 </li>




 <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  @lang('frontend.gallery')
  </a>
  <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width: 150px; max-width:100%;">

    <div class="col-md-12 col-12 dmenu mt-3">
      <li><a href="{{ url('photogallery') }}">@lang('frontend.photogallery')</a></li>
      <li><a href="{{ url('videogallery') }}">@lang('frontend.videogallery')</a></li>
    </div>
  </ul>
</li>


<!--<li class="nav-item">-->
<!--    <a class="nav-link" href="{{ url('complainbox') }}">@lang('frontend.complainbox')</a>-->
<!--</li>-->

</ul>

</div>
</nav>





</div>
</div><!-------------------End Container-------------------->







<div id="offcanvas-slide" id="offcanvas-slide" uk-offcanvas="flip: false; overlay: true;">
  <div class="uk-offcanvas-bar d-block sidemenu" id="mobilemenuoff" style="transition: 0.9s; border:none; background-color: #000; font-size: 13px!important;">
   <button class="uk-offcanvas-close" type="button" style="top:6px; color: #fff;" uk-close></button>
   <br><br>


   <ul class="uk-nav-parent-icon p-3" uk-nav duration='800'>

     <li><a href=""><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.home')</a></li>


     <li class="uk-parent">
      <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.institute_introduction')</a>
      <ul class="uk-nav-sub">
        <li><a href="{{ url('page/6') }}">@lang('frontend.infrastructure')</a></li>
        <li><a href="{{ url('page/7') }}">@lang('frontend.yearly_working_plan')</a></li>
        <li><a href="{{ url('page/8') }}">@lang('frontend.contact')</a></li>
        <li><a href="{{ url('page/1') }}">@lang('frontend.about_us')</a></li>
        <li><a href="{{ url('page/2') }}">@lang('frontend.mission_vision')</a></li>
        <li><a href="{{ url('page/3') }}">@lang('frontend.history')</a></li>
        <li><a href="{{ url('page/4') }}">@lang('frontend.citizen_charter')</a></li>
        @if($setting->type == 'school')
        <li><a href="#">@lang('frontend.teaching_permission_recognition')</a></li>
        <li><a href="#">@lang('frontend.mpo_nationalization_info')</a></li>
        @endif
      </ul>
    </li>





    <li class="uk-parent">
      <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.administrative_information') </a>
      <ul class="uk-nav-sub">
      <li><a href="{{ url('principal_message') }}">
        @if($setting->type == 'school')
        @lang('frontend.principal_message')
        @else
        @lang('frontend.principal_message')
        @endif
        </a></li>
        @if($setting->type == 'madrasah')
        <li><a href="{{ url('presidentmessage') }}">@lang('frontend.presidentmessage') </a></li>
        @elseif($setting->type == 'school')
        <li><a href="{{ url('presidentmessage') }}">@lang('frontend.presidentmessage') </a></li>
        <li><a href="{{ url('managing_comitte') }}">@lang('frontend.managing_comitte')</a></li>
        <li><a href="{{ url('presidents') }}">@lang('frontend.presidents')</a></li>
        <li><a href="{{ url('donar') }}">@lang('frontend.donar')</a></li>
        <li><a href="{{ url('ex_member') }}">@lang('frontend.ex_member')</a></li>
        @endif

        @if($setting->type == 'college' || $setting->type == 'madrasah')
        <li><a href="{{ url('vice_principal_messages') }}">@lang('frontend.vice_principal_message') </a></li>
        <li><a href="{{ url('principles') }}">@lang('frontend.principles')</a></li>
        <li><a href="{{ url('viceprinciples') }}">@lang('frontend.viceprinciples')</a></li>
        @endif
      </ul>
    </li>





    <li class="uk-parent">
      <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.teachers_and_staff') </a>
      <ul class="uk-nav-sub">
        <li><a href="{{ url('teacherinfo') }}">@lang('frontend.teacherinfo')</a></li>
        <li><a href="{{ url('staffinfo') }}">@lang('frontend.staffinfo')</a></li>
      </ul>
    </li>





    @if($setting->type == 'school')
    <li class="uk-parent">
      <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.student')</a>
      <ul class="uk-nav-sub">

        {{--
          <li><a href="{{url('gender_wise_student_list')}}">@lang('frontend.class_gender_based_education')</a></li>
        <li><a href="{{url('section_wise_student_list')}}">@lang('frontend.section_wise_student')</a></li>
          --}}

        <li><a href="{{url('gender_wise_students')}}">@lang('frontend.class_gender_based_education')</a></li>
        <li><a href="{{url('section_wise_students')}}">@lang('frontend.section_wise_student')</a></li>

        <li><a href="#">@lang('frontend.student_attendance')</a></li>
        @php
        $class = DB::connection('mysql_second')->table('add_class')->get();
        @endphp
        @if($class)
        @foreach ($class as $c)
        @php
        $count_student = DB::connection('mysql_second')->table('running_student_info')->where('class_id',$c->id)->count();
        @endphp
        @if($count_student > 0)
        <li><a href="#">{{$c->class_name}}</a></li>
        @endif
        @endforeach
        @endif
     </ul>
   </li>
   @endif


   <li class="uk-parent">
      <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.academic_information')</a>
      <ul class="uk-nav-sub">
       <li><a href="{{ url('page/9') }}">@lang('frontend.rules_regulation')</a></li>
       <li><a href="{{ url('academiccalenders') }}">@lang('frontend.academiccalenders')</a></li>
       <li><a href="{{ url('classroutines') }}">@lang('frontend.classroutines')</a></li>
       <li><a href="{{ url('holidaylists') }}">@lang('frontend.holidaylists')</a></li>
       <li><a href="{{ url('page/10') }}">@lang('frontend.uniform')</a></li>
       <li><a href="{{ url('page/11') }}">@lang('frontend.fees')</a></li>
       <li><a href="{{ url('page/5') }}">@lang('frontend.studentinfochart')</a></li>
     </ul>
   </li>



   <li class="uk-parent">
    <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.co_curricular')</a>
    <ul class="uk-nav-sub">
      <li><a href="{{ url('page/13') }}">@lang('frontend.sports_activities')</a></li>
      <li><a href="{{ url('page/14') }}">@lang('frontend.cultural_activities')</a></li>
      <li><a href="{{ url('page/15') }}">@lang('frontend.scouts')</a></li>
      <li><a href="{{ url('page/18') }}">@lang('frontend.red_crescent')</a></li>
      <li><a href="{{ url('page/22') }}">@lang('frontend.educational_tour')</a></li>
      <li><a href="{{ url('page/19') }}">@lang('frontend.student_cabinet')</a></li>
      <li><a href="{{ url('page/20') }}">@lang('frontend.debating_club')</a></li>
      <li><a href="{{ url('page/21') }}">@lang('frontend.language_club')</a></li>
      <li><a href="{{ url('page/23') }}">@lang('frontend.science_fair')</a></li>
    </ul>
  </li>





  <li class="uk-parent">
    <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.admission_information')</a>
    <ul class="uk-nav-sub">


      <li><a href="{{ url('admissionInfo/3') }}">@lang('frontend.prospectus')</a></li>
      <li><a href="{{ url('admissionInfo/2') }}">@lang('frontend.admission_rules')</a></li>
      <li><a href="{{ url('admissionInfo/4') }}">@lang('frontend.admission_procedure')</a></li>
      <li><a href="{{ url('admissionInfo/5') }}">@lang('frontend.admission_test_result')</a></li>
      <li><a href="{{ url('admissionInfo/6') }}">@lang('frontend.admission_test_questions')</a></li>




    </ul>
  </li>






  <li class="uk-parent">
    <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.exam_information')</a>
    <ul class="uk-nav-sub">
     <li><a href="{{ url('page/12') }}">@lang('frontend.exam_rules')</a></li>
     <li><a href="{{ url('examroutines') }}">@lang('frontend.examroutines')</a></li>
     <li><a href="{{ url('examsyllabus') }}">@lang('frontend.examsyllabus')</a></li>
     <!--<li><a href="{{ url('examsuggession') }}">@lang('frontend.examsuggession')</a></li>-->
   </ul>
 </li>


 <li class="uk-parent">
  <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.gallery')</a>
  <ul class="uk-nav-sub">
    <li><a href="{{ url('photogallery') }}">@lang('frontend.photogallery')</a></li>
    <li><a href="{{ url('videogallery') }}">@lang('frontend.videogallery')</a></li>
  </ul>
</li>

<!--<li class="nav-item">-->
<!--    <a class="nav-link" href="{{ url('complainbox') }}">@lang('frontend.complainbox')</a>-->
<!--</li>-->



</ul>


</div>
</div> <!----------------End Mobile Menu------------->







@yield('content')




<div class="container">
  <div class="col-sm-12 col-12 bg-white p-0 pt-5">
    <img src="{{ asset('/') }}frontend/img/footer_top_bg.png" class="img-fluid w-100">
  </div>


  <div class="col-sm-12 col-12 developerdiv">

    <center>
      <span class="develop">@lang('frontend.crights') © <?php echo date('Y'); ?> @if($lang == 'en'){{ $setting->name }}@elseif($lang == 'bn'){{ $setting->name_bangla }}@endif @lang('frontend.rights')</span><br>
      <span class="develop">@lang('frontend.drights')</span>&nbsp;&nbsp;<a href="http://sbit.com.bd" target="blank" class="it">@lang('frontend.sbit')</a></center>

    </div>

  </div>


  <!-----------end develop by---------->




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


  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
