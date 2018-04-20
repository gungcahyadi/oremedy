@extends('layouts.auth')

@section('conten')
    <div class="content">
    <!-- BEGIN LOGIN FORM -->
        {{ Form::open(['url' => '/password/reset','method' => 'post']) }}
        <input type="hidden" name="token" value="{{ $token }}">
        <h3 class="form-title font-green">Reset Password</h3>
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
            {{ Form::email('email', $email, ['class' => 'form-control form-control-solid placeholder-no-fix','placeholder' => 'Email']) }}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            {{ Form::password('password', ['class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Password']) }}
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {!! $errors->has('password_confirmation') ? 'has-error' : '' !!}">
            <label class="control-label visible-ie8 visible-ie9">Retype Password</label>
            {{ Form::password('password_confirmation', ['class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Retype Password']) }}
            {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-actions">
            {!! Form::submit('Reset Password', ['class'=>'btn green uppercase']) !!}
        </div>
        {{ Form::close() }}
    </div>
@endsection
