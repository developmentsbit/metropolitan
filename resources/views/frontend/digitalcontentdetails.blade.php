@extends('frontend.index')
@section('content')
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
                            <iframe src="{{asset('assets/files/digital_content')}}/{{$data->file}}" frameborder="0" width="960" height="569" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                            <!-- {{asset('assets/files/digital_content')}}/{{$data->file}} -->
								<!-- <iframe class="margin-top10" src="{{asset('assets/files/digital_content')}}/{{$data->file}}" frameborder="0" width="720" height="434" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true">00</iframe> -->
                                <hr>
                                <table id="example" class="display table-bordered" style="width:100%">
                                <tbody>
                                    <tr style="font-size: 12px;">
                                        <td>>@if($lang == 'en'){{ $data->title ?: $data->title_bn}}@else {{$data->title_bn ?: $data->title}}@endif</td>
                                        <td><a >@if($lang == 'en'){{ $data->subject_name_en ?: $data->subject_name_bn}}@else {{$data->subject_name_bn ?: $data->subject_name_en}}@endif</a></td>
                                        <td>@if($lang == 'en'){{ $data->teacher_name_en ?: $data->teacher_name_bn}}@else {{$data->teacher_name_bn ?: $data->teacher_name_en}}@endif</td>
                                    </tr>
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
