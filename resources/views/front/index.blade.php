@extends('layouts.front')
@section('custom-css')
    <style>
        .item-content{
            width: 80%;
            margin: auto;
            height: 100%;
        }
        .item-desc{
            padding: 200px 0;
        }
        .desc{
            padding: 20px 0; 
        }
        .decor{
            width: 80px;
            height: 10px;
            background-color:#9ec75d;
        }
    </style>
@endsection
@section('custom-js')
    <script src="{{ asset('assets/front/js/index-1.js') }}"></script>
@endsection
@section('page-head-seo')
    <meta name="description" content="{{ $home->meta_description }}">
    <meta name="keywords" content="{{ $home->meta_keyword }}">
    <title>O-Remedy - Your best skincare product</title>
@endsection

@section('conten')
    <!--Text Banner-->
    <header class="hero-carousel-wrapper hero-area">

        <div id="owl-1" class="owl-carousel">
            <?php $no = 0; ?>
                @foreach($homeslider as $hs)
                    <div class="item">
                        <div class="item-img" style="background-image: url('{{ asset('assets/front/images/'.$hs->image) }}'); ">
                            @if($hs->conten != "")
                            <div class="item-content">
                                <div class="item-desc">
                                    <h2 class="section-heading">{{ $hs->name }}</h2>
                                    <div class="decor"></div>
                                    <div class="desc">
                                        {!! $hs->conten !!}
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                <?php $no++; ?>
            @endforeach
        </div>
    </header>
    <!--Text Banner ends-->
    <?php
        $lc = $onpage->where('slug', \Lang::get('front.p-latest',[], \App::getLocale()))->first();
        $vc = $onpage->where('slug', \Lang::get('front.p-vintage',[], \App::getLocale()))->first();
        $ep = $onpage->where('slug', \Lang::get('front.p-explore',[], \App::getLocale()))->first();
        ?>
    <!-- promotions -->
    <section id="promotions">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <figure class="wow fadeIn">
                        <img class="img-responsive" src="{{ asset('assets/front/images/'.$lc->thumb_image) }}">
                        <figcaption class="content">
                            <h3 class="section-heading">{{ $lc->title }}</h3>
                            <p>{{ $lc->conten }}</p>
                            <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$lc->link)) }}" class="btn btn-outline">Explore  <i class="fa fa-chevron-right"></i></a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <figure class="wow fadeIn">
                        <img class="img-responsive" src="{{ asset('assets/front/images/'.$vc->thumb_image) }}">
                        <figcaption class="content">
                            <h3 class="section-heading">{{ $vc->title }}</h3>
                            <p>{{ $vc->conten }}</p>
                            <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$vc->link)) }}" class="btn btn-outline">Explore  <i class="fa fa-chevron-right"></i></a>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- /promotions -->
    <!-- Products -->
    <section id="products">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 section-heading-wrap text-center">
                    <h2 class="section-heading">{{ \Lang::get('front.judul-produk',[], \App::getLocale()) }}</h2>
                    <h4 class="section-subheading">{{ \Lang::get('front.sub-produk',[], \App::getLocale()) }}</h4>
                </div>
            </div>
            <div class="row">
                <!-- Product 1 -->
                <?php $i=1; ?>
                @foreach($allproduct as $fcl)
                <div class="col-md-3 col-sm-6 col-xs-12 no-padding">
                    <figure class="wow fadeIn">
                        <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$fcl->link.'/'.$fcl->slug)) }}">
                        <img class="img-responsive" src="{{ asset('assets/front/images/'.$fcl->thumb_image) }}" alt="themesnerd">
                        </a>
                        <figcaption>
                            <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$fcl->link.'/'.$fcl->slug)) }}">
                                <h5 class="product-title">{{ $fcl->title }}</h5>
                                <h4 class="product-price">{{ $fcl->price }}</h4>
                                <p class="product-details">{!! $fcl->short_description !!}</p>
                            </a>
                        </figcaption>
                    </figure>
                </div>
                @if($i % 4 == 0)
                <div class="clear"></div>
                @endif
                <?php $i++; ?>
                @endforeach
                <!-- /Product 1 -->                
            </div>
        </div>
    </section>
    <!-- /Products -->
    <!-- cta-2 -->
    <section id="cta-2" style="background-image: url('{{ asset('assets/front/images/'.$ep->thumb_image) }}');">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="section-heading">{{ $ep->title }}</h2>
                    <h4 class="section-subheading">{{ $ep->conten }}</h4>
                    <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$ep->link)) }}" class="btn">Show More  <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- /cta-2 -->
    <!-- Feature Section 1 -->
    <section id="about-sec-1" class="feature">
        <div class="container-fluid no-padding">
            <div class="row">
                <div class="col-md-6 col-md-push-6 col-sm-12 no-padding">
                    <div class="section-img">
                        <img class="img-responsive" src="{{ asset('assets/front/images/'.$about->thumb_image) }}" alt="{{ $about->title }}">
                    </div>
                </div>
                <div class="col-md-6 col-md-pull-6 col-sm-12 no-padding">
                    <div class="section-content">
                        <h2 class="section-heading">{{ $about->title }}</h2>
                        <p>{!! $about->short_description !!}</p>
                        <a href="{{ url('/'.config('app.locale_prefix')).'/'.$about->link }}" class="btn btn-outline">Learn More <i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Feature Section 1 -->


    <!-- feature Section 2 -->
    <section id="feature-sec-2" class="feature">
        <div class="container-fluid no-padding">
            <div class="row">
                <div class="col-md-6 col-sm-12 no-padding">
                    <div class="section-img">
                        <img class="img-responsive" src="{{ asset('assets/front/images/'.$whychoose->thumb_image) }}" alt="themesnerd">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 no-padding">
                    <div class="section-content">
                        <h2 class="section-heading">{{ $whychoose->title }}</h2>
                        <h4 class="section-subheading">{{ $whychoose->conten }}</h4>
                        <?php
                        $mi = $contenwhychoose->where('slug', \Lang::get('front.mi-choose',[], \App::getLocale()))->first();
                        $hf = $contenwhychoose->where('slug', \Lang::get('front.hf-choose',[], \App::getLocale()))->first();
                        $ci = $contenwhychoose->where('slug', \Lang::get('front.ci-choose',[], \App::getLocale()))->first();
                        $co = $contenwhychoose->where('slug', \Lang::get('front.co-choose',[], \App::getLocale()))->first();
                        ?>
                        <div class="col-md-6 col-sm-12 no-padding">
                            <div class="col-sm-12 service-content">
                                <div class="feature-icon"><i class="fa fa-compass"></i>
                                </div>
                                <h4>{{ $mi->title }}</h4>
                                <p>{{ $mi->conten }}</p>
                            </div>
                            <div class="col-sm-12 service-content">
                                <div class="feature-icon"><i class="fa fa-anchor"></i>
                                </div>
                                <h4>{{ $hf->title }}</h4>
                                <p>{{ $hf->conten }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 no-padding">
                            <div class="col-sm-12 service-content">
                                <div class="feature-icon"><i class="fa fa-bolt"></i>
                                </div>
                                <h4>{{ $ci->title }}</h4>
                                <p>{{ $ci->conten }}</p>
                            </div>
                            <div class="col-sm-12 service-content">
                                <div class="feature-icon"><i class="fa fa-coffee"></i>
                                </div>
                                <h4>{{ $co->title }}</h4>
                                <p>{{ $co->conten }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /feature Section 2 -->

    <!-- Call to Action -->
    <section id="cta-1" style="background-image: url('{{ asset('assets/front/images/'.$contact->thumb_image) }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="header-text">
                        <h2 class="header-heading">{{ \Lang::get('front.con-title',[], \App::getLocale()) }}</h2>
                        <p>{{ \Lang::get('front.con-subtitle',[], \App::getLocale()) }}</p>
                        <a href="{{ url('/'.config('app.locale_prefix')).'/'.$contact->link }}" class="btn btn-outline btn-lg">Contact Us  <i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Call to Action -->
@endsection