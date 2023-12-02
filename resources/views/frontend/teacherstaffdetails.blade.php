@extends('frontend.index')
@section('content')



<div class="container">
	<div class="col-sm-12 col-12" id="mainpage">
		<div class="row">

			<div class="col-sm-9 col-12">
				@if(isset($data))

				<div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
					<ul class="list-group p-0">
						<li class="list-group-item font-weight-bold bg-success text-light" id="about">

							{{ $data->name }}
						</li>
					</ul>
					<li class="list-group-item">


						<center>
							<div class="col-sm-12">

								<img src="{{ url($data->image) }}" style="height: 200px;border-radius:10%;border:1px solid black;"> 
							</div> 
						</center> 
						<hr>

						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<tbody>
									<tr>
										<td width="100">@lang('frontend.name')</td>
										<td width="3" align="center">:</td>
										<td width="230">{{ $data->name }}</td>
									</tr>

									<tr>
										<td>@lang('frontend.designation')</td>
										<td align="center">:</td>
										<td>{{ $data->designation }}</td>
									</tr>


									<!--<tr>-->
										<!--	<td>Father's Name</td>-->
										<!--	<td align="center">:</td>-->
										<!--	<td>মোহাম্মদ সামছুল আলম</td>-->
										<!--</tr>	-->


										<!--<tr>-->
											<!--	<td>Mother's Name</td>-->
											<!--	<td align="center">:</td>-->
											<!--	<td>আমেনা বেগম</td>-->
											<!--</tr>	-->


											<tr>
												<td>@lang('frontend.mobile')</td>
												<td align="center">:</td>
												<td>{{ $data->mobile }}</td>
											</tr>

											<tr>
												<td>@lang('frontend.mail')</td>
												<td align="center">:</td>
												<td>{{ $data->email }}</td>
											</tr>	

											<tr>
												<td>@lang('frontend.gender')</td>
												<td align="center">:</td>
												<td>{{ $data->gender }}</td>
											</tr>

											<tr>
												<td>@lang('frontend.blood_group')</td>
												<td align="center">:</td>
												<td>{{ $data->blood }}</td>
											</tr>
											<tr>
												<td>@lang('frontend.religion')</td>
												<td align="center">:</td>
												<td>{{ $data->religion }}</td>
											</tr>

											<!--<tr>-->
												<!--	<td>Relationship</td>-->
												<!--	<td align="center">:</td>-->
												<!--	<td>Married</td>-->
												<!--</tr>-->

												<tr>
													<td>@lang('frontend.join_date')</td>
													<td align="center">:</td>
													<td>{{ $data->join_date }}</td>
												</tr>


												<tr>
													<td>@lang('frontend.present_adress')</td>
													<td align="center">:</td>
													<td>{{ $data->present_address }}</td>
												</tr>


												<tr>
													<td>@lang('frontend.permenant_adress')</td>
													<td align="center">:</td>
													<td>{{ $data->parmanent_address }}</td>
												</tr>



												<tr>
													<td>@lang('frontend.education')</td>
													<td align="center">:</td>
													<td><p><font color="#333333" face="Roboto, sans-serif">{!! $data->education !!}</font></p></td>
												</tr>	


											</tbody>
										</table>
									</div>





								</li>



							</div>

							@else
							Not Found...
							@endif
						</div>



						@include('frontend.sidebar')





					</div>
				</div>
			</div>





			@endsection

