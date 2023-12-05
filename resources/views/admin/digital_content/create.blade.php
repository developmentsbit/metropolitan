@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('digital_content.addtitle')
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
                    {{ route('digital_content.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>@lang('digital_content.addtitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('digital_content.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="row myinput">
                        <div class="form-group mb-3 col-md-6">
                            <label class="col-sm-4 col-form-label">@lang('common.date') :</label>
                            <input type="text" name="date" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" value="{{ old('date') }}" required>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('digital_content.classname'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control select2" data-toggle="select2" name="class_id" id="class_id" onchange="getgroup();getClassSubject();">
                                    <option value="">@lang('common.select_one')</option>
									@if(isset($class))
									@foreach($class as $c)
									<option value="{{ $c->id }}">@if($lang == 'en'){{ $c->class_name }}@else {{$c->class_name_bn}}@endif</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6" id="groupFiled">
							<label>@lang('digital_content.groupname'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
                                <select class="form-control" name="group_id" id="group_id" onchange="getGroupSubject();">
                                    
                                </select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('digital_content.subject_name'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
                                <select class="form-control" name="subject_id" id="subject_id" required="">
                                    
                                </select>
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('digital_content.title_en'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="title" id="title"  required="">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('digital_content.title_bn'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="title_bn" id="title_bn">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('digital_content.teacher_name_en'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="teacher_name" id="teacher_name">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('digital_content.teacher_name_bn'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="teacher_name_bn" id="teacher_name_bn">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('running_notice.details'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote"  class="form-control w-100" rows="10" type="text" name="details" ></textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('running_notice.details_bn'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote1"  class="form-control w-100" rows="10" type="text" name="details_bn" ></textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('digital_content.url'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="url" id="url">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('digital_content.image'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="file" name="file" id="file">
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('digital_content.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="status">
									<option value="1">@lang('common.active')</option>
									<option value="2">@lang('common.inactive')</option>
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
                if(response == '')
                {
                    $('#groupFiled').hide();
                    return;
                }
                else
                {
                    $('#groupFiled').show();
                    $("#group_id").html(response);
                    return;
                }

			}
		});
	}

    function getClassSubject()
    {
        let class_id = $("#class_id").val();
        // alert(group_id);

        let formData = {
            class_id,
        }
        
        $.ajax({
            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },
            url : '{{ url('loadClassSubject') }}',
            type : 'POST',

            data : formData,

            success : function(res)
            {
                $('#subject_id').html(res);
                // return;
            }
        });
    }
    function getGroupSubject()
    {
        let class_id = $("#class_id").val();
        let group_id = $("#group_id").val();
        // alert(group_id);

        let formData = {
            class_id,
            group_id
        }
        
        $.ajax({
            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },
            url : '{{ url('getGroupSubject') }}',
            type : 'POST',

            data : formData,

            success : function(res)
            {
                $('#subject_id').html(res);
                // return;
            }
        });
    }
</script>


@endsection


