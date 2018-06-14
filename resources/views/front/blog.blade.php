@extends('layouts.front')
@section('custom-js')
<script src="{{ asset('assets/front/js/jquery.mixitup.min.js') }}"></script>
<script src="{{ asset('assets/front/js/products.js') }}"></script>
@endsection
@section('page-head-seo')
<meta name="description" content="{{ $blog->meta_description }}">
<meta name="keywords" content="{{ $blog->meta_keyword }}">
<title>{{ $blog->meta_title }} - O-Remedy</title>
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
                <h2 class="header-title">{{ $blog->title }}</h2>
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
                    @foreach($allblog as $blog)
                    <div class="col-md-4 col-sm-6 col-xs-12 mix" data-my-order="{{ $no }}">
                        <figure class="wow fadeIn">
                            <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.\Lang::get('route.blog',[], App::getLocale()).'/'.$blog->slug)) }}">
                                <img class="img-responsive" src="{{ asset('assets/front/images/'.$blog->thumb_image) }}" alt="{{ $blog->title }}">
                            </a>
                            <figcaption>
                                <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.\Lang::get('route.blog',[], App::getLocale()).'/'.$blog->slug)) }}">
                                    <p class="product-title">{{ $blog->title }}</p>
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