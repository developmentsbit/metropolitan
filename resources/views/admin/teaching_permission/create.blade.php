@extends('layouts.master')

@section('content')

<div class="container">

        @component('components.breadcrumb')
            @slot('title')
                @lang('teaching_permission.addtitle')
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
                    {{ route('teaching_permission.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
        
        <form class="row" method="post" action="{{route('teaching_permission.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>@lang('teaching_permission.addtitle')</h3>
                        <div class="tab-content">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                                    <label class="mb-2">@lang('common.date') : <span class="text-danger">*</span></label>
                                    <input type="text" name="date" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" value="{{ old('date') }}" required>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                                    <label class="mb-2">@lang('teaching_permission.subject') : <span class="text-danger">*</span></label>
                                    <input type="text" name="subject" placeholder="@lang('teaching_permission.subject')" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                                    <label class="mb-2">@lang('teaching_permission.subject_bn') : <span class="text-danger">*</span></label>
                                    <input type="text" name="subject_bn" placeholder="@lang('teaching_permission.subject_bn')" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                                    <label class="mb-2">@lang('teaching_permission.part') : <span class="text-danger">*</span></label>
                                    <input type="text" name="part" placeholder="@lang('teaching_permission.part')" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                                    <label class="mb-2">@lang('teaching_permission.part_bn') : <span class="text-danger">*</span></label>
                                    <input type="text" name="part_bn" placeholder="@lang('teaching_permission.part_bn')" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                                    <label class="mb-2">@lang('teaching_permission.memorial_no') : <span class="text-danger">*</span></label>
                                    <input type="text" name="memorial_no" placeholder="@lang('teaching_permission.memorial_no')" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 mt-3">
                                    <label class="mb-2">@lang('common.image_pdf') :</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('common.close')</button>
                                    <button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
                                </div>
                            </div>
                        </div> <!-- end tab-content-->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </form>
    </div>

@endsection