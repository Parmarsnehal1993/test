<div id="quick_view_modal" class="modal fade Checklist Quick-view" tabindex="-1" role="dialog" aria-labelledby="quick_view" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content card card-secondary">
            <div class="overflow-y-auto">
                <div class="modal-header">
                    <div class="card-title">
                        Quick view - {{ $user_name }}
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6" style="padding-right: 4.33%;">
                            <table class="table search-table text-center">
                                <tbody>
                                    <tr>
                                        <th>Ammount Owned</th>
                                        <th>Lender</th>
                                        <th>Monthly Payment</th>
                                    </tr>
                                    @if(isset($userDebts) && !empty($userDebts))
                                        @foreach($userDebts as $userDebtsKey => $userDebtsValue)
                                        <tr>
                                            <td>£ {{ number_format($userDebtsValue['amountOwned']) }}</td>
                                            <td>{{ $userDebtsValue['lender'] }}</td>
                                            <td>£ {{ number_format($userDebtsValue['usualPayment']) }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                             <div>
                                <table class="table debts-report-table">
                                    <tbody>
                                        <tr>
                                            <td>Monthly payment:</td>
                                            <td class="value" id="get_debts_payment">£ {{ $get_total_debts }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount:</td>
                                            <td class="value" id="get_debts_amount">£ {{ $get_total_amount }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-6" style="border-left:1.5px solid #008dcc;padding-left: 9%;">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4>Debts:</h4>
                                        <h1>£ {{ number_format($total_debts) }}</h1>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4>income:</h4>
                                        <h1>£ {{ number_format($totalIncome) }}</h1>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4>expenditure:</h4>
                                        <h1>£ {{ number_format($totalOutgoing) }}</h1>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4>assets:</h4>
                                        <h1>£ {{ number_format($totalAssets) }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-140 mt-3" style="padding-left:15%;">
                                @php
                                    $wage_slip_selected_yes = '';
                                    $bank_statement_selected_yes = '';
                                    $debts_uploaded_selected_yes = '';

                                    $wage_slip_selected_no = '';
                                    $bank_statement_selected_no = '';
                                    $debts_uploaded_selected_no = '';
                                @endphp
                                @if(isset($checklistData) && !empty($checklistData))
                                    @foreach($checklistData as $checklistDataKey => $checklistDataValue)
                                        @if($checklistDataValue->checklistType == 'WAGE_SLIP' && strtolower($checklistDataValue->answer) == 'yes')
                                            @php $wage_slip_selected_yes = 'checked' @endphp
                                        @endif
                                
                                        @if($checklistDataValue->checklistType == 'BANK_STATEMENT' && strtolower($checklistDataValue->answer) == 'yes')
                                            @php $bank_statement_selected_yes = 'checked' @endphp
                                        @endif

                                        @if($checklistDataValue->checklistType == 'DEBTS_UPLOADED' && strtolower($checklistDataValue->answer) == 'yes')
                                            @php $debts_uploaded_selected_yes = 'checked' @endphp
                                        @endif
                                    @endforeach
                                @else
                                    @php
                                        $wage_slip_selected_no = 'checked';
                                        $bank_statement_selected_no = 'checked';
                                        $debts_uploaded_selected_no = 'checked';
                                    @endphp
                                @endif

                                <table class="table mb-0 td-plr-0">
                                    <tbody>
                                        <tr>
                                            <td>Debts:</td>
                                            <td class="text-right">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="slot_y" name="Debts" class="custom-control-input" {{ $debts_uploaded_selected_yes }}>
                                                    <label class="custom-control-label" for="slot_y">yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="slot_n" name="Debts" class="custom-control-input" {{ $debts_uploaded_selected_no }}>
                                                    <label class="custom-control-label" for="slot_n">no</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Wage Slip:</td>
                                            <td class="text-right">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="slot_wage_y" name="Wage_slip" value="YES" class="custom-control-input" {{ $wage_slip_selected_yes }}>
                                                    <label class="custom-control-label" for="slot_wage_y">yes</label>
                                                </div>

                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="slot_wage_n" name="Wage_slip" value="No" class="custom-control-input" {{ $wage_slip_selected_no }}>
                                                    <label class="custom-control-label" for="slot_wage_n">no</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Bank Statement:</td>
                                            <td class="text-right">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="slote_bank_statement_y" name="bank_statement" value="PIC" class="custom-control-input" {{ $bank_statement_selected_yes }}>
                                                    <label class="custom-control-label" for="slote_bank_statement_y">yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="slot_bank_statement_n" name="bank_statement" value="EMAIL" class="custom-control-input" {{ $bank_statement_selected_no }}>
                                                    <label class="custom-control-label" for="slot_bank_statement_n">No</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer mb-0">
                    {{-- <a
                        href="javascript:void(0)"
                        class="btn btn-outline-info btn-large"
                        data-toggle="modal"
                        data-keyboard="false"
                        data-backdrop="static"
                        data-target="#slot_book">View Case</a> --}}
                    <a href="{{ route('viewUser', [$user_id]) }}" class="btn btn-outline-info btn-large">View Case</a>
                    <a
                        href="javascript:void(0)"
                        class="btn btn-outline-info btn-large"
                        data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>