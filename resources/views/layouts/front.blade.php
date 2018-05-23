<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="revisit-after" content="2 days">
    <meta name="author" content="Ganeshcom Studio">
    <meta name="author" content="http://ganeshcomstudio.com">
    <meta name="reply-to" content="{{ $emailcomposer }}">
    <meta name="owner" content="{{ $emailcomposer }}">
    <meta name="copyright" content="O-Remedy">
    <meta name="expires" content="{{ gmdate(DATE_RFC850, strtotime('+1 year')) }}">
    <meta name="language" content="{{ App::getLocale() }}">
    <meta name="web_author" content="Ganeshcom Studio">
    <meta name="web_author" content="http://ganeshcomstudio.com">
    {{--<meta name="google-site-verification" content="...">--}}
    @yield('page-head-seo')
    <link rel="icon" href="{{ asset('assets/front/img/fabicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/font-face.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/owl.theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/owl.transitions.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/style-1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/index-1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/colors/default.css') }}">
    @yield('custom-css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ asset('assets/front/js/modernizr.custom.12691.js') }}"></script>
</head>

<body>
    <h1 class="sr-only">Oremedy: Best Skin Care</h1>
<!--Navbar-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="btn btn-icon-only navbar-toggle" data-toggle="collapse" data-target=".form-wrap"><i class="fa fa-search"></i></a>
                <a class="navbar-brand" href="{{ url('/'.config('app.locale_prefix')) }}">
                    <div class="brand-logo"><img alt="themesnerd" src="{{ asset('assets/front/img/logo.png') }}">
                    </div>
                </a>
            </div>
            <div class="nav-bar-btn">
                @foreach($socialmedias as $scm)
                <a href="{{ $scm->link }}" class="btn btn-icon-only btn-nav btn-nav-desktop"><i class="fa {{ $scm->platform_favicon }}"></i></a>
                @endforeach
                <a class="btn btn-icon-only btn-nav btn-nav-desktop" data-toggle="collapse" data-target=".form-wrap"><i class="fa fa-search"></i></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-menu">
                <ul class="nav navbar-nav navbar-right">
                    @foreach($mutama as $mu)
                        @if($mu->link == \Lang::get('route.product',[], \App::getLocale()))
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $mu->title }}<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$mu->link)) }}">{{ \Lang::get('front.allproduct',[], \App::getLocale()) }}</a></li>
                                    @foreach($mu->childs()->where('published', '1')->get() as $child)
                                        <li><a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$child->   link.'/'.$child->slug)) }}">{{ $child->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$mu->link)) }}">{!! $mu->title !!}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <div class="container">
            <div class="form-wrap collapse">
                <form id="form-search" role="search" action="search.php" method="post">
                    <div class="form-group">
                        <input id="form-search-input" type="text" class="form-control" name="search-input" value="type to search" onfocus="this.value='';">
                        <button type="submit"><i class="fa fa-search"></i>
                        </button>
                        <button type="reset" data-toggle="collapse" data-target=".form-wrap"><i class="fa fa-close"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>

@yield('conten')
<!-- FOOTER -->
<footer>
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-12 footer-links">
                    <?php $footerabout = $footerconten->where('position', 'footer-about')->first(); ?>
                    <h4 class="link-title">{{ $footerabout->title }}</h4>
                    <p>{{ $footerabout->conten }}</p>
                </div>

                <div class="col-md-5 col-sm-12 footer-links">
                    <h4 class="link-title">Useful Information</h4>
                        <div class="col-sm-8 no-padding">
                            <ul class="xtra-links">
                                @foreach($mutama as $mu)
                                    @if($mu->link != \Lang::get('route.program',[], \App::getLocale()))
                                       <div class="col-xs-6 no-padding">
                                            <li>
                                                <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$mu->link)) }}">{!! $mu->title !!}</a>
                                            </li>
                                        </div>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-3 col-sm-12 footer-links">
                    <?php $footercontact = $footerconten->where('position', 'footer-hubungikami')->first(); ?>
                    <h4 class="link-title">{!! $footercontact->title !!}</h4>
                    {!! $footercontact->conten !!}
                </div>

                <div class="clearfix"></div>
                <hr>
                <div class="credit">
                    <div class="col-xs-12 text-center visible-sm-block visible-xs-block">
                        <ul class="list-inline social-buttons">
                            @foreach($socialmedias as $scm)
                            <li>
                                <a href="{{ $scm->link }}"><i class="fa {{ $scm->platform_favicon }}"></i></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <p class="credit-text">© Copyright - INTERIOR 2016. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-4 col-sm-6 text-center hidden-sm hidden-xs">
                        <ul class="list-inline social-buttons">
                            @foreach($socialmedias as $scm)
                            <li>
                                <a href="{{ $scm->link }}"><i class="fa {{ $scm->platform_favicon }}"></i></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <p class="brand-credit">Design & Developed by <a href="http://ganeshcomstudio.com"><b>Ganeshcom</b></a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!--FOOTER ends-->



<script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/front/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/front/js/main.js') }}"></script>
@yield('custom-js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#selectlang').val('{{ \App::getLocale() }}');
        @if(isset($altlink))
            var altlink = {!! $altlink !!};
            $('#selectlang').on('change', function(e) {
                var lang = $('#selectlang').val();
                if(lang !== '{{ \App::getLocale() }}') {
                    window.location.href = altlink[lang];
                }
            });
        @endif
    });
</script>
</body>
</html>
