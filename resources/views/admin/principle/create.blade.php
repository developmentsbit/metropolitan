@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('principle.addtitle')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('role', 'create'))
                @slot('action_button1')
                 <i class="fa fa-eye"></i>   @lang('common.view')
                @endslot
                @slot('action_button1_link')
                    {{ route('principle.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<h3>@lang('principle.addtitle')</h3><br>
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<form method="post" class="btn-submit" action="{{ route('principle.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="row myinput">
						<div class="form-group mb-3 col-md-4">
							<label>@lang('principle.type'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="type">
									<option value="1">@lang('principle.principal')</option>
									<option value="2">@lang('principle.president')</option>
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('principle.name'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="name" id="name"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('principle.name_bn'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="name_bn" id="name_bn">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('principle.details'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<textarea id="summernote"  class="form-control w-100" rows="10" type="text" name="details" required=""></textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('principle.details_bn'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote1"  class="form-control w-100" rows="10" type="text" name="details_bn"></textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('principle.image'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="file" name="image" id="image"  required="">
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

