@extends('frontend.index')
@section('content')
    <style>
    #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #05c76a;
    color: white;
    }
    </style>
    <div class="container">
        <div class="col-sm-12 col-12" id="mainpage">
            <div class="row">
                <div class="col-sm-9 col-12">
                    <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
                        <ul class="list-group p-0">
                            <li class="list-group-item font-weight-bold bg-success text-light" id="about">
                                @lang('frontend.detail')
                            </li>
                        </ul>
                        <li class="list-group-item">
                            <div class="table table-responsive">
                                @if($data->url)
                                <iframe src="{{$data->url}}" frameborder="0" width="960" height="569" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                                @endif
                                <hr>
                                <table id="customers">
                                    <tr>
                                        <th>@lang('frontend.class')</th>
                                        <th>@lang('frontend.group')</th>
                                        <th>@lang('frontend.title')</th>
                                        <th>@lang('frontend.subject_name')</th>
                                        <th>@lang('frontend.teacher_name')</th>
                                        <th>@lang('frontend.detail')</th>
                                    </tr>
                                    <tr>
                                        <td>@if($lang == 'en'){{ $data->class_name ?: $data->class_name_bn}}@else {{$data->class_name_bn ?: $data->class_name}}@endif</td>
                                        <td>@if($lang == 'en'){{ $data->group_name ?: $data->group_name_bn}}@else {{$data->group_name_bn ?: $data->group_name}}@endif</td>
                                        <td>@if($lang == 'en'){{ $data->title ?: $data->title_bn}}@else {{$data->title_bn ?: $data->title}}@endif</td>
                                        <td>@if($lang == 'en'){{ $data->subject_name_en ?: $data->subject_name_bn}}@else {{$data->subject_name_bn ?: $data->subject_name_en}}@endif</td>
                                        <td>@if($lang == 'en'){{ $data->teacher_name_en ?: $data->teacher_name_bn}}@else {{$data->teacher_name_bn ?: $data->teacher_name_en}}@endif</td>
                                        <td>@if($lang == 'en'){!! $data->details_en !!}@elseif($lang == 'bn'){!! $data->details_bn !!}@endif</td>
                                    </tr>
                                </table>
                                @if($data->file)
                                <div class='embed-responsive' style='padding-bottom:135%; margin-top: 77px;'>
                                    <object data="{{ asset('assets/files/digital_content/')}}/{{$data->file}}" type='application/pdf' width='100%' height='100%'></object>
                                </div>
                                @endif
                            </div>
                        </li>
                    </div>
                </div>
                @include('frontend.sidebar')
            </div>
        </div>
    </div>





@endsection
