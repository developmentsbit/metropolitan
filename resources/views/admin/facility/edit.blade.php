@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('facilities.addtitle')
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
                    {{ route('facilities.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>@lang('facilities.addtitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('facilities.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row myinput">
						<div class="form-group mb-3 col-md-6">
							<label>@lang('facilities.title'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="title" id="title"  required="" value="{{$data->title}}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('facilities.title_bn'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="title_bn" id="title_bn" value="{{$data->title_bn}}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('facilities.description'): </label>
							<div class="input-group mt-2">
								<textarea class="form-control" name="description" id="description">{!! $data->description !!}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('facilities.description_bn'):</label>
							<div class="input-group mt-2">
								<textarea class="form-control" name="description_bn" id="description_bn">{!! $data->description_bn !!}</textarea>
							</div>
						</div>
						<div class="modal-footer border-0">
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

