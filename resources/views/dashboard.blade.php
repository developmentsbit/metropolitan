@extends('layouts.master')
@section('content')

@php
  $totaladmin = DB::table("users")->count();
  $totalteachers = DB::table("teacherstaff")->where('type',1)->count();
  $totalstaff = DB::table("teacherstaff")->where('type',2)->count();
  $totalnotices = DB::table("notices")->where('type',1)->count();
@endphp


<div class="container-fluid">

        @include('components.error_messages')
        @component('components.breadcrumb')
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
        @endcomponent

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-light" id="dash-daterange">
                            <span class="input-group-text bg-primary border-primary text-white">
                                <i class="mdi mdi-calendar-range font-13"></i>
                            </span>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-primary ms-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="javascript: void(0);" class="btn btn-primary ms-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">@lang('common.dashboard')</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12 col-lg-6">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h4 class="text-muted fw-normal mt-0" title="Number of Customers">@lang('common.total_admin')</h4>
                            <h3 class="mt-3 mb-3">{{ $totaladmin }}</h3>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->


        </div>

        <div class="row">

                <div class="col-lg-4">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h4 class="text-muted fw-normal mt-0" title="Number of Orders">@lang('common.total_teacher')</h4>
                            <h3 class="mt-3 mb-3">{{ $totalteachers }}</h3>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->


                <div class="col-lg-4">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h4 class="text-muted fw-normal mt-0" title="Number of Orders">@lang('common.total_staff')</h4>
                            <h3 class="mt-3 mb-3">{{ $totalstaff }}</h3>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

        
                <div class="col-lg-4">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-pulse widget-icon"></i>
                            </div>
                            <h4 class="text-muted fw-normal mt-0" title="Growth">@lang('common.total_notice')</h4>
                            <h3 class="mt-3 mb-3">{{ $totalnotices }}</h3>
                            
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->



            </div> <!-- end row -->

        </div> <!-- end col -->

    </div>
    <!-- end row -->




</div>
<!-- container -->
@endsection

@push('footer_scripts')
<!-- third party js -->
<script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{ asset('assets/js/pages/demo.dashboard.js') }}"></script>
<!-- end demo js-->
@endpush
