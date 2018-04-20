@extends('layouts.front')
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
                        <a href="#">
                        <div class="item-img" style="background-image: url('{{ asset('assets/front/images/'.$hs->image) }}'); "></div>
                        </a>
                    </div>
                <?php $no++; ?>
            @endforeach
        </div>
    </header>
    <!--Text Banner ends-->

    <!-- promotions -->
    <section id="promotions">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <figure class="wow fadeIn">
                        <img class="img-responsive" src="{{ asset('assets/front/img/hero-8.jpg') }}">
                        <figcaption class="content">
                            <h3 class="section-heading">Latest Collections</h3>
                            <p>Latest Interior Design Products</p>
                            <a href="product.php" class="btn btn-outline">Explore  <i class="fa fa-chevron-right"></i></a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <figure class="wow fadeIn">
                        <img class="img-responsive" src="{{ asset('assets/front/img/hero-2.jpg') }}">
                        <figcaption class="content">
                            <h3 class="section-heading">Vintage Collections</h3>
                            <p>Finest Interior Design Products</p>
                            <a href="product.php" class="btn btn-outline">Explore  <i class="fa fa-chevron-right"></i></a>
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
                    <h2 class="section-heading">Our Herbal Product</h2>
                    <h4 class="section-subheading">Find and know abour our best product</h4>
                </div>
            </div>
            <div class="row">
                <!-- Product 1 -->
                @foreach($allfasilitas as $fcl)
                <div class="col-md-3 col-sm-6 col-xs-12 no-padding">
                    <figure class="wow fadeIn">
                        <img class="img-responsive" src="{{ asset('assets/front/images/'.$fcl->thumb_image) }}" alt="themesnerd">
                        <figcaption>
                            <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$fcl->link.'/'.$fcl->slug)) }}">
                                <h5 class="product-title">{{ $fcl->title }}</h5>
                                <h4 class="product-price">{{ $fcl->price }}</h4>
                                <p class="product-details">{!! $fcl->short_description !!}</p>
                            </a>
                        </figcaption>
                    </figure>
                </div>
                @endforeach
                <!-- /Product 1 -->                
            </div>
        </div>
    </section>
    <!-- /Products -->
    <!-- cta-2 -->
    <section id="cta-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="section-heading">Explore All of Our Product</h2>
                    <h4 class="section-subheading">Your best skin care product</h4>
                    <a href="produc.php" class="btn">Show More  <i class="fa fa-chevron-right"></i></a>
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
                        <a href="about.php" class="btn btn-outline">Learn More <i class="fa fa-chevron-right"></i></a>
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
                        <img class="img-responsive" src="{{ asset('assets/front/img/hero-28.jpg') }}" alt="themesnerd">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 no-padding">
                    <div class="section-content">
                        <h2 class="section-heading">Why Choose Us</h2>
                        <h4 class="section-subheading">Home to the Finest Interior Design Products in the World</h4>

                        <div class="col-md-6 col-sm-12 no-padding">
                            <div class="col-sm-12 service-content">
                                <div class="feature-icon"><i class="fa fa-compass"></i>
                                </div>
                                <h4>Modern Interiors</h4>
                                <p>Discover thousands of products from the finest brands</p>
                            </div>
                            <div class="col-sm-12 service-content">
                                <div class="feature-icon"><i class="fa fa-anchor"></i>
                                </div>
                                <h4>Handmade Furniture</h4>
                                <p>Beautifully crafted with care & love only for you</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 no-padding">
                            <div class="col-sm-12 service-content">
                                <div class="feature-icon"><i class="fa fa-bolt"></i>
                                </div>
                                <h4>Classic Interiors</h4>
                                <p>Discover thousands of products from the finest brands</p>
                            </div>
                            <div class="col-sm-12 service-content">
                                <div class="feature-icon"><i class="fa fa-coffee"></i>
                                </div>
                                <h4>Consultancy</h4>
                                <p>Beautifully crafted with care & love only for you</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /feature Section 2 -->

    <!-- Call to Action -->
    <section id="cta-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="header-text">
                        <h2 class="header-heading">Get in Touch</h2>
                        <p>We are always here to hear from you.</p>
                        <a href="contact-us.php" class="btn btn-outline btn-lg">Contact Us  <i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Call to Action -->
@endsection