<div id="day">

    <div class="row">

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            <div class="row dashboard-sidebar total-earned" style="padding-left: 0px;">

                <div class="col-md-6">

                    <h3 style="margin: 15px 0px">

                        TOTAL EARNED

                    </h3>

                </div>

                <div class="col-md-6">

                    <h1>£ {{ number_format($dashboardData['totalDailyEarnedFees']) }}</h1>

                </div>

            </div>

        </div>

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            <div class="row dashboard-sidebar total-earned mt-xs-15" style="padding-left: 0px;">

                <div class="col-md-6">

                    <h3 class="no-padding no-margin">

                        £ {{ number_format($dashboardData['totalIvaTrustDeedFees']) }}

                    </h3>

                    <hr

                        size="4"

                        style="max-width: 40px;border-top: 1px solid #abd6e1;margin-left: 0px">

                    <p>

                        TOTAL IVA/TURST DEED

                    </p>

                </div>

                <div class="col-md-6">

                    <h3>£ {{ number_format($dashboardData['totalDmpFees']) }}</h3>

                    <hr

                        size="4"

                        style="max-width: 40px;border-top: 1px solid #abd6e1;margin-left: 0px">

                    <p>

                        DMP

                    </p>

                </div>

            </div>

        </div>

    </div>

    <hr

        size="2"

        style=" width: 85%;

    margin-left: 0px;border-top:1px solid #fff;margin-top: 0px;">

    <div class="total-earned line-height" style="padding-left: 0px;">

        <div class="row text-uppercase" style="margin-top: 40px;">

            <div class="col-xs-6 col-sm-6 col-md-2">

                <h3>

                    @php $credit_fix_value = 0; @endphp 

                    @if(array_key_exists('credit fix', $dashboardData['dailyData']))

                        @php $credit_fix_value = $dashboardData['dailyData']['credit fix']; @endphp

                        £ {{ number_format($dashboardData['dailyData']['credit fix']) }}

                    @else

                        0

                    @endif

                </h3>

                <p>

                    CREDIT FIX

                </p>

                <hr

                    size="4"

                    style="max-width: 75px;border-top: 1px solid #abd6e1;margin-left: 0px;margin-top: 10px;">

                <h1>

                    @if($credit_fix_value != 0)

                        {{ round(($credit_fix_value / $dashboardData['totalDailyEarnedFees']) * 100, 2) }}%

                    @else

                        0%

                    @endif

                </h1>

            </div>

            <div class="col-xs-6 col-sm-6 col-md-2">

                <h3>

                    @php $aperture_value = 0; @endphp 

                    @if(array_key_exists('aperture', $dashboardData['dailyData']))

                        @php $aperture_value = $dashboardData['dailyData']['aperture']; @endphp

                        £ {{ number_format($dashboardData['dailyData']['aperture']) }}

                    @else

                        0

                    @endif

                </h3>

                <p>

                    APERTURE

                </p>

                <hr

                    size="2"

                    style="max-width: 75px;border-top: 1px solid #abd6e1;margin-left: 0px;margin-top: 10px;">

                <h1>

                    @if($aperture_value != 0)

                        {{ round(($aperture_value / $dashboardData['totalDailyEarnedFees']) * 100, 2) }}%

                    @else

                        0%

                    @endif

                </h1>

            </div>

            <div class="col-xs-6 col-sm-6 col-md-2">

                <h3>

                    @php $debt_champion_value = 0; @endphp 

                    @if(array_key_exists('debt champion', $dashboardData['dailyData']))

                        @php $debt_champion_value = $dashboardData['dailyData']['debt champion']; @endphp

                        £ {{ number_format($dashboardData['dailyData']['debt champion']) }}

                    @else

                        0

                    @endif

                </h3>

                <p>

                    DEBT CHAMPION

                </p>

                <hr

                    size="2"

                    style="max-width: 75px;border-top: 1px solid #abd6e1;margin-left: 0px;margin-top: 10px;">

                <h1>

                    @if($debt_champion_value != 0)

                        {{ round(($debt_champion_value / $dashboardData['totalDailyEarnedFees']) * 100, 2) }}%

                    @else

                        0%

                    @endif

                </h1>

            </div>

            <div class="col-xs-6 col-sm-6 col-md-2">

                <h3>

                    @php $the_insolvency_practice_value = 0; @endphp 

                    @if(array_key_exists('the insolvency practice', $dashboardData['dailyData']))

                        @php $the_insolvency_practice_value = $dashboardData['dailyData']['the insolvency practice']; @endphp

                        £ {{ number_format($dashboardData['dailyData']['the insolvency practice']) }}

                    @else

                        0

                    @endif

                </h3>

                <p class="text-nowrap text-xs-white-space-normal">

                    THE INSOLVANCY PRACTICE

                </p>

                <hr

                    size="2"

                    style="max-width: 75px;border-top: 1px solid #abd6e1;margin-left: 0px;margin-top: 10px;">

                <h1>

                    @if($the_insolvency_practice_value != 0)

                        {{ round(($the_insolvency_practice_value / $dashboardData['totalDailyEarnedFees']) * 100, 2) }}%

                    @else

                        0%

                    @endif

                </h1>

            </div>

            <div class="col-xs-6 col-sm-6 col-md-2">

                <h3>

                    @php $hannover_value = 0; @endphp 

                    @if(array_key_exists('hannover', $dashboardData['dailyData']))

                        @php $hannover_value = $dashboardData['dailyData']['hannover']; @endphp

                        £ {{ number_format($dashboardData['dailyData']['hannover']) }}

                    @else

                        0

                    @endif

                </h3>

                <p>

                    HANOVER

                </p>

                <hr

                    size="2"

                    style="max-width: 75px;border-top: 1px solid #abd6e1;margin-left: 0px;margin-top: 10px;">

                <h1>

                    @if($hannover_value != 0)

                        {{ round(($hannover_value / $dashboardData['totalDailyEarnedFees']) * 100, 2) }}%

                    @else

                        0%

                    @endif

                </h1>

            </div>

            <div class="col-xs-6 col-sm-6 col-md-2">

                <h3>

                    @php $johnson_geddes_value = 0; @endphp 

                    @if(array_key_exists('johnson geddes', $dashboardData['dailyData']))

                        @php $johnson_geddes_value = $dashboardData['dailyData']['johnson geddes']; @endphp

                        £ {{ number_format($dashboardData['dailyData']['johnson geddes']) }}

                    @else

                        0

                    @endif

                </h3>

                <p>

                    JONSON GEDDES

                </p>

                <hr

                    size="2"

                    style="max-width: 75px;border-top: 1px solid #abd6e1;margin-left: 0px;margin-top: 10px;">

                <h1>

                    @if($johnson_geddes_value != 0)

                        {{ round(($johnson_geddes_value / $dashboardData['totalDailyEarnedFees']) * 100, 2) }}%

                    @else

                        0%

                    @endif

                </h1>

            </div>

        </div>

        <div class="row text-uppercase" style="margin-top: 60px;">

            <div class="col-xs-6 col-sm-6 col-md-2">

                <h3>

                    @php $anchorage_chambers_value = 0; @endphp 

                    @if(array_key_exists('anchorage chambers', $dashboardData['dailyData']))

                        @php $anchorage_chambers_value = $dashboardData['dailyData']['anchorage chambers']; @endphp

                        £ {{ number_format($dashboardData['dailyData']['anchorage chambers']) }}

                    @else

                        0

                    @endif

                </h3>



                <p>

                    ANCORAGE CHAMBERS

                </p>

                <hr

                    size="2"

                    style="max-width: 75px;border-top: 1px solid #abd6e1;margin-left: 0px;margin-top: 10px;">

                <h1>

                    @if($anchorage_chambers_value != 0)

                        {{ round(($anchorage_chambers_value / $dashboardData['totalDailyEarnedFees']) * 100, 2) }}%

                    @else

                        0%

                    @endif

                </h1>

            </div>

            <div class="col-xs-6 col-sm-6 col-md-2">

                <h3>

                    @php $vanguard_value = 0; @endphp 

                    @if(array_key_exists('vanguard', $dashboardData['dailyData']))

                        @php $vanguard_value = $dashboardData['dailyData']['vanguard']; @endphp

                        £ {{ number_format($dashboardData['dailyData']['vanguard']) }}

                    @else

                        0

                    @endif

                </h3>

                <p>

                    VANGAURD

                </p>

                <hr

                    size="2"

                    style="max-width: 75px;border-top: 1px solid #abd6e1;margin-left: 0px;margin-top: 10px;">

                <h1>

                    @if($vanguard_value != 0)

                        {{ round(($vanguard_value / $dashboardData['totalDailyEarnedFees']) * 100, 2) }}%

                    @else

                        0%

                    @endif

                </h1>

            </div>

            <div class="col-xs-6 col-sm-6 col-md-2">

                <h3>

                    @php $wcf_value = 0; @endphp 

                    @if(array_key_exists('wcf', $dashboardData['dailyData']))

                        @php $wcf_value = $dashboardData['dailyData']['wcf']; @endphp

                        £ {{ number_format($dashboardData['dailyData']['wcf']) }}

                    @else

                        0

                    @endif

                </h3>

                <p>

                    WCF

                </p>

                <hr

                    size="2"

                    style="max-width: 75px;border-top: 1px solid #abd6e1;margin-left: 0px;margin-top: 10px;">

                <h1>

                    @if($wcf_value != 0)

                        {{ round(($wcf_value / $dashboardData['totalDailyEarnedFees']) * 100, 2) }}%

                    @else

                        0%

                    @endif

                </h1>

            </div>

            <div class="col-xs-6 col-sm-6 col-md-2">

                <h3>

                    @php $forrest_king_value = 0; @endphp 

                    @if(array_key_exists('forrest king', $dashboardData['dailyData']))

                        @php $forrest_king_value = $dashboardData['dailyData']['forrest king']; @endphp

                        £ {{ number_format($dashboardData['dailyData']['forrest king']) }}

                    @else

                        0

                    @endif

                </h3>

                <p>

                    FORREST KING

                </p>

                <hr

                    size="2"

                    style="max-width: 75px;border-top: 1px solid #abd6e1;margin-left: 0px;margin-top: 10px;">

                <h1>

                    @if($forrest_king_value != 0)

                        {{ round(($forrest_king_value / $dashboardData['totalDailyEarnedFees']) * 100, 2) }}%

                    @else

                        0%

                    @endif

                </h1>

            </div>

            <div class="col-xs-6 col-sm-6 col-md-2">

                <h3>

                    @php $debt_advisor_value = 0; @endphp 

                    @if(array_key_exists('debt advisor', $dashboardData['dailyData']))

                        @php $debt_advisor_value = $dashboardData['dailyData']['debt advisor']; @endphp

                        £ {{ number_format($dashboardData['dailyData']['debt advisor']) }}

                    @else

                        0

                    @endif

                </h3>

                <p>

                    DEBT ADVISOR

                </p>

                <hr

                    size="2"

                    style="max-width: 75px;border-top: 1px solid #abd6e1;margin-left: 0px;margin-top: 10px;">

                <h1>

                    @if($debt_advisor_value != 0)

                        {{ round(($debt_advisor_value / $dashboardData['totalDailyEarnedFees']) * 100, 2) }}%

                    @else

                        0%

                    @endif

                </h1>

            </div>

            <div class="col-xs-6 col-sm-6 col-md-2">

                <h3>

                    @php $other_value = 0; @endphp 

                    @if(array_key_exists('other', $dashboardData['dailyData']))

                        @php $other_value = $dashboardData['dailyData']['other']; @endphp

                        £ {{ number_format($dashboardData['dailyData']['other']) }}

                    @else

                        0

                    @endif

                </h3>

                <p>

                    OTHER

                </p>

                <hr

                    size="4"

                    style="max-width: 75px;border-top: 1px solid #abd6e1;margin-left: 0px;margin-top: 10px;">

                <h1>

                    @if($other_value != 0)

                        {{ round(($other_value / $dashboardData['totalDailyEarnedFees']) * 100, 2) }}%

                    @else

                        0%

                    @endif

                </h1>

            </div>

        </div>

    </div>

</div>