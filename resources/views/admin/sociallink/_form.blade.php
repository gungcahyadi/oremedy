<div class="form-group {!! $errors->has('platform') ? 'has-error' : '' !!}">
    {!! Form::label('platform', 'Platform') !!}
    {!! Form::select('platform', [''=>'']+App\SocialLink::platformList(), null, ['class'=>'form-control']) !!}
    {!! $errors->first('platform', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {!! $errors->has('link') ? 'has-error' : '' !!}">
    {!! Form::label('link', 'Link') !!}
    {!! Form::text('link', null, ['class'=>'form-control']) !!}
    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {!! $errors->has('published') ? 'has-error' : '' !!}">
    {!! Form::label('published', 'Published') !!}
    <div class="row">
        <label class="radio-inline">{{ Form::radio('published', '1',false) }} Yes</label>
        <label class="radio-inline">{{ Form::radio('published', '0',true) }} No</label>
    </div>
    {!! $errors->first('published', '<p class="help-block">:message</p>') !!}
</div>
<hr>
<div class="text-right">
    {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
</div>