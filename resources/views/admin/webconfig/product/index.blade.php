@extends('layouts.back')

@section('custom-css')
    <link href="{{ asset('assets/back/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/back/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/sweet-alert/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('custom-js')
    <script src="{{ asset('assets/back/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/back/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/back/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var TableDatatablesEditable = function () {

            var handleTable = function () {
                var table = $('#sample_editable_1');
                var oTable = table.dataTable({
                    "lengthMenu": [
                        [5, 10, 15, 20, -1],
                        [5, 10, 15, 20, "All"] // change per page values here
                    ],

                    // set the initial value
                    "pageLength": 10,

                    "language": {
                        "lengthMenu": " _MENU_ records"
                    },
                    "columnDefs": [{ // set default column settings
                        'orderable': true,
                        'targets': [0]
                    }, {
                        "searchable": true,
                        "targets": [0]
                    }],
                    "order": [
                        [0, "asc"]
                    ] // set first column as a default sort by asc
                });

                var tableWrapper = $("#sample_editable_1_wrapper");
            }

            return {
                //main function to initiate the module
                init: function () {
                    handleTable();
                }

            };

        }();

        jQuery(document).ready(function() {
            TableDatatablesEditable.init();
        });
    </script>
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
                <span>{{ $article->title }}</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title"> {{ $article->title }}</h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Manage Category</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ route('config.catproduct.create') }}">
                                        <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_2">
                        <thead>
                        <tr>
                            <td>Category</td>
                            <td class="text-center col-md-2">#</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->category }}</td>
                                <td class="text-center col-md-2 col-sm-3">
                                    {!! Form::model($category, ['route' => ['config.catproduct.destroy', $category->equal_id], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                                    <span class="tooltips" data-original-title="Edit">
                                            <a href="{{ route('config.catproduct.edit', $category->equal_id)}}" class="btn btn-icon-only blue"><i class="fa fa-edit"></i></a>
                                    </span>
                                    <span class="tooltips" data-original-title="Delete">
                                        {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class'=>'btn btn btn-danger js-submit-confirm']) !!}
                                    </span>
                                    {!! Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> {{ $article->title }}</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ route('config.product.create') }}">
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
                            <td>Name</td>
                            <td class="col-md-5">Short Description</td>
                            <td class="col-md-1">Published</td>
                            <td class="col-md-1">Display</td>
                            <td class="text-center col-md-2">#</td>
                            <td class="text-center col-md-1">#</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allproduct as $af)
                            <tr>
                                <td>{{ $af->title }}</td>
                                <td>{!! $af->short_description !!}</td>
                                <td class="text-center">@if($af->published == '1') Yes @else No @endif</td>
                                <td class="text-center">@if($af->display == '1') Yes @else No @endif</td>
                                <td class="text-center col-md-2 col-sm-3">
                                    {!! Form::model($af, ['route' => ['config.product.destroy', $af->equal_id], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                                    <span class="tooltips" data-original-title="Edit">
                                            <a href="{{ route('config.product.edit', $af->equal_id)}}" class="btn btn-icon-only blue"><i class="fa fa-edit"></i></a>
                                    </span>
                                    <span class="tooltips" data-original-title="Delete">
                                        {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class'=>'btn btn btn-danger js-submit-confirm']) !!}
                                    </span>
                                    {!! Form::close()!!}
                                </td>
                                <td class="text-center">
                                    <span class="tooltips" data-original-title="Manage Header Image">
                                        <a href="{{ route('config.productimage.index', $af->equal_id) }}" class="btn btn-icon-only purple-wisteria"><i class="fa fa-image"></i></a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection