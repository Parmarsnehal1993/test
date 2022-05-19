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

    </style>
    <div id="app">
        <main class="py-4 text-capitalize" style="padding-top: 0px !important;">
            <section class="main-content">
                <div class="row">
                    <h1 class="mt--100" id="totalDebtsAmount">Debt Type</h1>
                </div>
                <section class="card-details">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-12">
                            <div>
                                <div
                                    class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">
                                    <a href="#" class="btn btn-outline-info btn-bordered-primary" id="create_debt"><i
                                            class="fa fa-file-excel"></i>Add Debt</a>
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
                                        <table class="table search-table text-center" id="Debt">
                                            <thead>
                                                <th>Select All<br>
                                                    <div class="app-radio"><input type="checkbox"
                                                            class="allData"></div>
                                                </th>
                                                <th>Name</th>
                                                <th>Display Name</th>
                                                <th>Type</th>
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
    <div id="add_Debt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                    <div class="card-title">Add Debt</div>
                    <button type="button" class="close alert_open" aria-label="Close">
                        <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                    </button>
                </div>
                <div class="modal-body text-primary">
                    <form method="post" action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id">
                                    <label for="name">Display Name: <span style="color:red">*</span></label>
                                    <input id="display_name" class="form-control" type="text" name="display_name"
                                        placeholder="Display Name" value="@if (isset($records->display_name)) {{ $records->display_name }} @endif">
                                    <span class="text-danger" id="display_nameError"></span>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type: <span style="color:red">*</span></label>
                                    <input id="type" class="form-control" type="text" name="type" placeholder="Type"
                                        value="@if (isset($records->type)) {{ $records->type }} @endif">
                                    <span class="text-danger" id="type_Error"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <div class="form-group">
                        <input type="submit" name="submit" data-type="insert" id="submit" value="Add Debt"
                            class="text-center btn btn-outline-info float-left btn-large insert_data">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            var table = $('#Debt').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('all_debt_type') }}",
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
                        "data": "type",
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



        $('#create_debt').on('click', function(e) {
            e.preventDefault();
            $('#add_Debt').modal('show');
        });
        $(document).on('click', '.insert_data', function(e) {
            e.preventDefault();
            var display_name = $('#display_name').val();
            var p_type = $('#type').val();
            var type = $(this).data('type');
            if (type == "insert") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ route('add_debt') }}",
                    method: "POST",
                    data: {
                        display_name: display_name,
                        type: p_type,
                    },
                    dataType: "json",
                    success: function(response) {

                        if (response.errors) {
                            $('.errors').text(response.errors);
                        }
                        if (response.success) {
                            messageIcon = "success";
                            swal(response.success, {
                                icon: messageIcon,
                            });
                        }
                        table.ajax.reload();
                        $('#add_Debt').model('hide');
                    },
                    error: function(response) {
                        $('#display_nameError').text(response.responseJSON.errors.display_name);
                        $('#type_Error').text(response.responseJSON.errors.type);
                    }
                });
            }
        });

        $(document).on('click', '.delete_debt', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (id != "") {
                if (confirm('Are you sure to delete this records?')) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        url: "{{ URL::to('delete-debt') }}/" + id,
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

        $(document).on('click', '.edit_debt', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (id != "") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ URL::to('edit-debt') }}/" + id,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response) {
                            $('#name').val(response.name);
                            $('#display_name').val(response.display_name);
                            $('#type').val(response.type);
                            $('#id').val(response.id);
                            $('img#thumb').removeAttr('id');
                            $('.errors').text('');
                            $('#add_Debt').modal('show');
                            $('#submit').val('Update Debt');
                            $('.card-title').text('Update Debt');
                            $('#submit').addClass('update_debt');
                            $('#submit').removeClass('insert_data');
                        }
                    }
                });
            }
        });

        $(document).on('click', '.update_debt', function(e) {
            e.preventDefault();
            var display_name = $('#display_name').val();
            var type = $('#type').val();
            var id = $('#id').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ URL::to('update-debt') }}/" + id,
                method: "POST",
                data: {
                    display_name: display_name,
                    type: type,
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
                    $('#type_Error').text(response.responseJSON.errors.type);
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
                    var ajax_url = "{{ route('delete_all_debt') }}";
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
