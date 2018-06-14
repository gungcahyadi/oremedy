@extends('layouts.front')

@section('custom-js')
<script src="{{ asset('assets/front/js/product-details.js') }}"></script>
@endsection
@section('custom-css')
<link href="{{ asset('assets/front/css/product-details-1.css') }}" rel="stylesheet">
<style type="text/css">
.marbot10{
    margin-bottom:10px; 
}
.marbot20{
    margin-bottom:20px; 
}
.social-icons li:first-child{margin-top: 8px;margin-right: 10px}
.social-icons a{color: #fff}
.social-icons li:hover a{color: #333}
.social-icons .facebook{background-color: #3c5899}
.social-icons .twitter{background-color: #5ea9dd}
.social-icons .google-plus{background-color: #CD3B2C}
.social-icons .pinterest{background-color: #ee1c1b}
</style>    
@endsection
@section('page-head-seo')
<meta name="description" content="{{ $blog->meta_title }}">
<meta name="keywords" content="{{ $blog->meta_keyword }}">
<title>{{ $blog->meta_title }} - O-Remedy</title>
@endsection

@section('conten')
<!-- Product Details -->
<section id="product-details">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 text-center">
                <div class="product-content">
                    <h3 class="product-title">{{ $blog->title }}</h3>
                    @foreach($blog->categories()->where('type', 'blog')->where('lang', App::getLocale())->get() as $blogcat)
                    <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.\Lang::get('route.blog',[], App::getLocale()).'/category/'.$blogcat->slug)) }}"><span class="product-tag trending">{{ $blogcat->category }}</span>
                    </a>
                    @endforeach
                    <div class="product-description">
                        {!! $blog->conten !!}
                    </div>
                    <div class="tags-holder" style="margin-top: 20px;">  
                        <ul class="nav nav-pills social-icons pull-right">
                            <li>Shere :</li>
                            <li class="facebook" role="presentation"><a href="https://www.facebook.com/sharer.php?u={{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.\Lang::get('route.blog',[], App::getLocale()).'/'.$blog->slug)) }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter" role="presentation"><a href="https://twitter.com/share?url={{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.\Lang::get('route.blog',[], App::getLocale()).'/'.$blog->slug)) }}&amp;text={{ $blog->title.' - ASB Bebek Bengil' }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="google-plus" role="presentation"><a href="https://plus.google.com/share?url={{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.\Lang::get('route.blog',[], App::getLocale()).'/'.$blog->slug)) }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <li class="pinterest" role="presentation"><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>                              
                    </div>
                </div>

            </div>
            <div class="col-md-3 col-sm-12">
                @include('front._sidebar-blog')                
            </div>
        </div>
    </div>
</section>
<!-- /Product Details -->
@endsection