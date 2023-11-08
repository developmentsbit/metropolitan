@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('facilities.addimage')
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
				<h3>@lang('facilities.addimage')</h3><br>
				<form method="post" class="btn-submit" action="" enctype="multipart/form-data" id="submit_image">
					@csrf
                    <input type="hidden" name="id" id="id" value="{{$data['facility']->id}}">
					<div class="row myinput">
						<div class="form-group mb-3 col-md-6">
							<label>@lang('facilities.image_title'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="image_title" id="image_title"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('facilities.image'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="file" name="image" id="image" required>
							</div>
						</div>
						<div class="modal-footer border-0">
							<button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
						</div>
					</div>
				</form>
			</div>
		</div> <!-- end card -->
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>@lang('facilities.image_title')</th>
                            <th>@lang('facilities.image')</th>
                            <th>@lang('common.action')</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        
                    </tbody>
                </table>
            </div>
        </div>
	</div><!-- end col-->
</div>



<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>


@push('footer_scripts')
<script>
    function deleteImage(id)
    {
        if(confirm("Are You Sure ?"))
        {
            
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{csrf_token()}}'
                },
                url : '{{url('deleteImage')}}/'+id,
                type : 'GET',
                success : function(data)
                {
                    loadImages();   
                    toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.success("Image Deleted");
                }
            });
        }
    }
</script>
<script>
    function imagetitleUpdate(id)
    {
        
            let imageTitle = $('#image_title'+id).val();
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{csrf_token()}}'
                },
                url : '{{url('imagetitleUpdate')}}/'+id,
                type : 'POST',
                data : {imageTitle},
                success : function(data)
                {
                    loadImages();   
                    toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.success("Image Title Updated");
                }
            });
        
    }
</script>
<script>
    $('#submit_image').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            headers : {
                'X-CSRF-TOKEN' : '{{csrf_token()}}'
            },
            url : '{{url('submitImage')}}',
            type : 'POST',
            data : new FormData(this),
            dataType : 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success : function(data)
            {
                // alert(data);
                // resetForm();
                $('#submit_image').trigger('reset');
                loadImages();   
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                toastr.success("Image Uploaded");
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        loadImages();   
    });
    function loadImages()
    {
        let id = $('#id').val();
        $.ajax({
            headers:  {
                'X-CSRF-TOKEN' : '{{csrf_token()}}'
            },

            url : '{{url('loadFacilityImage')}}/'+id,

            type : 'GET',

            beforeSend : function(r)
            {
                $('#show_data').html('Loading...');
            },

            success : function(data)
            {
                // alert(data);
                $('#show_data').html(data);
            }


        });
    }

    // loadImages(); 
</script>

@endpush
@endsection

