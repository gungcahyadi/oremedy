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
                        <img class="img-responsive" src="{{ asset('assets/front/img/about-1.jpg') }}" alt="themesnerd">
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
    <!-- About Section 2 -->
    <section id="about-sec-2" class="about">
        <div class="container-fluid no-padding">
            <div class="row">
                <div class="col-md-6 col-sm-12 no-padding">
                    <div class="section-img">
                        <img class="img-responsive" src="{{ asset('assets/front/img/about-2.jpg') }}" alt="themesnerd">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 no-padding">
                    <div class="section-content">
                        <h2 class="section-heading">{{ $about->title }}</h2>
                        <p>{!! $about->conten !!}</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /About Section 2 -->
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
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <figure class="wow fadeIn">
                        <img alt="themesnerd" class="img-responsive" src="{{ asset('assets/front/img/team-1.jpg') }}">
                        <figcaption>
                            <a href="#" data-toggle="modal" data-target=".person-in-modal">
                                <div class="person-icon"><i class="fa fa-user-circle"></i>
                                </div>
                                <h4>Mohammad Nabi</h4>
                                <p>Chief Executive Officer</p>
                            </a>
                            <div class="person-social">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <!-- /Team-Member 1 -->
                <!-- Team-Member 2 -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <figure class="wow fadeIn">
                        <img alt="themesnerd" class="img-responsive" src="{{ asset('assets/front/img/team-2.jpg') }}">
                        <figcaption>
                            <a href="#" data-toggle="modal" data-target=".person-in-modal">
                                <div class="person-icon"><i class="fa fa-user-circle"></i>
                                </div>
                                <h4>Cristina Roka</h4>
                                <p>Project Manager</p>
                            </a>
                            <div class="person-social">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <!-- /Team-Member 2 -->
                <!-- Team-Member 3 -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <figure class="wow fadeIn">
                        <img alt="themesnerd" class="img-responsive" src="{{ asset('assets/front/img/team-3.jpg') }}">
                        <figcaption>
                            <a href="#" data-toggle="modal" data-target=".person-in-modal">
                                <div class="person-icon"><i class="fa fa-user-circle"></i>
                                </div>
                                <h4>Azmiri Chowdhuary</h4>
                                <p>Business Manager</p>
                            </a>
                            <div class="person-social">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <!-- /Team-Member 3 -->
                <!-- Team-Member 4 -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <figure class="wow fadeIn">
                        <img alt="themesnerd" class="img-responsive" src="{{ asset('assets/front/img/team-4.jpg') }}">
                        <figcaption>
                            <a href="#" data-toggle="modal" data-target=".person-in-modal">
                                <div class="person-icon"><i class="fa fa-user-circle"></i>
                                </div>
                                <h4>Amir Hamza</h4>
                                <p>Lead UX Designer</p>
                            </a>
                            <div class="person-social">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <!-- /Team-Member 4 -->
                <!-- Team-Member 5 -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <figure class="wow fadeIn">
                        <img alt="themesnerd" class="img-responsive" src="{{ asset('assets/front/img/team-5.jpg') }}">
                        <figcaption>
                            <a href="#" data-toggle="modal" data-target=".person-in-modal">
                                <div class="person-icon"><i class="fa fa-user-circle"></i>
                                </div>
                                <h4>Arabi Hossain</h4>
                                <p>UI Designer</p>
                            </a>
                            <div class="person-social">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <!-- /Team-Member 5 -->
                <!-- Team-Member 6 -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <figure class="wow fadeIn">
                        <img alt="themesnerd" class="img-responsive" src="{{ asset('assets/front/img/team-6.jpg') }}">
                        <figcaption>
                            <a href="#" data-toggle="modal" data-target=".person-in-modal">
                                <div class="person-icon"><i class="fa fa-user-circle"></i>
                                </div>
                                <h4>Asmin Ara</h4>
                                <p>UX Designer</p>
                            </a>
                            <div class="person-social">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <!-- /Team-Member 6 -->
            </div>
        </div>
    </section>
    <!-- /Team-Member Area -->
@endsection