@extends('mujib100.Layouts.master');
@section('body');
<main id="main">
    <section id="testimonials">
        <div class="container-fluid">
            <div class="section-header mt-5">
                <div class="testimonial-item">

                    <h3>স্মরণে বঙ্গবন্ধু শেখ মুজিবুর রহমান</h3>
                    <br />
                    <img src="{{asset('/mujib100')}}/assets/images/recog_mujib.jpg" class="testimonial-img--recog" alt="">
                </div>
            </div>
            <div class="row no-gutters wow fadeInUp">
                <div class="col-sm-4">
                    <div class="testimonial-item">

                        <p>
                            <img src="{{asset('/mujib100')}}/assets/images/icons/quote-1.jpg" class="quote-sign-left" alt="">
                            শেখ মুজিব নিহত হওয়ার খবরে আমি মর্মাহত। তিনি
                            একজন মহান নেতা ছিলেন। তাঁর অনন্য সাধারণ সাহসিকতা এশিয়া ও
                            আফ্রিকার জনগণের জন্য প্রেরণাদায়ক ছিল। <img
                                src="{{asset('/mujib100')}}/assets/images/icons/quote-2.jpg" class="quote-sign-left" alt="">
                        </p>
                        <img src="{{asset('/mujib100')}}/assets/images/profile/indira_gandhi.jpg" class="testimonial-img"
                            alt="">


                        <h3>ইন্দিরা গান্ধী</h3>
                        <h4>গণপ্রজাতন্ত্রী ভারতের সাবেক প্রধানমন্ত্রী</h4>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="testimonial-item">

                        <p>
                            <img src="{{asset('/mujib100')}}/assets/images/icons/quote-1.jpg" class="quote-sign-left" alt="">
                            আমি হিমালয় দেখিনি, কিন্তু শেখ মুজিবকে দেখেছি। ব্যক্তিত্ব ও সাহসিকতায় তিনি হিমালয়ের
                            মতো।<img src="{{asset('/mujib100')}}/assets/images/icons/quote-2.jpg" class="quote-sign-left"
                                alt="">
                        </p>
                        <img src="{{asset('/mujib100')}}/assets/images/profile/profile-03.png" class="testimonial-img" alt="">

                        <h3>ফিদেল ক্যাস্ত্রো</h3>
                        <h4>গণপ্রজাতন্ত্রী কিউবার সাবেক প্রেসিডেন্ট এবং কিংবদন্তি বিপ্লবী</h4>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="testimonial-item">

                        <p>
                            <img src="{{asset('/mujib100')}}/assets/images/icons/quote-1.jpg" class="quote-sign-left" alt="">
                            যতকাল রবে পদ্মা যমুনা গৌরি মেঘনা বহমান <br />
                            ততকাল রবে কীর্তি তোমার বঙ্গবন্ধু শেখ মুজিবুর রহমান।
                            <img src="{{asset('/mujib100')}}/assets/images/icons/quote-2.jpg" class="quote-sign-left" alt="">
                        </p>

                        <img src="{{asset('/mujib100')}}/assets/images/profile/profile-01.png" class="testimonial-img" alt="">

                        <h3>অন্নদাশঙ্কর রায়</h3>
                        <h4>বাঙালি কবি এবং প্রাবন্ধিক</h4>
                    </div>
                </div>


            </div>
            <div class="row no-gutters wow fadeInUp" data-wow-delay="0.2s">
                <!-- <div class="col-sm-4">
                    <div class="testimonial-item">
                        <p class="en">
                            <img src="./{{asset('/mujib100')}}/assets/images/icons/quote-1.jpeg" class="quote-sign-left" alt="">
                            On the death of Sheikh Mujib, the world of the oppressed has lost an incredible
                            leader.
                            And, I have lost a true friend with a benevolent heart <img
                                src="./{{asset('/mujib100')}}/assets/images/icons/quote-2.jpeg" class="quote-sign-right" alt="">
                        </p>
                        <p >
                            <img src="./{{asset('/mujib100')}}/assets/images/icons/quote-1.jpeg" class="quote-sign-left" alt="">
                            শেখ মুজিবের মৃত্যুতে বিশ্বের শোষিত মানুষ তাদের একজন অবিসংবাদিত নেতাকে হারালো। আর আমি
                            হারালাম মহৎ হৃদয়ের অধিকারী একজন সত্যিকারের বন্ধু
                            <img src="./{{asset('/mujib100')}}/assets/images/icons/quote-2.jpeg" class="quote-sign-left" alt="">
                        </p>
                        <img src="./{{asset('/mujib100')}}/assets/images/profile/fidel_castro.jpeg" class="testimonial-img"
                            alt="">
                        <h3 class="en">Fidel Castro</h3>
                        <h4 class="en">Former Prime Minister of Cuba</h4>


                        <h3 >ফিদেল ক্যাস্ত্রো</h3>
                        <h4 >কিউবার সাবেক প্রেসিডেন্ট এবং কিংবদন্তি বিপ্লবী</h4>

                    </div>
                </div> -->
                <div class="col-sm-4">
                    <div class="testimonial-item">

                        <p>
                            <img src="{{asset('/mujib100')}}/assets/images/icons/quote-1.jpg" class="quote-sign-left" alt="">
                            বঙ্গবন্ধু সর্বকালের শ্রেষ্ঠ সাহসী নেতা। <img
                                src="{{asset('/mujib100')}}/assets/images/icons/quote-2.jpg" class="quote-sign-left" alt="">
                        </p>
                        <img src="{{asset('/mujib100')}}/assets/images/profile/pronob.jpg" class="testimonial-img" alt="">

                        <h3>প্রণব মুখার্জী</h3>
                        <h4>ভারতের সাবেক রাষ্ট্রপতি</h4>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="testimonial-item">

                        <p>

                            <img src="{{asset('/mujib100')}}/assets/images/icons/quote-1.jpg" class="quote-sign-left" alt="">
                            বঙ্গবন্ধু শেখ মুজিবুর রহমান গণতন্ত্রের প্রতিমূর্তি, এক বিশাল ব্যক্তিত্ব এবং ভারতের
                            এক মহান বন্ধু। <img src="{{asset('/mujib100')}}/assets/images/icons/quote-2.jpg"
                                class="quote-sign-left" alt="">
                        </p>
                        <img src="{{asset('/mujib100')}}/assets/images/profile/modi.png" class="testimonial-img" alt="">



                        <h3>নরেন্দ্র মোদি</h3>
                        <h4>গণপ্রজাতন্ত্রী ভারতের প্রধানমন্ত্রী </h4>

                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="testimonial-item">


                        <p>
                            <img src="{{asset('/mujib100')}}/assets/images/icons/quote-1.jpg" class="quote-sign-left" alt="">
                            বঙ্গবন্ধু শেখ মুজিবুর রহমান শুধু বাংলাদেশের সম্পত্তি নন। তিনি সমগ্র বাঙালির মুক্তির
                            অগ্রদূত।
                            <img src="{{asset('/mujib100')}}/assets/images/icons/quote-2.jpg" class="quote-sign-left" alt="">
                        </p>
                        <img src="{{asset('/mujib100')}}/assets/images/profile/heikal.jpg" class="testimonial-img" alt="">
                        <h3>মোহাম্মদ হাসনাইন হাইকল</h3>
                        <h4>প্রখ্যাত মিশরীয় সাংবাদিক</h4>
                    </div>
                </div>


            </div>
            <div class="row no-gutters wow fadeInUp" data-wow-delay="0.4s">
                <div class="col-sm-4">
                    <div class="testimonial-item">

                        <p style="font-size: 14px !important">
                            <img src="{{asset('/mujib100')}}/assets/images/icons/quote-1.jpg" class="quote-sign-left" alt="">
                            সহিংস ও কাপুরুষোচিতভাবে বাংলাদেশের জনগণের মাঝ থেকে এমন প্রতিভাবান ও সাহসী নেতৃত্বকে
                            সরিয়ে দেওয়া কী যে মর্মান্তিক ঘটনা!
                            তারপরও বাংলাদেশ এখন বঙ্গবন্ধুর স্বপ্ন বাস্তবায়নে এগিয়ে যাচ্ছে, তাঁরই কন্যার
                            নেতৃত্বে। যুক্তরাষ্ট্র তাঁর সেই স্বপ্ন পূরণে বন্ধু ও সমর্থক হতে পেরে গর্ববোধ করে।
                            <img src="{{asset('/mujib100')}}/assets/images/icons/quote-2.jpg" class="quote-sign-left" alt="">
                        </p>
                        <img src="{{asset('/mujib100')}}/assets/images/profile/kery.jpg" class="testimonial-img" alt="">

                        <h3>জন কেরি</h3>
                        <h4>যুক্তরাষ্ট্রের সাবেক পররাষ্ট্রমন্ত্রী</h4>
                    </div>
                </div>
                <!-- <div class="col-sm-4">
                    <div class="testimonial-item">
                        <p class="en">
                            <img src="./{{asset('/mujib100')}}/assets/images/icons/quote-1.jpeg" class="quote-sign-left" alt="">
                            Sheikh Mujibur Rahman has inspired the Vietnamese people <img
                                src="./{{asset('/mujib100')}}/assets/images/icons/quote-2.jpeg" class="quote-sign-right" alt="">
                        </p>
                        <p >

                                <img src="./{{asset('/mujib100')}}/assets/images/icons/quote-1.jpeg" class="quote-sign-left" alt="">
                                বঙ্গবন্ধু শেখ মুজিবুর রহমান ভিয়েতনামি জনগণকে অনুপ্রাণিত করেছিলেন <img
                                    src="./{{asset('/mujib100')}}/assets/images/icons/quote-2.jpeg" class="quote-sign-left" alt="">
                        </p>
                        <img src="./{{asset('/mujib100')}}/assets/images/profile/kenneth.jpg" class="testimonial-img" alt="">
                        <h3 class="en">Kenneth Kaunda</h3>
                        <h4 class="en">Zambian Politician</h4>



                            <h3 >কেনেথা কাউন্ডা</h3>
                            <h4 >জাম্বিয়ান রাজনীতিবিদ</h4>

                    </div>
                </div> -->
                <div class="col-sm-4">
                    <div class="testimonial-item">

                        <p>
                            <img src="{{asset('/mujib100')}}/assets/images/icons/quote-1.jpg" class="quote-sign-left" alt="">
                            আপোষহীন সংগ্রামী নেতৃত্ব এবং কুসুমকোমল হৃদয় ছিল মুজিবের চরিত্রের বিশেষত্ব।
                            <img src="{{asset('/mujib100')}}/assets/images/icons/quote-2.jpg" class="quote-sign-left" alt="">
                        </p>
                        <img src="{{asset('/mujib100')}}/assets/images/profile/yeasir_arafat.jpg" class="testimonial-img"
                            alt="">


                        <h3>ইয়াসির আরাফাত</h3>
                        <h4>ফিলিস্তান মুক্তি মোর্চার সাবেক নেতা, নোবেল বিজয়ী</h4>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="testimonial-item">

                        <p>

                            <img src="{{asset('/mujib100')}}/assets/images/icons/quote-1.jpg" class="quote-sign-left" alt="">
                            এই বিশেষ বাড়িটিতে এসে আমি বেশ আবেগাপ্লুত! বাড়িটি যথাযথভাবে সংরক্ষণ করা হয়েছে জেনে
                            আমি কৃতজ্ঞ। <img src="{{asset('/mujib100')}}/assets/images/icons/quote-2.jpg"
                                class="quote-sign-left" alt="">
                        </p>
                        <img src="{{asset('/mujib100')}}/assets/images/profile/jolie.jpg" class="testimonial-img" alt="">


                        <h3>অ্যাঞ্জেলিনা জোলি</h3>
                        <h4>হলিউড অভিনেত্রী ,চলচ্চিত্রকার এবং মানবাধিকার কর্মী</h4>

                    </div>
                </div>


            </div>
        </div>
    </section>

</main>
@endsection
