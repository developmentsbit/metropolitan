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
										<ul class="menus" style="margin-top: -22px;">
											<li><i class="fa fa-caret-right"></i><a href="{{ url('principal_message') }}">
											@if($setting->type == 'school')
											@lang('frontend.principal_message')
											@else
											@lang('frontend.principal_message')
											@endif
											</a></li>
											@if($setting->type == 'madrasah')
											<li><i class="fa fa-caret-right"></i><a href="{{ url('presidentmessage') }}">@lang('frontend.presidentmessage') </a></li>
											@elseif($setting->type == 'school')
											<li><i class="fa fa-caret-right"></i><a href="{{ url('presidentmessage') }}">@lang('frontend.presidentmessage') </a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('managing_comitte') }}">@lang('frontend.managing_comitte')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('presidents') }}">@lang('frontend.presidents')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('donar') }}">@lang('frontend.donar')</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('ex_member') }}">@lang('frontend.ex_member')</a></li>
											@endif

											@if($setting->type == 'college' || $setting->type == 'madrasah')
											<li><i class="fa fa-caret-right"></i><a href="{{ url('vice_principal_messages') }}">@lang('frontend.vice_principal_message') </a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('principles') }}">@lang('frontend.principles')</a></li>
											@endif

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



						{{--
							<div class="col-12 mt-4">
							<iframe width="100%" height="400" src="https://www.youtube.com/embed/ZZpp4WMokZ0" title="FENI GOVERNMENT COLLEGE Documentary." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
						</div>
						--}}







						<!-------------------------------------End Full Card---------------------------------->








					</div>
				</div>
			</div><!-----------------------End Mainpage---------------------->


			@include('frontend.sidebar')



		</div><!-------End Container----------->



		@endsection
