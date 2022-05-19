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

        .modal-content {
            bottom: 136px;
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

        .parsley-errors-list {
            color: red;
        }

    </style>
    <div id="app">
        <main class="py-4 text-capitalize" style="padding-top: 0px !important;">
            <section class="main-content">
                <div class="row">
                    <h1 class="mt--100" id="totalDebtsAmount">General Settings Groups</h1>
                </div>
                <section class="card-details">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-12">
                            <div>
                                <div
                                    class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">
                                    <a href="#" class="btn btn-outline-info btn-bordered-primary" id="group_setting"><i
                                            class="fa fa-file-excel"></i>Add General Settings</a>
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
                                        id="deleteGroupBtn">Delete</a>
                                    <div class="table-responsive grid-wrapper">
                                        <table class="table search-table text-center" id="Group">
                                            <thead>
                                                <th>Select All<br>
                                                    <div class="app-radio"><input type="checkbox"
                                                            class="allData"></div>
                                                </th>
                                                <th>Group Name</th>
                                                <th>Group Display Name</th>
                                                <th>Title</th>
                                                <th>Description</th>
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
    <div id="add_general_group" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                    <div class="card-title">Add General Settings Groups</div>
                    <button type="button" class="close alert_open" aria-label="Close">
                        <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                    </button>
                </div>
                <div class="modal-body text-primary">
                    <form method="post" action="" id="generalForm" data-parsley-validate="">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id">
                                    <label for="name">Group Display Name: <span style="color:red">*</span></label>
                                    <input id="group_display_name" class="form-control" type="text"
                                        name="group_display_name" placeholder="Group Display Name"
                                        value="@if (isset($records->group_display_name)) {{ $records->group_display_name }} @endif" required>
                                    <span class="text-danger" id="group_display_nameError"></span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Title: <span style="color:red">*</span></label>
                                    <input id="title" class="form-control" type="text" name="title" placeholder="Title"
                                        value="@if (isset($records->title)) {{ $records->title }} @endif" required>
                                    <span class="text-danger" id="titleError"></span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Description: <span style="color:red">*</span></label>
                                    <input id="description" class="form-control" type="text" name="description"
                                        placeholder="Description" value="@if (isset($records->description)) {{ $records->description }} @endif" required>
                                    <span class="text-danger" id="descriptionError"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <div class="form-group">
                        <input type="submit" name="submit" data-type="insert" id="submit" value="Add General Setting Group"
                            class="text-center btn btn-outline-info float-left btn-large insertGroup">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var table = $('#Group').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('general_setting_group') }}",
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
                        "data": "group_name"
                    },
                    {
                        "data": "group_display_name"
                    },
                    {
                        "data": "title"
                    },
                    {
                        "data": "description"
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

        $('#group_setting').on('click', function(e) {
            e.preventDefault();
            $('#add_general_group').modal('show');
        });
        $(document).on('click', '.insertGroup', function(e) {
            e.preventDefault();
            var group_display_name = $('#group_display_name').val();
            var title = $('#title').val();
            var description = $('#description').val();
            var type = $(this).data('type');
            if (type == "insert") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ route('add_general_group') }}",
                    method: "POST",
                    data: {
                        group_display_name: group_display_name,
                        title: title,
                        description: description,
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
                        $('#add_general_group').model('hide');
                    },
                    error: function(response) {
                        $('#group_display_nameError').text(response.responseJSON.errors
                            .group_display_name);
                        $('#titleError').text(response.responseJSON.errors.title);
                        $('#descriptionError').text(response.responseJSON.errors.description);
                    }
                });
            }



        });

        $(document).on('click', '.delete_general_group', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (id != "") {
                if (confirm('Are you sure to delete this records?')) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        url: "{{ URL::to('delete-group') }}/" + id,
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

        $(document).on('click', '.editGroup', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (id != "") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ URL::to('edit-group') }}/" + id,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response) {
                            $('#group_name').val(response.group_name);
                            $('#group_display_name').val(response.group_display_name);
                            $('#title').val(response.title);
                            $('#description').val(response.description);
                            $('#id').val(response.id);
                            $('img#thumb').removeAttr('id');
                            $('.errors').text('');
                            $('#add_general_group').modal('show');
                            $('#submit').val('Update General Settings Groups');
                            $('.card-title').text('Update General Settings Groups');
                            $('#submit').addClass('update_group');
                            $('#submit').removeClass('insertGroup');
                        }
                    }
                });
            }
        });

        $(document).on('click', '.update_group', function(e) {
            e.preventDefault();
            var group_display_name = $('#group_display_name').val();
            var title = $('#title').val();
            var description = $('#description').val();
            var id = $('#id').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ URL::to('update-general-group') }}/" + id,
                method: "POST",
                data: {
                    group_display_name: group_display_name,
                    title: title,
                    description: description,
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
                    $('#group_display_nameError').text(response.responseJSON.errors.group_display_name);
                    $('#titleError').text(response.responseJSON.errors.title);
                    $('#descriptionError').text(response.responseJSON.errors.description);
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

        $(document).on('click', '#deleteGroupBtn', function(e) {
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
                    var ajax_url = "{{ route('delete_multiple_group') }}";
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
                                location.reload(true);
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
@endsection
