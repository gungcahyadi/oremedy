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
                <span>Team</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title"> Team</h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Team</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ route('config.team.create') }}">
                                        <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>
                            <td class="col-md-2">Name</td>
                            <td>Image</td>
                            <td class="text-center col-md-2">#</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if($team->count() > 0)
                            @foreach($team as $tm)
                                <tr>
                                    <td>{{ $tm->name }}</td>
                                    <td>
                                        <div class="thumbnail">
                                            <img src="{{ $tm->home_slider }}" alt="{{ $tm->name }}">
                                        </div>
                                    </td>
                                    <td class="text-center col-md-2">
                                        {!! Form::model($tm, ['route' => ['config.team.destroy', $tm->equal_id], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                                        <span class="tooltips" data-original-title="Edit">
                                            <a href="{{ route('config.team.edit', $tm->equal_id)}}" class="btn btn-icon-only blue"><i class="fa fa-edit"></i></a>
                                        </span>
                                        <span class="tooltips" data-original-title="Delete">
                                            {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class'=>'btn btn-icon-only red js-submit-confirm']) !!}
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