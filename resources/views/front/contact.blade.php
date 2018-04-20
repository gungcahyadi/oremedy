@extends('layouts.front')

@section('page-head-seo')
    <meta name="description" content="{{ $contact->meta_description }}">
    <meta name="keywords" content="{{ $contact->meta_keyword }}">
    <title>{{ $contact->meta_title }} - O-Remedy</title>
@endsection
@section('custom-css')
    <link href="{{ asset('assets/front/css/contact-1.css') }}" rel="stylesheet">
@endsection
@section('conten')
    <!-- Header Section -->
    <header class="hero-area">
        <div class="container-fluid no-padding">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="section-content">
                        <span class="text-error"><i class="fa fa-phone-square"></i></span>
                        <h2 class="header-title">+0987654321</h2>
                        <p>For any query call us. Our 24/7 help line is always open.</p>
                        <a href="callto:+0987654321" class="btn">call us  <i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="section-img">
                        <img class="img-responsive" src="{{ asset('assets/front/img/hero-21.jpg') }}" alt="themesnerd">
                    </div>
                </div>

            </div>
        </div>
    </header>
    <!-- /Header Section -->
    <!-- Contact Form Section -->
    <section id="contact-form-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-3 col-sm-12 text-center">
                    <h2 class="section-heading">Send Your Feedback</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-push-3 col-sm-12">
                    <form id="contact-form" action="#" method="post">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input name="contact-name" type="text" class="form-control" placeholder="jhon deo" />
                            <label>Your Email Address</label>
                            <input name="contact-email" type="text" class="form-control" placeholder="someone@email.com" />
                            <label>Your Message</label>
                            <textarea name="contact-message" class="" placeholder="your message"></textarea>
                            <button type="submit" class="btn btn-outline">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /Contact Form Section -->

    <!-- Offices Section -->
    <section id="location">
        <div class="container">
            <div class="row">
                @foreach($office as $ofc)
                <div class="col-md-4 col-sm-6 col-sm-12">
                    <div class="location-content">
                        <h4 class="location-title">{{ $ofc->title }}</h4>
                        <p>
                            {{ $ofc->conten }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Offices Section -->
@endsection