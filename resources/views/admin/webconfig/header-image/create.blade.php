@extends('layouts.back')

@section('page-level-style')
    <link href="{{ asset('assets/back/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-js-plugin')
    <script src="{{ asset('assets/back/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/back/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endsection


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
                <span>Add New Header Image</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title">
        <span>New Header Image</span>
    </h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered" style="display: block; overflow:auto;">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> New Header Image of {{ $article->title }}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    {!! Form::open(['route' => ['config.headerimage.store', $article->equal_id], 'files' => true, 'id' => 'submit_form'])!!}
                        @foreach(config('app.all_langs') as $lang)
                            <div class="form-group {!! $errors->has('name_'.$lang) ? 'has-error' : '' !!}">
                                {!! Form::label('name_'.$lang, 'Name ('.config('app.human_langs')[$lang].')') !!}
                                {!! Form::text('name_'.$lang, null, ['class'=>'form-control', 'required']) !!}
                                {!! $errors->first('name_'.$lang, '<p class="help-block">:message</p>') !!}
                            </div>
                        @endforeach
                        <div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
                            {!! Form::label('image', 'Image (jpeg, png)') !!}
                            <div class="row col-md-12">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 280px; height: 170px;">
                                        <img src="http://www.placehold.it/280x170/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            {!! Form::file('image', ['required']) !!} </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                    </div>
                                </div>
                                {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <hr>
                            <div class="text-right">
                                {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection