@extends('mujib100.Layouts.master')
@section('body')
<section id="video">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                @if($slider_first)
                <img src="{{asset('/mujib100/pages/image')}}/{{$slider_first->image}}" class="d-block w-100" alt="...">
                @endif
              </div>
              @if($slider_other)
              @foreach($slider_other as $showslider)
              <div class="carousel-item">
                <img src="{{asset('/mujib100/pages/image')}}/{{$showslider->image}}" class="d-block w-100" alt="...">
              </div>
              @endforeach
              @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
    </div>
</div>
    <div class="container-fluid">
    <div class="row gutter-4">
                @if($images)
                @foreach($images as $showimages)
                <div class="col-lg-4 col-md-4 col-12" id="box">
                 <!--Button trigger modal -->
                    <img src="{{asset('/mujib100/pages/image')}}/{{$showimages->image}}" class="img-fluid">
                    <p style="margin-top: 10px;">{{$showimages->title}}</p>
                    <button type="button" class="btn btn-primary btn-block w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$showimages->id}}">
                      বিস্তারিত দেখুন
                    </button>

                     <!--Modal-->
                    <div class="modal fade" id="staticBackdrop{{$showimages->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">বিস্তারিত</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">

                                <div class="modal_image">
                                    <img src="{{asset('/mujib100/pages/image')}}/{{$showimages->image}}" class="img-fluid">
                                </div>
                                <div id="modal_text">
                                    <p>{{$showimages->title}}</p><br>
                                    {!! $showimages->details !!}
                                </div>

                          </div>

                        </div>
                      </div>
                    </div>
            </div>
            @endforeach
            @endif
    </div>
</div>
</section>
@endsection
