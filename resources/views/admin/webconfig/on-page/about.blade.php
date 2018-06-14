@extends('layouts.back')

@section('custom-js')
    @include('admin._editor_textarea_init')
@endsection

@section('conten')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <span>Web Configuration</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('menu-utama.index') }}"><span>Manage Main Menu</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>On Page Edit : {{ $about->where('lang', config('app.default_locale'))->first()->title }}</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title">On Page Edit: {{ $about->where('lang', config('app.default_locale'))->first()->title }}</h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase">On Page Edit: {{ $about->where('lang', config('app.default_locale'))->first()->title }}</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="tabbable-custom tabbable-tabdrop">
                        <ul class="nav nav-tabs">
                            @foreach(config('app.all_langs') as $lang)
                                <li @if($lang == config('app.default_locale')) class="active" @endif>
                                    <a href="{{ '#tab_'.$lang }}" data-toggle="tab"> {{ config('app.human_langs')[$lang] }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content" style="padding: 30px;">
                            @foreach(config('app.all_langs') as $lang)
                                <div class="tab-pane fade @if($lang == config('app.default_locale')) active in @endif" id="{{ 'tab_'.$lang }}">
                                    {!! Form::model($about->where('lang', $lang)->first(), ['route' => 'config.onpage-about.update','method' =>'patch'])!!}
                                    {{ Form::hidden('lang', $lang) }}
                                    <?php
                                    $aboutonpage = $about->where('lang', $lang)->first()->childs()->where('position', 'page')->where('published', '1')->where('lang', $lang)->get();
                                    $michoose = $aboutonpage->where('slug', \Lang::get('slug.mi-choose',[], $lang))->first();
                                    $hfchoose = $aboutonpage->where('slug', \Lang::get('slug.hf-choose',[], $lang))->first();
                                    $cichoose = $aboutonpage->where('slug', \Lang::get('slug.ci-choose',[], $lang))->first();
                                    $cochoose = $aboutonpage->where('slug', \Lang::get('slug.co-choose',[], $lang))->first();
                                    ?>
                                    @if(!empty($michoose))
                                        <div class="form-group {!! $errors->{$lang}->has('michoose') ? 'has-error' : '' !!}">
                                            {!! Form::textarea('michoose', $michoose->conten, ['class'=>'form-control editor-textarea']) !!}
                                            {!! $errors->{$lang}->first('michoose', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    @endif

                                    @if(!empty($hfchoose))
                                        <div class="form-group {!! $errors->{$lang}->has('hfchoose') ? 'has-error' : '' !!}">
                                            {!! Form::textarea('hfchoose', $hfchoose->conten, ['class'=>'form-control editor-textarea']) !!}
                                            {!! $errors->{$lang}->first('hfchoose', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    @endif

                                    @if(!empty($cichoose))
                                        <div class="form-group {!! $errors->{$lang}->has('cichoose') ? 'has-error' : '' !!}">
                                            {!! Form::textarea('cichoose', $cichoose->conten, ['class'=>'form-control editor-textarea']) !!}
                                            {!! $errors->{$lang}->first('cichoose', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    @endif

                                    @if(!empty($cochoose))
                                        <div class="form-group {!! $errors->{$lang}->has('cochoose') ? 'has-error' : '' !!}">
                                            {!! Form::textarea('cochoose', $cochoose->conten, ['class'=>'form-control editor-textarea']) !!}
                                            {!! $errors->{$lang}->first('cochoose', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    @endif

                                    <hr>
                                    <div class="text-right">
                                        {!! Form::submit(empty($about->where('lang', $lang)->first()) ? 'Save' : 'Update', ['class'=>'btn btn-primary']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection