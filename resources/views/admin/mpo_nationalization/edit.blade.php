@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('mpo_nationalization.edittitle')
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
                    {{ route('mpo_nationalization.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>@lang('mpo_nationalization.edittitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('mpo_nationalization.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
                    @method('PATCH')
					<div class="row myinput">
						
						<div class="form-group mb-3 col-md-6">
							<label>@lang('common.date'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="date" name="date" id="date"  required="" value="{{ $data->date }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.subject'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="subject" id="subject"  required="" value="{{ $data->subject }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.subject_bn'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="subject_bn" id="subject_bn"  required="" value="{{ $data->subject_bn }}">
							</div>
						</div>	
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.layer'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="layer" id="layer"  required="" value="{{ $data->layer }}">
							</div>
						</div>	
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.layer_bn'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="layer_bn" id="layer_bn"  required=""value="{{ $data->layer_bn }}" >
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.memorial'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="memorial_no" id="memorial_no"  required="" value="{{ $data->memorial_no }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('admissioninfo.image'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="file" name="image" id="image">
                              
                                
							</div>
                                @php
                                $path= public_path().'/admin/mpo_nationalization/'.$data->image;
                                @endphp
                            @if (file_exists($path))
                                    
                                <img src="{{asset('admin/mpo_nationalization')}}/{{$data->image}}" alt="" width="80px" height="80px">
                                @endif
						</div>
						<div class="modal-footer border-0">
							
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

