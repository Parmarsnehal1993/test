@extends('layouts.app')





@section('content')





<main class="main-content dmp-advisor pt-0">

        <div class="row mt--100 mb-5">

            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">  

                <input type="hidden" name="data_text" id="data_text" value="{{$data}}">

                <div class="row align-items-center">

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" id="content-type">

                        <h1>

                        

                        </h1>

                        <!-- <a href="javascript:void(0)" id="Go_Back"> back</a> -->

                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                        <div class="row">

                            <div class="col-md-4">

                            	<div class="text-center text-danger">

                                    Overdue

                                    <div class="counter">

                                        0

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="text-center text-primary">

                                    Today

                                    @php

                                    $today = TodayawaitingDocs();

                                    @endphp

                                    <div class="counter">

                                        {{ $today }}

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="text-center text-primary">

                                    Total

                                    @php

                                    $total = TotalawaitingDocs();

                                    @endphp

                                    <div class="counter">

                                        {{ $total }}      

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                <div class="row">

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0">
                    <form action="" class="has-no-margin">
                                    <div class="row">
                                        <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <input type="text" class="form-control" name="date_range" placeholder="Select Date:" autocomplete="off"></div>
                                            <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-md-0 plg-0 p-xl-0">
                                                <div class="buttons">
                                                    <button class="btn btn-outline-info">
                                                        Search
                                                    </button>
                                                    &nbsp;
                                                    <button class="btn btn-outline-info">
                                                        Clear
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                </form>

                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-0">

                        <div class="row m-0">

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">

                            <form class="has-no-margin" method="GET">
                                    <div class="row">
                                        <div class="col-6 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                            <div class="form-group">
                                                <input id="search" type="text" name="Date" class="form-control" placeholder="Search">
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm 12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="buttons">
                                                <button class="btn btn-outline-info" id="Search_Data">
                                                Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 p-0 mt-4">
                <div class="pl-3 pr-4 pt-0 pb-0">
                    <div class="table-responsive">

                        <table id="awaiting_inprocess_data"

                            class="table search-table text-left awaiating-table">

                            <thead>

                                <tr>

                                    <th>Case</th>

                                    <th>User Name</th>

                                    <th>Agent</th>

                                    <th>Reminder Date</th>

                                    <th class="text-center">Action</th>

                                </tr>

                            </thead>

                        </table>

                    </div>
                </div>
            </div>
        </div>

    </main>



<script type="text/javascript">

	$(document).ready(function(){

		var column = $('#data_text').val();

		

		$.ajax({

			 type: 'GET',

                url: '{{route('user.getDataInProcess')}}',

                async: true,

                contentType: "application/json; charset=utf-8",

                dataType: "json",

                data: {

                    column: column

                },

                success:function(data){



                	$('#content-type h1').text(column+' '+'Day 1');



                	 if (data !== null && data.length > 0) {



                        var tableData = [];

                        var user1 = [];

                        jQuery(data).each(function(i, item){

                            var user_id=item.user_id;

                            var username=item.username;

                            var agent=item.agent;

                            var reminder_date=item.reminder_date;

                            var enable_text=item.enable_text;

                                var user1 = {

                                'user_id':user_id,

                                'username':username,

                                'agent':agent,

                                'reminder_date':reminder_date,

                                'enable_text':enable_text

                                };

                    //console.log('user');

                            tableData.push(user1);

                        });

                        // $("#user_list").empty();

                        var table=$("#awaiting_inprocess_data").DataTable({

                            "dom": '<"float-left"l><"float-right"f>rt<"row"<"col-sm-4"><"col-sm-4"><"col-sm-4"p>>',

                            "lengthChange": true, "lengthMenu": [[10, 20, 30, 40, -1], [10, 20, 30, 40, "All"]],

                            data: tableData, // this is to be based on your json structure

                            columns: [

                            { data: "user_id" },

                            { data: "username" },

                            { data: "agent" },

                            { data: "reminder_date"},

                            { data: "enable_text"}

                            ],

                            select: {

                                style: 'os',

                                selector: 'td:first-child'

                            }

                        });

                        $('#search').keyup(function(){

                                 table.search($(this).val()).draw();

                        });

                    }

                }

		});



	});

</script>





















@endsection