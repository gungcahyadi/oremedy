@extends('layouts.back')

@section('conten')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <span>Web Connection</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('social-link.index') }}"><span>Manage Social Link</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Edit Paltform</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Edit Platform</h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Edit Platform</span>
                    </div>

                </div>
                <div class="portlet-body">
                    {!! Form::model($social, ['route' => ['social-link.update', $social],'method' =>'patch'])!!}
                    @include('admin.sociallink._form', ['model' => $social])
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection