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

<div class="form-group {!! $errors->has('receipt') ? 'has-error' : '' !!}">
    {!! Form::label('receipt', 'Use Receipt') !!}
    <div class="row">
        <label class="radio-inline">{{ Form::radio('receipt', '1',false) }} Yes</label>
        <label class="radio-inline">{{ Form::radio('receipt', '0',true) }} No</label>
    </div>
    {!! $errors->first('receipt', '<p class="help-block">:message</p>') !!}
</div>

<div class="text-right">
    {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
</div>