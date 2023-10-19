@extends('mujib100.Layouts.master');
@section('body');
<section class="container-fluid">
    <div class="card">
        <div class="card-body custom-card-body">
            <!-- video -->
            <div class="video-container" >

                    <iframe width="100%" height="600" src="https://www.youtube.com/embed/SVG1NEe6epM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
            <!-- end  video  -->
            <!-- video desc + views -->
            <div class="video-desc row">
                <div class="video-desc-left col-md-8">
                    <h4>গ্রাফিক নভেল “মুজিব”</h4>
                    <p>
                        জাতির জনক বঙ্গবন্ধু শেখ মুজিবুর রহমানের ঘটনাবহুল জীবনের ইতিহাসকে তরুণ প্রজন্মের কাছে
                        পৌঁছানোর
                        লক্ষ্যে এই আয়োজন। এই আকর্ষণীয় কমিকগুলোর মাধ্যমে বঙ্গবন্ধুর মহাকাব্যিক জীবনকে তুলে আনা
                        হয়েছে।
                    </p>
                </div>

            </div>
            <!-- end video -->
        </div>
    </div>
</section>


<section id="video">
    <div class="container-fluid">
        <div class="row mt-3 mb-3 ml-2">
            <div class="col-12 my-auto">
                <p>কমিক বইগুলো সংগ্রহ করুন<br />
                    পরিবেশক: চর্চা <br />
                    মোবাইল : ০১৮২৬০১৮৬৬৫<br />
                    ইমেইল: info@charchabooks.com.bd<br />
                    ওয়েবসাইট: charchabooks.com.bd </p>
            </div>
        </div>
        <div class="row gutter-2" style="margin-top:12px">
            <div class="col-lg-3 col-md-3 m-12 col-sm-6 col-xs-12">
                <div class="video-box book-img">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/graphic-novel/Mujib-1-Bangla.jpg"
                            class="img-fluid" />

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 m-12 col-sm-6 col-xs-12">
                <div class="video-box book-img">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/graphic-novel/graphic-novel-02.png"
                            class="img-fluid" />

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 m-12 col-sm-6 col-xs-12">
                <div class="video-box book-img">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/graphic-novel/graphic-novel-03.png"
                            class="img-fluid" />

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 m-12 col-sm-6 col-xs-12">
                <div class="video-box book-img">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/graphic-novel/graphic-novel-04.png"
                            class="img-fluid" />

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 m-12 col-sm-6 col-xs-12 mnt-12">
                <div class="video-box book-img">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/graphic-novel/graphic-novel-05.png"
                            class="img-fluid" />

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 m-12 col-sm-6 col-xs-12 mnt-12">
                <div class="video-box book-img">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/graphic-novel/graphic-novel-06.png"
                            class="img-fluid" />

                    </div>
                </div>
            </div>
        </div>

        <div class="row gutter-2" style="margin-top:12px">

            <div class="col-lg-3 col-md-3 m-12 col-sm-6 col-xs-12">
                <div class="video-box book-img">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/graphic-novel/graphic-novel-07.png"
                            class="img-fluid" />

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 m-12 col-sm-6 col-xs-12">
                <div class="video-box book-img">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/graphic-novel/graphic-novel-08.png"
                            class="img-fluid" />

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 m-12 col-sm-6 col-xs-12">
                <div class="video-box book-img">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/graphic-novel/graphic-novel-09.png"
                            class="img-fluid" />

                    </div>
                </div>
            </div>



        </div>
        <div class="row gutter-2" style="margin-top:12px">


            <div class="col-lg-3 col-md-3 m-12 col-sm-6 col-xs-12">
                <div class="video-box book-img">
                    <div class="video-item">
                        <img src="{{asset('/mujib100')}}/assets/images/mujib/graphic-novel/graphic-novel-10.png"
                            class="img-fluid" />

                    </div>
                </div>
            </div>


        </div>

    </div>
</section>
@endsection
