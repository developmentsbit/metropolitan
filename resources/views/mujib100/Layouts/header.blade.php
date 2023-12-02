@php
$setting = DB::table('setting')->first();
@endphp
<header id="header" class="fixed-top">
    <div class="container">
        <div class="logo float-left">
            <a href="{{url('/mujib_corner')}}" class="scrollto">
                {{-- <img src="{{url($setting->image)}}" alt="" class="img-fluid"> --}}
                <img src="{{asset('/mujib100')}}/assets/images/logo.png" alt="" class="img-fluid"></a>  {{$setting->name}}
        </div>
        <nav class="main-nav float-right d-none d-lg-block">
            <ul>

                <li class="drop-down @if(request()->path() === 'mujib_corner'){{'active'}}@else @endif" id="committee">
                    <a href="{{url('/mujib_corner')}}">
                       Home
                        <span class="fa-arrow"></span>
                    </a>

                </li>
                <li class="drop-down @if(request()->path() === 'graphic_novel'){{'active'}}@else @endif" id="committee">
                    <a href="{{url('/graphic_novel')}}">
                       Graphic Novel
                        <span class="fa-arrow"></span>
                    </a>

                </li>

                <li class="drop-down @if(request()->path() === 'recognition'){{'active'}}@else @endif" id="committee">
                    <a href="{{url('/recognition')}}">
                       Recognition
                        <span class="fa-arrow"></span>
                    </a>

                </li>

                <li class="drop-down @if(request()->path() === 'time_line'){{'active'}}@else @endif" id="committee">
                    <a href="{{url('/time_line')}}">
                       Timeline
                        <span class="fa-arrow"></span>
                    </a>

                </li>

                <li class="drop-down @if(request()->path() === 'photo_archive'){{'active'}}@else @endif" id="committee">
                    <a href="{{url('/photo_archive')}}">
                        Photo Archive
                        <span class="fa-arrow"></span>
                    </a>

                </li>

                  <li class="drop-down @if(request()->path() === 'speeches'){{'active'}}@else @endif" id="committee">
                    <a href="{{url('/speeches')}}">
                        Speeches
                        <span class="fa-arrow"></span>
                    </a>

                </li>
            </ul>

        </nav><!-- .main-nav -->

    </div>
</header>
