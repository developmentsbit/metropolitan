@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('setting.edittitle')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>@lang('setting.edittitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('setting.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row myinput mt-4">
						<center>
							<img src="{{ asset($data->image) }}" style="max-height: 100px;">
						</center>
						<div class="form-group mb-3 col-md-6" style="margin: 0 auto;">
							<label>@lang('setting.image'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="file" name="image" id="image">
								<br>
							</div>
						</div>
					</div>
					<div class="row myinput">
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.name'):</label>
							<div class="input-group mt-2">
								<input type="text" class="form-control" name="name"  value="{{ $data->name }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.name_bangla'):</label>
							<div class="input-group mt-2">
								<input type="text" class="form-control" name="name_bangla"  value="{{ $data->name_bangla }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.email'):</label>
							<div class="input-group mt-2">
								<input type="text" class="form-control" name="email"  value="{{ $data->email }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.phone'):</label>
							<div class="input-group mt-2">
								<input type="text" class="form-control" name="phone"  value="{{ $data->phone }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.established'):</label>
							<div class="input-group mt-2">
								<input type="text" class="form-control" name="established"  value="{{ $data->established }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.established_bangla'):</label>
							<div class="input-group mt-2">
								<input type="text" class="form-control" name="established_bangla"  value="{{ $data->established_bangla }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.established'):</label>
							<div class="input-group mt-2">
								<input type="text" class="form-control" name="established"  value="{{ $data->established }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.established_bangla'):</label>
							<div class="input-group mt-2">
								<input type="text" class="form-control" name="established_bangla"  value="{{ $data->established_bangla }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.eiin'):</label>
							<div class="input-group mt-2">
								<input type="text" class="form-control" name="eiin"  value="{{ $data->eiin }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.eiin_bangla'):</label>
							<div class="input-group mt-2">
								<input type="text" class="form-control" name="eiin_bangla"  value="{{ $data->eiin_bangla }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.meta'):</label>
							<div class="input-group mt-2">
								<input type="text" class="form-control" name="meta"  value="{{ $data->meta }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.meta_title'):</label>
							<div class="input-group mt-2">
								<input type="text" class="form-control" name="meta_title"  value="{{ $data->meta_title }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.description'):</label>
							<div class="input-group mt-2">
								<textarea  class="form-control w-100" rows="5" type="text" name="description">{{ $data->description }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.map'):</label>
							<div class="input-group mt-2">
								<textarea  class="form-control w-100" rows="5" type="text" name="map">{{ $data->map }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.page'):</label>
							<div class="input-group mt-2">
								<textarea  class="form-control w-100" rows="5" type="text" name="page">{{ $data->page }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('setting.youtube'):</label>
							<div class="input-group mt-2">
								<textarea  class="form-control w-100" rows="5" type="text" name="youtube">{{ $data->youtube }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('setting.address'):</label>
							<div class="input-group mt-2">
								<textarea  class="form-control w-100" rows="5" type="text" name="address">{{ $data->address }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('setting.address_bangla'):</label>
							<div class="input-group mt-2">
								<textarea  class="form-control w-100" rows="5" type="text" name="address_bangla">{{ $data->address_bangla }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('setting.type'):</label>
							<div class="input-group mt-2">
								<select class="form-control" name="type">
									<option @if($data->type == 'school') selected @endif value="school">School</option>
									<option @if($data->type == 'college') selected @endif value="college">College</option>
									<option @if($data->type == 'madrasah') selected @endif value="madrasah">Madrasah</option>
								</select>
							</div>
						</div>
						<div class="modal-footer border-0">
							<button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('common.close')</button>
							<button type="submit" class="btn btn-success button border-0">@lang('common.update')</button>
						</div>
					</div>
				</form>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>



<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>



@endsection

