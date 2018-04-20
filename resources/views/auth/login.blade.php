@extends('layouts.auth')

@section('conten')
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        {{ Form::open(['url' => '/login','method' => 'post']) }}
        <h3 class="form-title font-green" style="padding: 10px 0;">Bali Tourism College</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @include('_flash_notification_message')
        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            {{ Form::email('email', null, ['class' => 'form-control form-control-solid placeholder-no-fix','placeholder' => 'Email']) }}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            {{ Form::password('password', ['class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Password']) }}
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
        <label class="rememberme check"><input type="checkbox" name="remember"> Remember Me </label>
        <div class="form-actions">
            {!! Form::submit('Login', ['class'=>'btn green uppercase']) !!}
            <a class="forget-password" href="{{ url('/password/reset') }}">Forgot Password?</a>
        </div>
        {{ Form::close() }}
    </div>
@endsection
