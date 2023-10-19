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
                  <i class="fa fa-eye"></i>  @lang('common.view')
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
				<h3>@lang('member.addtitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('members.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="row myinput">
						<div class="form-group mb-3 col-md-3">
							<label>@lang('member.type'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="type">
									<option value="1">@lang('member.principal')</option>
									<option value="2">@lang('member.chairman')</option>
									<option value="3">@lang('member.managing_commitee')</option>
									<option value="4">@lang('member.donar')</option>
									<option value="5">@lang('member.ex_member')</option>
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-9">
							<label>@lang('member.name'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="name" id="name"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('member.father'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="father_name" id="father_name" >
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('member.mother'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="mother_name" id="mother_name" >
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('member.designation'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="designation" id="designation"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('member.profession'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="profession" id="profession" >
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('member.duration'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="duration" id="duration" >
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('member.mobile'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="mobile" id="mobile"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('member.email'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="email" id="email" >
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('member.address'): </label>
							<div class="input-group mt-2">
								<textarea  class="form-control w-100" rows="5" type="text" name="address" ></textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('member.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="status">
									<option value="1">Active</option>
									<option value="2">Inactive</option>
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('member.image'):</label>
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

