@extends('layouts.app')

@section('content')

    @php
    $loginUserData = Auth::user();
    unset($loginUserData->password);
    $loginUser = $loginUserData;
    @endphp

    <main class="main-content dmp-advisor">
        <!-- header -->
        <div class="row mt--100">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="main-title">
                            <h1 class="font-h1">
                                <strong>{{ $loginUser->name }}'s {{ $data_text }} Workflow</strong>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header -->

        <section class="card-section">
            <!-- proceess -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="row ml--30 mr-0">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    {{ $data_text }}
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax"
                                                data-type="{{ $data_text }}">
                                                @if ($data_text == 'In Process')
                                                    @php
                                                        //$data = getCountData($data_text)
                                                        // $totalInProcessCount = $totalCountArr['inprocessday2'] + $totalCountArr['inprocessday3'] + $totalCountArr['inprocessday4'];
                                                    @endphp

                                                    {{-- <h1>{{ isset($totalInProcessCount) && !empty($totalInProcessCount) ? $totalInProcessCount : 0 }}
                                                    </h1> --}}
                                                    <h1>{{ $totalCountArr['In Process'] }}</h1>
                                                @endif

                                                @if ($data_text == 'Awaiting Docs')
                                                    @php
                                                        //$data = getCountData($data_text)
                                                        // $totalAwaitingDocsCount = $totalCountArr['totalAwaitingDocsCount'];
                                                    @endphp

                                                    {{-- <h1>{{ isset($totalAwaitingDocsCount) && !empty($totalAwaitingDocsCount) ? $totalAwaitingDocsCount : 0 }}
                                                    </h1> --}}
                                                    <h1>{{ $totalCountArr['Awaiting Docs'] }}</h1>
                                                @endif

                                            </a>

                                            <p class="text-primary">

                                                Total

                                            </p>

                                        </div>



                                        @if ($data_text == 'In Process')

                                            @if ($loginUser->user_type == 1 || $loginUser->user_type == 8)

                                                @php
                                                    // $overdue = getOverdueCount('in_process_all');
                                                @endphp
                                            @else
                                                @php
                                                    // $overdue = getOverdueCount('In Process');
                                                @endphp
                                            @endif
                                        @else

                                            @if ($loginUser->user_type == 1 || $loginUser->user_type == 8)
                                                @php
                                                    // $overdue = getOverdueCount('awaiting_docs_all');
                                                @endphp
                                            @else
                                                @php
                                                    // $overdue = getOverdueCount('Awaiting Docs');
                                                @endphp
                                            @endif
                                        @endif
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">

                                            <a href="javascript:void(0)" class="statistics columnAjax"
                                                data-type="{{ $data_text }}-overdue">

                                                {{-- <h1 class="text-danger"> {{ $overdue ? $overdue : 0 }} </h1> --}}
                                            </a>

                                            <p class="text-danger">

                                                overdue

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                            <div class="card section-height-auto height-auto">

                                <div class="card-title">

                                    {{ $data_text }} Day 2

                                </div>

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">


                                            @if ($data_text == 'In Process')

                                                @php

                                                    // $totalCountArr['inprocessday1'];
                                                @endphp

                                                <a href="javascript:void(0)" class="statistics columnAjax"
                                                    data-type="inprocessday1">

                                                    <h1>{{ $totalCountArr['inprocessday1'] }}</h1>

                                                </a>

                                            @else

                                                @php

                                                    // $awaitingday2 = $totalCountArr['totalAwaitingDocsDay1Count'];
                                                @endphp


                                                <a href="javascript:void(0)" class="statistics columnAjax"
                                                    data-type="awaitingdocsday1">

                                                    {{-- <h1>{{ $awaitingday2 ? $awaitingday2 : 0 }}</h1> --}}
                                                    <h1>{{ $totalCountArr['awaitingdocsday1'] }}</h1>

                                                </a>

                                            @endif





                                            <p class="text-primary">

                                                New

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">

                    <div class="row ml--30 mr-0">

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                            <div class="card section-height-auto height-auto">

                                <div class="card-title">

                                    {{ $data_text }} Day 3

                                </div>

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">

                                            @if ($data_text == 'In Process')

                                                @php

                                                    // $inprocessday3 = $totalCountArr['inprocessday2'];
                                                @endphp

                                                <a href="javascript:void(0)" class="statistics columnAjax"
                                                    data-type="inprocessday2">

                                                    <h1>{{ $totalCountArr['inprocessday2'] }}</h1>

                                                </a>

                                            @else

                                                @php

                                                    // $awaitingday3 = $totalCountArr['totalAwaitingDocsDay2Count'];
                                                @endphp


                                                <a href="javascript:void(0)" class="statistics columnAjax"
                                                    data-type="awaitingdocsday2">

                                                    <h1>{{ $totalCountArr['awaitingdocsday2'] }}</h1>
                                                </a>

                                            @endif


                                            <p class="text-primary">

                                                New

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                            <div class="card section-height-auto height-auto">

                                <div class="card-title">

                                    {{ $data_text }} Day 4

                                </div>

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">

                                            @if ($data_text == 'In Process')

                                                @php

                                                    // $inprocessday4 = $totalCountArr['totalInProcessDay3Count'];
                                                @endphp

                                                <a href="javascript:void(0)" class="statistics columnAjax"
                                                    data-type="inprocessday3">

                                                    <h1>{{ $totalCountArr['inprocessday1'] }}</h1>

                                                </a>

                                            @else

                                                @php

                                                    // $awaitingday4 = $totalCountArr['totalAwaitingDocsDay3Count'];
                                                @endphp


                                                <a href="javascript:void(0)" class="statistics columnAjax"
                                                    data-type="awaitingdocsday3">

                                                    <h1>{{ $totalCountArr['awaitingdocsday3'] }}</h1>

                                                </a>

                                            @endif


                                            <p class="text-primary">

                                                New

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- // proceess -->

        </section>

    </main>



    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('click', '.columnAjax', function() {

                var data_text = $(this).data('type');



                window.location = '{{ URL::to('list/data') }}/' + data_text;

                // window.location ='{{ URL::to('inprocess/awaiting_docs/data') }}/'+data;

            })

        });
    </script>





@endsection
