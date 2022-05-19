<div class="row"> 
    <div class="col-md-12">
        <div class="table-responsive grid-wrapper">
            <table class="table-grid table-bordered table-pd" id="full_report">
                <thead>
                <tr>
                    @if(Route::currentRouteName() == 'search_full_report')
                    <th>Case No</th>
                    @endif
                    <th>Customer Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>DOB</th>
                    @if(Route::currentRouteName() != 'search_full_report')
                    <th>Country</th>
                    @endif
                    <th>Debt Level</th>
                    <th>Total Debt</th>
                    <th>Employment</th>
                    <th>Living Arrangements</th>
                    <th>Downloaded Date</th>
                    <th>Completed Date</th>
                    <th>Case Status</th>
                    <th>Solution Type</th>
                    @if(Route::currentRouteName() == 'search_full_report')
                    <th>Action</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                 @foreach($data['reportDetails'] as $agentReportColumnKey => $agentReportColumnValue)
                    <tr>
                        @if(Route::currentRouteName() == 'search_full_report')
                        <td>{{ $agentReportColumnValue->user_id ?? '-' }}</td>
                        @endif
                        <td>{{ $agentReportColumnValue->name ?? '-' }}</td>
                        <td>{{ $agentReportColumnValue->tel ?? '-' }}</td>
                        <td>{{ $agentReportColumnValue->email ?? '-' }}</td>
                        <td>{{ $agentReportColumnValue->signUpQuestionDetails->birthDay ?? '-' }}</td>
                        @if(Route::currentRouteName() != 'search_full_report')
                        <td>{{ $agentReportColumnValue->signUpQuestionDetails->country ?? '-' }}</td>
                        @endif
                        <td>{{ $agentReportColumnValue->debtLevel->sum('amountOwned') ?? '-' }}</td>
                        <td>{{ isset($agentReportColumnValue->quickSolution->totalDebts) ? $agentReportColumnValue->quickSolution->totalDebts : '-' }}</td>
                        <td>{{ $agentReportColumnValue->signUpQuestionDetails->EmpStatus ?? '-' }}</td>
                        <td>{{ $agentReportColumnValue->signUpQuestionDetails->rentOrOwnHome ?? '-' }}</td>
                        <td>{{ $agentReportColumnValue->userSignInDate ? date('d-m-Y', strtotime($agentReportColumnValue->userSignInDate)) : '-' }}</td>
                        <td>
                            @if(strtolower($agentReportColumnValue->zCaseType) == 'completed')
                                {{ $agentReportColumnValue->userStatusUpdatedDate ? date('d-m-Y', strtotime($agentReportColumnValue->userStatusUpdatedDate)) : '-' }}
                            @else
                                {{ '-' }}
                            @endif
                        </td>
                        <td>{{ $agentReportColumnValue->zCaseType ?? '-' }}</td>
                        <td>{{ $agentReportColumnValue->UserSolution->solutionType ?? '-' }}</td>
                        @if(Route::currentRouteName() == 'search_full_report')
                        <td><a href='{{ route("viewUser", $agentReportColumnValue->user_id) }}'
                               class="btn btn-default-outlined case-btn">VIEW CASE</a></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>