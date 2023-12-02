<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data['personal_info']->student_name}}</title>
    <style>
        @page {
        size: A4;
        margin: 0;
        }
        table{
            width: 100%;
        }

        .full-paper-wrap::after{
            content: "";
            background-image:url({{{asset($setting->image)}}});
            background-repeat:no-repeat;
            background-size:auto;
            background-position:center;
            /* z-index : 99 */
            position : absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            opacity : 0.1;

        }

        table, tr, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        .full-paper-wrap{
            border: 1px solid black;
            /* width: 210mm; */
            /* height: 297mm; */
            margin: auto;
            padding : 10px;
        }
        .logo {
            float: left;
            margin-right: 65px;
            margin-left: 164px;
        }

        .name_adress {
            float: left;
            margin-top: 10px;
            font-size: 26px;
        }

        .name_adress span{
            font-size:20px
        }
        @media print {
        html, body {
            width: 210mm;
            height: 297mm;
        }
        /* ... the rest of the rules ... */
        }
    </style>
</head>
<body>

    <div class="full-paper-wrap" style="">
        <table>
                <tr>
                    <td style="height:90px;padding: 8px 5px;" colspan="6">
                        <div class="logo">
                            <img src="{{asset($setting->image)}}" style="height: 80px;width:70px;">
                        </div>
                        <div class="name_adress" style="text-align: center">
                            <b>{{$setting->name}}</b><br>
                            <span>{{$setting->address}}</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 5px;" colspan="6" style="text-align: center;padding:10px 8px;">
                        <b style="text-transform: uppercase;">Student Information</b>
                    </td>
                </tr>

                <tr>
                    <th style="padding: 8px 5px;">Present Year</th>
                    <td style="padding: 8px 5px;width:15%;">{{$data['running_info']->year}}</td>
                    <th style="padding: 8px 5px;">Class</th>
                    <td style="padding: 8px 5px;">{{$data['running_info']->class_name}}</td>
                    <th style="padding: 8px 5px;">Group</th>
                    <td style="padding: 8px 5px;">{{$data['running_info']->group_name}}</td>
                </tr>

                <tr>
                    <th style="padding: 8px 5px;">Student ID</th>
                    <td style="padding: 8px 5px;">{{$data['running_info']->student_id}}</td>
                    <th style="padding: 8px 5px;">Class Roll</th>
                    <td colspan="3" style="padding: 8px 5px;">{{$data['running_info']->class_roll}}</td>
                </tr>

            <tr>
                <td style="padding: 8px 5px;" colspan="4">Session : {{$data['academic_information']->session2}}</td>
                <td colspan="2" style="width: 20%;text-align:center;" rowspan="5">
                    {{-- data:image/png;base64,{{base64_encode(file_get_contents('http://localhost/sbitaccounts/public/public/Backend/images/logo.png')) }} --}}
                @php
                $path = base_path().'/ems/others_img/'.$data['running_info']->student_id.'.jpg';
                @endphp
                @if(file_exists($path))
                <img src="{{env('APP_URL').'/ems/others_img'}}/{{$data['running_info']->student_id.'.jpg'}}" alt="" style="height: 120px;width:120px;">
                @else
                <img src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=" alt="" style="height:60px;width:60px;">
                @endif
                </td>
            </tr>
            <tr>
                <td style="padding: 8px 5px;width:15%;">Student Name</td>
                <td colspan="3" style="padding: 8px 5px;text-transform:uppercase;width:30%;">{{$data['personal_info']->student_name}}</td>
            </tr>
            <tr>
                <td style="padding: 8px 5px;width:15%;">Father Name</td>
                <td  colspan="3"  style="padding: 8px 5px;text-transform:uppercase;">{{$data['personal_info']->father_name}}</td>
            </tr>
            <tr>
                <td style="padding: 8px 5px;width:15%;">Mother Name</td>
                <td  colspan="3"  style="padding: 8px 5px;text-transform:uppercase;">{{$data['personal_info']->mother_name}}</td>
            </tr>
            <tr>
                <td style="padding: 8px 5px;width:20%;">Permenant Adress</td>
                <td  colspan="3"  style="padding: 8px 5px;">{{$data['adress_information']->permanent_house_name}},{{$data['adress_information']->permanent_village}},{{$data['adress_information']->permanent_village}},{{$data['adress_information']->permanent_PO}},{{$data['adress_information']->permanent_post_code}},{{$data['adress_information']->permanent_upazila}},{{$data['adress_information']->permanent_distric}}</td>
            </tr>
            <tr>
                <td style="padding: 5px 5px;">Date of birth</td>
                <td style="padding: 5px 5px;">{{$data['personal_info']->date_of_brith}}</td>
                <td style="padding: 5px 5px;width:17%">Admission Date</td>
                <td colspan="3" style="padding: 5px 5px;">{{$data['personal_info']->addmission_date}}</td>
            </tr>
            <tr>
                <td style="padding: 5px 5px;">Religion</td>
                <td style="padding: 5px 5px;">{{$data['personal_info']->religious}}</td>
                <td style="padding: 5px 5px;width:17%">Gender</td>
                <td colspan="3" style="padding: 5px 5px;">{{$data['personal_info']->gender}}</td>
            </tr>
            <tr>
                <td style="padding: 5px 5px;">Blood Group</td>
                <td style="padding: 5px 5px;">{{$data['personal_info']->blood_group}}</td>
                <td style="padding: 5px 5px;width:17%">Contact Number</td>
                <td colspan="3" style="padding: 5px 5px;">{{$data['personal_info']->contact_no}}</td>
            </tr>
            <tr>
                <td style="padding:10px 8px;text-transform:uppercase;" colspan="6"><b>Guardian Information</b></td>
            </tr>
            <tr>
                <td style="padding: 5px 5px;">Guardian name</td>
                <td style="padding: 5px 5px;">{{$data['guardian_info']->guardian_name}}</td>
                <td style="padding: 5px 5px;width:17%">Guardian contact</td>
                <td colspan="3" style="padding: 5px 5px;">{{$data['guardian_info']->guardian_contact}}</td>
            </tr>
            <tr>
                <td style="padding:10px 8px;text-transform:uppercase;" colspan="6"><b>Registered Subject</b></td>
            </tr>
            <tr>
                <td style="padding: 5px 5px;">Subject Code</td>
                <td style="padding: 5px 5px;width:80%" colspan="5">Subject Name</td>
            </tr>
            <tr>
                <td colspan="6" style="padding: 5px 8px;text-align:center;font-weight:bold;">Compulsory Subject</td>
            </tr>

            @if($subject)
            @foreach ($subject as $s)
            @if($s->select_subject_type == 'CompulsorySubject')
            <tr>
                <td style="padding: 5px 5px;">{{$s->subject_code}}</td>
                <td style="padding: 5px 5px;" colspan="5">{{$s->subject_name}}</td>
            </tr>
            @endif
            @endforeach
            @endif
            <tr>
                <td colspan="6" style="padding: 5px 8px;text-align:center;font-weight:bold;">Group Subject</td>
            </tr>
            @if($subject)
            @foreach ($subject as $s)
            @if($s->select_subject_type == 'GroupSubject')
            <tr>
                <td style="padding: 5px 5px;">{{$s->subject_code}}</td>
                <td style="padding: 5px 5px;" colspan="5">{{$s->subject_name}}</td>
            </tr>
            @endif
            @endforeach
            @endif
            <tr>
                <td colspan="6" style="padding: 5px 8px;text-align:center;font-weight:bold;">Optional Subject</td>
            </tr>
            @if($subject)
            @foreach ($subject as $s)
            @if($s->select_subject_type == 'OptionalSubject')
            <tr>
                <td style="padding: 5px 5px;">{{$s->subject_code}}</td>
                <td style="padding: 5px 5px;" colspan="5">{{$s->subject_name}}</td>
            </tr>
            @endif
            @endforeach
            @endif
        </table>
    </div>

</body>
</html>
