@extends('layouts.back')

@section('custom-js')
    @include('admin._editor_textarea_init')
@endsection

@section('page-heading')
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
                <a href="{{ route('config.program.index') }}"><span>{{ $article->title }}</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Edit Program</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title"> Edit Program</h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Edit Program</span>
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
                                    {!! Form::model($program->where('lang', $lang)->first(), ['route' => ['config.program.update', $program->where('lang', $lang)->first()->equal_id],'method' =>'patch','files' => true])!!}
                                    {{ Form::hidden('lang', $lang) }}
                                    <div class="form-group {!! $errors->{$lang}->has('title') ? 'has-error' : '' !!}">
                                        {!! Form::label('title', 'Title') !!}
                                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                                        {!! $errors->{$lang}->first('title', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {!! $errors->{$lang}->has('short_description') ? 'has-error' : '' !!}">
                                        {!! Form::label('short_description', 'Short Description') !!}
                                        {!! Form::textarea('short_description', null, ['class'=>'form-control editor-textarea']) !!}
                                        {!! $errors->{$lang}->first('short_description', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {!! $errors->{$lang}->has('conten') ? 'has-error' : '' !!}">
                                        {!! Form::label('conten', 'Conten') !!}
                                        {!! Form::textarea('conten', null, ['class'=>'form-control editor-textarea']) !!}
                                        {!! $errors->{$lang}->first('conten', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {!! $errors->{$lang}->has('meta_title') ? 'has-error' : '' !!}">
                                        {!! Form::label('meta_title', 'Meta Title') !!}
                                        {!! Form::text('meta_title', null, ['class'=>'form-control']) !!}
                                        {!! $errors->{$lang}->first('meta_title', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {!! $errors->{$lang}->has('meta_keyword') ? 'has-error' : '' !!}">
                                        {!! Form::label('meta_keyword', 'Meta Keyword') !!}
                                        {!! Form::text('meta_keyword', null, ['class'=>'form-control']) !!}
                                        {!! $errors->{$lang}->first('meta_keyword', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {!! $errors->{$lang}->has('meta_description') ? 'has-error' : '' !!}">
                                        {!! Form::label('meta_description', 'Meta Description') !!}
                                        {!! Form::text('meta_description', null, ['class'=>'form-control']) !!}
                                        {!! $errors->{$lang}->first('meta_description', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    @if(config('app.default_locale') == $lang)
                                        <div class="form-group {!! $errors->{$lang}->has('published') ? 'has-error' : '' !!}" style="padding-bottom: 20px;">
                                            {!! Form::label('published', 'Published') !!}
                                            <div class="row col-md-12">
                                                <label class="radio-inline">{{ Form::radio('published', '1',false) }} Yes</label>
                                                <label class="radio-inline">{{ Form::radio('published', '0',true) }} No</label>
                                            </div>
                                            {!! $errors->{$lang}->first('published', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    @endif
                                    <hr>
                                    <div class="text-right">
                                        {!! Form::submit(empty($program->where('lang', $lang)->first()) ? 'Save' : 'Update', ['class'=>'btn btn-primary']) !!}
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