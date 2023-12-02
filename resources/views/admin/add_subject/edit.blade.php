@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('add_subject.edittitle')
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
                    {{ route('add_subject.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>@lang('add_subject.edittitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('add_subject.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row myinput">
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject.classname'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
                                <select class="form-control select2" data-toggle="select2" name="class_id" id="class_id" onchange="return getgroup();">
                                    <option value="">@lang('common.select_one')</option>
									@if(isset($class))
									@foreach($class as $c)
									<option @if($data->class_id == $c->id) selected @endif value="{{ $c->id }}">@if($lang == 'en'){{ $c->class_name }}@else {{$c->class_name_bn}}@endif</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject.groupname'):</label>
							<div class="input-group mt-2">
                                <select class="form-control" name="group_id" id="group_id">
                                    @if($group)
                                    @foreach ($group as $g)
                                    <option @if($g->id == $data->group_id) selected @endif value="{{$g->id}}">@if($lang == 'en'){{$g->group_name}}@else{{$g->group_name_bn}}@endif</option>
                                    @endforeach
                                    @endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject.subject_name_en'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="subject_name_en" id="subject_name_en"  required="" value="{{$data->subject_name_en}}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject.subject_name_bn'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="subject_name_bn" id="subject_name_bn" value="{{$data->subject_name_bn}}">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject.subject_code'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="number" name="subject_code" id="subject_code" value="{{$data->subject_code}}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject.subject_serial_no'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="number" name="subject_serial_no" id="subject_serial_no" value="{{$data->subject_serial_no}}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject.select_subject_type'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="subject_type">
									<option @if($data->subject_type == 1) selected @endif value="1">@lang('add_subject.compulsory_subject')</option>
									<option @if($data->subject_type == 2) selected @endif value="2">@lang('add_subject.group_subject')</option>
									<option @if($data->subject_type == 3) selected @endif value="3">@lang('add_subject.optional_subject')</option>
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="status">
                                    <option @if($data->status == 1) selected @endif value="1">@lang('common.active')</option>
									<option @if($data->status == 2) selected @endif value="2">@lang('common.inactive')</option>
								</select>
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


<script type="text/javascript">
	function getgroup(){

		var class_id = $("#class_id").val();


		$.ajax({
			url: "{{ url("getgroup") }}/"+class_id,
			type: "get",
			success: function (response) {

				$("#group_id").html(response);

			}
		});
	}
</script>


@endsection


