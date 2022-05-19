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
            bottom: 236px;
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
                    <h1 class="mt--100" id="totalDebtsAmount">Assets</h1>
                </div>
                <section class="card-details">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-12">
                            <div>
                                <div
                                    class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">
                                    <a href="#" class="btn btn-outline-info btn-bordered-primary" id="create_asset"><i
                                            class="fa fa-file-excel"></i>Add Assets</a>
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
                                        id="deleteDebtbtn">Delete</a>
                                    <div class="table-responsive grid-wrapper">
                                        <table class="table search-table text-center" id="Assets">
                                            <thead>
                                                <th>Select All<br>
                                                    <div class="app-radio"><input type="checkbox"
                                                            class="allData"></div>
                                                </th>
                                                <th>Name</th>
                                                <th>Display Name</th>
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
    <div id="add_asset" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                    <div class="card-title">Add Assets</div>
                    <button type="button" class="close alert_open" aria-label="Close">
                        <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                    </button>
                </div>
                <div class="modal-body text-primary">
                    <form method="post" action="" id="Assetform" data-parsley-validate="">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id">
                                    <label for="name">Display Name: <span style="color:red">*</span></label>
                                    <input id="display_name" class="form-control" type="text" name="display_name"
                                        placeholder="Display Name" value="@if (isset($records->display_name)) {{ $records->display_name }} @endif" required>
                                    <span class="text-danger" id="display_nameError"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <div class="form-group">
                        <input type="submit" name="submit" data-type="insert" id="submit" value="Add Asset"
                            class="text-center btn btn-outline-info float-left btn-large insert_data">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var table = $('#Assets').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('all_asset') }}",
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
                        "data": "display_name"
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

        $('#create_asset').on('click', function(e) {
            e.preventDefault();
            $('#add_asset').modal('show');
        });
        $(document).on('click', '.insert_data', function(e) {
            e.preventDefault();
            var display_name = $('#display_name').val();
            var type = $(this).data('type');
            if (type == "insert") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ route('add_asset') }}",
                    method: "POST",
                    data: {
                        display_name: display_name,
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
                        $('#add_asset').model('hide');
                    },
                    error: function(response) {
                        $('#display_nameError').text(response.responseJSON.errors.display_name);
                    }
                });
            }
        });

        $(document).on('click', '.delete_asset', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            // alert(id);
            if (id != "") {
                if (confirm('Are you sure to delete this records?')) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        url: "{{ URL::to('delete-asset') }}/" + id,
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

        $(document).on('click', '.edit_assets', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (id != "") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ URL::to('edit-asset') }}/" + id,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response) {
                            $('#name').val(response.name);
                            $('#display_name').val(response.display_name);
                            $('#id').val(response.id);
                            $('img#thumb').removeAttr('id');
                            $('.errors').text('');
                            $('#add_asset').modal('show');
                            $('#submit').val('Update Asset');
                            $('.card-title').text('Update Asset');
                            $('#submit').addClass('update_asset');
                            $('#submit').removeClass('insert_data');
                        }
                    }
                });
            }
        });

        $(document).on('click', '.update_asset', function(e) {
            e.preventDefault();
            var display_name = $('#display_name').val();
            var id = $('#id').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ URL::to('update-asset') }}/" + id,
                method: "POST",
                data: {
                    display_name: display_name,
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
                    $('#display_nameError').text(response.responseJSON.errors.display_name);
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

        $(document).on('click', '#deleteDebtbtn', function(e) {
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
                    var ajax_url = "{{ route('delete_all_asset') }}";
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
