<div class="row"> 
    <div class="col-md-12">
        <div class="table-responsive grid-wrapper">
            <table class="table-grid table-bordered table-pd" id="full_report">
                <thead>
                <tr>
                    <th>Case No</th>
                    <th>Customer Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Country</th>
                    <th>Debt Level</th>
                    <th>Total Debt</th>
                    <th>Employment</th>
                    <th>Living Arrangements</th>
                    <th>Downloaded Date</th>
                    <th>Completed Date</th>
                    <th>Case Status</th>
                    <th>Solution Type</th>
                    <th>Insolvency</th>
                    <th>Fee</th>
                    <th>Due Date</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($data['reportDetails'] as $agentReportColumnKey => $agentReportColumnValue)
                    <tr>
                        <td>{{ $agentReportColumnValue->user_id ?? '-' }}</td>
                        <td>{{ $agentReportColumnValue->name ?? '-' }}</td>
                        <td>{{ $agentReportColumnValue->tel ?? '-' }}</td>
                        <td>{{ $agentReportColumnValue->email ?? '-' }}</td>
                        <td>{{ $agentReportColumnValue->signUpQuestionDetails->birthDay ?? '-' }}</td>
                        <td>{{ $agentReportColumnValue->signUpQuestionDetails->country ?? '-' }}</td>
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
                        <td>{{ $agentReportColumnValue->UserSolution->insolvency ?? '-' }}</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>