@extends('layouts.master')

@push('header_styles')
    <!-- third party css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->
@endpush

@section('content')
    <div class="container">

        @component('components.breadcrumb')
            @slot('title')
                @lang('teaching_permission.viewtitle')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('role', 'create'))
                @slot('action_button1')
                    @lang('common.add_new')
                @endslot
                @slot('action_button1_link')
                    {{ route('teaching_permission.create') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>@lang('teaching_permission.managetitle')</h3>
                        <ul class="nav nav-tabs nav-bordered mb-3">
                            <li class="nav-item">
                                <a href="#users-tab-all" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    @lang('common.all')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#users-tab-deleted" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                    @lang('common.deleted_list')
                                </a>
                            </li>
                        </ul> <!-- end nav-->
                        <div class="tab-content">
                            <div class="tab-pane show active" id="users-tab-all">
                                <table id="alternative-page-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('common.date')</th>
                                            <th>@lang('teaching_permission.subject')</th>
                                            <th>@lang('teaching_permission.part')</th>
                                            <th>@lang('teaching_permission.memorial_no')</th>
                                            <th>@lang('common.image')</th>
                                            <th>@lang('common.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data)
                                        @foreach($data as $v)
                                        <tr>
                                            <td>#</td>
                                            <td>{{$v->date}}</td>
                                            <td>@if($lang == 'en'){{$v->subject ?: $v->subject_bn}}@elseif($lang == 'bn'){{$v->subject_bn ?: $v->subject}}@endif</td>
                                            <td>@if($lang == 'en'){{$v->part ?: $v->part_bn}}@elseif($lang == 'bn'){{$v->part_bn ?: $v->part}}@endif</td>
                                            <td>{{$v->memorial_no}}</td>
                                            <td><a href="{{asset('/assets/images/teaching_permission')}}/{{$v->image}}" download="" class="btn btn-success btn-sm">@lang('common.download')</a></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('teaching_permission.edit',$v->id)}}" class="btn btn-info border-0 edit text-light">@lang('common.edit')</a>
                                                    <form action="{{route('teaching_permission.destroy',$v->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onClick="return confirm('Are You Sure?')">@lang('common.delete')</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div> <!-- end all-->

                            @php
                            use App\Models\teaching_permission;
                            $trashed=  teaching_permission::onlyTrashed()->get();
                            $sl=1;
                            @endphp
                            
                            <div class="tab-pane" id="users-tab-deleted">
                                <table id="alternative-page-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('teaching_permission.subject')</th>
                                            <th>@lang('teaching_permission.part')</th>
                                            <th>@lang('teaching_permission.memorial_no')</th>
                                            <th>@lang('common.action')</th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-border-bottom-0">
                                        @if($trashed)
                                        @foreach ($trashed as $v)
                                        <tr>
                                            <td>{{$sl++}}</td>
                                            <td>@if($lang == 'en'){{$v->subject}}@elseif($lang == 'bn'){{$v->subject_bn}}@endif</td>
                                            <td>@if($lang == 'en'){{$v->part}}@elseif($lang == 'bn'){{$v->part_bn}}@endif</td>
                                            <td>{{$v->date}}</td>
                                            <td>
                                                <a href="{{ url('retrive_teachingpermission') }}/{{ $v->id }}"  onClick="return confirm('Are You Sure?')" class="btn btn-sm btn-info">@lang('common.restore')</a>
                                                <a href="{{ url('teachingpermissionDelete') }}/{{ $v->id }}"  onClick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">@lang('common.permenantly_delete')</a>  
                                            </td> 
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div> <!-- end deleted-->
                        </div> <!-- end tab-content-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>

 
@endsection

@push('footer_scripts')
    <!-- third party js -->
    <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.select.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>
    <!-- end demo js-->


    @include('components.delete_script')
@endpush
