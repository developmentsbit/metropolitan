@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('class_wise_student.addtitle')
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
                    {{ route('class_wise_student.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>@lang('class_wise_student.addtitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('class_wise_student.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row myinput">
						<div class="form-group mb-3 col-md-12">
							<label>@lang('class_wise_student.classname'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="class_id" required>
									@if(isset($class))
									@foreach($class as $c)
                                    @php
                                    $check = DB::table('class_wise_student_infos')->where('class_id',$c->id)->count();
                                    @endphp
                                    @if($check == 0)
									<option @if($data->class_id == $c->id) selected @endif value="{{ $c->id }}">@if($lang == 'en'){{ $c->class_name }}@else {{$c->class_name_bn}}@endif</option>
                                    @endif
									@endforeach
									@endif
								</select>
							</div>
						</div>

                        <div class="form-group mb-3 col-md-12 col-12">
							<label>@lang('class_wise_student.details'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<textarea id="summernote"  class="form-control w-100" rows="10" type="text" name="details" >{!! $data->description !!}</textarea>
							</div>
						</div>

                        <div class="form-group mb-3 col-md-12">
							<label>@lang('admissioninfo.image'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="file" name="image" id="image" >
							</div>
                            @php
                            $path = public_path().'/'.$data->image;
                            @endphp
                            @if(file_exists($path))
                            <a href="{{ asset($data->image) }}" download="" class="btn btn-success btn-sm">@lang('common.download')</a>
                            @endif
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

