@extends('frontend.index')
@section('content')
    <div class="container">
        <div class="col-sm-12 col-12" id="mainpage">
            <div class="row">
                <div class="col-sm-9 col-12">
                    <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
                        <ul class="list-group p-0">
                            <li class="list-group-item font-weight-bold bg-success text-light" id="about">
                                @lang('frontend.digital_content')
                            </li>
                        </ul>
                        <li class="list-group-item">
                            <div class="table table-responsive">
                                <table id="example" class="display table-bordered" style="width:100%">
                                <thead>
                                    <tr style="font-size: 15px;">
                                        <th>@lang('frontend.sl')</th>
                                        <th>@lang('frontend.title')</th>
                                        <th>@lang('frontend.subject_name')</th>
                                        <th>@lang('frontend.teacher_name')</th>
                                        <th>@lang('actions.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @if(isset($data))
                                @foreach($data as $d)
                                    <tr style="font-size: 12px;">
                                        <td>{{ $i++ }}</td>
                                        <td><a style="color: #609513!important;text-decoration: none;" href="{{ url('digitalcontentdetails') }}/{{$d->subject_id}}/{{$d->class_id}}">@if($lang == 'en'){{ $d->title ?: $d->title_bn}}@else {{$d->title_bn ?: $d->title}}@endif</a></td>
                                        <td><a >@if($lang == 'en'){{ $d->subject_name_en ?: $d->subject_name_bn}}@else {{$d->subject_name_bn ?: $d->subject_name_en}}@endif</a></td>
                                        <td>@if($lang == 'en'){{ $d->teacher_name_en ?: $d->teacher_name_bn}}@else {{$d->teacher_name_bn ?: $d->teacher_name_en}}@endif</td>
                                        <td>
                                            <a href="{{ url('digitalcontentdetails') }}/{{$d->subject_id}}/{{$d->class_id}}" class="btn btn-sm btn-danger" target="_blank"><span uk-icon="icon: file-pdf; ratio: 1"></span>Open</a>
                                            <a href="{{ asset('assets/files/digital_content/')}}/{{$d->file}}" class="btn btn-sm btn-danger" download="" ><span uk-icon="icon: download; ratio: 1"></span>Download</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                </table>
                            </div>
                        </li>
                    </div>
                </div>
                @include('frontend.sidebar')
            </div>
        </div>
    </div>





@endsection
