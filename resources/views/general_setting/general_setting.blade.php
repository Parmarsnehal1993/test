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
                    <h1 class="mt--100" id="totalDebtsAmount">General Settings</h1>
                </div>
                <section class="card-details">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-12">
                            <div>
                                <div
                                    class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">
                                    <a href="#" class="btn btn-outline-info btn-bordered-primary"
                                        id="create_general_setting"><i class="fa fa-file-excel"></i>Add General Settings</a>
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
                                        id="deletebtn">Delete</a>
                                    <div class="table-responsive grid-wrapper">
                                        <table class="table search-table text-center" id="generalSetting">
                                            <thead>
                                                <th>Select All<br>
                                                    <div class="app-radio"><input type="checkbox"
                                                            class="allData"></div>
                                                </th>
                                                <th>General Settings Group Id</th>
                                                <th>Key</th>
                                                <th>value</th>
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
    <div id="add_setting" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                    <div class="card-title">Add General Setting</div>
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
                                    <label for="name">General Settings Group Id: <span style="color:red">*</span></label>
                                    <select class="form-control" name="general_settings_group_id"
                                        id="general_settings_group_id" value="@if (isset($records->general_settings_group_id)) {{ $records->general_settings_group_id }} @endif">
                                        @foreach ($generalSettingId as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->group_display_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Key: <span style="color:red">*</span></label>
                                    <input id="key" class="form-control" type="text" name="key" placeholder="Key"
                                        value="@if (isset($records->key)) {{ $records->key }} @endif" required>
                                    <span class="text-danger" id="keyError"></span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Value: <span style="color:red">*</span></label>
                                    <input id="value" class="form-control" type="text" name="value" placeholder="Value"
                                        value="@if (isset($records->value)) {{ $records->value }} @endif" required>
                                    <span class="text-danger" id="valueError"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <div class="form-group">
                        <input type="submit" name="submit" data-type="insert" id="submit" value="Add General Setting"
                            class="text-center btn btn-outline-info float-left btn-large insertSetting">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var table = $('#generalSetting').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('general_setting') }}",
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
                        "data": "general_settings_group_id"
                    },
                    {
                        "data": "key"
                    },
                    {
                        "data": "value"
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



        $('#create_general_setting').on('click', function(e) {
            e.preventDefault();
            $('#add_setting').modal('show');
        });
        $(document).on('click', '.insertSetting', function(e) {
            e.preventDefault();
            var general_settings_group_id = $('#general_settings_group_id').val();
            var key = $('#key').val();
            var value = $('#value').val();
            var type = $(this).data('type');
            if (type == "insert") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ route('add_general_setting') }}",
                    method: "POST",
                    data: {
                        general_settings_group_id: general_settings_group_id,
                        key: key,
                        value: value,
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
                        $('#add_setting').model('hide');
                    },
                    error: function(response) {
                        $('#keyError').text(response.responseJSON.errors.key);
                        $('#valueError').text(response.responseJSON.errors.value);
                    }
                });
            }



        });

        $(document).on('click', '.delete_setting', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (id != "") {
                if (confirm('Are you sure to delete this records?')) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        url: "{{ URL::to('delete-general-setting') }}/" + id,
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

        $(document).on('click', '.editSetting', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (id != "") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ URL::to('edit-setting') }}/" + id,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response) {
                            $('#general_settings_group_id').val(response.general_settings_group_id);
                            $('#key').val(response.key);
                            $('#value').val(response.value);
                            $('#id').val(response.id);
                            $('img#thumb').removeAttr('id');
                            $('.errors').text('');
                            $('#add_setting').modal('show');
                            $('#submit').val('Update general setting');
                            $('.card-title').text('Update general setting');
                            $('#submit').addClass('update_setting');
                            $('#submit').removeClass('insertSetting');
                        }
                    }
                });
            }
        });

        $(document).on('click', '.update_setting', function(e) {
            e.preventDefault();
            var general_settings_group_id = $('#general_settings_group_id').val();
            var key = $('#key').val();
            var value = $('#value').val();
            var id = $('#id').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ URL::to('update-general-setting') }}/" + id,
                method: "POST",
                data: {
                    general_settings_group_id: general_settings_group_id,
                    key: key,
                    value: value,
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
                    $('#general_settings_group_idError').text(response.responseJSON.errors
                        .general_settings_group_id);
                    $('#keyError').text(response.responseJSON.errors.key);
                    $('#valueError').text(response.responseJSON.errors.value);
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

        $(document).on('click', '#deletebtn', function(e) {
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
                    var ajax_url = "{{ route('delete_multiple_setting') }}";
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
