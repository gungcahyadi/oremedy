@extends('layouts.front')

@section('page-head-seo')
    <meta name="description" content="{{ $about->meta_description }}">
    <meta name="keywords" content="{{ $about->meta_keyword }}">
    <title>{{ $about->meta_title }} - O-Remedy</title>
@endsection
@section('custom-css')
    <link href="{{ asset('assets/front/css/about.css') }}" rel="stylesheet">
@endsection
@section('conten')
    <!-- About Section 1 -->
    <section id="about-sec-1" class="about">
        <div class="container-fluid no-padding">
            <div class="row">
                <div class="col-md-6 col-md-push-6 col-sm-12 no-padding">
                    <div class="section-img">
                        <img class="img-responsive" src="{{ asset('assets/front/img/'.$about->thumb_image) }}" alt="themesnerd">
                    </div>
                </div>
                <div class="col-md-6 col-md-pull-6 col-sm-12 no-padding">
                    <div class="section-content">
                        <h2 class="section-heading">{{ $about->title }}</h2>
                        <p>{!! $about->conten !!}</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /About Section 1 -->
    <!-- Team-Member Area -->
    <section id="team-member">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="section-heading">Our Creative Mind</h2>
                </div>
            </div>
            <div class="row team-members">
                <!-- Team-Member 1 -->
                @foreach($team as $tm)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <figure class="wow fadeIn">
                        <img alt="themesnerd" class="img-responsive" src="{{ asset('assets/front/images/'.$tm->image) }}">
                        <figcaption>
                            <div class="person-icon"><i class="fa fa-user-circle"></i>
                            </div>
                            {!! $tm->conten !!}
                        </figcaption>
                    </figure>
                </div>
                @endforeach
                <!-- /Team-Member 1 -->               
            </div>
        </div>
    </section>
    <!-- /Team-Member Area -->
@endsection