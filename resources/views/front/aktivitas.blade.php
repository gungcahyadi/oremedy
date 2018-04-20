@extends('layouts.front')

@section('page-head-seo')
    <meta name="description" content="{{ $aktivitas->meta_description }}">
    <meta name="keywords" content="{{ $aktivitas->meta_keyword }}">
    <title>{{ $aktivitas->meta_title }} - Bali Tourism College</title>
@endsection

@section('conten')
    <!--Page Header-->
    <section class="page_header padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-content">
                    <h1>{{ $aktivitas->title }}</h1>
                    <div class="page_nav">
                        <span>{{ \Lang::get('front.breadcumsdesc',[], \App::getLocale()) }}:</span> <a href="{{ url('/'.config('app.locale_prefix')) }}">{{ \Lang::get('front.rootmenu',[], \App::getLocale()) }}</a> <span><i class="fa fa-angle-double-right"></i>{{ $aktivitas->title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header-->



    <!-- Gallery -->
    <section id="gallery" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h2 class="heading heading_space">{{ \Lang::get('front.aktivitaskami',[], \App::getLocale()) }}<span class="divider-left"></span></h2>
                </div>
                <div class="col-sm-7">
                    <div id="project-filter" class="cbp-l-filters-alignRight">
                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">{{ \Lang::get('front.semuaktivitas',[], \App::getLocale()) }}</div>
                        @foreach($category as $ct)
                        <div data-filter="{{ '.'.$ct->slug }}" class="cbp-filter-item">{{ $ct->category }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="projects" class="cbp">
                @foreach($images as $im)
                <div class="cbp-item @foreach($im->categories()->where('type', 'aktivitas')->get() as $imct) {{ $imct->slug.' ' }} @endforeach">
                    <img src="{{ asset('assets/front/images/'.$im->image) }}" alt="{{ $im->name }}">
                    <div class="overlay">
                        <div class="centered text-center">
                            <a href="{{ asset('assets/front/images/'.$im->image) }}" class="cbp-lightbox opens"> <i class="icon-focus"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection