@extends('layouts.back')

@section('page-heading')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('menu-utama.index') }}"><span>Manage Main Menu</span></a>
                <i class="fa fa-circle"></i>
            </li>
            @if($article->link == \Lang::get('route.program',[], $deflang))
                <li>
                    <a href="{{ route('config.program.index') }}"><span>{{ $article->parent->title }}</span></a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('config.headerimage.index', $article->equal_id) }}"><span>{{ 'Header Image of '.$article->title }}</span></a>
                    <i class="fa fa-circle"></i>
                </li>
            @elseif($article->link == \Lang::get('route.fasilitas',[], $deflang))
                <li>
                    <a href="{{ route('config.fasilitas.index') }}"><span>{{ $parentarticle->title }}</span></a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('config.headerimage.index', $article->equal_id) }}"><span>{{ 'Header Image of '.$article->title }}</span></a>
                    <i class="fa fa-circle"></i>
                </li>
            @endif
            <li>
                <span>Edit Header Image</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title">
        Edit Header Image
    </h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Edit Header Image of {{ $article->title }}</span>
                    </div>
                </div>
                <div class="portlet-body" style="display: block;">
                    {!! Form::open(['route' => ['config.headerimage.update', $image->first()->equal_id], 'method' => 'patch', 'files' => true, 'id' => 'submit_form'])!!}
                    @foreach(config('app.all_langs') as $lang)
                        <div class="form-group {!! $errors->has('name_'.$lang) ? 'has-error' : '' !!}">
                            {!! Form::label('name_'.$lang, 'Name ('.config('app.human_langs')[$lang].')') !!}
                            {!! Form::text('name_'.$lang, $image->where('lang', $lang)->first()->name, ['class'=>'form-control', 'required']) !!}
                            {!! $errors->first('name_'.$lang, '<p class="help-block">:message</p>') !!}
                        </div>
                    @endforeach
                    <div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
                        {!! Form::label('image', 'Image (jpeg, png)') !!}
                        {!! Form::file('image') !!}
                        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                        @if (!empty($image->where('lang', $lang)->first()) && $image->where('lang', $lang)->first()->image !== '')
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-6">
                                    <p style="margin: 5px 0;">Current Image:</p>
                                    <div class="thumbnail">
                                        <img src="{{ $image->where('lang', $lang)->first()->home_slider }}" class="img-rounded">
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