@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('admissioninfo.edittitle')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('role', 'create'))
                @slot('action_button1')
                <i class="fa fa-eye"></i> @lang('common.view')
                @endslot
                @slot('action_button1_link')
                    {{ route('admissioninfo.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<h3>@lang('admissioninfo.edittitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('admissioninfo.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row myinput">
						<div class="form-group mb-3 col-md-6">
							<label>@lang('admissioninfo.type'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="type" required="">
									@if($data->type == 1)
									<option value="1">@lang('admissioninfo.prospects')</option>
									<option value="2">@lang('admissioninfo.admission_system')</option>
									<option value="3">@lang('admissioninfo.admission_rules')</option>
									<option value="4">@lang('admissioninfo.admission_result')</option>
									<option value="5">@lang('admissioninfo.admission_question')</option>
									@endif
									@if($data->type == 2)
									<option value="2">@lang('admissioninfo.admission_system')</option>
									<option value="1">@lang('admissioninfo.prospects')</option>
									<option value="3">@lang('admissioninfo.admission_rules')</option>
									<option value="4">@lang('admissioninfo.admission_result')</option>
									<option value="5">@lang('admissioninfo.admission_question')</option>
									@endif
									@if($data->type == 3)
									<option value="3">@lang('admissioninfo.admission_rules')</option>
									<option value="1">@lang('admissioninfo.prospects')</option>
									<option value="2">@lang('admissioninfo.admission_system')</option>
									<option value="4">@lang('admissioninfo.admission_result')</option>
									<option value="5">@lang('admissioninfo.admission_question')</option>
									@endif
									@if($data->type == 4)
									<option value="4">@lang('admissioninfo.admission_result')</option>
									<option value="1">@lang('admissioninfo.prospects')</option>
									<option value="2">@lang('admissioninfo.admission_system')</option>
									<option value="3">@lang('admissioninfo.admission_rules')</option>
									<option value="5">@lang('admissioninfo.admission_question')</option>
									@endif
									@if($data->type == 5)
									<option value="5">@lang('admissioninfo.admission_question')</option>
									<option value="1">@lang('admissioninfo.prospects')</option>
									<option value="2">@lang('admissioninfo.admission_system')</option>
									<option value="3">@lang('admissioninfo.admission_rules')</option>
									<option value="4">@lang('admissioninfo.admission_result')</option>
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('admissioninfo.date'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="date" name="date" id="date"  required="" value="{{ $data->date }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('admissioninfo.title'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="title" id="title"  required="" value="{{ $data->title }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('admissioninfo.title_bn'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="title_bn" id="title_bn"  required="" value="{{ $data->title_bn }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('admissioninfo.image'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="file" name="image" id="image">
								<br>
							</div>
							<a href="{{ asset($data->image) }}" download="" class="btn btn-info">@lang('common.downloads')</a>
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

