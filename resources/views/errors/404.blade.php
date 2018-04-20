@extends('layouts.front')
@section('page-head-seo')
    <meta name="description" content="We are sorry, the page you want isn’t here anymore.">
    <meta name="keywords" content="eror 404, O-Remedy">
    <title>Error 404 : O-Remedy</title>
@endsection
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/404.css') }}">
@endsection
@section('conten')
<!-- Header Section -->
    <header class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h3 class="text-error">404</h3>
                    <h2 class="header-title">We're still working on it</h2>
                    <p>Enjoy 80% discount on our beautifully hand crafted products</p>
                    <a href="{{ url('/'.config('app.locale_prefix')) }}" class="btn">Go to Home  <i class="fa fa-chevron-right"></i></a>
                    <p></p>
                </div>
            </div>
        </div>
    </header>
    <!-- /Header Section -->
@endsection