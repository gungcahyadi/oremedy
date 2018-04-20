@extends('layouts.auth')

<!-- Main Content -->
@section('conten')
    <div class="content">
    <!-- BEGIN LOGIN FORM -->
        {{ Form::open(['url' => '/password/email','method' => 'post']) }}
        <h3 class="form-title font-green">Forget Password ?</h3>
        <p> Enter your e-mail address below to reset your password. </p>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session()->get('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session()->get('flash_notification.message') }}
            </div>
        @endif
        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            {{ Form::email('email', null, ['class' => 'form-control form-control-solid placeholder-no-fix','placeholder' => 'Email']) }}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-actions">
            {!! Form::submit('Send Reset Password Link', ['class'=>'btn green uppercase pull-right']) !!}
        </div>
        {{ Form::close() }}
    </div>
@endsection
