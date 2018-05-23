@foreach(config('app.all_langs') as $lang)
<div class="form-group {!! $errors->has('category_'.$lang) ? 'has-error' : '' !!}">
    {!! Form::label('category_'.$lang, 'Category ('.config('app.human_langs')[$lang].')') !!}
    {!! Form::text('category_'.$lang, !empty($model) ? $model->where('lang', $lang)->first()->category : null, ['class'=>'form-control']) !!}
    {!! $errors->first('category_'.$lang, '<p class="help-block">:message</p>') !!}
</div>
@endforeach
<hr>
<div class="text-right">
    {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
</div>