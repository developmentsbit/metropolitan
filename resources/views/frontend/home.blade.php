@extends('frontend.index')
@section('content')
@php
$setting = DB::table("setting")->first();
@endphp
<div class="container">
	<div class="col-sm-12 col-12" id="mainpage">
		<div class="row">
			<div class="col-sm-9 col-12">
				<div class="col-sm-12 col-12 mt-3 p-0 pb-2 cnotice">
					<div class="row">
						<div class="col-md-2 col-12 d-sm-block d-none">
							<img src="{{ asset('/') }}frontend/img/notice.png" class="img-fluid">
						</div>
						<div class="col-md-10 col-11 pt-3 p-4">
							<b>@lang('frontend.notice_board')</b><br>
							<div class="mt-3">
								@if(isset($notice))
								@foreach($notice as $n)
								{{-- <li><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<a href="{{ url('noticesdetails',$n->id)  }}" >@if($lang == 'en'){{$n->title}}@elseif($lang == 'bn'){{$n->title_bn}}@endif</a></li> --}}
								<li><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<a href="{{ url('noticesdetails',$n->id)  }}" >@if($lang == 'en'){{$n->title ?: $n->title_bn}}@else {{$n->title_bn ?: $n->title}}@endif</a></li>
								@endforeach
								@endif
							</div>
							<div class="">
								<a href="{{ url("allnotices") }}" class="float-right all">@lang('frontend.all')</a>
							</div>
						</div>
					</div>
				</div><!-------------End Notice---------->

                @if(count($facility) > 0)
                <div class="text-center mt-2 sec-div">
                    <h5>@lang('frontend.facilities')</h5>
                </div>
                <!--  facilites area start -->
                <div class="facility_area mt-3">
                    <div class="row">
                        @foreach ($facility as $f)
                        <div class="col-xl-4 col-lg-4 col-md-4" id="FacBox">
                            <a href="{{url('view_facility')}}/{{$f->id}}"><b>@if($lang == 'en'){{$f->title ?: $f->title_bn}}@else {{$f->title_bn ?: $f->title}}@endif</b></a>
                            <br>
                            <span>
                                @if($lang == 'en')
                                {{Str::limit($f->description,'30') ?: Str::limit($f->description_bn,'30')}}
                                @else
                                {{Str::limit($f->description_bn,'30') ?: Str::limit($f->description,'30')}}
                                @endif
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                <!--  facilites area end -->

                @if(count($activity) > 0)
                <div class="text-center mt-2 sec-div">
                    <h5>@lang('frontend.co_curriculum')</h5>
                </div>
                <!-- activity area start -->
                <div class="uk-position-relative uk-visible-toggle uk-light mt-4" tabindex="-1" uk-slider="autoplay: true finite: true autoplay-interval: 2000">

                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m">
                        @foreach ($activity as $v)
                        <a href="{{url('/view_cocurriculam')}}/{{$v->id}}">
                            <li class="slideBox">
                                <img src="{{asset('co_curriculum')}}/{{$v->image}}" width="200" height="400" alt="">
                                {{-- <div class="uk-position-center uk-panel"><h1>1</h1></div> --}}
                            </li>
                        </a>
                        @endforeach
                    </ul>

                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>

                </div>
                <!-- activity area end -->
                @endif


                @if(count($principals) > 0)
                <div class="text-center mt-2 sec-div">
                    <h5>@lang('frontend.pricnipals')</h5>
                </div>
                <!-- activity area start -->
                <div class="uk-position-relative uk-visible-toggle uk-light mt-4" tabindex="-1" uk-slider="autoplay: true finite: true autoplay-interval: 2000">

                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m">
                        @foreach ($principals as $v)
                        <a href="{{url('/memberdetails')}}/{{$v->id}}">
                            <li class="slideBox">
                                <img src="{{asset($v->image)}}" width="200" height="400" alt="" style="height: 200px;width:350px;">
                                <div class="text-center" style="color: black !important;">
                                    <b style="font-size: 13px;">{{$v->name}}</b><br>
                                    <span style="font-size: 15px;">{{$v->designation}}</span>
                                </div>
                            </li>
                        </a>
                        @endforeach
                    </ul>

                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>

                </div>
                <!-- activity area end -->
                @endif

				@php
				$about = DB::table("pages")->where('id',1)->first();
				@endphp
				{{-- <div class="col-md-12 col-12 p-0 mt-3 about">
					<ul class="list-group p-0">
						<li class="list-group-item" id="header">@lang('frontend.introduction')</li>
						<div class="details2 p-2 border">
							@if($lang == 'en'){!! Str::limit($about->details,'500')!!}@else {!! Str::limit($about->details_bn,'500')!!} @endif
                            <div class="mt-2">
                                <a href="{{url('page/1')}}" class="btn btn-sm btn-success">@lang('frontend.read_more')</a>
                            </div>
						</div>

					</ul>
				</div> --}}

				<div class="col-sm-12 col-12 p-0">
					<div class="row">
						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;@lang('frontend.about_us')</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/1.jpg" class="img-fluid" id="iconss">
									</div>
									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">
											<li><i class="fa fa-caret-right"></i><a href="{{ url('page/1') }}">@lang('frontend.about_institute')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('page/2') }}">@lang('frontend.mission_vision')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('page/3') }}">@lang('frontend.history')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('page/8') }}">@lang('frontend.contact')</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->
						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;@lang('frontend.administrative_information')</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/2.jpg" class="img-fluid" id="iconss">
									</div>

									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">
											<li><i class="fa fa-caret-right"></i><a href="{{ url('presidentmessage') }}">@lang('frontend.presidentmessage') </a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('vice_principal_messages') }}">@lang('frontend.vicepresidentmessage') </a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('principal_message') }}">@lang('frontend.principal_message')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('principles') }}">@lang('frontend.principles')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('viceprinciples') }}">@lang('frontend.viceprinciples')</a></li>
											{{-- <li><i class="fa fa-caret-right"></i><a href="{{ url('managing_comitte') }}">@lang('frontend.managing_comitte')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('presidentmessage') }}">@lang('frontend.presidentmessage') </a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('presidents') }}">@lang('frontend.presidents')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('donar') }}">@lang('frontend.donar')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('ex_member') }}">@lang('frontend.ex_member')</a></li> --}}
										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->
						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;@lang('frontend.teachers_and_staff')</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/3.jpg" class="img-fluid" id="iconss">
									</div>

									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/teacherinfo') }}">@lang('frontend.teacherinfo')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/staffinfo') }}">@lang('frontend.staffinfo')</a></li>
											{{-- <li><i class="fa fa-caret-right"></i><a href="{{ url('/ex_member') }}" target="blank">@lang('frontend.ex_member')</a></li> --}}
										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->
						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;@lang('frontend.academic_information')</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/4.jpg" class="img-fluid" id="iconss">
									</div>
									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/allnotices') }}">@lang('frontend.notice_board')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/events') }}">@lang('frontend.events')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/page/26') }}">@lang('frontend.library')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/page/27') }}">@lang('frontend.dormitory')</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->
						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;@lang('frontend.exam_information')</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/5.jpg" class="img-fluid" id="iconss">
									</div>

									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">
											<li><i class="fa fa-caret-right"></i><a href="{{ url('page/12') }}">@lang('frontend.exam_rules')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('examroutines') }}">@lang('frontend.examroutines')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('examsyllabus') }}">@lang('frontend.examsyllabus')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('examsuggession') }}">@lang('frontend.examsuggession')</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->
						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;@lang('frontend.result')</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/6.jpg" class="img-fluid" id="iconss">
									</div>
									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">
											<li><i class="fa fa-caret-right"></i><a href="">@lang('frontend.internal_results')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="https://eboardresults.com/v2/home" target="blank">@lang('frontend.public_exam_result')</a></li>
											{{-- <li><i class="fa fa-caret-right"></i><a href="">@lang('frontend.scholarship')</a></li> --}}
										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->
						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;@lang('frontend.gallery')</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/7.jpg" class="img-fluid" id="iconss">
									</div>

									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">

											<li><i class="fa fa-caret-right"></i><a href="{{ url('/photogallery') }}">@lang('frontend.photogallery')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/videogallery') }}">@lang('frontend.videogallery')</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->
						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;@lang('frontend.others')</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/3.jpg" class="img-fluid" id="iconss">
									</div>
									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">
											<li><i class="fa fa-caret-right"></i><a  href="{{ url('page/13') }}">@lang('frontend.sports_activities')</a></li>
											<li><i class="fa fa-caret-right"></i><a  href="{{ url('page/14') }}">@lang('frontend.cultural_activities')</a></li>
											<li><i class="fa fa-caret-right"></i><a  href="{{ url('page/15') }}">@lang('frontend.scouts')</a></li>
											<li><i class="fa fa-caret-right"></i><a  href="{{ url('page/21') }}">@lang('frontend.language_club')</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->
						@php
						$setting = DB::table("setting")->first();
						@endphp
						<div class="col-12 mt-4">
							<iframe width="100%" height="400" src="{{ $setting->youtube }}" title="METROPOLITAN SCHOOL & COLLEGE Documentary." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
						</div>
						<!-------------------------------------End Full Card---------------------------------->
					</div>
				</div>
			</div><!-----------------------End Mainpage---------------------->
			@include('frontend.sidebar')
		</div>

		<!-- pop up window -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content" style="background: transparent;">
					<div class="modal-header" style="border: none;padding: 6px 17px 13px 0px;">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" style="margin-top: -25px;">
					@if(isset($banner))
					@foreach($banner as $b)
					<a href="{{url('about_admission')}}"><img src="{{asset('/assets/images/admission_banner/')}}/{{$b->image}}" height="auto" width="100%"></a>
					@endforeach
					@endif
					</div>
				</div>
			</div>
		</div>
        <!-------End Container----------->
		@endsection
