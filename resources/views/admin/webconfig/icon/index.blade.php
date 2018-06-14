@extends('layouts.back')

@section('custom-css')
    <link href="{{ asset('assets/sweet-alert/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('custom-js')
    <script src="{{ asset('assets/sweet-alert/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(document.body).on('click', '.js-submit-confirm', function (event) {
                event.preventDefault()
                var $form = $(this).closest('form')
                swal({
                            title: "Are you sure?",
                            text: "You can not undo this process!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: "Cancel",
                            closeOnConfirm: true
                        },
                        function () {
                            $form.submit()
                        });
            })
        })
    </script>
@endsection

@section('page-heading')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <span>Web Configuration</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('menu-utama.index') }}"><span>Manage Main Menu</span></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Icon Chat</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title"> Icon Chat</h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Icon Chat</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>
                            <td class="col-md-2">Name</td>
                            <td>Image</td>
                            <td class="text-center col-md-2">#</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if($icon->count() > 0)
                            @foreach($icon as $tm)
                                <tr>
                                    <td>{{ $tm->name }}</td>
                                    <td>
                                        <div class="thumbnail">
                                            <img src="{{ $tm->home_slider }}" alt="{{ $tm->name }}">
                                        </div>
                                    </td>
                                    <td class="text-center col-md-2">
                                        {!! Form::model($tm, ['route' => ['config.icon.destroy', $tm->equal_id], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                                        <span class="tooltips" data-original-title="Edit">
                                            <a href="{{ route('config.icon.edit', $tm->equal_id)}}" class="btn btn-icon-only blue"><i class="fa fa-edit"></i></a>
                                        </span>                                      
                                        {!! Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No data available in table</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection