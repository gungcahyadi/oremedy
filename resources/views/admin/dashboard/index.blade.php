@extends('layouts.back')

@section('custom-css')
    <link href="{{ asset('assets/back/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/back/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/sweet-alert/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('page-js-plugin')
    <script src="{{ asset('assets/back/global/plugins/counterup/jquery.waypoints.min.js')  }}" type="text/javascript"></script>
    <script src="{{ asset('assets/back/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
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
                    "responsive": true,
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

        var TableDatatablesEditable2 = function () {
            var handleTable2 = function () {
                var table2 = $('#sample_editable_2');
                var oTable2 = table2.dataTable({
                    "responsive": true,
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
                var tableWrapper2 = $("#sample_editable_2_wrapper");
            }

            return {
                //main function to initiate the module
                init: function () {
                    handleTable2();
                }
            };

        }();

        jQuery(document).ready(function() {
            TableDatatablesEditable.init();
            TableDatatablesEditable2.init();
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

            $(document.body).on('click', '.js-confirm', function (event) {
                event.preventDefault()
                var $form = $(this).closest('form')
                swal({
                            title: "Are you sure?",
                            text: "You can not undo this process!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#3598dc',
                            confirmButtonText: 'Yes, confirm it!',
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
                Dashboard
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title">Dashboard</h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $jadmin }}"></span>
                    </div>
                    <div class="desc"> Admin </div>
                </div>
                <a class="more" href="{{ route('user.index') }}"> Manage Admin
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $jemail }}"></span></div>
                    <div class="desc"> Email </div>
                </div>
                <a class="more" href="{{ route('email.index') }}"> Manage Email
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $jmenu }}"></span>
                    </div>
                    <div class="desc"> Web Menu </div>
                </div>
                <a class="more" href="{{ route('menu-utama.index') }}"> Manage Web Menu
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="fa fa-link"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $jsocial }}"></span> </div>
                    <div class="desc"> Social Link </div>
                </div>
                <a class="more" href="{{ route('social-link.index') }}"> Manage Social Link
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase">New Contact Messages</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_2">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Subject</td>
                            <td class="none">Messages</td>
                            <td class="col-md-2">Status</td>
                            <td class="text-center col-md-1">#</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->phone }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>
                                    <p>{{ $message->message }}</p>
                                </td>
                                <td>
                                    <span class="label {{ $message->label_status }}">{{ $message->human_status }}</span>
                                </td>
                                <td class="text-center col-md-2 col-sm-3">
                                    <span class="tooltips" data-original-title="Delete" style="display: inline;">
                                        {!! Form::model($message, ['route' => ['contact-messages.destroy', $message], 'method' => 'delete', 'class' => 'form-inline', 'style' => 'display: inline; margin: 0; padding: 0;'] ) !!}
                                        {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class'=>'btn btn btn-danger js-submit-confirm']) !!}
                                        {!! Form::close()!!}
                                    </span>
                                    @if($message->status == 'waiting-confirmation')
                                        <span class="tooltips" data-original-title="Mark as Confirmed" style="display: inline;">
                                        {!! Form::open(['route' => 'contact-messages.confirm', 'style' => 'display: inline; margin: 0; padding: 0;'])!!}
                                            {!! Form::hidden('contact_id', $message->id) !!}
                                            {!! Form::button('<i class="fa fa-thumbs-o-up"></i>', ['type' => 'submit', 'class'=>'btn btn btn-info js-confirm']) !!}
                                            {!! Form::close()!!}
                                    </span>
                                    @endif
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