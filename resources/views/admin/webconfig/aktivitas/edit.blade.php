@extends('layouts.back')

@section('custom-css')
    <link href="{{ asset('assets/back/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/back/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('custom-js')
    @include('admin._editor_textarea_init')
    <script src="{{ asset('assets/back/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script>
        $(function() {
            $("{{ '#select2-categories' }}").select2();
            $("{{ '#select2-categories' }}").select2("val", {!! $aktivitas->where('lang', config('app.default_locale'))->first()->categories()->where('type', 'aktivitas')->where('lang', config('app.default_locale'))->pluck('category.id') !!});
        });
    </script>
@endsection

@section('page-heading')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('menu-utama.index') }}"><span>Manage Main Menu</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('config.aktivitas.index') }}"><span>{{ $article->title }}</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Edit Aktivitas</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title"> Edit Aktivitas</h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Edit Aktivitas</span>
                    </div>
                </div>
                <div class="portlet-body">
                    {!! Form::open(['route' => ['config.aktivitas.update', $aktivitas->first()->equal_id], 'method' => 'patch', 'files' => true, 'id' => 'submit_form', 'novalidate'])!!}
                    @foreach(config('app.all_langs') as $lang)
                        <div class="form-group {!! $errors->has('name_'.$lang) ? 'has-error' : '' !!}">
                            {!! Form::label('name_'.$lang, 'Name ('.config('app.human_langs')[$lang].')') !!}
                            {!! Form::text('name_'.$lang, $aktivitas->where('lang', $lang)->first()->name, ['class'=>'form-control', 'required']) !!}
                            {!! $errors->first('name_'.$lang, '<p class="help-block">:message</p>') !!}
                        </div>
                    @endforeach
                    <div class="form-group {!! $errors->has('categories') ? 'has-error' : '' !!}">
                        {!! Form::label('categories', 'Categories') !!}
                        {!! Form::select('categories[]', []+App\Category::where('type', 'aktivitas')->where('lang', config('app.default_locale'))->pluck('category','id')->all(), null, ['class'=>'form-control select2-multiple', 'multiple' => 'multiple', 'id' => 'select2-categories']) !!}
                        {!! $errors->first('categories', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
                        {!! Form::label('image', 'Image (jpeg, png)') !!}
                        {!! Form::file('image') !!}
                        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                        @if (!empty($aktivitas->first()) && $aktivitas->first()->image !== '')
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-8">
                                    <p style="margin: 5px 0;">Current Image:</p>
                                    <div class="thumbnail">
                                        <img src="{{ asset('assets/front/images/'.$aktivitas->first()->image) }}" class="img-rounded">
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