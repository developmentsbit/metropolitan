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
                @lang('co_curriculum_activities.index_title')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('user', 'create'))
                @slot('action_button1')
                    @lang('common.add_new')
                @endslot
                @slot('action_button1_link')
                    {{ route('co_curriculum_activities.create') }}
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

                        <h4 class="header-title">@lang('co_curriculum_activities.index_title')</h4>
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
                                <table id="datatable-users-all" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('common.title')</th>
                                            <th>@lang('common.image')</th>
                                            <th>@lang('common.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data['activity'])
                                        @foreach ($data['activity'] as $v)
                                            <tr>
                                                <td>{{$data['sl']++}}</td>
                                                <td>
                                                    @if($lang == 'en')
                                                    {{$v->title ?: $v->title_bn}}
                                                    @else
                                                    {{$v->title_bn ?: $v->title}}
                                                    @endif
                                                </td>
                                                <td>
                                                    <img src="{{asset('co_curriculum')}}/{{$v->image}}" alt="" class="img-fluid" style="height : 80px;">
                                                </td>
                                                <td>
                                                    @if(Auth::user()->email == 'super@admin.com')
                                                    <a class="btn btn-sm btn-primary" href="" data-bs-toggle="modal" data-bs-target="#standard-modal{{$v->id}}" style="float:left;margin-right:10px;"><i class="fa fa-eye"></i></a>
                                                    <div id="standard-modal{{$v->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="standard-modalLabel">Properties</h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td>Created At</td>
                                                                            <td>:</td>
                                                                            <td>{{$v->created_at}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Created By</td>
                                                                            <td>:</td>
                                                                            <td>{{$v->creator->name}}</td>
                                                                        </tr>
                                                                        @if($v->edit_by != NULL)
                                                                        <tr>
                                                                            <td>Last Edited By</td>
                                                                            <td>:</td>
                                                                            <td>{{$v->editor->name}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Last Edited At</td>
                                                                            <td>:</td>
                                                                            <td>{{$v->updated_at}}</td>
                                                                        </tr>
                                                                        @endif
                                                                        @if($v->delete_by != NULL)
                                                                        <tr>
                                                                            <td>Delete By</td>
                                                                            <td>:</td>
                                                                            <td>{{$v->deletor->name}}</td>
                                                                        </tr>
                                                                        @endif
                                                                        @if($v->restore_by != NULL)
                                                                        <tr>
                                                                            <td>Restore By</td>
                                                                            <td>:</td>
                                                                            <td>{{$v->restorer->name}}</td>
                                                                        </tr>
                                                                        @endif
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                    @endif
                                                    <a class="btn btn-sm btn-info" href="{{route('co_curriculum_activities.edit',$v->id)}}" style="float:left;margin-right:10px;"><i class="fa fa-edit"></i></a>
                                                    <form method="post" action="{{route('co_curriculum_activities.destroy',$v->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div> <!-- end all-->
                            @php
                            use App\Models\CoCurriculamActivity;
                            $trashed = CoCurriculamActivity::onlyTrashed()->get();
                            @endphp
                            <div class="tab-pane" id="users-tab-deleted">
                                <table id="datatable-users-deleted" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('common.title')</th>
                                            <th>@lang('common.image')</th>
                                            <th>@lang('common.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($trashed)
                                        @foreach ($trashed as $v)
                                            <tr>
                                                <td>{{$data['sl']++}}</td>
                                                <td>
                                                    @if($lang == 'en')
                                                    {{$v->title ?: $v->title_bn}}
                                                    @else
                                                    {{$v->title_bn ?: $v->title}}
                                                    @endif
                                                </td>
                                                <td>
                                                    <img src="{{asset('co_curriculum')}}/{{$v->image}}" alt="" class="img-fluid" style="height : 80px;">
                                                </td>
                                                <td>
                                                    @if(Auth::user()->email == 'super@admin.com')
                                                    <a class="btn btn-sm btn-primary" href="" data-bs-toggle="modal" data-bs-target="#standard-modal{{$v->id}}" style="float:left;margin-right:10px;"><i class="fa fa-eye"></i></a>
                                                    <div id="standard-modal{{$v->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="standard-modalLabel">Properties</h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td>Created At</td>
                                                                            <td>:</td>
                                                                            <td>{{$v->created_at}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Created By</td>
                                                                            <td>:</td>
                                                                            <td>{{$v->creator->name}}</td>
                                                                        </tr>
                                                                        @if($v->edit_by != NULL)
                                                                        <tr>
                                                                            <td>Last Edited By</td>
                                                                            <td>:</td>
                                                                            <td>{{$v->editor->name}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Last Edited At</td>
                                                                            <td>:</td>
                                                                            <td>{{$v->updated_at}}</td>
                                                                        </tr>
                                                                        @endif
                                                                        @if($v->delete_by != NULL)
                                                                        <tr>
                                                                            <td>Delete By</td>
                                                                            <td>:</td>
                                                                            <td>{{$v->deletor->name}}</td>
                                                                        </tr>
                                                                        @endif
                                                                        @if($v->restore_by != NULL)
                                                                        <tr>
                                                                            <td>Restore By</td>
                                                                            <td>:</td>
                                                                            <td>{{$v->restorer->name}}</td>
                                                                        </tr>
                                                                        @endif
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                    @endif
                                                    <a class="btn btn-sm btn-info" href="{{route('co_curriculum_activities.restore',$v->id)}}" style="float:left;margin-right:10px;"><i class="fa fa-arrow-left"></i></a>
                                                    <a onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger" href="{{route('co_curriculum_activities.delete',$v->id)}}" style="float:left;margin-right:10px;"><i class="fa fa-trash"></i></a>
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

    <script>
        $(function() {
            $('#datatable-users-all').DataTable();
        });
        $(function() {
            $('#datatable-users-deleted').DataTable();
        });
    </script>

    @include('components.delete_script')
@endpush
