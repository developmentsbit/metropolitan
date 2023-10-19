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

									<tr>
										<td>@lang('frontend.profession')</td>
										<td align="center">:</td>
										<td>{{ $data->profession }}</td>
									</tr>


									<tr>
										<td>@lang('frontend.father_name')</td>
										<td align="center">:</td>
										<td>{{ $data->father_name }}</td>
									</tr>	


									<tr>
										<td>@lang('frontend.mother_name')</td>
										<td align="center">:</td>
										<td>{{ $data->mother_name }}</td>
									</tr>	


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
										<td>@lang('frontend.duration')</td>
										<td align="center">:</td>
										<td>{{ $data->duration }}</td>
									</tr>


									<tr>
										<td>@lang('frontend.adress')</td>
										<td align="center">:</td>
										<td>{{ $data->address }}</td>
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

