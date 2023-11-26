@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('about_admission.addtitle')
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
                    {{ route('aboutadmission.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>@lang('about_admission.addtitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('aboutadmission.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="row myinput">
						<div class="form-group mb-3 col-md-12">
                            <label class="col-sm-4 col-form-label">@lang('common.date') :</label>
                            <input type="text" name="date" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" value="{{ old('date') }}" required>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('about_admission.title_en'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="title" id="title">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('about_admission.title_bn'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="title_bn" id="title_bn">
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('about_admission.image'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="file" name="image" id="image">
							</div>
						</div>
						<div class="modal-footer border-0">
							<button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('common.close')</button>
							<button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
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

