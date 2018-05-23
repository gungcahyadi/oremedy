@extends('layouts.back')

@section('page-heading')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('menu-utama.index') }}"><span>Manage Main Menu</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('config.product.index') }}"><span>{{ $article->title }}</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Edit Category</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title"> Edit Category</h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Edit Category</span>
                    </div>

                </div>
                <div class="portlet-body">
                    {!! Form::model($category, ['route' => ['config.catproduct.update', $category->first()->equal_id],'method' =>'patch'])!!}
                    @include('admin.webconfig.catproduct._form', ['model' => $category])
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection