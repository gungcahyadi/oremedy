@extends('layouts.back')

@section('page-heading')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <span>Web Configuration</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Other Setting</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title"> Other Setting</h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Other Setting</span>
                    </div>

                </div>
                <div class="portlet-body">
                    {!! Form::open(['route' => 'web-config.update', 'method' => 'patch', 'class' => 'form-horizontal']) !!}
                    <?php $fasilitascfg = $configs->where('config_name', 'product_pagination')->first(); ?>
                    @if(!empty($fasilitascfg))
                        <div class="form-group {!! $errors->has('product_pagination') ? 'has-error' : '' !!}">
                            {!! Form::label('product_pagination', 'Fasilitas Pagination', ['class' => 'control-label col-md-2']) !!}
                            <div class="col-md-10">
                                <div class=" row col-md-2">{!! Form::number('product_pagination', $fasilitascfg->value, ['class'=>'form-control', 'required']) !!}</div>
                                {!! $errors->first('product_pagination', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    @endif
                    <hr>
                    <div class="form-group">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection