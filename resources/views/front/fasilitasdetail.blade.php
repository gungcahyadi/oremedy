@extends('layouts.front')

@section('custom-js')
    <script src="{{ asset('assets/front/js/product-details.js') }}"></script>
@endsection
@section('custom-css')
    <link href="{{ asset('assets/front/css/product-details-1.css') }}" rel="stylesheet">
@endsection
@section('page-head-seo')
    <meta name="description" content="{{ $fasilitas->meta_title }}">
    <meta name="keywords" content="{{ $fasilitas->meta_keyword }}">
    <title>{{ $fasilitas->meta_title }} - Bali Tourism College</title>
@endsection

@section('conten')
    <!-- Product Details -->
    <section id="product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 text-center">
                    <!-- bootstrap carousel -->
                    <div class="wrapper">
                        <div id="carousel-product" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <?php $no = 0; ?>
                                    @foreach($galleryproduct as $gp)
                                <li data-target="#carousel-product" data-slide-to="0" class="active">
                                    <img src="{{ asset('assets/front/images/'.$gp->image) }}" alt="themesnerd" class="img-responsive">
                                </li>
                                <?php $no++; ?>
                                @endforeach
                            </ol>
                            <!-- /Indicators -->
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <!-- Carousel 1 -->
                                <?php $no = 0; ?>
                                    @foreach($galleryproduct as $gp)
                                <div class="item {{ $no == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('assets/front/images/'.$gp->image) }}" alt="themesnerd" class="img-responsive">
                                </div>
                                <?php $no++; ?>
                                @endforeach
                                <!-- /Carousel 1 -->
                            </div>
                            <!-- /Wrapper for slides -->
                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-product" role="button" data-slide="prev">
                                <span class="fa fa-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-product" role="button" data-slide="next">
                                <span class="fa fa-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <!-- /Controls -->
                        </div>
                    </div>
                    <!-- /bootstrap carousel -->
                </div>
                <!-- Product Details -->
                <div class="col-md-6 col-sm-12">
                    <div class="product-content">
                        <a href="#"><span class="product-tag trending">Face</span></a>
                        <h3 class="product-title">{{ $fasilitas->title }}</h3>
                        <h3 class="product-price">{{ $fasilitas->price }}</h3>

                        <hr> <!-- Button Link ke Online store -->
                        <h3>Buy Now!</h3>
                        <a href="https://www.tokopedia.com/" target="blank" class="btn btn-outline twitter">Tokopedia<i class="fa fa-cart-arrow-down"></i></a>
                        <a href="https://shopee.co.id/" target="blank" class="btn btn-outline twitter">Shopee<i class="fa fa-cart-arrow-down"></i></a>
                        <hr> <!-- Button Link ke Online store -->

                        <div class="product-description">
                            {!! $fasilitas->conten !!}
                        </div>
                    </div>
                </div>
                <!-- /Product Details -->
            </div>
        </div>
    </section>
    <!-- /Product Details -->
    <!-- Related Products -->
    <section id="related-products">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-xs-10 section-heading-wrap text-left">
                    <h2 class="section-heading">{{ \Lang::get('front.produk-terkait',[], \App::getLocale()) }}</h2>
                </div>
                <div class="col-sm-4 col-xs-2 text-right">
                    <a href="product-1.html" class="btn btn-ghost hidden-xs">Explore All  <i class="fa fa-chevron-right"></i></a>
                    <a href="product-1.html" class="btn btn-ghost btn-icon-only visible-xs-block"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="row">
                <!-- Product 1 -->
                @foreach($fasilitaslainnya as $fl)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <figure class="wow fadeIn">
                        <img class="{{ asset('assets/front/images/'.$fl->thumb_image) }}" alt="themesnerd">
                        <figcaption>
                            <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$fl->link.'/'.$fl->slug)) }}">
                                <p class="product-title">{{ $fl->title }}</p>
                                <h4 class="product-price">{{ $fl->price }}</h4>
                            </a>
                        </figcaption>
                    </figure>
                </div>
                @endforeach
                <!-- /Product 1 -->
            </div>
        </div>
    </section>
    <!-- /Related Products -->
@endsection