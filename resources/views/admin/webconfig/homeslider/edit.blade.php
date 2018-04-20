@extends('layouts.back')

@section('custom-js')
    @include('admin._editor_textarea_init')
@endsection

@section('page-heading')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('menu-utama.index') }}"><span>Manage Main Menu</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('config.homeslider.index') }}"><span>{{ $article->title }}</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Edit Slider</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title"> Edit Slider</h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Edit Slider</span>
                    </div>
                </div>
                <div class="portlet-body">
                    {!! Form::open(['route' => ['config.homeslider.update', $slider->first()->equal_id], 'method' => 'patch', 'files' => true, 'id' => 'submit_form', 'novalidate'])!!}
                    @foreach(config('app.all_langs') as $lang)
                        <div class="form-group {!! $errors->has('name_'.$lang) ? 'has-error' : '' !!}">
                            {!! Form::label('name_'.$lang, 'Name ('.config('app.human_langs')[$lang].')') !!}
                            {!! Form::text('name_'.$lang, $slider->where('lang', $lang)->first()->name, ['class'=>'form-control', 'required']) !!}
                            {!! $errors->first('name_'.$lang, '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('slider_conten_'.$lang) ? 'has-error' : '' !!}">
                            {!! Form::label('slider_conten_'.$lang, 'Slider Conten ('.config('app.human_langs')[$lang].')') !!}
                            {!! Form::textarea('slider_conten_'.$lang, $slider->where('lang', $lang)->first()->slider_conten, ['class'=>'form-control editor-textarea']) !!}
                            {!! $errors->first('slider_conten_'.$lang, '<p class="help-block">:message</p>') !!}
                        </div>
                    @endforeach
                    <div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
                        {!! Form::label('image', 'Image (jpeg, png)') !!}
                        {!! Form::file('image') !!}
                        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                        @if (!empty($slider->first()) && $slider->first()->image !== '')
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-8">
                                    <p style="margin: 5px 0;">Current Image:</p>
                                    <div class="thumbnail">
                                        <img src="{{ $slider->first()->home_slider }}" class="img-rounded">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="text-right">
                        {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection