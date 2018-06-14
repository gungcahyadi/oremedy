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
                <span>On Page Edit : {{ $contacts->where('lang', config('app.default_locale'))->first()->title }}</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title">On Page Edit: {{ $contacts->where('lang', config('app.default_locale'))->first()->title }}</h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase">On Page Edit: {{ $contacts->where('lang', config('app.default_locale'))->first()->title }}</span>
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
                                    {!! Form::model($contacts->where('lang', $lang)->first(), ['route' => 'config.onpage-contact.update','method' =>'patch'])!!}
                                    {{ Form::hidden('lang', $lang) }}
                                    <?php
                                    $contactonpage = $contacts->where('lang', $lang)->first()->childs()->where('position', 'page')->where('published', '1')->where('lang', $lang)->get();
                                    $ctoffice = $contactonpage->where('slug', \Lang::get('slug.ct-office',[], $lang))->first();
                                    $ctwa = $contactonpage->where('slug', \Lang::get('slug.ct-wa',[], $lang))->first();
                                    $ctcall = $contactonpage->where('slug', \Lang::get('slug.ct-call',[], $lang))->first();
                                    $ctemail = $contactonpage->where('slug', \Lang::get('slug.ct-email',[], $lang))->first();
                                    ?>
                                    @if(!empty($ctoffice))
                                        <div class="form-group {!! $errors->{$lang}->has('ctoffice') ? 'has-error' : '' !!}">
                                            {!! Form::label('ctoffice', 'Office') !!}
                                            {!! Form::textarea('ctoffice', $ctoffice->conten, ['class'=>'form-control editor-textarea']) !!}
                                            {!! $errors->{$lang}->first('ctoffice', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    @endif

                                    @if(!empty($ctwa))
                                        <div class="form-group {!! $errors->{$lang}->has('ctwa') ? 'has-error' : '' !!}">
                                            {!! Form::label('ctwa', 'Whatsapp Us') !!}
                                            {!! Form::textarea('ctwa', $ctwa->conten, ['class'=>'form-control editor-textarea']) !!}
                                            {!! $errors->{$lang}->first('ctwa', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    @endif

                                    @if(!empty($ctcall))
                                        <div class="form-group {!! $errors->{$lang}->has('ctcall') ? 'has-error' : '' !!}">
                                            {!! Form::label('ctcall', 'Call Us') !!}
                                            {!! Form::textarea('ctcall', $ctcall->conten, ['class'=>'form-control editor-textarea']) !!}
                                            {!! $errors->{$lang}->first('ctcall', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    @endif

                                    @if(!empty($ctemail))
                                        <div class="form-group {!! $errors->{$lang}->has('ctemail') ? 'has-error' : '' !!}">
                                            {!! Form::label('ctemail', 'Email Us') !!}
                                            {!! Form::textarea('ctemail', $ctemail->conten, ['class'=>'form-control editor-textarea']) !!}
                                            {!! $errors->{$lang}->first('ctemail', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    @endif

                                    <hr>
                                    <div class="text-right">
                                        {!! Form::submit(empty($contacts->where('lang', $lang)->first()) ? 'Save' : 'Update', ['class'=>'btn btn-primary']) !!}
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