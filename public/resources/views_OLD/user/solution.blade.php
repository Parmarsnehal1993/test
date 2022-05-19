@extends('layouts.app')

@section('content')
<!-- main content start -->
<section class="main-content">
    <div class="container">
        <!-- included user common detail -->
        @include('user.user_common_details')
        <!-- card details start -->
        <section class="card-details">
            <h4>Solution</h4>
            <form action="{{ route('user.save_solution') }}" method="POST">
                @csrf
                <input type="hidden" name="userId" value="{{ $userInfo->user_id }}">
                <div class="table-responsive grid-wrapper">
                    <table class="bold-table text-normal small-text has-space form-table">
                        @php
                            $IVA_selected = '';
                            $DMP_selected = '';
                            $ADMINISTRATION_ORDER_selected = '';
                            $TRUST_DEED_selected = '';
                            $BANKRIPTCY_selected = '';
                            $OTHER_selected = '';
                        @endphp
                        @if (isset($userSolution->solutionType) && !empty($userSolution->solutionType))
                            @switch($userSolution->solutionType)
                                @case('IVA')
                                    @php $IVA_selected = 'selected'; @endphp
                                    @break

                                @case('DMP')
                                    @php $DMP_selected = 'selected'; @endphp
                                    @break

                                @case('ADMINISTRATION ORDER')
                                    @php $ADMINISTRATION_ORDER_selected = 'selected'; @endphp
                                    @break

                                @case('TRUST DEED')
                                    @php $TRUST_DEED_selected = 'selected'; @endphp
                                    @break

                                @case('BANKRIPTCY')
                                    @php $BANKRIPTCY_selected = 'selected'; @endphp
                                    @break

                                @case('OTHER')
                                    @php $OTHER_selected = 'selected'; @endphp
                                    @break
                                @default
                            @endswitch
                        @endif
                        <tbody>
                            <tr>
                                <td>Solution type:</td>
                                <td>
                                    <select id="solutionType" name="solutionType" class="form-control" placeholder="SOLUTION TYPE" required>
                                        <option class="form-control" >Select Solution Type</option>
                                        <option value="IVA" class="form-control" {{ $IVA_selected }}>IVA</option>
                                        <option value="DMP" class="form-control" {{ $DMP_selected }}>DMP</option>
                                        <option value="ADMINISTRATION ORDER" class="form-control" {{ $ADMINISTRATION_ORDER_selected }}>ADMINISTRATION ORDER</option>
                                        <option value="TRUST DEED" class="form-control" {{ $TRUST_DEED_selected }}>TRUST DEED</option>
                                        <option value="BANKRIPTCY" class="form-control" {{ $BANKRIPTCY_selected }}>BANKRIPTCY</option>
                                        <option value="OTHER" class="form-control" {{ $OTHER_selected }}>OTHER</option>
                                    </select>
                                </td>
                            </tr>
                            @php
                                $CREDIT_FIX_selected = '';
                                $APERTURE_selected = '';
                                $DEBT_CHAMPION_selected = '';
                                $DEBT_ADVISOR_selected = '';
                                $FOREST_KING_selected = '';
                                $HANOVER_selected = '';
                                $OTHER_insolvency_selected = '';
                                $THE_INSOLVENCY_PRACTICE_selected = '';
                                $JOHNSON_GEDDES_selected = '';
                                $ANCHORAGE_CHAMBERS_selected = '';
                                $VANGUARD_selected = '';
                                $WCF_selected = '';
                                $DSS_selected = '';
                            @endphp
                            @if (isset($userSolution->insolvency) && !empty($userSolution->insolvency))
                                @switch($userSolution->insolvency)
                                    @case('CREDIT FIX')
                                        @php $CREDIT_FIX_selected = 'selected'; @endphp
                                        @break

                                    @case('APERTURE')
                                        @php $APERTURE_selected = 'selected'; @endphp
                                        @break

                                    @case('DEBT CHAMPION')
                                        @php $DEBT_CHAMPION_selected = 'selected'; @endphp
                                        @break

                                    @case('DEBT ADVISOR')
                                        @php $DEBT_ADVISOR_selected = 'selected'; @endphp
                                        @break

                                    @case('FOREST KING')
                                        @php $FOREST_KING_selected = 'selected'; @endphp
                                        @break

                                    @case('HANOVER')
                                        @php $HANOVER_selected = 'selected'; @endphp
                                        @break

                                    @case('OTHER')
                                        @php $OTHER_insolvency_selected = 'selected'; @endphp
                                        @break
                                    
                                    @case('THE INSOLVENCY PRACTICE')
                                        @php $THE_INSOLVENCY_PRACTICE_selected = 'selected'; @endphp
                                        @break

                                    @case('JOHNSON GEDDES')
                                        @php $JOHNSON_GEDDES_selected = 'selected'; @endphp
                                        @break

                                    @case('ANCHORAGE CHAMBERS')
                                        @php $ANCHORAGE_CHAMBERS_selected = 'selected'; @endphp
                                        @break
                                        
                                    @case('VANGUARD')
                                        @php $VANGUARD_selected = 'selected'; @endphp
                                        @break
                                    
                                    @case('WCF')
                                        @php $WCF_selected = 'selected'; @endphp
                                        @break
                                        
                                    @case('DSS')
                                        @php $DSS_selected = 'selected'; @endphp
                                        @break
                                       
                                    @default
                                @endswitch
                            @endif
                            <tr>
                                <td>Insolvency Practitioner:</td>
                                <td>
                                    <select id="insolvency" name="insolvency" class="form-control" placeholder="INSOLVENCY" required>
                                        <option class="form-control" >Select Insolvency Type</option>
                                        <option value="CREDIT FIX" class="form-control" {{ $CREDIT_FIX_selected }}>CREDIT FIX</option>
                                        <option value="APERTURE" class="form-control" {{ $APERTURE_selected }}>APERTURE</option>
                                        <option value="DEBT CHAMPION" class="form-control" {{ $DEBT_CHAMPION_selected }}>DEBT CHAMPION</option>
                                        <option value="DEBT ADVISOR" class="form-control" {{ $DEBT_ADVISOR_selected }}>DEBT ADVISOR</option>
                                        <option value="FOREST KING" class="form-control" {{ $FOREST_KING_selected }}>FOREST KING</option>
                                        <option value="HANOVER" class="form-control" {{ $HANOVER_selected }}>HANOVER</option>
                                        <option value="OTHER" class="form-control" {{ $OTHER_insolvency_selected }}>OTHER</option>
                                        <option value="THE INSOLVENCY PRACTICE" class="form-control" {{ $THE_INSOLVENCY_PRACTICE_selected }}>THE INSOLVENCY PRACTICE</option>
                                        <option value="JOHNSON GEDDES" class="form-control" {{ $JOHNSON_GEDDES_selected }}>JOHNSON GEDDES</option>
                                        <option value="ANCHORAGE CHAMBERS" class="form-control" {{ $ANCHORAGE_CHAMBERS_selected }}>ANCHORAGE CHAMBERS</option>
                                        <option value="VANGUARD" class="form-control" {{ $VANGUARD_selected }}>VANGUARD</option>
                                        <option value="WCF" class="form-control" {{ $WCF_selected }}>WCF</option>
                                        <option value="DSS" class="form-control" {{ $DSS_selected }}>DSS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Monthly Payment:</td>
                                <td><input class="form-control " type="text" name="payment" id="payment" value="@if(isset($userSolution->payment) && !empty($userSolution->payment)){{ trim($userSolution->payment) }}@endif" required></td>
                            </tr>
                            <tr>
                                <td>Start Date:</td>
                                <td><input class="form-control datepicker" type="text" name="startDate" id="startDate" value="@if (isset($userSolution->startDate) && !empty($userSolution->startDate)) {{ date('d-m-Y', strtotime($userSolution->startDate)) }} @endif" required></td>
                            </tr>
                            <tr>
                                <td>End Date:</td>
                                <td><input class="form-control datepicker" type="text" name="endDate" id="endDate" value="@if (isset($userSolution->endDate) && !empty($userSolution->endDate)) {{ date('d-m-Y', strtotime($userSolution->endDate)) }} @endif" required></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-primary" name="update_user_info" value="Save">
                    @if(isset($userSolution) && !empty($userSolution->userId))
                        <a href="{{ route('user.delete_user_solution', $userSolution->userId)}}" onclick="return confirm('Are you sure to delete this record?')" class="btn btn-primary">DELETE</a>
                    @endif
                </div>
            </form>
        </section>
    </div>
</section>
<script type="text/javascript">
$(document).ready(function(){
    $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
});
</script>
@endsection