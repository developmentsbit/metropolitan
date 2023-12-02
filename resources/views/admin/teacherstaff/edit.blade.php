@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('teacherstaff.edittitle')
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
                    {{ route('teacherstaff.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>@lang('teacherstaff.edittitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('teacherstaff.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row myinput">
						<div class="form-group mb-3 col-md-4">
							<label>@lang('teacherstaff.department'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group -mt-2">
								<select class="form-control" name="department_id" id="department_id">
                                    <option value="">@lang("common.select_one")</option>
									@if(isset($department))
									@foreach($department as $c)
									<option @if($data->department_id == $c->id) selected @endif value="{{ $c->id }}" @php $c->id == $data->department_id ?  "selected" : '' @endphp>{{ $c->department }}</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('teacherstaff.sl'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="sl" id="sl"  required="" value="{{ $data->sl }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('teacherstaff.name'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group -mt-2">
								<input class="form-control" type="text" name="name" id="name"  required="" value="{{ $data->name }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('teacherstaff.designation'): </label>
							<div class="input-group -mt-2">
								<input class="form-control" type="text" name="designation" id="designation"  value="{{ $data->designation }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('teacherstaff.nid'):</label>
							<div class="input-group -mt-2">
								<input class="form-control" type="text" name="nid" id="nid" value="{{ $data->nid }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('teacherstaff.blood'):</label>
							<div class="input-group -mt-2">
								<input class="form-control" type="text" name="blood" id="blood"  value="{{ $data->blood }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('teacherstaff.religion'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group -mt-2">
								<select class="form-control" name="religion" id="option_s2">
									<option value="Islam" @php $data->religion == "Islam" ? 'selected' : '' @endphp>Islam</option>
									<option value="Hindu" @php $data->religion == "Hindu" ? 'selected' : '' @endphp>Hindu</option>
									<option value="Buddho" @php $data->religion == "Buddho" ? 'selected' : '' @endphp>Buddho</option>
									<option value="Christan" @php $data->religion == "Christan" ? 'selected' : '' @endphp>Christan</option>

								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('teacherstaff.relationship'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group -mt-2">
								<select class="form-control" name="relationship" id="option_s2">
									@if($data->relationship == "Unmarried")
									<option value="Unmarried">Unmarried</option>
									<option value="Married">Married</option>
									@else
									<option value="Married">Married</option>
									<option value="Unmarried">Unmarried</option>
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('teacherstaff.father_name'): </label>
							<div class="input-group -mt-2">
								<input class="form-control" type="text" name="father_name" id="father_name" value="{{ $data->father_name }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('teacherstaff.mother_name'): </label>
							<div class="input-group -mt-2">
								<input class="form-control" type="text" name="mother_name" id="mother_name" value="{{ $data->mother_name }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('teacherstaff.mobile'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group -mt-2">
								<input class="form-control" type="text" name="mobile" id="mobile"  required="" value="{{ $data->mobile }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('teacherstaff.email'):</label>
							<div class="input-group -mt-2">
								<input class="form-control" type="text" name="email" id="email"  value="{{ $data->email }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('teacherstaff.join_date'):</label>
							<div class="input-group -mt-2">
								<input class="form-control" type="date" name="join_date" id="join_date"  value="{{ $data->join_date }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('teacherstaff.mpo_date'):</label>
							<div class="input-group -mt-2">
								<input class="form-control" type="date" name="mpo_date" id="mpo_date" value="{{ $data->mpo_date }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('teacherstaff.present_address'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group -mt-2">
								<textarea rows="3" class="form-control" name="present_address" required="">{{ $data->present_address }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('teacherstaff.parmanent_address'): </label>
							<div class="input-group -mt-2">
								<textarea rows="3" class="form-control" name="parmanent_address">{{ $data->parmanent_address }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('teacherstaff.education'): </label>
							<div class="input-group -mt-2">
								<textarea rows="3" class="form-control" name="education">{{ $data->education }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('teacherstaff.gender'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group -mt-2">
								<select class="form-control" name="gender" id="option_s2">
									@if($data->gender == "Male")
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									@else
									<option value="Female">Female</option>
									<option value="Male">Male</option>
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('teacherstaff.type'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group -mt-2">
								<select class="form-control" name="type" id="option_s2">
									@if($data->type == 1)
									<option value="1">Teacher</option>
									<option value="2">Staff</option>
									@else
									<option value="2">Staff</option>
									<option value="1">Teacher</option>

									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('common.image'):</label>
							<div class="input-group -mt-2">
								<input class="form-control" type="file" name="image" id="image">
								<br>
							</div>
							<img src="{{ asset($data->image) }}" style="max-height: 100px;">
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

