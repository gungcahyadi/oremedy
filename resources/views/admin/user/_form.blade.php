<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class'=>'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password',['class'=>'form-control']) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {!! $errors->has('password_confirmation') ? 'has-error' : '' !!}">
    {!! Form::label('password_confirmation', 'Password Confirmation') !!}
    {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {!! $errors->has('full_admin') ? 'has-error' : '' !!}">
    {!! Form::label('full_admin', 'Full Admin') !!}
    <div class="row col-md-12">
        <label class="radio-inline">{{ Form::radio('full_admin', '1',false) }} Yes</label>
        <label class="radio-inline">{{ Form::radio('full_admin', '0',true) }} No</label>
    </div>
    {!! $errors->first('full_admin', '<p class="help-block">:message</p>') !!}
</div>
<div class="text-right">
    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
</div>