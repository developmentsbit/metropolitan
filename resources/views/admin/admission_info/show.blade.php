@php
$setting = DB::table("setting")->first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admission Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Noto Serif Bengali', serif;
        }
        div#box {
            background: #f2fdff;
            border: 1px solid lightgray;
            box-shadow: 0px 0px 3px 0px white;
            padding: 0px;
            padding-bottom: 20px;
        }

        .details_header {
            background: orange;
            /* color: white; */
            -webkit-print-color-adjust: exact;
            padding : 5px 10px;
        }
        .logo {
    /* margin-top: 10px; */
}

.std-image {
    /* margin-top: 3px; */
}

.std-image img {
    border: 1px solid black;
}
div#box {
    max-width: 950px;
}
table tr{
    height: 46px;
}
table{
    font-size: 13px;
}

    </style>
</head>
<body>


    <div class="container" id="box">
        <div class="details_header">
            <table class="w-100">
                <tr>
                    <td>
                        <div class="logo text-right">
                            <img src="{{asset($setting->image)}}" alt="" height="80px" width="90px">
                        </div>
                    </td>
                    <td class="text-center">
                        <h2>{{$setting->name}}</h2>
                        <b>@lang('frontend.email') : </b><span>{{$setting->email}}</span>, <b>@lang('frontend.mobile') : </b> <span>{{$setting->phone}}</span><br>
                        <p>{{$setting->address}}</p>
                    </td>
                    <td>
                        <div class="std-image">
                            <img src="{{asset('StudentImage')}}/{{$data->image}}" alt="" height="100px" width="100px">
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="details-body mt-2 pt-2 pl-3 pr-3" style="border-top: 2px solid orange">
            <h5>@lang('frontend.personal_information')</h5>
           <table class="w-100" style="">
                <tr>
                    <td style="width: 20%;">
                        <b>@lang('frontend.student_name')</b>
                    </td>
                    <td style="width: 1%;">:</td>
                    <td style="border-bottom : 1px dotted black;padding-left:30px;">
                        {{$data->student_name}}
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%;">
                        <b>@lang('frontend.father_name')</b>
                    </td>
                    <td style="width: 1%;">:</td>
                    <td style="border-bottom : 1px dotted black;padding-left:30px;">
                        {{$data->father_name}}
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%;">
                        <b>@lang('frontend.mother_name')</b>
                    </td>
                    <td style="width: 1%;">:</td>
                    <td style="border-bottom : 1px dotted black;padding-left:30px;">
                        {{$data->mother_name}}
                    </td>
                </tr>

                <tr>
                    <td style="width: 20%;">@lang('frontend.dob')</td>
                    <td>:</td>
                    <td style="border-bottom : 1px dotted black;padding-left:30px;">
                        {{$date_of_birth}}
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%;">@lang('frontend.gender')</td>
                    <td>:</td>
                    <td style="border-bottom : 1px dotted black;padding-left:30px;">
                        {{$data->gender}}
                    </td>
                </tr>
           </table>
           <table>
            <tr>
                <td style="width : 20%">@lang('frontend.class')</td>
                <td style="">:</td>
                <td style="border-bottom : 1px dotted black;padding-left:30px;width : 40%">
                    {{$data->class_name}}
                </td>
                <td style="width : 15%;padding-left:20px;">@lang('frontend.group')</td>
                <td style="">:</td>
                <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">{{$data->group_name}}</td>
            </tr>
           </table>
           <table>
            <tr>
                <td style="width : 20%">@lang('frontend.religion')</td>
                <td style="">:</td>
                <td style="border-bottom : 1px dotted black;padding-left:30px;width : 40%">
                    {{$data->religion}}
                </td>
                <td style="width : 15%;padding-left:20px;">@lang('frontend.blood_group')</td>
                <td style="">:</td>
                <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">{{$data->blood_group}}</td>
            </tr>
           </table>
           <br>
           <h5>@lang('frontend.present_address')</h5>
            <div class="adress-box p-2" style="border: 1px dashed lightgray;">
                <table>
                    <tr>
                        <td style="width : 10%">@lang('frontend.present_house_name')</td>
                        <td style="width: 1%">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">
                            {{$data->present_house_name}}
                        </td>
                        <td style="width : 10%">@lang('frontend.village')</td>
                        <td style="width : 1%;">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">{{$data->present_village}}</td>
                    </tr>
                    <tr>
                        <td style="width : 10%">@lang('frontend.post_office')</td>
                        <td style="width: 1%">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">
                            {{$data->present_po}}
                        </td>
                        <td style="width : 10%">@lang('frontend.post_code')</td>
                        <td style="width : 1%;">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">{{$data->present_post_code}}</td>
                    </tr>
                    <tr>
                        <td style="width : 10%">@lang('frontend.upazila')</td>
                        <td style="width: 1%">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">
                            {{$data->present_upazila}}
                        </td>
                        <td style="width : 10%">@lang('frontend.district')</td>
                        <td style="width : 1%;">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">{{$data->present_district}}</td>
                    </tr>
                </table>
            </div>
           <br>
           <h5>@lang('frontend.permenant_address')</h5>
            <div class="adress-box p-2" style="border: 1px dashed lightgray;">
                <table>
                    <tr>
                        <td style="width : 10%">@lang('frontend.permenant_house')</td>
                        <td style="width: 1%">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">
                            {{$data->permenant_house_name}}
                        </td>
                        <td style="width : 10%">@lang('frontend.village')</td>
                        <td style="width : 1%;">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">{{$data->permenant_village}}</td>
                    </tr>
                    <tr>
                        <td style="width : 10%">@lang('frontend.post_office')</td>
                        <td style="width: 1%">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">
                            {{$data->permenant_po}}
                        </td>
                        <td style="width : 10%">@lang('frontend.post_code')</td>
                        <td style="width : 1%;">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">{{$data->permenant_post_code}}</td>
                    </tr>
                    <tr>
                        <td style="width : 10%">@lang('frontend.upazila')</td>
                        <td style="width: 1%">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">
                            {{$data->permenant_upazila}}
                        </td>
                        <td style="width : 10%">@lang('frontend.district')</td>
                        <td style="width : 1%;">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">{{$data->permenant_district}}</td>
                    </tr>
                </table>
            </div>
           <br>
           <h5>@lang('frontend.guardian_contact')</h5>
            <div class="adress-box p-2" style="border: 1px dashed lightgray;">
                <table>
                    <tr>
                        <td style="width : 10%">@lang('frontend.guardian_name')</td>
                        <td style="width: 1%">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">
                            {{$data->guardian_name}}
                        </td>
                        <td style="width : 10%">@lang('frontend.relation')</td>
                        <td style="width: 1%">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">
                            {{$data->relation}}
                        </td>
                    </tr>
                    <tr>
                        <td style="width : 10%">@lang('frontend.guardian_contacts')</td>
                        <td style="width : 1%;">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">{{$data->guardian_contact}}</td>
                        <td style="width : 10%">@lang('frontend.guardian_email')</td>
                        <td style="width: 1%">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">
                            {{$data->guardian_email}}
                        </td>
                    </tr>

                </table>
            </div>
            @if($p_class)
           <br>
           <h5>@lang('frontend.previous_class')</h5>
            <div class="adress-box p-2" style="border: 1px dashed lightgray;">
                <table>
                    <tr>
                        <td style="width : 10%">@lang('frontend.class')</td>
                        <td style="width: 1%">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 20%">
                            {{$p_class->class}}
                        </td>
                        <td style="width : 20%;padding-left:10px;">@lang('frontend.institute_name')</td>
                        <td style="width: 1%">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 50%">
                            {{$p_class->institute_name}}
                        </td>
                    </tr>
                    <tr>
                        <td style="width : 10%;">@lang('frontend.board_roll')</td>
                        <td style="width : 1%;">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">{{$p_class->board_roll}}</td>
                        <td style="width : 10%;padding-left:10px;">@lang('frontend.reg_no')</td>
                        <td style="width: 1%">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">
                            {{$p_class->reg_no}}
                        </td>
                    </tr>
                    <tr>
                        <td style="width : 10%;">@lang('frontend.group')</td>
                        <td style="width : 1%;">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">{{$p_class->group}}</td>
                        <td style="width : 10%;padding-left:10px;">@lang('frontend.passing_year')</td>
                        <td style="width: 1%">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">
                            {{$p_class->passing_year}}
                        </td>
                    </tr>
                    <tr>
                        <td style="width : 10%;">@lang('frontend.gpa')</td>
                        <td style="width : 1%;">:</td>
                        <td style="border-bottom : 1px dotted black;padding-left:10px;width : 40%">{{$p_class->gpa}}</td>

                    </tr>

                </table>
            </div>
            @endif
        </div>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script> --}}
</body>
</html>
