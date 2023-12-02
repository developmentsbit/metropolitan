@extends('frontend.index')
@section('content')

    <style>
        .boxtile{
            background: #fff;
            padding: 39px 31px 15px 29px;
            margin-left: 8px;
            font-size: 31px;
            border-radius: 5px 5px 5px 5px;
            box-shadow: 2px 5px 1px 3px #d5cbcb;
            border: 1px solid #5f323222;
        }
        .boxtile a{
            text-decoration: none;
            color: #000;
        }
        .boxtile a:hover{
            color: green;
        }
    </style>

    <div class="container">
        <div class="col-sm-12 col-12" id="mainpage">
            <div class="row">
                <div class="col-sm-9 col-12">
                    <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
                        <ul class="list-group p-0">
                            <li class="list-group-item font-weight-bold bg-success text-light" id="about">
                                @lang('frontend.digital_content_subject')
                            </li>
                        </ul>
                        <li class="list-group-item">
                            <div style="text-align: justify;">
                                <div class="container">
                                    <div class="row">
                                        @if(isset($data))
                                        @foreach($data as $d)
                                        <div class="col-lg-3 col-md-6 text-center mb-3 boxtile">
                                            <a href="{{ url('content_details') }}/{{$d->id}}">
                                            <div class="service-wrap">
                                                    <p>@if($lang == 'en'){{ $d->subject_name_en ?: $d->subject_name_bn}}@else {{$d->subject_name_bn ?: $d->subject_name_en}}@endif</p>
                                            </div>
                                        </a>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                </div>
                @include('frontend.sidebar')
            </div>
        </div>
    </div>





@endsection
