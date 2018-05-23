@extends('layouts.back')

@section('page-level-style')
    <link href="{{ asset('assets/back/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-js-plugin')
    <script src="{{ asset('assets/back/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/back/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/back/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/back/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endsection

@section('page-level-script')
    <script src="{{ asset('assets/back/pages/scripts/form-wizard.js') }}" type="text/javascript"></script>
@endsection

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
                <a href="{{ route('config.product.index') }}"><span>{{ $article->title }}</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Add New</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title"> New Product</h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered" id="form_wizard_1">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> New Product</span>
                    </div>

                </div>
                <div class="portlet-body form">
                    {!! Form::open(['route' => 'config.product.store', 'files' => true, 'class' => 'form-horizontal', 'id' => 'submit_form'])!!}
                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <?php $no = 1; ?>
                                @foreach(config('app.all_langs') as $lang)
                                    <li>
                                        <a href="{{ '#tab_'.$lang }}" data-toggle="tab" class="step">
                                            <span class="number"> {{ $no }} </span>
                                            <span class="desc"><i class="fa fa-check"></i> {{ config('app.human_langs')[$lang] }} </span>
                                        </a>
                                    </li>
                                    <?php $no++; ?>
                                @endforeach
                            </ul>
                            <div id="bar" class="progress progress-striped" role="progressbar">
                                <div class="progress-bar progress-bar-success"> </div>
                            </div>
                            <div class="tab-content">
                                <div class="alert alert-danger display-none">
                                    <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                <div class="alert alert-success display-none">
                                    <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                @foreach(config('app.all_langs') as $lang)
                                    <div class="tab-pane active" id="{{ 'tab_'.$lang }}">
                                        <div class="form-group {!! $errors->has('title_'.$lang) ? 'has-error' : '' !!}">
                                            {!! Form::label('title_'.$lang, 'Title', ['class' => 'control-label col-md-2']) !!}
                                            <div class="col-md-10">
                                                {!! Form::text('title_'.$lang, null, ['class'=>'form-control', 'required']) !!}
                                                {!! $errors->first('title_'.$lang, '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group {!! $errors->has('price_'.$lang) ? 'has-error' : '' !!}">
                                            {!! Form::label('price_'.$lang, 'Price', ['class' => 'control-label col-md-2']) !!}
                                            <div class="col-md-10">
                                                {!! Form::text('price_'.$lang, null, ['class'=>'form-control', 'required']) !!}
                                                {!! $errors->first('price_'.$lang, '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group {!! $errors->has('categories'.$lang) ? 'has-error' : '' !!}">
                                            {!! Form::label('categories'.$lang, 'Categories', ['class' => 'control-label col-md-2']) !!}
                                            <div class="col-md-10">
                                                {!! Form::select('categories[]', []+App\Category::where('type', 'product')->where('lang', config('app.default_locale'))->pluck('category','id')->all(), null, ['class'=>'form-control select2-multiple', 'required', 'id' => 'select2-categories']) !!}
                                                {!! $errors->first('categories_'.$lang, '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group {!! $errors->has('short_description_'.$lang) ? 'has-error' : '' !!}">
                                            {!! Form::label('short_description_'.$lang, 'Short Description', ['class' => 'control-label col-md-2']) !!}
                                            <div class="col-md-10">
                                                {!! Form::textarea('short_description_'.$lang, null, ['class'=>'form-control editor-textarea', 'required']) !!}
                                                {!! $errors->first('short_description_'.$lang, '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group {!! $errors->has('conten_'.$lang) ? 'has-error' : '' !!}">
                                            {!! Form::label('conten_'.$lang, 'Conten', ['class' => 'control-label col-md-2']) !!}
                                            <div class="col-md-10">
                                                {!! Form::textarea('conten_'.$lang, null, ['class'=>'form-control editor-textarea', 'required']) !!}
                                                {!! $errors->first('conten_'.$lang, '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>                                        
                                        @if($lang == config('app.default_locale'))
                                            <div class="form-group {!! $errors->has('thumb_image') ? 'has-error' : '' !!}">
                                                {!! Form::label('thumb_image', 'Thumbnail Image (jpeg, png)', ['class' => 'control-label col-md-2']) !!}
                                                <div class="col-md-10">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 280px; height: 170px;">
                                                            <img src="http://www.placehold.it/280x170/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    {!! Form::file('thumb_image', ['required']) !!} </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    {!! $errors->first('thumb_image', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group {!! $errors->has('meta_title_'.$lang) ? 'has-error' : '' !!}">
                                            {!! Form::label('meta_title_'.$lang, 'Meta Title', ['class' => 'control-label col-md-2']) !!}
                                            <div class="col-md-10">
                                                {!! Form::text('meta_title_'.$lang, null, ['class'=>'form-control', 'required']) !!}
                                                {!! $errors->first('meta_title_'.$lang, '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group {!! $errors->has('meta_keyword_'.$lang) ? 'has-error' : '' !!}">
                                            {!! Form::label('meta_keyword_'.$lang, 'Meta Keyword', ['class' => 'control-label col-md-2']) !!}
                                            <div class="col-md-10">
                                                {!! Form::text('meta_keyword_'.$lang, null, ['class'=>'form-control', 'required']) !!}
                                                {!! $errors->first('meta_keyword_'.$lang, '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group {!! $errors->has('meta_description_'.$lang) ? 'has-error' : '' !!}">
                                            {!! Form::label('meta_description_'.$lang, 'Meta Description', ['class' => 'control-label col-md-2']) !!}
                                            <div class="col-md-10">
                                                {!! Form::text('meta_description_'.$lang, null, ['class'=>'form-control', 'required']) !!}
                                                {!! $errors->first('meta_description_'.$lang, '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        @if($lang == config('app.default_locale'))
                                            <div class="form-group {!! $errors->has('published') ? 'has-error' : '' !!}" style="padding-bottom: 20px;">
                                                {!! Form::label('published', 'Published', ['class' => 'control-label col-md-2']) !!}
                                                <div class="col-md-10">
                                                    <div class="radio-list">
                                                        <label class="radio-inline">{{ Form::radio('published', '1',false, ['required']) }} Yes</label>
                                                        <label class="radio-inline">{{ Form::radio('published', '0',true, ['required']) }} No</label>
                                                    </div>
                                                    {!! $errors->first('published', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10">
                                    <a href="javascript:;" class="btn default button-previous">
                                        <i class="fa fa-angle-left"></i> Back </a>
                                    <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                    <a href="javascript:;" class="btn green button-submit"> Submit
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection