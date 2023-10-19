@extends('layouts.master')

@section('content')

<div class="container">

        @component('components.breadcrumb')
            @slot('title')
                @lang('gender_wise.managetitle')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
        @endcomponent
        
        
    <form class="row" method="post" action="{{route('gender_wise.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3>@lang('gender_wise.managetitle')</h3>
                    <div class="tab-content">
                        <div class="row">
                            <div class="form-group col-6 mt-3">
                                <label class="mb-2">@lang('gender_wise.title') :</label>
                                <input type="text" name="title" class="form-control"  value="{{ $data->title }}" required>
                            </div>
                            <div class="form-group col-6 mt-3">
                                <label class="mb-2">@lang('gender_wise.title_bn') :</label>
                                <input type="text" name="title_bn" class="form-control"  value="{{ $data->title_bn }}" required>
                            </div>
                            <div class="form-group col-md-12 mt-3">
                                <label class="mb-2">@lang('gender_wise.details') :</label>
                                <textarea id="summernote"  class="form-control w-100" rows="8" type="text" name="details" required="">{!! $data->details !!}</textarea>
                            </div>
                            <div class="form-group col-md-12 mt-3">
                                <label class="mb-2">@lang('gender_wise.image') :</label>
                                <input type="file"  class="form-control" name="image">
                                <a href="{{ asset('assets/images/gender_wise/')}}/{{ $data->image }}" download="" class="btn btn-info">@lang('page.download')</a>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('common.close')</button>
                                <button type="update" class="btn btn-success button border-0">@lang('common.update')</button>
                            </div>
                        </div>
                    </div> <!-- end tab-content-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </form>
</div>

@endsection