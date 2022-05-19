@extends('layouts.app')

@section('content')
<!-- main content start -->
<section class="main-content">
    <div class="container">
        <div class="report-wrap">
            <div class="col-md-12">
                <div class="tab-content">
                    <div id="agreement" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-md-4 text text-uppercase">
                                <h1>4</h1>
                                <p>TODAYS COMPLETED CASES</p>
                            </div>
                            <div class="col-md-4 text text-uppercase">
                                <h1>4</h1>
                                <p>MOUNTHS COMPLETED CASE</p>
                            </div>
                            <div class="col-md-4 text text-uppercase">
                                <h1>13</h1>
                                <p>TOTAL CASES</p>
                            </div>
                        </div>
                        <table class="table text-white" style="width:100%;">
                            <thead>
                                <tr class="">
                                    <td>CASE NO</td>
                                    <td>AGENT</td>
                                    <td>CASE STATUS</td>
                                    <td>CUSTOMER NAME</td>
                                    <td>SOLUTION TYPE</td>
                                    <td>INSOLVENCE PLAC</td>
                                    <td>CASE OPTIONS</td>
                                </tr>

                            </thead>
                            @foreach ($allUsers as $userKey => $userValue)
                                <tr>
                                    <td>{{ $userValue->user_id }}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>{{ $userValue->name }}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <a href="{{ route('viewUser', $userValue->user_id) }}" class="btn btn-bordered case-btn">VIEW CASE</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-bordered case-btn">SOLUTION</a>
                                    </td>
                                    <!-- <td>
                                        <a href="#" class="btn btn-bordered case-btn">CHAT</a>
                                    </td> -->
                                    <td>
                                        <a href="#" class="btn btn-bordered case-btn">CALENDAR</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection