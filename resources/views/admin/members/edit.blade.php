@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('member.addtitle')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('role', 'create'))
                @slot('action_button1')
                    @lang('common.view')
                @endslot
                @slot('action_button1_link')
                    {{ route('members.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>@lang('member.edittitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('members.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row myinput">
						<div class="form-group mb-3 col-md-3">
							<label>@lang('member.type'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="type">
									@if($data->type == 1)
									<option value="1">Principle</option>
									<option value="2">Chairman</option>
									<option value="3">Managing Committee</option>
									<option value="4">Donar</option>
									<option value="5">Ex-Member</option>
									@endif
									@if($data->type == 2)
									<option value="2">Chairman</option>
									<option value="1">Principle</option>
									<option value="3">Managing Committee</option>
									<option value="4">Donar</option>
									<option value="5">Ex-Member</option>
									@endif
									@if($data->type == 3)
									<option value="3">Managing Committee</option>
									<option value="1">Principle</option>
									<option value="2">Chairman</option>
									<option value="4">Donar</option>
									<option value="5">Ex-Member</option>
									@endif
									@if($data->type == 4)
									<option value="4">Donar</option>
									<option value="1">Principle</option>
									<option value="2">Chairman</option>
									<option value="3">Managing Committee</option>									
									<option value="5">Ex-Member</option>
									@endif
									@if($data->type == 5)
									<option value="5">Ex-Member</option>
									<option value="1">Principle</option>
									<option value="2">Chairman</option>
									<option value="3">Managing Committee</option>
									<option value="4">Donar</option>
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-9">
							<label>@lang('member.name'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="name" id="name"  required="" value="{{ $data->name }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('member.father'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="father_name" id="father_name" value="{{ $data->father_name }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('member.mother'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="mother_name" id="mother_name" value="{{ $data->mother_name }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('member.designation'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="designation" id="designation" value="{{ $data->designation }}" required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('member.profession'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="profession" id="profession" value="{{ $data->profession }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('member.duration'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="duration" id="duration" value="{{ $data->duration }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('member.mobile'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="mobile" id="mobile"  required="" value="{{ $data->mobile }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('member.email'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="email" id="email"  value="{{ $data->email }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('member.address'): </label>
							<div class="input-group mt-2">
								<textarea  class="form-control w-100" rows="5" type="text" name="address" >{{ $data->address }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('member.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="status">
									@if($data->status == 1)
									<option value="1">Active</option>
									<option value="2">Inactive</option>
									@else
									<option value="2">Inactive</option>
									<option value="1">Active</option>
									
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('member.image'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="file" name="image" id="image">
							</div>
							@if(isset($data->image))
							<img src="{{ asset($data->image) }}" class="img-fluid" style="max-height: 100px;">
							@endif
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

