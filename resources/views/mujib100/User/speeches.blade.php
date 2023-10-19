@extends('mujib100.Layouts.master');
@section('body');
<section id="video">
    <div class="mt-4 mb-12">
        <video controls poster="{{asset('/mujib100')}}/assets/images/mujib/speech/7th_march.jpg" class="speech-video">
            <source src="https://mujib100.gov.{{asset('/mujib100')}}/assets/images/videos/video 1 (7th march).mp4" type="video/mp4">
            <source src="https://mujib100.gov.{{asset('/mujib100')}}/assets/images/videos/video 1 (7th march).mp4" type="video/ogg">
            Your browser does not support HTML5 video.
        </video>

    </div>
    <div class="container-fluid">
        <div class="row gutter-2">
            <div class="col-lg-4 col-md-4 m-12 col-sm-6 col-xs-12">

                <div class="video-box card h-100">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/speech/speech2.png" class="img-fluid" />
                        <span class="badge badge-dark duration">7:51</span>
                        <div class="video-btn">
                            <a data-fancybox href="https://mujib100.gov.{{asset('/mujib100')}}/assets/images/videos/Video 2.mp4"
                                class="btn btn-sm vx-btn btn-outline-warning">এখন দেখুন</a>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 3%;">
                        <div class="caption">
                            <h6>সত্তরের নির্বাচনে বিশাল বিজয়ের পর ঢাকার রেসকোর্স ময়দানে আওয়ামী লীগের এক
                                সমাবেশ
                                অনুষ্ঠিত হয়। সমাবেশে জাতীয় ও প্রাদেশিক পরিষদে নির্বাচিত আওয়ামী লীগ দলীয় ৪১৯
                                জন সদস্য<span id="dots">...</span><span id="more">
                                    শপথ গ্রহণ করেন। শপথ গ্রহণ অনুষ্ঠান পরিচালনা করেন বঙ্গবন্ধু শেখ মুজিবুর
                                    রহমান। রেসকোর্স
                                    ময়দানের বিশাল জনসভায় বঙ্গবন্ধু ঘোষণা করেন ৬-দফার ভিত্তিতে শাসনতন্ত্র
                                    প্রণীত হবেই, কেউ
                                    এটা ঠেকাতে পারবে না (৩ জানুয়ারি, ১৯৭১)।
                                </span></h6>
                            <button onclick="myFunction()" id="myBtn" class="btn btn-warning"
                                style="width: 40%; margin-right: 2%;">বিস্তারিত দেখুন</button>


                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 m-12 col-sm-6 col-xs-12">
                <div class="video-box card  h-100">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/speech/speech3.jpg" class="img-fluid" />
                        <span class="badge badge-dark duration">8:09</span>
                        <div class="video-btn">
                            <a data-fancybox href="https://mujib100.gov.{{asset('/mujib100')}}/assets/images/videos/Video 3.mp4"
                                class="btn btn-sm vx-btn btn-outline-warning">এখন দেখুন</a>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 3%;">
                        <div class="caption">
                            <h6>মুক্তিযুদ্ধ শুরুর প্রাক্কালে শহীদ দিবসে বঙ্গবন্ধু শেখ মুজিবুর রহমান শহীদ মিনারে
                                এক
                                গুরুত্বপূর্ণ ভাষণ দেন। ভাষণে তিনি স্বাধিকার আদায় আন্দোলনের জন্য ঘরে ঘরে
                                প্রস্তুত হতে<span id="dots2">...</span><span id="more2">

                                    জনগণের প্রতি আহ্‌বান জানান (২১ ফেব্রুয়ারি, ১৯৭১) ।

                                </span></h6>
                            <button onclick="myFunction2()" id="myBtn2" class="btn btn-warning "
                                style="width: 40%; margin-right: 2%;">বিস্তারিত দেখুন</button>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 m-12 col-sm-6 col-xs-12">
                <div class="video-box card h-100">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/speech/speech4.png" class="img-fluid">
                        <span class="badge badge-dark duration">8:00</span>
                        <div class="video-btn">
                            <a data-fancybox="" href="https://mujib100.gov.{{asset('/mujib100')}}/assets/images/videos/speeches_3.mp4"
                                class="btn btn-sm vx-btn btn-outline-warning">এখন দেখুন</a>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 3%;">
                        <div class="caption">
                            <h6>বাঙালি জাতির মুক্তির আকাঙ্ক্ষাকে ধারণ করে বঙ্গবন্ধু শেখ মুজিবুর রহমান ঢাকার
                                রেসকোর্স
                                ময়দানে এক ঐতিহাসিক ভাষণ দেন। ১৮
                                মিনিট ৩১ সেকেন্ডের এই ভাষণে বঙ্গবন্ধু <span id="dots3">...</span><span
                                    id="more3">
                                    মুক্তিকামী
                                    বাঙালিকে স্বাধীনতা
                                    সংগ্রামের জন্য প্রস্তুত হওয়ার আহ্‌বান জানান এবং বজ্রকন্ঠে ঘোষণা করেন
                                    “এবারের সংগ্রাম আমাদের মুক্তির সংগ্রাম, এবারের সংগ্রাম আমাদের স্বাধীনতার
                                    সংগ্রাম”।
                                    ইউনেস্কো এই ঐতিহাসিক ভাষণকে বিশ্বের গুরুত্বপূর্ণ প্রামাণ্য ঐতিহ্য হিসেবে
                                    স্বীকৃতি
                                    দিয়েছে (৭ মার্চ, ১৯৭১)।

                                </span></h6>
                            <button onclick="myFunction3()" id="myBtn3" class="btn btn-warning "
                                style="width: 40%; margin-right: 2%;">বিস্তারিত দেখুন</button>


                        </div>
                    </div>

                </div>
            </div>
            <div class="row gutter-2" style="margin-top: 12px;">
                <div class="col-lg-4 col-md-4 m-12 col-sm-6 col-xs-12">
                    <div class="video-box card h-100">
                        <div class="video-item">
                            <img src="{{asset('/mujib100')}}/assets/images/mujib/speech/5.png" class="img-fluid">
                            <span class="badge badge-dark duration">3:14</span>
                            <div class="video-btn">
                                <a data-fancybox="" href="https://mujib100.gov.{{asset('/mujib100')}}/assets/images/videos/Video 5.mp4"
                                    class="btn btn-sm vx-btn btn-outline-warning">এখন দেখুন</a>
                            </div>
                        </div>
                        <div class="container" style="margin-top: 3%;">
                            <div class="caption">
                                <h6>বাঙালি জাতিকে বৃহত্তর সংগ্রামের জন্য প্রস্তুত করার লক্ষ্যে বঙ্গবন্ধু শেখ
                                    মুজিবুর
                                    রহমান
                                    অসহযোগ আন্দোলনের ডাক দেন। সেদিন সারা
                                    বাংলাদেশ জুড়ে পাকিস্তান দিবসের
                                    পরিবর্তে পালিত হয়<span id="dots4">...</span><span id="more4">
                                        প্রতিরোধ দিবস। পাকিস্তানের পতাকার পরিবর্তে সর্বত্র বাংলাদেশের নতুন পতাকা
                                        উত্তোলন করা
                                        হয়। সূর্যোদয়ের সঙ্গে সঙ্গেই বঙ্গবন্ধু তাঁর ধানমণ্ডির বাসভবনে নিজ হাতে
                                        উত্তোলন করেন
                                        স্বাধীন বাংলার পতাকা। সেখানে সংক্ষিপ্ত ভাষণে বঙ্গবন্ধু বলেন- “সাত কোটি
                                        মানুষের মুক্তি না
                                        হওয়া পর্যন্ত আমাদের সংগ্রাম চলবে” (২৩ মার্চ, ১৯৭১)।


                                    </span></h6>
                                <button onclick="myFunction4()" id="myBtn4" class="btn btn-warning "
                                    style="width: 40%; margin-right: 2%;">বিস্তারিত দেখুন</button>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 m-12 col-sm-6 col-xs-12">
                    <div class="video-box card h-100">
                        <div class="video-item">
                            <img src="{{asset('/mujib100')}}/assets/images/mujib/speech/4.png" class="img-fluid">
                            <span class="badge badge-dark duration">7:19</span>
                            <div class="video-btn">
                                <a data-fancybox="" href="https://mujib100.gov.{{asset('/mujib100')}}/assets/images/videos/Video 6.mp4"
                                    class="btn btn-sm vx-btn btn-outline-warning">এখন দেখুন</a>
                            </div>
                        </div>
                        <div class="container" style="margin-top: 3%;">
                            <div class="caption">
                                <h6>১৯৭১ সালের ২৫ মার্চের কালরাতে, পাকিস্তানি হানাদার বাহিনী কর্তৃক গ্রেফতারের
                                    পূর্বমুহূর্তে
                                    বঙ্গবন্ধু শেখ মুজিবুর রহমান বাংলাদেশের স্বাধীনতা ঘোষণা করেন।<span
                                        id="dots5">...</span><span id="more5"> নিরস্ত্র বাঙালির উপর
                                        পাকিস্তানি হানাদার বাহিনীর হত্যাযজ্ঞ এবং বঙ্গবন্ধুর স্বাধীনতা ঘোষণার
                                        খবরটি বিশ্ব
                                        মিডিয়া
                                        গুরুত্ব সহকারে তুলে ধরে (২৬ মার্চ, ১৯৭১)।


                                    </span></h6>
                                <button onclick="myFunction5()" id="myBtn5" class="btn btn-warning "
                                    style="width: 40%; margin-right: 2%;">বিস্তারিত দেখুন</button>


                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 m-12 col-sm-6 col-xs-12">
                    <div class="video-box card h-100">
                        <div class="video-item">
                            <img src="{{asset('/mujib100')}}/assets/images/mujib/speech/speech7.png" class="img-fluid">
                            <span class="badge badge-dark duration">4:53</span>
                            <div class="video-btn">
                                <a data-fancybox="" href="https://mujib100.gov.{{asset('/mujib100')}}/assets/images/videos/Video 7.mp4"
                                    class="btn btn-sm vx-btn btn-outline-warning">এখন দেখুন</a>
                            </div>
                        </div>
                        <div class="container" style="margin-top: 3%;">
                            <div class="caption">
                                <h6>দীর্ঘ নয় মাস পাকিস্তানি কারাগারে বন্দী থাকার পর বাঙালি জাতির অবিসংবাদিত
                                    নেতা
                                    জাতির
                                    পিতা
                                    বঙ্গবন্ধু শেখ মুজিবুর রহমান পাকিস্তান থেকে লন্ডন এবং নয়াদিল্লী হয়ে
                                    বাংলাদেশে
                                    প্রত্যাবর্তন করেন। <span id="dots6">...</span><span id="more6">

                                        নয়াদিল্লীতে পৌঁছালে ভারতের জনগণ বঙ্গবন্ধুকে
                                        প্রাণঢালা অভিনন্দন
                                        এবং
                                        ভালোবাসা জানায়। অভিনন্দনের জবাবে বঙ্গবন্ধু শেখ মুজিবুর রহমান
                                        মুক্তিযুদ্ধ চলাকালে
                                        ভারতের
                                        জনগণের সহযোগিতার জন্য ধন্যবাদ ও কৃতজ্ঞতা জানান। নয়াদিল্লীতে সংবর্ধনা
                                        সভায়
                                        বঙ্গবন্ধু
                                        আরো বলেন- “আমি বিশ্বাস করি সেক্যুলারিজমে। আমি বিশ্বাস করি গণতন্ত্রে, আমি
                                        বিশ্বাস করি
                                        সোশ্যালিজমে।" (১০ জানুয়ারি, ১৯৭২)।
                                    </span></h6>
                                <button onclick="myFunction6()" id="myBtn6" class="btn btn-warning "
                                    style="width: 40%; margin-right: 2%;">বিস্তারিত দেখুন</button>


                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <div class="row gutter-2" style="margin-top:12px">
            <div class="col-lg-4 col-md-4 m-12 col-sm-6 col-xs-12">
                <div class="video-box card h-100">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/speech/speech8.png" class="img-fluid">
                        <span class="badge badge-dark duration">20:29</span>
                        <div class="video-btn">
                            <a data-fancybox="" href="https://mujib100.gov.{{asset('/mujib100')}}/assets/images/videos/Video 8.mp4"
                                class="btn btn-sm vx-btn btn-outline-warning">এখন দেখুন</a>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 3%;">
                        <div class="caption">
                            <h6>বাংলাদেশের স্থপতি বঙ্গবন্ধু শেখ মুজিবুর রহমান পাকিস্তানের কারাগার থেকে মুক্ত
                                হয়ে
                                ফিরে
                                আসেন স্বাধীন -সার্বভৌম বাংলাদেশে। সেদিন বাঙালি জাতি তাঁর শ্রেষ্ঠ সন্তানকে
                                <span id="dots7">...</span><span id="more7">

                                    অবিসমরণীয়
                                    সংবর্ধনা জানায়। লক্ষ জনতার হৃদয় নিংড়ানো ভালোবাসায় স্নাত হয়ে বঙ্গবন্ধু
                                    শেখ মুজিবুর
                                    রহমান বিমানবন্দর থেকে সরাসরি রেসকোর্স ময়দানে আসেন এবং অশ্রুসিক্ত নয়নে
                                    জাতির উদ্দেশ্যে
                                    ভাষণ দেন। ভাষণে বঙ্গবন্ধু বলেন- ‘যে মাটিকে আমি এত ভালবাসি, যে মানুষকে আমি এত
                                    ভালবাসি, যে
                                    জাতিকে আমি এত ভালবাসি, আমি জানতাম না সে বাংলায় আমি যেতে পারবো কিনা। আজ আমি
                                    বাংলায় ফিরে
                                    এসেছি বাংলার ভাইয়েদের কাছে, মায়েদের কাছে, বোনদের কাছে। বাংলা আমার স্বাধীন,
                                    বাংলাদেশ আজ
                                    স্বাধীন।’ (১০ জানুয়ারি, ১৯৭২)।

                                </span></h6>
                            <button onclick="myFunction7()" id="myBtn7" class="btn btn-warning "
                                style="width: 40%; margin-right: 2%;">বিস্তারিত দেখুন</button>


                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 m-12 col-sm-6 col-xs-12">
                <div class="video-box card h-100">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/speech/speech9.png" class="img-fluid">
                        <span class="badge badge-dark duration">3:02</span>
                        <div class="video-btn">
                            <a data-fancybox="" href="https://mujib100.gov.{{asset('/mujib100')}}/assets/images/videos/Video 9.mp4"
                                class="btn btn-sm vx-btn btn-outline-warning">এখন দেখুন</a>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 3%;">
                        <div class="caption">
                            <h6>স্বাধীন বাংলাদেশের প্রধানমন্ত্রী হিসেবে দায়িত্ব গ্রহণের পর বঙ্গবন্ধু শেখ
                                মুজিবুর
                                রহমান
                                ভারতে প্রথম রাষ্ট্রীয় সফরে যান। কলকাতার ব্রিগেড প্যারেড গ্রাউন্ডে লক্ষ লক্ষ
                                মানুষের
                                <span id="dots8">...</span><span id="more8">


                                    সামনে ভারতের সর্বস্তরের মানুষ ও ভারতীয় প্রধানমন্ত্রীর প্রতি কৃতজ্ঞতা প্রকাশ
                                    করেন
                                    বঙ্গবন্ধু ( ৬ মার্চ, ১৯৭২)।


                                </span></h6>
                            <button onclick="myFunction8()" id="myBtn8" class="btn btn-warning "
                                style="width: 40%; margin-right: 2%;">বিস্তারিত দেখুন</button>


                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 m-12 col-sm-6 col-xs-12">
                <div class="video-box card h-100">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/speech/speech10.png" class="img-fluid">
                        <span class="badge badge-dark duration">17:39</span>
                        <div class="video-btn">
                            <a data-fancybox="" href="https://mujib100.gov.{{asset('/mujib100')}}/assets/images/videos/Video 10.mp4"
                                class="btn btn-sm vx-btn btn-outline-warning">এখন দেখুন</a>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 3%;">
                        <div class="caption">
                            <h6>মুক্তিযুদ্ধ শেষে সদ্য স্বাধীন দেশের সার্বিক নিরাপত্তা বজায় রাখার স্বার্থে
                                প্রধানমন্ত্রী
                                বঙ্গবন্ধু শেখ মুজিবুর রহমান মুক্তিযোদ্ধাদের উদ্দেশ্যে অস্ত্র সমপর্ণের আহ্‌বান
                                জানান।

                                <span id="dots9">...</span><span id="more9">
                                    বঙ্গবন্ধুর আহ্‌বানে সাড়া দিয়ে

                                    মুক্তিযোদ্ধারা ঢাকা স্টেডিয়ামে অস্ত্র সমপর্ণ করেন।
                                    অস্ত্র সমপর্ণ অনুষ্ঠানে এক আবেগঘন ভাষণে মুক্তিযোদ্ধাদের উদ্দেশ্যে বঙ্গবন্ধু
                                    শেখ মুজিবুর
                                    রহমান বলেন –“আমি সব ত্যাগ করতে পারি কিন্তু তোমাদের ভালোবাসা ত্যাগ করতে পারি
                                    না” (৩১
                                    জানুয়ারি,১৯৭২)।


                                </span></h6>
                            <button onclick="myFunction9()" id="myBtn9" class="btn btn-warning "
                                style="width: 40%; margin-right: 2%;">বিস্তারিত দেখুন</button>


                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row gutter-2" style="margin-top:12px">
            <div class="col-lg-4 col-md-4 m-12 col-sm-6 col-xs-12">
                <div class="video-box card h-100">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/speech/10.png" class="img-fluid">
                        <span class="badge badge-dark duration">25:25</span>
                        <div class="video-btn">
                            <a data-fancybox="" href="https://mujib100.gov.{{asset('/mujib100')}}/assets/images/videos/Video 11.mp4"
                                class="btn btn-sm vx-btn btn-outline-warning">এখন দেখুন</a>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 3%;">
                        <div class="caption">
                            <h6>সদ্য স্বাধীন বাংলাদেশের জন্য আন্তর্জাতিক সমর্থন ও সহযোগিতা লাভের উদ্দেশ্যে
                                বঙ্গবন্ধু শেখ
                                মুজিবুর রহমান আলজেরিয়ার রাজধানী আলজিয়ার্সে অনুষ্ঠিত চতুর্থ ন্যাম শীর্ষ
                                সম্মেলনে যোগ <span id="dots10">...</span><span id="more10">

                                    দেন।

                                    ওই সময় তিনি বাদশাহ ফয়সাল, প্রেসিডেন্ট টিটো, প্রেসিডেন্ট আনোয়ার সাদাত,
                                    প্রেসিডেন্ট ইদি আমিন, প্রেসিডেন্ট মুয়াম্মার গাদ্দাফি, প্রমুখ ব্যক্তির সঙ্গে
                                    দ্বিপক্ষীয়
                                    বৈঠকে মিলিত হন। ন্যাম সম্মেলনের ঐতিহাসিক বক্তৃতায় বঙ্গবন্ধু শেখ মুজিবুর
                                    রহমান বলেন –
                                    “বিশ্ব আজ দুই ভাগে বিভক্ত,শোষক আর শোষিত,আমি শোষিতের পক্ষে" ( ৬ সেপ্টেম্বর,
                                    ১৯৭৩)।


                                </span></h6>
                            <button onclick="myFunction10()" id="myBtn10" class="btn btn-warning "
                                style="width: 40%; margin-right: 2%;">বিস্তারিত দেখুন</button>


                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 m-12 col-sm-6 col-xs-12">
                <div class="video-box card h-100">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/speech/11.png" class="img-fluid">
                        <span class="badge badge-dark duration">12:30</span>
                        <div class="video-btn">
                            <a data-fancybox="" href="https://www.youtube.com/watch?v=61lKrhVMYfA"
                                class="btn btn-sm vx-btn btn-outline-warning">এখন দেখুন</a>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 3%;">
                        <div class="caption">
                            <h6>জাতিসংঘের ২৯ তম সাধারণ অধিবেশনে বঙ্গবন্ধু শেখ মুজিবুর রহমান প্রথম বারের মত
                                বাংলায়
                                বক্তৃতা করেন। সেই হিরণ্ময় ভাষণে বঙ্গবন্ধু শেখ মুজিবুর রহমান বলেন <span
                                    id="dots11">...</span><span id="more11">

                                    -“‘বাংলাদেশের মতো যেই
                                    সব দেশ দীর্ঘ সংগ্রাম ও আত্মদানের মাধ্যমে নিজেদের প্রতিষ্ঠিত করিয়াছে, কেবল
                                    তাহাদেরই এই
                                    দৃঢ়তা ও মনোবল রহিয়াছে, মনে রাখিবেন সভাপতি, আমার বাঙালি জাতি চরম দুঃখ ভোগ
                                    করিতে পারে,
                                    কিন্তু মরিবে না, টিকিয়া থাকিবার চ্যালেঞ্জ মোকাবেলায় আমার জনগণের দৃঢ়তাই
                                    আমাদের প্রধান
                                    শক্তি।’ (২৫ সেপ্টেম্বর, ১৯৭৪)।


                                </span></h6>
                            <button onclick="myFunction11()" id="myBtn11" class="btn btn-warning "
                                style="width: 40%; margin-right: 2%;">বিস্তারিত দেখুন</button>


                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 m-12 col-sm-6 col-xs-12">
                <div class="video-box card h-100">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/speech/speech13.png" class="img-fluid">
                        <span class="badge badge-dark duration">20:37</span>
                        <div class="video-btn">
                            <a data-fancybox="" href="https://mujib100.gov.{{asset('/mujib100')}}/assets/images/videos/Video 13.mp4"
                                class="btn btn-sm vx-btn btn-outline-warning">এখন দেখুন</a>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 3%;">
                        <div class="caption">
                            <h6>স্বাধীন বাংলাদেশে সদ্য প্রতিষ্ঠিত মিলিটারি একাডেমির উদ্‌বোধনী অনুষ্ঠানে
                                সেনাবাহিনীর
                                প্রতি এক দিক নির্দেশনামূলক বক্তৃতা রাখেন বঙ্গবন্ধু শেখ মুজিবুর রহমান। বক্তৃতায়
                                বঙ্গবন্ধু বলেন- <span id="dots12">...</span><span id="more12">
                                    ‘শৃঙ্খলা ছাড়া কোন জাতি বড় হতে পারে না’ (১১ জানুয়ারি, ১৯৭৫) ।

                                </span></h6>
                            <button onclick="myFunction12()" id="myBtn12" class="btn btn-warning "
                                style="width: 40%; margin-right: 2%;">বিস্তারিত দেখুন</button>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutter-2" style="margin-top:12px">
            <div class="col-lg-4 col-md-4 m-12 col-sm-6 col-xs-12">
                <div class="video-box card h-100">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/speech/13.png" class="img-fluid">
                        <span class="badge badge-dark duration">12:30</span>
                        <div class="video-btn">
                            <a data-fancybox="" href="https://www.youtube.com/watch?v=MCUfNVE8C6g"
                                class="btn btn-sm vx-btn btn-outline-warning">এখন দেখুন</a>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 3%;">
                        <div class="caption">
                            <h6>সরকারী কর্মকর্তা -কর্মচারীদের উদ্দেশ্যে দেয়া এক ভাষণে বঙ্গবন্ধু শেখ মুজিবুর
                                রহমান স্মরণ
                                করিয়ে দেন- দেশের শ্রমিক -কৃষক-মেহনতি মানুষের অর্থে দেশ পরিচালিত হয়, <span
                                    id="dots13">...</span><span id="more13">
                                    তাঁরাই এইদেশের
                                    মালিক সুতরাং তাঁদের যথার্থ সম্মান এবং সেবা দিতে হবে সবার আগে(২৫ জানুয়ারি,
                                    ১৯৭৫)।
                                </span></h6>
                            <button onclick="myFunction13()" id="myBtn13" class="btn btn-warning "
                                style="width: 40%; margin-right: 2%;">বিস্তারিত দেখুন</button>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
