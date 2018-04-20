@extends('layouts.front')

@section('custom-js')
    <script id="dsq-count-scr" src="//bali-tourism-college.disqus.com/count.js" async></script>
@endsection

@section('page-head-seo')
    <meta name="description" content="{{ $program->meta_description }}">
    <meta name="keywords" content="{{ $program->meta_keyword }}">
    <title>{{ $program->meta_title }} - Bali Tourism College</title>
@endsection

@section('conten')
    <!--Page Header-->
    <section class="page_header padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-content">
                    <h1>{{ $program->title }}</h1>
                    <div class="page_nav">
                        <span>{{ \Lang::get('front.breadcumsdesc',[], \App::getLocale()) }}:</span> <a href="{{ url('/'.config('app.locale_prefix')) }}">{{ \Lang::get('front.rootmenu',[], \App::getLocale()) }}</a><span><i class="fa fa-angle-double-right"></i>{{ $program->parent->title }}</span> <span><i class="fa fa-angle-double-right"></i>{{ $program->title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header-->




    <!-- EVENTS -->
    <section id="event_detail" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 event wow fadeIn" data-wow-delay="500ms">
                    @if($headerimages->count() == 1)
                        <img src="{{ asset('assets/front/images/'.$headerimages->first()->image) }}" alt="{{ $headerimages->first()->title }}" class="border_radius img-responsive bottom15">
                    @elseif($headerimages->count() > 1)
                        <div id="headerImages" class="carousel slide bottom25" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php $nohs = 1; ?>
                                @foreach($headerimages as $hs)
                                    <div class="item @if($nohs == 1) active @endif">
                                        <img src="{{ asset('assets/front/images/'.$hs->image) }}" alt="{{ $hs->title }}">
                                    </div>
                                    <?php $nohs++; ?>
                                @endforeach
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#headerImages" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#headerImages" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @endif

                    <p class="bottom25">{!! $program->conten !!}</p>
                    <div class="share clearfix heading_space">
                        <p class="pull-left"><strong>{{ \Lang::get('front.sharearticle',[], \App::getLocale()) }}:</strong></p>
                        <ul class="pull-right">
                            <li>
                                <a href="https://www.facebook.com/sharer.php?u={{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$program->link.'/'.$program->slug)) }}" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>

                            <li>
                                <a href="https://twitter.com/share?url={{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$program->link.'/'.$program->slug)) }}&amp;text={{ $program->title.' - Bali Tourism College' }}" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>

                            <li>
                                <a href="https://plus.google.com/share?url={{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$program->link.'/'.$program->slug)) }}" target="_blank">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>

                            <li>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$program->link.'/'.$program->slug)) }}" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="disqus_thread"></div>
                    <script>
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://bali-tourism-college.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
            </div>
        </div>
    </section>
    <!-- EVENTS ends -->
@endsection