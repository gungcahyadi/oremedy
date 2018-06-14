@extends('layouts.front')
@section('custom-js')
<script src="{{ asset('assets/front/js/jquery.mixitup.min.js') }}"></script>
<script src="{{ asset('assets/front/js/products.js') }}"></script>
@endsection
@section('page-head-seo')
<meta name="description" content="Blog Archive {{ date('F Y', strtotime($thbln)) }} at O-Remedy">
<meta name="keywords" content="blog archive, {{ date('F Y', strtotime($thbln)) }}, O-Remedy, blog archive O-Remedy">
<title>Blog Archive {{ date('F Y', strtotime($thbln)) }} - O-Remedy</title>
@endsection
@section('custom-css')
<link href="{{ asset('assets/front/css/product-1.css') }}" rel="stylesheet">
<style type="text/css">
    .marbot10{
        margin-bottom:10px; 
    }
    .marbot20{
        margin-bottom:20px; 
    }
</style>
@endsection
@section('conten')
<!-- Header Section -->
<header class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="header-title">{{ \Lang::get('front.archive',[], App::getLocale()).' '.date('F Y', strtotime($thbln)) }}</h2>
            </div>
        </div>
    </div>
</header>
<!-- /Header Section -->
<!-- Blogs Section -->
<section id="products-list">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                
                <div id="product-item">
                    <!-- Product  -->
                    <?php $no = 1; ?>
                    @foreach($allblog as $bl)
                    <div class="col-md-4 col-sm-6 col-xs-12 mix" data-my-order="{{ $no }}">
                        <figure class="wow fadeIn">
                            <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$bl->link.'/'.$bl->slug)) }}">
                                <img class="img-responsive" src="{{ asset('assets/front/images/'.$bl->thumb_image) }}" alt="{{ $bl->title }}">
                            </a>
                            <figcaption>
                                <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$bl->link.'/'.$bl->slug)) }}">
                                    <p class="product-title">{{ $bl->title }}</p>
                                    <h4 class="product-price">{{ $bl->price }}</h4>
                                </a>
                            </figcaption>
                        </figure>
                    </div>
                    <?php $no++; ?>
                    @endforeach
                    <!-- /Product  --> 
                </div>
            </div>
            <div class="col-sm-3">
                @include('front._sidebar-blog')                
            </div>
        </div>
        <!-- Pagination -->
        <div class="row">
            {{ $allblog->links() }}
        </div>
        <!-- /Pagination -->
    </div>
</section>
<!-- /Products Section -->

@endsection