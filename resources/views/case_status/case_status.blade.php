@extends('layouts.app')
@section('content')
    <style>
        .app-radio input[type="checkbox"] {
            opacity: 1;
            -webkit-appearance: checkbox;
            width: 15px;
            height: 15px;
            float: none;
        }

        .form-inline label {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: right;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-bottom: 0;
        }

        .modal-content {
            bottom: 236px;
        }

        .modal .modal-dialog {
            top: 50%;
            margin: 0 auto;
            transform: translate(0, -50%) !important;
            -webkit-transform: translate(0, -50%) !important;
            -moz-transform: translate(0, -50%) !important;
            -ms-transform: translate(0, -50%) !important;
            -o-transform: translate(0, -50%) !important;
            width: 60% !important;
            max-width: 75%;
            min-height: 100vh !important;
        }

    </style>
    <div id="app">
        <main class="py-4 text-capitalize" style="padding-top: 0px !important;">
            <section class="main-content">
                <div class="row">
                    <h1 class="mt--100" id="case_status">Case Status</h1>
                </div>
                <section class="card-details">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-12">
                            <div>
                                <div
                                    class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">
                                    <a href="#" class="btn btn-outline-info btn-bordered-primary" id="create_case"><i
                                            class="fa fa-file-excel"></i>Add Case</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                @if (session('status'))
                                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                                @endif
                                <div class="card-body">
                                    <a class="btn btn-outline-info btn-bordered-primary" style="float: right;"
                                        id="btnDelete">Delete</a>
                                    <a class="btn btn-outline-info btn-bordered-primary" style="float: right;"
                                        id="btnInactive">Inactive</a>
                                    <a class="btn btn-outline-info btn-bordered-primary" style="float: right;"
                                        id="btnActive">Active</a>
                                    <div class="table-responsive grid-wrapper">
                                        <table class="table search-table text-center" id="Case">
                                            <thead>
                                                <th>Select All<br>
                                                    <div class="app-radio"><input type="checkbox"
                                                            class="allData"></div>
                                                </th>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </main>
    </div>
    <div id="add_Case" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                    <div class="card-title">Add Case</div>
                    <button type="button" class="close alert_open" aria-label="Close">
                        <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                    </button>
                </div>
                <div class="modal-body text-primary">
                    <form method="post" action="">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id">
                                    <label for="name">Name: <span style="color:red">*</span></label>
                                    <input id="name" class="form-control" type="text" name="name" placeholder="Name"
                                        value="@if (isset($records->name)) {{ $records->name }} @endif">
                                    <span class="text-danger" id="name_Error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="status">status: <span style="color:red">*</span></label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Select Any option</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger" id="status_Error"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer justify-content-center">
                        <div class="form-group">
                            <input type="submit" name="submit" data-type="insert" id="submit" value="Add Case"
                                class="text-center btn btn-outline-info float-left btn-large insert_data">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var table = $('#Case').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('all_case_status') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "code"
                    },
                    {
                        "data": "status",
                        orderable: false
                    },
                    {
                        "data": "action",
                        orderable: false
                    },

                ],
                "lengthMenu": [
                    [3, 6, 9, 12],
                    [3, 6, 9, 12]
                ]
            });
        });

        $('#create_case').on('click', function(e) {
            e.preventDefault();
            $('#add_Case').modal('show');
        });
        $(document).on('click', '.insert_data', function(e) {
            e.preventDefault();
            var name = $('#name').val();
            var status = $('#status').val();
            var type = $(this).data('type');
            if (type == "insert") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ route('add_case') }}",
                    method: "POST",
                    data: {
                        name: name,
                        status: status,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            messageIcon = "success";
                            swal(response.success, {
                                icon: messageIcon,
                            });
                        }
                        table.ajax.reload();
                        $('#add_Case').model('hide');
                    },
                    error: function(response) {
                        $('#name_Error').text(response.responseJSON.errors.name);
                        $('#status_Error').text(response.responseJSON.errors.status);
                    }
                });
            }
        });

        $(document).on('click', '.delete_record', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (id != "") {
                if (confirm('Are you sure to delete this records?')) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        url: "{{ URL::to('delete-case') }}/" + id,
                        method: "post",
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                messageIcon = "success";
                                swal(response.success, {
                                    icon: messageIcon,
                                });
                            }
                            table.ajax.reload();
                        }
                    });
                }
            }
        });

        $(document).on('click', '.edit_record', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (id != "") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ URL::to('edit-case') }}/" + id,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response) {
                            $('#name').val(response.name);
                            $('#status').val(response.status);
                            $('#id').val(response.id);
                            $('img#thumb').removeAttr('id');
                            $('.errors').text('');
                            $('#add_Case').modal('show');
                            $('#submit').val('Update Case');
                            $('.card-title').text('Update Case');
                            $('#submit').addClass('update_Case');
                            $('#submit').removeClass('insert_data');
                        }
                    }
                });
            }
        });

        $(document).on('click', '.update_Case', function(e) {
            e.preventDefault();
            var name = $('#name').val();
            var id = $('#id').val();
            var status = $('#status').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ URL::to('update-case') }}/" + id,
                method: "POST",
                data: {
                    name: name,
                    status: status,
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        messageIcon = "success";
                        swal(response.success, {
                            icon: messageIcon,
                        });
                    }
                    table.ajax.reload();
                },
                error: function(response) {
                    $('#name_Error').text(response.responseJSON.errors.name);
                    $('#status_Error').text(response.responseJSON.errors.status);
                }
            });
        });


        $(document).on('click', '.allData', function() {
            if ($('.allData').prop('checked')) {
                $('.multiple_check').prop('checked', true);
                $('.allData').prop('checked', true);
            } else {
                $('.multiple_check').prop('checked', false);
                $('.allData').prop('checked', false);
            }
        });
        $(document).on('click', '#btnActive', function(e) {
            e.preventDefault();

            var jsAllSelectedIds = [];
            $("input:checkbox[name=multiple_check]:checked").each(function() {
                jsAllSelectedIds.push($(this).val());
            });

            if (jsAllSelectedIds == '' || jsAllSelectedIds == null) {
                alert('Please select atleast one record');
                return false;
            } else {
                if (confirm('Are you sure to Activate this records?')) {
                    var ajax_url = "{{ route('active_all') }}";
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        type: "POST",
                        url: ajax_url,
                        data: {
                            'ids': jsAllSelectedIds
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if (response == 'success') {
                                $.each(jsAllSelectedIds, function() {
                                    $('#status_' + this).html(
                                        '<label class="badge badge-pill badge-success" style="font-size: 15px; width: 100px;">Active</label>'
                                    );
                                });
                                $('input').filter(':checkbox').prop('checked', false);
                                var message = 'Recored active Successfully';
                                var messageIcon = 'success';
                            } else if (response == 'failed') {
                                var message = 'failed to active records';
                                var messageIcon = 'error';
                            }
                            swal(message, {
                                icon: messageIcon,
                            });
                        }
                    });
                }
            }
        });


        $(document).on('click', '#btnInactive', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var jsAllSelectedIds = [];
            $("input:checkbox[name=multiple_check]:checked").each(function() {
                jsAllSelectedIds.push($(this).val());
            });
            if (jsAllSelectedIds == '' || jsAllSelectedIds == null) {
                alert('Please select atleast one record');
                return false;
            } else {
                if (confirm('Are you sure to In-Activate this records?')) {
                    var ajax_url = "{{ route('inactive_all') }}";
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        type: "POST",
                        url: ajax_url,
                        data: {
                            'ids': jsAllSelectedIds
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if (response == 'success') {
                                $.each(jsAllSelectedIds, function() {
                                    $('#status_' + this).html(
                                        '<label class="badge badge-pill badge-info" style="font-size: 15px; width: 100px;">In Active</label>'
                                    );
                                });
                                $('input').filter(':checkbox').prop('checked', false);
                                var message = 'Recored In-active Successfully';
                                var messageIcon = 'success';
                            } else if (response == 'failed') {
                                var message = 'failed to Inactive records';
                                var messageIcon = 'error';
                            }
                            swal(message, {
                                icon: messageIcon,
                            });
                        }
                    });

                }
            }
        });

        $(document).on('click', '#btnDelete', function(e) {
            e.preventDefault();

            var jsAllSelectedIds = [];
            $("input:checkbox[name=multiple_check]:checked").each(function() {
                jsAllSelectedIds.push($(this).val());
            });
            if (jsAllSelectedIds == '' || jsAllSelectedIds == null) {
                alert('Please select atleast one record');
                return false;
            } else {
                if (confirm('Are you sure to delete this records?')) {
                    var ajax_url = "{{ route('delete_all') }}";
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        type: "POST",
                        url: ajax_url,
                        data: {
                            'ids': jsAllSelectedIds
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if (response == 'success') {
                                var message = 'Recored deleted Successfully';
                                var messageIcon = 'success';
                                $('input').filter(':checkbox').prop('checked', false);
                                // location.reload(true);
                            } else if (response == 'failed') {
                                var message = 'failed to delete records';
                                var messageIcon = 'error';
                            }
                            swal(message, {
                                icon: messageIcon,
                            });
                            $("#" + jsAllSelectedIds + "").remove();
                        }
                    });
                }
            }

        });
    </script>

    <script type="text/javascript">
        function deleteConfirmation(id) {
            swal({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/delete-case') }}/" + id,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {

                            if (results.success === true) {
                                swal("Done!", results.message, "success");
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            })
        }
    </script>
@endsection
