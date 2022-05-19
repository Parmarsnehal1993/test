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
            bottom: 70px;
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
                    <h1 class="mt--100" id="totalDebtsAmount">Income Outgoing</h1>
                </div>
                <section class="card-details">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-12">
                            <div>
                                <div
                                    class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">
                                    <a href="#" class="btn btn-outline-info btn-bordered-primary"
                                        id="create_income_outgoing"><i class="fa fa-file-excel"></i>Add Income Outgoing</a>
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
                                        id="delete_question">Delete</a>
                                    <div class="table-responsive grid-wrapper">
                                        <table class="table search-table text-center" id="incomeOut">
                                            <thead>
                                                <th>Select All<br>
                                                    <div class="app-radio"><input type="checkbox"
                                                            class="allData"></div>
                                                </th>
                                                <th>Question</th>
                                                <th>Sub type</th>
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
    <div id="addIncomeOut" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                    <div class="card-title">Add Income Outgoing</div>
                    <button type="button" class="close alert_open" aria-label="Close">
                        <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                    </button>
                </div>
                <div class="modal-body text-primary">
                    <div id="form_result"></div>
                    <form method="post" action="" id="generalForm" data-parsley-validate="">
                        @csrf
                        {{-- <div class="row edit_page_permission_data">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sub_type">Sub Type: <span style="color:red">*</span></label>
                                            <select name="sub_type" id="sub_type" class="form-control">

                                            </select>
                                            <span class="text-danger" id="sub_typeError"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>  ```````````````````````````````````````````````````````````````````````````````````aaaaaaaaaaaaaaaaaaaaaaaaaa
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id">
                                    <label for="question">Question: <span style="color:red">*</span></label>
                                    <textarea rows="5" class="form-control" cols="5" placeholder="Enter any Question"
                                        id="question" name="question" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </textarea>
                                    <span class="text-danger" id="questionError"></span>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type: <span style="color:red">*</span></label>
                                    <select id="type" name="type" class="form-control">
                                        <option value="" selected disabled>Select Type</option>
                                        @foreach ($type as $key => $types)
                                            <option value="{{ $types }}"> {{ $types }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="typeError"></span>
                                </div>
                                <div class="form-group">
                                    <label for="sub_type">Sub Type: <span style="color:red">*</span></label>
                                    <select name="sub_type" id="sub_type" class="form-control">

                                    </select>
                                    <span class="text-danger" id="sub_typeError"></span>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <div class="form-group">
                        <input type="submit" name="submit" data-type="insert" id="submit" value="Add Income Outgoing"
                            class="text-center btn btn-outline-info float-left btn-large insertQuestion">
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>
    </div>
    <script type="text/javascript">
        $('#type').change(function() {
            var types = $('#type').val();
            if (types) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: '{{ route('show') }}',
                    method: "POST",
                    data: {
                        type: types
                    },
                    success: function(data) {
                        $('#sub_type').html(data);
                    }
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#incomeOut').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('all_income_outgoing') }}",
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
                        "data": "question"
                    },

                    {
                        "data": "sub_type"
                    },
                    {
                        "data": "type"
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

        $('#create_income_outgoing').on('click', function(e) {
            e.preventDefault();
            $('#addIncomeOut').modal('show');
        });
        $(document).on('click', '.insertQuestion', function(e) {
            e.preventDefault();
            var question = $('#question').val();
            var types = $('#type').val();
            var sub_type = $('#sub_type').val();
            var type = $(this).data('type');
            if (type == "insert") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ route('add_income_outgoing') }}",
                    method: "POST",
                    data: {
                        question: question,
                        type: types,
                        sub_type: sub_type,
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
                        $('#addIncomeOut').model('hide');
                    },
                    error: function(response) {
                        $('#questionError').text(response.responseJSON.errors.question);
                        $('#typeError').text(response.responseJSON.errors.type);
                        $('#sub_typeError').text(response.responseJSON.errors.sub_type);
                    }
                });
            }
        });
        $(document).on('click', '.delete_question', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            // alert(id);
            if (id != "") {
                if (confirm('Are you sure to delete this records?')) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        url: "{{ URL::to('delete-income-outgoing') }}/" + id,
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

        $(document).on('click', '.edit_page_permission', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#form_result').html('');
            if (id != "") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ URL::to('/page-permission-edit') }}/" + id,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        if (response.data) {
                            $('.edit_page_permission_data').html('');
                            $('.edit_page_permission_data').html(response.data);
                            $('#add_page_permission').modal('show');
                            $('#submit').val('Update Permission');
                            $('.card-title').text('Update Permission');
                            $('#submit').addClass('update_permission');
                            $('#submit').removeClass('insert_data');
                        }
                    }
                });
            }
        });

        $(document).on('click', '.edit_question', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#form_result').html('');
            if (id != "") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ URL::to('edit-income-outgoing') }}/" + id,
                    method: "GET",

                    success: function(response) {
                        if (response) {
                            console.log(response.html); // question value
                            // console.log();
                            $('#question').val(response.records.question);
                            $('#type').val(response.records.type);
                            // $('#sub_type').html('');
                            $('#sub_type').html(response.html);
                            // $('#sub_type').val(response.html);
                            // $('#id').val(response.final_result[0].id);
                            $('img#thumb').removeAttr('id');
                            $('.errors').text('');
                            $('#addIncomeOut').modal('show');
                            $('#submit').val('Update Income Outgoing');
                            $('.card-title').text('Update Income Outgoing');
                            $('#submit').addClass('update_income_outgoing');
                            $('#submit').removeClass('insertQuestion');
                        }
                    }
                });
            }
        });

        // $(document).on('click', '.edit_question', function(e) {
        //     e.preventDefault();
        //     var id = $(this).data('id');
        //     if (id != "") {
        //         $.ajax({
        //             headers: {
        //                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
        //             },
        //             url: "{{ URL::to('edit-income-outgoing') }}/" + id,
        //             method: "GET",
        //             dataType: "json",
        //             success: function(response) {
        //                 if (response) {
        //                     console.log(response['final_result']);
        //                     $('#question').val(response['final_result'][1].question);
        //                     $('#type').val(response['final_result'][1].type);
        //                     $('#sub_type').val(response['final_result'][1].sub_type);
        //                     $('#id').val(response['final_result'][1].id);
        //                     $('img#thumb').removeAttr('id');
        //                     $('.errors').text('');
        //                     $('#addIncomeOut').modal('show');
        //                     $('#submit').val('Update Income Outgoing');
        //                     $('.card-title').text('Update Income Outgoing');
        //                     $('#submit').addClass('update_income_outgoing');
        //                     $('#submit').removeClass('insertQuestion');
        //                 }
        //             }
        //         });
        //     }
        // });

        $(document).on('click', '.update_income_outgoing', function(e) {
            e.preventDefault();
            var question = $('#question').val();
            var type = $('#type').val();
            var sub_type = $('#sub_type').val();
            var id = $('#id').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ URL::to('update-income-outgoing') }}/" + id,
                method: "POST",
                data: {
                    question: question,
                    type: type,
                    sub_type: sub_type,
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
                    $('#questionError').text(response.responseJSON.errors
                        .question);
                    $('#typeError').text(response.responseJSON.errors.type);
                    $('#sub_typeError').text(response.responseJSON.errors.sub_type);
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

        $(document).on('click', '#delete_question', function(e) {
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
                    var ajax_url = "{{ route('delete_multiple_question') }}";
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
