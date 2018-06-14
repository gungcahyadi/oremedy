@extends('layouts.front')
@section('custom-js')
<script src="{{ asset('assets/front/js/jquery.mixitup.min.js') }}"></script>
<script src="{{ asset('assets/front/js/products.js') }}"></script>
@endsection
@section('page-head-seo')
<meta name="description" content="{{ $product->meta_description }}">
<meta name="keywords" content="{{ $product->meta_keyword }}">
<title>{{ $product->meta_title }} - O-Remedy</title>
@endsection
@section('custom-css')
<link href="{{ asset('assets/front/css/product-1.css') }}" rel="stylesheet">
@endsection
@section('conten')
<!-- Header Section -->
<header class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="header-title">{{ $product->title }}</h2>
            </div>
        </div>
    </div>
</header>
<!-- /Header Section -->
<!-- Products Section -->
<section id="products-list">
    <div class="container">
        <div class="row">
            <div class="product-filters col-sm-12">
                <a class="filter btn" data-filter="all">{{ \Lang::get('front.allproduct',[], \App::getLocale()) }}</a>
                @foreach($category as $ct)
                <a class="filter btn" data-filter="{{ '.'.$ct->slug }}">{{ $ct->category }}</a>
                @endforeach
            </div>
            <div id="product-item">
                <!-- Product  -->
                <?php $no = 1; ?>
                @foreach($allproduct as $fc)
                <div class="col-md-4 col-sm-6 col-xs-12 mix @foreach($fc->categories()->where('type', 'product')->get() as $fcct) {{ $fcct->slug.' ' }} @endforeach" data-my-order="{{ $no }}">
                    <figure class="wow fadeIn">
                        <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$fc->link.'/'.$fc->slug)) }}">
                            <img class="img-responsive" src="{{ asset('assets/front/images/'.$fc->thumb_image) }}" alt="{{ $fc->title }}">
                        </a>
                        <figcaption>
                            <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$fc->link.'/'.$fc->slug)) }}">
                                <p class="product-title">{{ $fc->title }}</p>
                                <h4 class="product-price">{{ $fc->price }}</h4>
                            </a>
                        </figcaption>
                    </figure>
                </div>
                <?php $no++; ?>
                @endforeach
                <!-- /Product  --> 
            </div>
        </div>
        <!-- Pagination -->
        <div class="row">
            {{ $allproduct->links() }}
        </div>
        <!-- /Pagination -->
    </div>
</section>
<!-- /Products Section -->

@endsection