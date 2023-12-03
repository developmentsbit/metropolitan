@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('ex_Principal_vice_principal.addtitle')
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
                    {{ route('ex_Principal_vice_principal.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>@lang('ex_Principal_vice_principal.edittitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('ex_Principal_vice_principal.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row myinput">
						<div class="form-group mb-3 col-md-3">
							<label>@lang('ex_Principal_vice_principal.type'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
                                <select class="form-control" name="type">
                                    <option @if($data->type == 1) selected @endif value="1">@lang('ex_Principal_vice_principal.principal')</option>
									<option @if($data->type == 2) selected @endif value="2">@lang('ex_Principal_vice_principal.vice_principal')</option>
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-9">
							<label>@lang('ex_Principal_vice_principal.name'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="name" id="name" value="{{ $data->name }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('ex_Principal_vice_principal.father'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="father_name" id="father_name" value="{{ $data->father_name }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('ex_Principal_vice_principal.mother'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="mother_name" id="mother_name" value="{{ $data->mother_name }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('ex_Principal_vice_principal.designation'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="designation" id="designation" value="{{ $data->designation }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('ex_Principal_vice_principal.profession'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="profession" id="profession" value="{{ $data->profession }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('ex_Principal_vice_principal.duration'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="duration" id="duration" value="{{ $data->duration }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('ex_Principal_vice_principal.mobile'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="mobile" id="mobile" value="{{ $data->mobile }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('ex_Principal_vice_principal.email'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="email" id="email"  value="{{ $data->email }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('ex_Principal_vice_principal.address'): </label>
							<div class="input-group mt-2">
								<textarea  class="form-control w-100" rows="5" type="text" name="address" >{{ $data->address }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('ex_Principal_vice_principal.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
                                <select class="form-control" name="status">
                                    <option @if($data->status == 1) selected @endif value="1">@lang('common.active')</option>
									<option @if($data->status == 2) selected @endif value="2">@lang('common.inactive')</option>
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('ex_Principal_vice_principal.image'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="file" name="image" id="image">
							</div>
							@if(isset($data->image))
							<img src="{{ asset('assets/images/ex_Principal_vice_principal/')}}/{{$data->image}}" class="img-fluid" style="max-height: 100px;">
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

