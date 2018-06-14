<div class="col-sm-12 section-heading-wrap">
    <h4 class="section-heading">{{ \Lang::get('front.category',[], \App::getLocale()) }}</h4>
    
    @foreach($blogcategories as $bc)
    <div class="wow fadeInRight marbot10">
        <a class="btn btn-sm btn-primary" href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.\Lang::get('route.blog',[], App::getLocale()).'/category/'.$bc->slug)) }}">{{ $bc->category }}</a>
    </div>
    @endforeach
</div>
<div class="clear marbot20"></div>
<div class="col-sm-12 section-heading-wrap">
    <h4 class="section-heading">{{ \Lang::get('front.lastest',[], \App::getLocale()) }}</h4>
    <?php $i=1; ?>
    @foreach($blogrecent as $br)
    <figure class="wow fadeInRight">
        <a href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.$br->link.'/'.$br->slug)) }}">
            <div class="col-sm-5">
                <img class="img-responsive" src="{{ asset('assets/front/images/'.$br->thumb_image) }}">
            </div>
            <div class="col-sm-7">
                <h5 class="section-heading">{{ $br->title }}</h5>
            </div>
        </a>
    </figure>
    <div class="clear marbot10"></div>                                   
    <?php $i++; ?>
    @endforeach
</div>
<div class="clear marbot20"></div>                
<div class="col-sm-12 section-heading-wrap">
    <h4 class="section-heading">{{ \Lang::get('front.archive',[], \App::getLocale()) }}</h4>
    @foreach($blogarchive as $bn)
    <div class="wow fadeInRight">
        <a class="btn btn-sm btn-primary" href="{{ url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.\Lang::get('route.blog',[], App::getLocale()).'/archive/'.$bn->thbln)) }}">{{ date('F Y', strtotime($bn->thbln)) }}<i class="fa fa-chevron-right"></i>({{ $bn->jumlah }})</a>
    </div>
    @endforeach

</div>
<div class="clear marbot20"></div>  