@extends('layouts.back')

@section('conten')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <span>Change Password</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Change Password</h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Change Password</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/changepassword') }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('oldpassword') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Old Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="oldpassword">
                                @if ($errors->has('oldpassword'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('oldpassword') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('newpassword') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">New Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="newpassword">
                                @if ($errors->has('newpassword'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('newpassword') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('newpassword_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">New Password Confirmation</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="newpassword_confirmation">
                                @if ($errors->has('newpassword_confirmation'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('newpassword_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection