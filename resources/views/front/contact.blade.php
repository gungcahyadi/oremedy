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
                <?php
                    $tel = $contactonpage->where('slug', \Lang::get('front.ct-tel',[], \App::getLocale()))->first();
                    ?>

                <div class="col-md-6 col-sm-12">
                    <div class="section-content">
                        <span class="text-error"><i class="fa fa-phone-square"></i></span>
                        <h2 class="header-title">{{ $tel->conten }}</h2>
                        <p>{{ $tel->short_description }}</p>
                        <a href="tel:{{ $tel->conten }}" class="btn">{{ $tel->title }}<i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="section-img">
                        <img class="img-responsive" src="{{ asset('assets/front/images/'.$tel->thumb_image) }}" alt="themesnerd">
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
                    <h2 class="section-heading">{{ \Lang::get('front.sh-contact',[], \App::getLocale()) }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-push-3 col-sm-12">
                    {!! Form::open(['url' => preg_replace('#/+#','/',  config('app.locale_prefix').'/'.\Lang::get('route.contact',[], \App::getLocale())),'method' => 'post', 'id' => 'contact-form'])!!}
                        @if(Session::has('notification'))
                            <div class="alert alert-{{ Session::get('notification.level', 'info') }}" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ Session::get('notification.message') }}
                            </div>
                        @endif
                        <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                            {!! Form::text('name', null, ['placeholder' => \Lang::get('front.ctf-name',[], \App::getLocale()), 'class' => 'form-control']) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                            {!! Form::email('email', null, ['placeholder' => \Lang::get('front.ctf-email',[], \App::getLocale()), 'class' => 'form-control']) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('message') ? 'has-error' : '' !!}">
                            {!! Form::textarea('message', null, ['placeholder' => \Lang::get('front.ctf-message',[], \App::getLocale())]) !!}
                            {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
                        </div>
                        {!! app('captcha')->render() !!}
                        {!! Form::submit(\Lang::get('front.send-mess',[], \App::getLocale()), ['class' => 'btn btn-outline']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
    <!-- /Contact Form Section -->

    <!-- Offices Section -->
    <section id="location">
        <div class="container">
            <div class="row">
                <?php
                    $dhaka = $contactonpage->where('slug', \Lang::get('front.ct-dha',[], \App::getLocale()))->first();
                    $austrilia = $contactonpage->where('slug', \Lang::get('front.ct-aus',[], \App::getLocale()))->first();
                    $england = $contactonpage->where('slug', \Lang::get('front.ct-eng',[], \App::getLocale()))->first();
                    ?>
                <div class="col-md-4 col-sm-6 col-sm-12">
                    <div class="location-content">
                        <h4 class="location-title">{{ $dhaka->title }}</h4>
                        {!! $dhaka->conten !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-sm-12">
                    <div class="location-content">
                        <h4 class="location-title">{{ $austrilia->title }}</h4>
                        {!! $austrilia->conten !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-sm-12">
                    <div class="location-content">
                        <h4 class="location-title">{{ $england->title }}</h4>
                        {!! $england->conten !!}
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /Offices Section -->
@endsection