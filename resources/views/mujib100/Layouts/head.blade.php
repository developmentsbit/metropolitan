@php
$setting = DB::table('setting')->first();
@endphp
<head>
    <meta charset="utf-8">
    <title>বঙ্গবন্ধু কর্ণার</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta
        content="100 years,Bangabandhu Sheikh Mujibur Rahman, Mujib, Logo Competition,Bangabadhu 100,বঙ্গবন্ধু জন্ম শতবার্ষিকী"
        name="keywords">
    <meta
        content="100 Years of Mujib| Learn about the legendary life and philosophy of Bangabandhu, Sheikh Mujibur Rahman"
        name="description">

    <link rel="icon" href="{{url($setting->image)}}" type="image/gif" sizes="16x16">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
    <!-- Bootstrap CSS File -->
    <link href="../../fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">

    <link href="{{asset('/mujib100')}}/css/bootstrap.css" rel="stylesheet">
    <!-- Libraries CSS Files -->
    <link href="{{asset('/mujib100')}}/css/dist/jquery.fancybox.min.css" rel="stylesheet">
    <link href="{{asset('/mujib100')}}/maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('/mujib100')}}/css/front/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{asset('/mujib100')}}/css/front/lib/owlcarousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="{{asset('/mujib100')}}/css/front/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="{{asset('/mujib100')}}/css/front/css/according.css" rel="stylesheet">
    <link href="{{asset('/mujib100')}}/css/front/css/video.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <!--  <link href="css/responsive.min.css" rel="stylesheet">-->
    <link href="{{asset('/mujib100')}}/css/front/css/style.css" rel="stylesheet">
    <script src="{{asset('/mujib100')}}/js/front/js/lang.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">




    <style>
        #video {
            background: #f4f4f4;
            padding: 30px 0;
        }

        .graphic-video {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .video-container {
            margin-top: 80px
        }

        .video-item {
            cursor: pointer;
            position: relative;
            display: block;
            height: 400px;
            overflow: hidden;
        }


        .video-btn {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.8);
            opacity: 0;
            -webkit-transition: opacity 0.6s;
            -moz-transition: opacity 0.6s;
            transition: opacity 0.6s;
            vertical-align: middle;
            line-height: 200px;
        }

        .video-btn:hover {
            opacity: 1;
        }

        .video-btn .duration {
            display: none;
        }

        .video-btn .vx-btn {
            color: white;
            top: -18%;
            position: relative;
            padding-left: 20px;
            padding-right: 20px;
            font-size: 18px;
        }

        .video-btn .vx-bn-btn {
            color: white;
            bottom: -17%;
            position: relative;
            padding-left: 20px;
            padding-right: 20px;
            font-size: 18px;
        }

        .video-item .duration {
            position: absolute;
            top: 10px;
            left: 87%;
        }

        .video-btn .vx-btn:hover,
        .video-btn .vx-bn-btn:hover {
            color: white;
            border: 1px solid #f4b800;
            background: none;
        }

        @media all and (max-width: 480px) {
            .video-container {
                margin-top: 36px
            }

            .graphic-video {
                width: 100%;
                height: 200px;
            }

            .video-btn .vx-btn {
                color: white;
                margin-top: 6%;
            }

            .m-12 {
                padding-bottom: 12px;
            }
        }

        .book-img img {
            width: 100%;
            transition: transform .8s ease;
            object-fit: cover;
            height: 100%;
            object-position: 2px 2px;
        }

        .book-img:hover img {
            transform: scale(1.1);
        }

        .bg {
            position: fixed;
            left: 0;
            right: 0;
            z-index: 1;
            display: block;
            background-image: url('../assets/images/timeline/img-8.jpg');
            background-repeat: inherit !important;
            /* background-position-x: 393px !important; */
            background-size: contain !important;

            width: 100%;
            height: 100%;
            -webkit-filter: blur(5px);
            -moz-filter: blur(5px);
            -o-filter: blur(5px);
            -ms-filter: blur(5px);
            filter: blur(5px);
        }



        .card-body p {
            font-family: 'Lato', 'SolaimanLipi', sans-serif;
        }

        .height-100 {
            height: 100% !important;
        }

        .timeline:before {
            content: "";
            position: absolute;
            background: inherit;
            z-index: -1;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            box-shadow: inset 0 0 2000px rgba(255, 255, 255, 1);
            filter: blur(10px);
            -webkit-filter: blur(10px);
            margin: -20px;
        }

        .timeline {
            box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2);
            position: relative;
            z-index: 1;
            background: inherit;
            overflow: hidden;
        }




        .timeImg img {
            height: 300px;
            object-fit: cover;
            width: 100%;
            object-position: top;
        }

        .mar-bottom {
            margin-bottom: 8em;
        }

        .slid-item {
            height: 280px !important;
            width: 100%;
        }

        video {
            outline: none;
            object-fit: cover;
        }

        .muj-time a {
            display: block;
            padding: 0;
            color: #f4b800;
            border: 0;
            font-size: 15px;
        }

        @media only screen and (min-width: 760px) {

            /*.timeImg {*/
            /*    height: 400px;*/
            /*}*/

            .top-vid {
                height: 330px;
            }
        }

        @media only screen and (max-width: 760px) {

            .timeImg {
                height: 280px;
            }

            .top-vid {
                padding: 4px;
            }
        }

        .cd-timeline-content .owl-dot {
            background-color: #fff !important;
            display: inline-block !important;
            margin: 0 5px !important;
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .cd-timeline-content .owl-dots {
            text-align: center;
            background: #808080;
        }

        .cd-timeline-content .owl-dots .active {
            background-color: #ddd !important;
        }

        @media (max-width: 480px) {
            .cd-date {
                margin-top: 13px;
            }
        }

        #more-1920-en {
            display: none;
        }

        #myBtn-1920-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1939-en {
            display: none;
        }

        #myBtn-1939-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1946-en {
            display: none;
        }

        #myBtn-1946-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1948-en {
            display: none;
        }

        #myBtn-1948-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1949-en {
            display: none;
        }

        #myBtn-1949-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1952-en {
            display: none;
        }

        #myBtn-1952-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1956-en {
            display: none;
        }

        #myBtn-1956-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1964-en {
            display: none;
        }

        #myBtn-1964-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1966-en {
            display: none;
        }

        #myBtn-1966-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1968-en {
            display: none;
        }

        #myBtn-1968-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1969-en {
            display: none;
        }

        #myBtn-1969-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1970-en {
            display: none;
        }

        #myBtn-1970-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1971-en {
            display: none;
        }

        #myBtn-1971-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1972-en {
            display: none;
        }

        #myBtn-1972-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1974-en {
            display: none;
        }

        #myBtn-1974-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1975-en {
            display: none;
        }

        #myBtn-1975-en {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1920-bn {
            display: none;
        }

        #myBtn-1920-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1939-bn {
            display: none;
        }

        #myBtn-1939-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1946-bn {
            display: none;
        }

        #myBtn-1946-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }


        #myBtn-1947-bn {
            display: none;
        }

        #myBtn-1947-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1948-bn {
            display: none;
        }

        #myBtn-1948-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1949-bn {
            display: none;
        }

        #myBtn-1949-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1952-bn {
            display: none;
        }

        #myBtn-1952-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1954-bn {
            display: none;
        }

        #myBtn-1954-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1956-bn {
            display: none;
        }

        #myBtn-1956-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1962-bn {
            display: none;
        }

        #myBtn-1962-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1964-bn {
            display: none;
        }

        #myBtn-1964-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1966-bn {
            display: none;
        }

        #myBtn-1966-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1968-bn {
            display: none;
        }

        #myBtn-1968-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1969-bn {
            display: none;
        }

        #myBtn-1969-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1970-bn {
            display: none;
        }

        #myBtn-1970-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1971-bn {
            display: none;
        }

        #myBtn-1971-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1972-bn {
            display: none;
        }

        #myBtn-1972-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1974-bn {
            display: none;
        }

        #myBtn-1974-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #more-1975-bn {
            display: none;
        }

        #myBtn-1975-bn {
            background: none;
            color: #f4b800;
            padding: 0px !important;
            text-align: left;
            font-size: 1rem
        }

        #photo {
            padding-top: 78px;
            /*padding-bottom: 12px;*/
            background-color: #f4f4f4;
            box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.1);

        }

        .card-text {
            font-family: 'Lato', 'SolaimanLipi', sans-serif;
        }

        .zoomin-img img {
            width: 100%;
            transition: transform .8s ease;
            object-fit: cover;
            height: 100%;
            object-position: 2px 2px;
            cursor: pointer;
        }

        .zoomin-img:hover img {
            transform: scale(1.1);
        }

        .zoomin-img {
            overflow: hidden;
        }

        @media all and (max-width: 480px) {
            #photo {
                padding-top: 46px !important;
            }
        }

        .caption {
            font-family: 'Lato', 'SolaimanLipi', sans-serif;
        }

        .video-item {
            height: 278px;
        }

        .video-item img {
            height: 100%;
            object-fit: cover;
        }

        #video {
            background: #f4f4f4;
            padding: 10px 0;
        }

        .video-box {
            padding: 12px;
        }

        .video-box .caption {
            margin-top: 5px;
        }

        .speech-video {
            width: 100%;
            height: 600px;
            object-fit: cover;
        }

        #more,
        #more2,
        #more3,
        #more4,
        #more5,
        #more6,
        #more7,
        #more8,
        #more9,
        #more10,
        #more11,
        #more12,
        #more13 {
            display: none;
        }

        .video-item {
            cursor: pointer;
            position: relative;
            display: block;
        }

        .video-btn {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.8);
            opacity: 0;
            -webkit-transition: opacity 0.6s;
            -moz-transition: opacity 0.6s;
            transition: opacity 0.6s;
            vertical-align: middle;
            line-height: 200px;
        }

        .video-btn:hover {
            opacity: 1;
        }

        .video-btn .duration {
            display: none;
        }

        .video-btn .vx-btn {
            color: white;
            margin-top: 22%;
            padding-left: 20px;
            padding-right: 20px;
            font-size: 18px;
        }

        .video-item .duration {
            position: absolute;
            top: 10px;
            left: 87%;
        }

        .video-btn .vx-btn:hover {
            color: white;
            border: 1px solid #f4b800;
            background: none;
        }

        @media all and (max-width: 480px) {
            .video-btn .vx-btn {
                color: white;
                margin-top: 6%;
            }

            .m-12 {
                padding-bottom: 12px;
            }

            .speech-video {
                width: 100%;
                height: 150px;
            }
        }

        .carousel-item img{
            height: 550px;
            width : 100%;
        }

        div#box img {
    width: 100%;
    height: 300px;
}
div#box {
    margin-top: 20px;
}

a {
    text-decoration: none !important;
}


    </style>


</head>
