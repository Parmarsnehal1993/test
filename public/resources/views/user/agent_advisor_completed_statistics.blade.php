<div class="row mb-5 mt--100">
    <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5">
                <h1>
                    Completed Cases
                </h1>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-7 pr-5">
                <div class="row pr-5">
                    <div class="col-md-4">
                        <div class="text-center text-primary">
                            Today
                            <div class="counter">
                                {{ $todaysCompletedCases }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center text-primary">
                            This Month
                            <div class="counter">
                                {{ $monthlyCompletedCases }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center text-primary">
                            Total
                            <div class="counter">
                              {{ $totalCompletedCases }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







{{-- <section class="statistics-section">
    <div class="row">
        <div class="col-sm-4">
            <div class="statistics">
                <h2>{{ $todaysCompletedCases }}</h2>
                <p>Today's Completed Cases</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="statistics">
                <h2>{{ $monthlyCompletedCases }}</h2>
                <p>Month's Completed Cases</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="statistics">
                <h2>{{ $totalCompletedCases }}</h2>
                <p>Total Completed Cases</p>
            </div>
        </div>
    </div>
</section>

<section class="statistics-section statistics-tabs-bordered text-uppercase text-center">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></div>
    </div>
</section> --}}