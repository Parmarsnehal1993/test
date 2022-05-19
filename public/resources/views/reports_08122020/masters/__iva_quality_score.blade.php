<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive grid-wrapper">
                    <div id="get_all_agent_data" style="display: block;">
                        <table class="table search-table text-center" id="#">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Agent Name</th>
                                    <th>Customer ID</th>
                                    <th>Introducation</th>
                                    <th>Vulnerability</th>
                                    <th>Fact Find</th>
                                    <th>I &amp; E</th>
                                    <th>IVA</th>
                                    <th>Confirmation</th>
                                    <th>overall</th>
                                    <th>Status</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['getIvaQuality'] as $key => $value)
                                    @foreach($value as $innerKey => $innerValue)
                                        <tr>
                                            <td>{{ $innerValue['date'] }}</td>
                                            <td>{{ $key }}</td>
                                            <td>{{ $innerKey  }}</td>
                                            <td>{{ $innerValue['introducation_iva_compliance_count'] ? $innerValue['introducation_iva_compliance_count'] : 0 }}</td>
                                            <td>{{ $innerValue['vulnerability_iva_compliance_count'] ? $innerValue['vulnerability_iva_compliance_count'] : 0 }}</td>
                                            <td>{{ $innerValue['fact_find_iva_compliance_count'] ? $innerValue['fact_find_iva_compliance_count'] : 0  }}</td>
                                            <td>{{ $innerValue['ie_iva_compliance_count'] ? $innerValue['ie_iva_compliance_count'] : 0 }}</td>
                                            <td>{{ $innerValue['iva_compliance_count'] ? $innerValue['iva_compliance_count'] : 0 }}</td>
                                            <td>{{ $innerValue['confirmation_iva_compliance_count'] ? $innerValue['confirmation_iva_compliance_count'] : 0 }}</td>
                                            <td>{{ $innerValue['total_result'] ? $innerValue['total_result'] : 0 }}</td>
                                            <td>{{ $innerValue['result'] ? $innerValue['result'] : 0 }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>